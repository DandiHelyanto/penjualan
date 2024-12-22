<?php
include 'config.php';

// Mendapatkan nilai pencarian dari formulir
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Membuat query pencarian
if ($searchTerm) {
    $searchQuery = "SELECT * FROM barang WHERE nama_barang LIKE '%$searchTerm%'";
} else {
    $searchQuery = "SELECT * FROM barang";
}

// Eksekusi query
$result = $conn->query($searchQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penjualan Barang</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- Menampilkan Header -->
    <div class="header">
        <?php echo $headerContent; ?>
    </div>

    <!-- Form Pencarian -->
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Cari barang..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit">Cari</button>
    </form>

    <h1>Daftar Barang</h1>
    <a href="create.php" class="btn btn-primary mb-4">Tambah Barang</a>
    <table class="table table-bordered">   
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td><?php echo $row['harga']; ?></td>
                <td><?php echo $row['stok']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Tidak ada barang yang ditemukan</td>
            </tr>
        <?php endif; ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<!-- Menampilkan Footer -->
    <div class="footer">
        <?php echo $footerContent; ?>
    </div>
</html>
