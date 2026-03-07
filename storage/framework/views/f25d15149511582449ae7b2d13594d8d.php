<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>D3 Accounting Information System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --brand-dark: #004269;
            --brand-accent: #0b7280;
            --brand-light: #e0f2f1;
            --text-main: #334155;
            --text-muted: #64748b;
            --bg-color: #f8fafc;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body { 
            font-family: 'Poppins', sans-serif; 
            background: var(--bg-color); 
            color: var(--text-main);
            line-height: 1.7;
        }

        .wrap { 
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 2.5rem 1.5rem; 
        }

        /* Header / Hero Section */
        .hero-section {
            text-align: center;
            margin-bottom: 3rem;
            background: linear-gradient(135deg, #ffffff, #f0fdfa);
            padding: 3rem 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 66, 105, 0.05);
            border: 1px solid rgba(11, 114, 128, 0.1);
        }

        .hero-section h1 {
            color: var(--brand-dark);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .badges {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .badge {
            background: var(--brand-light);
            color: var(--brand-accent);
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .profil-text {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 800px;
            margin: 0 auto;
        }

        /* Grid Layouts */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 3rem; }
        .grid-3 { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-bottom: 3rem; }

        /* Card Style */
        .card {
            background: #ffffff;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.05);
            border: 1px solid rgba(2, 6, 23, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.1);
        }

        h2 { color: var(--brand-dark); font-size: 1.4rem; margin-bottom: 1.2rem; display: flex; align-items: center; gap: 0.8rem; }
        h2 i { color: var(--brand-accent); }
        h3 { color: var(--brand-accent); font-size: 1.1rem; margin-bottom: 1rem; }

        /* Custom Lists */
        ul { list-style: none; }
        .custom-list li {
            position: relative;
            padding-left: 1.8rem;
            margin-bottom: 0.8rem;
            color: var(--text-main);
        }
        .custom-list li::before {
            content: '\f058'; /* Check-circle FontAwesome */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 2px;
            color: var(--brand-accent);
        }

        /* Career Tags */
        .career-tags { display: flex; flex-wrap: wrap; gap: 0.8rem; }
        .career-tag {
            background: linear-gradient(135deg, var(--brand-dark), var(--brand-accent));
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            cursor: default;
        }
        .career-tag:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(11, 114, 128, 0.3);
        }

        /* Images */
        figure { margin: 0; overflow: hidden; border-radius: 16px; position: relative; }
        figure img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
            transition: transform 0.5s ease;
        }
        figure:hover img { transform: scale(1.05); }
        figcaption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,66,105,0.9), transparent);
            color: white;
            padding: 2rem 1.5rem 1rem;
            font-size: 0.9rem;
            font-weight: 300;
        }

        /* Animations */
        .animate-fade-up {
            opacity: 0;
            animation: fadeUp 0.8s ease forwards;
        }
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .grid-2 { grid-template-columns: 1fr; }
            .hero-section h1 { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="wrap">
        
        <div class="hero-section animate-fade-up">
            <h1>D3 Accounting Information System</h1>
            <div class="badges">
                <span class="badge"><i class="fas fa-bullseye"></i> Digital Marketing</span>
                <span class="badge"><i class="fas fa-chart-line"></i> Marketing Administration</span>
            </div>
            <p class="profil-text">
                Menjadi tenaga Madya Profesional yang memiliki kemampuan di bidang manajemen pemasaran serta mampu menerapkan ilmu pemasaran produk baik barang maupun jasa serta mewujudkan lulusan pemasaran digital yang unggul dan berdaya saing pada tahun 2031.
            </p>
        </div>

        <div class="grid-2 animate-fade-up delay-1">
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
            <figure class="card" style="padding: 0; border: none;">
                <img src="<?php echo e(asset('storage/image/AIS.jpg')); ?>" alt="Program AIS" onerror="this.onerror=null;this.src='<?php echo e(asset('storage/image/AIS.png')); ?>'">
                <figcaption>Suasana perkuliahan dan praktik sistem informasi.</figcaption>
            </figure>
        </div>

        <div class="animate-fade-up delay-2">
            <h2 style="justify-content: center; margin-bottom: 2rem;"><i class="fas fa-graduation-cap"></i> Capaian Pembelajaran Lulusan (CPL)</h2>
            <div class="grid-3">
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
                <figure class="card" style="padding: 0; border: none; grid-column: auto / span 2;">
                    <img src="<?php echo e(asset('storage/image/AIS2.jpg')); ?>" alt="Kegiatan akademik AIS" onerror="this.onerror=null;this.src='<?php echo e(asset('storage/image/AIS.png')); ?>'">
                    <figcaption>Kolaborasi mahasiswa dalam proyek dan studi kasus pemasaran.</figcaption>
                </figure>
            </div>
        </div>

        <div class="card animate-fade-up delay-3" style="margin-bottom: 3rem;">
            <h2><i class="fas fa-briefcase"></i> Prospek Karir / Posisi Jabatan</h2>
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

        <div class="grid-3 animate-fade-up delay-3">
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

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html><?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/ais.blade.php ENDPATH**/ ?>