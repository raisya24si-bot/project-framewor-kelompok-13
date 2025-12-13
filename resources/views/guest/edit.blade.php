@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h2>Edit Fasilitas Umum</h2>

    {{-- Form Pembuka --}}
    <form action="{{ route('guest.update', $data->fasilitas_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Memanggil isian form --}}
        @include('guest.form')

        {{-- Tombol Action --}}
        <div class="mt-3">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('guest.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
