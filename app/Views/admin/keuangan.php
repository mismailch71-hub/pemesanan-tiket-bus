<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Laporan Omzet Keuangan</h3>
    <p class="txt-secondary">Rekapitulasi total penjualan tiket masuk sistem</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm p-4 bg-primary text-white">
            <h6>Total Pendapatan Bulan Ini</h6>
            <h2 class="fw-bold">Rp 8.450.000</h2>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm p-4 bg-dark text-white">
            <h6>Total Tiket Terjual</h6>
            <h2 class="fw-bold">34 Tiket</h2>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <h5 class="fw-bold mb-3">log transaksi Masuk</h5>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Metode</th>
                    <th>Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>TRX-99821</td>
                    <td>12 Juni 2026</td>
                    <td>farhan M.</td>
                    <td><span class="badge bg-info">QRIS</span></td>
                    <td class="fw-bold text-success">Rp 250.000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>