<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0 rounded-3 bg-white">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4 text-dark">📝 Edit Data Armada Bus</h4>
                <form action="<?= base_url('admin/bus/update/' . $bus['id']) ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Nama Bus</label>
                        <input type="text" name="nama_bus" class="form-control" value="<?= esc($bus['nama_bus']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Nomor Plat</label>
                        <input type="text" name="nomor_plat" class="form-control" value="<?= esc($bus['nomor_plat']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Kelas Bus</label>
                        <select name="kelas" class="form-select" required>
                            <option value="Executive" <?= $bus['kelas'] == 'Executive' ? 'selected' : '' ?>>Executive (2+2)</option>
                            <option value="Bisnis" <?= $bus['kelas'] == 'Bisnis' ? 'selected' : '' ?>>Bisnis (2+3)</option>
                            <option value="Ekonomi" <?= $bus['kelas'] == 'Ekonomi' ? 'selected' : '' ?>>Ekonomi</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary">Kapasitas Kursi</label>
                        <input type="number" name="kapasitas" class="form-control" value="<?= esc($bus['kapasitas']) ?>" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('admin/bus') ?>" class="btn btn-light border fw-bold">Batal</a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold text-dark">Perbarui Armada</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>