<?php

session_start();
include '../config/db.php';

$user_id = $_SESSION['id'];

$perangkat_id = $_POST['perangkat_id'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];

/* =====================================================
GET DEVICE
===================================================== */

$get = mysqli_query($conn,
"SELECT * FROM perangkat
WHERE id='$perangkat_id'");

$device = mysqli_fetch_assoc($get);

$max_qty = $device['quantity'];

/* =====================================================
CEK TOTAL BOOKING TANGGAL TERSEBUT
===================================================== */

$cek_booking = mysqli_query($conn,
"SELECT SUM(jumlah) as total_booking
FROM bookings
WHERE perangkat_id='$perangkat_id'
AND tanggal='$tanggal'");

$data_booking = mysqli_fetch_assoc($cek_booking);

$total_booking = $data_booking['total_booking'];

if($total_booking == null){
    $total_booking = 0;
}

$sisa = $max_qty - $total_booking;

/* =====================================================
VALIDASI STOCK
===================================================== */

if($jumlah > $sisa){

?>

<!DOCTYPE html>
<html>
<head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<script>

Swal.fire({
    icon:'error',
    title:'Booking Gagal',
    text:'Sisa perangkat pada tanggal tersebut hanya <?= $sisa ?>',
    confirmButtonColor:'#2563eb'
}).then(() => {
    window.location='dashboard.php';
});

</script>

</body>
</html>

<?php
exit;
}

/* =====================================================
INSERT BOOKING
===================================================== */

mysqli_query($conn,
"INSERT INTO bookings(
user_id,
perangkat_id,
jumlah,
tanggal
)
VALUES(
'$user_id',
'$perangkat_id',
'$jumlah',
'$tanggal'
)");

?>

<!DOCTYPE html>
<html>
<head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<script>

Swal.fire({
    icon:'success',
    title:'Booking Berhasil',
    text:'Perangkat berhasil dibooking',
    confirmButtonColor:'#2563eb'
}).then(() => {
    window.location='dashboard.php';
});

</script>

</body>
</html>