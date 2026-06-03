<?php

session_start();
include '../config/db.php';

if(isset($_POST['booking_id'])){

    foreach($_POST['booking_id'] as $id){

        mysqli_query($conn,"
        UPDATE bookings
        SET status='dikembalikan'
        WHERE id='$id'
        ");
    }
}

header("Location: dashboard.php");
exit;