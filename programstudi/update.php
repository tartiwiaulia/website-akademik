<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
include '../koneksi.php';

$id = $_GET['id'];

if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE program_studi SET
        nama_prodi='$_POST[nama_prodi]',
        jenjang='$_POST[jenjang]',
        akreditasi='$_POST[akreditasi]',
        keterangan='$_POST[keterangan]'
        WHERE id='$_POST[id]'
    ");
    header("Location: read.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM program_studi WHERE id='$id'");
$row = mysqli_fetch_assoc($query);
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
                <h3 class="fw-bold mb-4 text-warning">Edit Program Studi</h3>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <label class="form-label small fw-bold">Nama Program Studi</label>
                    <input type="text" name="nama_prodi" class="form-control mb-3" value="<?= $row['nama_prodi']; ?>" style="border-radius: 10px;">

                    <label class="form-label small fw-bold">Jenjang</label>
                    <select name="jenjang" class="form-select mb-3" style="border-radius: 10px;">
                        <?php $js = ['D2','D3','D4','S1','S2']; 
                        foreach($js as $j) : ?>
                            <option value="<?= $j; ?>" <?= $row['jenjang'] == $j ? 'selected' : ''; ?>><?= $j; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label class="form-label small fw-bold">Akreditasi</label>
                    <input type="text" name="akreditasi" class="form-control mb-3" value="<?= $row['akreditasi']; ?>" style="border-radius: 10px;">

                    <label class="form-label small fw-bold">Keterangan</label>
                    <textarea name="keterangan" class="form-control mb-4" style="border-radius: 10px;"><?= $row['keterangan']; ?></textarea>

                    <button name="update" class="btn btn-warning w-100 fw-bold py-2" style="border-radius: 10px;">Update Prodi</button>
                    <a href="read.php" class="btn btn-link w-100 text-muted mt-2 text-decoration-none small">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>