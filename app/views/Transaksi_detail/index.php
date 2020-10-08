<div class="container">
    <h3>Detail Transaksi</h3>

    <?php Flasher::flash(); ?>

    <a href="<?= BASEURL ?>transaksi_detail/insert/" class="paper-btn btn-secondary btn-small"> Tambah Detail Transaksi </a>

    <table class="table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Kode Barang</th>
                <th>Qty</th>
                <th>Sub Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;

            foreach ($data["transaksi"] as $row) {           ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row["no_transaksi"]; ?></td>
                    <td><?= $row["kode_barang"]; ?></td>
                    <td><?= $row["qty"]; ?></td>
                    <td><?= $row["sub_total"]; ?></td>

                    <td>
                        <a href="<?= BASEURL . "transaksi_detail/edit/" . $row["id"]; ?>" class="paper-btn btn-small btn-warning">Edit</a>
                        <a href="<?= BASEURL . "transaksi_detail/destroy/" . $row["id"]; ?>" onclick="return confirm('Yakin?');" class="paper-btn btn-small btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>