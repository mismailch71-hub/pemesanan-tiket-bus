<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('styles'); ?>
    <link rel="stylesheet" href="<?= base_url('css/kursi.css?v=1') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="card shadow-sm border-0 p-4">
    <h3 class="fw-bold mb-4">Pilih Kursi & Konfirmasi Pesanan</h3>
    
    <div class="row">
        <div class="col-md-5">
            <img src="<?= base_url('assets/img/bus.png') ?>" class="card-img-top" alt="foto Bus" style="height: 180px; object-fit: cover; border-radius:0.5rem 0.5rem 0 0;">
            <div class="alert alert-info">
                <h5 class="fw-bold">Detail Perjalanan</h5>
                <p class="mb-1">Bus: <strong><?= esc($jadwal['nama_bus']) ?></strong></p>
                <p class="mb-1">Rute: <strong><?= esc($jadwal['asal']) ?> ➔ <?= esc($jadwal['tujuan']) ?></strong></p>
                <p class="mb-0">Harga per kursi: <strong>Rp <?= number_format($jadwal['harga'], 0, ',', '.') ?></strong></p>
            </div>
        </div>

        <div class="col-md-7">
            <form action="<?= base_url('penumpang/pesan_tiket') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id_jadwal" value="<?= $jadwal['id'] ?>">
                
                <div class="mb-4">
                    <label class="form-label fw-bold">Pilih Nomor Kursi (Maksimal 6)</label>
                    <div class="grid-kursi">
                        <?php foreach($daftar_semua_kursi as $nomor): ?>
                            <?php
                                $isBooked = is_array($kursi_terpesan) && in_array($nomor, $kursi_terpesan);
                            ?>

                            <?php if($isBooked): ?>
                                <div class="kursi terpesan"><?= $nomor ?></div>
                            <?php else: ?>
                                <input type="checkbox" name="nomor_kursi[]" id="kursi<?= $nomor ?>" value="<?= $nomor ?>" class="d-none">
                                <label for="kursi<?= $nomor ?>" class="kursi"><?= $nomor ?></label>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Konfirmasi Pesanan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('js/kursi.js') ?>"></script>

<?= $this->endSection(); ?>