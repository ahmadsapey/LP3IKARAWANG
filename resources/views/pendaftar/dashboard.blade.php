<!doctype html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Dashboard Pendaftar</title>
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root{--basic:#004269;--adv:#40826D}
    body { font-family: 'Poppins', sans-serif; }
    .btn-basic{background:linear-gradient(90deg,var(--basic),var(--adv));box-shadow:0 6px 12px rgba(0,0,0,0.08)}
    .accent-color{color:var(--basic)}
    .card-accent{border-left:4px solid var(--adv)}
    /* Caret/button animation */
    #akunCaret{transition:transform .2s ease;transform-origin:center}
    .caret-rotated{transform:rotate(180deg)}
    .btn-basic{transition:transform .18s ease,box-shadow .18s ease}
    .btn-basic:hover{transform:translateY(-3px);box-shadow:0 12px 20px rgba(0,0,0,0.12)}
  </style>
</head>
<body class="text-slate-800" style="background:var(--basic);">
  
  @include('partials.header_pendaftar')

  <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-6 items-start">
      <!-- Sidebar -->
      @include('partials.sidebar_pendaftar')

      <!-- Main -->
      <main class="space-y-6">
        {{-- Status header removed per request --}}

        {{-- PROGRESS TRACKER --}}
        <div class="bg-white rounded-xl border p-5 shadow-sm">
          <div class="mb-4 text-sm text-slate-600">Progres pendaftaran</div>
          
          @php
            // Order: Pendaftaran -> Pembayaran -> Verifikasi -> Selesai
            // Map to computed step variables: $step1 (Pendaftaran), $step2 (Pembayaran), $step3 (Verifikasi), $step4 (Selesai)
            $steps = [
              ['label'=>'Pendaftaran','status'=> $step1 ?? 'completed'],
              ['label'=>'Pembayaran','status'=> $step2 ?? 'inactive'],
              ['label'=>'Verifikasi Pembayaran','status'=> $step3 ?? 'inactive'],
              ['label'=>'Selesai','status'=> $step4 ?? 'inactive'],
            ];
          @endphp

          <!-- Mobile Timeline (Stacked Vertically) -->
          <div class="block sm:hidden w-full space-y-2">
            @foreach($steps as $i => $s)
              @php
                $status = $s['status'];
                $isCompleted = $status === 'completed';
                $isActive = $status === 'active';
                $isRejected = $status === 'rejected';
                $dotBg = $isCompleted ? 'bg-green-500' : ($isActive ? 'bg-amber-400' : ($isRejected ? 'bg-red-500' : 'bg-slate-200'));
                $dotTxt = $isCompleted ? 'text-white' : ($isActive ? 'text-white' : 'text-slate-600');
              @endphp
              <div class="relative flex items-center gap-4 pb-4 last:pb-0">
                @if(!$loop->last)
                  @php
                    $lineColor = ($isCompleted && ($steps[$i+1]['status'] === 'completed' || $steps[$i+1]['status'] === 'active')) ? 'bg-green-400' : 'bg-slate-200';
                  @endphp
                  <div class="absolute left-5 top-10 bottom-0 w-0.5 {{ $lineColor }}"></div>
                @endif
                <div class="relative z-10 flex items-center justify-center rounded-full w-10 h-10 {{ $dotBg }} {{ $dotTxt }} shrink-0">
                  @if($isCompleted)
                    <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  @else
                    <span class="text-sm font-semibold">{{ $i + 1 }}</span>
                  @endif
                </div>
                <div class="text-sm font-semibold text-slate-700">{{ $s['label'] }}</div>
              </div>
            @endforeach
          </div>

          <!-- Desktop Timeline (Horizontal Row) -->
          <div class="hidden sm:flex items-center w-full">
            @foreach($steps as $i => $s)
              <div class="flex items-center flex-1 last:flex-none">
                <div class="flex flex-col items-center w-24 sm:w-32">
                  @php
                    $status = $s['status'];
                    $isCompleted = $status === 'completed';
                    $isActive = $status === 'active';
                    $isRejected = $status === 'rejected';
                    $dotBg = $isCompleted ? 'bg-green-500' : ($isActive ? 'bg-amber-400' : ($isRejected ? 'bg-red-500' : 'bg-slate-200'));
                    $dotTxt = $isCompleted ? 'text-white' : ($isActive ? 'text-white' : 'text-slate-600');
                  @endphp

                  <div class="flex items-center justify-center rounded-full w-10 h-10 {{ $dotBg }} {{ $dotTxt }} shrink-0">
                    @if($isCompleted)
                      <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @else
                      <span class="text-sm font-semibold">{{ $i + 1 }}</span>
                    @endif
                  </div>

                  <div class="mt-3 text-xs text-slate-600 text-center font-medium">{{ $s['label'] }}</div>
                </div>

                @if(!$loop->last)
                  <div class="flex-1 h-0.5 mx-3 rounded bg-slate-200">
                    @if($isCompleted && ($steps[$i+1]['status'] === 'completed' || $steps[$i+1]['status'] === 'active'))
                      <div class="h-0.5 rounded bg-green-400 w-full"></div>
                    @endif
                  </div>
                @endif
              </div>
            @endforeach
          </div>

          <div class="mt-4 text-sm text-slate-500">
            <div>Progres pendaftaran akan diperbarui oleh Staff LP3I karawang.</div>
          </div>
        </div>

        {{-- DETAILS + ACTIONS --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <div class="lg:col-span-2 bg-white rounded-xl border p-5 shadow-sm">
            <h3 class="text-sm font-semibold mb-3">Detail Pendaftar</h3>
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-slate-700">
              <div class="p-3 bg-slate-50 rounded"><dt class="text-xs text-slate-400">Nomor NIPD</dt><dd class="font-medium mt-1">{{ $calon?->nipd ?? '-' }}</dd></div>
              <div class="p-3 bg-slate-50 rounded"><dt class="text-xs text-slate-400">Nama</dt><dd class="font-medium mt-1">{{ $calon?->nama_mhs ?? (Auth::user()->name ?? '-') }}</dd></div>
              <div class="p-3 bg-slate-50 rounded"><dt class="text-xs text-slate-400">Bidang Keahlian</dt><dd class="font-medium mt-1">{{ \App\Helpers\JurusanHelper::getFormat($calon?->id_program_studi ?? ($calon?->id_program_study ?? null)) }}</dd></div>
              {{-- Payment method and created date removed per request --}}
            </dl>
          </div>

          <aside class="bg-white rounded-xl border p-5 shadow-sm">
            <h3 class="text-sm font-semibold mb-3">Aksi</h3>
            <div class="space-y-3">
              @if(($payment ?? 'unpaid') === 'unpaid')
                <a href="{{ route('pendaftar.payment.show') }}" class="block text-center w-full btn-basic text-white px-4 py-2 rounded-md font-semibold">Bayar Sekarang</a>
              @else
                <a href="{{ route('pendaftar.receipt') }}" class="block text-center w-full btn-basic text-white px-4 py-2 rounded-md font-semibold" target="_blank">Download Kuitansi</a>
              @endif
              <a href="{{ url('/') }}" class="block text-center w-full bg-slate-400 hover:bg-slate-500 text-white px-4 py-2 rounded-md font-semibold transition" style="display:flex; align-items:center; justify-content:center; gap:0.5rem;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h12a1 1 0 001-1v-10"/><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M9 21v-6a1 1 0 011-1h4a1 1 0 011 1v6"/></svg>
                Kembali ke Home
              </a>
            </div>
          </aside>
        </div>
      </main>
    </div>
  </div>
</body>
<script>
  document.addEventListener('DOMContentLoaded', function(){
    const t = document.getElementById('akunToggle');
    const m = document.getElementById('akunMenu');
    if (t && m) {
      t.addEventListener('click', function(){
        const isHidden = m.style.display === 'none' || m.style.display === '' ? true : (m.style.display === 'none');
        m.style.display = isHidden ? 'block' : 'none';
        const caret = document.getElementById('akunCaret'); if (caret) caret.classList.toggle('caret-rotated');
      });
    }
  });
</script>
</html>