@extends('layouts.main')

@section('content')
    {{-- Informasi user yang sedang login --}}
    <div class="container mt-3">
        <div class="alert alert-info">
            <strong>User ID:</strong> {{ Auth::user()->id }}<br>
            <strong>Email:</strong> {{ Auth::user()->email }}
        </div>
    </div>

    <div class="container">

        <h2>Data Fasilitas Umum</h2>

        {{-- Form Pencarian --}}
        <form method="GET" class="row mb-3">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Cari nama / alamat...">
            </div>
            <div class="col-md-3">
                <select name="jenis" class="form-control">
                    <option value="">-- Filter Jenis --</option>
                    <option value="Aula" {{ $jenis=='Aula'?'selected':'' }}>Aula</option>
                    <option value="Lapangan" {{ $jenis=='Lapangan'?'selected':'' }}>Lapangan</option>
                    <option value="Gedung" {{ $jenis=='Gedung'?'selected':'' }}>Gedung</option>
                    <option value="Ruang Pertemuan" {{ $jenis=='Ruang Pertemuan'?'selected':'' }}>Ruang Pertemuan</option>
                    <option value="Lainnya" {{ $jenis=='Lainnya'?'selected':'' }}>Lainnya</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">Cari</button>
            </div>
            <div class="col-md-3 text-end">
                <a href="{{ route('guest.create') }}" class="btn btn-success">+ Tambah</a>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Alamat</th>
                    <th>RT/RW</th>
                    <th>Kapasitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                    <tr>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->jenis }}</td>
                        <td>{{ $d->alamat }}</td>
                        <td>{{ $d->rt }}/{{ $d->rw }}</td>
                        <td>{{ $d->kapasitas }}</td>
                        <td>
                            <a href="{{ route('guest.edit', $d->fasilitas_id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('guest.destroy', $d->fasilitas_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                @if ($data->onFirstPage())
                    <span class="btn btn-outline-secondary disabled">Previous</span>
                @else
                    <a href="{{ $data->appends(request()->query())->previousPageUrl() }}" class="btn btn-outline-primary">Previous</a>
                @endif

                @if ($data->hasMorePages())
                    <a href="{{ $data->appends(request()->query())->nextPageUrl() }}" class="btn btn-outline-primary">Next</a>
                @else
                    <span class="btn btn-outline-secondary disabled">Next</span>
                @endif
            </div>
            <div class="text-muted">
                Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results
            </div>
        </div>

    </div>
@endsection
