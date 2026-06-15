<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h3 class="fw-bold">Rute & Jadwal Keberangkatan</h3>
    </div>
    <div class="col-md-6">
        <form action="<?= base_url('jadwal') ?>" method="get" class="d-flex">
            <input type="text" name="cari" class="form-control me-2" placeholder="Cari kota asal atau tujuan..." value="<?= esc($keyword ?? '') ?>">
            <button type="submit" class="btn btn-primary px-4">Cari</button>
        </form>
    </div>        
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped bg-white shadow-sm align-middle">
        <thead class="table-primary">
            <tr>
                <th>Nama Bus</th>
                <th>Keberangkatan</th>
                <th>Tujuan</th>
                <th>Jam Berangkat</th>
                <th>Harga Tiket</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($daftar_jadwal)): ?>
                <?php foreach($daftar_jadwal as $j): ?>
                <tr>
                    <td><strong><?= esc($j['nama_bus']) ?></strong></td>
                    <td><?= esc($j['asal']) ?></td>
                    <td><?= esc($j['tujuan']) ?></td>
                    <td><?= date('H:i', strtotime($j['jam_keberangkatan'])) ?> WITA</td>
                    <td class="text-success fw-bold">Rp <?= number_format($j['harga'], 0, ',', '.') ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('pilih-kursi/'.$j['id']) ?>" class="btn btn-sm btn-success px-3">Pesan Kursi</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center text-danger py-3">Maaf, jadwal atau rute bus tidak ditemukan.</td>
                </tr>
            <?php endif; ?>           
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>