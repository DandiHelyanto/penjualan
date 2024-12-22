<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM barang WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Barang</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Detail Barang</h1>
    <p>ID: <?php echo $row['id']; ?></p>
    <p>Nama Barang: <?php echo $row['nama_barang']; ?></p>
    <p>Harga: <?php echo $row['harga']; ?></p>
    <p>Stok: <?php echo $row['stok']; ?></p>
    <a href="index.php">Kembali</a>
</body>
</html>
