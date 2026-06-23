<div class="container mt-4">
    <h2>Data Jadwal Bus</h2>
    <table class="table table bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID Jadwal</th>
            </tr>
        </thead>

        <body>
            <?php $no=1; ?>
            <?php foreach($jadwal as $j): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $j['id'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>