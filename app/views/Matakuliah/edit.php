<div class="container">
    <h4>Edit Mata Kuliah</h4>

    <form action="<?= BASEURL ?>matakuliah/update" method="post">
        <input type="hidden" name="id" id="id" value="<?= $data["matakuliah"]["id"]; ?>">

        <div class="form-group">
            <label for="kode">Kode Mata Kuliah</label>
            <input class="input-block" type="text" id="kode" name="kode" placeholder="Kode Mata Kuliah" value="<?= $data["matakuliah"]["kode_matakuliah"]; ?>">
        </div>

        <div class="form-group">
            <label for="nama"> Nama Mata Kuliah</label>
            <input class="input-block" type="text" id="nama" name="nama" placeholder="Nama Mata Kuliah" value="<?= $data["matakuliah"]["nama_matakuliah"]; ?>">
        </div>

        <div class="row">
            <div class="col sm-6">
                <div class="form-group">
                    <a href="<?= BASEURL ?>matakuliah" class="text-center paper-btn btn-block btn-danger">Batal</a>
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