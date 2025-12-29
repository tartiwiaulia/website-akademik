<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Teknologi Informasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="font-family: 'Inter', sans-serif; background-color: #f4f7f6; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                
                <div class="text-center mb-4">
                    <h2 style="font-weight: 700; color: #212529;">Teknologi Informasi</h2>
                    <p class="text-muted">Silakan login ke akun Anda</p>
                </div>

                <div class="card border-0 shadow-sm" style="border-radius: 20px; padding: 20px;">
                    <div class="card-body">
                        <?php if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal"): ?>
                            <div class="alert alert-danger text-center small py-2" style="border-radius: 10px;">
                                Email atau password salah!
                            </div>
                        <?php endif; ?>

                        <form method="post" action="proses_login.php">
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required 
                                       style="border-radius: 10px; padding: 12px;">
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-bold">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="••••••••" required 
                                       style="border-radius: 10px; padding: 12px;">
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm" 
                                    style="border-radius: 10px; background-color: #0d6efd; border: none;">
                                Login Sekarang
                            </button>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="small text-muted">&copy; 2025 Jurusan Teknologi Informasi</p>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>