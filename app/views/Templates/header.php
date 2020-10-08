<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data["judul"]; ?></title>

    <link rel="stylesheet" href="<?= BASEURL ?>css/paper.css">
</head>

<body>
    <nav class="border split-nav">
        <div class="nav-brand">
            <h3><a href="#">Kasir</a></h4>
        </div>
        <div class="collapsible">
            <input id="collapsible2" type="checkbox" name="collapsible2">
            <label for="collapsible2">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </label>
            <div class="collapsible-body">
                <ul class="inline">
                    <li><a href="<?= BASEURL ?>cetak">Cetak</a></li>
                    <li><a href="<?= BASEURL ?>transaksi">Transaksi</a></li>
                    <li><a href="<?= BASEURL ?>transaksi_detail">Transaksi Detail</a></li>
                    <li><a href="<?= BASEURL ?>barang">Barang</a></li>
                </ul>
            </div>
        </div>
    </nav>