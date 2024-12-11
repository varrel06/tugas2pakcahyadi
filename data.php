<?php
require_once 'Barang.php';
require_once 'BarangManager.php';
require_once 'CustomerManager.php';

$barangManager = new BarangManager();
$customerManager = new CustomerManager();

// Menangani form tambah barang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $barangManager->tambahBarang($nama, $harga, $stok);
    header('Location: index.php'); // Redirect untuk mencegah resubmission
}

// Menangani penghapusan barang
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $barangManager->hapusBarang($id);
    header('Location: index.php'); // Redirect setelah menghapus
}

// Menangani form tambah pelanggan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_customer'])) {
    $nama = $_POST['nama_customer'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $customerManager->tambahCustomer($nama, $alamat, $telepon);
    header('Location: index.php'); // Redirect untuk mencegah resubmission
}

// Menangani penghapusan pelanggan
if (isset($_GET['hapus_customer'])) {
    $id = $_GET['hapus_customer'];
    $customerManager->hapusCustomer($id);
    header('Location: index.php'); // Redirect setelah menghapus
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Barang & Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .btn {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-add {
            background-color: #28a745;
        }
        .btn-delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pencatatan Barang</h1>
        <!-- Form Barang -->
        <form method="POST" action="">
            <div>
                <label for="nama">Nama Barang:</label><br>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="harga">Harga Barang:</label><br>
                <input type="number" id="harga" name="harga" required>
            </div>
            <div>
                <label for="stok">Stok Barang:</label><br>
                <input type="number" id="stok" name="stok" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-add">Tambah Barang</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barangManager->getBarang() as $barang): ?> 
                    <tr>
                        <td><?= $barang['id'] ?></td>
                        <td><?= $barang['nama'] ?></td>
                        <td><?= $barang['harga'] ?></td>
                        <td><?= $barang['stok'] ?></td>
                        <td>
                            <a href="?hapus=<?= $barang['id'] ?>" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Pencatatan Pelanggan</h2>
        <!-- Form Pelanggan -->
        <form method="POST" action="">
            <div>
                <label for="nama_customer">Nama Pelanggan:</label><br>
                <input type="text" id="nama_customer" name="nama_customer" required>
            </div>
            <div>
                <label for="alamat">Alamat:</label><br>
                <textarea id="alamat" name="alamat" required></textarea>
            </div>
            <div>
                <label for="telepon">Telepon:</label><br>
                <input type="text" id="telepon" name="telepon" required>
            </div>
            <button type="submit" name="tambah_customer" class="btn btn-add">Tambah Pelanggan</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customerManager->getCustomers() as $customer): ?> 
                    <tr>
                        <td><?= $customer['id'] ?></td>
                        <td><?= $customer['nama'] ?></td>
                        <td><?= $customer['alamat'] ?></td>
                        <td><?= $customer['telepon'] ?></td>
                        <td>
                            <a href="?hapus_customer=<?= $customer['id'] ?>" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>