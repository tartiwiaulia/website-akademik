<?php
session_start();
include '../koneksi.php'; 

if (isset($_POST['update_profil'])) {
    $email = $_POST['email'];
    $nama_baru = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $pass_lama = $_POST['password_lama'];
    $pass_baru = $_POST['password_baru'];

    $cek_user = mysqli_query($conn, "SELECT password FROM pengguna WHERE email='$email'");
    $data_user = mysqli_fetch_assoc($cek_user);

    if (empty($pass_lama) && empty($pass_baru)) {
        mysqli_query($conn, "UPDATE pengguna SET nama_lengkap='$nama_baru' WHERE email='$email'");
        $_SESSION['nama'] = $nama_baru;
        header("Location: ../index.php"); 
        exit;
    }

    if (md5($pass_lama) == $data_user['password']) {
        if (!empty($pass_baru)) {
            $hash_baru = md5($pass_baru);
            mysqli_query($conn, "UPDATE pengguna SET nama_lengkap='$nama_baru', password='$hash_baru' WHERE email='$email'");
            $_SESSION['nama'] = $nama_baru;
            header("Location: ../index.php?status=sukses"); 
            exit;
        }
    } else {
        header("Location: edit_profil.php?pesan=salah");
        exit;
    }
}
?>