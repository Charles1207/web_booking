<?php

session_start();

require_once '../config/db.php';

$data = mysqli_query($conn, "SELECT * FROM perangkat");

/* =====================================================
DATA BOOKING
===================================================== */

$booking = mysqli_query($conn,
"SELECT
bookings.*,
users.email,
perangkat.nama_perangkat
FROM bookings
JOIN users ON bookings.user_id = users.id
JOIN perangkat ON bookings.perangkat_id = perangkat.id
ORDER BY tanggal ASC");

/* =====================================================
NOTIFIKASI HARI INI
===================================================== */

$today = date('Y-m-d');

$today_booking = mysqli_query($conn,
"SELECT
bookings.*,
perangkat.nama_perangkat
FROM bookings
JOIN perangkat ON bookings.perangkat_id = perangkat.id
WHERE tanggal='$today'");

?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard Admin</title>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

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
    width:94%;
    max-width:1180px;
    margin:auto;
}

/* ===================================================== */
/* NAVBAR */
/* ===================================================== */

.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:28px;
    gap:20px;
}

.title{
    font-size:42px;
    font-weight:700;
    letter-spacing:-1px;
}

/* ===================================================== */
/* ACTION BUTTONS */
/* ===================================================== */

.nav-right{
    display:flex;
    align-items:center;
    gap:14px;
}

.add-btn,
.logout{
    text-decoration:none;
    padding:13px 22px;
    border-radius:16px;
    font-size:14px;
    font-weight:600;
    transition:.3s;
    display:flex;
    align-items:center;
    justify-content:center;
}

.add-btn{
    background:
    linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
    box-shadow:0 10px 25px rgba(37,99,235,.3);
}

.add-btn:hover{
    transform:translateY(-3px);
}

.logout{
    background:#ef4444;
    color:white;
    box-shadow:0 10px 25px rgba(239,68,68,.25);
}

.logout:hover{
    background:#dc2626;
    transform:translateY(-3px);
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

    padding:26px;

    backdrop-filter:blur(18px);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.25);

    margin-bottom:28px;
}

/* ===================================================== */
/* SECTION TITLE */
/* ===================================================== */

.section-title{
    font-size:28px;
    font-weight:700;
    margin-bottom:22px;
}

/* ===================================================== */
/* TABLE */
/* ===================================================== */

.table-wrapper{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:separate;
    border-spacing:0 10px;
}

table th{
    background:rgba(255,255,255,0.08);
    color:#e2e8f0;
    font-size:14px;
    font-weight:600;
    padding:18px;
    text-align:left;
}

table th:first-child{
    border-top-left-radius:14px;
    border-bottom-left-radius:14px;
}

table th:last-child{
    border-top-right-radius:14px;
    border-bottom-right-radius:14px;
}

table td{
    background:rgba(255,255,255,0.03);
    padding:18px;
    font-size:14px;
    color:#f8fafc;
}

table td:first-child{
    border-top-left-radius:14px;
    border-bottom-left-radius:14px;
}

table td:last-child{
    border-top-right-radius:14px;
    border-bottom-right-radius:14px;
}

table tr{
    transition:.3s;
}

table tr:hover td{
    background:rgba(255,255,255,0.06);
}

/* ===================================================== */
/* BADGE */
/* ===================================================== */

.badge{
    background:
    linear-gradient(135deg,#22c55e,#16a34a);

    color:white;

    padding:7px 14px;

    border-radius:999px;

    font-size:12px;

    font-weight:700;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    min-width:42px;
}

/* ===================================================== */
/* ALERT */
/* ===================================================== */

.alert{
    background:
    linear-gradient(135deg,#f59e0b,#d97706);

    padding:20px;

    border-radius:22px;

    margin-bottom:28px;

    box-shadow:
    0 10px 25px rgba(217,119,6,.25);
}

.alert-title{
    font-size:22px;
    font-weight:700;
    margin-bottom:12px;
}

.alert p{
    margin-bottom:10px;
    line-height:1.7;
}

/* ===================================================== */
/* RESPONSIVE */
/* ===================================================== */

@media(max-width:768px){

    body{
        padding:18px 0;
    }

    .navbar{
        flex-direction:column;
        align-items:flex-start;
    }

    .nav-right{
        width:100%;
    }

    .add-btn,
    .logout{
        flex:1;
    }

    .title{
        font-size:30px;
    }

    .section-title{
        font-size:22px;
    }

    table th,
    table td{
        padding:14px;
        font-size:13px;
    }

}
.action-group{
    display:flex;
    gap:10px;
}

.edit-btn,
.delete-btn{

    padding:9px 14px;

    border-radius:12px;

    text-decoration:none;

    color:white;

    font-size:13px;

    font-weight:600;

    transition:.3s;
}

.edit-btn{
    background:#3b82f6;
}

.edit-btn:hover{
    background:#2563eb;
}

.delete-btn{
    background:#ef4444;

    border:none;

    cursor:pointer;

    position:relative;

    overflow:hidden;
}

.delete-btn::after{

    content:'';

    position:absolute;

    width:0;
    height:0;

    background:rgba(255,255,255,0.2);

    border-radius:50%;

    top:50%;
    left:50%;

    transform:translate(-50%,-50%);

    transition:.5s;
}

.delete-btn:hover::after{

    width:220px;
    height:220px;
}
</style>

</head>

<body>

<div class="container">

    <!-- NAVBAR -->
    <div class="navbar">

        <div class="title">
            Dashboard Admin
        </div>

        <div class="nav-right">

            <a href="tambah_perangkat.php"
            class="add-btn">

                + Tambah Perangkat

            </a>

            <a href="../logout.php"
            class="logout">

                Logout

            </a>

        </div>

    </div>

    <!-- ALERT BOOKING HARI INI -->
    <?php if(mysqli_num_rows($today_booking) > 0){ ?>

    <div class="alert">

        <div class="alert-title">
            📅 Pengingat Booking Hari Ini
        </div>

        <?php while($today_data = mysqli_fetch_assoc($today_booking)){ ?>

            <p style="margin-bottom:8px;">

                <b><?= $today_data['nama_perangkat']; ?></b>

                dibooking sebanyak

                <b><?= $today_data['jumlah']; ?></b>

                unit hari ini.

            </p>

        <?php } ?>

    </div>

    <?php } ?>

    <!-- DATA PERANGKAT -->
    <div class="card">

        <div class="section-title">
            Data Perangkat
        </div>

        <div class="table-wrapper">

        <table>

            <tr>
                <th>Nama Perangkat</th>
                <th>Quantity Per Hari</th>
                <th>Aksi</th>
            </tr>

            <?php while($d = mysqli_fetch_assoc($data)){ ?>

            <tr>

                <td>
                    <?= $d['nama_perangkat'] ?>
                </td>

                <td>
                    <span class="badge">
                        <?= $d['quantity'] ?>
                    </span>
                </td>

                <td>

                    <div class="action-group">

                        <a href="edit_perangkat.php?id=<?= $d['id']; ?>"
                        class="edit-btn">

                            Edit
                        </a>
                        <button
                            class="delete-btn"
                            onclick="hapusPerangkat(<?= $d['id']; ?>)">

                                Hapus

                            </button>

                    </div>

                </td>

            </tr>

            <?php } ?>

        </table>

        </div>

    </div>

    <!-- DATA BOOKING -->
    <div class="card">

        <div class="section-title">
            Data Booking User
        </div>

        <div class="table-wrapper">

        <table>

            <tr>

                <th>User</th>
                <th>Perangkat</th>
                <th>Jumlah</th>
                <th>Tanggal Booking</th>
                <th>Jam Booking</th>

            </tr>

            <?php while($b = mysqli_fetch_assoc($booking)){ ?>

            <tr>

                <td>
                    <?= $b['email']; ?>
                </td>

                <td>
                    <?= $b['nama_perangkat']; ?>
                </td>

                <td>

                    <span class="badge">
                        <?= $b['jumlah']; ?>
                    </span>

                </td>

                <td>
                    <?= $b['tanggal']; ?>
                </td>
                <td>
                    <?= $b['jam_booking']; ?>
                </td>
            </tr>

            <?php } ?>

        </table>

        </div>

    </div>

</div>
<!-- SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

function hapusPerangkat(id){

    Swal.fire({

        title: 'Hapus Perangkat?',
        text: "Data yang dihapus tidak bisa dikembalikan",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#64748b',

        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',

        background:'#1e293b',
        color:'#fff',

        reverseButtons:true

    }).then((result) => {

        if(result.isConfirmed){

            Swal.fire({

                title:'Terhapus!',
                text:'Perangkat berhasil dihapus',
                icon:'success',

                confirmButtonColor:'#2563eb',

                background:'#1e293b',
                color:'#fff',

                timer:1200,
                showConfirmButton:false

            });

            setTimeout(() => {

                window.location =
                '../proses/hapus_perangkat.php?id=' + id;

            },1200);

        }

    });

}

</script>
</body>
</html>