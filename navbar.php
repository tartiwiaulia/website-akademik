<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top" style="font-family: 'Inter', sans-serif;">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/websiteakademik/index.php">Teknologi Informasi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto text-center">
        <li class="nav-item"><a class="nav-link" href="/websiteakademik/index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/websiteakademik/mahasiswa/read.php">Mahasiswa</a></li>
        <li class="nav-item"><a class="nav-link" href="/websiteakademik/programstudi/read.php">Program Studi</a></li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px; font-size: 0.8rem;">
              👤
            </div>
            <?= $_SESSION['nama']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" style="border-radius: 12px;">
            <li><a class="dropdown-item py-2" href="/websiteakademik/profil/edit_profil.php">⚙️ Edit Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item py-2 text-danger fw-bold" href="/websiteakademik/logout.php">🚪 Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>