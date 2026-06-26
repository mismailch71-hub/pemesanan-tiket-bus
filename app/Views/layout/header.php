<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <?php if (session()->get('isLoggedIn')): ?>
        
        <?php if (session()->get('role') === 'admin'): ?>
            <li class="nav-item"><a class="nav-link fw-bold text-warning" href="<?= base_url('admin/dashboard'); ?>">Dashboard Admin</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/pengguna'); ?>">Kelola User</a></li>
        
        <?php elseif (session()->get('role') === 'petugas'): ?>
            <li class="nav-item"><a class="nav-link fw-bold text-info" href="<?= base_url('petugas/dashboard'); ?>">Panel Petugas</a></li>
        
        <?php else: ?>
            <li class="nav-item"><a class="nav-link active" href="<?= base_url('jadwal'); ?>">Cari Jadwal Bus</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('riwayat'); ?>">Riwayat Pesanan</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Poin Saya</a></li>
        <?php endif; ?>

        <li class="nav-item ms-2">
            <a class="btn btn-danger btn-sm text-white px-3" href="<?= base_url('logout'); ?>">Keluar (<?= session()->get('username'); ?>)</a>
        </li>

    <?php else: ?>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('login'); ?>">Masuk</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('register'); ?>">Daftar Akun</a></li>
    <?php endif; ?>
</ul>