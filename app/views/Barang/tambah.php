<div class="container">
    <h4>Tambah Barang</h4>

    <form action="<?= BASEURL ?>barang/store" method="post">

        <div class="row">
            <div class="col sm-6">
                <div class="form-group">
                    <label for="kode">Kode Barang</label>
                    <input class="input-block" type="text" id="kode" name="kode" placeholder="Kode Barang">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input class="input-block" type="text" id="nama" name="nama" placeholder="Nama Barang">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input class="input-block" type="text" id="satuan" name="satuan" placeholder="Satuan">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input class="input-block" type="number" id="harga" name="harga" placeholder="Harga">
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