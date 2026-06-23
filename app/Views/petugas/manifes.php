<div class="container mt-4">
    <h2>Manifes Penumpang</h2>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Kursi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        <?php foreach($manifes as $m): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $m['id_user'] ?></td>
                <td><?= $m['nomor_kursi'] ?></td>
                <td><?= $m['status_pembayaran'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>