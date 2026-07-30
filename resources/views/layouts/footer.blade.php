<footer class="lp3i-footer">
  <div class="lp3i-footer-main">
    <div class="lp3i-footer-col logo-col">
      <div class="footer-logo-wrap">
           <div class="footer-logo-images">
                 <img src="{{ asset('storage/image/LOGO_LP3I.png') }}" alt="LP3I Karawang">
                 <img src="{{ asset('storage/image/global.png') }}" alt="Global">
           </div>
           <div class="footer-logo-slogan">Kampus Vokasi Dengan Penempatan Kerja.</div>
       </div>
    </div>
    <div class="lp3i-footer-col nav-col">
      <div class="footer-title">Telusuri</div>
      <ul class="footer-nav-list">
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('sambutan') }}">Profil</a></li>
        <li><a href="{{ route('ais') }}">Akademik</a></li>
        <li><a href="{{ route('penempatan') }}">Pusat Karir</a></li>
      </ul>
    </div>
    <div class="lp3i-footer-col nav-col">
      <div class="footer-title">Layanan Digital</div>
      <ul class="footer-nav-list">
        <li><a href="https://student.lp3iglobal.ac.id">E | Student</a></li>
        <li><a href="https://academic.lp3iglobal.ac.id">E | Akademik</a></li>
        <li><a href="https://lecturer.lp3iglobal.ac.id">E | Lecture</a></li>
        <li><a href="{{ route('lecture') }}">E | Carrier Hub</a></li>
        <li class="footer-brosur-dropdown">
          <a href="javascript:void(0)" class="footer-brosur-toggle">E | Brosur <i class="fas fa-chevron-down"></i></a>
          <div class="footer-brosur-menu">
            <a href="{{ asset('storage/docs/Brosur Reguler 2026 V2.pdf') }}" download>Reguler</a>
            <a href="{{ asset('storage/docs/Brosur Karyawan 2026-2027 V2.pdf') }}" download>Karyawan</a>
          </div>
        </li>
      </ul>
    </div>
    <div class="lp3i-footer-col address-col">
      <div class="footer-title">Hubungi Kami</div>
      <div class="footer-contact-item">
        <i class="fas fa-phone-alt"></i> 
        <a href="https://api.whatsapp.com/send?phone=6285117704112" target="_blank" rel="noopener noreferrer">0851-1770-4112</a>
      </div>
      <div class="footer-contact-item">
        <i class="fas fa-envelope"></i> 
        <a href="mailto:college@lp3iglobal.com">college@lp3iglobal.com</a>
      </div>
      <div class="footer-contact-item">
        <i class="fab fa-instagram"></i> 
        <a href="https://www.instagram.com/lp3ikarawang" target="_blank">LP3I Karawang</a>
      </div>
      <div class="footer-contact-item">
        <i class="fab fa-tiktok"></i> 
        <a href="https://www.tiktok.com/@lp3i.karawang?is_from_webapp=1&sender_device=pc" target=" target="_blank">LP3I Karawang</a>
      </div>
      <div class="footer-contact-item">
        <i class="fas fa-map-marker-alt"></i>
        <a href="https://maps.app.goo.gl/8LyaWJEy1xjiVK1j8" target="_blank" rel="noopener" target="_blank" rel="noopener noreferrer">JL. Tarumanegara Blok B No.4-6, Kabupaten Karawang, Jawa Barat</a>
      </div>
    </div>
  </div>
  <div class="lp3i-footer-bottom">
    <div class="lp3i-footer-copyright">
      <span>&copy; {{ date('Y') }} LP3I College. All rights reserved.</span>
    </div>
  </div>
</footer>

<style>
.lp3i-footer {
  background: linear-gradient(135deg, #0b1528 0%, #1e293b 100%);
  color: #f1f5f9;
  font-family: 'Poppins', Arial, sans-serif;
  margin-top: 60px;
  padding-top: 20px;
  border-top: 4px solid #009da5;
  box-shadow: 0 -4px 20px rgba(0,0,0,0.15);
}

.lp3i-footer-main {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr 0.8fr 1.2fr;
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
  padding: 40px 1.5rem 24px 1.5rem;
  align-items: flex-start;
}

.lp3i-footer-col {
  margin-bottom: 24px;
}

/* Footer Logo and Slogan */
.footer-logo-wrap {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.footer-logo-images {
  display: flex;
  align-items: center;
  gap: 15px;
}

.footer-logo-images img {
  max-height: 48px;
  width: auto;
  object-fit: contain;
}

.footer-logo-slogan {
  font-size: 1.05rem;
  font-weight: 750;
  color: #ffd700;
  letter-spacing: 0.5px;
}

/* Section Title */
.footer-title {
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 20px;
  color: #38bdf8;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  position: relative;
  display: inline-block;
}

.footer-title::after {
  content: '';
  position: absolute;
  bottom: -6px;
  left: 0;
  width: 30px;
  height: 2px;
  background: #009da5;
}

/* Link Lists */
.footer-nav-list {
  list-style: none;
  padding-left: 0;
  margin: 0;
}

.footer-brosur-dropdown {
  position: relative;
  display: inline-block;
  z-index: 999;
}

.footer-brosur-toggle {
  color: #cbd5e1;
  text-decoration: none;
  font-size: 0.95rem;
  font-weight: 500;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 2px 0;
  cursor: pointer;
}

.footer-brosur-toggle:hover {
  color: #38bdf8;
}

.footer-brosur-dropdown.open > .footer-brosur-menu {
  display: block;
}

.footer-brosur-menu {
  display: none;
  position: absolute;
  left: 0;
  top: calc(100% + 8px);
  min-width: 220px;
  background: #111827;
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 10px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  padding: 8px 0;
  z-index: 10;
  white-space: normal;
  width: auto;
}

.footer-brosur-menu a {
  display: block;
  width: 100%;
  color: #cbd5e1;
  padding: 12px 16px;
  text-decoration: none;
  font-size: 0.95rem;
  font-weight: 600;
  border-bottom: 1px solid rgba(255,255,255,0.08);
  transition: background 0.2s ease, color 0.2s ease;
}

.footer-brosur-menu a:last-child {
  border-bottom: none;
}

.footer-brosur-menu a:hover {
  background: rgba(255,255,255,0.08);
}

.footer-nav-list li a {
  color: #cbd5e1;
  text-decoration: none;
  font-size: 0.95rem;
  font-weight: 500;
  display: inline-block;
  padding: 2px 0;
  transition: all 0.25s ease;
}

.footer-nav-list li a:hover {
  color: #38bdf8;
  transform: translateX(5px);
}

/* Contacts & Info */
.footer-contact-item {
  margin-bottom: 14px;
  font-size: 0.95rem;
  display: flex;
  align-items: center;
  gap: 12px;
  color: #cbd5e1;
}

.footer-contact-item i {
  color: #009da5;
  font-size: 1.1rem;
  width: 20px;
  text-align: center;
}

.footer-contact-item a {
  color: #cbd5e1;
  text-decoration: none;
  transition: color 0.25s ease;
}

.footer-contact-item a:hover {
  color: #38bdf8;
}

/* Copyright Bottom Bar */
.lp3i-footer-bottom {
  max-width: 1200px;
  margin: 0 auto;
  padding: 1.5rem 1.5rem 2rem 1.5rem;
  border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.lp3i-footer-copyright {
  text-align: center;
  font-size: 0.9rem;
  color: #94a3b8;
}

/* Responsive Styles */
@media (max-width: 1100px) {
  .lp3i-footer-main {
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
  }
}

@media (max-width: 600px) {
  .lp3i-footer-main {
    grid-template-columns: 1fr;
    gap: 25px;
    padding: 30px 1.25rem 15px 1.25rem;
  }
  .lp3i-footer-bottom {
    padding: 1rem 1.25rem 1.5rem 1.25rem;
  }
}
</style>
