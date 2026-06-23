<?= $this->extend('layout/sidebar') ;?>
<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col=md-6">
        <div class="card shadow border-0 rounded-3 bg-white">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4 text-dark">Edit Profil</h4>

                <form action="<?= Base_url('penumpang/update_profil') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="from-label small fw-bold text-secondary">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="from-label small fw-bold text-secondary">Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('penumpang/dashboard') ?>" class="btn btn-light border fw-bold">Batal</a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold text-dark">Perbarui Profil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>