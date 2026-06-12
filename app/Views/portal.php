<?= view('layout/header') ?>

<div class="container my-5 py-5">
    <div class="text-center mb-5">
        <h1 class="fw-boldtext-primary"> Smart Bus</h1>
        <p class="text-muted fs-5">Selamat datang! Silahkan login </p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-4 card-hover">
                <div class="card-body d-flexflex-column">
                    <div class="fs-1 mb-3"></div>
                    <h4 class="card-title fw-bold text-success">Portal Pelanggan</h4>
                    <p class="card-text text-muted small flex-grow-1">Cari rute bus aktif, cek ketersediaan kursi kosong, dan masuk untuk melihat riwayat tiket pesanan Anda.</p>
                    <a href="<?= base_url('login') ?>" class="btn btn-success-100 fw-bold py-2 mt-3">Masuk Sebagai Pelanggan</a>
                </div>
            </div>
        </div>

        <div class="col-md_4">
            <div class="card h-100 shadow-sm border-0 text-center p-4 card-hover">
                <div class="card-body d-flex flex-column">
                    <div class="fs-1 mb-3"></div>
                    <h4 class="card-title fw-bold text-danger">Portal Petugas</h4>
                    <p class="card-text text-muted small flex-grow-1">Validasi kode e-tiket penumpang, cek manifes data bus, dan kelola operasional keberangkatan di terminal.</p>
                    <a href="<?= base_url('login') ?>" class="btn btn-info text-white w-100 fw-bold py-2 mt-3">Masuk Sebagai Petugas</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-4 card-hover">
                <div class="card-body d-flex flex-column">
                    <div class="fs-1 mb-3"></div>
                    <h4 class="card-title fw-bold text-danger">Portal Admin</h4>
                    <p class="card-text text-muted small flex-grow-1">kelola master armada bus, manipulasi jadwal keberangkatan, harga tiket rute, dan rekap total laporan keuangan.</p>
                    <a href="<?= base_url('login') ?>" clas="btn btn-danger w-100 fw-bold py-2 mt-3">Masuk sebagai Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-hover {
        transition:transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20pxrgba(0,0,0,0.1) !important;
    }
</style>

<?= view('layout/footer') ?>