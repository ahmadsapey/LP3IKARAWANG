@php
    // Carousel data is provided by AdminController@index
    $carouselData = $carouselData ?? [];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - LP3I Karawang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand-dark: #004269;
            --brand-accent: #009DA5;
            --brand-blue: #3b82f6;
            --brand-success: #10b981;
            --brand-danger: #ef4444;
            --brand-warning: #f59e0b;
            
            --bg-gradient: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            --card-bg: rgba(255, 255, 255, 0.9);
            --card-bg-hover: #ffffff;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: rgba(229, 231, 235, 0.8);
            
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 16px 40px rgba(0, 0, 0, 0.12);
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', system-ui, -apple-system, sans-serif;
            color: var(--text-main);
            background: 
                radial-gradient(at 0% 0%, rgba(0, 157, 165, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(0, 66, 105, 0.05) 0px, transparent 50%),
                #f9fafb;
            min-height: 100vh;
            padding: 0;
            margin: 0;
        }

        /* Container Layout */
        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        /* Elegant Header Card */
        .admin-header {
            background: linear-gradient(135deg, var(--brand-dark) 0%, #002c47 100%);
            color: white;
            border-radius: 20px;
            padding: 2.25rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.08);
            position: relative;
            overflow: hidden;
        }

        .admin-header::after {
            content: '';
            position: absolute;
            width: 250px;
            height: 250px;
            background: rgba(0, 157, 165, 0.15);
            border-radius: 50%;
            top: -100px;
            right: -50px;
            filter: blur(50px);
            pointer-events: none;
        }

        .admin-header h1 {
            font-size: 2.25rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .admin-header p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 300;
        }

        /* Two Column Grid */
        .admin-content {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2rem;
            align-items: start;
        }

        /* Sidebar Styling */
        .sidebar {
            background: white;
            border-radius: 20px;
            padding: 1.75rem 1.25rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
        }

        .sidebar h3 {
            color: var(--brand-dark);
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 1.25rem;
            padding-left: 0.75rem;
            opacity: 0.65;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.85rem 1.25rem;
            color: #4b5563;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .sidebar-menu a i {
            font-size: 1.1rem;
            transition: var(--transition);
        }

        .sidebar-menu a:hover {
            color: var(--brand-dark);
            background: #f3f4f6;
            transform: translateX(3px);
        }

        .sidebar-menu a.active {
            background: linear-gradient(135deg, var(--brand-dark) 0%, var(--brand-accent) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 66, 105, 0.2);
        }

        .sidebar-menu a.active i {
            color: white;
        }

        /* Main Content Panel */
        .main-content {
            background: white;
            border-radius: 20px;
            padding: 2.25rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            min-height: 550px;
        }

        .content-section {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        .content-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-title {
            color: var(--brand-dark);
            font-size: 1.65rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 80px;
            height: 2px;
            background: var(--brand-accent);
        }

        /* Custom Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.65rem 1.25rem;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            border: none;
            transition: var(--transition);
            text-decoration: none;
            font-family: inherit;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-primary {
            background: var(--brand-dark);
            color: white;
        }

        .btn-primary:hover {
            background: #003352;
            box-shadow: 0 4px 12px rgba(0, 66, 105, 0.2);
        }

        .btn-success {
            background: var(--brand-success);
            color: white;
        }

        .btn-success:hover {
            background: #059669;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .btn-danger {
            background: var(--brand-danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        }

        .btn-edit {
            background: #eff6ff;
            color: var(--brand-blue);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .btn-edit:hover {
            background: var(--brand-blue);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
        }

        .btn-delete {
            background: #fef2f2;
            color: var(--brand-danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-delete:hover {
            background: var(--brand-danger);
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        }

        /* Carousel/Slide Card Grid */
        .carousel-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .carousel-item {
            background: white;
            border-radius: 16px;
            padding: 1.25rem;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 220px;
        }

        .carousel-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: rgba(0, 157, 165, 0.3);
        }

        .carousel-info {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            position: relative;
        }

        .carousel-info h3 {
            color: var(--brand-dark);
            font-size: 1.15rem;
            font-weight: 600;
        }

        .carousel-info p {
            color: var(--text-muted);
            font-size: 0.85rem;
            line-height: 1.4;
            margin-bottom: 0.5rem;
        }

        .image-preview {
            width: 100%;
            height: 140px;
            border-radius: 10px;
            overflow: hidden;
            background: #f3f4f6;
            margin-bottom: 0.75rem;
            border: 1px solid var(--border-color);
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .status {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            padding: 0.25rem 0.65rem;
            border-radius: 99px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status.active {
            background: #d1fae5;
            color: #065f46;
        }

        .status.inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .carousel-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            border-top: 1px solid var(--border-color);
            padding-top: 0.75rem;
        }

        .carousel-actions .btn {
            flex: 1;
            padding: 0.5rem;
            font-size: 0.85rem;
        }

        /* Modern Tables */
        .news-list-container {
            margin-top: 1.5rem;
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        .news-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            text-align: left;
        }

        .news-table th {
            background: #f9fafb;
            padding: 1rem 1.25rem;
            color: var(--brand-dark);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
        }

        .news-table td {
            padding: 1.25rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-main);
            vertical-align: middle;
        }

        .news-table tbody tr:last-child td {
            border-bottom: none;
        }

        .news-table tbody tr:hover {
            background: #f9fafb;
        }

        .news-item-info h4 {
            color: var(--brand-dark);
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .news-excerpt {
            color: var(--text-muted);
            font-size: 0.8rem;
            line-height: 1.4;
        }

        .category-badge {
            display: inline-flex;
            padding: 0.25rem 0.65rem;
            background: #eff6ff;
            color: var(--brand-blue);
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .news-actions {
            display: flex;
            gap: 0.5rem;
        }

        .news-actions .btn {
            padding: 0.45rem 0.75rem;
            font-size: 0.8rem;
        }

        /* Beautiful Forms */
        .elegant-form {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            color: var(--brand-dark);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select,
        textarea.form-control,
        .form-group input:not([type="file"]):not([type="submit"]):not([type="hidden"]),
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--text-main);
            outline: none;
            background: #ffffff;
            transition: var(--transition);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .form-control:focus,
        .form-select:focus,
        textarea.form-control:focus,
        .form-group input:not([type="file"]):not([type="submit"]):not([type="hidden"]):focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--brand-accent);
            box-shadow: 0 0 0 4px rgba(0, 157, 165, 0.1);
            background: white;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .form-help {
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        /* Custom File Upload dropzone */
        .image-upload {
            border: 2px dashed rgba(0, 157, 165, 0.3);
            background: #f9fafb;
            border-radius: 16px;
            padding: 2.25rem 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem;
        }

        .image-upload:hover {
            background: rgba(0, 157, 165, 0.03);
            border-color: var(--brand-accent);
        }

        .image-upload i {
            font-size: 2.5rem;
            color: var(--brand-accent);
            opacity: 0.8;
        }

        .form-group input[type="file"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1.5px dashed var(--border-color);
            border-radius: 12px;
            background: #f9fafb;
            color: var(--text-main);
            cursor: pointer;
            transition: var(--transition);
        }

        .form-group input[type="file"]:hover {
            border-color: var(--brand-accent);
            background: rgba(0, 157, 165, 0.02);
        }

        /* Modern Modals */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(8px);
            z-index: 1000;
            animation: fadeIn 0.25s ease;
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            max-width: 600px;
            width: 90%;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            animation: slideUp 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translate(-50%, -42%); }
            to { opacity: 1; transform: translate(-50%, -50%); }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1rem;
        }

        .modal-header h3 {
            color: var(--brand-dark);
            font-size: 1.35rem;
            font-weight: 700;
        }

        .close-modal {
            background: #f3f4f6;
            border: none;
            font-size: 1.25rem;
            cursor: pointer;
            color: var(--text-muted);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .close-modal:hover {
            background: #e5e7eb;
            color: var(--text-main);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .admin-content {
                grid-template-columns: 1fr;
            }
            .sidebar {
                width: 100%;
            }
        }

        @media (max-width: 640px) {
            .admin-container {
                padding: 1rem;
            }
            .main-content {
                padding: 1.5rem;
            }
            .modal-content {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
        {{-- <nav>
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('storage/image/LOGO_LP3I.png') }}" alt="LP3I Karawang Logo" />
                </a>
            </div>
            <button class="mobile-menu-toggle">☰</button>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li class="dropdown">
                    <a href="#profil">Profil</a>
                    <div class="dropdown-content">
                        <a href="/sambutan">Sambutan</a>
                        <a href="/sejarah">Sejarah</a>
                        <a href="#prestasi">Prestasi</a>
                        <a href="/struktur">Struktur Organisasi</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#programs">Program Studi</a>
                    <div class="dropdown-content">
                        <a href="#teknik-informatika">Teknik Informatika</a>
                        <a href="#manajemen-bisnis">Manajemen Bisnis</a>
                        <a href="#akuntansi">Akuntansi</a>
                        <a href="#marketing-digital">Marketing Digital</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#akademik">Akademik</a>
                    <div class="dropdown-content">
                        <a href="#kalender-akademik">Kalender Akademik</a>
                        <a href="#kurikulum">Kurikulum</a>
                        <a href="#sistem-pembelajaran">Sistem Pembelajaran</a>
                        <a href="#evaluasi">Evaluasi</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#pusat-karir">Pusat Karir</a>
                    <div class="dropdown-content">
                        <a href="#lowongan-kerja">Lowongan Kerja</a>
                        <a href="#magang">Program Magang</a>
                        <a href="#alumni">Alumni</a>
                        <a href="#kerjasama-industri">Kerjasama Industri</a>
                    </div>
                </li>
            </ul>
        </nav> --}}
    </header>

    <div class="admin-container">
        <div class="admin-header">
            <h1><i class="fas fa-cogs"></i> Admin Panel</h1>
            <p>Kelola Carousel & Konten Website LP3I Karawang</p>
        </div>

        <div class="admin-content">
            <div class="sidebar">
                <h3>Menu Admin</h3>
                <ul class="sidebar-menu">
                    <li><a href="/admin/carousel" class="{{ (isset($active) && $active === 'carousel') ? 'menu-link active' : 'menu-link' }}" data-section="carousel">
                        <i class="fas fa-images"></i> Kelola Carousel (Home)
                    </a></li>
                    <li><a href="/admin/berita" class="{{ (isset($active) && $active === 'news') ? 'menu-link active' : 'menu-link' }}" data-section="news">
                        <i class="fas fa-newspaper"></i> Kelola Berita
                    </a></li>

                    <li><a href="/admin/carousel-kegiatan" class="{{ (isset($active) && $active === 'carousel_kegiatan') ? 'menu-link active' : 'menu-link' }}" data-section="carousel-kegiatan">
                        <i class="fas fa-images"></i> Kelola Carousel (Kegiatan)
                    </a></li>

                    <li><a href="/admin/penempatan" class="menu-link">
                        <i class="fas fa-briefcase"></i> Kelola Penempatan
                    </a></li>

                    <li><a href="/admin/struktur-organisasi" class="menu-link">
                        <i class="fas fa-sitemap"></i> Kelola Struktur Organisasi
                    </a></li>

                    <li><a href="/admin/pengaturan" class="{{ (isset($active) && $active === 'settings') ? 'menu-link active' : 'menu-link' }}" data-section="settings">
                        <i class="fas fa-cog"></i> Pengaturan
                    </a></li>
                    <li><a href="/" class="menu-link">
                        <i class="fas fa-home"></i> Kembali ke Website
                    </a></li>
                    <li style="margin-top:1rem">
                        <form method="POST" action="/admin/logout">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="width:100%">Logout Admin</button>
                        </form>
                    </li>
                </ul>
            </div>

            <div class="main-content">
                <!-- Carousel Management Section -->
                <div class="content-section {{ (isset($active) && $active === 'carousel') ? 'active' : '' }}" id="carousel-section">
                    <h2 class="section-title">Kelola Carousel</h2>
                    
                    <button class="btn btn-success" onclick="openAddModal()">
                        <i class="fas fa-plus"></i> Tambah Slide Baru
                    </button>

                    <div class="carousel-list" id="carousel-list">
                        <?php foreach ($carouselData as $slide): ?>
                        <div class="carousel-item" data-id="<?= $slide['id'] ?>">
                            <div class="carousel-info">
                                <h3><?= htmlspecialchars($slide['title']) ?></h3>
                                <p><?= htmlspecialchars($slide['subtitle']) ?></p>
                                <span class="status <?= $slide['status'] ?>"><?= ucfirst($slide['status']) ?></span>
                                <?php if (!empty($slide['image_path'])):
                                    // normalize slide image URL (public path -> storage link)
                                    $imgUrl = '';
                                    $p = $slide['image_path'];
                                    if (file_exists(public_path($p))) {
                                        $imgUrl = asset($p);
                                    } elseif (file_exists(public_path('storage/' . ltrim($p, '/')))) {
                                        $imgUrl = asset('storage/' . ltrim($p, '/'));
                                    } elseif (file_exists(storage_path('app/public/' . ltrim($p, '/')))) {
                                        $imgUrl = asset('storage/' . ltrim($p, '/'));
                                    }
                                    if ($imgUrl): ?>
                                    <div class="image-preview">
                                        <img src="<?= $imgUrl ?>" alt="Slide Image" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                    </div>
                                <?php endif; endif; ?>
                            </div>
                            <div class="carousel-actions">
                                <button class="btn-edit" onclick="editSlide(<?= $slide['id'] ?>)">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn-delete" onclick="deleteSlide(<?= $slide['id'] ?>)">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- News Management Section -->
                <div class="content-section{{ (isset($active) && $active === 'news') ? ' active' : '' }}" id="news-section">
                    <h2 class="section-title">Kelola Berita</h2>
                    
                    <button class="btn btn-success" onclick="openAddNewsModal()">
                        <i class="fas fa-plus"></i> Tambah Berita Baru
                    </button>

                    <div class="news-list-container">
                        <table class="news-table">
                            <thead>
                                <tr>
                                    <th>Judul & Ringkasan</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Tanggal</th>
                                    <th style="width:190px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="news-list">
                                <!-- news rows injected here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Carousel Kegiatan Management Section -->
                <div class="content-section{{ (isset($active) && $active === 'carousel_kegiatan') ? ' active' : '' }}" id="carousel-kegiatan-section">
                    <h2 class="section-title">Kelola Carousel (Kegiatan)</h2>
                    <button class="btn btn-success" onclick="openKegiatanModal()">
                        <i class="fas fa-plus"></i> Tambah Slide Kegiatan
                    </button>
                    <div class="carousel-list" id="carousel-kegiatan-list" style="margin-top:1.5rem;"></div>

                    <!-- Modal Tambah/Edit Carousel Kegiatan -->
                    <div class="modal" id="kegiatan-modal" style="display:none;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 id="kegiatan-modal-title">Tambah Slide Kegiatan</h3>
                                <button class="close-modal" onclick="closeKegiatanModal()">&times;</button>
                            </div>
                            <form id="kegiatan-form" class="elegant-form" enctype="multipart/form-data" onsubmit="handleKegiatanFormSubmit(event)">
                                <input type="hidden" id="kegiatan-id" name="id">
                                <div class="form-group">
                                    <label for="kegiatan-title">Judul Slide:</label>
                                    <input type="text" id="kegiatan-title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="kegiatan-image">Gambar Slide:</label>
                                    <input type="file" id="kegiatan-image" name="image" accept="image/*">
                                    <div id="kegiatan-image-preview" class="image-preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="kegiatan-status">Status:</label>
                                    <select id="kegiatan-status" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                                    <button type="button" class="btn btn-danger" onclick="closeKegiatanModal()">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Penempatan Management Section -->
                <div class="content-section" id="penempatan-section">
                    <h2 class="section-title">Kelola Penempatan</h2>
                    <button class="btn btn-success" onclick="openPenempatanModal()"><i class="fas fa-plus"></i> Tambah Penempatan</button>
                    <div id="penempatan-list" style="margin-top:1rem; display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:1rem"></div>
                </div>

                <!-- Struktur Organisasi Section -->
                <div class="content-section" id="struktur-organisasi-section">
                    <h2 class="section-title">Kelola Struktur Organisasi</h2>
                    <a href="{{ route('struktur-organisasi.index') }}" class="btn btn-success">
                        <i class=""></i> View Data
                    </a>
                    <div id="struktur-list" style="margin-top:1rem; display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:1rem"></div>
                </div>

                <!-- Settings Section -->
                <div class="content-section{{ (isset($active) && $active === 'settings') ? ' active' : '' }}" id="settings-section">
                    <h2 class="section-title">Pengaturan</h2>
                    <p>Atur aset dan preferensi website seperti gambar registrasi.</p>
                    <div style="display:flex; gap:1.5rem; flex-direction:column; max-width:600px;">
                        
                        <!-- Gambar Registrasi -->
                        <div style="background:#fff; border:1px solid #e2e8f0; padding:1.5rem; border-radius:12px;">
                            <h3 style="font-weight:700; margin-bottom:1rem; font-size:1.1rem; color:var(--primary);">Gambar Registrasi</h3>
                            <div class="form-group">
                                <label for="registration-image-input">Gambar Registrasi (tampil di halaman pendaftaran)</label>
                                <div class="image-upload" onclick="document.getElementById('registration-image-input').click();">
                                    <i class="fas fa-upload"></i>
                                    <div id="registration-image-preview" class="image-preview"></div>
                                </div>
                                <small id="registration-image-path" style="display:block;margin-top:0.5rem;color:#666;font-size:0.85rem;"></small>
                                <input type="file" id="registration-image-input" name="image" style="display:none;" accept="image/*" onchange="previewRegistrationImage(this)">
                                <span class="form-help">Pilih file gambar (jpg, png) untuk ditampilkan pada halaman pendaftaran.</span>
                            </div>
                            <div style="display:flex; gap:1rem; justify-content:flex-end; margin-top:1rem;">
                                <button type="button" class="btn btn-danger" onclick="resetRegistrationImage()">Reset</button>
                                <button type="button" class="btn btn-success" onclick="saveRegistrationImage()">Simpan</button>
                            </div>
                        </div>

                        <!-- Sambutan Branch Manager -->
                        <div style="background:#fff; border:1px solid #e2e8f0; padding:1.5rem; border-radius:12px;">
                            <h3 style="font-weight:700; margin-bottom:1rem; font-size:1.1rem; color:var(--primary);">Sambutan Branch Manager (Kepala Kampus)</h3>
                            
                            <div class="form-group" style="margin-bottom:1rem;">
                                <label for="bm-name-input">Nama Lengkap Kepala Kampus:</label>
                                <input type="text" id="bm-name-input" placeholder="Contoh: Aceng Ajat, S.T., M.M." style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:6px; margin-top:0.25rem;">
                            </div>

                            <div class="form-group" style="margin-bottom:1rem;">
                                <label for="bm-title-input">Jabatan (Badge):</label>
                                <input type="text" id="bm-title-input" placeholder="Contoh: Branch Manager" style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:6px; margin-top:0.25rem;">
                            </div>

                            <div class="form-group" style="margin-bottom:1rem;">
                                <label for="bm-role-input">Peran/Instansi (Signature):</label>
                                <input type="text" id="bm-role-input" placeholder="Contoh: Kepala Kampus LP3I Karawang" style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:6px; margin-top:0.25rem;">
                            </div>

                            <div class="form-group" style="margin-bottom:1rem;">
                                <label for="bm-greeting-input">Kalimat Salam / Pembuka:</label>
                                <textarea id="bm-greeting-input" rows="2" placeholder="Contoh: Assalamu’alaikum Warahmatullahi Wabarakatuh..." style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:6px; margin-top:0.25rem; font-family:inherit;"></textarea>
                            </div>

                            <div class="form-group" style="margin-bottom:1rem;">
                                <label for="bm-quote-input">Kutipan Highlight (Quote):</label>
                                <textarea id="bm-quote-input" rows="2" placeholder="Tulis kutipan motivasi yang disorot..." style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:6px; margin-top:0.25rem; font-family:inherit;"></textarea>
                            </div>

                            <div class="form-group" style="margin-bottom:1.5rem;">
                                <label for="bm-content-input">Isi Sambutan Lengkap (Gunakan tag &lt;p&gt; untuk paragraf baru):</label>
                                <textarea id="bm-content-input" rows="8" placeholder="Tulis paragraf lengkap sambutan..." style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:6px; margin-top:0.25rem; font-family:inherit;"></textarea>
                            </div>

                            <div class="form-group" style="margin-bottom:1rem;">
                                <label>Foto Kepala Kampus (Rasio pas-foto 3:4):</label>
                                <div class="image-upload" onclick="document.getElementById('bm-image-input').click();" style="border: 2px dashed #cbd5e1; padding: 1.5rem; border-radius: 12px; text-align: center; cursor: pointer; margin-top:0.25rem;">
                                    <i class="fas fa-upload" style="font-size:1.5rem; color:#94a3b8; margin-bottom:0.5rem; display:block;"></i>
                                    <div id="bm-image-preview" class="image-preview"></div>
                                </div>
                                <small id="bm-image-path" style="display:block;margin-top:0.5rem;color:#666;font-size:0.85rem;"></small>
                                <input type="file" id="bm-image-input" name="image" style="display:none;" accept="image/*" onchange="previewBmImage(this)">
                                <span class="form-help">Pilih foto formal Kepala Kampus LP3I (jpg, png).</span>
                            </div>

                            <div style="display:flex; gap:1rem; justify-content:flex-end; margin-top:1.5rem;">
                                <button type="button" class="btn btn-danger" onclick="resetBmSettings()">Reset</button>
                                <button type="button" class="btn btn-success" onclick="saveBmSettings()">Simpan Sambutan</button>
                            </div>
                        </div>

                        <!-- Visi & Misi -->
                        <div style="background:#fff; border:1px solid #e2e8f0; padding:1.5rem; border-radius:12px;">
                            <h3 style="font-weight:700; margin-bottom:1rem; font-size:1.1rem; color:var(--primary);">Visi & Misi Kampus</h3>
                            
                            <div class="form-group" style="margin-bottom:1rem;">
                                <label for="vision-input">Visi Kampus:</label>
                                <textarea id="vision-input" rows="3" placeholder="Tulis visi lembaga LP3I..." style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:6px; margin-top:0.25rem; font-family:inherit;"></textarea>
                            </div>

                            <div class="form-group" style="margin-bottom:1rem;">
                                <label for="mission-input">Misi Kampus (Tulis satu misi per baris):</label>
                                <textarea id="mission-input" rows="8" placeholder="Tulis misi kampus...&#10;Satu baris untuk setiap poin misi" style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:6px; margin-top:0.25rem; font-family:inherit;"></textarea>
                            </div>

                            <div style="display:flex; gap:1rem; justify-content:flex-end; margin-top:1.5rem;">
                                <button type="button" class="btn btn-danger" onclick="resetVmSettings()">Reset</button>
                                <button type="button" class="btn btn-success" onclick="saveVmSettings()">Simpan Visi Misi</button>
                            </div>
                        </div>

                    </div>
                </div>

                        <!-- Add/Edit Penempatan Modal -->
                        <div class="modal" id="penempatan-modal">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 id="penempatan-modal-title">Tambah Penempatan</h3>
                                    <button class="close-modal" onclick="closePenempatanModal()">&times;</button>
                                </div>
                                <form id="penempatan-form" class="elegant-form" enctype="multipart/form-data" onsubmit="handlePenempatanSubmit(event)">
                                    <input type="hidden" id="penempatan-id" name="id">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" id="penempatan-title" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea id="penempatan-description" name="description" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>URL Sumber (opsional)</label>
                                        <input type="text" id="penempatan-source" name="source_url" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar (jpg,png max 2MB)</label>
                                        <input type="file" id="penempatan-image" name="image" accept="image/*" onchange="previewPenempatanImage(this)">
                                        <div id="penempatan-image-preview" class="image-preview"></div>
                                    </div>
                                    <div style="display:flex;gap:.5rem;justify-content:flex-end">
                                        <button type="button" class="btn btn-danger" onclick="closePenempatanModal()">Batal</button>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Carousel Modal -->
    <div class="modal" id="carousel-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modal-title">Tambah Slide Baru</h3>
                <button class="close-modal" onclick="closeModal()">&times;</button>
            </div>
            
            <form id="slide-form" class="elegant-form" enctype="multipart/form-data" onsubmit="handleFormSubmit(event)">
                <input type="hidden" id="slide-id" name="id">
                <input type="hidden" id="existing-image" name="existing_image">
                
                <div class="form-group">
                    <label for="slide-title">Judul Slide:</label>
                    <input type="text" id="slide-title" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="slide-subtitle">Subtitle:</label>
                    <textarea id="slide-subtitle" name="subtitle" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="slide-button">Teks Tombol:</label>
                    <input type="text" id="slide-button" name="button_text" required>
                </div>
                
                <div class="form-group">
                    <label for="slide-image">Gambar Slide:</label>
                    <input type="file" id="slide-image" name="image" accept="image/*" onchange="previewImage(this)">
                    <div id="image-preview" class="image-preview"></div>
                </div>
                
                <div class="form-group">
                    <label for="slide-status">Status:</label>
                    <select id="slide-status" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button type="button" class="btn btn-danger" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add/Edit News Modal -->
    <div class="modal" id="news-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="news-modal-title">Tambah Berita Baru</h3>
                <button class="close-modal" onclick="closeNewsModal()">&times;</button>
            </div>
            
            <form id="news-form" class="elegant-form" enctype="multipart/form-data" onsubmit="handleNewsFormSubmit(event)">
                <input type="hidden" id="news-id" name="id">
                <input type="hidden" id="news-existing-image" name="existing_image">
                
                <div class="form-group">
                    <label for="news-title">Judul Berita:</label>
                    <input type="text" id="news-title" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="news-category">Kategori:</label>
                    <select id="news-category" name="category" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Akademik">Akademik</option>
                        <option value="Prestasi">Prestasi</option>
                        <option value="Kerjasama">Kerjasama</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Fasilitas">Fasilitas</option>
                        <option value="Seminar">Seminar</option>
                        <option value="Kegiatan">Kegiatan</option>
                        <option value="Pengumuman">Pengumuman</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="news-excerpt">Ringkasan:</label>
                    <textarea id="news-excerpt" name="excerpt" rows="2" placeholder="Ringkasan singkat berita (opsional)"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="news-content">Konten Berita:</label>
                    <textarea id="news-content" name="content" rows="6" required placeholder="Tulis konten berita lengkap di sini..."></textarea>
                </div>
                
                <div class="form-group">
                    <label for="news-author">Penulis:</label>
                    <input type="text" id="news-author" name="author" placeholder="Admin LP3I">
                </div>
                
                <div class="form-group">
                    <label for="news-image">Gambar Utama Berita:</label>
                    <input type="file" id="news-image" name="image" accept="image/*" onchange="previewNewsImage(this)">
                    <div id="news-image-preview" class="image-preview"></div>
                </div>
                
                <div class="form-group">
                    <label for="news-gallery">Galeri Foto (Multiple):</label>
                    <input type="file" id="news-gallery" name="gallery_images[]" accept="image/*" multiple onchange="previewGalleryImages(this)">
                    <input type="hidden" id="existing-gallery" name="existing_gallery">
                    <div id="gallery-preview" class="gallery-preview">
                        <div class="gallery-grid" id="gallery-grid"></div>
                    </div>
                    <small class="form-help">Pilih beberapa gambar untuk galeri berita. Format: JPG, PNG, GIF. Maksimal 5MB per gambar.</small>
                </div>
                
                <div class="form-group">
                    <label for="news-status">Status:</label>
                    <select id="news-status" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <button type="button" class="btn btn-danger" onclick="closeNewsModal()">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
                // --- Carousel Kegiatan Management (AJAX) ---
                let carouselKegiatanData = [];
                async function fetchCarouselKegiatan() {
                    try {
                        const res = await fetch('/admin/carousel-kegiatan/json', {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        });

                        const contentType = res.headers.get('content-type') || '';
                        if (!contentType.includes('application/json')) {
                            const text = await res.text();
                            throw new Error('Server mengembalikan respons non-JSON (mungkin session admin habis / redirect login). ' + text.substring(0, 120));
                        }

                        const json = await res.json();
                        if (json?.success) {
                            carouselKegiatanData = json.data;
                            loadCarouselKegiatanList();
                        } else {
                            throw new Error(json?.message || 'Gagal memuat data carousel kegiatan');
                        }
                    } catch (error) {
                        console.error('fetchCarouselKegiatan error:', error);
                        alert('Gagal memuat carousel kegiatan: ' + (error?.message || error));
                    }
                }
                function loadCarouselKegiatanList() {
                    const list = document.getElementById('carousel-kegiatan-list');
                    list.innerHTML = '';
                    if (!carouselKegiatanData || carouselKegiatanData.length === 0) {
                        list.innerHTML = '<p style="text-align:center;color:#666;padding:2rem;">Belum ada slide kegiatan.</p>';
                        return;
                    }
                    carouselKegiatanData.forEach(slide => {
                        const item = document.createElement('div');
                        item.className = 'carousel-item';
                        item.innerHTML = `
                            <div class="carousel-info">
                                <h3>${slide.title}</h3>
                                <span class="status ${slide.status}">${(slide.status||'').charAt(0).toUpperCase()+(slide.status||'').slice(1)}</span>
                                ${slide.image_path ? `<div class='image-preview'><img src='/${slide.image_path}' alt='Slide' style='width:60px;height:40px;object-fit:cover;border-radius:4px;'></div>` : ''}
                            </div>
                            <div class="carousel-actions">
                                <button class="btn-edit" onclick="editKegiatanSlide(${slide.id})"><i class='fas fa-edit'></i> Edit</button>
                                <button class="btn-delete" onclick="deleteKegiatanSlide(${slide.id})"><i class='fas fa-trash'></i> Delete</button>
                            </div>
                        `;
                        list.appendChild(item);
                    });
                }
                function openKegiatanModal(edit=false, slide=null) {
                    document.getElementById('kegiatan-modal').style.display = 'block';
                    document.getElementById('kegiatan-modal-title').innerText = edit ? 'Edit Slide Kegiatan' : 'Tambah Slide Kegiatan';
                    document.getElementById('kegiatan-form').reset();
                    document.getElementById('kegiatan-id').value = slide ? slide.id : '';
                    document.getElementById('kegiatan-title').value = slide ? slide.title : '';
                    document.getElementById('kegiatan-status').value = slide ? slide.status : 'active';
                    document.getElementById('kegiatan-image-preview').innerHTML = slide && slide.image_path ? `<img src='/${slide.image_path}' style='width:100px;height:60px;object-fit:cover;border-radius:4px;'>` : '';
                }
                function closeKegiatanModal() {
                    document.getElementById('kegiatan-modal').style.display = 'none';
                }
                function editKegiatanSlide(id) {
                    const slide = carouselKegiatanData.find(s => s.id == id);
                    if (slide) openKegiatanModal(true, slide);
                }
                function deleteKegiatanSlide(id) {
                    if (!confirm('Hapus slide ini?')) return;
                    fetch(`/admin/carousel-kegiatan/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                        .then(async res => {
                            const contentType = res.headers.get('content-type') || '';
                            if (!contentType.includes('application/json')) {
                                const text = await res.text();
                                throw new Error('Server mengembalikan respons non-JSON. ' + text.substring(0, 120));
                            }
                            const json = await res.json();
                            if (!res.ok || !json?.success) {
                                throw new Error(json?.message || json?.error || 'Gagal menghapus slide');
                            }
                            return json;
                        })
                        .then(() => fetchCarouselKegiatan())
                        .catch(error => {
                            console.error('deleteKegiatanSlide error:', error);
                            alert('Gagal menghapus slide: ' + (error?.message || error));
                        });
                }
                function handleKegiatanFormSubmit(e) {
                    e.preventDefault();
                    const form = document.getElementById('kegiatan-form');
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) submitBtn.disabled = true;

                    const formData = new FormData(form);
                    const id = formData.get('id');
                    let url = '/admin/carousel-kegiatan';
                    const method = 'POST';
                    if (id) url += `/${id}`;

                    fetch(url, {
                        method,
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                        .then(async res => {
                            const contentType = res.headers.get('content-type') || '';
                            if (!contentType.includes('application/json')) {
                                const text = await res.text();
                                throw new Error('Server mengembalikan respons non-JSON (mungkin 419/redirect). ' + text.substring(0, 120));
                            }
                            const json = await res.json();
                            if (!res.ok) {
                                const firstError = json?.errors ? Object.values(json.errors)?.flat()?.[0] : null;
                                throw new Error(firstError || json?.message || json?.error || 'Gagal menyimpan slide');
                            }
                            if (!json?.success) {
                                throw new Error(json?.message || json?.error || 'Gagal menyimpan slide');
                            }
                            return json;
                        })
                        .then(() => {
                            closeKegiatanModal();
                            fetchCarouselKegiatan();
                        })
                        .catch(error => {
                            console.error('handleKegiatanFormSubmit error:', error);
                            alert('Gagal menyimpan slide: ' + (error?.message || error));
                        })
                        .finally(() => {
                            if (submitBtn) submitBtn.disabled = false;
                        });
                }
                // Preview image
                document.getElementById('kegiatan-image')?.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (!file) return;
                    const reader = new FileReader();
                    reader.onload = function(ev) {
                        document.getElementById('kegiatan-image-preview').innerHTML = `<img src='${ev.target.result}' style='width:100px;height:60px;object-fit:cover;border-radius:4px;'>`;
                    };
                    reader.readAsDataURL(file);
                });
                // Auto load list saat section aktif
                document.querySelector('[data-section="carousel-kegiatan"]').addEventListener('click', fetchCarouselKegiatan);
                // Auto-load data saat halaman admin dibuka
                fetchCarouselKegiatan();
        // Global variables
        let carouselData = <?= json_encode($carouselData) ?>;
        let newsData = [];
        let editingId = null;

        // Helper function for safe AJAX calls
        async function safeJsonFetch(endpoint, formData) {
            try {
                const response = await fetch(endpoint, {
                    method: 'POST',
                    body: formData
                });
                
                // Check if response is OK
                if (!response.ok) {
                    throw new Error(`HTTP Error: ${response.status} ${response.statusText}`);
                }
                
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    const text = await response.text();
                    console.error('Response is not JSON:', text.substring(0, 200));
                    throw new Error('Server returned non-JSON response. Check server logs.');
                }
                
                const result = await response.json();
                return result;
            } catch (error) {
                console.error('Fetch error:', error);
                throw error;
            }
        }

        // Carousel management functions
        async function fetchCarouselData() {
            try {
                const formData = new FormData();
                formData.append('action', 'get_slides');
                
                const result = await safeJsonFetch('/admin/action', formData);
                if (result.success) {
                    carouselData = result.data;
                    loadCarouselList();
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error loading carousel data: ' + error.message);
            }
        }

        function loadCarouselList() {
            const list = document.getElementById('carousel-list');
            list.innerHTML = '';

            if (!carouselData || carouselData.length === 0) {
                list.innerHTML = '<p style="text-align: center; color: #666; padding: 2rem;">Belum ada slide.</p>';
                return;
            }

            carouselData.forEach(slide => {
                const item = document.createElement('div');
                item.className = 'carousel-item';
                item.setAttribute('data-id', slide.id);
                item.innerHTML = `
                    <div class="carousel-info">
                        <h3>${slide.title}</h3>
                        <p>${slide.subtitle}</p>
                        <span class="status ${slide.status}">${(slide.status || '').charAt(0).toUpperCase() + (slide.status || '').slice(1)}</span>
                        ${slide.image_path ? `<div class="image-preview"><img src="${slide.image_path}" alt="Slide Image" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;"></div>` : ''}
                    </div>
                    <div class="carousel-actions">
                        <button class="btn-edit" onclick="editSlide(${slide.id})">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-delete" onclick="deleteSlide(${slide.id})">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                `;
                list.appendChild(item);
            });
        }

        async function saveCarouselSlide(formData) {
            try {
                formData.append('action', 'save_slide');
                const result = await safeJsonFetch('/admin/action', formData);
                
                if (result.success) {
                    alert(result.message || 'Slide berhasil disimpan');
                    location.reload();
                    return true;
                } else {
                    alert('Error: ' + (result.error || 'Unknown error'));
                    return false;
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error saving slide: ' + error.message);
                return false;
            }
        }

        async function deleteCarouselSlide(id) {
            try {
                const formData = new FormData();
                formData.append('action', 'delete_slide');
                formData.append('id', id);
                
                const result = await safeJsonFetch('/admin/action', formData);
                if (result.success) {
                    location.reload();
                    return true;
                } else {
                    alert('Error: ' + result.error);
                    return false;
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error deleting slide: ' + error.message);
                return false;
            }
        }

        // News management functions
        async function fetchNewsData() {
            try {
                const formData = new FormData();
                formData.append('action', 'get_news');
                
                const result = await safeJsonFetch('/admin/action', formData);
                if (result.success) {
                    newsData = result.data;
                    loadNewsList();
                }
            } catch (error) {
                console.error('Error fetching news:', error);
                alert('Error loading news: ' + error.message);
            }
        }

        // Registration illustration (settings)
        let registrationImageFile = null;
        let existingRegPath = '';
        function previewRegistrationImage(input) {
            const preview = document.getElementById('registration-image-preview');
            if (input.files && input.files[0]) {
                registrationImageFile = input.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-width:200px; max-height:150px; object-fit:cover; border-radius:8px;">`;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        async function resetRegistrationImage() {
            if (!confirm('Yakin ingin menghapus gambar registrasi?')) return;
            registrationImageFile = null;
            document.getElementById('registration-image-input').value = '';
            document.getElementById('registration-image-preview').innerHTML = '';
            // Also clear server-side setting
            try {
                const formData = new FormData();
                formData.append('action', 'save_registration_image');
                // No file => clear setting
                const result = await safeJsonFetch('/admin/action', formData);
                if (!result.success) alert('Failed to clear registration image');
            } catch (e) {
                console.error('Error clearing registration image:', e);
            }
        }

        async function fetchRegistrationImage() {
            try {
                const formData = new FormData();
                formData.append('action', 'get_registration_image');
                const result = await safeJsonFetch('/admin/action', formData);
                    if (result.success && result.data) {
                    let p = result.data.registration_image_url || result.data.registration_image || '';
                    existingRegPath = result.data.registration_image || '';
                    if (p && !p.startsWith('/') && !p.startsWith('http')) p = '/' + p;
                    document.getElementById('registration-image-preview').innerHTML = `<img src="${p}" alt="Registration Image" style="max-width:200px; max-height:150px; object-fit:cover; border-radius:8px;">`;
                    document.getElementById('registration-image-path').innerText = existingRegPath ? existingRegPath : '';
                }
            } catch (error) {
                console.error('Error fetching registration image:', error);
            }
        }

        async function saveRegistrationImage() {
            const btn = document.querySelector('#settings-section .btn-success');
            if (btn) btn.disabled = true;
            try {
                const formData = new FormData();
                formData.append('action', 'save_registration_image');
                if (registrationImageFile) { formData.append('image', registrationImageFile); }
                else if (!registrationImageFile && existingRegPath) { formData.append('existing_image', existingRegPath); }
                else { alert('Pilih gambar terlebih dahulu.'); if (btn) btn.disabled = false; return false; }
                const result = await safeJsonFetch('/admin/action', formData);
                if (result.success) {
                    alert('Gambar registrasi berhasil disimpan');
                    if (result.data) {
                        let p = result.data.registration_image_url || result.data.registration_image || '';
                        if (p && !p.startsWith('/') && !p.startsWith('http')) p = '/' + p;
                        document.getElementById('registration-image-preview').innerHTML = `<img src="${p}" alt="Registration Image" style="max-width:200px; max-height:150px; object-fit:cover; border-radius:8px;">`;
                        document.getElementById('registration-image-path').innerText = result.data.registration_image || '';
                    }
                    registrationImageFile = null;
                    existingRegPath = result.data && result.data.registration_image ? result.data.registration_image : '';
                    document.getElementById('registration-image-input').value = '';
                    if (btn) btn.disabled = false;
                    return true;
                } else {
                    alert('Error: ' + (result.error || 'Unknown error'));
                    if (btn) btn.disabled = false;
                    return false;
                }
            } catch (error) {
                console.error('Error saving registration image:', error);
                alert('Error: ' + error.message);
                if (btn) btn.disabled = false;
                return false;
            }
        }

        let bmImageFile = null;
        let existingBmImagePath = '';

        function previewBmImage(input) {
            if (input.files && input.files[0]) {
                bmImageFile = input.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('bm-image-preview').innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-width:200px; max-height:150px; object-fit:cover; border-radius:8px;">`;
                };
                reader.readAsDataURL(input.files[0]);
                document.getElementById('bm-image-path').innerText = input.files[0].name;
            }
        }

        async function fetchBmSettings() {
            try {
                const formData = new FormData();
                formData.append('action', 'get_branch_manager_settings');
                const result = await safeJsonFetch('/admin/action', formData);
                if (result.success && result.data) {
                    document.getElementById('bm-name-input').value = result.data.branch_manager_name || '';
                    document.getElementById('bm-title-input').value = result.data.branch_manager_title || '';
                    document.getElementById('bm-role-input').value = result.data.branch_manager_role || '';
                    document.getElementById('bm-greeting-input').value = result.data.branch_manager_greeting || '';
                    document.getElementById('bm-quote-input').value = result.data.branch_manager_quote || '';
                    document.getElementById('bm-content-input').value = result.data.branch_manager_content || '';
                    
                    existingBmImagePath = result.data.branch_manager_image || '';
                    let p = result.data.branch_manager_image_url || result.data.branch_manager_image || '';
                    if (p) {
                        if (!p.startsWith('/') && !p.startsWith('http')) p = '/' + p;
                        document.getElementById('bm-image-preview').innerHTML = `<img src="${p}" alt="Foto Branch Manager" style="max-width:200px; max-height:150px; object-fit:cover; border-radius:8px;">`;
                        document.getElementById('bm-image-path').innerText = existingBmImagePath;
                    } else {
                        document.getElementById('bm-image-preview').innerHTML = '';
                        document.getElementById('bm-image-path').innerText = '';
                    }
                }
            } catch (error) {
                console.error('Error fetching Branch Manager settings:', error);
            }
        }

        async function saveBmSettings() {
            const btn = document.querySelector('#settings-section button[onclick="saveBmSettings()"]');
            if (btn) btn.disabled = true;
            try {
                const formData = new FormData();
                formData.append('action', 'save_branch_manager_settings');
                formData.append('name', document.getElementById('bm-name-input').value);
                formData.append('title', document.getElementById('bm-title-input').value);
                formData.append('role', document.getElementById('bm-role-input').value);
                formData.append('greeting', document.getElementById('bm-greeting-input').value);
                formData.append('quote', document.getElementById('bm-quote-input').value);
                formData.append('content', document.getElementById('bm-content-input').value);

                if (bmImageFile) { 
                    formData.append('image', bmImageFile); 
                } else if (existingBmImagePath) { 
                    formData.append('existing_image', existingBmImagePath); 
                }

                const result = await safeJsonFetch('/admin/action', formData);
                if (result.success) {
                    alert('Sambutan Branch Manager berhasil disimpan');
                    if (result.data && result.data.image_path) {
                        existingBmImagePath = result.data.image_path;
                        let p = existingBmImagePath;
                        if (!p.startsWith('/') && !p.startsWith('http')) p = '/' + p;
                        document.getElementById('bm-image-preview').innerHTML = `<img src="${p}" alt="Foto Branch Manager" style="max-width:200px; max-height:150px; object-fit:cover; border-radius:8px;">`;
                        document.getElementById('bm-image-path').innerText = existingBmImagePath;
                    }
                    bmImageFile = null;
                    document.getElementById('bm-image-input').value = '';
                } else {
                    alert('Gagal menyimpan sambutan: ' + (result.error || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error saving Branch Manager settings:', error);
                alert('Error: ' + error.message);
            } finally {
                if (btn) btn.disabled = false;
            }
        }

        async function resetBmSettings() {
            if (confirm('Apakah Anda yakin ingin mengosongkan form sambutan?')) {
                document.getElementById('bm-name-input').value = '';
                document.getElementById('bm-title-input').value = '';
                document.getElementById('bm-role-input').value = '';
                document.getElementById('bm-greeting-input').value = '';
                document.getElementById('bm-quote-input').value = '';
                document.getElementById('bm-content-input').value = '';
                document.getElementById('bm-image-preview').innerHTML = '';
                document.getElementById('bm-image-path').innerText = '';
                bmImageFile = null;
                existingBmImagePath = '';
                document.getElementById('bm-image-input').value = '';
            }
        async function fetchVmSettings() {
            try {
                const formData = new FormData();
                formData.append('action', 'get_vision_mission_settings');
                const result = await safeJsonFetch('/admin/action', formData);
                if (result.success && result.data) {
                    document.getElementById('vision-input').value = result.data.vision || '';
                    document.getElementById('mission-input').value = result.data.mission || '';
                }
            } catch (error) {
                console.error('Error fetching Vision & Mission settings:', error);
            }
        }

        async function saveVmSettings() {
            const btn = document.querySelector('#settings-section button[onclick="saveVmSettings()"]');
            if (btn) btn.disabled = true;
            try {
                const formData = new FormData();
                formData.append('action', 'save_vision_mission_settings');
                formData.append('vision', document.getElementById('vision-input').value);
                formData.append('mission', document.getElementById('mission-input').value);

                const result = await safeJsonFetch('/admin/action', formData);
                if (result.success) {
                    alert('Visi & Misi berhasil disimpan');
                } else {
                    alert('Gagal menyimpan Visi & Misi: ' + (result.error || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error saving Vision & Mission settings:', error);
                alert('Error: ' + error.message);
            } finally {
                if (btn) btn.disabled = false;
            }
        }

        function resetVmSettings() {
            if (confirm('Apakah Anda yakin ingin mengosongkan form Visi & Misi?')) {
                document.getElementById('vision-input').value = '';
                document.getElementById('mission-input').value = '';
            }
        }

        // Unified loadNewsList implemented later (table-based) — duplicate removed here.

        async function saveNews(formData) {
            try {
                formData.append('action', 'save_news');
                const result = await safeJsonFetch('/admin/action', formData);
                if (result.success) {
                    alert(result.message || 'Berita berhasil disimpan');
                    closeNewsModal();
                    fetchNewsData();
                    return true;
                } else {
                    alert('Error: ' + (result.error || 'Unknown error'));
                    return false;
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error saving news: ' + error.message);
                return false;
            }
        }

        async function deleteNewsItem(id) {
            try {
                const formData = new FormData();
                formData.append('action', 'delete_news');
                formData.append('id', id);
                
                const result = await safeJsonFetch('/admin/action', formData);
                if (result.success) {
                    fetchNewsData();
                    return true;
                } else {
                    alert('Error: ' + result.error);
                    return false;
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error deleting news: ' + error.message);
                return false;
            }
        }

        // Gallery management functions
        function previewGalleryImages(input) {
            const galleryGrid = document.getElementById('gallery-grid');
            
            if (input.files && input.files.length > 0) {
                Array.from(input.files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const galleryItem = document.createElement('div');
                        galleryItem.className = 'gallery-item';
                        galleryItem.innerHTML = `
                            <img src="${e.target.result}" alt="Gallery Image">
                            <button type="button" class="remove-btn" onclick="removeGalleryItem(this)" data-index="${index}">×</button>
                        `;
                        galleryGrid.appendChild(galleryItem);
                    };
                    reader.readAsDataURL(file);
                });
            }
        }

        function removeGalleryItem(button) {
            button.parentElement.remove();
        }

        function loadExistingGallery(galleryImages) {
            const galleryGrid = document.getElementById('gallery-grid');
            galleryGrid.innerHTML = '';
            
            if (galleryImages) {
                const images = galleryImages.split(',').filter(img => img.trim());
                images.forEach((imagePath, index) => {
                    let imgSrc = imagePath.trim();
                    if (imgSrc && !imgSrc.startsWith('http') && !imgSrc.startsWith('/') && !imgSrc.startsWith('data:')) {
                        imgSrc = '/storage/' + imgSrc.replace(/^\/+/, '');
                    }
                    const galleryItem = document.createElement('div');
                    galleryItem.className = 'gallery-item';
                    galleryItem.innerHTML = `
                        <img src="${imgSrc}" alt="Gallery Image">
                        <button type="button" class="remove-btn" onclick="removeExistingGalleryItem(this, '${imagePath.trim()}')" data-path="${imagePath.trim()}">×</button>
                    `;
                    galleryGrid.appendChild(galleryItem);
                });
            }
        }

        function removeExistingGalleryItem(button, imagePath) {
            button.parentElement.remove();
            
            // Update existing gallery hidden field
            const existingGallery = document.getElementById('existing-gallery');
            const currentImages = existingGallery.value.split(',').filter(img => img.trim());
            const updatedImages = currentImages.filter(img => img.trim() !== imagePath);
            existingGallery.value = updatedImages.join(',');
        }

        // Global modal functions
        function openAddModal() {
            editingId = null;
            document.getElementById('modal-title').textContent = 'Tambah Slide Baru';
            document.getElementById('slide-form').reset();
            document.getElementById('slide-id').value = '';
            document.getElementById('existing-image').value = '';
            document.getElementById('image-preview').innerHTML = '';
            document.getElementById('carousel-modal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('carousel-modal').style.display = 'none';
        }

        function editSlide(id) {
            const slide = carouselData.find(item => item.id == id);
            if (slide) {
                editingId = id;
                document.getElementById('modal-title').textContent = 'Edit Slide';
                document.getElementById('slide-id').value = slide.id;
                document.getElementById('slide-title').value = slide.title;
                document.getElementById('slide-subtitle').value = slide.subtitle;
                document.getElementById('slide-button').value = slide.button_text;
                document.getElementById('slide-status').value = slide.status;
                document.getElementById('existing-image').value = slide.image_path || '';
                
                const preview = document.getElementById('image-preview');
                if (slide.image_path) {
                    let imgSrc = slide.image_path.trim();
                    if (!imgSrc.startsWith('http') && !imgSrc.startsWith('/') && !imgSrc.startsWith('data:')) {
                        imgSrc = '/storage/' + imgSrc.replace(/^\/+/, '');
                    }
                    preview.innerHTML = `<img src="${imgSrc}" alt="Current image" style="max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 8px;">`;
                } else {
                    preview.innerHTML = '';
                }
                
                document.getElementById('carousel-modal').style.display = 'block';
            }
        }

        function deleteSlide(id) {
            if (confirm('Apakah Anda yakin ingin menghapus slide ini?')) {
                deleteCarouselSlide(id);
            }
        }

        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 8px;">`;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        async function handleFormSubmit(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const success = await saveCarouselSlide(formData);
            if (success) {
                closeModal();
            }
        }

        // News management functions
        function openAddNewsModal() {
            document.getElementById('news-modal-title').textContent = 'Tambah Berita Baru';
            document.getElementById('news-form').reset();
            document.getElementById('news-id').value = '';
            document.getElementById('news-existing-image').value = '';
            document.getElementById('news-image-preview').innerHTML = '';
            document.getElementById('news-modal').style.display = 'block';
        }

        function closeNewsModal() {
            document.getElementById('news-modal').style.display = 'none';
        }

        function editNews(id) {
            const news = newsData.find(item => item.id == id);
            if (news) {
                document.getElementById('news-modal-title').textContent = 'Edit Berita';
                document.getElementById('news-id').value = news.id;
                document.getElementById('news-title').value = news.title;
                document.getElementById('news-category').value = news.category;
                document.getElementById('news-excerpt').value = news.excerpt || '';
                document.getElementById('news-content').value = news.content;
                document.getElementById('news-author').value = news.author;
                document.getElementById('news-status').value = news.status;
                document.getElementById('news-existing-image').value = news.image_path || '';
                
                const preview = document.getElementById('news-image-preview');
                if (news.image_path) {
                    let imgSrc = news.image_path.trim();
                    if (!imgSrc.startsWith('http') && !imgSrc.startsWith('/') && !imgSrc.startsWith('data:')) {
                        imgSrc = '/storage/' + imgSrc.replace(/^\/+/, '');
                    }
                    preview.innerHTML = `<img src="${imgSrc}" alt="Current image" style="max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 8px;">`;
                } else {
                    preview.innerHTML = '';
                }
                
                // Load existing gallery
                loadExistingGallery(news.gallery_images);
                document.getElementById('existing-gallery').value = news.gallery_images || '';
                
                document.getElementById('news-modal').style.display = 'block';
            }
        }

        function deleteNews(id) {
            if (confirm('Apakah Anda yakin ingin menghapus berita ini?')) {
                deleteNewsItem(id);
            }
        }

        function previewNewsImage(input) {
            const preview = document.getElementById('news-image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 8px;">`;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        async function handleNewsFormSubmit(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            
            // Get current gallery images from the preview
            const galleryItems = document.querySelectorAll('#gallery-grid .gallery-item');
            const existingImages = [];
            galleryItems.forEach(item => {
                const img = item.querySelector('img');
                if (img && img.src.startsWith('http')) {
                    // This is an existing image
                    const path = img.src.replace(window.location.origin + '/', '');
                    existingImages.push(path);
                }
            });
            
            if (existingImages.length > 0) {
                formData.set('existing_gallery', existingImages.join(','));
            }
            
            const success = await saveNews(formData);
        }

        /* fetchNewsData is defined earlier using safeJsonFetch; duplicate removed */

        function loadNewsList() {
            const tbody = document.getElementById('news-list');
            tbody.innerHTML = '';

            if (!newsData || newsData.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" style="text-align:center;color:#666;padding:2rem;">Belum ada berita. Klik "Tambah Berita Baru" untuk menambahkan berita pertama.</td></tr>';
                return;
            }

            newsData.forEach(item => {
                const tr = document.createElement('tr');

                const titleTd = document.createElement('td');
                titleTd.innerHTML = `<div class="news-item-info"><h4 style="margin:0">${item.title}</h4><span class="news-excerpt">${item.excerpt || (item.content ? item.content.substring(0,120) + '...' : '')}</span></div>`;

                const categoryTd = document.createElement('td');
                categoryTd.textContent = item.category || '';

                const authorTd = document.createElement('td');
                authorTd.textContent = item.author || '';

                const dateTd = document.createElement('td');
                try { dateTd.textContent = new Date(item.created_at).toLocaleDateString('id-ID'); } catch(e) { dateTd.textContent = item.created_at || ''; }

                const actionsTd = document.createElement('td');
                actionsTd.innerHTML = `
                    <div class="news-actions">
                        <button class="btn btn-primary" onclick="editNews(${item.id})"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger" onclick="deleteNews(${item.id})"><i class="fas fa-trash"></i> Hapus</button>
                        <a class="btn" href="/news/${item.id}" target="_blank" style="background:#1e90ff;color:#fff;margin-left:6px;border-radius:6px;padding:0.4rem 0.7rem;text-decoration:none">Detail</a>
                    </div>
                `;

                tr.appendChild(titleTd);
                tr.appendChild(categoryTd);
                tr.appendChild(authorTd);
                tr.appendChild(dateTd);
                tr.appendChild(actionsTd);

                tbody.appendChild(tr);
            });
        }

        /* deleteNews duplicate removed; using deleteNewsItem(id) implementation above */

        // Fetch Struktur Organisasi
        async function fetchStrukturOrganisasi() {
            try {
                const response = await fetch('/api/struktur-organisasi');
                const data = await response.json();
                
                const container = document.getElementById('struktur-list');
                container.innerHTML = '';
                
                if (!data.length) {
                    container.innerHTML = '<p style="grid-column: 1/-1; text-align: center; color: #999;">Belum ada data struktur organisasi</p>';
                    return;
                }
                
                data.forEach(item => {
                    const card = document.createElement('div');
                    card.style.cssText = 'background: #f8f9fa; border-radius: 10px; padding: 1.5rem; border-left: 4px solid #4a90e2; display: flex; flex-direction: column; gap: 1rem;';
                    
                    const fotoHtml = item.foto ? `<img src="/storage/${item.foto}" alt="${item.nama}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">` : '<div style="width: 100%; height: 200px; background: #ddd; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999;">Tidak ada foto</div>';
                    
                    card.innerHTML = `
                        ${fotoHtml}
                        <h4 style="color: #1e3c72; margin: 0;">${item.nama}</h4>
                        <p style="color: #666; margin: 0; font-size: 0.9rem;"><strong>${item.role}</strong></p>
                        <p style="color: #999; margin: 0; font-size: 0.85rem;">Posisi: ${item.posisi} | Urutan: ${item.urutan}</p>
                        <p style="color: #999; margin: 0; font-size: 0.85rem;">Status: ${item.is_active ? '<span style="background: #28a745; color: white; padding: 0.2rem 0.6rem; border-radius: 3px;">Aktif</span>' : '<span style="background: #dc3545; color: white; padding: 0.2rem 0.6rem; border-radius: 3px;">Tidak Aktif</span>'}</p>
                        <div style="display: flex; gap: 0.5rem; margin-top: 1rem;">
                            <a href="/admin/struktur-organisasi/${item.id}/edit" class="btn btn-primary" style="flex: 1; text-align: center;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button class="btn btn-danger" style="flex: 1;" onclick="hapusStrukturOrganisasi(${item.id}, '${item.nama}')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    `;
                    container.appendChild(card);
                });
            } catch (error) {
                console.error('Error fetching struktur organisasi:', error);
                document.getElementById('struktur-list').innerHTML = '<p style="color: red;">Gagal memuat data</p>';
            }
        }

        // Hapus Struktur Organisasi
        async function hapusStrukturOrganisasi(id, nama) {
            if (!confirm(`Apakah Anda yakin ingin menghapus "${nama}"?`)) {
                return;
            }
            
            try {
                const response = await fetch(`/admin/struktur-organisasi/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                        'Accept': 'application/json'
                    }
                });
                
                if (response.ok) {
                    alert('Data berhasil dihapus');
                    fetchStrukturOrganisasi();
                } else {
                    alert('Gagal menghapus data');
                }
            } catch (error) {
                console.error('Error deleting struktur organisasi:', error);
                alert('Terjadi kesalahan');
            }
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            fetchCarouselData();
            fetchNewsData();
            fetchRegistrationImage();
            fetchBmSettings();
            fetchVmSettings();

            
            // Menu switching
            document.querySelectorAll('.menu-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    const section = this.getAttribute('data-section');
                    if (!section) {
                        // Regular link (e.g., back to website)
                        return;
                    }

                    e.preventDefault();
                    
                    // Remove active class from all links and sections
                    document.querySelectorAll('.menu-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.content-section').forEach(s => s.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Show corresponding section
                    const sectionEl = document.getElementById(section + '-section');
                    if (sectionEl) {
                        sectionEl.classList.add('active');
                    }

                    // Load data for the section
                    if (section === 'news') {
                        fetchNewsData();
                    } else if (section === 'settings') {
                        fetchRegistrationImage();
                        fetchBmSettings();
                        fetchVmSettings();
                    } else if (section === 'struktur-organisasi') {
                        fetchStrukturOrganisasi();
                    } else if (section === 'penempatan') {
                        fetchPenempatan();
                    } else if (section === 'carousel-kegiatan') {
                        fetchCarouselKegiatan();
                    }
                });
            });
        });

        window.addEventListener('click', function(e) {
            const carouselModal = document.getElementById('carousel-modal');
            const newsModal = document.getElementById('news-modal');
            if (e.target === carouselModal) {
                closeModal();
            }
            if (e.target === newsModal) {
                closeNewsModal();
            }
            const penempatanModal = document.getElementById('penempatan-modal');
            if (e.target === penempatanModal) closePenempatanModal();
        });

        // --- Penempatan admin integration ---
        const PENEMPATAN_LIST_URL = '/admin/penempatan/json';
        const PENEMPATAN_CREATE_URL = '/admin/penempatan/ajax';
        const CSRF_TOKEN = '{{ csrf_token() }}';
        const DEFAULT_HEADERS = { 'X-CSRF-TOKEN': CSRF_TOKEN, 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' };

        async function fetchPenempatan() {
            try {
                const res = await fetch(PENEMPATAN_LIST_URL, { headers: { 'X-Requested-With':'XMLHttpRequest' } });
                const j = await res.json();
                if (j.success) renderPenempatanList(j.data || []);
            } catch (e) { console.error('fetchPenempatan', e); }
        }

        function renderPenempatanList(items) {
            const list = document.getElementById('penempatan-list');
            list.innerHTML = '';
            if (!items || items.length === 0) {
                list.innerHTML = '<div style="color:#666;padding:1rem">Belum ada item penempatan.</div>';
                return;
            }
            items.forEach(it => {
                const div = document.createElement('div');
                div.style.background = '#fff'; div.style.padding = '0.75rem'; div.style.borderRadius = '8px';
                div.innerHTML = `
                    <div style="min-height:140px;display:flex;flex-direction:column;">
                        <div style="flex:1;display:flex;gap:0.75rem;align-items:center">
                            <div style="flex:1">
                                <h4 style="margin:0;color:#1e3c72">${escapeHtml(it.title || '')}</h4>
                                <div style="color:#556;margin-top:.5rem">${escapeHtml((it.description||'').slice(0,150))}</div>
                            </div>
                            <div style="width:120px">
                                ${it.image_path ? `<img src="${(it.image_path||'').replace(/^storage\//,'/storage/')}" style="width:100%;height:auto;border-radius:6px;object-fit:cover">` : '<div style="height:80px;background:#f0f3f5;border-radius:6px;display:flex;align-items:center;justify-content:center;color:#999">No image</div>'}
                            </div>
                        </div>
                        <div style="margin-top:.6rem;display:flex;gap:.5rem;justify-content:flex-end">
                            <button class="btn" onclick="openPenempatanModal(${it.id})">Edit</button>
                            <button class="btn btn-danger" onclick="deletePenempatan(${it.id})">Hapus</button>
                        </div>
                    </div>`;
                list.appendChild(div);
            });
        }

        function openPenempatanModal(id = null) {
            document.getElementById('penempatan-form').reset();
            document.getElementById('penempatan-image-preview').innerHTML = '';
            document.getElementById('penempatan-id').value = '';
            document.getElementById('penempatan-modal').style.display = 'block';
            document.getElementById('penempatan-modal-title').textContent = id ? 'Edit Penempatan' : 'Tambah Penempatan';
            if (id) {
                // load item
                fetch('/admin/penempatan/json', { headers:{'X-Requested-With':'XMLHttpRequest'} }).then(r=>r.json()).then(j=>{
                    if (j.success) {
                        const it = (j.data || []).find(x=>x.id==id);
                        if (it) {
                            document.getElementById('penempatan-id').value = it.id;
                            document.getElementById('penempatan-title').value = it.title || '';
                            document.getElementById('penempatan-description').value = it.description || '';
                            document.getElementById('penempatan-source').value = it.source_url || '';
                            if (it.image_path) document.getElementById('penempatan-image-preview').innerHTML = `<img src="${it.image_path.replace(/^storage\//,'/storage/')}" style="max-width:200px;max-height:150px;border-radius:8px">`;
                        }
                    }
                }).catch(e=>console.error(e));
            }
        }

        function closePenempatanModal() { document.getElementById('penempatan-modal').style.display = 'none'; }

        function previewPenempatanImage(input) {
            const preview = document.getElementById('penempatan-image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) { preview.innerHTML = `<img src="${e.target.result}" style="max-width:200px;max-height:150px;border-radius:8px">`; };
                reader.readAsDataURL(input.files[0]);
            }
        }

        async function handlePenempatanSubmit(e) {
            e.preventDefault();
            const form = document.getElementById('penempatan-form');
            const fd = new FormData(form);
            const id = document.getElementById('penempatan-id').value;
            const url = id ? `/admin/penempatan/${id}/ajax` : PENEMPATAN_CREATE_URL;
            try {
                const res = await fetch(url, { method: 'POST', headers: DEFAULT_HEADERS, body: fd });
                const ct = res.headers.get('content-type') || '';
                if (ct.indexOf('application/json') !== -1) {
                    const j = await res.json();
                    if (j.success) { closePenempatanModal(); fetchPenempatan(); }
                    else alert('Error saving: ' + (j.error||JSON.stringify(j)));
                } else {
                    const txt = await res.text();
                    console.error('Non-JSON response saving penempatan:', txt);
                    alert('Server error (non-JSON). See console for details.');
                }
            } catch (err) { console.error(err); alert('Error: ' + err.message); }
        }

        async function deletePenempatan(id) {
            if (!confirm('Hapus item ini?')) return;
            try {
                const res = await fetch(`/admin/penempatan/${id}/ajax`, { method: 'DELETE', headers: DEFAULT_HEADERS });
                const ct = res.headers.get('content-type') || '';
                if (ct.indexOf('application/json') !== -1) {
                    const j = await res.json();
                    if (j.success) fetchPenempatan(); else alert('Gagal menghapus');
                } else {
                    const txt = await res.text(); console.error('Non-JSON delete response:', txt); alert('Server error (non-JSON). See console.');
                }
            } catch (e) { console.error(e); alert('Error deleting: ' + e.message); }
        }

        function escapeHtml(s){ return (s||'').replace(/[&<>"]/g, c=>({"&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;"})[c]); }


    </script>
</body>
</html>
