<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Tiket Bus Mataram</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
            <div class="content">
                <a class="navbar-brand" href="<?= base_url() ?>"> TiketBus Mataram</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link text-white" href="<?= base_url('jadwaal') ?>"> Cari Jadwal</a>
                        <a class="nav-link text-white" href="<?= base_url('riwayat') ?>"> Riwayat Pesanan</a>
                        <a class="nav-link text-warning fw-bold" href="<?= base_url('login') ?>"> Masuk Admin</a>
                    </div>
            </div>
        </nav>
    </body>
</html>