<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM barang WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "UPDATE barang SET nama_barang='$nama_barang', harga=$harga, stok=$stok WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Barang berhasil diupdate</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Edit Barang</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $row['stok']; ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
