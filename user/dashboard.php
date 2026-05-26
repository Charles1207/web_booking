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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>User Dashboard</title>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
/* ===================================================== */
/* FLATPICKR PREMIUM CLEAN */
/* ===================================================== */

.flatpickr-calendar{

    background:
    linear-gradient(
        145deg,
        #0f172a,
        #1e293b
    ) !important;

    border:none !important;

    border-radius:24px !important;

    width:360px !important;

    padding:18px !important;

    box-shadow:
    0 25px 45px rgba(0,0,0,.45) !important;

    overflow:hidden;
}

/* ===================================================== */
/* HEADER */
/* ===================================================== */

.flatpickr-months{

    margin-bottom:12px;
}

.flatpickr-month{

    height:55px !important;
}

.flatpickr-current-month{

    display:flex !important;

    justify-content:center;

    align-items:center;

    gap:8px;

    padding-top:8px !important;

    color:white !important;

    font-size:20px !important;

    font-weight:700 !important;
}

/* MONTH DROPDOWN */

.flatpickr-monthDropdown-months{

    background:transparent !important;

    color:white !important;

    border:none !important;

    font-weight:700 !important;
}

/* YEAR */

.numInputWrapper input{

    color:white !important;

    font-weight:700 !important;
}

/* ===================================================== */
/* ARROWS */
/* ===================================================== */

.flatpickr-prev-month,
.flatpickr-next-month{

    fill:white !important;

    padding:10px !important;

    transition:.2s ease;
}

.flatpickr-prev-month:hover,
.flatpickr-next-month:hover{

    background:
    rgba(255,255,255,.08);

    border-radius:12px;

    transform:scale(1.08);
}

/* ===================================================== */
/* WEEKDAY */
/* ===================================================== */

.flatpickr-weekdays{

    margin-bottom:8px;
}

.flatpickr-weekday{

    color:#93c5fd !important;

    font-size:12px !important;

    font-weight:700 !important;

    text-transform:uppercase;
}

/* ===================================================== */
/* DAYS */
/* ===================================================== */

.flatpickr-days{

    width:100% !important;
}

.dayContainer{

    width:100% !important;

    min-width:100% !important;

    max-width:100% !important;
}

/* ===================================================== */
/* DAY */
/* ===================================================== */

.flatpickr-day{

    width:42px !important;

    height:42px !important;

    line-height:42px !important;

    max-width:42px !important;

    border-radius:14px !important;

    color:white !important;

    font-size:14px !important;

    font-weight:500 !important;

    border:none !important;

    transition:
    background .2s ease,
    transform .2s ease;
}

/* HOVER */

.flatpickr-day:hover{

    background:
    rgba(59,130,246,.22) !important;

    transform:translateY(-1px);
}

/* TODAY */

.flatpickr-day.today{

    border:
    1px solid #60a5fa !important;
}

/* SELECTED */

.flatpickr-day.selected,
.flatpickr-day.startRange,
.flatpickr-day.endRange{

    background:
    linear-gradient(
        135deg,
        #3b82f6,
        #2563eb
    ) !important;

    color:white !important;

    box-shadow:
    0 8px 20px rgba(37,99,235,.35);
}

/* DISABLED */

.flatpickr-day.flatpickr-disabled{

    opacity:.25;
}

/* ===================================================== */
/* TIME PICKER */
/* ===================================================== */

/* ===================================================== */
/* FIX TIME PICKER */
/* ===================================================== */

.flatpickr-time{

    display:flex !important;

    align-items:center;

    justify-content:center;

    height:60px !important;

    margin-top:12px;

    border-top:
    1px solid rgba(255,255,255,.08);

    padding-top:10px;
}

.flatpickr-time .numInputWrapper{

    width:70px !important;
}

.flatpickr-time input{

    width:100% !important;

    height:42px !important;

    background:
    rgba(255,255,255,.08) !important;

    border:none !important;

    border-radius:12px !important;

    color:white !important;

    font-size:18px !important;

    font-weight:600 !important;

    text-align:center;
}

/* TITIK DUA */

.flatpickr-time .flatpickr-time-separator{

    color:white !important;

    font-size:20px !important;

    font-weight:700 !important;

    padding:0 10px;
}

/* ===================================================== */
/* MOBILE */
/* ===================================================== */

@media(max-width:768px){

    .flatpickr-calendar{

        width:100% !important;

        max-width:100% !important;

        border-radius:22px !important;
    }

    .flatpickr-day{

        width:100% !important;

        max-width:100% !important;
    }

}
.booking-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
    margin-top:18px;
}

/* ===================================================== */
/* MODERN INPUT */
/* ===================================================== */

.input-group-modern{
    display:flex;
    flex-direction:column;
    gap:10px;
}

.input-group-modern label{
    font-size:14px;
    font-weight:600;
    color:#e2e8f0;
    letter-spacing:.3px;
}

/* ===================================================== */
/* INPUT WRAPPER */
/* ===================================================== */

.input-wrapper{
    position:relative;

    display:flex;
    align-items:center;

    height:58px;

    border-radius:20px;

    background:
    rgba(255,255,255,0.08);

    border:1px solid rgba(255,255,255,0.08);

    overflow:hidden;

    transition:all .25s ease;

    backdrop-filter:blur(10px);
}

/* HOVER */

.input-wrapper:hover{
    background:
    rgba(255,255,255,0.12);

    transform:translateY(-1px);
}

/* FOCUS */

.input-wrapper:focus-within{

    border-color:#60a5fa;

    background:
    rgba(255,255,255,0.14);

    box-shadow:
    0 0 0 4px rgba(96,165,250,.15),
    0 10px 25px rgba(37,99,235,.18);
}

/* ===================================================== */
/* ICON */
/* ===================================================== */

.icon{
    width:56px;
    height:100%;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:18px;

    color:#93c5fd;

    border-right:
    1px solid rgba(255,255,255,0.06);
}

/* ===================================================== */
/* INPUT */
/* ===================================================== */

.input-wrapper input{
    width:100%;
    height:100%;

    border:none;
    outline:none;

    background:transparent;

    color:white;

    font-size:15px;
    font-weight:500;

    padding:0 16px;
}

/* DATE/TIME TEXT */

.input-wrapper input::-webkit-datetime-edit{
    color:white;
}

/* CALENDAR ICON */

.input-wrapper input::-webkit-calendar-picker-indicator{
    cursor:pointer;

    opacity:.85;

    filter:invert(1);

    margin-right:8px;

    transition:.2s;
}

.input-wrapper input::-webkit-calendar-picker-indicator:hover{
    opacity:1;
    transform:scale(1.08);
}

/* ===================================================== */
/* PLACEHOLDER */
/* ===================================================== */

.input-wrapper input::placeholder{
    color:#cbd5e1;
}

/* ===================================================== */
/* MOBILE */
/* ===================================================== */

@media(max-width:768px){

    .booking-grid{
        grid-template-columns:1fr;
        gap:15px;
    }

    .input-wrapper{
        height:55px;
        border-radius:18px;
    }

    .input-wrapper input{
        font-size:14px;
    }

}
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

            <div class="booking-grid">

                <div class="input-group-modern">
                    <label>Tanggal Booking</label>

                    <div class="input-wrapper">
                        <span class="icon">📅</span>

                        <input 
                            type="text" 
                            id="tanggal"
                            name="tanggal" 
                            placeholder="Pilih tanggal booking"
                            
                            required
                        >
                    </div>
                </div>

                <div class="input-group-modern">
                    <label>Jam Booking</label>

                    <div class="input-wrapper">
                        <span class="icon">🕒</span>

                        <input 
                            type="text" 
                            id="jam_booking"
                            name="jam_booking" 
                            placeholder="Pilih jam booking"
                            required
                        >
                    </div>
                </div>

            </div>
            <!-- BUTTON -->
            <button type="submit">

                Booking Sekarang

            </button>

        </form>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

flatpickr("#tanggal", {

    dateFormat:"Y-m-d",

    altInput:true,

    altFormat:"d F Y",

    minDate:"today",

    disableMobile:true,

    monthSelectorType:"static",

    animate:true

});

flatpickr("#jam_booking", {

    enableTime:true,

    noCalendar:true,

    dateFormat:"H:i",

    time_24hr:true,

    minuteIncrement:30,

    disableMobile:true

});

</script>
</body>
</html>