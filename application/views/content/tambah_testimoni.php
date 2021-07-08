<!-- Breadcrumb -->
<div aria-label="breadcrumb" class="breadcrumb d-flex justify-content-end p-1">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('index.php/') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin') ?>">Admin</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('index.php/testimoni') ?>">Testimoni</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah testimoni</li>
    </ol>
</div>

<section style="margin-top: -35px; margin-bottom: 50px;">
    <h2>Testimoni Tempat Wisata</h2>

    <form style="margin: 20px;" method="POST" action="create">
        <div class="form-group row">
            <label class="col-4 col-form-label" for="nama">Nama</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-card"></i>
                        </div>
                    </div>
                    <input id="nama" name="nama" type="text" class="form-control" required="required">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-4 col-form-label" for="rating">Rating</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <input id="rating" name="rating" placeholder="1 - 5" type="number" class="form-control" min='1'
                        max='5' required="required">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="profesi" class="col-4 col-form-label">Profesi</label>
            <div class="col-8">
                <select class="custom-select" name="profesi" id="profesi">
                    <?php foreach ($profesi as $status) { ?>
                    <option value="<?= $status->id ?>"><?= $status->nama ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="testimoni" class="col-4 col-form-label">Testimoni</label>
            <div class="col-8">
                <textarea id="testimoni" name="testimoni" cols="40" rows="5" class="form-control"
                    required="required"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-4 col-form-label">Foto</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-link"></i>
                        </div>
                    </div>
                    <input id="foto" name="foto" placeholder="Masukkan link foto" type="text" class="form-control"
                        required="required">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="wisata" class="col-4 col-form-label">Wisata</label>
            <div class="col-8">
                <select id="wisata" name="wisata" class="custom-select" required="required">
                    <?php foreach ($wisata as $wst) { ?>
                    <option value="<?= $wst->id ?>"><?= $wst->nama ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </form>
    <br>
</section>