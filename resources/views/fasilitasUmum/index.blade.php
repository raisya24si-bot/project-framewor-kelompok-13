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
            <a href="{{ route('fasilitasUmum.create') }}" class="btn btn-success btn-icon-text">
                <i class="ti-plus btn-icon-prepend"></i> Tambah Fasilitas
            </a>
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

    {{-- Tabel Data --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-fasilitas" class="table table-hover align-middle text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Kapasitas</th>
                            <th>Foto</th>
                            <th>SOP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fasilitas as $item)
                            <tr>
                                <td class="font-weight-bold">{{ $item->nama }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->rt }}</td>
                                <td>{{ $item->rw }}</td>
                                <td>{{ $item->kapasitas }}</td>
                                <td>
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" width="60" class="rounded shadow-sm">
                                    @else
                                        <span class="badge badge-light text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->sop)
                                        <a href="{{ asset('storage/' . $item->sop) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                            <i class="ti-file"></i> SOP
                                        </a>
                                    @else
                                        <span class="badge badge-light text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('fasilitasUmum.edit', $item->fasilitas_id) }}" class="btn btn-primary btn-sm">
                                        <i class="ti-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('fasilitasUmum.destroy', $item->fasilitas_id) }}" method="POST"
                                          class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="ti-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-muted py-4">Belum ada data fasilitas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
