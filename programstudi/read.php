<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
include '../koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM program_studi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="font-family: 'Inter', sans-serif; background-color: #f8f9fa;">

<?php include '../navbar.php'; ?>

<div class="container mt-5">
    <div class="card border-0 shadow-sm p-4" style="border-radius: 15px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 style="font-weight: 700; color: #212529; margin: 0;">Data Program Studi</h3>
            <a href="create.php" class="btn btn-dark fw-bold px-4" style="border-radius: 10px;">+ Tambah Prodi</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Prodi</th>
                        <th>Jenjang</th>
                        <th>Akreditasi</th>
                        <th>Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
                    <tr style="vertical-align: middle;">
                        <td><?= $no++; ?></td>
                        <td class="fw-bold"><?= $row['nama_prodi']; ?></td>
                        <td><span class="badge bg-secondary"><?= $row['jenjang']; ?></span></td>
                        <td><span class="badge bg-warning text-dark fw-bold"><?= $row['akreditasi']; ?></span></td>
                        <td class="text-muted small"><?= $row['keterangan']; ?></td>
                        <td class="text-center">
                            <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm fw-bold px-3" style="border-radius: 8px;">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm fw-bold px-3" style="border-radius: 8px;" onclick="return confirm('Hapus data program studi ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>