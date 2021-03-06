<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
// variabel global marker
var marker;

function taruhMarker(peta, posisiTitik) {

    if (marker) {
        // pindahkan marker
        marker.setPosition(posisiTitik);
    } else {
        // buat marker baru
        marker = new google.maps.Marker({
            position: posisiTitik,
            map: peta
        });
    }

    // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();

}

function initialize() {
    var propertiPeta = {
        center: new google.maps.LatLng(<?= $wisata->latitude ?>, <?= $wisata->longitude ?>),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

    // membuat Marker
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?= $wisata->latitude ?>, <?= $wisata->longitude ?>),
        map: peta,
        animation: google.maps.Animation.BOUNCE
    });

    // even listner ketika peta diklik
    google.maps.event.addListener(peta, 'click', function(event) {
        taruhMarker(this, event.latLng);
    });
    marker.taruhMarker(this, event.latLng)

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>


<!-- Breadcrumb -->
<div aria-label="breadcrumb" class="breadcrumb d-flex justify-content-end p-1">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin') ?>">Admin</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('index.php/kelola_data_wisata') ?>">Kelola data wisata</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Edit Wisata</li>
    </ol>
</div>

<section style="margin-top: -35px; margin-bottom: 50px;">
    <h2 class="scheduler-border rounded-top">Form Edit Wisata</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <fieldset class="scheduler-border">

                    <?php
          if (isset($error)) {
            echo '<div class="p-3 mb-2 bg-danger text-white"> Error (gambar ' . $i . ') :' . $error . '</div>';
          }
          ?>

                    <form action="<?= base_url('index.php/wisata/update/') . $wisata->id ?>" method="POST"
                        enctype='multipart/form-data'>

                        <div class="form-group row">
                            <label for="nama" class="col-4 col-form-label">Nama Tempat Wisata</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-address"></i>
                                        </div>
                                    </div>
                                    <input id="nama" name="nama" placeholder="Nama Wisata" type="text"
                                        value="<?= $wisata->nama ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis" class="col-4 col-form-label">Jenis Wisata</label>
                            <div class="col-8">
                                <select id="jenis" name="jenis" class="custom-select">
                                    <?php foreach ($jenis as $jns) { ?>
                                    <option value="<?= $jns['id']; ?>" <?php if ($jns['id'] == $wisata->jenis_wisata_id) {
                                                          echo 'selected';
                                                        } ?>><?= $jns['nama']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desk" class="col-4 col-form-label">Deskripsi Wisata</label>
                            <div class="col-8">
                                <textarea id="desk" name="desk" cols="40" rows="3"
                                    class="form-control"><?= $wisata->deskripsi ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kontak" class="col-4 col-form-label">Kontak</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-whatsapp"></i>
                                        </div>
                                    </div>
                                    <input id="kontak" name="kontak" value="<?= $wisata->kontak ?>" type="text"
                                        class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">Email</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-address-book"></i>
                                        </div>
                                    </div>
                                    <input id="email" name="email" value="<?= $wisata->email ?>" type="text"
                                        class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="web" class="col-4 col-form-label">Alamat Web</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-external-link-square"></i>
                                        </div>
                                    </div>
                                    <input id="web" name="web" value="<?= $wisata->web ?>" type="text"
                                        class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-4 col-form-label">Alamat Lengkap</label>
                            <div class="col-8">
                                <textarea id="alamat" name="alamat" cols="40" rows="3"
                                    class="form-control"><?= $wisata->alamat ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto1" class="col-4 col-form-label">foto Tempat Wisata (1)</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="foto1" name="foto1" type="file" value="index.jpg" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto2" class="col-4 col-form-label">foto Tempat Wisata (2)</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="foto2" name="foto2" type="file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto3" class="col-4 col-form-label">foto Tempat Wisata (3)</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="foto3" name="foto3" type="file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto4" class="col-4 col-form-label">foto Tempat Wisata (4)</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="foto4" name="foto4" type="file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto5" class="col-4 col-form-label">foto Tempat Wisata (5)</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="foto5" name="foto5" type="file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto6" class="col-4 col-form-label">foto Tempat Wisata (6)</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="foto6" name="foto6" type="file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Input Lokasi -->

                        <div class="form-group row">
                            <label for="lokasi" class="col-4 col-form-label">Lokasi (latlong)</label>
                            <div class="col-8">
                                <div id="googleMap" style="width:100%;height:380px;"></div>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                    </div>
                                    <span>Latitude:</span><input type="text" id="lat" name="lat"
                                        value="<?= $wisata->latitude ?>" class="mr-4">
                                    <span>Longitude:</span><input type="text" id="lng" name="lng"
                                        value="<?= $wisata->longitude ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="daftar" type="submit" class="btn btn-primary">Simpan</button>
                                <a href="#"><button name="batal" type="reset" class="btn btn-primary">Bersihkan
                                        Form</button></a>
                                <br><br>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>

    </div>
</section>