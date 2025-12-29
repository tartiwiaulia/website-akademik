<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO program_studi VALUES (
        NULL,
        '$_POST[nama_prodi]',
        '$_POST[jenjang]',
        '$_POST[akreditasi]',
        '$_POST[keterangan]'
    )");
    header("Location: read.php");
    exit;
}
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
                <h3 class="fw-bold mb-4">Tambah Program Studi</h3>
                <form method="post">
                    <label class="form-label small fw-bold">Nama Program Studi</label>
                    <input type="text" name="nama_prodi" class="form-control mb-3" placeholder="Contoh: Teknik Informatika" required style="border-radius: 10px;">

                    <label class="form-label small fw-bold">Jenjang</label>
                    <select name="jenjang" class="form-select mb-3" required style="border-radius: 10px;">
                        <option value="">-- Pilih Jenjang --</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>D4</option>
                        <option>S1</option>
                        <option>S2</option>
                    </select>

                    <label class="form-label small fw-bold">Akreditasi</label>
                    <input type="text" name="akreditasi" class="form-control mb-3" placeholder="A / B / C / Unggul" style="border-radius: 10px;">

                    <label class="form-label small fw-bold">Keterangan</label>
                    <textarea name="keterangan" class="form-control mb-4" placeholder="Keterangan tambahan..." style="border-radius: 10px;"></textarea>

                    <button name="simpan" class="btn btn-dark w-100 fw-bold py-2" style="border-radius: 10px;">Simpan Prodi</button>
                    <a href="read.php" class="btn btn-link w-100 text-muted mt-2 text-decoration-none small">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>