<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['program_studi_id'];

    mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$tgl', '$alamat', '$prodi')");
    header("Location: read.php"); // Diarahkan ke read.php agar tidak 404
    exit;
}

$prodi_list = mysqli_query($conn, "SELECT * FROM program_studi");
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="font-family: 'Inter', sans-serif; background-color: #f8f9fa;">

<?php include '../navbar.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
                <h3 class="fw-bold mb-4">Tambah Mahasiswa</h3>
                <form method="post">
                    <label class="form-label small fw-bold">NIM</label>
                    <input type="text" name="nim" class="form-control mb-3" required style="border-radius: 10px;">
                    
                    <label class="form-label small fw-bold">Nama Lengkap</label>
                    <input type="text" name="nama_mhs" class="form-control mb-3" required style="border-radius: 10px;">
                    
                    <label class="form-label small fw-bold">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control mb-3" required style="border-radius: 10px;">
                    
                    <label class="form-label small fw-bold">Alamat</label>
                    <textarea name="alamat" class="form-control mb-3" style="border-radius: 10px;"></textarea>
                    
                    <label class="form-label small fw-bold">Program Studi</label>
                    <select name="program_studi_id" class="form-select mb-4" required style="border-radius: 10px;">
                        <option value="">-- Pilih Prodi --</option>
                        <?php while($p = mysqli_fetch_assoc($prodi_list)) { ?>
                            <option value="<?= $p['id']; ?>"><?= $p['nama_prodi']; ?></option>
                        <?php } ?>
                    </select>

                    <button name="simpan" class="btn btn-primary w-100 fw-bold py-2" style="border-radius: 10px;">Simpan Data</button>
                    <a href="read.php" class="btn btn-link w-100 text-muted mt-2 text-decoration-none">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>