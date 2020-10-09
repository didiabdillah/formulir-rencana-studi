<div class="container">
    <h3>FRS</h3>

    <!-- FLASH MESSAGE -->
    <?php Flasher::flash(); ?>

    <!-- TAMBAH -->
    <a href="<?= BASEURL ?>frs/insert/" class="paper-btn btn-secondary btn-small"> Tambah FRS </a>

    <!-- CETAK -->
    <a href="<?= BASEURL ?>cetak/index/" class="paper-btn btn-success btn-small"> Cetak FRS </a>

    <!-- TABEL -->
    <table class="table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>No FRS</th>
                <th>NIM</th>
                <th>Kode Matkul</th>
                <th>Tahun Akademik</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;

            foreach ($data["frs"] as $row) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->no_frs; ?></td>
                    <td><a href="<?= BASEURL ?>mahasiswa"><?= $row->nim; ?></a></td>
                    <td><a href="<?= BASEURL ?>matakuliah"><?= $row->kode_matkul; ?></a></td>
                    <td><?= $row->tahun_akademik; ?></td>

                    <td>
                        <a href="<?= BASEURL . "frs/edit/" . $row->id; ?>" class="paper-btn btn-small btn-warning">Edit</a>
                        <a href="<?= BASEURL . "frs/destroy/" . $row->id; ?>" onclick="return confirm('Yakin?');" class="paper-btn btn-small btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>