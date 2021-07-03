<?php
if ($jenis == 2) {
    $jenis = 'Kuliner';
} else {
    $jenis = 'Rekreasi';
}
?>
<!-- Breadcrumb -->
<div aria-label="breadcrumb" class="breadcrumb d-flex justify-content-end p-1">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('index.php') ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Wisata <?= $jenis ?></li>
    </ol>
</div>

<section style="margin-top: -35px;">
    <h2 class="rounded-top">Daftar Wisata <?= $jenis ?> Kota Depok</h2>

    <div class="card" style="margin-bottom: 50px; padding: 20px;">
        <h5 class="card-title"><?= $first_content->nama ?></h5>
        <div class="row no-gutters">
            <div class="col-md-2 card-body">
                <img src="<?= base_url('public/assets/upload/') . $first_gambar->nama ?>" class="card-img" alt="">
            </div>

            <div class="col-md-10">
                <div class="card-body">
                    <p class="card-text"><?= $first_content->deskripsi ?>
                    </p>
                    <a href="<?= base_url('index.php/wisata/detailWisata/' . $first_content->id) ?>">Detail</a>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class=" card-deck">
                <div class="card" style="padding: 10px; font-size: 13px;">
                    <h6 class="card-title">Taman Rekreasi Wiladatika</h6>
                    <div class="row">
                        <div class="col-md-3 card-body">
                            <img src="assets/img/saa.jpg" alt="" class="card-img">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <p class="card-text">Taman Rekreasi Wiladatika Cibubur merupakan tempat wisata yang
                                    berlokasi di Cimanggis, Depok Jawa Barat.
                                    Di sini terdapat Pusat Pendidikan dan Pelatihan Pramuka Nasional (Pusdiklatmas),
                                    aula resepsi yang biasa digunakan untuk acara resepsi pernikahan, dan halaman
                                    hijau yang biasa di gunakan
                                    para pengunjung untuk piknik bersama keluarga, ketika acara besar pramuka biasa
                                    digunakan untuk berkemah..</p>
                                <a href="detail_rekreasi_wiladatika.html" class="card-link">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="padding: 10px; font-size: 13px;">
                    <h6 class="card-title">Depok Fantasi Waterpark -- Alladin</h6>
                    <div class="row">
                        <div class="col-md-3 card-body">
                            <img src="assets/img/sadw.jpg" alt="" class="card-img">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <p class="card-text">Taman bermain air luas ini bertema Arab dan memiliki beragam
                                    seluncur, kolam renang & penyewaan pelampung
                                    letaknya di Jl. Boulevard Grand Depok City, Tirtajaya, Kec. Sukmajaya, Kota
                                    Depok, Jawa Barat 16412
                                </p>
                                <a href="detail_rekreasi_alladin.html" class="card-link">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>