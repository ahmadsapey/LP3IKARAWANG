<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Biodata - LP3I Karawang</title>
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --primary: #004269;
      --secondary: #40826D;
      --accent: #009DA5;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8fafc;
      color: #1e293b;
    }
    /* Header Background Gradient */
    .bg-custom-gradient {
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    }
    /* Form Focus States */
    .form-input-custom:focus {
      border-color: var(--accent) !important;
      box-shadow: 0 0 0 3px rgba(0, 157, 165, 0.1);
      outline: none;
    }
    .sidebar-link-active {
      background-color: rgba(0, 66, 105, 0.08);
      color: var(--primary);
      font-weight: 600;
    }
  </style>
</head>
<body class="bg-slate-50">

  @include('partials.header_pendaftar')

  <div class="h-48 bg-custom-gradient w-full absolute top-0 left-0 -z-10"></div>

  <div class="max-w-6xl mx-auto p-4 md:p-6 lg:p-8 mt-12">
    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-8 items-start">
      
      <!-- Sidebar -->
      @include('partials.sidebar_pendaftar')

      <!-- Main Form -->
      <main>
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
          
          <div class="p-6 md:p-8 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
              <h2 class="text-2xl font-bold text-slate-800">Ubah Biodata</h2>
              <p class="text-sm text-slate-500 mt-1">Pastikan informasi yang Anda masukkan sudah sesuai data resmi.</p>
            </div>
            <div class="inline-flex items-center px-4 py-2 bg-slate-50 rounded-lg border border-slate-200 self-start sm:self-auto">
              <span class="text-xs font-semibold text-slate-400 mr-2 uppercase">Nomor NIPD:</span>
              <span class="text-sm font-bold text-primary">{{ $pendaftar->nipd ?? '-' }}</span>
            </div>
          </div>

          <div class="p-6 md:p-8">
            @if(session('success'))
              <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 flex items-center gap-3">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
              </div>
            @endif

            @if($errors->any())
              <div class="mb-6 p-4 rounded-xl bg-amber-50 border border-amber-100 text-amber-800">
                <div class="flex items-center gap-2 font-bold mb-2">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                  <span>Ada kesalahan pengisian form:</span>
                </div>
                <ul class="list-disc pl-8 text-sm space-y-1">
                  @foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('pendaftar.biodata.update') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <!-- Section 1 -->
              <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2 flex items-center gap-2">
                <i class="fas fa-user text-primary"></i> Informasi Pribadi
              </h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                  <input type="text" name="nama_mhs" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: Joko Susilo" value="{{ old('nama_mhs', $pendaftar->nama_mhs ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Email Aktif</label>
                  <input type="email" name="email" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="contoh@domain.com" value="{{ old('email', $pendaftar->email ?? '') }}">
                  <p class="mt-1.5 text-[11px] text-slate-400">Digunakan untuk menerima notifikasi status kelulusan pendaftaran.</p>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: Karawang" value="{{ old('tempat_lahir', $pendaftar->tempat_lahir ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">No. Handphone (WhatsApp)</label>
                  <input type="text" name="no_hp" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: 08123456789" value="{{ old('no_hp', $pendaftar->no_hp ?? '') }}">
                  <p class="mt-1.5 text-[11px] text-slate-400">Pastikan nomor ini aktif dan terhubung ke WhatsApp Anda.</p>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom bg-white">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ (old('jenis_kelamin', $pendaftar->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ (old('jenis_kelamin', $pendaftar->jenis_kelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Agama</label>
                  <select name="agama" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom bg-white">
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam" {{ (old('agama', $pendaftar->agama ?? '') == 'Islam') ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ (old('agama', $pendaftar->agama ?? '') == 'Kristen') ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ (old('agama', $pendaftar->agama ?? '') == 'Katolik') ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ (old('agama', $pendaftar->agama ?? '') == 'Hindu') ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ (old('agama', $pendaftar->agama ?? '') == 'Buddha') ? 'selected' : '' }}>Buddha</option>
                  </select>
                </div>
              </div>

              <!-- Section 2 -->
              <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2 flex items-center gap-2">
                <i class="fas fa-graduation-cap text-primary"></i> Informasi Akademik
              </h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Program Studi Pilihan</label>
                  <select name="id_program_studi" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom bg-white">
                    <option value="">-- Pilih Program Studi --</option>
                    @php $selectedProdi = old('id_program_studi', $pendaftar->id_program_studi ?? ($pendaftar->id_program_study ?? '')); @endphp
                    <option value="1" {{ ((string)$selectedProdi === '1') ? 'selected' : '' }}>Accounting Information System</option>
                    <option value="2" {{ ((string)$selectedProdi === '2') ? 'selected' : '' }}>Application Software Engineering</option>
                    <option value="3" {{ ((string)$selectedProdi === '3') ? 'selected' : '' }}>Office Administration Automatization</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Kelas</label>
                  <select name="jenis_kelas" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom bg-white">
                    <option value="Regular" {{ (old('jenis_kelas', $pendaftar->jenis_kelas ?? '') == 'Regular') ? 'selected' : '' }}>Regular</option>
                    <option value="Karyawan" {{ (old('jenis_kelas', $pendaftar->jenis_kelas ?? '') == 'Karyawan') ? 'selected' : '' }}>Karyawan</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Asal Sekolah</label>
                  <input type="text" name="asal_sekolah" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: SMAN 1 Karawang" value="{{ old('asal_sekolah', $pendaftar->asal_sekolah ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Angkatan</label>
                  <input type="text" name="angkatan" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('angkatan', $pendaftar->angkatan ?? '') }}" placeholder="Contoh: 2025">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Periode Kuliah</label>
                  <input type="text" name="periode" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('periode', $pendaftar->periode ?? '') }}" placeholder="Contoh: Ganjil">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Tahun Kelulusan Sekolah</label>
                  <input type="number" name="tahun_lulus" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: 2024" value="{{ old('tahun_lulus', $pendaftar->tahun_lulus ?? '') }}">
                </div>
              </div>

              <!-- Section 3 -->
              <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2 flex items-center gap-2">
                <i class="fas fa-map-marker-alt text-primary"></i> Alamat Tinggal
              </h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="md:col-span-2">
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Lengkap</label>
                  <textarea name="alamat" rows="2" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Masukkan nama jalan, nomor rumah, RT/RW, Dusun...">{{ old('alamat', $pendaftar->alamat ?? '') }}</textarea>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Domisili Kota / Kabupaten</label>
                  <input type="text" name="domisili" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('domisili', $pendaftar->domisili ?? '') }}" placeholder="Contoh: Karawang">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Kecamatan</label>
                  <input type="text" name="kecamatan" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: Telukjambe Timur" value="{{ old('kecamatan', $pendaftar->kecamatan ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Desa/Kelurahan</label>
                  <input type="text" name="desa" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: Sukaluyu" value="{{ old('desa', $pendaftar->desa ?? '') }}">
                </div>
              </div>

              <!-- Section 4 -->
              <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2 flex items-center gap-2">
                <i class="fas fa-users text-primary"></i> Data Wali / Orang Tua
              </h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Wali / Orang Tua</label>
                  <input type="text" name="nama_wali" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: Bambang Susilo" value="{{ old('nama_wali', $pendaftar->nama_wali ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Pekerjaan Wali / Orang Tua</label>
                  <input type="text" name="pekerjaan_wali" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: Karyawan Swasta" value="{{ old('pekerjaan_wali', $pendaftar->pekerjaan_wali ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">WhatsApp Wali / Orang Tua</label>
                  <input type="tel" name="whatsapp_wali" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: 08123456789" value="{{ old('whatsapp_wali', $pendaftar->whatsapp_wali ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Instagram Pribadi Anda</label>
                  <input type="text" name="instagram" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="Contoh: @username_anda" value="{{ old('instagram', $pendaftar->instagram ?? '') }}">
                </div>
              </div>

              <!-- Section 5 -->
              <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2 flex items-center gap-2">
                <i class="fas fa-file-upload text-primary"></i> Dokumen Pendukung (Maksimal Berkas 2MB)
              </h3>
              
              <div class="space-y-8">
                <!-- Profile Photo Picker -->
                <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200/80">
                  <label class="block text-sm font-bold text-slate-700 mb-4">Foto Profil</label>
                  <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
                    <div class="relative w-32 h-40 rounded-xl overflow-hidden border-4 border-white shadow-lg bg-slate-100 flex-shrink-0 group">
                      @if(!empty($pendaftar->photo_url) || !empty($pendaftar->foto))
                        @php
                            $fotoUrl = $pendaftar->foto ?? $pendaftar->photo_url;
                            if (!empty($fotoUrl) && !preg_match('#^https?://#i', $fotoUrl)) {
                                $fotoUrl = str_starts_with($fotoUrl, '/') ? $fotoUrl : '/' . ltrim($fotoUrl, '/');
                            }
                        @endphp
                        <img src="{{ $fotoUrl }}" alt="Preview" class="w-full h-full object-cover">
                      @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                          <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                          <span class="text-[10px] mt-1">Kosong</span>
                        </div>
                      @endif
                    </div>
                    <div class="flex-1 w-full text-center sm:text-left">
                      <div class="relative inline-block w-full sm:w-auto">
                        <input type="file" name="photo" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-20">
                        <button type="button" class="btn-basic text-white px-5 py-2.5 rounded-xl font-semibold text-sm shadow-sm inline-flex items-center gap-2">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                          Pilih Foto Baru
                        </button>
                      </div>
                      <p class="mt-3 text-xs text-slate-400 leading-relaxed">Gunakan foto formal (seperti pas foto sekolah) dengan rasio 3:4 dan latar belakang berwarna merah atau biru (maksimal ukuran berkas 2MB).</p>
                    </div>
                  </div>
                </div>

                <!-- Dashed Drag-and-Drop styled inputs for files -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                  
                  <!-- File 1: KTP -->
                  <div class="p-5 border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50 hover:bg-slate-100/50 hover:border-slate-300 transition-all flex flex-col items-center text-center relative group">
                    <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <label class="block text-xs font-bold text-slate-600 uppercase mb-1">KTP / Kartu Pelajar</label>
                    <input type="file" name="ktp_file" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-10">
                    <span class="text-[11px] text-slate-400">Klik untuk memilih berkas</span>
                    @if(!empty($pendaftar->ktp_path))
                      <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-semibold border border-emerald-200">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Tersedia
                      </div>
                    @endif
                  </div>

                  <!-- File 2: Ijazah -->
                  <div class="p-5 border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50 hover:bg-slate-100/50 hover:border-slate-300 transition-all flex flex-col items-center text-center relative group">
                    <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Ijazah Terakhir</label>
                    <input type="file" name="ijazah_file" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-10">
                    <span class="text-[11px] text-slate-400">Klik untuk memilih berkas</span>
                    @if(!empty($pendaftar->ijazah_path))
                      <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-semibold border border-emerald-200">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Tersedia
                      </div>
                    @endif
                  </div>

                  <!-- File 3: Akte Kelahiran -->
                  <div class="p-5 border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50 hover:bg-slate-100/50 hover:border-slate-300 transition-all flex flex-col items-center text-center relative group">
                    <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Akte Kelahiran</label>
                    <input type="file" name="akte_kelahiran_file" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-10">
                    <span class="text-[11px] text-slate-400">Klik untuk memilih berkas</span>
                    @if(!empty($pendaftar->akte_kelahiran_path))
                      <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-semibold border border-emerald-200">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Tersedia
                      </div>
                    @endif
                  </div>

                  <!-- File 4: Surat Keterangan Kerja -->
                  <div class="p-5 border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50 hover:bg-slate-100/50 hover:border-slate-300 transition-all flex flex-col items-center text-center relative group">
                    <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Surat Keterangan Kerja</label>
                    <input type="file" name="surat_sudah_bekerja_file" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full z-10">
                    <span class="text-[11px] text-slate-400">Klik untuk memilih berkas</span>
                    @if(!empty($pendaftar->surat_sudah_bekerja_path))
                      <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-semibold border border-emerald-200">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Tersedia
                      </div>
                    @endif
                  </div>

                </div>
              </div>

              <!-- Form Actions -->
              <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-end gap-4">
                <a href="{{ route('pendaftar.biodata.show') }}" class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-500 font-semibold hover:bg-slate-50 transition-all">Batal</a>
                <button type="submit" class="px-8 py-2.5 rounded-xl bg-custom-gradient text-white font-bold shadow-lg shadow-primary/20 hover:scale-[1.02] transition-all">Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
  </div>

  <footer class="mt-12 py-8 text-center text-slate-400 text-xs">
    &copy; {{ date('Y') }} LP3I Karawang. All rights reserved.
  </footer>

</body>
</html>