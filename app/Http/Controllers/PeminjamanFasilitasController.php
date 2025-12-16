<?php
use Illuminate\Http\Request;
use App\Models\FasilitasUmum;
use App\Models\PeminjamanFasilitas;

class PeminjamanController extends Controller
{
    public function create($fasilitas)
    {
        $fasilitas = FasilitasUmum::where('fasilitas_id', $fasilitas)
            ->orWhere('id', $fasilitas)
            ->firstOrFail();

        return view('peminjaman.create', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fasilitas_id' => ['required'],
            'tanggal_mulai' => ['required','date'],
            'tanggal_selesai' => ['required','date','after_or_equal:tanggal_mulai'],
            'tujuan' => ['nullable','string','max:255'],
            'redirect' => ['nullable','string'],
        ]);

        $data['warga_id'] = auth()->id();
        $data['status'] = 'pending';
        $data['total_biaya'] = 0;

        PeminjamanFasilitas::create($data);

        return redirect($request->input('redirect', url('/guest')))
            ->with('success', 'Pengajuan berhasil dibuat.');
    }
    public function index()
{
    return view('peminjaman.index');
}

}
