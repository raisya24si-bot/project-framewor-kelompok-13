{{-- Card Grid (Acuas style) --}}
<div class="row g-4 justify-content-center">
    @forelse($fasilitas as $item)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="blog-item">
                <div class="blog-img">
                    <img
                        src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('acuas/img/blog-1.jpg') }}"
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
                            <a href="#" class="btn btn-sm btn-primary">Ajukan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="text-center text-muted py-5">
                Data tidak ditemukan.
            </div>
        </div>
    @endforelse
</div>
