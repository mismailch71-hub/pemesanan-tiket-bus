<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-center">
    <div class="card shadow-sm border-0 rounded-4 p-4" id="etiket-print" style="max-width: 420px; width: 100%;">
        
        <div class="text-center mb-3">
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 mb-2" style="width:64px; height:64px;">
                <span style="font-size: 32px;">✅</span>
            </div>
            <h5 class="fw-bold mb-0">Pembayaran Berhasil</h5>
            <small class="text-muted">Tiket Anda sudah aktif</small>
        </div>

        <div class="text-center mb-3">
            <h2 class="fw-bold mb-0">Rp <?= number_format($total_bayar, 0, ',', '.') ?></h2>
            <small class="text-muted">Kode Tiket: <strong><?= esc($kode_tiket) ?></strong></small>
        </div>

        <hr>

        <div class="mb-2">
            <small class="text-muted">Rute</small>
            <p class="fw-bold mb-0"><?= esc($tiket['asal']) ?> ➔ <?= esc($tiket['tujuan']) ?></p>
        </div>

        <div class="row mb-2">
            <div class="col-6">
                <small class="text-muted">Bus</small>
                <p class="fw-bold mb-0"><?= esc($tiket['nama_bus']) ?></p>
            </div>
            <div class="col-6">
                <small class="text-muted">Jam dan Berangkat</small>
                <p class="fw-bold mb-0"><?= date('d M Y', strtotime($tiket['tanggal_keberangkatan'])) ?></p>
                <p class="fw-bold mb-0"><?= date('H:i', strtotime($tiket['jam_keberangkatan'])) ?> WITA</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <small class="text-muted">Nomor Kursi (<?= count($daftar_kursi) ?>)</small>
                <p class="fw-bold mb-0"><?= esc(implode(', ', $daftar_kursi)) ?></p>
            </div>
            <div class="col-6">
                <small class="text-muted">Status</small>
                <p class="fw-bold text-success mb-0">Lunas</p>
            </div>
        </div>

        <div class="alert alert-light border text-center small text-muted mb-3">Tunjukkan e-tiket ini ke petugas sebelum naik bus</div>
        <button onclick="window.print()" class="btn btn-outline-primary rounded-pill w-100 fw-bold mb-2"> Download / Cetak E-Tiket</button>
        <a href="<?= Base_url('penumpang/dashboard') ?>" class="btn btn-primary rounded-pill w-100 fw-bold">Kembali ke Dahboard</a>
    </div>
</div>

<style>
    @media print {
        body * {visibility: hidden; }
        #etiket-print, #etiket-print * {visibility: visible; }
        #etiket-print { position: absolute; top: 0; left: 0; width: 100%; }
        #etiket-print button, #etiket-print a {display: none;}
    }
</style>

<?= $this->endSection(); ?>