<?php /** @var array $user */ ?> <?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0 rounded-3 bg-white">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4 text-dark">📝 Edit Data Pengguna</h4>
                
                <form action="<?= base_url('admin/pengguna/update/' . $user['id']) ?>" method="post">
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Password Baru (Kosongkan jika tidak diganti)</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password baru jika ingin diubah">
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary">Role / Hak Akses</label>
                        <select name="role" class="form-select" required>
                            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="petugas" <?= $user['role'] == 'petugas' ? 'selected' : '' ?>>Petugas Loket</option>
                            <option value="penumpang" <?= $user['role'] == 'penumpang' ? 'selected' : '' ?>>Penumpang</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('admin/pengguna') ?>" class="btn btn-light border fw-bold">Batal</a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold text-dark">Perbarui User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>