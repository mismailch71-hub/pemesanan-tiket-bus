<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0 rounded-3 bg-white">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4 text-dark text-center">👤 Tambah Pengguna Baru</h4>
                
                <form action="<?= base_url('admin/pengguna/simpan') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Contoh: M. Ismail" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Contoh: ismail_admin" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Contoh: nama@gmail.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password akun" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary">Role / Hak Akses</label>
                        <select name="role" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Role --</option>
                            <option value="admin"> Admin</option>
                            <option value="petugas">Petugas </option>
                            <option value="pelanggan">Penumpang</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('admin/pengguna') ?>" class="btn btn-light border fw-bold">Batal</a>
                        <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>