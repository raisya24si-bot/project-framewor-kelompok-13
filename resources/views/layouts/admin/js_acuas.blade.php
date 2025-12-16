{{-- /resources/views/layouts/admin/js_acuas.blade.php --}}

{{-- CATATAN PENTING:
   - Di folder Acuas kamu tidak terlihat file jquery/bootstrap.bundle.
   - Banyak plugin (owlcarousel, waypoints, easing, wow, lightbox) umumnya butuh jQuery.
   - Jadi kita pasang yang ada dulu: easing, waypoints, wow, owlcarousel, lightbox, lalu main.js
--}}

<script src="{{ asset('acuas/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('acuas/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('acuas/lib/wow/wow.min.js') }}"></script>

{{-- Owl Carousel --}}
<script src="{{ asset('acuas/lib/owlcarousel/owl.carousel.min.js') }}"></script>

{{-- Lightbox (cek file di dalam /public/acuas/lib/lightbox/js/ ) --}}
<script src="{{ asset('acuas/lib/lightbox/js/lightbox.min.js') }}"></script>

{{-- JS utama Acuas --}}
<script src="{{ asset('acuas/js/main.js') }}"></script>

@stack('scripts')
