<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

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

/* ===================================================== */
/* BODY */
/* ===================================================== */

body{
    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(
        135deg,
        #0f172a,
        #172554,
        #1e293b
    );

    overflow:hidden;

    position:relative;
}

/* ===================================================== */
/* BACKGROUND EFFECT */
/* ===================================================== */

body::before{

    content:'';

    position:absolute;

    width:450px;
    height:450px;

    background:
    rgba(59,130,246,0.25);

    border-radius:50%;

    top:-120px;
    left:-120px;

    filter:blur(90px);
}

body::after{

    content:'';

    position:absolute;

    width:400px;
    height:400px;

    background:
    rgba(168,85,247,0.2);

    border-radius:50%;

    bottom:-100px;
    right:-100px;

    filter:blur(90px);
}

/* ===================================================== */
/* CONTAINER */
/* ===================================================== */

.container{
    width:92%;
    max-width:520px;

    position:relative;
    z-index:2;
}

/* ===================================================== */
/* LOGIN CARD */
/* ===================================================== */

.card{

    background:
    linear-gradient(
        145deg,
        rgba(255,255,255,0.10),
        rgba(255,255,255,0.04)
    );

    border:1px solid rgba(255,255,255,0.08);

    border-radius:32px;

    padding:45px;

    backdrop-filter:blur(20px);

    box-shadow:
    0 15px 40px rgba(0,0,0,0.35);

    animation:fadeUp 1s ease;
}

/* ===================================================== */
/* ANIMATION */
/* ===================================================== */

@keyframes fadeUp{

    from{
        opacity:0;
        transform:translateY(30px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

/* ===================================================== */
/* TITLE */
/* ===================================================== */

h1{

    text-align:center;

    font-size:42px;

    margin-bottom:35px;

    color:white;

    font-weight:700;

    letter-spacing:-1px;
}

/* ===================================================== */
/* INPUT */
/* ===================================================== */

input{

    width:100%;

    padding:17px 18px;

    margin-bottom:18px;

    border:none;

    outline:none;

    border-radius:18px;

    background:
    rgba(255,255,255,0.08);

    color:white;

    font-size:15px;

    transition:.3s;
}

input:focus{

    background:
    rgba(255,255,255,0.12);

    box-shadow:
    0 0 0 3px rgba(59,130,246,0.25);
}

input::placeholder{
    color:#cbd5e1;
}

/* ===================================================== */
/* BUTTON */
/* ===================================================== */

button{

    width:100%;

    padding:17px;

    border:none;

    border-radius:18px;

    background:
    linear-gradient(
        135deg,
        #3b82f6,
        #2563eb
    );

    color:white;

    font-size:16px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

    margin-top:5px;
}

button:hover{

    transform:translateY(-3px);

    box-shadow:
    0 12px 25px rgba(37,99,235,.35);
}

/* ===================================================== */
/* ACCOUNT BOX */
/* ===================================================== */

.account-box{

    margin-top:28px;

    background:
    rgba(255,255,255,0.05);

    border:1px solid rgba(255,255,255,0.06);

    border-radius:20px;

    padding:20px;

    color:#e2e8f0;

    line-height:1.8;

    font-size:14px;
}

.account-title{

    font-size:16px;

    font-weight:600;

    margin-bottom:8px;

    color:white;
}

/* ===================================================== */
/* RESPONSIVE */
/* ===================================================== */

@media(max-width:768px){

    .card{
        padding:30px 24px;
    }

    h1{
        font-size:34px;
    }

}

</style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>
            Login
        </h1>

        <form action="proses/login.php"
        method="POST">

            <input
            type="email"
            name="email"
            placeholder="Masukkan Email"
            required>

            <input
            type="password"
            name="password"
            placeholder="Masukkan Password"
            required>

            <button type="submit">

                Login Sekarang

            </button>

        </form>

        <!-- ACCOUNT -->
        <div class="account-box">

            <div class="account-title">
                Admin Account
            </div>

            <p>
                admin@admin.com
                <br>
                admin123
            </p>

            <br>

            <div class="account-title">
                User Account
            </div>

            <p>
                user@user.com
                <br>
                user123
            </p>

        </div>

    </div>

</div>

</body>
</html>