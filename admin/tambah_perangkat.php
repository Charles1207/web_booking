<!DOCTYPE html>
<html>
<head>
    <title>Tambah Perangkat</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="container">

    <!-- NAVBAR -->
    <div class="navbar">

        <div class="title">
            Tambah Perangkat
        </div>

        <a href="dashboard.php" class="back-btn">
            ← Kembali
        </a>

    </div>

    <!-- CARD -->
    <div class="card form-box">

        <form action="../proses/tambah_perangkat.php" method="POST">

            <div class="form-group">

                <label>
                    Nama Perangkat
                </label>

                <input
                type="text"
                name="nama_perangkat"
                placeholder="Masukkan nama perangkat"
                required>

            </div>

            <div class="form-group">

                <label>
                    Quantity
                </label>

                <input
                type="number"
                name="quantity"
                placeholder="Masukkan quantity"
                required>

            </div>

            <button type="submit">
                Tambah Perangkat
            </button>

        </form>

    </div>

</div>

</body>
</html>