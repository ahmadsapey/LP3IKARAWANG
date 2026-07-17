<style>
  /* Minimal header for pendaftar dashboard pages (logo + contact only) */
  header.pendaftar-header { 
    position: fixed; 
    top: 0; 
    left: 0; 
    right: 0; 
    z-index: 1200; 
    background: #004269; 
    color: #fff; 
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }
  body { padding-top: 82px; }

  .pendaftar-header .container { 
    max-width: 1400px; 
    margin: 0 auto; 
    padding: 12px 2rem; 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    gap: 1rem; 
  }
  .pendaftar-logo { display: flex; align-items: center; gap: 8px; }
  .pendaftar-logo img { max-height: 42px; width: auto; object-fit: contain; }

  .pendaftar-contact { display: flex; align-items: center; justify-content: flex-end; gap: 20px; }
  .pendaftar-contact-item { display: flex; align-items: center; }
  .pendaftar-contact-item a { text-decoration: none; color: inherit; display: flex; align-items: center; gap: 10px; }
  .pendaftar-contact-icon { width: 18px; height: 18px; flex: none; color: #00ffd5; }
  .pendaftar-contact-text strong { display: block; font-size: 0.85rem; margin-bottom: 1px; font-weight: 700; }
  .pendaftar-contact-text span { display: block; font-size: 0.72rem; opacity: 0.8; }

  @media (max-width: 768px) {
    body { padding-top: 72px; }
    .pendaftar-header .container { padding: 10px 1rem; }
    .pendaftar-logo img { max-height: 32px; }
    .pendaftar-contact { gap: 10px; }
    
    /* Make contact items look like premium circle buttons on mobile */
    .pendaftar-contact-item {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      width: 36px;
      height: 36px;
      border-radius: 50%;
      justify-content: center;
      align-items: center;
      transition: all 0.3s ease;
    }
    .pendaftar-contact-item:hover {
      background: rgba(255, 255, 255, 0.18);
      transform: scale(1.08);
    }
    .pendaftar-contact-item a {
      width: 100%;
      height: 100%;
      justify-content: center;
      align-items: center;
      gap: 0;
    }
    .pendaftar-contact-icon {
      width: 16px;
      height: 16px;
      color: #fff;
    }
    .pendaftar-contact-text {
      display: none; /* Hide texts on mobile */
    }
  }
</style>

<header class="pendaftar-header">
  <div class="container">
    <div class="pendaftar-logo">
      <img src="{{ asset('storage/image/LOGO_LP3I.png') }}" alt="LP3I Karawang">
      <img src="{{ asset('storage/image/global.png') }}" alt="Global">
    </div>

    <div class="pendaftar-contact">
      <div class="pendaftar-contact-item">
        <a href="tel:085117704112">
          <svg class="pendaftar-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.98.38 1.93.73 2.84a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.24-1.24a2 2 0 0 1 2.11-.45c.91.35 1.86.6 2.84.73A2 2 0 0 1 22 16.92z" />
          </svg>
          <div class="pendaftar-contact-text">
            <strong>0851-1770-4112</strong>
            <span>Hubungi WA Kami</span>
          </div>
        </a>
      </div>

      <div class="pendaftar-contact-item">
        <a href="mailto:karawang@lp3i.id">
          <svg class="pendaftar-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M4 6h16v12H4z" />
            <path d="m4 7 8 6 8-6" />
          </svg>
          <div class="pendaftar-contact-text">
            <strong>karawang@lp3i.id</strong>
            <span>Email Resmi</span>
          </div>
        </a>
      </div>

      <div class="pendaftar-contact-item">
        <a href="https://www.instagram.com/lp3ikarawang" target="_blank" rel="noopener">
          <svg class="pendaftar-contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="7" y="7" width="10" height="10" rx="3" />
            <path d="M16.5 7.5h.01" />
            <path d="M12 17a5 5 0 1 1 0-10 5 5 0 0 1 0 10z" />
          </svg>
          <div class="pendaftar-contact-text">
            <strong>LP3I Karawang</strong>
            <span>Follow Instagram</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</header>
