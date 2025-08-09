<?php include __DIR__ . '/layout/header.php'; ?>

<form method="POST" action="index.php?action=<?= isset($studentData) ? 'update' : 'store' ?>">
    <?php if (isset($studentData)): ?>
        <input type="hidden" name="id" value="<?= $studentData['id'] ?>">
    <?php endif; ?>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $studentData['nama'] ?? '' ?>" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required><?= $studentData['alamat'] ?? '' ?></textarea>
    </div>
    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="">Pilih</option>
            <option value="Laki-laki" <?= isset($studentData) && $studentData['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= isset($studentData) && $studentData['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include __DIR__ . '/layout/footer.php'; ?>
