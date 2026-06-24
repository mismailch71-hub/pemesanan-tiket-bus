<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

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

<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Validasi E-Ticket</h5>
    </div>

    <div class="card-body">

        <form action="#" method="POST">

            <div class="input-group">

                <input
                    type="text"
                    name="kode_booking"
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

<div class="card border-0 shadow-sm">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Manifes Keberangkatan Bus Terdekat</h5>
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

                <?php if (!empty($jadwal)) : ?>
                    <?php foreach ($jadwal as $j) : ?>

                    <tr>

                        <td><?= $j['nama_bus']; ?></td>

                        <td><?= $j['jam_keberangkatan']; ?></td>

                        <td>
                            <?= $j['asal']; ?> ➜ <?= $j['tujuan']; ?>
                        </td>

                        <td>
                            <span class="badge bg-success">
                                <?= $j['total_kursi']; ?> Kursi
                            </span>
                        </td>

                        <td>
                            <a href="<?= base_url('petugas/manifes'); ?>"
                               class="btn btn-sm btn-outline-primary">
                                Lihat Manifes
                            </a>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>
                        <td colspan="5" class="text-center">
                            Tidak ada jadwal keberangkatan
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>