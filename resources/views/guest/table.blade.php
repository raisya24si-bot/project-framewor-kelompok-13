@extends('layouts.main')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <h2 class="mb-2">About</h2>
        <p class="text-muted mb-4">Halaman About (hub/menu) untuk akses modul.</p>

        <div class="row g-3">
            <div class="col-12 col-md-6 col-lg-4">
                <a class="btn btn-outline-primary w-100 py-3" href="{{ route('guest.index') }}">
                    Fasilitas Umum (List)
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <a class="btn btn-outline-secondary w-100 py-3" href="#">
                    Peminjaman
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <a class="btn btn-outline-secondary w-100 py-3" href="#">
                    Pembayaran
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <a class="btn btn-outline-secondary w-100 py-3" href="#">
                    Syarat
                </a>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <a class="btn btn-outline-secondary w-100 py-3" href="#">
                    Petugas
                </a>
            </div>
        </div>
    </
