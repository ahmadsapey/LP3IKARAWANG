<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="<?php echo e(asset('images/logos/Logo_LP3I.png')); ?>" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Struktur Organisasi - Admin</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --brand-dark: #004269;
            --brand-accent: #009DA5;
            --brand-blue: #3b82f6;
            --brand-success: #10b981;
            --brand-danger: #ef4444;
            
            --bg-gradient: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            --card-bg: rgba(255, 255, 255, 0.9);
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: rgba(229, 231, 235, 0.8);
            
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 16px 40px rgba(0, 0, 0, 0.1);
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-main);
            background: var(--bg-gradient);
            min-height: 100vh;
            padding: 2rem 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Back Link Button */
        .back-link {
            margin-bottom: 1.5rem;
        }

        .back-link a {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--brand-dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .back-link a:hover {
            color: var(--brand-accent);
            transform: translateX(-4px);
        }

        /* Page Header Card */
        .page-header {
            background: linear-gradient(135deg, var(--brand-dark) 0%, #002c47 100%);
            color: white;
            border-radius: 20px;
            padding: 2rem 2.25rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            letter-spacing: -0.5px;
        }

        /* Buttons styling */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.95rem;
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

        .btn-primary {
            background: var(--brand-accent);
            color: white;
        }

        .btn-primary:hover {
            background: #00828a;
            box-shadow: 0 4px 12px rgba(0, 157, 165, 0.25);
        }

        .btn-secondary {
            background: var(--brand-dark);
            color: white;
        }

        .btn-secondary:hover {
            background: #003352;
            box-shadow: 0 4px 12px rgba(0, 66, 105, 0.25);
        }

        /* Alert styling */
        .alert {
            background: #d1fae5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 1rem 1.5rem;
            border-radius: 14px;
            margin-bottom: 2rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: var(--shadow-sm);
        }

        /* Modern Table Card */
        .table-container {
            background: white;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-md);
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .table th {
            background: #f9fafb;
            padding: 1.15rem 1.5rem;
            color: var(--brand-dark);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
        }

        .table td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            color: var(--text-main);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: #f9fafb;
        }

        /* Profile avatar container */
        .photo-wrapper {
            width: 54px;
            height: 54px;
            border-radius: 12px;
            overflow: hidden;
            background: #f3f4f6;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-wrapper i {
            font-size: 1.5rem;
            color: #9ca3af;
        }

        /* Status and Posisi Badges */
        .posisi-badge {
            display: inline-flex;
            padding: 0.3rem 0.75rem;
            border-radius: 99px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .posisi-director {
            background: #fef3c7;
            color: #92400e;
        }

        .posisi-secretary {
            background: #f3e8ff;
            color: #6b21a8;
        }

        .posisi-staff {
            background: #e0f2fe;
            color: #075985;
        }

        .status-badge {
            display: inline-flex;
            padding: 0.25rem 0.65rem;
            border-radius: 99px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-badge.active {
            background: #d1fae5;
            color: #065f46;
        }

        .status-badge.inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Action Buttons */
        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 8px;
            cursor: pointer;
            border: none;
            transition: var(--transition);
            color: white;
            text-decoration: none;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .action-btn.edit {
            background: #eff6ff;
            color: var(--brand-blue);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .action-btn.edit:hover {
            background: var(--brand-blue);
            color: white;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.25);
        }

        .action-btn.delete {
            background: #fef2f2;
            color: var(--brand-danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .action-btn.delete:hover {
            background: var(--brand-danger);
            color: white;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.25);
        }

        /* Responsive Breakpoints */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                padding: 1.5rem;
            }
            .page-header a {
                width: 100%;
                justify-content: center;
            }
            .table-container {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-link">
            <a href="/admin"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
        </div>

        <div class="page-header">
            <h1><i class="fas fa-sitemap"></i> Struktur Organisasi</h1>
            <a href="<?php echo e(route('struktur-organisasi.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Anggota
            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="alert">
                <i class="fas fa-check-circle"></i>
                <span><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Role/Jabatan</th>
                        <th>Posisi</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th style="width: 120px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $strukturs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $struktur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <div class="photo-wrapper">
                                    <?php if($struktur->foto): ?>
                                        <img src="<?php echo e(\App\Helpers\StoragePathHelper::url($struktur->foto)); ?>" alt="<?php echo e($struktur->nama); ?>">
                                    <?php else: ?>
                                        <i class="fas fa-user"></i>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td><strong><?php echo e($struktur->nama); ?></strong></td>
                            <td><?php echo e($struktur->role); ?></td>
                            <td>
                                <span class="posisi-badge posisi-<?php echo e($struktur->posisi); ?>">
                                    <?php echo e(ucfirst($struktur->posisi)); ?>

                                </span>
                            </td>
                            <td><span style="font-weight: 600;"><?php echo e($struktur->urutan); ?></span></td>
                            <td>
                                <span class="status-badge <?php echo e($struktur->is_active ? 'active' : 'inactive'); ?>">
                                    <?php echo e($struktur->is_active ? 'Aktif' : 'Tidak Aktif'); ?>

                                </span>
                            </td>
                            <td>
                                <div class="actions" style="justify-content: center;">
                                    <a href="<?php echo e(route('struktur-organisasi.edit', $struktur)); ?>" class="action-btn edit" title="Edit Anggota">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="<?php echo e(route('struktur-organisasi.destroy', $struktur)); ?>" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="action-btn delete" title="Hapus Anggota">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                                <i class="fas fa-inbox" style="font-size: 2.5rem; color: #cbd5e1; margin-bottom: 1rem; display: block;"></i>
                                <p>Tidak ada data struktur organisasi.</p>
                                <a href="<?php echo e(route('struktur-organisasi.create')); ?>" class="btn btn-secondary" style="margin-top: 1rem; font-size: 0.85rem; padding: 0.5rem 1rem;">
                                    Tambah Sekarang
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/admin/struktur_organisasi/index.blade.php ENDPATH**/ ?>