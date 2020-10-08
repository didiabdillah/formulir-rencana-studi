<div class="container">
    <h4>Edit Mahasiswa</h4>

    <form action="<?= BASEURL ?>mahasiswa/update" method="post">
        <input type="hidden" name="id" id="id" value="<?= $data["mahasiswa"]->id; ?>">

        <div class="form-group">
            <label for="nim">NIM</label>
            <input class="input-block" type="text" id="nim" name="nim" placeholder="NIM" value="<?= $data["mahasiswa"]->nim; ?>">
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input class="input-block" type="text" id="nama" name="nama" placeholder="Nama" value="<?= $data["mahasiswa"]->nama; ?>">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="input-block">
                <option value="Laki-Laki" <?php if ($data["mahasiswa"]->gender == "Laki-Laki") echo "selected"; ?>>Laki-Laki</option>
                <option value="Perempuan" <?php if ($data["mahasiswa"]->gender == "Perempuan") echo "selected"; ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input class="input-block" type="date" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $data["mahasiswa"]->tanggal_lahir; ?>">
        </div>

        <div class="form-group">
            <label for="thn_masuk">Tahun Masuk</label>
            <input class="input-block" type="number" id="thn_masuk" name="thn_masuk" placeholder="Tahun Masuk" value="<?= $data["mahasiswa"]->tahun_masuk; ?>">
        </div>

        <div class="row">
            <div class="col sm-6">
                <div class="form-group">
                    <a href="<?= BASEURL ?>mahasiswa" class="text-center paper-btn btn-block btn-danger">Batal</a>
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn-block btn-secondary">Submit</button>
                </div>
            </div>
        </div>

    </form>

</div>