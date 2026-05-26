<?php

include '../config/db.php';

$id = $_POST['id'];

$nama = $_POST['nama_perangkat'];

$quantity = $_POST['quantity'];

mysqli_query($conn,
"UPDATE perangkat
SET
nama_perangkat='$nama',
quantity='$quantity'
WHERE id='$id'");

header("Location: ../admin/dashboard.php");
?>