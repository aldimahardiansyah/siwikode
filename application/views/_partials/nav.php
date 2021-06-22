<nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="<?= base_url('index.php') ?>">SIWIKODE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('index.php') ?>">Home </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('index.php/wisata/index/rekreasi') ?>">Wisata Rekreasi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('index.php/wisata/index/kuliner') ?>">Wisata Kuliner</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('index.php/wisata/create') ?>">Registrasi</a>
                </li>

                <?php 
                if($this->session->userdata('status') == 'login'){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('index.php/admin') ?>">Admin</a>
                </li><?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('index.php/kelompok') ?>">Kelompok</a>
                </li>
            </ul>

            <?php 
            if($this->session->userdata('status') != 'login'){
            ?>
                <a href="<?= base_url('index.php/login') ?>"><button class="btn btn-outline-light my-2 my-sm-0">Login</button></a>
            <?php }else{ ?>
                <p style="color:#fff;margin:1em;margin-top:auto;margin-bottom:auto;">
                    <span class="mr-1 fa fa-user"></span> 
                    <?= $this->session->userdata('nama') ?>
                </p>
                <a href="<?= base_url('index.php/login/logout') ?>"><button class="btn btn-outline-light my-2 my-sm-0">Logout</button></a>
            <?php } ?>
        </div>
    </nav>