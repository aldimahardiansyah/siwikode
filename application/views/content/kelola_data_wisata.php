<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Wisata Kota Depok</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-3.5.1.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.html">SIWIKODE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../wisata-rekreasi.html">Wisata Rekreasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../wisata-kuliner.html">Wisata Kuliner</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Registrasi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../form_rekreasi.html">Registrasi wisata rekreasi</a>
                        <a class="dropdown-item" href="../form_kuliner.html">Rekreasi wisata kuliner</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin.html">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../kelompok.html">Kelompok</a>
                </li>
                <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Wisata" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
                </form> -->

            </ul>
            <a href="../login.html"><button class="btn btn-outline-light my-2 my-sm-0">Login</button></a>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div aria-label="breadcrumb" class="breadcrumb d-flex justify-content-end p-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="../admin.html">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kelola Wisata Kuliner</li>
        </ol>
    </div>

    <section style="margin-top: -35px; margin-bottom: 50px;">
        <h2 class="rounded-top">
            Kelola Data Wisata Kuliner
        </h2>

        <div style="overflow-x: auto;">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Wisata</th>
                        <th>Rating</th>
                        <th>Kontak Person</th>
                        <th>Upload Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Starbucks</td>
                        <td>Kedai Kopi</td>
                        <td>*****</td>
                        <td>Jerry Baldwin</td>
                        <td><a href="#" class="text-dark">link upload</a></td>
                        <td><a href="#" class="text-dark">View</a> | <a href="edit_kuliner.html" class="text-dark">Edit</a> | <a href="#" class="text-dark">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Rumah Makan Padang</td>
                        <td>Rumah Makan</td>
                        <td>****</td>
                        <td>Datuk</td>
                        <td><a href="#" class="text-dark">link upload</a></td>
                        <td><a href="#" class="text-dark">View</a> | <a href="edit_kuliner.html" class="text-dark">Edit</a> | <a href="#" class="text-dark">Delete</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </tbody>
            </table>
            <button name="daftar" type="submit" class="btn btn-secondary">Tambah Baru</button>
            <br><br><br>
        </div>
    </section>


    <footer>
        <p>Develop By Kelompok 1 TI01 @STT-NF 2021</p>
    </footer>

</body>

</html>