<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Ulasan & Feedback Pelanggan</h3>
    <p class="text-secondary">Melihat tingkat kepuasan penumpang Bus</p>
</div>

<idv class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <h5 class="fw-bold mb-3">Review Pengguna Terbaru</h5>

    <div class="border-bottom pb-3 mb-3">
        <div class="d-flex justify-content-between">
            <h6 class="fw-bold mb-1">Yoga Adiguna<span class="text-warning">⭐⭐⭐⭐⭐</span></h6>
            <small class="text-muted">2 Jam yang lalu</small>
        </div>
        <p class="text-secondary mb-0">"Busnya sangat nyman, AC dingin, dan keberangkatan tepat waktu dari terminal Mandalika Mataram!"</p>
    </div>

    <div>
        <div class="d-flex justify-content-between">
            <h6 class="fw-nold mb-1">Rafi Asyari<span class="text_warning">⭐⭐⭐⭐</span>★</h6>
        </div>
        <p class="text-secondary mb-0">"Pelayanan petugas loketnya ramah sekali, tapi selimut di dalam bus agak sedikit tipis."</p>
    </div>
</idv>
<?= $this->endSection(); ?>