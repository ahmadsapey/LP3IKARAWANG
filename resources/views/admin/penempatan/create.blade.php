<!doctype html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tambah Penempatan</title>
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
            max-width: 650px;
            margin: 0 auto;
        }

        /* Back Link */
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

        /* Form Card */
        .form-container {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
        }

        .form-container h1 {
            color: var(--brand-dark);
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            letter-spacing: -0.5px;
        }

        .form-group {
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            color: var(--brand-dark);
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group label i {
            color: var(--brand-accent);
            opacity: 0.8;
        }

        .form-control,
        textarea.form-control {
            width: 100%;
            padding: 0.8rem 1.15rem;
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
        textarea.form-control:focus {
            border-color: var(--brand-accent);
            box-shadow: 0 0 0 4px rgba(0, 157, 165, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        /* file input styled */
        .file-input-wrapper {
            position: relative;
        }

        .file-input-wrapper input[type="file"] {
            display: none;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 1rem;
            background: #f9fafb;
            border: 2px dashed rgba(0, 157, 165, 0.3);
            border-radius: 12px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            color: var(--text-main);
        }

        .file-input-label:hover {
            border-color: var(--brand-accent);
            background: rgba(0, 157, 165, 0.02);
        }

        .file-input-label i {
            font-size: 1.3rem;
            color: var(--brand-accent);
        }

        .preview-image {
            max-width: 100%;
            max-height: 200px;
            border-radius: 12px;
            margin-top: 1rem;
            object-fit: cover;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        /* Buttons actions */
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            border: none;
            transition: var(--transition);
            text-decoration: none;
            font-family: inherit;
            flex: 1;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #4b5563;
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .btn-primary {
            background: var(--brand-accent);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 157, 165, 0.2);
        }

        .btn-primary:hover {
            background: #00828a;
            box-shadow: 0 6px 16px rgba(0, 157, 165, 0.3);
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 1.75rem;
            }
            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-link">
            <a href="{{ route('admin.penempatan.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>

        <div class="form-container">
            <h1><i class="fas fa-briefcase"></i> Tambah Penempatan</h1>

            <form action="{{ route('admin.penempatan.store') }}" method="post" enctype="multipart/form-data" class="elegant-form">
                @csrf

                <div class="form-group">
                    <label for="title"><i class="fas fa-heading"></i> Judul / Nama Item *</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Contoh: Penempatan PT Kereta Api Indonesia" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="description"><i class="fas fa-align-left"></i> Deskripsi / Keterangan *</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Tuliskan keterangan detail mengenai penempatan..." rows="5" required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="source_url"><i class="fas fa-link"></i> URL Sumber (opsional)</label>
                    <input type="text" id="source_url" name="source_url" class="form-control" placeholder="Contoh: https://example.com/source" value="{{ old('source_url') }}">
                </div>

                <div class="form-group">
                    <label for="image"><i class="fas fa-image"></i> Upload Gambar (Max 2MB)</label>
                    <div class="file-input-wrapper">
                        <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                        <label for="image" class="file-input-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Klik untuk upload gambar penempatan</span>
                        </label>
                    </div>
                    <div id="preview" style="display: flex; justify-content: center;"></div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.penempatan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="preview-image">`;
                };
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '';
            }
        }
    </script>
</body>
</html>
