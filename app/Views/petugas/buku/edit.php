<!-- File: app/Views/petugas/buku/edit.php -->
<?= $this->extend('layouts/petugas_layout') ?>
<?= $this->section('content') ?>

<h3>Edit Buku</h3>
<form action="<?= base_url('petugas/buku/update/' . $buku['id']) ?>" method="post">
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Buku</label>
        <input type="text" name="judul" class="form-control" value="<?= esc($buku['judul']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="tahun" class="form-label">Tahun Terbit</label>
        <input type="number" name="tahun" class="form-control" value="<?= esc($buku['tahun']) ?>" min="1900" max="<?= date('Y') ?>" required>
    </div>
    <div class="mb-3">
        <label for="penulis" class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control" value="<?= esc($buku['penulis']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-select" required>
            <option value="tersedia" <?= $buku['status'] == 'tersedia' ? 'selected' : '' ?>>Tersedia</option>
            <option value="dipinjam" <?= $buku['status'] == 'dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('petugas/buku') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
