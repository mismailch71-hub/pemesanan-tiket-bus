<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-center">
    <div class="card shadow-sm border-0 rounded-4 p-4" style="max-width: 480px; width: 100%;">

        <div class="d-flex justify-content-between align-items-start mb-3">
            <h4 class="fw-bold mb-0">Detail Pesanan</h4>
            <span class="badge <?= $status === 'Lunas' ? 'bg-success' : 'bg-warning text-dark' ?>">
                <?= esc($status) ?>
            </span>
        </div>

        <div class="text-center mb-3">
            <small class="text-muted">Kode E-Tiket</small>
            <h5 class="fw-bold mb-0"><?= esc($kode_tiket) ?></h5>
        </div>

        <div class="mb-2">
            <small class="text-muted">Rute</small>
            <p class="fw-bold mb-0"><?= esc($pesanan['asal']) ?> ➔ <?= esc($pesanan['tujuan']) ?> </p>
        </div>

        <div class="row mb-2">
            <div class="col-6">
                <small class="text-muted">Bus</small>
                <p class="fw-bold mb-0"><?= esc($pesanan['nama_bus']) ?></p>
            </div>
            <div class="col-6">
                <small class="text-muted">Jam Berangkat</small>
                <p class="fw-bold mb-0"><?= date('H:i', strtotime($pesanan['jam_keberangkatan'])) ?> Wita</p>
            </div>
        </div>

        <div class="mb-2">
            <small class="text-muted">Jumlah Kursi (<?= count($daftar_kursi) ?>)</small>
            <p class="fw-bold mb-0"><?= esc(implode(', ', $daftar_kursi)) ?></p>
        </div>

        <div class="mb-3">
            <small class="text-muted">Total Bayar</small>
            <h4 class="fw-bold mb-0">Rp <?= number_format($total_bayar, 0, ',', '.') ?></h4>
        </div>

        <?php if ($status === 'Pending'): ?>
            <form action="<?= base_url('penumpang/bayar_sekarang/' . $kode_tiket) ?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-primary w-100 fw-bold">Bayar Sekarang</button>
            </form>
        <?php else: ?>
            <a href="<?= base_url('penumpang/etiket/' . $kode_tiket) ?>" class="btn btn-success w-100 fw-bold">Lihat E-Tiket</a>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>