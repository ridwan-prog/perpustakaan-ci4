<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<h3>Edit Petugas</h3>
<form action="<?= base_url('admin/petugas/update/'.$petugas['id']) ?>" method="post">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $petugas['nama'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?= $petugas['username'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Password Baru (opsional)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button class="btn btn-primary">Update</button>
</form>

<?= $this->endSection() ?>
