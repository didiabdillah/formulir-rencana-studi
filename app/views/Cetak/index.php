<div class="container">
    <h4>Cetak</h4>

    <form action="<?= BASEURL ?>cetak/print" method="post">

        <div class="form-group">
            <label for="kode">No Transaksi</label>
            <input class="input-block" type="text" id="kode" name="kode" placeholder="No Transaksi">
        </div>


        <div class="form-group">
            <button type="submit" name="submit" class="btn-block btn-secondary">Cetak</button>
        </div>

    </form>

</div>