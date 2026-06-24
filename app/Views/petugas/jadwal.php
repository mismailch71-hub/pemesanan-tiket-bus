<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <h3 class="fw-bold text-dark">Jadwal Keberangkatan</h3>
    <p class="text-secondary">
        Daftar seluruh jadwal keberangkatan bus.
    </p>
</div>

<div class="card border-0 shadow-sm rounded-3">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Bus</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Jam Berangkat</th>
                        <th>Harga</th>
                        <th>Kapasitas</th>
                        <th>Kursi Terisi</th>
                        <th>Sisa Kursi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $no = 1; ?>

                    <?php if(!empty($jadwal)): ?>
                        <?php foreach($jadwal as $j): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($j['nama_bus']) ?></td>
                            <td><?= esc($j['asal']) ?></td>
                            <td><?= esc($j['tujuan']) ?></td>
                            <td><?= date('H:i', strtotime($j['jam_keberangkatan'])) ?> WITA</td>
                            <td>
                                Rp <?= number_format($j['harga'], 0, ',', '.') ?>
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    <?= $j['kapasitas'] ?? '-' ?> Kursi
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">
                                    <?= $j['kursi_terisi'] ?> Kursi
                                </span>
                            </td>
                            <td>
                                <?php $sisa = $j['kursi_sisa'] ?? 0; ?>
                                <span class="badge <?= $sisa <= 0 ? 'bg-danger' : 'bg-success' ?>">
                                    <?= max($sisa, 0) ?> Kursi
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center py-4">
                                Belum ada Jadwal
                            </td>
                        </tr>
                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>