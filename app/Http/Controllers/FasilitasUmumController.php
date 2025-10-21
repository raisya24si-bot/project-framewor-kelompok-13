<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasUmum;

class FasilitasUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = FasilitasUmum::all();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // ✅ 1. Validasi input
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

    // ✅ 2. Upload file jika ada
    if ($request->hasFile('foto')) {
        $validated['foto'] = $request->file('foto')->store('uploads/fasilitas', 'public');
    }

    if ($request->hasFile('sop')) {
        $validated['sop'] = $request->file('sop')->store('uploads/sop', 'public');
    }

    // ✅ 3. Simpan ke database
    FasilitasUmum::create($validated);

    // ✅ 4. Redirect + pesan sukses
    return redirect()->route('fasilitasUmum.index')
        ->with('success', 'Data fasilitas berhasil ditambahkan!');
}


    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $fasilitas = FasilitasUmum::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
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

        $fasilitas = FasilitasUmum::findOrFail($id);

        // Ganti foto lama jika upload baru
        if ($request->hasFile('foto')) {
            if ($fasilitas->foto && Storage::disk('public')->exists($fasilitas->foto)) {
                Storage::disk('public')->delete($fasilitas->foto);
            }
            $validated['foto'] = $request->file('foto')->store('uploads/fasilitas', 'public');
        }

        // Ganti SOP lama jika upload baru
        if ($request->hasFile('sop')) {
            if ($fasilitas->sop && Storage::disk('public')->exists($fasilitas->sop)) {
                Storage::disk('public')->delete($fasilitas->sop);
            }
            $validated['sop'] = $request->file('sop')->store('uploads/sop', 'public');
        }

        $fasilitas->update($validated);

        return redirect()->route('fasilitasUmum.index')
            ->with('success', 'Data fasilitas berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $fasilitas = FasilitasUmum::findOrFail($id);

    // Hapus foto dan SOP dari storage kalau ada
    if ($fasilitas->foto && \Storage::disk('public')->exists($fasilitas->foto)) {
        \Storage::disk('public')->delete($fasilitas->foto);
    }

    if ($fasilitas->sop && \Storage::disk('public')->exists($fasilitas->sop)) {
        \Storage::disk('public')->delete($fasilitas->sop);
    }

    // Hapus data dari database
    $fasilitas->delete();

    return redirect()->route('fasilitasUmum.index')
        ->with('success', 'Data fasilitas berhasil dihapus!');
}

}
