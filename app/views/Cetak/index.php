<div class="container">
    <h4>Cetak</h4>

    <!-- FORM -->
    <form action="<?= BASEURL ?>cetak/print" method="post" target="__blank">

        <!-- PILIH NIM -->
        <div class="form-group">
            <label for="nim">NIM</label>
            <select id="nim" name="nim" class="input-block">
                <?php foreach ($data["nim"] as $nim) { ?>
                    <option value="<?= $nim->nim; ?>"><?= $nim->nim . " - " . $nim->nama; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" name="submit" class="btn-block btn-secondary">Cetak</button>
        </div>

    </form>

</div>