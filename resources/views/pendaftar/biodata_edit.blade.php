<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Biodata - LP3I Karawang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
    /* Custom File Upload Styling */
    input[type="file"]::file-selector-button {
      background-color: #f1f5f9;
      border: 1px solid #e2e8f0;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      cursor: pointer;
      margin-right: 1rem;
      transition: all 0.2s;
    }
    input[type="file"]::file-selector-button:hover {
      background-color: #e2e8f0;
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
      
      <aside class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xl shadow-slate-200/50 sticky top-6">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-primary">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M12 11c2.761 0 5-2.239 5-5S14.761 1 12 1 7 3.239 7 6s2.239 5 5 5zM3 21a9 9 0 0118 0"/></svg>
          </div>
          <div class="overflow-hidden">
            <p class="text-xs text-slate-400 font-medium uppercase tracking-wider">Pendaftar</p>
            <p class="font-bold truncate text-slate-700">{{ Auth::user()->name ?? 'Pendaftar' }}</p>
          </div>
        </div>

        <nav class="space-y-1.5">
          <a href="{{ route('pendaftar.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1   1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span class="text-sm font-medium">Dashboard</span>
          </a>
          <a href="{{ route('pendaftar.biodata.show') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-link-active transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            <span class="text-sm font-medium">Biodata</span>
          </a>

          <div class="pt-4 pb-2 px-4">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Pengaturan Akun</p>
          </div>
          <a href="{{ route('pendaftar.akun.email') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 text-sm transition-all">Email</a>
          <a href="{{ route('pendaftar.akun.password') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 text-sm transition-all">Password</a>
          <a href="{{ route('pendaftar.akun.phone') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 text-sm transition-all">No. Handphone</a>
        </nav>
      </aside>

      <main>
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
          
          <div class="p-6 md:p-8 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
              <h2 class="text-2xl font-bold text-slate-800">Ubah Biodata</h2>
              <p class="text-sm text-slate-500 mt-1">Pastikan informasi yang Anda masukkan sudah benar.</p>
            </div>
            <div class="inline-flex items-center px-4 py-2 bg-slate-50 rounded-lg border border-slate-200">
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
                  <span>Ada kesalahan pengisian:</span>
                </div>
                <ul class="list-disc pl-8 text-sm space-y-1">
                  @foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('pendaftar.biodata.update') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2">Informasi Pribadi</h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                  <input type="text" name="nama_mhs" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('nama_mhs', $pendaftar->nama_mhs ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Email Aktif</label>
                  <input type="email" name="email" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('email', $pendaftar->email ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('tempat_lahir', $pendaftar->tempat_lahir ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">No. Handphone (WhatsApp)</label>
                  <input type="text" name="no_hp" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('no_hp', $pendaftar->no_hp ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ (old('jenis_kelamin', $pendaftar->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ (old('jenis_kelamin', $pendaftar->jenis_kelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Agama</label>
                  <select name="agama" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom">
                    <option value="">-- Pilih --</option>
                    <option value="Islam" {{ (old('agama', $pendaftar->agama ?? '') == 'Islam') ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ (old('agama', $pendaftar->agama ?? '') == 'Kristen') ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ (old('agama', $pendaftar->agama ?? '') == 'Katolik') ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ (old('agama', $pendaftar->agama ?? '') == 'Hindu') ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ (old('agama', $pendaftar->agama ?? '') == 'Buddha') ? 'selected' : '' }}>Buddha</option>
                  </select>
                </div>
              </div>

              <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2">Informasi Akademik</h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Program Studi</label>
                  <select name="id_program_studi" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom">
                    <option value="">-- Pilih --</option>
                    @php $selectedProdi = old('id_program_studi', $pendaftar->id_program_studi ?? ($pendaftar->id_program_study ?? '')); @endphp
                    <option value="1" {{ ((string)$selectedProdi === '1') ? 'selected' : '' }}>Accounting Information System</option>
                    <option value="2" {{ ((string)$selectedProdi === '2') ? 'selected' : '' }}>Application Software Engineering</option>
                    <option value="3" {{ ((string)$selectedProdi === '3') ? 'selected' : '' }}>Office Administration Automatization</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Kelas</label>
                  <select name="jenis_kelas" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom">
                    <option value="Regular" {{ (old('jenis_kelas', $pendaftar->jenis_kelas ?? '') == 'Regular') ? 'selected' : '' }}>Regular</option>
                    <option value="Karyawan" {{ (old('jenis_kelas', $pendaftar->jenis_kelas ?? '') == 'Karyawan') ? 'selected' : '' }}>Karyawan</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Asal Sekolah</label>
                  <input type="text" name="asal_sekolah" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('asal_sekolah', $pendaftar->asal_sekolah ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Angkatan</label>
                  <input type="text" name="angkatan" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('angkatan', $pendaftar->angkatan ?? '') }}" placeholder="Contoh: 2025">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Periode</label>
                  <input type="text" name="periode" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('periode', $pendaftar->periode ?? '') }}" placeholder="Contoh: Genap">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Tahun Lulus</label>
                  <input type="number" name="tahun_lulus" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('tahun_lulus', $pendaftar->tahun_lulus ?? '') }}">
                </div>
              </div>

              <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2">Alamat Tinggal</h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="md:col-span-2">
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Lengkap</label>
                  <textarea name="alamat" rows="2" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom">{{ old('alamat', $pendaftar->alamat ?? '') }}</textarea>
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Domisili</label>
                  <input type="text" name="domisili" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('domisili', $pendaftar->domisili ?? '') }}" placeholder="Contoh: Karawang">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Kecamatan</label>
                  <input type="text" name="kecamatan" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('kecamatan', $pendaftar->kecamatan ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Desa/Kelurahan</label>
                  <input type="text" name="desa" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('desa', $pendaftar->desa ?? '') }}">
                </div>
              </div>

              <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2">Data Wali / Orang Tua</h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Wali</label>
                  <input type="text" name="nama_wali" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('nama_wali', $pendaftar->nama_wali ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Pekerjaan Wali</label>
                  <input type="text" name="pekerjaan_wali" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('pekerjaan_wali', $pendaftar->pekerjaan_wali ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">WhatsApp Wali</label>
                  <input type="tel" name="whatsapp_wali" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" value="{{ old('whatsapp_wali', $pendaftar->whatsapp_wali ?? '') }}">
                </div>
                <div>
                  <label class="block text-sm font-semibold text-slate-700 mb-2">Instagram Anda</label>
                  <input type="text" name="instagram" class="w-full border border-slate-300 rounded-xl px-4 py-2.5 transition-all form-input-custom" placeholder="@username" value="{{ old('instagram', $pendaftar->instagram ?? '') }}">
                </div>
              </div>

              <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2">Dokumen Pendukung (Max 2MB)</h3>
              <div class="space-y-8">
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200">
                  <label class="block text-sm font-bold text-slate-700 mb-3">Foto Profil</label>
                  <div class="flex flex-col md:flex-row items-start gap-6">
                    @if(!empty($pendaftar->photo_url) || !empty($pendaftar->foto))
                      <img src="{{ asset(ltrim($pendaftar->foto ?? $pendaftar->photo_url,'/')) }}" alt="Preview" class="w-32 h-40 object-cover rounded-xl border-2 border-white shadow-md">
                    @endif
                    <div class="flex-1">
                      <input type="file" name="photo" class="text-sm text-slate-500 w-full">
                      <p class="mt-2 text-xs text-slate-400">Gunakan foto formal latar belakang merah/biru.</p>
                    </div>
                  </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div class="p-4 border border-slate-200 rounded-xl">
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">KTP / Kartu Pelajar</label>
                    <input type="file" name="ktp_file" class="text-sm w-full">
                    @if(!empty($pendaftar->ktp_path)) <p class="mt-2 text-[10px] text-emerald-600 font-bold">✓ Dokumen Tersedia</p> @endif
                  </div>
                  <div class="p-4 border border-slate-200 rounded-xl">
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Ijazah Terakhir</label>
                    <input type="file" name="ijazah_file" class="text-sm w-full">
                    @if(!empty($pendaftar->ijazah_path)) <p class="mt-2 text-[10px] text-emerald-600 font-bold">✓ Dokumen Tersedia</p> @endif
                  </div>
                  <div class="p-4 border border-slate-200 rounded-xl">
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Akte Kelahiran</label>
                    <input type="file" name="akte_kelahiran_file" class="text-sm w-full">
                    @if(!empty($pendaftar->akte_kelahiran_path)) <p class="mt-2 text-[10px] text-emerald-600 font-bold">✓ Dokumen Tersedia</p> @endif
                  </div>
                  <div class="p-4 border border-slate-200 rounded-xl">
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Surat Keterangan Kerja</label>
                    <input type="file" name="surat_sudah_bekerja_file" class="text-sm w-full">
                    @if(!empty($pendaftar->surat_sudah_bekerja_path)) <p class="mt-2 text-[10px] text-emerald-600 font-bold">✓ Dokumen Tersedia</p> @endif
                  </div>
                </div>
              </div>

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