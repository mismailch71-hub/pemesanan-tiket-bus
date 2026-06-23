<div class="container my-5">
<div class="container my-5">

    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    <h6>Total Bus</h6>
                    <h2><?= $totalBus ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    <h6>Total Jadwal</h6>
                    <h2><?= $totalJadwal ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-dark shadow">
                <div class="card-body text-center">
                    <h6>Total Pesanan</h6>
                    <h2><?= $totalPesanan ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-info text-white shadow">
                <div class="card-body text-center">
                    <h6>Total Tiket</h6>
                    <h2><?= $totalTiket ?></h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row mb-4">
        <div class="col-md-8 mx-auto text-center">
            <h2 class="fw-bold text-dark">
                Operasional Terminal Petugas
            </h2>
            <p class="text-secondary">
                Silakan lakukan validasi e-ticket penumpang bus di sini.
            </p>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-6 mx-auto">
            <div class="card shadow-sm border-0 p-4 bg-light">
                <h5 class="fw-bold text-secondary mb-3">
                    Form Scan / Input Kode Booking
                </h5>

                <form action="#" method="POST">
                    <div class="input-group">

                        <input
                            type="text"
                            class="form-control form-control-lg"
                            placeholder="Masukkan Kode Booking..."
                            required>

                        <button
                            class="btn btn-dark btn-lg px-4"
                            type="submit">

                            Validasi & Check-In

                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card border-0 shadow-sm p-4">

                <h5 class="fw-bold text-secondary mb-3">
                    Manifes Keberangkatan Bus Terdekat
                </h5>

                <table class="table table-striped align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>Nama Bus</th>
                            <th>Jam Berangkat</th>
                            <th>Asal ➔ Tujuan</th>
                            <th>Penumpang Naik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><strong>Surya Kencana (Eksekutif)</strong></td>
                            <td>08:00 WITA</td>
                            <td>Mataram ➔ Denpasar</td>
                            <td>
                                <span class="badge bg-success">
                                    28 / 32 Kursi
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">
                                    Lihat Daftar Nama
                                </button>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

</div>