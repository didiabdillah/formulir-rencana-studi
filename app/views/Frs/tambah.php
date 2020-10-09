<div class="container">
    <h4>Tambah FRS</h4>

    <!-- FORM -->
    <form action="<?= BASEURL ?>frs/store" method="post">

        <!-- NO FRS -->
        <div class="form-group">
            <label for="no_frs">No FRS</label>
            <input class="input-block" type="text" id="no_frs" name="no_frs" placeholder="No FRS">
        </div>

        <!-- NIM -->
        <div class="form-group">
            <label for="nim">NIM</label>
            <select id="nim" name="nim" class="input-block">
                <?php foreach ($data["nim"] as $nim) { ?>
                    <option value="<?= $nim->nim; ?>"><?= $nim->nim . " - " . $nim->nama; ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- KODE MATKUL -->
        <div class="form-group">
            <label for="kode">Kode Matkul</label>
            <select id="kode" name="kode" class="input-block">
                <?php foreach ($data["kode_matkul"] as $matkul) { ?>
                    <option value="<?= $matkul->kode_matakuliah; ?>"><?= $matkul->kode_matakuliah . " - " . $matkul->nama_matakuliah; ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- TAHUN AKADEMIK -->
        <div class="form-group">
            <label for="tahun">Tahun Akademik</label>
            <input class="input-block" type="text" id="tahun" name="tahun" placeholder="Tahun Akademik">
        </div>

        <!-- SUBMIT / BATAL -->
        <div class="row">
            <div class="col sm-6">
                <div class="form-group">
                    <a href="<?= BASEURL ?>" class="text-center paper-btn btn-block btn-danger">Batal</a>
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