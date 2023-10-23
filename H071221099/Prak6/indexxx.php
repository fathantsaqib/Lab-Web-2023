<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>

    <style>
        body {
            background-color: white;
            color: #2e2828;
        }
        form {
            margin-top : 2rem;
        }
        input {
            padding: 0.5rem;
            border-radius: 10px;
            border: 1px solid black
        }
        td {
            background-color: #fff;
            padding: .5rem;
        }

        th {
            background-color: lightblue;
            padding: 0.6rem;
        }
        .button {
            background-color: #fef4f4;
            cursor: pointer;  
        }
        .button:hover {
            background-color: #2e2828;
            color: #fef4f4;
        }
        .container {
            background-color: lightblue;
            width: 400px;
            padding: 2rem;
            border: 1px solid #fef4f4;
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <center>
    <div class="container">
        <h1>Data Barang</h1>
        <form method="post">
            <label for="jenis_barang">Jenis Barang:</label>
            <input type="text" name='jenis_barang' id='jenis_barang' placeholder='Masukkan Jenis Barang'>
            <input class="button" type="submit" value="Tampilkan Data">
        </form>
    </div>

    <?php
    $data = [
        [
            "nama_barang" => "HP",
            "harga" => 3000000,
            "stok" => 10,
            "jenis" => "elektronik"
        ],
        [
            "nama_barang" => "Jeruk",
            "harga" => 5000,
            "stok" => 20,
            "jenis" => "buah"
        ],
        [
            "nama_barang" => "Kemeja",
            "harga" => 5000,
            "stok" => 9,
            "jenis" => "pakaian"
        ],
        [
            "nama_barang" => "Apel",
            "harga" => 5000,
            "stok" => 5,
            "jenis" => "buah"
        ],
        [
            "nama_barang" => "Celana",
            "harga" => 5000,
            "stok" => 10,
            "jenis" => "pakaian"
        ],
        [
            "nama_barang" => "Laptop",
            "harga" => 50000,
            "stok" => 30,
            "jenis" => "elektronik"
        ],
        [
            "nama_barang" => "Semangka",
            "harga" => 5000,
            "stok" => 2,
            "jenis" => "buah"
        ],
        [
            "nama_barang" => "Kaos",
            "harga" => 5000,
            "stok" => 1,
            "jenis" => "pakaian"
        ],
        [
            "nama_barang" => "VGA",
            "harga" => 2000000,
            "stok" => 0,
            "jenis" => "elektronik"
        ]
    ];

    if (isset($_POST['jenis_barang'])) {  //memeriksa apakah suatu variabel telah diinisialisasi dan memiliki nilai atau tidak
        $jenis_barang = strtolower($_POST['jenis_barang']);
        
        echo "<h2>Data Barang dengan Jenis $jenis_barang</h2>"; 
        echo "<table border='1'>";
        echo "<tr>";
            foreach($data[0] as $key => $value){
                echo "<th>" . ucfirst($key) . "</th>";
            };
        echo "</tr>";
        
        foreach ($data as $barang) {   //melakukan iterasi melalui data barang
            if ($barang['jenis'] === $jenis_barang) {
                echo "<tr>
                    <td>" . $barang['nama_barang'] . "</td>
                    <td>" . $barang['harga'] . "</td>
                    <td>" . $barang['stok'] . "</td>
                    <td>" . ucfirst($barang['jenis']) . "</td>
                </tr>";
            }
        }
        
        echo "</table>";
    }
    ?>

    
    </center>
</body>
</html>