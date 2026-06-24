<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Rekapitulasi Laporan Keuangan</h3>
    <p class="text-secondary">Pantau total omset penjualan tiket masuk Smart Bus</p>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-primary text-white p-4 rounded-3">
            <h6 class="text-uppercase small fw-bold opacity-75">Total Omset Pendapatan</h6>
            <h2 class="fw-bold mb-0">Rp <?= number_format($total_pendapatan, 0, ',', '.'); ?></h2>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <h5 class="fw-bold mb-3">Arus Transaksi Tiket</h5>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>ID User Pelanggan</th>
                    <th>No. Kursi</th>
                    <th>Total Bayar</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>

            <tbody>

            <?php if (!empty($transaksi)) : ?>

                <?php $no = 1; ?>
                <?php foreach ($transaksi as $t) : ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td>User #<?= $t['id_user']; ?></td>
                    <td><?= $t['nomor_kursi']; ?></td>
                    <td>Rp <?= number_format($t['total_harga'], 0, ',', '.'); ?></td>

                    <td>
                        <?php if ($t['status_pembayaran'] == 'Pending') : ?>

                            <a href="<?= base_url('admin/transaksi/konfirmasi/'.$t['id']); ?>"
                            class="btn btn-success btn-sm">
                                Konfirmasi
                            </a>

                        <?php else : ?>

                            <span class="badge bg-success">
                                Lunas
                            </span>

                        <?php endif; ?>
                    </td>

                </tr>

                <?php endforeach; ?>

            <?php else : ?>

                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        Belum ada riwayat transaksi masuk.
                    </td>
                </tr>

            <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>