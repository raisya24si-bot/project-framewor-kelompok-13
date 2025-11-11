@extends('layouts.admin.app')
@section('title', 'Edit Data Fasilitas Umum')

@section('content')
<div class="page-header py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-custom bg-transparent p-0 mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    <i class="icon-grid"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('fasilitasUmum.index') }}">Fasilitas Umum</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
        <div>
            <h3 class="font-weight-bold mb-1">Edit Data Fasilitas Umum</h3>
            <p class="text-muted mb-0">Perbarui data fasilitas sesuai kebutuhan.</p>
        </div>
        <a href="{{ route('fasilitasUmum.index') }}" class="btn btn-outline-primary btn-sm px-4">
            <i class="ti-arrow-left mr-2"></i> Kembali
        </a>
    </div>
</div>

{{-- Alert --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0">
        <i class="ti-check mr-2"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger shadow-sm border-0">
        <strong>Terjadi kesalahan!</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Form --}}
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body">
                <form action="{{ route('fasilitasUmum.update', $fasilitas->fasilitas_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        {{-- Kolom Kiri --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama" class="font-weight-semibold">Nama Fasilitas</label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    value="{{ old('nama', $fasilitas->nama) }}" placeholder="Masukkan nama fasilitas" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="jenis" class="font-weight-semibold">Jenis Fasilitas</label>
                                <select id="jenis" name="jenis" class="form-control" required>
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Balai Warga" {{ old('jenis', $fasilitas->jenis) == 'Balai Warga' ? 'selected' : '' }}>Balai Warga</option>
                                    <option value="Lapangan" {{ old('jenis', $fasilitas->jenis) == 'Lapangan' ? 'selected' : '' }}>Lapangan</option>
                                    <option value="Taman" {{ old('jenis', $fasilitas->jenis) == 'Taman' ? 'selected' : '' }}>Taman</option>
                                    <option value="Pos Kamling" {{ old('jenis', $fasilitas->jenis) == 'Pos Kamling' ? 'selected' : '' }}>Pos Kamling</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="rt" class="font-weight-semibold">RT</label>
                                <input type="text" id="rt" name="rt" class="form-control"
                                    value="{{ old('rt', $fasilitas->rt) }}" placeholder="Contoh: 5" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="rw" class="font-weight-semibold">RW</label>
                                <input type="text" id="rw" name="rw" class="form-control"
                                    value="{{ old('rw', $fasilitas->rw) }}" placeholder="Contoh: 3" required>
                            </div>
                        </div>

                        {{-- Kolom Kanan --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="alamat" class="font-weight-semibold">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control" rows="3"
                                    placeholder="Masukkan alamat fasilitas" required>{{ old('alamat', $fasilitas->alamat) }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="kapasitas" class="font-weight-semibold">Kapasitas</label>
                                <input type="number" id="kapasitas" name="kapasitas" class="form-control"
                                    value="{{ old('kapasitas', $fasilitas->kapasitas) }}" min="1" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="keterangan" class="font-weight-semibold">Keterangan</label>
                                <textarea id="keterangan" name="keterangan" class="form-control" rows="3"
                                    placeholder="Tambahkan catatan jika perlu">{{ old('keterangan', $fasilitas->keterangan) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-4">
                        <button type="submit" class="btn btn-success btn-lg px-4 py-2">
                            <i class="ti-save mr-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
