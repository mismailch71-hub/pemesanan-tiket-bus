<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h2 class="mb-4">Kelola Pengumuman</h2>

    <?php if (session()->getFlashdata('sukses')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('sukses') ?></div>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-header">Tambah pengumuman Baru</div>
        <div class="card-body">
            <form action="<?= base_url('admin/simpan_pengumuman') ?>" method="post">
                <?=  csrf_field() ?>
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Isi Pengumuman</label>
                    <textarea name="isi" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Pengumuman</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengumuman as $p): ?>
                    <tr>
                        <td><?= $p['judul'] ?></td>
                        <td><?= $p['isi'] ?></td>
                        <td>
                            <form action="<?= base_url('admin/update_pengumuman/'.$p['id']) ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="judul" value="<?= $p['judul'] ?>">
                                <input type="hidden" name="isi" value="<?= $p['isi'] ?>">
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="aktif" <?= $p['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                                    <option value="nonaktif" <?= $p['status'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/hapus_pengumuman/'.$p['id']) ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>