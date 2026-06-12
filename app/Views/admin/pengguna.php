<?=  $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Manajemen Data Pengguna</h3>
    <p class="text-secondary">Kelola data petugas loket dan pelanggan Smart Bus</p>
</div>

<div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Daftar Pengguna Sistem</h5>
        <button class="btn btn-primary btn-sm fw-bold">➕ Tambah User Baru</button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><strong>M. Ismail</strong></td>
                    <td>ismail_admin</td>
                    <td>m.ismail.ch71@gmail.com</td>
                    <td><span class="badge bg-danger">Super Admin</span></td>
                    <td>
                        <button class="btn btn-sm btn-warning">Edit</button>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </tablele>
    </div>
</div>
<?= $this->endSection(); ?>