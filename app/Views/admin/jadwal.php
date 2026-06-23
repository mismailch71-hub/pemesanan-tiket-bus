<?php /** @var array $daftar_jadwal */ ?>
<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Manajemen Jadwal & Rute</h3>
    <p class="text-secondary">Atur jam Keberangkatan, titik kumpul, dan harga tiket bus</p>
</div>

<?php if (session()->getFlashdata('sukses')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('sukses'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>   
<?php endif; ?>

<div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <div class="d-flex justify-content-between align-item-center mb-3">
        <h5 class="fw-bold mb-0">Jadwal Keberangkatan Aktif</h5>
        <a href="<?= base_url('admin/jadwal/tambah'); ?>" class="btn btn-warning btn-sm fw-bold text-dark"> Buat Jadwal Baru</a> 
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Armada</th>
                    <th>Rute Perjalanan</th>
                    <th>Jam Berangkat</th>
                    <th>Harga Tiket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($daftar_jadwal as $jd): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($jd['nama_bus']); ?></td>
                    <td><strong><?= esc($jd['asal']); ?> ➔ <?= esc($jd['tujuan']); ?></strong></td>
                    <td><?= esc($jd['jam_keberangkatan']); ?></td>
                    <td><strong class="text-success">Rp <?= number_format($jd['harga'], 0, ',', '.'); ?></strong></td>
                    <td>
                        <a href="<?= base_url('admin/jadwal/edit/' . $jd['id']); ?>" class="btn btn-sm btn-warning text-dark me-1">Edit</a>
                        <a href="<?= base_url('admin/jadwal/hapus/' . $jd['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus jadwal ini')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($daftar_jadwal)): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted py-3">Belum ada data jadwal bus.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>