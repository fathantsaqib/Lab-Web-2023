<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// menyambungkan ke file functions.php
require 'functions.php';

// pagination
// Konfigurasi
$jumlahDataPerPage = 5;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerPage);
// if(isset($_GET["page"])){
//     $halamanAktif = $_GET["page"];
// } else {
//     $halamanAktif = 1;
// }
$halamanAktif = (isset($_GET["page"]) ) ? $_GET["page"] : 1;
// misal berada di halaman ke-2, awalData = 5
$awalData = ($jumlahDataPerPage * $halamanAktif) - $jumlahDataPerPage;

// untuk tampilkan data
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nim LIMIT $awalData, $jumlahDataPerPage");

// Jika Tombol Cari ditekan 
    if(isset($_POST["cari"])) {
        $mahasiswa = cari($_POST["keyword"]);
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>

    <style>
        .navbar .search-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 350px;
        }

        .dropdown ,a i {
            color: white;
        }

        .heading {
            margin-bottom: 2rem;
        }

        .aksi {
            display: flex;
            gap: 1.2rem;
            justify-content: center;
        }
        .edit i {
            background-color: #2e68a6;
            border-radius: 4px;
            padding: .5rem;
        }
        .edit i:hover{
            opacity: 0.9;
        }
        .delete i {
            background-color: #e01818;
            border-radius: 4px;
            padding: .5rem;
        }
        .delete i:hover{
            opacity: 0.9;
        }

        th {
            background-color: #9c9c9c;
        }

        .back-button{
            display: flex;
            justify-content: end;
        }
        .back-button:hover {
            opacity: .9;
        }
        .back-button i {
            background-color: #2e68a6;
            border-radius: 5px;
            width: 60px;
            margin-bottom: 1rem;
        }
        .admin-section {
            padding: 3rem 7%;
        }
        .admin-section h1 {
            color: var(--primary-color);
        }
        .admin-section span {
            color: var(--sec-color);
        }

        .hal {
            text-decoration: none;
        }

        .page-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 500px;
        }
        .page-content {
            display: flex;
            align-items: center;
            overflow: hidden;
            width: 30%;
            justify-content: center;
        }



    </style>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="index.php">Univ.</a>
        </div>
        <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto"> <!-- Gunakan "ml-auto" untuk menggeser ke kanan -->
                <li class="nav-item mt-1">
                    <div class="nav-link search-content">
                        <form class="row g-3" action="" method="post">
                            <div class="col-auto">
                                <input type="text" name="keyword" class="form-control" placeholder="Search Data Mahasiswa" autocomplete="off">
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="cari" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown fs-2">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bxs-user-circle'></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="insert.php">Tambah Data<br>Mahasiswa</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        <li><span style="color: white;">Belum ada akun? </span><a href="registrasi.php">Regist Now!</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <section class="admin-section">
        <center>
            <div class="heading">
                <h1>Selamat Datang, <span><?= $_SESSION["pengguna"]; ?></span></h1>
                <h1>Daftar Mahasiswa</h1>
            </div>

            <div class="back-button">
                <a href="index.php"><i class='bx bx-arrow-back fs-2'></i></a>
            </div>

            <table border="1" class="table table-bordered table-striped">
                <tr class="table-secondary">
                    <th class="p-3">No.</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">NIM</th>
                    <th class="p-3">Fakultas</th>
                    <th class="p-3">Jurusan</th>
                    <th class="p-3">Edit / Hapus</th>
                </tr>

                <?php $i = 1;?>
                <?php foreach($mahasiswa as $row) : ?>
                <tr>
                    <td class="p-3"><?= $i; ?></td>
                    <td class="p-3"><?= $row["nama"]; ?></td>
                    <td class="p-3"><?= $row["nim"]; ?></td>
                    <td class="p-3"><?= $row["fakultas"]; ?></td>
                    <td class="p-3"><?= $row["jurusan"]; ?></td>
                    <td class="aksi p-3">
                        <a class="edit" href="edit.php?id=<?= $row["id"]; ?>" id="editToggle"><i class='bx bxs-edit-alt fs-5'></i></a>
                        <a class="delete" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?');"><i class='bx bxs-trash fs-5'></i></a>
                    </td>
                </tr>
                <?php $i++?>
                <?php endforeach; ?>
            </table>

            <div class="page-container text-center">
            <div class="prev-icon">
    <?php if ($halamanAktif > 1) : ?>
        <a class="fs-5 badge bg-primary text-wrap mx-3" href="?page=<?= $halamanAktif - 1; ?>"><i class='bx bx-chevron-left'></i></a>
    <?php endif; ?>
</div>

<div class="page-content">
    <?php
    // Set the number of pages to display
    $numPagesToDisplay = 3;

    // Calculate the range of pages to display
    $startPage = max(1, $halamanAktif - floor($numPagesToDisplay / 2));
    $endPage = min($startPage + $numPagesToDisplay - 1, $jumlahHalaman);

    // Ensure we have $numPagesToDisplay pages, adjust $startPage if necessary
    if ($endPage - $startPage + 1 < $numPagesToDisplay) {
        $startPage = $endPage - $numPagesToDisplay + 1;
    }

    // Make sure $startPage and $endPage are within valid bounds
    $startPage = max(1, $startPage);
    $endPage = min($jumlahHalaman, $endPage);

    // Loop through the range of pages to display
    for ($i = $startPage; $i <= $endPage; $i++) {
        if ($i == $halamanAktif) {
            echo "<a href='?page=$i' class='hal fs-5 badge bg-secondary text-wrap text-center mx-3'>$i</a>";
        } else {
            echo "<a href='?page=$i' class='hal mx-3'>$i</a>";
        }
    }
    ?>
</div>

<div class="next-icon">
    <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a class="fs-5 badge bg-primary text-wrap mx-3" href="?page=<?= $halamanAktif + 1; ?>"><i class='bx bx-chevron-right'></i></a>
    <?php endif; ?>
</div>

</div>


        </center>
        
        <!-- navigasi -->
        

    </section>

    <!-- <script src="tambah.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>