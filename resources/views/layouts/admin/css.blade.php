<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>@yield('title', 'Skydash Admin')</title>

<!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('fasilitasUmum/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('fasilitasUmum/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('fasilitasUmum/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('fasilitasUmum/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('fasilitasUmum/js/select.dataTables.min.css') }}">
<!-- End plugin css -->

<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('fasilitasUmum/css/vertical-layout-light/style.css') }}">
<!-- endinject -->

<link rel="shortcut icon" href="{{ asset('fasilitasUmum/images/favicon.png') }}" />

<!-- ✅ Custom CSS tambahan untuk tampilan modern -->
<style>
    /* === Layout & Background === */
    body {
        background-color: #f8f9fc;
    }

    .content-wrapper {
        padding: 2rem 2.5rem;
    }

    .page-header {
        margin-bottom: 1.5rem;
    }

    /* === Card Style === */
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .card-body {
        padding: 2rem 2.5rem;
    }

    /* === Form Elements === */
    label {
        color: #4b4b4b;
        font-weight: 600;
        margin-bottom: 6px;
        font-size: 0.9rem;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
        border: 1px solid #dcdcdc;
        box-shadow: none;
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #6f42c1;
        box-shadow: 0 0 0 0.15rem rgba(111, 66, 193, 0.25);
    }

    textarea.form-control {
        resize: none;
    }

    /* === Buttons === */
    .btn {
        border-radius: 10px;
        padding: 0.6rem 1.2rem;
        transition: all 0.2s ease-in-out;
        font-weight: 600;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-outline-secondary {
        color: #6c757d;
        border-color: #6c757d;
    }

    .btn-primary {
        background-color: #6f42c1;
        border-color: #6f42c1;
    }

    .btn-primary:hover {
        background-color: #59339b;
        border-color: #59339b;
    }

    /* === Breadcrumbs & Headers === */
    .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 0;
    }

    .page-header h3 {
        font-weight: 700;
        color: #333;
    }

    .page-header p {
        color: #888;
    }

    /* === Table Styles === */
    table.dataTable thead {
        background-color: #6f42c1;
        color: #fff;
    }

    table.dataTable tbody tr:hover {
        background-color: #f8f9fc;
    }

    table.dataTable td, 
    table.dataTable th {
        vertical-align: middle;
    }

    /* === Alert Styles === */
    .alert {
        border-radius: 10px;
        border: none;
        font-weight: 500;
    }

    .alert-success {
        background-color: #d1e7dd;
        color: #0f5132;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #842029;
    }

    /* === Responsive Tweaks === */
    @media (max-width: 992px) {
        .content-wrapper {
            padding: 1.5rem 1rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }

    @media (max-width: 576px) {
        .page-header h3 {
            font-size: 1.2rem;
        }

        label {
            font-size: 0.85rem;
        }

        .form-control,
        .form-select {
            font-size: 0.85rem;
        }
    }
</style>
