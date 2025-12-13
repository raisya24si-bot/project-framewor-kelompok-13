<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Guest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS utama template guest (Acuas) --}}
    <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}">
    {{-- tambahkan CSS lain jika ada --}}
</head>
<body>
    <main>
        {{-- Container / wrapper sesuai template guest --}}
        <section class="vh-100 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- JS template guest --}}
    <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
    {{-- tambahkan JS lain jika ada --}}
</body>
</html>
