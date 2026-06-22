<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success') || session()->getFlashdata('error')): ?>
    <div class="alert alert-<?= session()->getFlashdata('success') ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
        <?= esc(session()->getFlashdata('success') ?? session()->getFlashdata('error')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Halo, <?= esc(session()->get('username')); ?>! 👋</h3>
    <a href="<?= base_url('penumpang/jadwal') ?>" class="btn btn-primary shadow-sm">
        <i class="bi bi-search"></i> Pesan Tiket Baru
    </a>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Tiket Aktif</h6>
                <h3 class="fw-bold mb-0"><?= $jumlah_tiket_aktif ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Perjalanan Selesai</h6>
                <h3 class="fw-bold mb-0"><?= $jumlah_selesai ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-info text-white border-0 shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Total Tiket</h6>
                <h3 class="fw-bold mb-0"><?= $jumlah_tiket_aktif + $jumlah_selesai ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Riwayat Tiket Terakhir</h5>
            <a href="<?= base_url('penumpang/riwayat') ?>" class="small text-decoration-none">Lihat semua &raquo;</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr><th>Rute</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    <?php if (empty($tiket_user)): ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Belum ada tiket. <a href="<?= base_url('penumpang/jadwal') ?>">Pesan sekarang</a>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach (array_slice($tiket_user, 0, 5) as $t): ?>
                        <tr>
                            <td><?= esc($t['asal']) ?> ➔ <?= esc($t['tujuan']) ?></td>
                            <td>
                                <?php $badge = $t['status_pembayaran'] === 'Lunas' ? 'bg-success' : 'bg-warning text-dark'; ?>
                                <span class="badge <?= $badge ?>"><?= esc($t['status_pembayaran']) ?></span>
                            </td>
                            <td><a href="<?= base_url('penumpang/riwayat') ?>" class="btn btn-sm btn-outline-primary">Detail</a></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>