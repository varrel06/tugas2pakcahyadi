<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistem Pencatatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFFBE6; /* Warna kuning pastel */
        }
        .container {
            text-align: center;
            margin: 100px auto;
            max-width: 600px;
            background: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem;
            color: #555500; /* Warna teks lebih gelap */
        }
        p {
            color: #666633; /* Warna teks pastel */
            margin-bottom: 20px;
        }
        .menu {
            margin-top: 20px;
        }
        .menu a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: #FFFFFF;
            background-color: #FFD700; /* Warna kuning pastel untuk tombol */
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s ease;
        }
        .menu a:hover {
            background-color: #FFC300; /* Warna kuning pastel lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Sistem Pencatatan</h1>
        <p>Gunakan aplikasi ini untuk mengelola data barang dan pelanggan Anda dengan mudah.</p>
        <div class="menu">
            <a href="data.php">Kelola Barang</a>
            <a href="data.php">Kelola Customer</a>
        </div>
    </div>
</body>
</html>