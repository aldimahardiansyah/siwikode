<?php 
if($this->session->userdata('status') != 'login'){
    redirect(base_url('index.php/login'));
}
else{
?>
<section>
        <div class="card">
            <div class="card-body d-flex align-items-center"
                style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center;">
                <div class="d-flex align-items-center" style="display: flex; flex-direction: column; margin: 20px;">
                    <a href="admin/admin_kuliner.html">
                        <span style="font-size: 5rem;" class="fa fa-tasks fa-lg"></span>
                    </a>
                    <br>
                    <a href="admin/admin_kuliner.html">Kelola Data Wisata Kuliner</a>
                </div>

                <div class="d-flex align-items-center" style="display: flex; flex-direction: column; margin: 20px;">
                    <a href="admin/admin_rekreasi.html">
                        <span style="font-size: 5rem;" class="fa fa-tasks fa-lg"></span>
                    </a>
                    <br>
                    <a href="admin/admin_rekreasi.html">Kelola Data Wisata Rekreasi</a>
                </div>

                <div class="d-flex align-items-center" style="display: flex; flex-direction: column; margin: 20px;">
                    <a href="admin/testimoni.html">
                        <span style="font-size: 5rem;" class="fa fa-comment fa-lg"></span>
                    </a>
                    <br>
                    <a href="admin/testimoni.html">Kelola Data Testimoni Tempat Wisata</a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>