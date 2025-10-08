<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<h3>Cetak Laporan Peminjaman</h3>

    <form method="post" action="<?= base_url('admin/laporan/cetak') ?>" target="_blank">

    <div class="mb-3">
        <label>Dari Tanggal:</label>
        <input type="date" name="tanggal_awal" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Sampai Tanggal:</label>
        <input type="date" name="tanggal_akhir" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Cetak</button>
</form>

<?= $this->endSection() ?>
