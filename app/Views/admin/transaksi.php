<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Data Transaksi Pelanggan</h3>
</div>

<div class="card border-0 shadow-sm rounded-3 p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Pelanggan</th>
                    <th>Bus & Tujuan</th>
                    <th>Kursi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($semua_transaksi as $t): ?>
                <tr>
                    <td><strong><?= esc($t['username']); ?></strong></td>
                    <td><?= esc($t['nama_bus']); ?> <br> <small class="text-muted"><?= esc($t['tujuan']); ?></small></td>
                    <td><?= esc($t['nomor_kursi']); ?></td>
                    <td>
                        <?php if($t['status_pembayaran'] == 'Lunas'): ?>
                            <span class="badge bg-success">Lunas</span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($t['status_pembayaran'] != 'Lunas'): ?>
                            <a href="<?= base_url('admin/transaksi/konfirmasi/'.$t['id']) ?>" class="btn btn-sm btn-primary">Konfirmasi</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>