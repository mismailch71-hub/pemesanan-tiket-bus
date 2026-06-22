<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">⭐ Ulasan & Feedback Penumpang</h3>
    <p class="text-secondary">Dengarkan kepuasan penumpang demi menjaga performa Smart Bus</p>
</div>

<div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <h5 class="fw-bold mb-3">Feedback Masuk</h5>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 70px;">No</th>
                    <th>Nama Akun</th>
                    <th>Rating Bintang</th>
                    <th>Komentar Keluhan / Pujian</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($semua_ulasan as $u): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><strong><?= esc($u['username']); ?></strong></td>
                    <td class="text-warning">
                        <?php for($i=1; $i<=$u['bintang']; $i++): ?>★<?php endfor; ?>
                    </td>
                    <td><p class="mb-0 text-secondary italic">"<?= esc($u['komentar']); ?>"</p></td>
                </tr>
                <?php endforeach; ?>
                
                <?php if(empty($semua_ulasan)): ?>
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">Belum ada penilaian yang dikirimkan oleh penumpang.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>