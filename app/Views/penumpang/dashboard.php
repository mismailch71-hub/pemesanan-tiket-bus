<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success') || session()->getFlashdata('error')): ?>
    <div class="alert alert-<?= session()->getFlashdata('success') ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
        <?= esc(session()->getFlashdata('success') ?? session()->getFlashdata('error')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Halo, <?= esc(session()->get('username')); ?>!</h3>
    <a href="<?= base_url('penumpang/edit_profil') ?>" class="btn btn-primary shadow-sm">
        <i class="bi bi-search"></i> Edit Profil
    </a>
</div>

<div class="row">
    <div class="col-md-6">
        <h5 class="fw-bold mb-3"><i class="bi bi-megaphone"></i> Pengumuman Terbaru</h5>
        <?php if (empty($pengumuman_list)): ?>
            <idv class="card shadow-sm border-0">
                <div class="card-body text-muted">Tidak ada pengumuman aktif.</div>
            </idv>
        <?php else: ?>
            <?php foreach ($pengumuman_list as $p): ?>
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="fw-bold text-primary"><?= esc($p['judul']) ?></h6>
                        <p class="small mb-0"><?= esc($p['isi']) ?></p>
                        <small class="text-muted"><?= $p['created_at'] ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="col-md-6">
        <h5 class="fw-bold mb-3"><i class="bi bi-chat-qoute"></i> Berikan Ulasan Kami</h5>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="<?= base_url('penumpang/kirim_ulasan') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <select name="rating" class="form-select" required>
                            <option value="5">⭐⭐⭐⭐⭐ (Sangat Puas)</option>
                            <option value="4">⭐⭐⭐⭐ (Puas)</option>
                            <option value="3">⭐⭐⭐ (Cukup Puas)</option>
                            <option value="2">⭐⭐ (Tidak Puas)</option>
                            <option value="1">⭐ (Sangat Tidak Puas)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Ulasan</label>
                        <textarea name="isi" class="form-control" orws="3" required placeholder="Tuliskan pengalaman Anda..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Kirim Ulasan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>