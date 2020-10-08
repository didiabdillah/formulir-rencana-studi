<div class="container">
    <h4>Tambah Transaksi</h4>

    <form action="<?= BASEURL ?>transaksi/store" method="post">

        <div class="row">
            <div class="col sm-6">
                <div class="form-group">
                    <label for="no">No Transaksi</label>
                    <input class="input-block" type="text" id="no" name="no" placeholder="No Transaksi">
                </div>
            </div>
            <div class="col sm-6">
                <div class="form-group">
                    <label for="total"> Total Transaksi</label>
                    <input class="input-block" type="text" id="total" name="total" placeholder="Total Transaksi">
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