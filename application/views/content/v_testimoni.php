<!-- Breadcrumb -->
<div aria-label="breadcrumb" class="breadcrumb d-flex justify-content-end p-1">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="admin">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kelola Testimoni Tempat Wisata</li>
    </ol>
</div>

<section style="margin-top: -35px; margin-bottom: 50px;">
    <h2 class="rounded-top">
        Kelola Data Testimoni Tempat Wisata
    </h2>

    <div style="overflow-x: auto;">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Tempat Wisata</th>
                    <th>Profesi</th>
                    <th>Testimoni</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($queryAllTest as $row) {
                    $count = $count + 1;
                ?>
                <tr>
                    <td><?php echo $count ?></td>
                    <td><?php echo $row->nama ?></td>
                    <td><img src="<?php echo $row->foto ?>" alt="gambar <?php echo $row->nama ?>" height="100em"></td>
                    <td><?php echo $row->wisata ?></td>
                    <td><?php echo $row->profesi ?></td>
                    <td><?php echo $row->komentar ?></td>
                    <td><?php echo $row->rating ?></td>
                    <td><a href="<?php echo base_url('index.php/testimoni/edit/') . $row->id ?>">Edit</a> | <a
                            href="<?php echo base_url('index.php/testimoni/fungsiDelete/') . $row->id ?>">Delete</a>
                        </th>
                </tr>
                <?php } ?>


            </tbody>
        </table>
        <a href="<?= base_url('index.php/testimoni/add') ?>">
            <button name="daftar" type="submit" class="btn btn-primary">Tambah Baru</button></a>
        <br><br><br>
    </div>
</section>


<footer>
    <p>Develop By Kelompok 1 TI01 @STT-NF 2021</p>
</footer>

</body>

</html>