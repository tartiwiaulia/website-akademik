<?php
include '../koneksi.php';
mysqli_query($conn, "DELETE FROM program_studi WHERE id='$_GET[id]'");
header("Location: read.php");
exit;
?>