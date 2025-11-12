<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $fasilitas = FasilitasUmum::all();
        return view('guest.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
        $validated['foto'] = $request->file('foto')->store('uploads/guest', 'public');
    }

    if ($request->hasFile('sop')) {
        $validated['sop'] = $request->file('sop')->store('uploads/sop', 'public');
    }

    // ✅ 3. Simpan ke database
    FasilitasUmum::create($validated);

    // ✅ 4. Redirect + pesan sukses
    return redirect()->route('guestUmum.index')
        ->with('success', 'Data guest berhasil ditambahkan!');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $fasilitas = FasilitasUmum::findOrFail($id);
        return view('guest.edit', compact('fasilitas'));
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

        $guest = $guestUmum::findOrFail($id);

        // Ganti foto lama jika upload baru
        if ($request->hasFile('foto')) {
            if ($guest->foto && Storage::disk('public')->exists($guest->foto)) {
                Storage::disk('public')->delete($guest->foto);
            }
            $validated['foto'] = $request->file('foto')->store('uploads/guest', 'public');
        }

        // Ganti SOP lama jika upload baru
        if ($request->hasFile('sop')) {
            if ($guest->sop && Storage::disk('public')->exists($guest->sop)) {
                Storage::disk('public')->delete($guest->sop);
            }
            $validated['sop'] = $request->file('sop')->store('uploads/sop', 'public');
        }

        $guest->update($validated);

        return redirect()->route('guestUmum.index')
            ->with('success', 'Data guest berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
   {
    $guest = $guestUmum::findOrFail($id);

    // Hapus foto dan SOP dari storage kalau ada
    if ($guest->foto && \Storage::disk('public')->exists($guest->foto)) {
        \Storage::disk('public')->delete($guest->foto);
    }

    if ($guest->sop && \Storage::disk('public')->exists($guest->sop)) {
        \Storage::disk('public')->delete($guest->sop);
    }

    // Hapus data dari database
    $guest->delete();

    return redirect()->route('fasilitasUmum.index')
        ->with('success', 'Data fasilitas berhasil dihapus!');
}
}
