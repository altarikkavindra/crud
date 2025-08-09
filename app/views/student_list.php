<?php include __DIR__ . '/layout/header.php'; ?>

<a href="index.php?action=create" class="btn btn-primary mb-3">Tambah Siswa</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
            <td>
                <a href="index.php?action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="index.php?action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/layout/footer.php'; ?>
