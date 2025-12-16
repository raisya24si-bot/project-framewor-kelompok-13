@extends('layouts.main')
@section('content')
<div class="container py-5">
  <h3>Ajukan Peminjaman</h3>

  <form method="POST" action="{{ route('peminjaman.store') }}">
    @csrf

    <input type="hidden" name="fasilitas_id" value="{{ $fasilitas->fasilitas_id ?? $fasilitas->id }}">
    <input type="hidden" name="redirect" value="{{ request('redirect', url('/guest')) }}">

    <div class="mb-3">
      <label class="form-label">Tanggal mulai</label>
      <input type="date" name="tanggal_mulai" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tanggal selesai</label>
      <input type="date" name="tanggal_selesai" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tujuan</label>
      <input type="text" name="tujuan" class="form-control">
    </div>

    <button class="btn btn-primary">Kirim</button>
    <a href="{{ request('redirect', url('/guest')) }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
