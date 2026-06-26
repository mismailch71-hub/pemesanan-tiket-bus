<?php
/** @var array $daftar_kursi */
/** @var array $tiket */
?>
<?php $this->extend('layout/sidebar'); ?>
<?php $this->section('content'); ?>

<div class="container-fluid p-4">
    <h3 class="fw-bold mb-4">Validasi Tiket Penumpang</h3>

    <div class="card shadow-sm border-0 p-3 mb-4">
        <form action="<?= base_url('petugas/validasi_tiket') ?>" method="post" class="d-flex">
            <?= csrf_field() ?>
            <input type="text" name="kode_booking" class="form-control me-2" placeholder="Masukkan Kode Booking (Contoh: SB-XXXX)" required>
            <button type="submit" class="btn btn-primary">Cari Tiket</button>
        </form>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (isset($tiket)): ?>
            <div class="card shadow-sm border-0 p-4">
                <h5 class="text-success fw-bold">Tiket Ditemukan!</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nama penumpang:</strong> <?= esc($tiket['username']) ?></p>
                        <p><strong>Bus:</strong> <?= esc($tiket['nama_bus']) ?></p>
                        <p><strong>Rute:</strong> <?= esc($tiket['asal']) ?> - <?= esc($tiket['tujuan']) ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Jam Berangkat:</strong> <?= esc($tiket['jam_keberangkatan']) ?></p>
                        <p><strong>Nomor Kursi:</strong> <?= esc(implode(', ', $daftar_kursi)) ?></p>
                        <p><strong>Status:</strong> <span class="badge bg-success"><?= esc($tiket['status_pembayaran']) ?></span></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>