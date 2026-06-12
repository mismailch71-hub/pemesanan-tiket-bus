<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Selamat Datang Kembali!</h3>
    <p class="text-secondary">Akun Aktif: <strong class="text-dark"><?= session()->get('username'); ?></strong> (Super Admin)</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h6 class="text-white-50 text-uppercase small fw-bold">Total Armada Bus</h6>
                <h2 class="fw-bold mb-0">12 Bus</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h6 class="text-white-50 text-uppercase small fw-bold">Laporan Pemasukan</h6>
                <h2 class="fw-bold mb-0">Rp 8.450.000</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-dark border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h6 class="text-dark-50 text-uppercase small fw-bold">Jadwal Teks</h6>
                <h2 class="fw-bold mb-0">24 Rute</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h6 class="text-white-50 text-uppercase small fw-bold">Ulasan Pengguna</h6>
                <h2 class="fw-bold mb-0">15 Review</h2>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-7">
        <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark mb-0">Tren Pendapatan Bulanan</h5>
                <span class="text-muted small">Tahun 2026</span>
            </div>
            <div style="position: relative; height:300px; width:100%">
                <canvas id="chartPendapatan"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100">
            <h5 class="fw-bold text-dark mb-3">Transaksi Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="font-size: 0.9rem;">
                    <thead class="table-light">
                        <tr>
                            <th>Penumpang</th>
                            <th>Rute Tujuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Farhan M.</strong></td>
                            <td>Mataram ➔ Denpasar</td>
                            <td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2">Lunas</span></td>
                        </tr>
                        <tr>
                            <td><strong>Yoga Adiguna</strong></td>
                            <td>Sumbawa ➔ Mataram</td>
                            <td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2">Lunas</span></td>
                        </tr>
                        <tr>
                            <td><strong>Rafi Asyari</strong></td>
                            <td>Mataram ➔ Labuan Bajo</td>
                            <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2">Pending</span></td>
                        </tr>
                        <tr>
                            <td><strong>Ismail C.</strong></td>
                            <td>Mataram ➔ Denpasar</td>
                            <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2">Gagal</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <h5 class="fw-bold text-secondary mb-3">Aksi Cepat Pengelolaan Sistem</h5>
    <div class="row g-2">
        <div class="col-md-4">
            <a href="<?= base_url('admin/pengguna'); ?>" class="btn btn-outline-primary py-3 w-100 fw-bold">👥 Kelola Akun Petugas / Pelanggan</a>
        </div>
        <div class="col-md-4">
            <a href="#" class="btn btn-outline-success py-3 w-100 fw-bold">🚌 Pengaturan Unit Armada</a>
        </div>
        <div class="col-md-4">
            <a href="#" class="btn btn-outline-warning py-3 w-100 fw-bold">📅 Atur Jam & Rute Keberangkatan</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>