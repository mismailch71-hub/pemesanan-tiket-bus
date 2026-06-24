<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <h3 class="fw-bold">Riwayat & E-Tiket Saya</h3>
    <p class="text-secondary">Daftar perjalanan Anda bersama Smart Bus.</p>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped bg-white shadow-sm align-middle">
        <thead class="table-primary">
            <tr>
                <th>Jadwal</th>
                <th>Kursi</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($transaksi)): ?>
                <?php foreach($transaksi as $t): ?>
                <tr>
                    <td><?= esc($t['asal'] ?? ('Bus ID: ' . $t['id_jadwal'])) ?> <?= isset($t['tujuan']) ? '➔' . esc($t['tujuan']) : '' ?></td>
                    <td><?= esc($t['nomor_kursi']) ?></td>
                    <td>Rp <?= number_format($t['total_harga'] ?? 0, 0, ',', '.') ?></td>
                    <td>
                        <?php if($t['status_pembayaran'] == 'Lunas'): ?>
                            <span class="badge bg-success">Lunas</span>
                        <?php elseif($t['status_pembayaran'] == 'Menunggu Verifikasi'): ?>
                            <span class="badge bg-info text-dark">Menunggu Verifikasi</span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if($t['status_pembayaran'] == 'Lunas'): ?>
                            <a href="<?= base_url('penumpang/etiket/'.$t['kode_tiket']) ?>" class="btn btn-sm btn-success">Lihat E-Tiket</a>
                        <?php else: ?>
                            <a href="<?= base_url('penumpang/detail_pesanan/'.$t['kode_tiket']) ?>" class="btn btn-sm btn-warning">Bayar Sekarang</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center py-4">Belum ada riwayat transaksi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>