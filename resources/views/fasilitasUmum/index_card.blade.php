@extends('layouts.admin.app_acuas')

@section('title', 'Data Peminjaman Fasilitas Umum')

@section('content')
    {{-- Breadcrumb + Header --}}
    <div class="page-header py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-custom bg-transparent p-0 mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        <i class="icon-grid"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Fasilitas Umum</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
            <div>
                <h3 class="font-weight-bold mb-1">Data Peminjaman Fasilitas Umum</h3>
                <p class="text-muted mb-0">List data Peminjaman Fasilitas</p>
            </div>

            <div class="d-flex flex-wrap" style="gap: .5rem;">
                <a href="{{ route('fasilitasUmum.create') }}" class="btn btn-success btn-icon-text">
                    <i class="ti-plus btn-icon-prepend"></i> Tambah Fasilitas
                </a>

                {{-- Tombol cepat balik ke default tabel --}}
                <a href="{{ request()->url() }}?view=table" class="btn btn-outline-secondary btn-icon-text">
                    <i class="ti-view-list btn-icon-prepend"></i> Mode Tabel
                </a>
            </div>
        </div>
    </div>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
            <i class="ti-check mr-2"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    {{-- Card Grid --}}
    <div class="row">
        @forelse($fasilitas as $item)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header bg-white border-0 pb-0">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="mb-1 font-weight-bold">{{ $item->nama }}</h5>
                                <span class="badge badge-primary">{{ $item->jenis }}</span>
                            </div>
                            <span class="badge badge-light">
                                Kapasitas: {{ $item->kapasitas }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body pt-3">
                        <div class="mb-3 text-center">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto"
                                     class="img-fluid rounded shadow-sm"
                                     style="max-height: 160px; object-fit: cover;">
                            @else
                                <div class="py-5 text-muted bg-light rounded">
                                    Tidak ada foto
                                </div>
                            @endif
                        </div>

                        <div class="small">
                            <div class="mb-2">
                                <span class="text-muted">Alamat:</span><br>
                                <span class="font-weight-bold">{{ $item->alamat }}</span>
                            </div>

                            <div class="d-flex" style="gap: .75rem;">
                                <div>
                                    <span class="text-muted">RT</span><br>
                                    <span class="font-weight-bold">{{ $item->rt }}</span>
                                </div>
                                <div>
                                    <span class="text-muted">RW</span><br>
                                    <span class="font-weight-bold">{{ $item->rw }}</span>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">SOP:</div>
                            <div>
                                @if($item->sop)
                                    <a href="{{ asset('storage/' . $item->sop) }}" target="_blank"
                                       class="btn btn-outline-info btn-sm">
                                        <i class="ti-file"></i> Lihat
                                    </a>
                                @else
                                    <span class="badge badge-light text-muted">Tidak ada</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-0 pt-0">
                        <div class="d-flex flex-wrap" style="gap: .5rem;">
                            <a href="{{ route('fasilitasUmum.edit', $item->fasilitas_id) }}"
                               class="btn btn-primary btn-sm flex-grow-1">
                                <i class="ti-pencil"></i> Edit
                            </a>

                            <form action="{{ route('fasilitasUmum.destroy', $item->fasilitas_id) }}"
                                  method="POST"
                                  class="flex-grow-1"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm w-100">
                                    <i class="ti-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center text-muted py-5">
                        Belum ada data fasilitas.
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection
