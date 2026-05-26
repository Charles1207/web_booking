<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Sistem Booking Perangkat</title>

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
    min-height:100vh;

    background:
    linear-gradient(
        135deg,
        #0f172a,
        #172554,
        #1e293b
    );

    overflow-x:hidden;

    color:white;
}

/* ===================================================== */
/* BACKGROUND EFFECT */
/* ===================================================== */

body::before{

    content:'';

    position:absolute;

    width:500px;
    height:500px;

    background:
    rgba(59,130,246,0.18);

    border-radius:50%;

    top:-150px;
    left:-150px;

    filter:blur(100px);
}

body::after{

    content:'';

    position:absolute;

    width:450px;
    height:450px;

    background:
    rgba(168,85,247,0.18);

    border-radius:50%;

    bottom:-150px;
    right:-150px;

    filter:blur(100px);
}

/* ===================================================== */
/* NAVBAR */
/* ===================================================== */

.navbar{

    width:92%;
    max-width:1200px;

    margin:auto;

    padding:25px 0;

    display:flex;
    justify-content:space-between;
    align-items:center;

    position:relative;
    z-index:2;
}

.logo{

    font-size:32px;
    font-weight:700;

    letter-spacing:-1px;
}

.login-btn{

    text-decoration:none;

    background:
    linear-gradient(
        135deg,
        #3b82f6,
        #2563eb
    );

    color:white;

    padding:13px 22px;

    border-radius:16px;

    font-weight:600;

    transition:.3s;
}

.login-btn:hover{

    transform:translateY(-3px);

    box-shadow:
    0 12px 25px rgba(37,99,235,.35);
}

/* ===================================================== */
/* HERO */
/* ===================================================== */

.hero{

    width:92%;
    max-width:1200px;

    margin:auto;

    min-height:85vh;

    display:grid;
    grid-template-columns:1fr 1fr;

    align-items:center;

    gap:60px;

    position:relative;
    z-index:2;
}

/* ===================================================== */
/* HERO LEFT */
/* ===================================================== */

.hero-title{

    font-size:68px;

    line-height:1.1;

    font-weight:700;

    margin-bottom:22px;
}

.hero-title span{

    background:
    linear-gradient(
        135deg,
        #60a5fa,
        #a855f7
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.hero-desc{

    color:#cbd5e1;

    font-size:17px;

    line-height:1.8;

    margin-bottom:35px;

    max-width:520px;
}

.hero-btn{

    display:inline-flex;

    align-items:center;
    justify-content:center;

    padding:16px 28px;

    border-radius:18px;

    text-decoration:none;

    background:
    linear-gradient(
        135deg,
        #3b82f6,
        #2563eb
    );

    color:white;

    font-weight:600;

    transition:.3s;
}

.hero-btn:hover{

    transform:translateY(-3px);

    box-shadow:
    0 12px 25px rgba(37,99,235,.35);
}

/* ===================================================== */
/* HERO RIGHT */
/* ===================================================== */

.hero-card{

    background:
    linear-gradient(
        145deg,
        rgba(255,255,255,0.10),
        rgba(255,255,255,0.04)
    );

    border:1px solid rgba(255,255,255,0.08);

    border-radius:35px;

    padding:35px;

    backdrop-filter:blur(18px);

    box-shadow:
    0 15px 40px rgba(0,0,0,0.35);

    animation:float 4s ease-in-out infinite;
}

/* ===================================================== */
/* FLOAT ANIMATION */
/* ===================================================== */

@keyframes float{

    0%{
        transform:translateY(0px);
    }

    50%{
        transform:translateY(-10px);
    }

    100%{
        transform:translateY(0px);
    }

}

/* ===================================================== */
/* FEATURE */
/* ===================================================== */

.feature{

    display:flex;
    align-items:center;

    gap:18px;

    margin-bottom:22px;

    padding:18px;

    border-radius:18px;

    background:
    rgba(255,255,255,0.05);
}

.feature-icon{

    width:58px;
    height:58px;

    border-radius:18px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:24px;

    background:
    linear-gradient(
        135deg,
        #3b82f6,
        #2563eb
    );
}

.feature-title{

    font-size:18px;
    font-weight:600;

    margin-bottom:5px;
}

.feature-desc{

    font-size:14px;
    color:#cbd5e1;
}

/* ===================================================== */
/* RESPONSIVE */
/* ===================================================== */

@media(max-width:992px){

    .hero{

        grid-template-columns:1fr;

        padding:40px 0;
    }

    .hero-title{
        font-size:48px;
    }

}

@media(max-width:768px){

    .hero-title{
        font-size:38px;
    }

    .hero-desc{
        font-size:15px;
    }

    .hero-card{
        padding:24px;
    }

    .navbar{
        flex-direction:column;
        gap:18px;
    }

}

</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">
        Device Booking
    </div>

    <a href="login.php"
    class="login-btn">

        Login

    </a>

</div>

<!-- HERO -->
<div class="hero">

    <!-- LEFT -->
    <div>

        <div class="hero-title">

            Sistem
            <span>Booking</span>
            Perangkat Modern

        </div>

        <div class="hero-desc">

            Kelola peminjaman perangkat dengan lebih cepat,
            modern, dan terorganisir.
            Sistem ini membantu admin dan user melakukan
            booking perangkat secara realtime dengan tampilan
            yang modern dan profesional.

        </div>

        <a href="login.php"
        class="hero-btn">

            Mulai Booking

        </a>

    </div>

    <!-- RIGHT -->
    <div class="hero-card">

        <div class="feature">

            <div class="feature-icon">
                💻
            </div>

            <div>

                <div class="feature-title">
                    Booking Perangkat
                </div>

                <div class="feature-desc">
                    Booking perangkat lebih cepat dan mudah.
                </div>

            </div>

        </div>

        <div class="feature">

            <div class="feature-icon">
                📅
            </div>

            <div>

                <div class="feature-title">
                    Jadwal Realtime
                </div>

                <div class="feature-desc">
                    Quantity perangkat dibatasi per tanggal.
                </div>

            </div>

        </div>

        <div class="feature">

            <div class="feature-icon">
                🔔
            </div>

            <div>

                <div class="feature-title">
                    Notifikasi Booking
                </div>

                <div class="feature-desc">
                    Admin dapat melihat pengingat booking harian.
                </div>

            </div>

        </div>

        <div class="feature">

            <div class="feature-icon">
                ⚡
            </div>

            <div>

                <div class="feature-title">
                    Modern Dashboard
                </div>

                <div class="feature-desc">
                    UI glassmorphism modern dan responsive.
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>