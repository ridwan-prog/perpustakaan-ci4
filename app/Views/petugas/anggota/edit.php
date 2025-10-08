<?= $this->extend('layouts/petugas_layout') ?>
<?= $this->section('content') ?>

<h3>Edit Anggota</h3>

<form action="<?= base_url('petugas/anggota/update/' . $anggota['id']) ?>" method="post">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= esc($anggota['nama']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" name="nik" class="form-control" value="<?= esc($anggota['nik']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3" required><?= esc($anggota['alamat']) ?></textarea>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= base_url('petugas/anggota') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
