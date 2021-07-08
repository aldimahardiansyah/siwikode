<!-- Breadcrumb -->
<div aria-label="breadcrumb" class="breadcrumb d-flex justify-content-end p-1">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin') ?>">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kelola Wisata</li>
    </ol>
</div>

<section style="margin-top: -35px; margin-bottom: 50px;">
    <h2 class="rounded-top">
        Kelola Data Wisata
    </h2>

    <div style="overflow-x: auto;">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Jenis Wisata</th>
                    <th>Rating</th>
                    <th>Kontak Person</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomer = 1;
                foreach ($wisata as $nama) {
                    $gambar = $this->wisata_model->query('select nama from gambar where wisata_id=' . $nama->id);
                ?><tr>
                    <td><?= $nomer++ ?></td>
                    <td><?= $nama->nama ?></td>
                    <td> <a href="<?= base_url('public/assets/upload/') . $gambar->nama ?>"><img
                                src="<?= base_url('public/assets/upload/') . $gambar->nama ?>" width="100em"></a></td>
                    <td><?= $nama->jenis ?></td>
                    <td><?= $nama->bintang ?></td>
                    <td><?= $nama->kontak ?></td>
                    <td><a href="<?= base_url('index.php/wisata/detailWisata/') . $nama->id ?>"
                            class="text-dark">View</a> | <a href="<?= base_url('index.php/wisata/edit/') . $nama->id ?>"
                            class="text-dark">Edit</a> |
                        <a href="<?= base_url('index.php/kelola_data_wisata/delete/') . $nama->id ?>"
                            class="text-dark">Delete</a>
                    </td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
        <a href="<?= base_url('index.php/wisata/create/') ?> " class="btn btn-primary">Tambah Baru</a>
        <br><br><br>
    </div>
</section>


<footer>
    <p>Develop By Kelompok 1 TI01 @STT-NF 2021</p>
</footer>

</body>

</html>