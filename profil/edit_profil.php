<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

$nama_session = $_SESSION['nama'];
$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE nama_lengkap = '$nama_session'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil | Teknologi Informasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="font-family: 'Inter', sans-serif; background-color: #f8f9fa;">

<?php include '../navbar.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
                <div class="text-center mb-4">
                    <div class="bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; border: 3px solid #0d6efd;">
                        <span style="font-size: 2.5rem;">👤</span>
                    </div>
                    <h4 class="fw-bold m-0">Pengaturan Profil</h4>
                    <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'salah'): ?>
                        <div class="alert alert-danger mt-3 small py-2">Password lama salah!</div>
                    <?php endif; ?>
                </div>
                
                <form action="proses_edit_profil.php" method="post">
                    <input type="hidden" name="email" value="<?= $user['email']; ?>">

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $user['nama_lengkap']; ?>" required style="border-radius: 10px;">
                    </div>

                    <hr>

                    <div class="mb-3 text-primary small fw-bold">Kosongkan bagian bawah jika tidak ingin ganti password</div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Password Lama</label>
                        <input type="password" name="password_lama" class="form-control" placeholder="Masukkan password saat ini" style="border-radius: 10px;">
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold">Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" placeholder="Masukkan password baru" style="border-radius: 10px;">
                    </div>

                    <button type="submit" name="update_profil" class="btn btn-primary w-100 fw-bold py-2 shadow-sm" style="border-radius: 10px;">Simpan Perubahan</button>
                    <a href="index.php" class="btn btn-link w-100 text-muted mt-2 text-decoration-none small">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>