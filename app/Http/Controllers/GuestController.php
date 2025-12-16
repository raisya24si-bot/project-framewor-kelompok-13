<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasUmum;
use App\Models\PeminjamanFasilitas; // WAJIB: model peminjaman
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $q     = $request->q;
        $jenis = $request->jenis;

        $fasilitas = FasilitasUmum::query()
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('nama', 'like', "%{$q}%")
                        ->orWhere('alamat', 'like', "%{$q}%");
                });
            })
            ->when($jenis, function ($query) use ($jenis) {
                $query->where('jenis', $jenis);
            })
            ->orderBy('fasilitas_id', 'DESC')
            ->paginate(4)
            ->withQueryString();

        $jenisList = FasilitasUmum::select('jenis')
            ->distinct()
            ->orderBy('jenis')
            ->pluck('jenis')
            ->filter()
            ->values();

        // Ambil peminjaman user login (kalau tabel/model sudah ada)
        $peminjaman = PeminjamanFasilitas::where('warga_id', Auth::id())
            ->latest()
            ->paginate(4);

        // HANYA 1 return
        return view('guest.index', compact('fasilitas', 'jenisList', 'peminjaman'));
    }

    public function table()
    {
        return view('guest.table');
    }
}
