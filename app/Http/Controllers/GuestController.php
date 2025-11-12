<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Guest; // pastikan model Guest sudah ada

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guest = Guest::all(); // ambil semua data guest
        return view('guest.index', compact('guest')); // kirim ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required',
            'alamat' => 'required|string',
            'rt' => 'required',
            'rw' => 'required',
            'kapasitas' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sop' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('uploads/guest', 'public');
        }

        if ($request->hasFile('sop')) {
            $validated['sop'] = $request->file('sop')->store('uploads/sop', 'public');
        }

        Guest::create($validated);

        return redirect()->route('guest.index')->with('success', 'Data guest berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guest = Guest::findOrFail($id);
        return view('guest.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required',
            'alamat' => 'required|string',
            'rt' => 'required',
            'rw' => 'required',
            'kapasitas' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sop' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $guest = Guest::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($guest->foto && Storage::disk('public')->exists($guest->foto)) {
                Storage::disk('public')->delete($guest->foto);
            }
            $validated['foto'] = $request->file('foto')->store('uploads/guest', 'public');
        }

        if ($request->hasFile('sop')) {
            if ($guest->sop && Storage::disk('public')->exists($guest->sop)) {
                Storage::disk('public')->delete($guest->sop);
            }
            $validated['sop'] = $request->file('sop')->store('uploads/sop', 'public');
        }

        $guest->update($validated);

        return redirect()->route('guest.index')->with('success', 'Data guest berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest = Guest::findOrFail($id);

        if ($guest->foto && Storage::disk('public')->exists($guest->foto)) {
            Storage::disk('public')->delete($guest->foto);
        }

        if ($guest->sop && Storage::disk('public')->exists($guest->sop)) {
            Storage::disk('public')->delete($guest->sop);
        }

        $guest->delete();

        return redirect()->route('guest.index')->with('success', 'Data guest berhasil dihapus!');
    }
}
