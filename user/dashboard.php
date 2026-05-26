<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    exit;
}

include '../config/db.php';

$query = mysqli_query($conn,
"SELECT * FROM perangkat");

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>User Dashboard</title>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

/* ===================================================== */
/* BODY */
/* ===================================================== */

body{
    background:
    linear-gradient(135deg,#0f172a,#172554,#1e293b);

    min-height:100vh;

    color:white;

    padding:35px 0;
}

/* ===================================================== */
/* CONTAINER */
/* ===================================================== */

.container{
    width:92%;
    max-width:720px;
    margin:auto;
}

/* ===================================================== */
/* NAVBAR */
/* ===================================================== */

.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:30px;
}

.title{
    font-size:34px;
    font-weight:700;
}

/* ===================================================== */
/* LOGOUT */
/* ===================================================== */

.logout{
    text-decoration:none;

    background:#ef4444;

    color:white;

    padding:12px 20px;

    border-radius:16px;

    font-weight:600;

    transition:.3s;
}

.logout:hover{
    background:#dc2626;

    transform:translateY(-2px);
}

/* ===================================================== */
/* CARD */
/* ===================================================== */

.card{

    background:
    linear-gradient(
        145deg,
        rgba(255,255,255,0.08),
        rgba(255,255,255,0.04)
    );

    border:1px solid rgba(255,255,255,0.08);

    border-radius:28px;

    padding:30px;

    backdrop-filter:blur(18px);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.25);
}

/* ===================================================== */
/* SECTION TITLE */
/* ===================================================== */

.section-title{
    font-size:28px;
    font-weight:700;

    margin-bottom:25px;
}

/* ===================================================== */
/* FORM */
/* ===================================================== */

.form-group{
    margin-bottom:22px;
}

label{
    display:block;

    margin-bottom:10px;

    font-size:14px;

    font-weight:500;

    color:#e2e8f0;
}

/* ===================================================== */
/* INPUT & SELECT */
/* ===================================================== */

input,
select{
    width:100%;

    padding:15px;

    border:none;

    outline:none;

    border-radius:16px;

    background:rgba(255,255,255,0.08);

    color:white;

    font-size:14px;
}

select option{
    color:black;
}

input::placeholder{
    color:#cbd5e1;
}

/* ===================================================== */
/* BUTTON */
/* ===================================================== */

button{
    width:100%;

    padding:15px;

    border:none;

    border-radius:18px;

    background:
    linear-gradient(135deg,#3b82f6,#2563eb);

    color:white;

    font-size:15px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

    margin-top:10px;
}

button:hover{
    transform:translateY(-2px);

    box-shadow:
    0 10px 25px rgba(37,99,235,.35);
}

/* ===================================================== */
/* RESPONSIVE */
/* ===================================================== */

@media(max-width:768px){

    body{
        padding:20px 0;
    }

    .navbar{
        flex-direction:column;
        align-items:flex-start;

        gap:15px;
    }

    .title{
        font-size:28px;
    }

    .card{
        padding:22px;
    }

}
/* ===================================================== */
/* DEVICE SELECT */
/* ===================================================== */

.device-list{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.device-option input{
    display:none;
}

.device-card{

    background:
    rgba(255,255,255,0.06);

    border:2px solid transparent;

    border-radius:20px;

    padding:18px 20px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    cursor:pointer;

    transition:.3s;
}

.device-card:hover{

    transform:translateY(-2px);

    background:
    rgba(255,255,255,0.10);
}

.device-name{

    font-size:18px;
    font-weight:600;

    margin-bottom:5px;
}

.device-stock{

    font-size:14px;

    color:#cbd5e1;
}

.device-icon{

    width:52px;
    height:52px;

    border-radius:16px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:24px;

    background:
    linear-gradient(135deg,#3b82f6,#2563eb);
}

/* ===================================================== */
/* ACTIVE DEVICE */
/* ===================================================== */

.device-option input:checked + .device-card{

    border:2px solid #60a5fa;

    background:
    rgba(59,130,246,0.18);

    box-shadow:
    0 10px 25px rgba(37,99,235,.25);
}
</style>

</head>

<body>

<div class="container">

    <!-- NAVBAR -->
    <div class="navbar">

        <div class="title">
            Booking Perangkat
        </div>

        <a href="../logout.php"
        class="logout">

            Logout

        </a>

    </div>

    <!-- CARD -->
    <div class="card">

        <div class="section-title">
            Form Booking
        </div>

        <form action="booking.php"
        method="POST">

            <!-- PILIH PERANGKAT -->
            <div class="form-group">

                <label>
                    Pilih Perangkat
                </label>

                <div class="device-list">

                    <?php
                    while($data = mysqli_fetch_assoc($query)){
                    ?>

                    <label class="device-option">

                        <input
                        type="radio"
                        name="perangkat_id"
                        value="<?= $data['id']; ?>"
                        required>

                        <div class="device-card">

                            <div class="device-info">

                                <div class="device-name">
                                    <?= $data['nama_perangkat']; ?>
                                </div>

                                <div class="device-stock">
                                    Stock:
                                    <?= $data['quantity']; ?>
                                </div>

                            </div>

                            <div class="device-icon">
                                💻
                            </div>

                        </div>

                    </label>

                    <?php } ?>

                </div>

            </div>

            <!-- JUMLAH -->
            <div class="form-group">

                <label>
                    Jumlah Booking
                </label>

                <input
                type="number"
                name="jumlah"
                min="1"
                placeholder="Masukkan jumlah booking"
                required>

            </div>

            <!-- TANGGAL -->
            <div class="form-group">

                <label>
                    Tanggal Booking
                </label>

                <input
                type="date"
                name="tanggal"
                required>

            </div>

            <!-- BUTTON -->
            <button type="submit">

                Booking Sekarang

            </button>

        </form>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>