<div class="container">
    <h4>Edit Transaksi</h4>

    <form action="<?= BASEURL ?>transaksi/update" method="post">
        <input type="hidden" name="id" id="id" value="<?= $data["transaksi"]["no_transaksi"]; ?>">
        <div class="row">
            <div class="col sm-6">
                <div class="form-group">
                    <label for="">No Transaksi</label>
                    <input class="input-block" type="text" id="" name="" placeholder="No Transaksi" value="<?= $data["transaksi"]["no_transaksi"]; ?>" readonly>
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="total">Total Transaksi</label>
                    <input class="input-block" type="text" id="total" name="total" placeholder="Total Transaksi" value="<?= $data["transaksi"]["total_transaksi"]; ?>">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <a href="<?= BASEURL ?>transaksi" class="text-center paper-btn btn-block btn-danger">Batal</a>
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