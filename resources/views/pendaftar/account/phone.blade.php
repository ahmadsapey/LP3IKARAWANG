<!doctype html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Ubah Nomor Handphone</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root{--basic:#004269;--adv:#40826D}
    body{background:var(--basic);}
    .card-adv{border:1px solid var(--adv);box-shadow:0 6px 18px rgba(0,0,0,0.08);background:#fff;color:#0f172a}
    .card-adv .field-box{background:#fff;color:#0f172a}
    .card-adv label{color:#475569}
    .btn-basic{background:linear-gradient(90deg,var(--basic),#009DA5);box-shadow:0 6px 12px rgba(0,0,0,0.12)}
    input, select, textarea { border-width: 2px !important; border-color: rgba(15,23,42,0.08) !important; }
  </style>
</head>
<body class="text-slate-800">
  @include('partials.header_pendaftar')
  <div class="max-w-6xl mx-auto p-6 lg:p-8">
    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-6 items-start">
      @include('partials.sidebar_pendaftar')

      <main>
        <div class="bg-white rounded-xl card-adv p-6">
          <div class="flex items-center justify-between">
            <div>
              <h2 class="text-2xl font-bold text-[#004269]">Ubah Nomor Handphone</h2>
              <p class="text-sm text-slate-500">Perbarui nomor handphone utama Anda.</p>
            </div>
          </div>

          @if(session('success'))
            <div class="p-3 mt-4 rounded bg-green-50 text-green-700">{{ session('success') }}</div>
          @endif

          <form action="{{ route('pendaftar.akun.phone.update') }}" method="POST" class="mt-5">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="md:col-span-2 field-box p-4 rounded">
                <label class="block text-sm mb-1">Nomor Handphone</label>
                <input type="tel" name="phone" class="w-full border rounded px-3 py-2" value="{{ old('phone', Auth::user()->no_hp ?? '') }}">
              </div>
            </div>

            <div class="mt-6 flex items-center gap-3">
              <a href="{{ route('pendaftar.biodata.show') }}" class="px-4 py-2 rounded-md border-2 border-[#004269] text-[#004269]">Batal</a>
              <button type="submit" class="px-4 py-2 rounded-md text-white font-semibold btn-basic">Simpan</button>
            </div>
          </form>
        </div>
      </main>
    </div>
  </div>
</body>
</html>