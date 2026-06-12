<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Kendali - Smart Bus</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">
</head>
<body>

    <div class="sidebar shadow">
        <div class="p-3 text-white text-center border-bottom border-secondary">
            <h5 class="fw-bold mb-0 text-warning">🚌 SMART BUS</h5>
            <small class="text-white-50 text-uppercase tracking-wider" style="font-size: 0.7rem;">Dashboard Utama</small>
        </div>
        
        <div class="py-2">
            <?php if(session()->get('role') === 'admin'): ?>
                <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link active">📊 Dashboard</a>
                <a href="<?= base_url('admin/pengguna'); ?>" class="nav-link">⚙️ Kelola User</a>
                <a href="<?= base_url('admin/bus'); ?>" class="nav-link">🚍 Kelola Bus</a>
                <a href="<?= base_url('admin/jadwal'); ?>" class="nav-link">📅 Kelola Jadwal</a>
                <a href="<?= base_url('admin/keuangan'); ?>" class="nav-link">💵 Laporan Keuangan</a>
                <a href="<?= base_url('admin/ulasan'); ?>" class="nav-link">⭐ Ulasan & Feedback</a>
               
            <?php elseif(session()->get('role') === 'petugas'): ?>
                <a href="<?= base_url('petugas/dashboard'); ?>" class="nav-link active">📊 Dashboard Petugas</a>
                <a href="#" class="nav-link">🔍 Validasi Tiket (QR)</a>
                <a href="#" class="nav-link">📋 Manifes Penumpang</a>
                
            <?php else: ?>
                <a href="<?= base_url('jadwal'); ?>" class="nav-link">🔍 Cari Jadwal Bus</a>
                <a href="<?= base_url('riwayat'); ?>" class="nav-link">📋 Riwayat Tiket</a>
            <?php endif; ?>
            
            <a href="<?= base_url('logout'); ?>" class="nav-link text-danger mt-4 fw-bold" style="border-bottom: none;">❌ Keluar</a>
        </div>
    </div>

    <div class="main-content">
        <div class="top-navbar d-flex justify-content-between align-items-center shadow-sm">
            <span>SISTEM INFORMASI OPERASIONAL TIKET SMART BUS MATARAM</span>
            <span class="badge bg-success rounded-pill px-3 py-1">Status: Online 🟢</span>
        </div>

        <div class="p-4">
            <?= $this->renderSection('content'); ?>
        </div> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?= base_url('js/dashboard.js'); ?>"></script>
</body>
</html>