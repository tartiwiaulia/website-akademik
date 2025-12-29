<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Teknologi Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Teknologi Informasi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto text-center">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="mahasiswa/read.php">Mahasiswa</a></li>
        <li class="nav-item"><a class="nav-link" href="programstudi/read.php">Program Studi</a></li>
        <li class="nav-item">
            <a class="btn btn-outline-danger btn-sm ms-lg-3 py-1 px-3 mt-2 mt-lg-0" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<header class="bg-dark bg-gradient text-white py-5 mb-5 shadow">
    <div class="container text-center">
        <h1 class="display-5 fw-bold">Selamat Datang, <?= $_SESSION['nama']; ?>!</h1>
        <p class="lead opacity-75">Panel Administrasi Sistem Informasi Akademik Teknologi Informasi</p>
    </div>
</header>

<div class="container">
    <div class="row g-4 justify-content-center">
        
        <div class="col-md-5 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <div class="display-4 mb-3">👨‍🎓</div>
                    <h4 class="card-title fw-bold">Data Mahasiswa</h4>
                    <p class="card-text text-muted mb-4">Kelola data mahasiswa, tambah, edit, atau hapus data dengan mudah.</p>
                    <a href="mahasiswa/read.php" class="btn btn-primary w-100 py-2 fw-semibold">Buka Data Mahasiswa</a>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <div class="display-4 mb-3">📚</div>
                    <h4 class="card-title fw-bold">Program Studi</h4>
                    <p class="card-text text-muted mb-4">Lihat dan atur daftar program studi yang tersedia di fakultas.</p>
                    <a href="programstudi/read.php" class="btn btn-dark w-100 py-2 fw-semibold">Buka Program Studi</a>
                </div>
            </div>
        </div>

    </div>
</div>

<footer class="text-center mt-5 py-4 border-top">
    <p class="text-secondary small">&copy; 2025 Jurusan Teknologi Informasi</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>