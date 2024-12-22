<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM barang WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success' role='alert'>Barang berhasil dihapus</div>";
} else {
    echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
}

header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
</body>
</html>