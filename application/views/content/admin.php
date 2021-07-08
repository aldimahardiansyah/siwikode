<?php
if ($this->session->userdata('status') != 'login') {
    redirect(base_url('index.php/login'));
} else {
?>
<section>
    <div class="card">
        <div class="card-body d-flex align-items-center"
            style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center;">
            <div class="d-flex align-items-center" style="display: flex; flex-direction: column; margin: 20px;">
                <a href="<?= base_url('index.php/kelola_data_wisata') ?>">
                    <span style="font-size: 5rem;" class="fa fa-tasks fa-lg"></span>
                </a>
                <br>
                <a href="<?= base_url('index.php/kelola_data_wisata') ?>">Kelola Data Wisata </a>
            </div>

            <div class="d-flex align-items-center" style="display: flex; flex-direction: column; margin: 20px;">
                <a href="<?= base_url('index.php/testimoni') ?>">
                    <span style="font-size: 5rem;" class="fa fa-comment fa-lg"></span>
                </a>
                <br>
                <a href="<?= base_url('index.php/testimoni') ?>">Kelola Data Testimoni Tempat Wisata</a>
            </div>
        </div>
    </div>
</section>
<?php } ?>