<div class="container my-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">📈 Laporan Operasional</h2>
        <p class="text-muted">
            Ringkasan aktivitas operasional terminal bus.
        </p>
    </div>

    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    <h6>Total Bus</h6>
                    <h2><?= $totalBus ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    <h6>Total Jadwal</h6>
                    <h2><?= $totalJadwal ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark shadow">
                <div class="card-body text-center">
                    <h6>Total Pesanan</h6>
                    <h2><?= $totalPesanan ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-info text-white shadow">
                <div class="card-body text-center">
                    <h6>Total Tiket</h6>
                    <h2><?= $totalTiket ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mt-4">
        <div class="card-header bg-dark text-white">
            Ringkasan Operasional
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th>Total Bus Terdaftar</th>
                    <td><?= $totalBus ?></td>
                </tr>

                <tr>
                    <th>Total Jadwal Aktif</th>
                    <td><?= $totalJadwal ?></td>
                </tr>

                <tr>
                    <th>Total Pemesanan</th>
                    <td><?= $totalPesanan ?></td>
                </tr>

                <tr>
                    <th>Total Tiket Terjual</th>
                    <td><?= $totalTiket ?></td>
                </tr>

            </table>

        </div>
    </div>

</div>