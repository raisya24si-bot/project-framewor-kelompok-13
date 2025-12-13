<div class="row">
    <div class="col-md-6 mb-3">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="{{ old('nama', $data->nama ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Jenis</label>
        <select class="form-control" name="jenis" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="Aula" {{ old('jenis', $data->jenis ?? '') == 'Aula' ? 'selected':'' }}>Aula</option>
            <option value="Lapangan" {{ old('jenis', $data->jenis ?? '') == 'Lapangan' ? 'selected':'' }}>Lapangan</option>
            <option value="Gedung" {{ old('jenis', $data->jenis ?? '') == 'Gedung' ? 'selected':'' }}>Gedung</option>
        </select>
    </div>

    <div class="col-md-12 mb-3">
        <label>Alamat</label>
        <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $data->alamat ?? '') }}" required>
    </div>

    <div class="col-md-3 mb-3">
        <label>RT</label>
        <input type="text" class="form-control" name="rt" value="{{ old('rt', $data->rt ?? '') }}" required>
    </div>

    <div class="col-md-3 mb-3">
        <label>RW</label>
        <input type="text" class="form-control" name="rw" value="{{ old('rw', $data->rw ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Kapasitas</label>
        <input type="number" class="form-control" name="kapasitas" value="{{ old('kapasitas', $data->kapasitas ?? '') }}" required>
    </div>

    <div class="col-md-12 mb-3">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi">{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
    </div>
</div>
