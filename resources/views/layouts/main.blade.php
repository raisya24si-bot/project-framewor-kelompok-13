<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
    <title>{{ $title ?? 'Acuas Website' }}</title>
</head>
<body>

    <!-- Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>

    @include('layouts.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    @include('layouts.partials.scripts')
</body>
</html>
