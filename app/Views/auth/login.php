<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Bus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #2c3e50 !important;">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card border-0 shadow-lg rounded-4" style="width: 100%; max-width: 400px; overflow: hidden;">
        
        <div class="bg-warning text-dark text-center py-4 px-3">
            <span style="font-size: 2.5rem;">🔑</span>
            <h4 class="fw-bold text-uppercase tracking-wide mb-1 mt-2">LOGIN</h4>
            <small class="fw-medium text-muted">SYSTEM SMART BUS</small>
        </div>

        <div class="card-body p-4 bg-white">
            <?php if(session()->getFlashdata('gagal_pesan')): ?>
                <div class="alert alert-danger border-0 small py-2">⚠️ <?= session()->getFlashdata('gagal_pesan') ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('sukses_pesan')): ?>
                <div class="alert alert-success border-0 small py-2">✅ <?= session()->getFlashdata('sukses_pesan') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('auth/prosesLogin') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label small fw-bold text-secondary">Username atau Email</label>
                    <input type="text" name="username" class="form-control py-2" placeholder="Masukkan username Anda" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold text-secondary">Password</label>
                    <input type="password" name="password" class="form-control py-2" placeholder="Masukkan password Anda" required>
                </div>

                <button type="submit" class="btn btn-warning w-100 fw-bold py-2 mt-3 rounded-3 shadow-sm text-dark">LOGIN</button>
                
                <div class="text-center mt-4">
                    <small class="text-muted">Belum punya akun? <a href="<?= base_url('register') ?>" class="text-warning fw-bold text-decoration-none">Daftar Sekarang</a></small>
                </div>
            </form>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>