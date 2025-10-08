<!DOCTYPE html>
<html>
<head>
    <title>Tambah Admin</title>
</head>
<body>
    <h1>Tambah Admin</h1>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <form method="post" action="<?= base_url('/admin/store') ?>">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
