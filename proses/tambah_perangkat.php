<?php
include '../config/db.php';

$nama = $_POST['nama_perangkat'];
$quantity = $_POST['quantity'];

mysqli_query($conn,
"INSERT INTO perangkat(nama_perangkat,quantity)
VALUES('$nama','$quantity')");

header("Location: ../admin/dashboard.php");
?>