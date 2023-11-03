<!-- Edit Data -->
<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdaasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
    if(isset($_POST["submit"]) ) {

        // cek apakah data berhasil diubah atau tidak
        if(ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Berhasil Diubah');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script> 
                    alert('Data Gagal Diubah');
                    document.location.href = 'index.php';
                </script>
            ";
        }
         
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
        label {
            display: block;
        }
        input {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            width: 520px;
            padding: .3rem;
        }
        input:focus{
            outline: 1px solid #2C5B8E;
        }
        .navbar .search-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 350px;
        }

        .dropdown ,a i {
            color: white;
        }

        .edit-container{
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 17%;
            left: 50%;
            transform: translateX(-50%);
        }
        .edit-content {
            display: flex;
            flex-direction: column;
            padding: 4rem;
            color: black;
            border: 1px solid #2C5B8E;
            border-radius: 5px;
            padding-bottom: -1rem;
        }
        h1 {
            font-weight: 600;
        }
        
        .btn {
            width: 520px;
        }
        .form-select {
            margin-bottom: -1.5rem;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="insert.php">Univ.</a>
        </div>
        <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto"> <!-- Gunakan "ml-auto" untuk menggeser ke kanan -->
                <li class="nav-item dropdown fs-2">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bxs-user-circle'></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php">Dashboard</a></li>
                        <li><a class="dropdown-item" href="insert.php">Tambah Data<br>Mahasiswa</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- <div class="edit-content">
        <h1>Edit Data Mahasiswa</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"];?>">
            <br><br>
            <label for="nim">NIM : </label>
            <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"];?>">
            <br><br>
            <label for="fakultas">Fakultas : </label>
            <input type="text" name="fakultas" id="fakultas" required value="<?= $mhs["fakultas"];?>">
            <br><br>
            <label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"];?>">
            <br><br>
            <button type="submit" name="submit">Edit Data!</button>
            <br><br>
        </form>
    </div> -->

    <div class="edit-container">    
        <div class="edit-content">
        <h1>Edit Data Mahasiswa</h1>
            
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
                <br><br>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
                <br><br>
                <label for="fakultas">Fakultas : </label>
                <select class="form-select" name="fakultas" id="fakultas" required>
                    <option selected><?= $mhs["fakultas"]; ?></option>
                    <option value="Mipa">Mipa</option>
                    <option value="Teknik">Teknik</option>
                    <option value="Ekonomi Bisnis">Ekonomi Bisnis</option>
                    <option value="Hukum">Hukum</option>
                    <option value="Ilmu Sosial Politik">Ilmu Sosial Politik</option>
                    <option value="Ilmu Budaya">Ilmu Budaya</option>
                    <option value="Kedokteran">Kedokteran</option>
                    <option value="Kedokteran Gigi">Kedokteran Gigi</option>
                    <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                    <option value="Farmasi">Farmasi</option>
                    <option value="Keperawatan">Keperawatan</option>
                    <option value="Pertanian">Pertanian</option>
                    <option value="Peternakan">Peternakan</option>
                    <option value="Ilmu Kelautan dan Perikanan">Ilmu Kelautan dan Perikanan</option>
                    <option value="Kehutanan">Kehutanan</option>
                </select>
                <br><br>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
                <br><br>
                <button type="submit" name="submit" class="btn btn-primary">Edit Data!</button>
                <br><br>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>