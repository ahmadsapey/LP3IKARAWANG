<!doctype html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Penempatan</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --brand-dark: #004269;
            --brand-accent: #009DA5;
            --brand-blue: #3b82f6;
            --brand-danger: #ef4444;
            
            --bg-gradient: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
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

        /* Table container */
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

        /* Image preview */
        .photo-wrapper {
            width: 80px;
            height: 54px;
            border-radius: 10px;
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
            font-size: 1.3rem;
            color: #9ca3af;
        }

        /* Actions styling */
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
            <h1><i class="fas fa-briefcase"></i> Kelola Penempatan</h1>
            <a href="{{ route('admin.penempatan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Item
            </a>
        </div>

        @if(session('success'))
            <div class="alert">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 110px;">Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th style="width: 120px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $it)
                        <tr>
                            <td>
                                <div class="photo-wrapper">
                                    @if($it->image_path)
                                        <img src="{{ asset(str_replace('storage/','',$it->image_path)) }}" alt="{{ $it->title }}">
                                    @else
                                        <i class="fas fa-briefcase"></i>
                                    @endif
                                </div>
                            </td>
                            <td><strong>{{ $it->title }}</strong></td>
                            <td><div style="color: var(--text-muted); font-size: 0.9rem; max-height: 48px; overflow: hidden;">{{ \Illuminate\Support\Str::limit($it->description, 120) }}</div></td>
                            <td>
                                <div class="actions" style="justify-content: center;">
                                    <a href="{{ route('admin.penempatan.edit', $it) }}" class="action-btn edit" title="Edit Item">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.penempatan.destroy', $it) }}" style="display:inline;" onsubmit="return confirm('Hapus item ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete" title="Hapus Item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                                <i class="fas fa-inbox" style="font-size: 2.5rem; color: #cbd5e1; margin-bottom: 1rem; display: block;"></i>
                                <p>Tidak ada item penempatan.</p>
                                <a href="{{ route('admin.penempatan.create') }}" class="btn btn-secondary" style="margin-top: 1rem; font-size: 0.85rem; padding: 0.5rem 1rem; background: var(--brand-dark); color: white;">
                                    Tambah Sekarang
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
