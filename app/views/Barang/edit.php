<div class="container">
    <h4>Edit Barang</h4>

    <form action="<?= BASEURL ?>barang/update" method="post">
        <input type="hidden" name="id" id="id" value="<?= $data["barang"]["id"]; ?>">
        <div class="row">
            <div class="col sm-6">
                <div class="form-group">
                    <label for="kode">Kode Barang</label>
                    <input class="input-block" type="text" id="kode" name="kode" placeholder="Kode Barang" value="<?= $data["barang"]["kode_barang"]; ?>">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input class="input-block" type="text" id="nama" name="nama" placeholder="Nama Barang" value="<?= $data["barang"]["nama_barang"]; ?>">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input class="input-block" type="text" id="satuan" name="satuan" placeholder="Satuan" value="<?= $data["barang"]["satuan"]; ?>">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input class="input-block" type="number" id="harga" name="harga" placeholder="Harga" value="<?= $data["barang"]["harga"]; ?>">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <a href="<?= BASEURL ?>barang" class="text-center paper-btn btn-block btn-danger">Batal</a>
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