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

    <?php 
    $role = session()->get('role');
        if ($role) {
        // Pastikan nama file adalah 'sidebar_admin.php', 'sidebar_penumpang.php', dll
        echo view('layout/sidebar_' . $role); 
        } else {
        // Tindakan jika role tidak ditemukan (arahkan ke login atau tampilkan pesan)
        echo '<div class="alert alert-danger">Sesi tidak valid. Silakan <a href="' . base_url('login') . '">Login kembali</a>.</div>';
        }
    ?>

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
</body>
</html>