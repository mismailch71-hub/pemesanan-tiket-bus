<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>

<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h3 class="fw-bold">Rute & Jadwal Keberangkatan</h3>
    </div>
    <div class="col-md-6">
        <form action="<?= base_url('penumpang/jadwal') ?>" method="get" class="d-flex">
            <input type="text" name="cari" class="form-control me-2" placeholder="Cari kota asal atau tujuan..." value="<?= esc($keyword ?? '') ?>">
            <button type="submit" class="btn btn-primary px-4">Cari</button>
        </form>
    </div>        
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped bg-white shadow-sm align-middle">
        <thead class="table-primary">
            <tr>
                <th class="text-center">Nama Bus</th>
                <th class="text-center">Keberangkatan</th>
                <th class="text-center">Tujuan</th>
                <th class="text-center">Tanggal dan jam Berangkat</th>
                <th class="text-center">Harga Tiket</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($daftar_jadwal)): ?>
                <?php foreach($daftar_jadwal as $j): ?>
                <tr>
                    <td class="text-center"><strong><?= esc($j['nama_bus']) ?></strong></td>
                    <td class="text-center"><?= esc($j['asal']) ?></td>
                    <td class="text-center"><?= esc($j['tujuan']) ?></td>
                    <td class="text-center"><?= date('d M Y', strtotime($j['tanggal_keberangkatan'])) ?>, <?= date('H:i', strtotime($j['jam_keberangkatan'])) ?> WITA</td>
                    <td class="text-success fw-bold text-center">Rp <?= number_format($j['harga'], 0, ',', '.') ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('penumpang/pilih-kursi/'.$j['id']) ?>" class="btn btn-sm btn-success px-3">Pesan Kursi</a>
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