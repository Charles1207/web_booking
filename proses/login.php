<?php
session_start();
include '../config/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn,
"SELECT * FROM users 
WHERE email='$email' 
AND password='$password'");

$data = mysqli_fetch_assoc($query);

if($data){

    $_SESSION['id'] = $data['id'];
    $_SESSION['role'] = $data['role'];

    if($data['role'] == 'admin'){
        header("Location: ../admin/dashboard.php");
    }else{
        header("Location: ../user/dashboard.php");
    }

}else{
    echo "Login gagal";
}
?>