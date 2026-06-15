<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="card shadow-sm border-0 p-4">
    <h3 class="fw-bold mb-4">Pilih Kursi & Konfirmasi Pesanan</h3>
    
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-info">
                <h5 class="fw-bold">Detail Perjalanan</h5>
                <p class="mb-1">Bus: <strong><?= esc($jadwal['nama_bus']) ?></strong></p>
                <p class="mb-1">Rute: <strong><?= esc($jadwal['asal']) ?> ➔ <?= esc($jadwal['tujuan']) ?></strong></p>
                <p class="mb-0">Harga: <strong>Rp <?= number_format($jadwal['harga'], 0, ',', '.') ?></strong></p>
            </div>
        </div>

        <div class="col-md-6">
            <form action="<?= base_url('penumpang/pesan_tiket') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id_jadwal" value="<?= $jadwal['id'] ?>">
                
                <div class="mb-3">
                    <label class="form-label">Nomor Kursi</label>
                    <input type="text" name="nomor_kursi" class="form-control" placeholder="Contoh: A1, A2..." required>
                    <small class="text-muted">Masukkan nomor kursi yang tersedia.</small>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Konfirmasi Pesanan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>