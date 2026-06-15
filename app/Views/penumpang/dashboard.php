<?= $this->extend('layout/sidebar'); ?>
<?= $this->section('content'); ?>

<div class="row mb-4 align-items-center">
    <div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">Daftar Transaksi</h5>
        
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Pelanggan</th>
                        <th>Jadwal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama Penumpang</td>
                        <td>Mataram - Surabaya</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td><button class="btn btn-sm btn-primary">Detail</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>   
</div>

<?= $this->endSection(); ?>
