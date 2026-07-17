<aside class="bg-white rounded-xl border p-5 shadow-sm lg:sticky lg:top-24 w-full">
  <!-- Profile Summary -->
  <div class="flex items-center gap-3 mb-5 border-b pb-4">
    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-[#004269] shrink-0 border">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M12 11c2.761 0 5-2.239 5-5S14.761 1 12 1 7 3.239 7 6s2.239 5 5 5zM3 21a9 9 0 0118 0"/></svg>
    </div>
    <div class="overflow-hidden">
      <div class="text-[11px] text-slate-400 uppercase font-bold tracking-wider">Halo</div>
      <div class="font-bold text-slate-700 truncate">{{ Auth::user()->name ?? 'Pendaftar' }}</div>
    </div>
  </div>

  <!-- Navigation Links -->
  <nav class="space-y-1.5 text-sm">
    <!-- Dashboard Link -->
    @php
      $isDashboard = request()->routeIs('pendaftar.dashboard');
      $dashboardClass = $isDashboard 
        ? 'bg-slate-100 text-[#004269] font-bold border-l-4 border-[#40826D] pl-2' 
        : 'text-slate-600 hover:bg-slate-50 pl-3';
    @endphp
    <a class="flex items-center gap-3 py-2 rounded transition-all {{ $dashboardClass }}" href="{{ route('pendaftar.dashboard') }}">
      <svg class="w-4 h-4 {{ $isDashboard ? 'text-[#004269]' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
      <span>Dashboard</span>
    </a>

    <!-- Biodata Link -->
    @php
      $isBiodata = request()->routeIs('pendaftar.biodata.*') || request()->is('pendaftar/biodata*');
      $biodataClass = $isBiodata 
        ? 'bg-slate-100 text-[#004269] font-bold border-l-4 border-[#40826D] pl-2' 
        : 'text-slate-600 hover:bg-slate-50 pl-3';
    @endphp
    <a class="flex items-center gap-3 py-2 rounded transition-all {{ $biodataClass }}" href="{{ route('pendaftar.biodata.show') }}">
      <svg class="w-4 h-4 {{ $isBiodata ? 'text-[#004269]' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
      <span>Biodata</span>
    </a>

    <!-- Akun Saya Dropdown -->
    @php
      $isAccount = request()->routeIs('pendaftar.akun.*') || request()->is('pendaftar/akun*');
    @endphp
    <details class="group details-acc" {{ $isAccount ? 'open' : '' }}>
      <summary class="flex items-center gap-3 px-3 py-2 rounded hover:bg-slate-50 cursor-pointer text-slate-600">
        <svg class="w-4 h-4 text-[#004269] icon-acc" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="M16 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM4 20c0-2.761 3.582-5 8-5s8 2.239 8 5v1H4v-1z"/></svg>
        <span class="font-medium {{ $isAccount ? 'text-[#004269] font-bold' : '' }}">Akun Saya</span>
        <svg class="w-3.5 h-3.5 ml-auto text-slate-400 caret-acc transition-transform group-open:rotate-180" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
      </summary>
      
      <div class="pl-7 mt-1.5 space-y-1 border-l-2 border-slate-100 ml-4">
        @php
          $isEmail = request()->routeIs('pendaftar.akun.email') || request()->is('pendaftar/akun/email*');
          $isPassword = request()->routeIs('pendaftar.akun.password') || request()->is('pendaftar/akun/password*');
          $isPhone = request()->routeIs('pendaftar.akun.phone') || request()->is('pendaftar/akun/phone*');
          $isWhatsapp = request()->routeIs('pendaftar.akun.whatsapp') || request()->is('pendaftar/akun/whatsapp*');
        @endphp
        <a href="{{ route('pendaftar.akun.email') }}" class="block py-1.5 rounded transition-all {{ $isEmail ? 'text-[#004269] font-bold' : 'text-slate-500 hover:text-slate-800' }}">Email</a>
        <a href="{{ route('pendaftar.akun.password') }}" class="block py-1.5 rounded transition-all {{ $isPassword ? 'text-[#004269] font-bold' : 'text-slate-500 hover:text-slate-800' }}">Password</a>
        <a href="{{ route('pendaftar.akun.phone') }}" class="block py-1.5 rounded transition-all {{ $isPhone ? 'text-[#004269] font-bold' : 'text-slate-500 hover:text-slate-800' }}">No. Handphone</a>
        <a href="{{ route('pendaftar.akun.whatsapp') }}" class="block py-1.5 rounded transition-all {{ $isWhatsapp ? 'text-[#004269] font-bold' : 'text-slate-500 hover:text-slate-800' }}">No. WhatsApp</a>
      </div>
    </details>
  </nav>
</aside>
