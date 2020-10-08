<div class="container">
    <h4>Edit Transaksi</h4>

    <form action="<?= BASEURL ?>transaksi_detail/update" method="post">
        <input type="hidden" name="id" id="id" value="<?= $data["transaksi"]["id"]; ?>">
        <div class="row">
            <div class="col sm-6">
                <div class="form-group">
                    <label for="no">No Transaksi</label>
                    <input class="input-block" type="text" id="no" name="no" placeholder="No Transaksi" value="<?= $data["transaksi"]["no_transaksi"]; ?>">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="kode">Kode Barang</label>
                    <input class="input-block" type="text" id="kode" name="kode" placeholder="Kode Barang" value="<?= $data["transaksi"]["kode_barang"]; ?>">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="qty">Qty</label>
                    <input class="input-block" type="text" id="qty" name="qty" placeholder="Qty" value="<?= $data["transaksi"]["qty"]; ?>">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="sub">Sub Total</label>
                    <input class="input-block" type="text" id="sub" name="sub" placeholder="Sub Total" value="<?= $data["transaksi"]["sub_total"]; ?>">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <a href="<?= BASEURL ?>transaksi_detail" class="text-center paper-btn btn-block btn-danger">Batal</a>
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