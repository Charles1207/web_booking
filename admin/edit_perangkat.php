<?php

include '../config/db.php';

$id = $_GET['id'];

$query = mysqli_query($conn,
"SELECT * FROM perangkat
WHERE id='$id'");

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Perangkat</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

<body>

<div class="container">

    <div class="navbar">

        <div class="title">
            Edit Perangkat
        </div>

        <a href="dashboard.php"
        class="logout">

            Kembali

        </a>

    </div>

    <div class="card">

        <form action="../proses/edit_perangkat.php"
        method="POST">

            <input
            type="hidden"
            name="id"
            value="<?= $data['id']; ?>">

            <div class="form-group">

                <label>
                    Nama Perangkat
                </label>

                <input
                type="text"
                name="nama_perangkat"
                value="<?= $data['nama_perangkat']; ?>"
                required>

            </div>

            <div class="form-group">

                <label>
                    Quantity
                </label>

                <input
                type="number"
                name="quantity"
                value="<?= $data['quantity']; ?>"
                required>

            </div>

            <button type="submit">

                Update Perangkat

            </button>

        </form>

    </div>

</div>

</body>
</html>