<div class="container">
    <h4>Tambah Mahasiswa</h4>

    <form action="<?= BASEURL ?>mahasiswa/store" method="post">


        <div class="form-group">
            <label for="nim">NIM</label>
            <input class="input-block" type="text" id="nim" name="nim" placeholder="NIM">
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input class="input-block" type="text" id="nama" name="nama" placeholder="Nama">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="input-block">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input class="input-block" type="date" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
        </div>

        <div class="form-group">
            <label for="thn_masuk">Tahun Masuk</label>
            <input class="input-block" type="number" id="thn_masuk" name="thn_masuk" placeholder="Tahun Masuk">
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