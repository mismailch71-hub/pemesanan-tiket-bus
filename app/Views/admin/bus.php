<?php /** @var array $daftar_bus */ ?>
<?=  $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-4">Manajemen Smart Bus</h3>
    <p class="text-secondary">Kelola daftar bus, tipe kelas, dan total kapasitas kursi</p>
</div>

<div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <div classs="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Daftar Bus Aktif</h5>
        <a href="<?= base_url('admin/bus/tambah'); ?>" class="btn btn-success btn-sm fw-bold"> Tambah Bus</a> 
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middl">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Bus</th>
                    <th>Nomor Plat</th>
                    <th>Kelas</th>
                    <th>kapasitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($daftar_bus as $b): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><strong><?= esc($b['nama_bus']); ?></strong></td>
                    <td><?= esc($b['nomor_plat']); ?></td>
                    <td><span class="badge bg-secondary"><?= esc($b['kelas']); ?></span></td>
                    <td><?= esc($b['kapasitas']); ?> Kursi</td>
                    <td>
                        <a href="<?= base_url('admin/bus/edit/' . $b['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('admin/bus/hapus/' . $b['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>