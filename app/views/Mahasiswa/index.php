<div class="container">
    <h3>Daftar Barang</h3>

    <?php Flasher::flash(); ?>

    <a href="<?= BASEURL ?>barang/insert/" class="paper-btn btn-secondary btn-small"> Tambah Barang </a>

    <table class="table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data["barang"] as $row) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row["kode_barang"]; ?></td>
                    <td><?= $row["nama_barang"]; ?></td>
                    <td><?= $row["satuan"]; ?></td>
                    <td><?= $row["harga"]; ?></td>
                    <td>
                        <a href="<?= BASEURL . "barang/edit/" . $row["id"]; ?>" class="paper-btn btn-small btn-warning">Edit</a>
                        <a href="<?= BASEURL . "barang/destroy/" . $row["id"]; ?>" onclick="return confirm('Yakin?');" class="paper-btn btn-small btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>