<?php 
require 'functions.php';

    if(isset($_POST["register"])) {
        if(registrasi($_POST) > 0) {
            echo "<script> 
                    alert('User Baru Berhasil Ditambahkan')
                    document.location.href = 'login.php';
                </script>";
                
        } else {
            echo mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Account</title>

    <style>
        label {
            display: block;
        }
        input {
            width: 235px;
            height: 40px;
            border-radius: 5px;
            border: 1px solid black;
            padding: 10px;
        }
        .navbar-brand{
            letter-spacing: 1px;
        }
        .nav-item {
            letter-spacing: 1px;
        }

        .signup-section {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .signup-content {
            border: 1px solid #2C5B8E;
            border-radius: 5px;
            padding: 4rem;
            display: flex;
            flex-direction: column;
            color: var(--black);
            top: 25%;
        }

        .signup-content h1{
            font-weight: 600;
        }

        .signup-content .signup-btn {
            padding: .5rem 92px;
        }
        
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg mx-auto">
        <div class="container">
            <a class="navbar-brand text-white" href="registrasi.php">Univ.</a>
        </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="registrasi.php">SignUp</a>
                </li>
            </ul>
        </div>
    </nav>  


    <section class="signup-section">
        <div class="signup-content">
            <h1>Sign Up</h1>

            <form action="" method="post">
                <label for="username">Username : </label>
                <br>
                <input type="text" name="username" id="username" placeholder="Ex. H0xxxxxxxx">
                <br><br>
                <label for="password">Password : </label>
                <br>
                <input type="password" name="password" id="password">
                <br><br>
                <label for="password2">Confirm Password : </label>
                <br>
                <input type="password" name="password2" id="password2">
                <br><br>
                <button type="submit" name="register" class="btn btn-primary signup-btn">Regist</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>