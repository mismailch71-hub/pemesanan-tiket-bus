<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Selamat Datang Kembali!</h3>
    <p class="text-secondary">Akun Aktif: <strong class="text-dark"><?= session()->get('username'); ?></strong> (Super Admin)</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h6 class="text-white-50 text-uppercase small fw-bold">Total Bus</h6>
                <h2 class="fw-bold mb-0"><?= $total_bus ?> Bus</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h6 class="text-white-50 text-uppercase small fw-bold">Laporan Pemasukan</h6>
                <h2 class="fw-bold mb-0">Rp <?= number_format($total_pemasukan, 0, ',', '.') ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-dark border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h6 class="text-dark-50 text-uppercase small fw-bold">Total Transaksi</h6>
                <h2 class="fw-bold mb-0"><?= $total_transaksi ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h6 class="text-white-50 text-uppercase small fw-bold">Ulasan Pengguna</h6>
                <h2 class="fw-bold mb-0"><?= $total_ulasan ?> Review</h2>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-7">
        <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark mb-0">Tren Pendapatan Bulanan</h5>
                <span class="text-muted small">Tahun 2026</span>
            </div>
            <div style="position: relative; height:300px; width:100%">
                <canvas id="chartPendapatan"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100">
            <h5 class="fw-bold text-dark mb-3">Transaksi Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="font-size: 0.9rem;">
                    <thead class="table-light">
                        <tr>
                            <th>Penumpang</th>
                            <th>Rute Tujuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($transaksi_terbaru)): ?>
                            <?php foreach($transaksi_terbaru as $t): ?>
                            <tr>
                                <td><strong><?= esc($t['username']) ?></strong></td>
                                <td><?= esc($t['asal']) . '➔' .esc($t['tujuan']); ?></td>
                                <td>
                                    <?php 
                                        $statusClass = ($t['status_pembayaran'] == 'Lunas') ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning';
                                    ?>
                                    <span class="badge <?= $statusClass ?> border rounded-pill px-2">
                                        <?= $t['status_pembayaran'] ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada transaksi terbaru.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    const grafikData = {
        labels: <?= json_encode($grafik_label) ?>,
        data: <?= json_encode($grafik_data) ?>
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= base_url('js/dashboard-chart.js') ?>"></script>

<?= $this->endSection(); ?>