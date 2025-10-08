<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<h3>Data Buku</h3>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Jumlah</th>
    </tr>
    <?php foreach($buku as $key => $b): ?>
    <tr>
        <td><?= $key + 1 ?></td>
        <td><?= esc($b['id']) ?></td>
        <td><?= esc($b['judul']) ?></td>
        <td><?= esc($b['tahun']) ?></td>
        <td><?= esc($b['penulis']) ?></td>
        <td><?= esc($b['status']) ?></td>
    </tr>
    <?php endforeach ?>
</table>

<?= $this->endSection() ?>
