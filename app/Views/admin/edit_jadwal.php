<?php /** @var array $jadwal */ ?>
<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0 rounded-3 bg-white">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4 text-dark">📝 Edit Jadwal Bus</h4>
                
                <form action="<?= base_url('admin/jadwal/update/' . $jadwal['id']) ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Nama Bus / Armada</label>
                        <input type="text" name="nama_bus" class="form-control" value="<?= $jadwal['nama_bus'] ?>" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label small fw-bold text-secondary">Kota Asal</label>
                            <input type="text" name="asal" class="form-control" value="<?= $jadwal['asal'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-secondary">Kota Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" value="<?= $jadwal['tujuan'] ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Jam Keberangkatan</label>
                        <input type="time" name="jam_keberangkatan" class="form-control" value="<?= $jadwal['jam_keberangkatan'] ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary">Harga Tiket (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="<?= $jadwal['harga'] ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('admin/jadwal') ?>" class="btn btn-light border fw-bold">Batal</a>
                        <button type="submit" class="btn btn-primary px-4 fw-bold">Perbarui Jadwal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>