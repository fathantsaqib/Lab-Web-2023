<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClassicModels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #393646;
        }

        .hero__video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
        }

        .hero__overlay {
            position: absolute;
            opacity: 0.5;
            z-index: 1;
        }

        .hero__content-width {
            max-width: 540px;
        }

        nav {
            z-index: 2;
            margin: auto;
            padding: 35px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav ul li {
            list-style: none;
            display: inline-block;
            margin: 0 20px;
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
        }

        nav ul li::after {
            content: '';
            height: 3px;
            width: 0;
            background: #000000;
            position: absolute;
            left: 0;
            bottom: -5px;
            transition: 0.5s;
        }

        nav ul li:hover::after {
            width: 100%;
        }

        img {
            width: 100px;
            cursor: pointer;
        }

        .btn__main {
            width: 200px;
            text-align: center;
            border-radius: 20px;
            font-weight: bold;
            border: 2px solid #fff;
            background: transparent;
            color: #fff;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn__main span {
            background: #fff;
            height: 100%;
            width: 0;
            border-radius: 25px;
            position: absolute;
            left: 0;
            bottom: 0;
            z-index: -1;
            transition: 0.5s;
        }

        .btn__main:hover span {
            width: 100%;
        }

        .btn__main:hover {
            border: none;
        }

        h2 {
            color: #fff
        }

        label {
            color: #fff;
            word-wrap: break-word;
            width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        span {
            color: #fff
        }

        .container1 {
            display: flex; 
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #008bc2;
            width: 650px;
            padding: 1.4rem;
            border-radius: 10px;
            border: 1px solid #f7f7f7;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #008bc2; background: linear-gradient(to top, transparent, #008bc2);">
        <div class="container">
            <ul>
                <li>
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/" style="color: #fff"><svg
                            xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-house-door" viewBox="0 0 16 16">
                            <path
                                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
                        </svg></a>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-4" id="navbarNav">
                <ul class="navbar-nav me-auto">
                </ul>
                <form class="d-flex align-items-end" action="{{ route('productlines') }}" method="GET">
                    <input class="form-control me-2" type="search" name="productLine"
                        placeholder="Search by Product Line" aria-label="Search">
                    <button class="btn btn__main" style="background-color: #302ebd; color: #fff"
                        type="submit"><span></span>Search</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="container container1">
        <h2 class="mt-4">Informasi Produk</h2>
        <table>
            <form>
                <tr>
                    <h3><label></label></h3>
                    <h3><span>{{ $product->productName }}</span></h3>
                </tr>
                <tr>
                    <td><label>Jenis Produk</label></td>
                    <td><span>: {{ $product->productLine }}</span></td>
                </tr>
                <tr>
                    <td><label>Skala Produk</label></td>
                    <td><span>: {{ $product->productScale }}</span></td>
                </tr>
                <tr>
                    <td><label>Product Vendor</label></td>
                    <td><span>: {{ $product->productVendor }}</span></td>
                </tr>
                <tr>
                    <td><label>Deskripsi</label></td>
                    <td><span>: {{ $product->productDescription }}</span></td>
                </tr>
                <tr>
                    <td><label>Stock</label></td>
                    <td><span>: {{ $product->quantityInStock }}</span></td>
                </tr>
                <tr>
                    <td><label>Harga Beli</label></td>
                    <td><span>: {{ $product->buyPrice }}</span></td>
                </tr>
                <tr>
                    <td><label>Harga Jual</label></td>
                    <td><span>: {{ $product->MSRP }}</span></td>
                </tr>
            </form>
        </table>
        <a href="/product" class="btn btn__main mt-5" style="background-color: #302ebd">Back to products</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
