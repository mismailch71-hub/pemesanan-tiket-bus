<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<div class="mb-4">
    <h3 class="fw-bold">Halo, <?= esc(session()->get('username')); ?>! 👋</h3>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white border-0 shadow-sm">
            <div class="card-body">
                <h6>Tiket Aktif</h6>
                <h3 class="fw-bold"><?= $jumlah_tiket_aktif ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white border-0 shadow-sm">
            <div class="card-body">
                <h6>Perjalanan Selesai</h6>
                <h3 class="fw-bold"><?= $jumlah_selesai ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Tiket Saya</h5>
        <table class="table">
            <thead>
                <tr><th>Rute</th><th>Status</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                <?php foreach($tiket_user as $t): ?>
                <tr>
                    <td><?= esc($t['asal']) ?> ➔ <?= esc($t['tujuan']) ?></td>
                    <td><span class="badge bg-info"><?= $t['status_pembayaran'] ?></span></td>
                    <td><a href="<?= base_url('penumpang/riwayat') ?>" class="btn btn-sm btn-outline-primary">Detail</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>