<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0 rounded-3 bg-white">
            <div class="card-body py-4">
                <h4 class="fw-bold mb-4 text-dark text-center"> Tambah Bus Baru</h4>

                <form action="<?= base_url('admin/bus/simpan') ?>" method="post">
                    <?= csrf_field(); ?>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Nama Bus</label>
                        <input type="text" name="nama_bus" class="form-control" placeholder="Contoh: SmartesBus Executive 01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Nomor Plat</label>
                        <input type="text" name="nomor_plat" class="form-control" placeholder="Contoh: DR 7777 AA" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Kelas Bus</label>
                        <select name="kelas" class="form-select" required>
                            <option value="Executive">Executive </option>
                            <option value="Bisnis">Bisnis </option>
                            <option value="Ekonomi">Ekonomi</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary">Kapasitas Kursi</label>
                        <input type="number" name="kapasitas" class="form-control" placeholder="Jumlah kursi" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('admin/bus') ?>" class="btn btn-light border fw-bold">Batal</a>
                        <button type="submit" class="btn btn-success px-4 f-bold">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>