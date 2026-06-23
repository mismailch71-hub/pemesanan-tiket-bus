<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <h3 class="fw-bold text-dark">📋 Data Penumpang</h3>
    <p class="text-secondary">
        Daftar penumpang berdasarkan jadwal keberangkatan.
    </p>
</div>

<div class="card border-0 shadow-sm rounded-3">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Data Penumpang</h5>
    </div>

    <div class="card-body">

        <div class="row mb-3">

            <div class="col-md-4">
                <select class="form-select">
                    <option>Semua Jadwal</option>
                </select>
            </div>

            <div class="col-md-4">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Cari Penumpang...">
            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Penumpang</th>
                        <th>Bus</th>
                        <th>Kursi</th>
                        <th>Status</th>
                    </tr>
                </thead>

            <tbody>

            <?php if (!empty($penumpang)) : ?>
                <?php $no = 1; ?>

                <?php foreach ($penumpang as $p) : ?>

                    <tr>
                        <td><?= $no++; ?></td>

                        <td><?= $p['nama_penumpang']; ?></td>

                        <td><?= $p['nama_bus']; ?></td>

                        <td><?= $p['nomor_kursi']; ?></td>

                        <td>
                            <span class="badge bg-success">
                                <?= $p['status_pembayaran']; ?>
                            </span>
                        </td>
                    </tr>

                <?php endforeach; ?>

            <?php else : ?>

                <tr>
                    <td colspan="5" class="text-center">
                        Tidak ada data penumpang
                    </td>
                </tr>

            <?php endif; ?>

                    </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>