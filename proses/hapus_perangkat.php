<?php

include '../config/db.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM perangkat
WHERE id='$id'");

header("Location: ../admin/dashboard.php");
?>