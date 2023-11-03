<?php 
    session_start();

    if (!isset($_SESSION["login"]) || !isset($_SESSION["pengguna"]))  {
        header("Location: login.php");
        exit;
    }


    require 'functions.php';
    // untuk tampilkan data
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nim");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

        .mhs-heading {
            margin-bottom: 2rem;
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
        .mahasiswa-section {
            padding: 3rem 7%;
        }
        .mahasiswa-section h1 {
            color: var(--primary-color);
        }
        .mahasiswa-section span {
            color: var(--sec-color);
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="mahasiswa.php">Univ.</a>
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
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <section class="mahasiswa-section">
        <center>
            <div class="mhs-heading">
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
                </tr>

                <?php $i = 1;?>
                <?php foreach($mahasiswa as $row) : ?>
                <tr>
                    <td class="p-3"><?= $i; ?></td>
                    <td class="p-3"><?= $row["nama"]; ?></td>
                    <td class="p-3"><?= $row["nim"]; ?></td>
                    <td class="p-3"><?= $row["fakultas"]; ?></td>
                    <td class="p-3"><?= $row["jurusan"]; ?></td>
                </tr>
                <?php $i++?>
                <?php endforeach; ?>
            </table>
        </center>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>