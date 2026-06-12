<?=  $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-4">Manajemen Armada Bus</h3>
    <p class="text-secondary">Kelola daftar bus, tipe kelas, dan total kapasitas kursi</p>
</div>

<div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
    <div classs="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Daftar Bus Aktif</h5>
        <button class="btn btn-success btn-sm fw-bold">➕ Tambah Armada</button> 
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middl">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Bus</th>
                    <th>Nomor Plat</th>
                    <th>Kelas</th>
                    <th>kapasitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><strong>SmartesBus Executive 01</strong></td>
                    <td>DR 7777 AA</td>
                    <td>m.ismail.ch71@gmail.com</td>
                    <td><span class="badge bg-danger">Executive (2+2)</span></td>
                    <td>
                        <button class="btn btn-sm btn-warning">Edit</button>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>