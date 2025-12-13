<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasUmum;
use Illuminate\Support\Facades\Auth;   // ← tambahkan baris ini

class GuestController extends Controller
{
    
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $search = $request->search; //UNTUK SEARCH
        $jenis  = $request->jenis; //UNTUK FILTER

        $data = FasilitasUmum::when($search, function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('alamat', 'like', "%$search%");
            })
            ->when($jenis, function ($q) use ($jenis) {
                $q->where('jenis', $jenis);
            })
            ->orderBy('fasilitas_id', 'DESC')
            ->paginate(4);

        // UBAH: dari fasilitas.index menjadi guest.index
        return view('guest.index', compact('data', 'search', 'jenis'));
    }

    

    public function create() {
    return view('guest.create', ['data' => new FasilitasUmum()]);
}


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kapasitas' => 'required|numeric',
        ]);

        FasilitasUmum::create($request->all());
        
        // UBAH: route redirect ke guest.index
        return redirect()->route('guest.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = FasilitasUmum::findOrFail($id);

        // UBAH: dari fasilitas.edit menjadi guest.edit
        return view('guest.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $item = FasilitasUmum::findOrFail($id);
        $item->update($request->all());

        // UBAH: route redirect ke guest.index
        return redirect()->route('guest.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        FasilitasUmum::destroy($id);
        
        // UBAH: route redirect ke guest.index
        return redirect()->route('guest.index')->with('success', 'Data berhasil dihapus!');
    }
    public function show($id)
{
    // Karena Anda mungkin tidak butuh halaman detail (hanya butuh index & edit),
    // kita bisa redirect saja kembali ke halaman index, atau tampilkan view kosong.
    
    // Opsi 1: Kembalikan ke halaman index (Paling Aman)
    return redirect()->route('guest.index');

    // Opsi 2: Jika nanti mau dibuatkan halaman detail:
    // $data = \App\Models\FasilitasUmum::findOrFail($id);
    // return view('guest.show', compact('data'));
}

}
