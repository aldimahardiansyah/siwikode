<br />
<h1>Sistem Informasi Wisata Kota Depok - SIWIKODE</h1>
<br />
<section>
    <h2>Wisata Rekreasi & Kuliner Unggulan Kota Depok</h2>
    <div class="container">
        <?php
        foreach ($unggulan as $wisata) {
            $gambar = $this->wisata_model->query('select nama from gambar where wisata_id=' . $wisata->id);
            $deskripsi = $this->wisata_model->query('select left(deskripsi, 210) as deskripsi from wisata where id=' . $wisata->id);
        ?>
        <div class="item">
            <h4><?= $wisata->nama ?></h4>
            <div class="content">
                <div>
                    <img src="<?= base_url('public/assets/upload/') . $gambar->nama ?>" width="90px"
                        alt="gambar taman Rekreasi Wiladatika" />
                </div>
                <div class="description">
                    <p><?= $deskripsi->deskripsi ?>
                        ...

                        <a href="<?= base_url('index.php/wisata/detailWisata/') . $wisata->id; ?>">Detail</a>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</section>