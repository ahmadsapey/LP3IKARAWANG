<style>
    /* CSS DASAR */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Poppins', sans-serif; line-height: 1.6; color: #333; }

    /* Fixed header at top */
    header { width: 100%; z-index: 1200; position: fixed; top: 0; left: 0; right: 0; }

    /* Body offset for fixed header */
    body { padding-top: 190px; transition: padding-top 0.25s ease; }
    body.header-compact-body { padding-top: 110px; }
    @media (max-width: 900px) {
        body { padding-top: 130px; }
        body.header-compact-body { padding-top: 70px; }
    }

    /* Layer 1: Top Bar */
    .topbar { background: #009da5; color: white; padding: 8px 0; font-size: 0.95rem; font-weight: 600; max-height: 80px; overflow: hidden; transition: all 0.25s ease; }
    .topbar .container { max-width: 1400px; margin: 0 auto; padding: 0 2rem; display:flex; justify-content:space-between; align-items:center; gap:1rem; }
    .topbar-left, .topbar-right { display:flex; align-items:center; gap:1rem; }
    .topbar a { color: white; text-decoration: none; display:inline-flex; align-items:center; gap:0.5rem; padding:4px 8px; border-radius:6px; transition: all 0.2s ease; }
    .topbar a:hover { background: rgba(255,255,255,0.15); }
    .topbar a i { font-size: 0.95rem; }
    @media (max-width: 900px) {
        .topbar { display: none; }
    }

    /* Layer 2: Mid Header (Logo & Contact) */
    .mid-header { background: #213C72; color: white; padding: 15px 0; max-height: 140px; overflow: hidden; transition: all 0.25s ease; }
    .mid-header .container { display: flex; justify-content: space-between; align-items: center; max-width: 1400px; margin: 0 auto; padding: 0 2rem; }
    .logo { display: flex; align-items: center; gap: 20px; }
    .logo img { max-height: 55px; width: auto; object-fit: contain; }
    .header-contact { display: flex; gap: 30px; }
    .contact-item { display: flex; align-items: center; gap: 10px; }
    .contact-item a { text-decoration: none; color: inherit; }
    .contact-item i { font-size: 1.9rem; color: #00a8e8; }
    .contact-text strong { display: block; font-size: 0.85rem; margin-bottom: 2px; }
    .contact-text span { font-size: 0.75rem; opacity: 0.85; display: block; }
    @media (max-width: 992px) {
        .header-contact { gap: 20px; }
        .contact-item i { font-size: 1.5rem; }
    }
    @media (max-width: 900px) {
        .header-contact { display: none; }
        .mid-header { padding: 10px 0; max-height: none; height: auto; }
        .mid-header .container { justify-content: center; }
        .logo { display: flex; align-items: center; justify-content: center; gap: 12px; }
        .logo img { max-height: 35px; }
    }

    /* Compact mode when scrolling: keep menu sticky, collapse top layers */
    header.header-compact .topbar,
    header.header-compact .mid-header {
        max-height: 0;
        padding-top: 0;
        padding-bottom: 0;
        opacity: 0;
        transform: translateY(-8px);
        pointer-events: none;
    }

    /* Layer 3: Nav Utama (Sticky saat scroll) */
    nav { 
        background: white; 
        border-bottom: 1px solid #eee; 
        position: relative; 
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        z-index: 1200;
    }
    nav.scrolled { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
    .nav-container { display: flex; justify-content: space-between; align-items: center; max-width: 1400px; margin: 0 auto; padding: 0 1.5rem; position: relative; }
    .nav-menu { display: flex; align-items: center; gap: 12px; }
    .nav-toggle { display: none; border: 0; background: transparent; padding: 10px; cursor: pointer; align-items: center; gap: 10px; }
    .nav-toggle .bar { display: block; width: 22px; height: 2px; background: #1e3c72; margin: 4px 0; border-radius: 2px; transition: transform 0.2s ease; }
    .nav-toggle-label { font-size: 0.9rem; font-weight: 700; color: #1e3c72; letter-spacing: 0.3px; }

    /* Nav Links */
    .nav-links { display: flex; list-style: none; align-items: center; }
    .nav-links a { 
        color: #333; 
        text-decoration: none; 
        padding: 1rem 1.2rem; 
        display: block; 
        font-size: 0.9rem; 
        font-weight: 600; 
        position: relative;
        transition: color 0.3s ease;
    }
    .nav-links a:hover { 
        color: #1e3c72; 
        background: transparent;
    }
    .nav-links a:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, #009da5, #1e3c72);
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }
    .nav-links a:hover:after {
        width: 70%;
    }

    /* Dropdown */
    .dropdown { position: relative; }
    .dropdown-content {
        position: absolute; top: 100%; left: 50%; transform: translateX(-50%);
        background: linear-gradient(135deg, #043158 0%, #1a5a6f 100%); 
        min-width: 240px; 
        display: none; 
        z-index: 1000;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        animation: dropdownSlide 0.3s ease;
    }
    @keyframes dropdownSlide {
        from { opacity: 0; transform: translateX(-50%) translateY(-10px); }
        to { opacity: 1; transform: translateX(-50%) translateY(0); }
    }
    .dropdown:hover .dropdown-content { display: block; }
    .dropdown-content a { 
        color: white !important; 
        font-size: 0.85rem; 
        padding: 12px 20px; 
        border-bottom: 1px solid rgba(255,255,255,0.08);
        transition: all 0.25s ease;
        display: block;
    }
    .dropdown-content a:last-child { border-bottom: none; }
    .dropdown-content a:hover { 
        background: rgba(255,255,255,0.1);
        padding-left: 24px;
    }
    .dropdown-content a.akademik-item { display: flex; gap: 12px; flex-direction: column; }
    .dropdown-content a.akademik-item .ak-prefix { color: #fff; font-weight: 700; font-size: 0.8rem; }
    .dropdown-content a.akademik-item .ak-prefix:first-child { color: #00d4ff; font-weight: 800; letter-spacing: 0.5px; }
    .dropdown-content a.akademik-item .ak-prefix:last-child { color: #b0e0e6; font-size: 0.75rem; font-weight: 500; }

    /* Auth Buttons */
    .nav-auth { display:flex; gap:10px; align-items:center; }
    .login-btn { 
        background: transparent !important; 
        color: #1e3c72 !important; 
        padding: 0.55rem 1rem !important;
        border-radius: 18px !important; 
        font-weight: 600 !important; 
        border: 1px solid #1e3c72 !important;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    .login-btn:hover { background: #f0f5ff !important; }
    .register-btn {
        background: #004269 !important; 
        color: white !important; 
        padding: 0.6rem 1.2rem !important;
        border-radius: 20px !important; 
        font-weight: 600 !important; 
        font-size: 0.9rem !important;
        text-decoration: none;
        animation: registerPulse 2s ease-in-out infinite;
    }
    @keyframes registerPulse {
        0%, 100% { box-shadow: 0 4px 15px rgba(0, 66, 105, 0.3); }
        50% { box-shadow: 0 6px 25px rgba(0, 66, 105, 0.6); }
    }

    .mobile-only-links { display: none; }
    .mobile-header-auth { display: none; }

    @media (max-width: 900px) {
        nav { border-top: 1px solid #e6e9ef; }
        .nav-container { min-height: 56px; }
        .nav-toggle { display: inline-flex; align-items: center; justify-content: center; }
        .nav-toggle { margin-left: auto; }
        .mobile-header-auth {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-right: auto;
        }
        .mobile-header-auth .login-btn {
            background: transparent !important;
            color: #1e3c72 !important;
            border: 1.5px solid #1e3c72 !important;
            padding: 0.4rem 0.8rem !important;
            border-radius: 18px !important;
            font-size: 0.8rem !important;
            font-weight: 700 !important;
            text-decoration: none;
            line-height: 1.2;
        }
        .mobile-header-auth .register-btn {
            background: #004269 !important;
            color: white !important;
            padding: 0.45rem 0.9rem !important;
            border-radius: 18px !important;
            font-size: 0.8rem !important;
            font-weight: 700 !important;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 66, 105, 0.2) !important;
            animation: none !important;
            line-height: 1.2;
        }
        .nav-menu { 
            display: none; 
            position: absolute; 
            top: 100%; 
            left: 0; 
            right: 0; 
            background: #ffffff; 
            border-bottom: 1px solid #eee; 
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.08);
            padding: 0.75rem 1rem 1.5rem;
            flex-direction: column;
            align-items: stretch;
            gap: 8px;
            z-index: 1200;
        }
        nav.nav-open .nav-menu { display: flex; }
        .nav-links { flex-direction: column; align-items: stretch; width: 100%; }
        .nav-links a { padding: 0.85rem 0.75rem; font-size: 0.9rem; border-radius: 8px; }
        .nav-links a:hover { background: #f4f7fb; }
        .nav-menu .nav-auth { display: none !important; }
        .login-btn, .register-btn { padding: 0.55rem 0.9rem !important; font-size: 0.85rem !important; }
        .dropdown-content { 
            position: static; 
            transform: none; 
            min-width: 0; 
            box-shadow: none; 
            background: #f6f8fb; 
            border-radius: 10px; 
            margin: 6px 0 0; 
        }
        .dropdown-content a { color: #1e3c72 !important; padding: 10px 14px; }
        .dropdown:hover .dropdown-content { display: none; }
        .dropdown.open > .dropdown-content { display: block; }

        /* Mobile-only portal and contacts */
        .mobile-only-links { display: block; margin-top: 15px; margin-bottom: 15px; }
        .nav-divider { border: 0; border-top: 1px solid rgba(0, 0, 0, 0.08); margin: 12px 0; }
        .menu-section-title { font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: #7f8c8d; letter-spacing: 0.5px; padding-left: 8px; margin-bottom: 8px; }
        
        .nav-links-mobile, .nav-links-mobile-contacts { list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 4px; margin-bottom: 0; }
        .nav-links-mobile a, .nav-links-mobile-contacts a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.75rem 0.75rem;
            color: #333;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .nav-links-mobile a:hover, .nav-links-mobile-contacts a:hover {
            background-color: #f4f7fb;
            color: #1e3c72;
        }
        .nav-links-mobile i, .nav-links-mobile-contacts i {
            width: 20px;
            font-size: 0.95rem;
            color: #009da5;
        }
    }
</style>

<header>
    <div class="topbar">
        <div class="container">
            <div class="topbar-left"><a href="<?php echo e(route('virtual')); ?>">Virtual</a></div>
            <div class="topbar-right">
                <a href="https://student.lp3iglobal.ac.id" target="_blank" rel="noopener noreferrer">E | Student</a>
                <a href="https://academic.lp3iglobal.ac.id" target="_blank" rel="noopener noreferrer">E | Akademik</a>
                <a href="https://lecturer.lp3iglobal.ac.id" target="_blank" rel="noopener noreferrer">E | Lecture</a>
                <a href="">E | Carrier Hub</a>
            </div>
        </div>
    </div>

    <div class="mid-header">
        <div class="container">
            <div class="logo">
                <img src="<?php echo e(asset('storage/image/LOGO_LP3I.png')); ?>" alt="LP3I Karawang">
                <img src="<?php echo e(asset('storage/image/global.png')); ?>" alt="Global">
            </div>
            <div class="header-contact">
                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <div class="contact-text">
                        <strong>0851-1770-4112</strong>
                        <span>Hubungi Wa Kami</span>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div class="contact-text">
                        <strong>karawang@lp3i.id</strong>
                        <span>Email Resmi</span>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fab fa-instagram"></i>
                    <a href="https://www.instagram.com/lp3ikarawang" target="_blank" class="contact-text" style="text-decoration: none; color: inherit;">
                        <strong>LP3I Karawang</strong>
                        <span>Follow Instagram</span>
                    </a>
                </div>
                <div class="contact-item">
                    <i class="fab fa-tiktok"></i>
                    <a href="https://linktr.ee/lp3i.karawang" target="_blank" class="contact-text" style="text-decoration: none; color: inherit;">
                        <strong>LP3I Karawang</strong>
                        <span>Follow TikTok</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <nav id="mainNav">
        <div class="nav-container">
            <!-- Mobile Auth Buttons (visible directly on mobile bar) -->
            <div class="mobile-header-auth">
                <a href="<?php echo e(route('pendaftar.login')); ?>" class="login-btn">Login</a>
                <a href="<?php echo e(route('mahasiswa.create')); ?>" class="register-btn"><i class="fas fa-user-plus"></i> Daftar</a>
            </div>

            <button class="nav-toggle" type="button" aria-label="Toggle menu" aria-expanded="false" aria-controls="primaryNav">
                <div class="hamburger-icon">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <span class="nav-toggle-label">Menu</span>
            </button>

            <div class="nav-menu">
                <ul class="nav-links" id="primaryNav">
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="dropdown">
                        <a href="<?php echo e(route('sambutan')); ?>">Profil</a>
                        <div class="dropdown-content">
                            <a href="<?php echo e(route('sambutan')); ?>">Sambutan</a>
                            <a href="<?php echo e(route('sejarah')); ?>">Sejarah & Visi Misi</a>
                            <a href="<?php echo e(route('struktur')); ?>">Struktur Organisasi</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo e(route('ais')); ?>">Akademik</a>
                        <div class="dropdown-content">
                            <a href="<?php echo e(route('ais')); ?>" class="akademik-item"><span class="ak-prefix">AIS</span><span class="ak-prefix">Accounting Information System</span></a>
                            <a href="<?php echo e(route('ase')); ?>" class="akademik-item"><span class="ak-prefix">ASE</span><span class="ak-prefix">Application Software Engineering</span></a>
                            <a href="<?php echo e(route('oaa')); ?>" class="akademik-item"><span class="ak-prefix">OAA</span><span class="ak-prefix">Office Administration</span></a>
                        </div>
                    </li>
                    <li><a href="<?php echo e(route('penempatan')); ?>">Pusat Karir</a></li>
                </ul>

                <!-- Mobile only portal and contacts -->
                <div class="mobile-only-links">
                    <hr class="nav-divider">
                    <div class="menu-section-title">Akses Portal</div>
                    <ul class="nav-links-mobile">
                        <li><a href="<?php echo e(route('virtual')); ?>"><i class="fas fa-desktop"></i> Virtual</a></li>
                        <li><a href="https://student.lp3iglobal.ac.id" target="_blank" rel="noopener noreferrer"><i class="fas fa-graduation-cap"></i> E | Student</a></li>
                        <li><a href="https://academic.lp3iglobal.ac.id" target="_blank" rel="noopener noreferrer"><i class="fas fa-book"></i> E | Akademik</a></li>
                        <li><a href="https://lecturer.lp3iglobal.ac.id" target="_blank" rel="noopener noreferrer"><i class="fas fa-chalkboard-teacher"></i> E | Lecture</a></li>
                        <li><a href=""><i class="fas fa-briefcase"></i> E | Carrier Hub</a></li>
                    </ul>
                    <hr class="nav-divider">
                    <div class="menu-section-title">Hubungi Kami</div>
                    <ul class="nav-links-mobile-contacts">
                        <li><a href="tel:0851-1770-4112"><i class="fas fa-phone-alt"></i> 0851-1770-4112</a></li>
                        <li><a href="mailto:college@lp3iglobal.com"><i class="fas fa-envelope"></i>college@lp3iglobal.com</a></li>
                        <li><a href="https://www.instagram.com/lp3i.karawang?igsh=MWxidG42NmpreWg1Ng==" target="_blank"><i class="fab fa-instagram"></i> LP3I Karawang</a></li>
                        <li><a href="https://www.tiktok.com/@lp3i.karawang?is_from_webapp=1&sender_device=pc" target="_blank"><i class="fab fa-tiktok"></i> TikTok LP3I Karawang</a></li>
                    </ul>
                </div>

                <div class="nav-auth">
                    <a href="<?php echo e(route('pendaftar.login')); ?>" class="login-btn">Login</a>
                    <a href="<?php echo e(route('mahasiswa.create')); ?>" class="register-btn"><i class="fas fa-user-plus"></i> Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
    (function () {
        const nav = document.getElementById('mainNav');
        if (!nav) return;

        const toggle = nav.querySelector('.nav-toggle');
        const dropdownLinks = nav.querySelectorAll('.dropdown > a');

        const isMobile = () => window.matchMedia('(max-width: 900px)').matches;

        if (toggle) {
            toggle.addEventListener('click', () => {
                const isOpen = nav.classList.toggle('nav-open');
                toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            });
        }

        dropdownLinks.forEach((link) => {
            link.addEventListener('click', (event) => {
                if (!isMobile()) return;
                const parent = link.closest('.dropdown');
                if (!parent) return;
                if (!parent.classList.contains('open')) {
                    event.preventDefault();
                    nav.querySelectorAll('.dropdown.open').forEach((item) => item.classList.remove('open'));
                    parent.classList.add('open');
                }
            });
        });

        window.addEventListener('resize', () => {
            if (!isMobile()) {
                nav.classList.remove('nav-open');
                if (toggle) toggle.setAttribute('aria-expanded', 'false');
                nav.querySelectorAll('.dropdown.open').forEach((item) => item.classList.remove('open'));
            }
        });

        const headerEl = document.querySelector('header');
        const onScroll = () => {
            const compact = window.scrollY > 80;
            if (headerEl) headerEl.classList.toggle('header-compact', compact);
            document.body.classList.toggle('header-compact-body', compact);
            nav.classList.toggle('scrolled', compact);
        };
        onScroll();
        window.addEventListener('scroll', onScroll);
    })();
</script>
<?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/partials/header.blade.php ENDPATH**/ ?>