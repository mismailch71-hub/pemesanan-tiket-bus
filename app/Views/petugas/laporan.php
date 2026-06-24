<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <h3 class="fw-bold text-dark">
         Laporan Operasional Terminal
    </h3>
    <p class="text-secondary">
        Ringkasan data operasional sistem pemesanan tiket bus.
    </p>
</div>

<!-- Statistik -->
<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-primary text-white">
            <div class="card-body text-center">
                <h6>Total Bus</h6>
                <h2><?= $totalBus ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-success text-white">
            <div class="card-body text-center">
                <h6>Total Jadwal</h6>
                <h2><?= $totalJadwal ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-warning">
            <div class="card-body text-center">
                <h6>Total Pesanan</h6>
                <h2><?= $totalPesanan ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-info text-white">
            <div class="card-body text-center">
                <h6>Total Tiket</h6>
                <h2><?= $totalTiket ?></h2>
            </div>
        </div>
    </div>

</div>

<!-- Tabel Ringkasan -->
<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Ringkasan Operasional</h5>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-light">
                    <tr>
                        <th>Keterangan</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Total Bus Terdaftar</td>
                        <td><?= $totalBus ?></td>
                    </tr>

                    <tr>
                        <td>Total Jadwal Aktif</td>
                        <td><?= $totalJadwal ?></td>
                    </tr>

                    <tr>
                        <td>Total Pesanan</td>
                        <td><?= $totalPesanan ?></td>
                    </tr>

                    <tr>
                        <td>Total Tiket Terjual</td>
                        <td><?= $totalTiket ?></td>
                    </tr>
                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- Kesimpulan -->
<div class="card border-0 shadow-sm">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Kesimpulan Laporan</h5>
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            <li class="list-group-item">
                Total bus yang terdaftar sebanyak
                <strong><?= $totalBus ?></strong> unit.
            </li>

            <li class="list-group-item">
                Tersedia
                <strong><?= $totalJadwal ?></strong> jadwal keberangkatan aktif.
            </li>

            <li class="list-group-item">
                Total transaksi pemesanan sebanyak
                <strong><?= $totalPesanan ?></strong> pesanan.
            </li>

            <li class="list-group-item">
                Total tiket yang telah diterbitkan sebanyak
                <strong><?= $totalTiket ?></strong> tiket.
            </li>

        </ul>

    </div>

</div>

<?= $this->endSection(); ?>