<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Pembayaran Pendaftaran</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --basic: #004269;
      --adv: #009DA5;
      --muted: #64748b;
      --bg-body: #f8fafc;
    }

    * { box-sizing: border-box; }

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 2rem 1rem;
      background: linear-gradient(180deg, var(--basic) 0%, #f8fafc 400px);
      color: #1e293b;
      min-height: 100vh;
    }

    .container {
      max-width: 700px; /* Lebih ramping agar fokus di tengah */
      margin: 0 auto;
      margin-top: 100px; /* Menyesuaikan space untuk header */
    }

    /* Header Page */
    .heading {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      color: #fff;
    }
    .heading h2 { margin: 0; font-size: 1.5rem; font-weight: 700; letter-spacing: -0.5px; }
    .heading .subtitle { opacity: 0.9; font-size: 0.9rem; }

    /* Card Styling */
    .card {
      background: #fff;
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
      border: 1px solid rgba(255, 255, 255, 0.5);
    }

    /* Info Badge Area */
    .info-summary {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #f1f5f9;
      padding: 1rem 1.5rem;
      border-radius: 12px;
      margin-bottom: 1.5rem;
    }
    .info-label { font-size: 0.85rem; color: var(--muted); font-weight: 500; }
    .info-value { font-size: 1.1rem; font-weight: 700; color: var(--basic); }

    /* Bank Box Area */
    .bank-card {
      background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
      border: 2px solid #e2e8f0;
      border-radius: 16px;
      padding: 1.5rem;
      margin-bottom: 2rem;
      position: relative;
      overflow: hidden;
    }
    .bank-card::after {
      content: 'BNI';
      position: absolute;
      right: -10px;
      bottom: -10px;
      font-size: 4rem;
      font-weight: 900;
      color: rgba(0, 66, 105, 0.03);
    }
    .bank-name { color: #f97316; font-weight: 800; font-size: 1.2rem; margin-bottom: 0.5rem; }
    .bank-detail { font-size: 0.95rem; color: #475569; margin: 4px 0; }
    .copy-hint { font-size: 0.75rem; color: var(--adv); margin-top: 8px; font-weight: 600; }

    /* Form Styling */
    .form-group { margin-bottom: 1.2rem; }
    .form-label {
      display: block;
      font-size: 0.85rem;
      font-weight: 600;
      color: #334155;
      margin-bottom: 6px;
    }
    .form-input {
      width: 100%;
      padding: 12px 16px;
      border-radius: 10px;
      border: 1px solid #cbd5e1;
      font-family: inherit;
      font-size: 0.95rem;
      transition: all 0.2s;
      background: #fff;
    }
    .form-input:focus {
      outline: none;
      border-color: var(--adv);
      box-shadow: 0 0 0 3px rgba(0, 157, 165, 0.1);
    }
    .readonly-box {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      color: #64748b;
    }

    /* File Upload Styling */
    .file-input-wrapper {
      border: 2px dashed #cbd5e1;
      padding: 1rem;
      border-radius: 12px;
      text-align: center;
      cursor: pointer;
      transition: background 0.2s;
    }
    .file-input-wrapper:hover { background: #f8fafc; border-color: var(--adv); }

    /* Buttons */
    .btn-group { display: flex; gap: 1rem; margin-top: 2rem; }
    .btn-primary {
      flex: 2;
      background: var(--basic);
      color: #fff;
      border: none;
      padding: 14px;
      border-radius: 12px;
      font-weight: 700;
      cursor: pointer;
      transition: transform 0.2s, background 0.2s;
      font-family: inherit;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .btn-primary:hover { background: #003352; transform: translateY(-2px); }
    
    .btn-outline {
      flex: 1;
      background: #fff;
      border: 1px solid #cbd5e1;
      color: #64748b;
      padding: 14px;
      border-radius: 12px;
      font-weight: 600;
      text-align: center;
      text-decoration: none;
      font-size: 0.9rem;
      transition: all 0.2s;
    }
    .btn-outline:hover { background: #f1f5f9; color: #1e293b; }

    .back-link { color: #fff; text-decoration: none; font-size: 0.9rem; font-weight: 500; }
    .back-link:hover { text-decoration: underline; }

    #uploadMessage { margin-bottom: 1rem; padding: 1rem; border-radius: 10px; font-size: 0.9rem; font-weight: 500; }

    @media (max-width: 600px) {
      .heading { flex-direction: column; text-align: center; gap: 1rem; }
      .card { padding: 1.5rem; }
      .btn-group { flex-direction: column; }
    }
  </style>
</head>
<body>

  @include('partials.header_pendaftar')
  
  <div class="container">
    <div class="heading">
      <div>
        <h2>Konfirmasi Pembayaran</h2>
        <div class="subtitle">Halo, <strong>{{ $calon->nama_mhs }}</strong></div>
      </div>
      <a class="back-link" href="{{ route('pendaftar.dashboard') }}">← Kembali ke Dashboard</a>
    </div>

    <div class="card">
      <div class="info-summary">
        <span class="info-label">Total Tagihan</span>
        <span class="info-value">Rp {{ number_format($calon->payment_amount ?? 350000,0,',','.') }}</span>
      </div>

      <div class="bank-card">
        <div class="bank-name">BANK BNI</div>
        <div class="bank-detail">No. Rekening: <strong style="color:var(--basic)">5051 2000 05</strong></div>
        <div class="bank-detail">Atas Nama: <strong>LP3I Karawang</strong></div>
        <div class="copy-hint">*Transfer tepat sesuai nominal hingga digit terakhir</div>
      </div>

      @php
        $now = \Carbon\Carbon::now();
        $expired = false;
        if (!empty($expiresAt) && $now->greaterThan($expiresAt)) $expired = true;
      @endphp

      @if($expired)
        <div style="padding:1rem; border-radius:12px; background:#fef2f2; color:#991b1b; border: 1px solid #fecaca; text-align:center;">
          <strong>Masa pembayaran telah berakhir.</strong><br>Silakan hubungi admin untuk bantuan lebih lanjut.
        </div>
      @else
        <div id="uploadMessage" style="display:none;"></div>
        
        <form id="uploadForm" method="POST" action="{{ route('pendaftar.payment.upload') }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="method" value="BNI">
          <input type="hidden" name="transfer_date" value="{{ \Carbon\Carbon::now()->toDateString() }}">
          
          <div class="form-group">
            <label class="form-label">Nama Pengirim (Sesuai Rekening)</label>
            <input type="text" name="account_name" required class="form-input" placeholder="Contoh: Ahmad Subarjo" value="{{ old('account_name') }}">
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
             <div class="form-group">
                <label class="form-label">Bank Asal</label>
                <input type="text" name="bank_origin" required class="form-input" placeholder="BCA / Mandiri / BRI" value="{{ old('bank_origin') }}">
              </div>
              <div class="form-group">
                <label class="form-label">Tanggal Transfer</label>
                <div id="transferDateDisplay" class="form-input readonly-box">{{ \Carbon\Carbon::now()->format('d M Y') }}</div>
              </div>
          </div>

          <div class="form-group" style="display:none;">
             <label class="form-label">Nama Pendaftar</label>
             <input type="text" name="sender_name" required class="form-input" value="{{ old('sender_name', $calon->nama_mhs) }}" />
          </div>

          <div class="form-group">
            <label class="form-label">Unggah Bukti Transfer</label>
            <div class="file-input-wrapper">
                <input type="file" name="proof_file" accept="image/*" required style="width: 100%; font-size: 0.8rem; cursor: pointer;">
                <div style="font-size: 0.7rem; color: var(--muted); margin-top: 5px;">Format: JPG, PNG (Maks 2MB)</div>
            </div>
          </div>

          <div class="btn-group">
            <button id="uploadBtn" class="btn-primary" type="button">Konfirmasi Sekarang</button>
            <a class="btn-outline" href="{{ route('pendaftar.dashboard') }}">Batal</a>
          </div>
        </form>
      @endif
    </div>
  </div>

  <div id="successModal" style="display:none;position:fixed;inset:0;align-items:center;justify-content:center;z-index:9999;background:rgba(15, 23, 42, 0.8); backdrop-filter: blur(4px);">
    <div style="max-width:400px; width:90%; background:#fff; border-radius:24px; padding:2.5rem; text-align:center; box-shadow:0 25px 50px -12px rgba(0,0,0,0.25);">
      <div style="width:60px; height:60px; background:#dcfce7; color:#16a34a; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 1.5rem; font-size:1.5rem;">✓</div>
      <h3 style="margin:0 0 0.5rem; color:#1e293b;">Berhasil Diunggah!</h3>
      <p style="margin:0; color:#64748b; font-size:0.9rem; line-height:1.5;">Bukti pembayaran Anda telah kami terima. Mohon tunggu proses verifikasi.</p>
    </div>
  </div>

  <script>
    (function(){
      const form = document.getElementById('uploadForm');
      const btn = document.getElementById('uploadBtn');
      if (!form || !btn) return;

      const calonName = {!! json_encode($calon->nama_mhs ?? '') !!};
      const amount = {!! json_encode($calon->payment_amount ?? 350000) !!};

      btn.addEventListener('click', async function(){
        const sender = form.querySelector('[name=sender_name]').value.trim();
        const bank = form.querySelector('[name=bank_origin]').value.trim();
        const account = form.querySelector('[name=account_name]').value.trim();
        const transferDate = form.querySelector('[name=transfer_date]').value;
        const fileInput = form.querySelector('[name=proof_file]');

        if (!bank || !account || !fileInput.files.length) {
          showMessage('Mohon lengkapi semua data dan lampirkan bukti transfer.', 'error');
          return;
        }

        const displayDate = document.getElementById('transferDateDisplay').innerText;
        const message = `Halo Admin LP3I Karawang.%0A%0ASaya mengunggah bukti pembayaran pendaftaran.%0A%0ANama Pendaftar: ${sender}%0ABank Asal: ${bank}%0ANama Pemilik Rekening: ${account}%0ATanggal Transfer: ${displayDate}%0ANominal: Rp ${new Intl.NumberFormat('id-ID').format(amount)}%0A%0AMohon segera diverifikasi. Terima kasih.`;

        window.open(`https://wa.me/6285891602476?text=${message}`, '_blank');

        btn.disabled = true;
        btn.innerText = 'Sedang Mengirim...';

        try {
          const fd = new FormData(form);
          const res = await fetch(form.action, {
            method: 'POST',
            body: fd,
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
          });

          if (res.ok) {
            const data = await res.json().catch(()=>null);
            const redirect = data && data.redirect ? data.redirect : '{{ route("pendaftar.dashboard") }}';
            showSuccessModal(() => { window.location.href = redirect; });
          } else {
            const err = await res.json().catch(()=>null);
            showMessage(err?.errors ? Object.values(err.errors).flat().join('\n') : 'Gagal mengunggah bukti.', 'error');
            btn.disabled = false;
            btn.innerText = 'Konfirmasi Sekarang';
          }
        } catch (err) {
          showMessage('Gangguan koneksi, silakan coba lagi.', 'error');
          btn.disabled = false;
          btn.innerText = 'Konfirmasi Sekarang';
        }
      });

      function showMessage(text, type='info'){
        const el = document.getElementById('uploadMessage');
        el.style.display = 'block';
        el.style.background = type === 'error' ? '#fef2f2' : '#f0f9ff';
        el.style.color = type === 'error' ? '#991b1b' : '#075985';
        el.style.border = `1px solid ${type === 'error' ? '#fecaca' : '#bae6fd'}`;
        el.innerText = text;
      }

      function showSuccessModal(cb){
        const m = document.getElementById('successModal');
        m.style.display = 'flex';
        setTimeout(() => { m.style.display = 'none'; cb && cb(); }, 2000);
      }
    })();
  </script>
</body>
</html>