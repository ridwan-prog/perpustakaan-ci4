<!-- File: app/Views/layouts/petugas_layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Petugas Panel - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: row;
            background-color: #f8f9fa;
            margin: 0;
        }
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background-color: #343a40;
            color: #fff;
            padding-top: 1.5rem;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            transition: width 0.3s ease;
            z-index: 1030;
        }
        .sidebar.collapsed {
            width: 70px;
        }
        .sidebar h4 {
            padding-left: 1.5rem;
            margin-bottom: 2rem;
            font-weight: 700;
            letter-spacing: 1px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            font-weight: 500;
            padding: 12px 1.5rem;
            border-radius: 0 25px 25px 0;
            transition: background-color 0.3s, color 0.3s, padding-left 0.3s;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #495057;
            color: #fff;
            padding-left: 2.5rem;
            text-decoration: none;
        }
        .sidebar .nav-link i {
            font-size: 1.25rem;
            min-width: 24px;
            text-align: center;
        }
        .sidebar .mt-auto {
            margin-top: auto;
            padding-bottom: 1rem;
        }
        main.content {
            margin-left: 260px;
            flex-grow: 1;
            padding: 2rem;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
            background-color: #fff;
            box-shadow: inset 0 0 10px #e9ecef;
            border-radius: 8px;
            margin-top: 1rem;
            margin-bottom: 1rem;
            max-width: calc(100% - 280px);
        }

        /* Responsive: collapse sidebar on smaller screens */
        @media (max-width: 991.98px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                min-height: auto;
                flex-direction: row;
                padding: 0.5rem 1rem;
                overflow-x: auto;
                white-space: nowrap;
            }
            .sidebar.collapsed {
                width: 100%;
            }
            .sidebar h4 {
                display: none;
            }
            .sidebar .nav-link {
                border-radius: 0.25rem;
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
            main.content {
                margin-left: 0;
                margin-top: 1rem;
                max-width: 100%;
                padding: 1rem;
                border-radius: 0;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <nav class="sidebar" id="sidebar">
        <h4 class="text-white">Petugas Panel</h4>
        <a href="<?= base_url('petugas') ?>" class="nav-link <?= uri_string() === 'petugas' ? 'active' : '' ?>">
            <i class="bi bi-speedometer2"></i> <span class="link-text">Dashboard</span>
        </a>
        <a href="<?= base_url('petugas/buku') ?>" class="nav-link <?= uri_string() === 'petugas/buku' ? 'active' : '' ?>">
            <i class="bi bi-book"></i> <span class="link-text">Kelola Buku</span>
        </a>
        <a href="<?= base_url('petugas/anggota') ?>" class="nav-link <?= uri_string() === 'petugas/anggota' ? 'active' : '' ?>">
            <i class="bi bi-people"></i> <span class="link-text">Kelola Anggota</span>
        </a>
        <a href="<?= base_url('petugas/peminjaman') ?>" class="nav-link <?= uri_string() === 'petugas/peminjaman' ? 'active' : '' ?>">
            <i class="bi bi-journal-check"></i> <span class="link-text">Kelola Peminjaman</span>
        </a>
        <a href="<?= base_url('petugas/laporan') ?>" class="nav-link <?= uri_string() === 'petugas/laporan' ? 'active' : '' ?>">
            <i class="bi bi-file-earmark-text"></i> <span class="link-text">Cetak Laporan</span>
        </a>
        <div class="mt-auto">
            <a href="<?= base_url('logout') ?>" class="nav-link text-danger">
                <i class="bi bi-box-arrow-right"></i> <span class="link-text">Logout</span>
            </a>
        </div>
    </nav>

    <main class="content">
        <?= $this->renderSection('content') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
