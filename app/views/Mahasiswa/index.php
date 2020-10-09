<div class="container">
    <h3>Daftar Mahasiswa</h3>

    <!-- FLASH MESSAGE -->
    <?php Flasher::flash(); ?>

    <!-- TAMBAH -->
    <a href="<?= BASEURL ?>mahasiswa/insert/" class="paper-btn btn-secondary btn-small"> Tambah Mahasiswa </a>

    <!-- TABEL -->
    <table class="table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Tanggal Lahir</th>
                <th>Tahun Masuk</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data["mahasiswa"] as $row) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nim; ?></td>
                    <td><?= $row->nama; ?></td>
                    <td><?= $row->gender; ?></td>
                    <td><?= date('d/m/Y', strtotime($row->tanggal_lahir)); ?></td>
                    <td><?= $row->tahun_masuk; ?></td>
                    <td>
                        <a href="<?= BASEURL . "mahasiswa/edit/" . $row->id; ?>" class="paper-btn btn-small btn-warning">Edit</a>
                        <a href="<?= BASEURL . "mahasiswa/destroy/" . $row->id; ?>" onclick="return confirm('Yakin?');" class="paper-btn btn-small btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>