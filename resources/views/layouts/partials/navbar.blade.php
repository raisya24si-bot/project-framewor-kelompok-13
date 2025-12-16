<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 position-relative" style="z-index: 9999;">
        <a href="{{ url('/guest') }}" class="navbar-brand p-0">
            <h1 class="text-primary m-0">
                <i class="fas fa-hand-holding-water me-3"></i>Acuas
            </h1>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            {{-- MENU --}}
            <div class="navbar-nav ms-auto py-0 d-flex flex-column flex-lg-row align-items-lg-center gap-3">
                <a href="{{ url('/guest') }}"
                   class="nav-item nav-link {{ request()->is('guest') ? 'active' : '' }}">
                    HOME
                </a>

                <a href="{{ url('/peminjaman') }}"
                   class="nav-item nav-link {{ request()->is('peminjaman*') ? 'active' : '' }}">
                    Peminjaman
                </a>

                <a href="{{ url('/about') }}"
                   class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">
                    About
                </a>

                <a href="{{ url('/table') }}"
                   class="nav-item nav-link {{ request()->is('table*') ? 'active' : '' }}">
                    Table
                </a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('/product') }}" class="dropdown-item">Products</a>
                        <a href="{{ url('/blog') }}" class="dropdown-item">Blog Posts</a>
                    </div>
                </div>

                <a href="{{ url('/contact') }}"
                   class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">
                    Contact
                </a>
            </div>

            {{-- kanan navbar --}}
            @auth
                <div class="d-none d-xl-flex align-items-center ms-3">
                    <div class="text-end">
                        <div>
                            <span class="text-body me-2">Hello,</span>
                            <span class="text-primary fw-bold">{{ auth()->user()->name }}</span>
                        </div>

                        @if (session('last_login'))
                            <small class="text-muted">Last login: {{ session('last_login') }}</small>
                        @endif
                    </div>
                </div>

                @if(\Illuminate\Support\Facades\Route::has('auth.logout'))
                    <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger ms-3">
                        Logout
                    </a>
                @endif
            @endauth

            @guest
                @if(\Illuminate\Support\Facades\Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-primary ms-3">
                        Login
                    </a>
                @endif
            @endguest
        </div>
    </nav>
</div>
