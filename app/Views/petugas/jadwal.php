<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <h3 class="fw-bold text-dark">🚌 Jadwal Keberangkatan</h3>
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
                        <th>Kursi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $no = 1; ?>

                    <?php foreach($jadwal as $j): ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $j['nama_bus'] ?></td>
                        <td><?= $j['asal'] ?></td>
                        <td><?= $j['tujuan'] ?></td>
                        <td><?= $j['jam_keberangkatan'] ?></td>
                        <td>
                            Rp <?= number_format($j['harga'],0,',','.') ?>
                        </td>
                        <td>
                            <span class="badge bg-success">
                                <?= $j['total_kursi'] ?> Kursi
                            </span>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>