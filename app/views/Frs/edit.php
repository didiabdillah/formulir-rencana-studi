<div class="container">
    <h4>Edit FRS</h4>

    <form action="<?= BASEURL ?>frs/update" method="post">
        <input type="hidden" name="id" id="id" value="<?= $data["frs"]->id; ?>">
        <div class="form-group">
            <label for="no_frs">No FRS</label>
            <input class="input-block" type="text" id="no_frs" name="no_frs" placeholder="No FRS" value="<?= $data["frs"]->no_frs; ?>">
        </div>

        <div class="form-group">
            <label for="nim">NIM</label>
            <select id="nim" name="nim" class="input-block">
                <?php foreach ($data["nim"] as $nim) { ?>
                    <option value="<?= $nim->nim; ?>" <?php if ($data["frs"]->nim == $nim->nim) echo "selected"; ?>><?= $nim->nim . " - " . $nim->nama; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="kode">Kode Matkul</label>
            <select id="kode" name="kode" class="input-block">
                <?php foreach ($data["kode_matkul"] as $matkul) { ?>
                    <option value="<?= $matkul->kode_matakuliah; ?>" <?php if ($data["frs"]->kode_matkul == $matkul->kode_matakuliah) echo "selected"; ?>><?= $matkul->kode_matakuliah . " - " . $matkul->nama_matakuliah; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tahun">Tahun Akademik</label>
            <input class="input-block" type="text" id="tahun" name="tahun" placeholder="Tahun Akademik" value="<?= $data["frs"]->tahun_akademik; ?>">
        </div>

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