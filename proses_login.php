<?php
session_start();
include 'koneksi.php';

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $q = mysqli_query($conn,"SELECT * FROM pengguna 
         WHERE email='$email' AND password='$password'");

    $data = mysqli_fetch_assoc($q);

    if($data){
        $_SESSION['login'] = true;
        $_SESSION['nama']  = $data['nama_lengkap'];
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?pesan=gagal");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}