<div class="container my-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">
            📈 Laporan Operasional Terminal
        </h2>
        <p class="text-muted">
            Ringkasan aktivitas operasional Smart Bus
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card border-0 shadow-lg bg-primary text-white">
                <div class="card-body text-center">
                    <h6>Total Bus</h6>
                    <h1><?= $totalBus ?></h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-lg bg-success text-white">
                <div class="card-body text-center">
                    <h6>Total Jadwal</h6>
                    <h1><?= $totalJadwal ?></h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-lg bg-warning">
                <div class="card-body text-center">
                    <h6>Total Pesanan</h6>
                    <h1><?= $totalPesanan ?></h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-lg bg-info text-white">
                <div class="card-body text-center">
                    <h6>Total Tiket</h6>
                    <h1><?= $totalTiket ?></h1>
                </div>
            </div>
        </div>

    </div>

    <div class="card border-0 shadow-lg mt-5">
        <div class="card-header bg-dark text-white">
            📊 Ringkasan Operasional
        </div>

        <div class="card-body">

            <div class="row text-center">

                <div class="col-md-3">
                    <h5 class="text-primary">
                        <?= $totalBus ?>
                    </h5>
                    <small>Bus Terdaftar</small>
                </div>

                <div class="col-md-3">
                    <h5 class="text-success">
                        <?= $totalJadwal ?>
                    </h5>
                    <small>Jadwal Aktif</small>
                </div>

                <div class="col-md-3">
                    <h5 class="text-warning">
                        <?= $totalPesanan ?>
                    </h5>
                    <small>Total Pesanan</small>
                </div>

                <div class="col-md-3">
                    <h5 class="text-info">
                        <?= $totalTiket ?>
                    </h5>
                    <small>Tiket Terjual</small>
                </div>

            </div>

        </div>
    </div>

</div>