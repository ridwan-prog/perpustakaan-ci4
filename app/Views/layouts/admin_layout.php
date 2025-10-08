<!-- File: app/Views/layouts/admin_layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #f8f9fa;
        }
        .sidebar a {
            color: white;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            margin: 5px 0;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .sidebar a i {
            margin-right: 15px;
            font-size: 18px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar a.active {
            background-color: #007bff;
            color: white;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Admin Perpustakaan</h4>
        <a href="<?= base_url('admin') ?>" class="active">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="<?= base_url('admin/petugas') ?>">
            <i class="fas fa-user-cog"></i> Kelola Petugas
        </a>
        <a href="<?= base_url('admin/buku') ?>">
            <i class="fas fa-book"></i> Lihat Buku
        </a>
        <a href="<?= base_url('admin/peminjaman') ?>">
            <i class="fas fa-book-open"></i> Lihat Peminjaman
        </a>
        <a href="<?= base_url('admin/laporan') ?>">
            <i class="fas fa-file-alt"></i> Cetak Laporan
        </a>
        <a href="<?= base_url('logout') ?>">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <!-- Content -->
    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>