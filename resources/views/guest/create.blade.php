@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Tambah Fasilitas Umum</h2>

    <form action="{{ route('guest.store') }}" method="POST">
        @csrf
        @include('guest.form')
        <button class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
