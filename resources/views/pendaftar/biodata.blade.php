<!doctype html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Biodata Pendaftar</title>
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root{--basic:#004269;--adv:#40826D}
    body { font-family: 'Poppins', sans-serif; background:var(--basic); }
    /* Card: white background with viridian border */
    .card-adv{border:1px solid var(--adv);box-shadow:0 6px 18px rgba(0,0,0,0.08);background:#fff;color:#0f172a}
    .btn-basic{background:linear-gradient(90deg,var(--basic),#009DA5);box-shadow:0 6px 12px rgba(0,0,0,0.12)}
    /* Thicker form borders for visibility */
    input, select, textarea { border-width: 2px !important; border-color: rgba(15,23,42,0.08) !important; }
    /* Details/account dropdown tweaks */
    .details-acc summary { display:flex; align-items:center; gap:.5rem }
    .details-acc .icon-acc { color:var(--basic); transition:transform .18s ease }
    .details-acc .caret-acc { transition:transform .18s ease; transform-origin:center }
    .details-acc[open] .caret-acc { transform:rotate(180deg) }
    .details-acc[open] .icon-acc { transform:scale(1.04) }
  </style>
</head>
<body class="text-slate-800">
  @include('partials.header_pendaftar')
  <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-6 items-start">
      <!-- Sidebar (same style as dashboard) -->
      @include('partials.sidebar_pendaftar')

      <main>
        <div class="bg-white rounded-xl card-adv p-6">
          @if(session('success'))
            <div class="p-3 mb-4 rounded bg-green-50 text-green-700">{{ session('success') }}</div>
          @endif
          <div class="flex flex-col md:flex-row gap-6 items-start">
            <div class="w-full md:w-64 shrink-0 mx-auto md:mx-0 max-w-[280px]">
              <div class="rounded-lg overflow-hidden shadow-sm">
                <div class="w-full h-64 bg-gradient-to-br from-slate-50 to-white flex items-center justify-center border">
                  @if(!empty($pendaftar->photo_url) || !empty($pendaftar->foto))
                    @php
                        $fotoUrl = $pendaftar->foto ?? $pendaftar->photo_url;
                        if (!empty($fotoUrl) && !preg_match('#^https?://#i', $fotoUrl)) {
                            $fotoUrl = str_starts_with($fotoUrl, '/') ? $fotoUrl : '/' . ltrim($fotoUrl, '/');
                        }
                    @endphp
                    <img src="{{ $fotoUrl }}" alt="Foto Profil" class="w-full h-64 object-cover" />
                  @else
                    <div class="text-center text-slate-400">Belum ada foto profil</div>
                  @endif
                </div>
              </div>

              @if(!empty($pendaftar->ktp_path))
                <div class="mt-3 text-sm text-center md:text-left">
                  <div class="text-slate-700">Dokumen KTP/Kartu Pelajar telah diunggah. Dokumen tidak ditampilkan di halaman ini untuk menjaga privasi.</div>
                </div>
              @endif

              <a href="{{ route('pendaftar.biodata.edit') }}" class="mt-4 inline-block w-full text-center py-2.5 rounded-md text-white font-semibold btn-basic">Edit Biodata</a>
            </div>

            <div class="flex-1 w-full">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b pb-4 mb-4">
                <div>
                  <h2 class="text-2xl font-bold text-[#004269]">Biodata Pendaftar</h2>
                  <p class="text-sm text-slate-500">Perbarui informasi pribadi Anda di halaman ini.</p>
                </div>
                <div class="text-sm text-slate-500 sm:text-right">Nomor NIPD: <span class="font-semibold text-slate-700 bg-slate-100 px-2.5 py-1 rounded">{{ $pendaftar->nipd ?? '-' }}</span></div>
              </div>

              <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                @php
                  $fields = [
                    ['label'=>'Nama','value'=>$pendaftar->nama_mhs ?? '-'],
                    ['label'=>'Tempat Lahir','value'=>$pendaftar->tempat_lahir ?? '-'],
                    ['label'=>'Angkatan','value'=>$pendaftar->angkatan ?? '-'],
                    ['label'=>'Periode','value'=>$pendaftar->periode ?? '-'],
                    ['label'=>'No. HP','value'=>$pendaftar->no_hp ?? ($pendaftar->no_tlp ?? '-')],
                    ['label'=>'Email','value'=>$pendaftar->email ?? '-'],
                    ['label'=>'Jenis Kelas','value'=>$pendaftar->jenis_kelas ?? '-'],
                    ['label'=>'Program Studi','value'=>\App\Helpers\JurusanHelper::getFormat($pendaftar->id_program_studi ?? ($pendaftar->id_program_study ?? null))],
                    ['label'=>'Asal Sekolah','value'=>$pendaftar->asal_sekolah ?? '-'],
                    ['label'=>'Agama','value'=>$pendaftar->agama ?? '-'],
                    ['label'=>'Jenis Kelamin','value'=>$pendaftar->jenis_kelamin ?? '-'],
                    ['label'=>'Alamat','value'=>$pendaftar->alamat ?? '-'],
                    ['label'=>'Domisili','value'=>$pendaftar->domisili ?? '-'],
                    ['label'=>'Kecamatan','value'=>$pendaftar->kecamatan ?? '-'],
                    ['label'=>'Desa','value'=>$pendaftar->desa ?? '-'],
                    ['label'=>'Kode Pos','value'=>$pendaftar->kode_pos ?? '-'],
                    ['label'=>'Tahun Lulus','value'=>$pendaftar->tahun_lulus ?? '-'],
                    ['label'=>'Instagram','value'=>$pendaftar->instagram ?? ($pendaftar->instagram_path ?? '-')],
                    ['label'=>'Nama Orang Tua/Wali','value'=>$pendaftar->nama_wali ?? '-'],
                    ['label'=>'No. Telp Orang Tua/Wali','value'=>$pendaftar->telp_wali ?? '-'],
                    ['label'=>'WhatsApp Orang Tua/Wali','value'=>$pendaftar->whatsapp_wali ?? '-'],
                    ['label'=>'Pekerjaan Orang Tua/Wali','value'=>$pendaftar->pekerjaan_wali ?? '-'],
                  ];
                @endphp

                @foreach($fields as $f)
                  <div class="p-4 bg-white rounded border-l-4 border-[#40826D]">
                    <div class="text-xs text-slate-400">{{ $f['label'] }}</div>
                    <div class="font-medium text-slate-800 mt-1">{{ $f['value'] }}</div>
                  </div>
                @endforeach
              </div>

              <div class="mt-6">
                {{-- <a href="{{ route('pendaftar.dashboard') }}" class="inline-block px-4 py-2 rounded-md border">Kembali ke Dashboard</a> --}}
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
