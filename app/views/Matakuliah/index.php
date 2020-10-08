<div class="container">
    <h3>Daftar Mata Kuliah</h3>

    <?php Flasher::flash(); ?>

    <a href="<?= BASEURL ?>matakuliah/insert/" class="paper-btn btn-secondary btn-small"> Tambah Mata Kuliah </a>

    <table class="table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data["matakuliah"] as $row) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->kode_matakuliah; ?></td>
                    <td><?= $row->nama_matakuliah; ?></td>

                    <td>
                        <a href="<?= BASEURL . "matakuliah/edit/" . $row->id; ?>" class="paper-btn btn-small btn-warning">Edit</a>
                        <a href="<?= BASEURL . "matakuliah/destroy/" . $row->id; ?>" onclick="return confirm('Yakin?');" class="paper-btn btn-small btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>