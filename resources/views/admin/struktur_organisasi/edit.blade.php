<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Struktur Organisasi - Admin</title>
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
        .form-select,
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
        .form-select:focus,
        textarea.form-control:focus {
            border-color: var(--brand-accent);
            box-shadow: 0 0 0 4px rgba(0, 157, 165, 0.1);
        }

        /* Current Image styling */
        .current-photo {
            width: 140px;
            height: 140px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            margin-top: 0.25rem;
        }

        .current-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* custom file input wrapper */
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
            max-width: 140px;
            max-height: 140px;
            border-radius: 12px;
            margin-top: 1rem;
            object-fit: cover;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        /* Checkbox styling */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--brand-accent);
            cursor: pointer;
        }

        .checkbox-group label {
            margin: 0;
            cursor: pointer;
        }

        /* Form Actions Buttons */
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

        /* Error alerts */
        .alert {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 1rem 1.5rem;
            border-radius: 14px;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            box-shadow: var(--shadow-sm);
        }

        .alert strong {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .error-list {
            list-style-type: disc;
            padding-left: 1.5rem;
        }

        .error-list li {
            margin-bottom: 0.25rem;
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
            <a href="{{ route('struktur-organisasi.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>

        <div class="form-container">
            <h1><i class="fas fa-user-edit"></i> Edit Anggota</h1>

            @if ($errors->any())
                <div class="alert">
                    <strong><i class="fas fa-exclamation-circle"></i> Ada kesalahan input:</strong>
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('struktur-organisasi.update', $strukturOrganisasi) }}" enctype="multipart/form-data" class="elegant-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama"><i class="fas fa-user"></i> Nama Lengkap *</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $strukturOrganisasi->nama) }}" required>
                </div>

                <div class="form-group">
                    <label for="role"><i class="fas fa-briefcase"></i> Role / Jabatan *</label>
                    <input type="text" id="role" name="role" class="form-control" value="{{ old('role', $strukturOrganisasi->role) }}" required>
                </div>

                <div class="form-group">
                    <label for="posisi"><i class="fas fa-layer-group"></i> Posisi *</label>
                    <select id="posisi" name="posisi" class="form-select" required onchange="updateParentOptions()">
                        <option value="">-- Pilih Posisi --</option>
                        @foreach ($posisiOptions as $value => $label)
                            <option value="{{ $value }}" {{ old('posisi', $strukturOrganisasi->posisi) == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" id="parent-group" style="display: none;">
                    <label for="parent_id"><i class="fas fa-user-tie"></i> Atasan / Head (untuk Staff)</label>
                    <select id="parent_id" name="parent_id" class="form-select">
                        <option value="">-- Belum Ditentukan --</option>
                    </select>
                    <small class="form-help">Pilih Head/Atasan langsung sebagai penghubung anggota staf ini.</small>
                </div>

                <div class="form-group">
                    <label for="urutan"><i class="fas fa-sort-numeric-up"></i> Urutan Prioritas</label>
                    <input type="number" id="urutan" name="urutan" class="form-control" value="{{ old('urutan', $strukturOrganisasi->urutan) }}" min="0">
                    <small class="form-help">Angka urutan tampilan struktur (opsional).</small>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-image"></i> Foto Profil Saat Ini</label>
                    @if ($strukturOrganisasi->foto)
                        <div class="current-photo">
                            <img src="{{ \App\Helpers\StoragePathHelper::url($strukturOrganisasi->foto) }}" alt="{{ $strukturOrganisasi->nama }}">
                        </div>
                    @else
                        <p style="color: var(--text-muted); font-size: 0.9rem; font-style: italic; padding-left: 0.25rem;">Tidak ada foto profil.</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="foto"><i class="fas fa-upload"></i> Ganti Foto Profil</label>
                    <div class="file-input-wrapper">
                        <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                        <label for="foto" class="file-input-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Klik untuk upload foto baru</span>
                        </label>
                    </div>
                    <div id="preview" style="display: flex; justify-content: center;"></div>
                </div>

                <div class="form-group" style="margin-top: 1rem;">
                    <div class="checkbox-group">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $strukturOrganisasi->is_active) ? 'checked' : '' }}>
                        <label for="is_active"><i class="fas fa-check-circle" style="color: var(--brand-accent)"></i> Status Aktif</label>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('struktur-organisasi.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Data untuk parent options (diisi dari database)
        let headList = [
            @foreach(\App\Models\StrukturOrganisasi::active()->where(function($q){ $q->where('posisi', 'head')->orWhere('role','like','%Head%')->orWhere('role','like','%Kepala%'); })->get() as $head)
                { id: '{{ $head->id }}', name: '{{ addslashes($head->nama) }}', role: '{{ addslashes($head->role) }}' },
            @endforeach
        ];
        let currentParentId = '{{ old('parent_id', $strukturOrganisasi->parent_id) }}';

        function updateParentOptions() {
            const posisi = document.getElementById('posisi').value;
            const parentGroup = document.getElementById('parent-group');
            const parentSelect = document.getElementById('parent_id');

            if (posisi === 'staff') {
                parentGroup.style.display = 'block';
                parentSelect.innerHTML = '<option value="">-- Belum Ditentukan --</option>';
                headList.forEach(h => {
                    if (!h || !h.id) return;
                    const option = document.createElement('option');
                    option.value = h.id;
                    option.textContent = h.name + ' (' + h.role + ')';
                    if (String(h.id) === String(currentParentId)) {
                        option.selected = true;
                    }
                    parentSelect.appendChild(option);
                });

                // Auto-assignment helper
                const roleInput = document.getElementById('role');
                if (roleInput) {
                    const roleText = roleInput.value || '';
                    if (roleText && !parentSelect.value) {
                        const found = headList.find(h => {
                            const combined = (h.name + ' ' + h.role).toLowerCase();
                            return roleText.toLowerCase().split(/\s+/).some(tok => tok && combined.includes(tok));
                        });
                        if (found) parentSelect.value = found.id;
                    }
                }
            } else {
                parentGroup.style.display = 'none';
                parentSelect.value = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateParentOptions();

            const roleInput = document.getElementById('role');
            if (roleInput) {
                roleInput.addEventListener('input', function() {
                    const parentSelect = document.getElementById('parent_id');
                    if (document.getElementById('posisi').value !== 'staff') return;
                    if (parentSelect.value) return;
                    const text = this.value || '';
                    if (!text) return;
                    const found = headList.find(h => {
                        const combined = (h.name + ' ' + h.role).toLowerCase();
                        return text.toLowerCase().split(/\s+/).some(tok => tok && combined.includes(tok));
                    });
                    if (found) parentSelect.value = found.id;
                });
            }
        });

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
