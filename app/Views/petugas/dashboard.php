<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <h3 class="fw-bold text-dark">📊 Dashboard Petugas</h3>
    <p class="text-secondary">
        Monitoring operasional terminal dan validasi tiket penumpang.
    </p>
</div>

<!-- Statistik -->
<div class="row g-3 mb-4">

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

<!-- Form Validasi -->
<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">🎫 Validasi E-Ticket</h5>
    </div>

    <div class="card-body">

        <form action="#" method="POST">

            <div class="input-group">

                <input
                    type="text"
                    class="form-control"
                    placeholder="Masukkan Kode Booking..."
                    required>

                <button
                    type="submit"
                    class="btn btn-primary">
                    Validasi & Check-In
                </button>

            </div>

        </form>

    </div>

</div>

<!-- Jadwal Terdekat -->
<div class="card border-0 shadow-sm">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">🚌 Manifes Keberangkatan Bus Terdekat</h5>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>Nama Bus</th>
                        <th>Jam Berangkat</th>
                        <th>Rute</th>
                        <th>Kapasitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>Surya Kencana (Eksekutif)</td>
                        <td>08:00 WITA</td>
                        <td>Mataram ➜ Denpasar</td>
                        <td>
                            <span class="badge bg-success">
                                28 / 32 Kursi
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">
                                Lihat Manifest
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Pahala Kencana</td>
                        <td>09:30 WITA</td>
                        <td>Mataram ➜ Surabaya</td>
                        <td>
                            <span class="badge bg-warning text-dark">
                                20 / 32 Kursi
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">
                                Lihat Manifest
                            </button>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>