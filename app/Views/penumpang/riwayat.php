<?= $this->extend('layout/sidebar.php'); ?>

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
                    <td>Bus ID: <?= esc($t['id_jadwal']) ?></td>
                    <td><?= esc($t['nomor_kursi']) ?></td>
                    <td>Rp <?= number_format($t['total_harga'] ?? 0, 0, ',', '.') ?></td>
                    <td>
                        <?php if($t['status_pembayaran'] == 'Lunas'): ?>
                            <span class="badge bg-success">Lunas</span>
                        <?php else: ?>
                            <span class="badge bg-warning">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if($t['status_pembayaran'] == 'Lunas'): ?>
                            <a href="<?= base_url('penumpang/tiket_digital/'.$t['id']) ?>" class="btn btn-sm btn-info">Lihat E-Tiket</a>
                        <?php else: ?>
                            <span class="text-muted small">Menunggu Bayar</span>
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