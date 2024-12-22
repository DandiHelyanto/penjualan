<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penjualan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data header dan footer
$headerQuery = "SELECT content FROM header_footer WHERE section = 'header'";
$footerQuery = "SELECT content FROM header_footer WHERE section = 'footer'";

$headerResult = $conn->query($headerQuery);
$footerResult = $conn->query($footerQuery);

$headerContent = ($headerResult->num_rows > 0) ? $headerResult->fetch_assoc()['content'] : '';
$footerContent = ($footerResult->num_rows > 0) ? $footerResult->fetch_assoc()['content'] : '';
?>
