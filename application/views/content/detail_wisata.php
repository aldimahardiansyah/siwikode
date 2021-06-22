<div aria-label="breadcrumb" class="breadcrumb d-flex justify-content-end p-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail <?php echo $wisata->nama ?></li>
        </ol>
    </div>

    <div class="judul_rekreasi" style="margin-top: -35px;">
        <h1 class="kata">Detail <?php echo $wisata->nama; ?></h1>
        <div class="bintang ml-5">
            <h5>Rating</h5>
            <div style="display:flex;">
                <input id="rating" type="text"/> <span style="font-size: 2em; margin-top:0.2em; margin-left:0.3em;"> <?= $wisata->bintang ?> </span>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Galery
            </div>
            <div class="card-body">
                <blockquote class="blockquote ml-5 mr-5 mb-0">
                    <p><?php foreach($gambar as $foto){ ?>
                        <img src="<?= base_url('public/assets/upload/'); echo $foto['nama'] ?>" width="190px" alt="gambar <?= $wisata->nama; ?>">
                    <?php } ?>
                    </p>
                </blockquote>
            </div>
        </div>

        <div class="containerr card-deck" style="margin-top: 10px;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3>Deskripsi</h3><br>
                            <p class="paragraph"><?php echo $wisata->deskripsi ?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3>Alamat dan peta lokasi</h3>
                            <div class="d-flex justify-content-between flex-wrap">
                                <div style="max-width: 200px;">
                                    <p><?php echo $wisata->alamat ?></p>
                                </div>
                                <div>
                                    <!-- Menyisipkan library Google Maps -->
                                    <script src="http://maps.googleapis.com/maps/api/js"></script>

                                    <script>
                                        // fungsi initialize untuk mempersiapkan peta
                                        function initialize() {
                                        var propertiPeta = {
                                            center:new google.maps.LatLng(<?= $wisata->latitude ?>,<?= $wisata->longitude?>),
                                            zoom:14,
                                            mapTypeId:google.maps.MapTypeId.ROADMAP
                                        };
    
                                        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
                                        }

                                        // event jendela di-load  
                                        google.maps.event.addDomListener(window, 'load', initialize);
                                    </script>

                                    <div id="googleMap" style="width:300px;height:200px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="judul_testimoni">
            Testimoni & Komentar
        </div>
        <div class="row mt-2">
            <div class="col ml-4">
                Artis <br>
                <div>
                    <p><img src="assets/img/rafi.jpg" width="110px" style="float:left;" />Tempatnya sejuk dan
                        menenangkan.</p>
                </div>
            </div>
            <div class="col">
                Pejabat <br>
                <div>
                    <p><img src="assets/img/pejabat.jpg" width="120px" style="float:left;" />Sangat cocok untuk
                        menengkan diri ketika stres banyak kerjaan.</p>
                </div>
            </div>
            <div class="col">
                Warga <br>
                <div>
                    <p><img src="assets/img/warga.jpg" width="110px" style="float:left;" />Tempat yang sangat bagus.</p>
                </div>
            </div>
        </div>

        <br> <br>

        <script src="<?= base_url('public/assets/') ?>js/jquery-3.5.1.js"></script>
    <script src="<?= base_url('public/assets/') ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?= base_url('public/Rating/') ?>js/star-rating.js"></script>
        <script type="text/javascript">
                $(document).ready(function () {
                    var $inp = $('#rating');

                    $inp.attr('value', <?= $wisata->bintang ?>);

                    $inp.rating({
                        min: 0,
                        max: 5,
                        step: 1,
                        size: 'sm',
                        showClear: false
                    });
                });
            </script>