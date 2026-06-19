<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun | Smart Bus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #eef2f5; }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card border-0 shadow-sm rounded-4" style="width: 100%; max-width: 420px; overflow: hidden;">
        
        <div class="bg-dark text-white text-center py-4 px-3">
            <span style="font-size: 2.5rem;">🚌</span>
            <h4 class="fw-bold text-uppercase tracking-wide mb-1 mt-2">DAFTAR AKUN</h4>
        </div>

        <div class="card-body p-4 bg-white">
            <form action="<?= base_url('auth/prosesRegister') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label small fw-bold text-secondary">Username Baru</label>
                    <input type="text" name="username" class="form-control py-2" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold text-secondary">Password</label>
                    <input type="password" name="password" class="form-control py-2" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn btn-dark w-100 fw-bold py-2 mt-3 rounded-3 shadow-sm">DAFTAR SEKARANG</button>
                
                <div class="text-center mt-4">
                    <small class="text-muted">Sudah punya akun? <a href="<?= base_url('login') ?>" class="text-dark fw-bold text-decoration-none">Masuk di sini</a></small>
                </div>
            </form>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>