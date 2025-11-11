@extends('layouts.admin.app')

@section('title', 'Tambah Fasilitas Umum')

@section('content')
<div class="page-header py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-custom bg-transparent p-0 mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-grid"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('fasilitasUmum.index') }}">Fasilitas Umum</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
        <div>
            <h3 class="font-weight-bold mb-1">Tambah Data Fasilitas Umum</h3>
            <p class="text-muted mb-0">Isi form berikut untuk menambahkan data fasilitas umum baru.</p>
        </div>
    </div>
</div>

{{-- Form Tambah --}}
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body">
                <form action="{{ route('fasilitasUmum.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        {{-- Kolom Kiri --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama" class="font-weight-semibold">Nama Peminjam</label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    value="{{ old('nama') }}" placeholder="Masukkan nama peminjam" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="jenis" class="font-weight-semibold">Jenis Fasilitas</label>
                                <select id="jenis" name="jenis" class="form-control" required>
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Aula" {{ old('jenis') == 'Aula' ? 'selected' : '' }}>Aula</option>
                                    <option value="Lapangan" {{ old('jenis') == 'Lapangan' ? 'selected' : '' }}>Lapangan</option>
                                    <option value="Lainnya" {{ old('jenis') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="alamat" class="font-weight-semibold">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control" rows="2"
                                    placeholder="Masukkan alamat fasilitas" required>{{ old('alamat') }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="rt" class="font-weight-semibold">RT</label>
                                    <select id="rt" name="rt" class="form-control" required>
                                        <option value="">-- Pilih RT --</option>
                                        @for ($i = 1; $i <= 9; $i++)
                                            <option value="{{ $i }}" {{ old('rt') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="rw" class="font-weight-semibold">RW</label>
                                    <select id="rw" name="rw" class="form-control" required>
                                        <option value="">-- Pilih RW --</option>
                                        @for ($i = 1; $i <= 9; $i++)
                                            <option value="{{ $i }}" {{ old('rw') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="kapasitas" class="font-weight-semibold">Kapasitas</label>
                                <input type="number" id="kapasitas" name="kapasitas" class="form-control"
                                    value="{{ old('kapasitas') }}" placeholder="Masukkan kapasitas fasilitas" min="1" required>
                            </div>
                        </div>

                        {{-- Kolom Kanan --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="deskripsi" class="font-weight-semibold">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"
                                    placeholder="Tambahkan deskripsi atau keterangan">{{ old('deskripsi') }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="foto" class="font-weight-semibold">Foto</label>
                                <input type="file" id="foto" name="foto" class="form-control"
                                    accept=".jpg,.jpeg,.png">
                                <small class="text-muted">Format: JPG, PNG. Maksimal 2MB</small>
                            </div>

                            <div class="form-group mb-3">
                                <label for="sop" class="font-weight-semibold">SOP (PDF)</label>
                                <input type="file" id="sop" name="sop" class="form-control" accept=".pdf">
                                <small class="text-muted">Hanya file PDF yang diterima</small>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('fasilitasUmum.index') }}" class="btn btn-outline-secondary mr-2 px-4">
                                    <i class="ti-close mr-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="ti-save mr-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
