<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary"><i class="fas fa-hand-holding-water me-3"></i>Acuas</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="/about" class="nav-item nav-link">About</a>
                <a href="/service" class="nav-item nav-link">Service</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="/product" class="dropdown-item">Products</a>
                        <a href="/blog" class="dropdown-item">Blog Posts</a>
                    </div>
                </div>
                <a href="/contact" class="nav-item nav-link">Contact</a>
            </div>

            {{-- Bagian kanan navbar: tergantung status login --}}
            @if (Auth::check())
                {{-- Jika SUDAH login: tampilkan nama user + last_login + Logout --}}
                <div class="d-none d-xl-flex align-items-center ms-3">
                    <div class="text-end">
                        <div>
                            <span class="text-body me-2">Hello,</span>
                            <span class="text-primary fw-bold">{{ Auth::user()->name }}</span>
                        </div>
                        @if (session('last_login'))
                            <small class="text-muted">Last login: {{ session('last_login') }}</small>
                        @endif
                    </div>
                </div>
                <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger ms-3">
                    Logout
                </a>
            @else
                {{-- Jika BELUM login: tampilkan tombol Login --}}
                <a href="{{ route('login') }}" class="btn btn-primary ms-3">
                    Login
                </a>
            @endif

        </div>
    </nav>
</div>
