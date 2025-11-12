<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Guest Baru</title>
    <link rel="stylesheet" href="{{ asset('guest/css/bootstrap.min.css') }}">
</head>
<body class="p-4">

    <div class="container">
        <h1>Tambah Guest Baru</h1>
        <a href="{{ route('guest.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        {{-- Tampilkan pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form tambah data --}}
        <form action="{{ route('guest.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis:</label>
                <input type="text" name="jenis" id="jenis" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

</body>
</html>
