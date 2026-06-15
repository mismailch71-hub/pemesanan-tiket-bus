<?php /** @var array $semua_pengguna */ ?>
<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Manajemen Data Pengguna</h3>
    <p class="text-secondary">Kelola data hak akses pengguna Smart Bus</p>
</div>

<?php if (session()->getFlashdata('sukses')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('sukses'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>   
<?php endif; ?>

<div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Daftar Pengguna Sistem</h5>
        <a href="<?= base_url('admin/pengguna/tambah'); ?>" class="btn btn-primary btn-sm fw-bold">➕ Tambah User Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 80px;">No</th>
                    <th>Username / Akun</th>
                    <th>Hak Akses (Role)</th>
                    <th style="width: 200px;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($semua_pengguna as $p): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><strong><?= esc($p['username']); ?></strong></td>
                    <td>
                        <?php if ($p['role'] == 'admin'): ?>
                            <span class="badge bg-danger">Admin</span>
                        <?php elseif ($p['role'] == 'petugas'): ?>
                            <span class="badge bg-primary">Petugas</span>
                        <?php elseif ($p['role'] == 'penumpang'): ?>
                            <span class="badge bg-success">Penumpang</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Belum Diatur</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= base_url('admin/pengguna/edit/' . $p['id']); ?>" class="btn btn-sm btn-warning text-dark me-1">Edit</a>
                        <a href="<?= base_url('admin/pengguna/hapus/' . $p['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php if(empty($semua_pengguna)): ?>
                <tr>
                    <td colspan="4" class="text-center text-muted py-3">Belum ada data pengguna di database.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>