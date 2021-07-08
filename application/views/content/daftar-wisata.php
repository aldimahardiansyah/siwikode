<?php
if ($jenis == 2) {
    $jenis = 'Kuliner';
} else {
    $jenis = 'Rekreasi';
} ?>
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

                <?php foreach ($contents as $content) {
                    $picture = $this->wisata_model->query('select nama from gambar where wisata_id =' . $content->id);
                ?>
                <div class="card" style="padding: 10px; font-size: 13px; flex-basis:40%; margin-top:1em;">
                    <h6 class="card-title"><?= $content->nama ?></h6>
                    <div class="row">
                        <div class="col-md-3 card-body">
                            <img class="card-img" src="<?= base_url('public/assets/upload/') . $picture->nama ?>">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <p class="card-text"><?= $content->deskripsi ?></p>
                                <a href="<?= base_url('index.php/wisata/detailWisata/') . $content->id ?>"
                                    class="card-link">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
</section>