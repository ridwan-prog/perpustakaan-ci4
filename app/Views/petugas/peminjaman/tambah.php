<?= $this->extend('layouts/petugas_layout') ?>
<?= $this->section('content') ?>

<h3>Tambah Peminjaman</h3>

<form action="<?= base_url('petugas/peminjaman/simpan') ?>" method="post">
    <div class="mb-3">
        <label for="buku">Pilih Buku</label>
        <select name="buku" class="form-control" required>
            <?php foreach ($buku as $b): ?>
                <option value="<?= $b['id'] ?>"><?= $b['judul'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="anggota">Pilih Anggota</label>
        <select name="anggota" class="form-control" required>
            <?php foreach ($anggota as $a): ?>
                <option value="<?= $a['id'] ?>"><?= $a['nama'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="tanggal_mulai">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="tanggal_sampai">Tanggal Sampai</label>
        <input type="date" name="tanggal_sampai" class="form-control" required>
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
</form>

<?= $this->endSection() ?>
