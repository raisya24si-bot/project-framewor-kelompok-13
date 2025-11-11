<!-- plugins:js -->
<script src="{{ asset('fasilitas-admin/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('fasilitas-admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('fasilitas-admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('fasilitas-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('fasilitas-admin/js/dataTables.select.min.js') }}"></script>
<!-- End plugin js -->

<!-- inject:js -->
<script src="{{ asset('fasilitas-admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('fasilitas-admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('fasilitas-admin/js/template.js') }}"></script>
<script src="{{ asset('fasilitas-admin/js/settings.js') }}"></script>
<script src="{{ asset('fasilitas-admin/js/todolist.js') }}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('fasilitas-admin/js/dashboard.js') }}"></script>
<script src="{{ asset('fasilitas-admin/js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js -->

<!-- ✅ Tambahan inisialisasi global untuk tabel dan fitur halaman -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Aktifkan DataTable kalau ada elemen dengan ID 'table-fasilitas'
        const fasilitasTable = $('#table-fasilitas');
        if (fasilitasTable.length) {
            fasilitasTable.DataTable({
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    zeroRecords: "Tidak ada data ditemukan",
                    info: "Menampilkan _PAGE_ dari _PAGES_",
                    infoEmpty: "Tidak ada data tersedia",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "›",
                        previous: "‹"
                    }
                },
                pageLength: 5,
                responsive: true
            });
        }

        // Tambahkan script global lain di sini kalau dibutuhkan (misal animasi, tooltip, dsb)
    });
</script>

<!-- Placeholder untuk script tambahan dari halaman tertentu -->
@stack('scripts')
