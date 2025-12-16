<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>@yield('title', 'Admin')</title>

  {{-- CSS Acuas --}}
  @include('layouts.admin.css_acuas')
  @stack('styles')
</head>
<body>

  {{-- Catatan:
     Layout Acuas ini sengaja TIDAK memanggil header/sidebar/footer Skydash,
     supaya CSS/JS tidak tabrakan saat testing. --}}

  @yield('content')

  {{-- JS Acuas --}}
  @include('layouts.admin.js_acuas')
  @stack('scripts')
</body>
</html>
