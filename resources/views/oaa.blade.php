<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>D3 Office Administration Automatization</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --brand-dark: #004269;
            --brand-accent: #0b7280;
            --brand-light: #e0f2f1;
            --text-main: #334155;
            --text-muted: #64748b;
            --bg-color: #f8fafc;
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.45);
            --card-shadow: 0 10px 30px rgba(0, 66, 105, 0.05);
            --card-shadow-hover: 0 20px 45px rgba(0, 66, 105, 0.12);
            --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body { 
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif; 
            background: var(--bg-color); 
            color: var(--text-main);
            line-height: 1.7;
            overflow-x: hidden;
        }

        /* Floating background glow elements */
        .bg-glow-container {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .glow-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.12;
            animation: floatBlob 25s infinite alternate ease-in-out;
            pointer-events: none;
        }

        .glow-blob-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, var(--brand-accent) 0%, var(--brand-dark) 70%, transparent 100%);
            top: 10%;
            left: -150px;
        }

        .glow-blob-2 {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, var(--brand-light) 0%, var(--brand-accent) 70%, transparent 100%);
            top: 50%;
            right: -200px;
            animation-delay: -7s;
        }

        @keyframes floatBlob {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(50px, -30px) scale(1.1); }
            100% { transform: translate(-30px, 40px) scale(0.9); }
        }

        .wrap { 
            max-width: 1240px; 
            margin: 0 auto; 
            padding: 3rem 1.5rem; 
            position: relative;
            z-index: 5;
        }

        /* Header / Hero Section */
        .hero-section {
            text-align: center;
            margin-bottom: 4rem;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(240, 253, 250, 0.9) 100%);
            backdrop-filter: blur(12px);
            padding: 4rem 2rem;
            border-radius: 24px;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(11, 114, 128, 0.15);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--brand-dark) 0%, var(--brand-accent) 100%);
        }

        .hero-section h1 {
            color: var(--brand-dark);
            font-size: 2.8rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 1.25rem;
            line-height: 1.2;
        }

        .badges {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .badge {
            background: linear-gradient(135deg, rgba(14, 180, 192, 0.1) 0%, rgba(11, 114, 128, 0.1) 100%);
            border: 1px solid rgba(11, 114, 128, 0.2);
            color: var(--brand-accent);
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            box-shadow: 0 4px 10px rgba(0, 66, 105, 0.02);
        }

        .profil-text {
            font-size: 1.15rem;
            color: var(--text-muted);
            max-width: 850px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* Grid Layouts */
        .grid-2 { 
            display: grid; 
            grid-template-columns: 1.1fr 0.9fr; 
            gap: 2.5rem; 
            margin-bottom: 4rem; 
        }
        .grid-3 { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 2rem; 
            margin-bottom: 4rem; 
        }

        /* Card Style */
        .card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.55);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--card-shadow);
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
            will-change: transform, opacity;
        }

        .card:hover {
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(11, 114, 128, 0.15);
        }

        h2 { 
            color: var(--brand-dark); 
            font-size: 1.6rem; 
            font-weight: 800;
            margin-bottom: 1.5rem; 
            display: flex; 
            align-items: center; 
            gap: 0.8rem; 
            letter-spacing: -0.3px;
        }

        h2 i { 
            color: var(--brand-accent); 
        }

        h3 { 
            color: var(--brand-accent); 
            font-size: 1.2rem; 
            font-weight: 750;
            margin-bottom: 1.25rem; 
            border-bottom: 2px solid rgba(11, 114, 128, 0.08);
            padding-bottom: 0.5rem;
        }

        /* Custom Lists */
        ul { list-style: none; }
        .custom-list li {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 0.95rem;
            color: var(--text-main);
            font-size: 0.98rem;
        }
        .custom-list li::before {
            content: '\f058'; /* Check-circle FontAwesome */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 3px;
            color: var(--brand-accent);
            font-size: 1.1rem;
        }

        /* Career Tags */
        .career-tags { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 0.9rem; 
        }
        .career-tag {
            background: linear-gradient(135deg, var(--brand-dark) 0%, var(--brand-accent) 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-size: 0.92rem;
            font-weight: 600;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: default;
            box-shadow: 0 4px 10px rgba(0, 66, 105, 0.1);
            will-change: transform;
        }
        .career-tag:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(11, 114, 128, 0.35);
        }

        /* Images & Figure */
        figure { 
            margin: 0; 
            overflow: hidden; 
            border-radius: 24px; 
            position: relative; 
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(2, 6, 23, 0.05);
            will-change: transform;
        }
        figure img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 24px;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            display: block;
        }
        figure:hover img { 
            transform: scale(1.08); 
        }
        figcaption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 42, 69, 0.9) 0%, rgba(0, 42, 69, 0.4) 60%, transparent 100%);
            color: white;
            padding: 2.5rem 2rem 1.5rem;
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Responsive Styles & Mobile Optimization */
        @media (max-width: 900px) {
            .wrap {
                padding-left: 2rem !important;
                padding-right: 2rem !important;
                padding-top: 2rem;
                padding-bottom: 2rem;
            }
            .hero-section {
                padding: 3rem 1.5rem;
                margin-bottom: 2.5rem;
            }
            .hero-section h1 {
                font-size: 2.2rem;
            }
            .profil-text {
                font-size: 1.05rem;
            }
            .grid-2 {
                grid-template-columns: 1fr;
                gap: 1.75rem;
                margin-bottom: 2.5rem;
            }
            .grid-3 {
                gap: 1.5rem;
                margin-bottom: 2.5rem;
            }
            .card {
                padding: 1.75rem;
            }
            figure {
                min-height: 240px;
            }
            .cpl-grid figure {
                grid-column: auto !important; /* Reset grid span on mobile */
            }
        }

        @media (max-width: 600px) {
            .hero-section {
                padding: 2.5rem 1.25rem;
                border-radius: 20px;
            }
            .hero-section h1 {
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }
            .badges {
                gap: 0.6rem;
                margin-bottom: 1.5rem;
            }
            .badge {
                padding: 0.5rem 1.1rem;
                font-size: 0.82rem;
            }
            .profil-text {
                font-size: 0.95rem;
            }
            h2 {
                font-size: 1.35rem;
                margin-bottom: 1.25rem;
            }
            h3 {
                font-size: 1.1rem;
                margin-bottom: 1rem;
            }
            .card {
                padding: 1.5rem;
                border-radius: 20px;
            }
            .custom-list li {
                font-size: 0.92rem;
                margin-bottom: 0.8rem;
            }
            .career-tags {
                display: flex;
                flex-wrap: wrap;
                gap: 0.6rem;
            }
            .career-tag {
                flex: 1 1 calc(50% - 0.3rem);
                text-align: center;
                padding: 0.75rem 1rem;
                font-size: 0.85rem;
                border-radius: 12px;
            }
            figure {
                border-radius: 20px;
            }
            figcaption {
                padding: 1.5rem 1.25rem 1.25rem;
                font-size: 0.85rem;
            }
            .career-section-grid {
                grid-template-columns: 1fr;
                gap: 1.75rem;
                margin-bottom: 2.5rem;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <!-- Ambient Glow Background Blobs -->
    <div class="bg-glow-container">
        <div class="glow-blob glow-blob-1"></div>
        <div class="glow-blob glow-blob-2"></div>
    </div>

    <div class="wrap">
        
        <!-- Hero Section -->
        <div class="hero-section">
            <h1 class="animate-hero">Office Administration Automatization</h1>
            <div class="badges animate-hero">
                <span class="badge"><i class="fas fa-desktop"></i> Digital Marketing</span>
                <span class="badge"><i class="fas fa-file-invoice"></i> Marketing Administration</span>
            </div>
            <p class="profil-text animate-hero">
                Menjadi tenaga Madya Profesional yang memiliki kemampuan di bidang manajemen pemasaran serta mampu menerapkan ilmu pemasaran produk baik barang maupun jasa serta mewujudkan lulusan pemasaran digital yang unggul dan berdaya saing pada tahun 2031.
            </p>
        </div>

        <!-- Kompetensi Section -->
        <div class="grid-2 competence-grid">
            <div class="card">
                <h2><i class="fas fa-award"></i> Kompetensi Utama</h2>
                <ul class="custom-list">
                    <li>Mampu melakukan kegiatan menjual (selling skills) melalui proses menjual yang benar.</li>
                    <li>Mampu melakukan pelayanan pelanggan (customer service) dengan konsep pelayanan prima.</li>
                    <li>Mampu melakukan komunikasi bisnis dengan para stakeholder.</li>
                    <li>Mampu melakukan promosi, periklanan, dan riset pemasaran.</li>
                    <li>Mampu menerapkan pemasaran online dan penggunaan aplikasi digital untuk pemasaran.</li>
                </ul>
            </div>
            <figure>
                <img src="{{ asset('storage/image/OAA.jpg') }}" alt="Program OAA" onerror="this.onerror=null;this.src='{{ asset('storage/image/OAA.png') }}'">
                <figcaption>Suasana perkuliahan dan praktik administrasi perkantoran.</figcaption>
            </figure>
        </div>

        <!-- CPL Section -->
        <div class="cpl-section">
            <h2 class="cpl-title" style="justify-content: center; margin-bottom: 2rem;"><i class="fas fa-graduation-cap"></i> Capaian Pembelajaran Lulusan (CPL)</h2>
            
            <div class="grid-3 cpl-grid">
                <div class="card">
                    <h3>A. Aspek Sikap</h3>
                    <ul class="custom-list">
                        <li>Bertaqwa kepada Tuhan YME & sikap religius.</li>
                        <li>Menjunjung tinggi etika dan moral.</li>
                        <li>Berkontribusi dalam peningkatan mutu kehidupan.</li>
                    </ul>
                </div>
                <div class="card">
                    <h3>B. Keterampilan Umum</h3>
                    <ul class="custom-list">
                        <li>Kinerja optimal & menyusun laporan.</li>
                        <li>Bekerja di bawah tekanan & kerja sama tim.</li>
                        <li>Supervisi & pengembangan kompetensi.</li>
                    </ul>
                </div>
                <div class="card">
                    <h3>C. Pengetahuan Umum</h3>
                    <ul class="custom-list">
                        <li>Konsep dasar Ilmu Ekonomi & Pemasaran.</li>
                        <li>Prinsip selling, PR, e-commerce.</li>
                        <li>Manajemen ritel & perilaku konsumen.</li>
                    </ul>
                </div>
                <div class="card">
                    <h3>D. Keterampilan Khusus</h3>
                    <ul class="custom-list">
                        <li>Pemasaran online & riset berbasis data.</li>
                        <li>Berwirausaha & aplikasi pemasaran digital.</li>
                        <li>Perencanaan anggaran & komunikasi lintas budaya.</li>
                    </ul>
                </div>
                <figure style="grid-column: auto / span 2;">
                    <img src="{{ asset('storage/image/OAA2.jpg') }}" alt="Kegiatan akademik OAA" onerror="this.onerror=null;this.src='{{ asset('storage/image/OAA.png') }}'">
                    <figcaption>Kolaborasi mahasiswa dalam proyek administrasi modern.</figcaption>
                </figure>
            </div>
        </div>

        <!-- Prospek Karir Section -->
        <div class="grid-2 career-section-grid" style="margin-bottom: 4rem;">
            <div class="card">
                <h2><i class="fas fa-user-tie"></i> Prospek Karir / Posisi Jabatan</h2>
                <div class="career-tags">
                    <span class="career-tag">Marketing Officer</span>
                    <span class="career-tag">Marketing Analyst</span>
                    <span class="career-tag">Social Media Marketing</span>
                    <span class="career-tag">Entrepreneur</span>
                    <span class="career-tag">Supervisi Retail</span>
                    <span class="career-tag">Retail Consultant</span>
                    <span class="career-tag">Admin Marketing</span>
                    <span class="career-tag">Graphic Designer</span>
                    <span class="career-tag">Photographer & Video Editor</span>
                </div>
            </div>
            <figure>
                <img src="{{ asset('storage/image/OAA3.jpg') }}" alt="Aktivitas mahasiswa OAA" onerror="this.onerror=null;this.src='{{ asset('storage/image/OAA.png') }}'">
                <figcaption>Praktik komunikasi bisnis dan otomasi layanan.</figcaption>
            </figure>
        </div>

        <!-- Visi Misi Section -->
        <div class="grid-3 vmt-grid">
            <div class="card" style="background: var(--brand-dark); color: white;">
                <h2 style="color: white;"><i class="fas fa-eye" style="color: var(--brand-light);"></i> Visi</h2>
                <p style="color: #e2e8f0;">Pada tahun 2031 di tingkat Nasional menjadi program studi vokasi Manajemen Pemasaran yang unggul dan kompeten dalam bidang Pemasaran Digital.</p>
            </div>
            <div class="card">
                <h2><i class="fas fa-rocket"></i> Misi</h2>
                <ul class="custom-list">
                    <li>Pendidikan vokasi & <em>link-and-match</em> industri.</li>
                    <li>Menciptakan SDM profesional Digital Marketing.</li>
                    <li>Penelitian terapan & pengabdian masyarakat.</li>
                    <li>Pendidikan berbasis teknologi informasi.</li>
                </ul>
            </div>
            <div class="card">
                <h2><i class="fas fa-flag-checkered"></i> Tujuan</h2>
                <ul class="custom-list">
                    <li>Kurikulum berbasis industri.</li>
                    <li>Lulusan madya pemasaran berbasis TI.</li>
                    <li>Sertifikasi & magang industri.</li>
                    <li>Komunikasi dinamis dengan dunia kerja.</li>
                </ul>
            </div>
        </div>

    </div>

    @include('layouts.footer')

    <!-- GSAP CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            gsap.registerPlugin(ScrollTrigger);

            // 1. Hero entrance
            gsap.from('.hero-section > *', {
                y: 30,
                opacity: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power3.out'
            });

            // 2. Competence grid
            gsap.from('.competence-grid > *', {
                scrollTrigger: {
                    trigger: '.competence-grid',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 40,
                opacity: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power2.out'
            });

            // 3. CPL Section
            gsap.from('.cpl-title', {
                scrollTrigger: {
                    trigger: '.cpl-title',
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                },
                y: 30,
                opacity: 0,
                duration: 0.6,
                ease: 'power2.out'
            });

            gsap.from('.cpl-grid > *', {
                scrollTrigger: {
                    trigger: '.cpl-grid',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 40,
                opacity: 0,
                duration: 0.8,
                stagger: 0.12,
                ease: 'power2.out'
            });

            // 4. Career section grid
            gsap.from('.career-section-grid > *', {
                scrollTrigger: {
                    trigger: '.career-section-grid',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 40,
                opacity: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power2.out'
            });

            gsap.from('.career-tag', {
                scrollTrigger: {
                    trigger: '.career-tags',
                    start: 'top 85%',
                    toggleActions: 'play none none none'
                },
                scale: 0.85,
                opacity: 0,
                duration: 0.5,
                stagger: 0.04,
                ease: 'back.out(1.7)'
            });

            // 5. Visi Misi Tujuan grid
            gsap.from('.vmt-grid > *', {
                scrollTrigger: {
                    trigger: '.vmt-grid',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 40,
                opacity: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power2.out'
            });
        });
    </script>
</body>
</html>