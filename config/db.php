<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "booking_perangkat"
);

if(!$conn){
    die("Koneksi gagal" . mysqli_connect_error ());
}
?>