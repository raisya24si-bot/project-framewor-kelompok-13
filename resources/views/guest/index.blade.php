@extends('layouts.main')

@section('content')
<div class="container-xxl py-5 mt-5">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
      <h2 class="mb-0">Home</h2>
    </div>

    <form method="GET" action="{{ route('guest.index') }}" class="row g-2 align-items-center mb-4">
      <div class="col-12 col-md-5">
        <input type="text" name="q" class="form-control"
               placeholder="Cari nama / alamat..." value="{{ request('q') }}">
      </div>

      <div class="col-12 col-md-4">
        <select name="jenis" class="form-select">
          <option value="">-- Filter Jenis --</option>
          @foreach(($jenisList ?? []) as $jenis)
            <option value="{{ $jenis }}" {{ request('jenis') == $jenis ? 'selected' : '' }}>
              {{ $jenis }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-12 col-md-3 d-flex gap-2">
        <button type="submit" class="btn btn-primary w-100">Cari</button>
        <a href="{{ route('guest.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
      </div>
    </form>

    <h4 class="mb-3">Fasilitas Umum</h4>

    <div class="row g-4 justify-content-center">
      @forelse(($fasilitas ?? []) as $item)
        @php
          $fid = $item->fasilitas_id ?? $item->fasilitasid ?? $item->id ?? null;
        @endphp

        <div class="col-12 col-md-6 col-lg-4">
          <div class="blog-item">
            <div class="blog-img">
              <img
                src="{{ !empty($item->foto) ? asset('storage/' . $item->foto) : asset('acuas/img/blog-1.jpg') }}"
                class="img-fluid rounded-top w-100"
                alt="{{ $item->nama ?? 'Fasilitas' }}"
                style="height:220px;object-fit:cover;"
              >
              <div class="blog-date px-4 py-2">
                <i class="fa fa-tag me-1"></i> {{ $item->jenis ?? '-' }}
              </div>
            </div>

            <div class="blog-content rounded-bottom p-4">
              <div class="d-flex justify-content-between align-items-start gap-2">
                <h5 class="mb-2">{{ $item->nama ?? '-' }}</h5>
                <span class="badge bg-light text-dark">
                  {{ ($item->rt ?? '-') . '/' . ($item->rw ?? '-') }}
                </span>
              </div>

              <p class="text-muted mb-2" style="min-height:48px;">
                {{ $item->alamat ?? '-' }}
              </p>

              <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <small class="text-muted">
                  Kapasitas: {{ $item->kapasitas ?? '-' }}
                </small>

                <div class="d-flex gap-2">
                  <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>

                  @auth
                    @if(\Illuminate\Support\Facades\Route::has('fasilitasUmum.edit'))
                      <a href="{{ route('fasilitasUmum.edit', $item) }}?redirect={{ urlencode(url()->full()) }}"
                         class="btn btn-sm btn-warning">
                        Edit
                      </a>
                    @endif

                    <a href="{{ url('/peminjaman') }}" class="btn btn-sm btn-primary">
                      Ajukan
                    </a>
                  @endauth

                  @guest
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary">
                      Ajukan
                    </a>
                  @endguest
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <div class="text-center text-muted py-5">
            Data fasilitas tidak ditemukan.
          </div>
        </div>
      @endforelse
    </div>

    @if(isset($fasilitas) && method_exists($fasilitas, 'links'))
      <div class="mt-4">
        {{ $fasilitas->appends(request()->query())->links() }}
      </div>
    @endif

    {{-- ===== PEMINJAMAN SAYA (yang kamu paste tadi) ===== --}}
    <hr class="my-5">

    @php($peminjaman = $peminjaman ?? collect())

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
      <h4 class="mb-0">Peminjaman Saya</h4>
      <a href="{{ url('/peminjaman') }}" class="btn btn-sm btn-outline-primary">Lihat semua</a>
    </div>

    <div class="row g-4">
      @forelse($peminjaman as $pinjam)
        <div class="col-12 col-md-6 col-lg-4">
          <div class="blog-item">
            <div class="blog-content rounded-bottom p-4">
              <h5 class="mb-2">Peminjaman #{{ $pinjam->id ?? '-' }}</h5>

              <p class="text-muted mb-2">
                Status: <strong>{{ $pinjam->status ?? '-' }}</strong>
              </p>

              <small class="text-muted d-block">
                Mulai: {{ $pinjam->tanggal_mulai ?? '-' }}
              </small>
              <small class="text-muted d-block mb-3">
                Selesai: {{ $pinjam->tanggal_selesai ?? '-' }}
              </small>

              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                  Total: {{ $pinjam->total_biaya ?? 0 }}
                </small>
                <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <div class="text-center text-muted py-4">
            Belum ada data peminjaman.
          </div>
        </div>
      @endforelse
    </div>

  </div>
</div
