<?php

namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasUmumController extends Controller
{
    /** List data */
    public function index()
    {
        // Kalau nanti mau paginate: FasilitasUmum::latest()->paginate(10);
        $fasilitas = FasilitasUmum::latest()->get();
        return view('fasilitas-admin.index', compact('fasilitas'));    }

    /** Form create */
    public function create()
    {
        return view('fasilitas-admin.create');
    }

    /** Simpan data baru */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        // Upload file jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('uploads/fasilitas', 'public');
        }
        if ($request->hasFile('sop')) {
            $data['sop'] = $request->file('sop')->store('uploads/sop', 'public');
        }

        FasilitasUmum::create($data);

        return redirect()->route('fasilitasUmum.index')
            ->with('success', 'Data fasilitas berhasil ditambahkan!');
    }

    /** Tampilkan satu data (opsional) */
    public function show(FasilitasUmum $fasilitasUmum)
    {
        //
    }

    /** Form edit */
    public function edit(FasilitasUmum $fasilitasUmum)
    {
        return view('fasilitas-admin.edit', ['fasilitas' => $fasilitasUmum]);
    }

    /** Update data */
    public function update(Request $request, FasilitasUmum $fasilitasUmum)
    {
        $data = $this->validateData($request);

        // Ganti foto bila upload baru
        if ($request->hasFile('foto')) {
            if ($fasilitasUmum->foto && Storage::disk('public')->exists($fasilitasUmum->foto)) {
                Storage::disk('public')->delete($fasilitasUmum->foto);
            }
            $data['foto'] = $request->file('foto')->store('uploads/fasilitas', 'public');
        }

        // Ganti SOP bila upload baru
        if ($request->hasFile('sop')) {
            if ($fasilitasUmum->sop && Storage::disk('public')->exists($fasilitasUmum->sop)) {
                Storage::disk('public')->delete($fasilitasUmum->sop);
            }
            $data['sop'] = $request->file('sop')->store('uploads/sop', 'public');
        }

        $fasilitasUmum->update($data);

        return redirect()->route('fasilitasUmum.index')
            ->with('success', 'Data fasilitas berhasil diperbarui!');
    }

    /** Hapus data */
    public function destroy(FasilitasUmum $fasilitasUmum)
    {
        // Hapus file terkait
        if ($fasilitasUmum->foto && Storage::disk('public')->exists($fasilitasUmum->foto)) {
            Storage::disk('public')->delete($fasilitasUmum->foto);
        }
        if ($fasilitasUmum->sop && Storage::disk('public')->exists($fasilitasUmum->sop)) {
            Storage::disk('public')->delete($fasilitasUmum->sop);
        }

        $fasilitasUmum->delete();

        return redirect()->route('fasilitasUmum.index')
            ->with('success', 'Data fasilitas berhasil dihapus!');
    }

    /** ------- Helper: aturan validasi tunggal ------- */
    private function validateData(Request $request): array
    {
        return $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'jenis'     => ['required', 'string', 'max:100'],
            'alamat'    => ['required', 'string'],
            'rt'        => ['required', 'string'],   // ganti 'integer' kalau memang angka
            'rw'        => ['required', 'string'],   // ganti 'integer' kalau memang angka
            'kapasitas' => ['required', 'integer'],
            'deskripsi' => ['nullable', 'string'],
            'foto'      => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'sop'       => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
        ]);
    }
}
