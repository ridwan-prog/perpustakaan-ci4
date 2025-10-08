<?= $this->extend('layouts/petugas_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">📚 Kelola Buku</h3>
        <a href="<?= base_url('petugas/buku/create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Buku
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($buku)) : ?>
                            <tr>
                                <td colspan="5" class="text-center">Data buku belum tersedia.</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($buku as $b) : ?>
                                <tr>
                                    <td><?= esc($b['judul']) ?></td>
                                    <td class="text-center"><?= esc($b['tahun']) ?></td>
                                    <td><?= esc($b['penulis']) ?></td>
                                    <td class="text-center">
                                        <?php if ($b['status'] === 'Tersedia') : ?>
                                            <span class="badge bg-success">Tersedia</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">Dipinjam</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('petugas/buku/edit/'.$b['id']) ?>" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="<?= base_url('petugas/buku/delete/'.$b['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
