<?php 
// Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "universitas");


function query ($query) {
    // ambil data dari tabel mahasiswa
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk tambah data
function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam from
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // query insert data
    $query = "INSERT INTO mahasiswa
                VALUES 
            ('', '$nama', '$nim', '$fakultas', '$jurusan')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi untuk hapus data
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// Fungsi untuk edit data
function ubah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam from
    $id = $data["id"]; 
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // query edit data
    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                nim = '$nim',
                fakultas = '$fakultas',
                jurusan = '$jurusan'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi untuk searching data mahasiswa
function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
                WHERE 
              nama LIKE '%$keyword%' OR
              nim LIKE '%$keyword%' OR
              fakultas LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%' 
            ";
    return query($query);
}

// Fungsi untuk registrasi akun
function registrasi($data) {
    global $conn;

    $username = stripslashes($data["username"]);
    // $nim = mysqli_real_escape_string($conn, $data["nim"]);
    // echo $nim;

    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users Where username = '$username'");
    $result2 = mysqli_query($conn, "SELECT nim FROM mahasiswa Where nim = '$username'");
    
    $row = mysqli_fetch_assoc($result2);

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username Sudah Terdaftar!')
            </script>";
            return false;
    }

    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script> 
                alert('Confirm Password Tidak Sesuai!')
            </script>";
        return false;
    }


    if (!isset($row["nim"])) {
        echo "<script> 
                alert('NIM Tidak Ada!');
              </script>";
        return false;
    }
    
    // if ($username !== $row["nim"]) {
    //     echo "<script> 
    //             alert('NIM Tidak Cocok!');
    //           </script>";
    //     return false;
    // }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}

?>