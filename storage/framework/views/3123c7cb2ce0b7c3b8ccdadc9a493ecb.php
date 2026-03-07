<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - LP3I Karawang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #004269;
            --accent: #009da5;
            --light-bg: #f8fafc;
            --text-dark: #1e293b;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Poppins', sans-serif; 
            line-height: 1.7; 
            color: var(--text-dark); 
            background-color: #fff; 
        }

        /* --- Reuse Header Style agar Konsisten --- */
        /* (Gunakan CSS header kamu yang sudah ada di sini) */
        
        /* --- Hero Section --- */

        .hero-history {
            position: relative;
            height: 420px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            overflow: hidden;
            background: var(--primary);
        }

        .hero-history img {
            position: absolute;
            width: 100%;
            height: 120%;
            object-fit: cover;
            opacity: 0.38;
            filter: brightness(0.7) blur(1px);
            will-change: transform;
            transition: transform 0.7s cubic-bezier(.4,1.4,.6,1);
        }

        .hero-history:hover img {
            transform: scale(1.04) translateY(-10px);
        }

        .hero-content {
            position: relative;
            z-index: 10;
            padding: 0 1rem;
            animation: fadeInDown 1.2s cubic-bezier(.4,1.4,.6,1);
        }

        .hero-content h1 {
            font-size: 2.7rem;
            font-weight: 800;
            margin-bottom: 14px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            text-shadow: 0 4px 24px rgba(0,0,0,0.18);
        }

        .hero-content p {
            font-size: 1.18rem;
            max-width: 600px;
            margin: 0 auto;
            opacity: 0.93;
            font-weight: 400;
            letter-spacing: 0.2px;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-40px); }
            to { opacity: 1; transform: none; }
        }

        /* --- Story Section --- */
        .section-padding {
            padding: 80px 0;
        }

        /* Tambahan agar teks tidak tertutup section berikutnya */
        .section-padding.container-custom {
            padding-bottom: 110px;
        }

        .container-custom {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }


        .story-text h2 {
            color: var(--primary);
            font-size: 2.1rem;
            margin-bottom: 18px;
            position: relative;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .story-text h2::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--accent), #00c3c9);
            margin-top: 10px;
            border-radius: 2px;
        }

        .story-text p {
            margin-bottom: 18px;
            text-align: justify;
            font-size: 1.08rem;
            line-height: 1.8;
            color: #2d3a4a;
        }


        .story-image img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,66,105,0.13), 25px 25px 0px var(--light-bg);
            transition: 0.5s cubic-bezier(.4,1.4,.6,1);
        }

        .story-image img:hover {
            transform: scale(1.04) rotate(-1deg);
            box-shadow: 0 20px 60px rgba(0,66,105,0.18), 25px 25px 0px var(--light-bg);
        }

        /* --- Vision & Mission Cards --- */
        .vm-section {
            background: var(--light-bg);
            border-radius: 50px 50px 0 0;
            margin-top: -30px;
            position: relative;
            z-index: 20;
        }

        .vm-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 30px;
            margin-top: 40px;
        }


        .card-vision {
            background: linear-gradient(135deg, var(--primary) 0%, #002a43 100%);
            color: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,66,105,0.2);
            transition: transform 0.4s cubic-bezier(.4,1.4,.6,1), box-shadow 0.4s;
        }

        .card-vision:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 30px 60px rgba(0,66,105,0.25);
        }

        .card-mission {
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.4s cubic-bezier(.4,1.4,.6,1), box-shadow 0.4s;
        }

        .card-mission:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 20px 50px rgba(0,66,105,0.13);
        }

        .vm-icon {
            font-size: 2.5rem;
            color: var(--accent);
            margin-bottom: 20px;
        }

        .mission-list {
            list-style: none;
        }

        .mission-list li {
            position: relative;
            padding-left: 35px;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .mission-list li i {
            position: absolute;
            left: 0;
            top: 5px;
            color: var(--accent);
        }

        /* --- Responsive --- */
        @media (max-width: 992px) {
            .story-grid, .vm-grid {
                grid-template-columns: 1fr;
            }
            .hero-content h1 { font-size: 2rem; }
            .story-image { order: -1; }
            .story-image img { box-shadow: 15px 15px 0px var(--primary); }
        }

        /* --- Animation --- */

        /* Animasi dinamis modern */
        [data-aos] {
            opacity: 0;
            transition: 0.8s cubic-bezier(.4,1.4,.6,1);
        }
        [data-aos="fade-up"] { transform: translateY(40px); }
        [data-aos="fade-down"] { transform: translateY(-40px); }
        [data-aos="fade-left"] { transform: translateX(-40px); }
        [data-aos="fade-right"] { transform: translateX(40px); }
        [data-aos="zoom-in"] { transform: scale(0.92); }
        [data-aos="zoom-out"] { transform: scale(1.08); }

        .appear {
            opacity: 1;
            transform: none;
        }
    </style>
</head>
<body>

    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section class="hero-history">
        <img src="<?php echo e(asset('storage/image/gedung.jpeg')); ?>" alt="Gedung LP3I">
        <div class="hero-content">
            <h1>Jejak Langkah</h1>
            <p>Membangun masa depan melalui pendidikan vokasi yang relevan dan adaptif sejak hari pertama.</p>
        </div>
    </section>

    <section class="section-padding container-custom">
        <div class="story-grid">
            <div class="story-text" data-aos="fade-right" data-aos-delay="100">
                <h2>Sejarah Singkat</h2>
                <p>
                    LP3I College Kampus Karawang hadir sebagai jawaban atas tantangan dunia industri yang terus berkembang pesat di wilayah Jawa Barat. Berdiri dengan visi menghadirkan pendidikan vokasi yang relevan, kami menjembatani jarak antara dunia pendidikan dan kebutuhan nyata perusahaan.
                </p>
                <p>
                    Perjalanan kami dimulai dengan program studi unggulan dan fokus pada <strong>keterampilan praktis</strong>. Kami percaya, bukan sekadar teori yang penting, namun bagaimana setiap mahasiswa memiliki kompetensi yang diakui secara profesional dan siap kerja.
                </p>
            </div>
            <div class="story-image" data-aos="zoom-in" data-aos-delay="300">
                <img src="<?php echo e(asset('storage/image/gedung.jpeg')); ?>" alt="Kampus LP3I Karawang">
            </div>
        </div>
    </section>

    <section class="section-padding vm-section">
        <div class="container-custom">
            <div style="text-align: center; margin-bottom: 50px;" data-aos="fade-down" data-aos-delay="100">
                <h2 style="color: var(--primary); font-size: 2rem;">Arah &amp; Tujuan Kami</h2>
                <p style="color: var(--text-muted); font-size:1.08rem;">Visi dan misi LP3I College Karawang dalam mencetak SDM unggul dan berdaya saing.</p>
            </div>

            <div class="vm-grid">
                <div class="card-vision" data-aos="fade-up" data-aos-delay="200">
                    <div class="vm-icon" style="color: #fff;"><i class="fas fa-eye"></i></div>
                    <h2 style="margin-bottom: 15px;">Visi</h2>
                    <p style="font-size: 1.13rem; line-height: 1.8;">
                        "Menjadi lembaga pendidikan vokasi terbaik yang mencetak lulusan berkualitas, berakhlak, adaptif, dan kompeten."
                    </p>
                </div>

                <div class="card-mission" data-aos="fade-up" data-aos-delay="400">
                    <div class="vm-icon"><i class="fas fa-rocket"></i></div>
                    <h2 style="margin-bottom: 15px; color: var(--primary);">Misi Kami</h2>
                    <ul class="mission-list">
                        <li><i class="fas fa-check-circle"></i> Menjadi lembaga pendidikan vokasi terbaik di wilayah PURWASUKA.</li>
                        <li><i class="fas fa-check-circle"></i> Mencetak lulusan yang beretika, sopan, dan santun.</li>
                        <li><i class="fas fa-check-circle"></i> Membentuk pribadi berjiwa wirausaha untuk kemajuan bangsa.</li>
                        <li><i class="fas fa-check-circle"></i> Membangun jaringan terluas di Jawa Barat.</li>
                        <li><i class="fas fa-check-circle"></i> Menciptakan SDM yang berakhlak, adaptif, dan kompeten.</li>
                        <li><i class="fas fa-check-circle"></i> Memberikan kesejahteraan dan rasa tentram bagi seluruh keluarga besar LP3I.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script>
        // Animasi dinamis modern dengan variasi efek dan delay bertingkat
        const observerOptions = { threshold: 0.1 };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.getAttribute('data-aos-delay') || 0;
                    setTimeout(() => {
                        entry.target.classList.add('appear');
                    }, delay);
                }
            });
        }, observerOptions);

        document.querySelectorAll('[data-aos]').forEach(el => observer.observe(el));

        // Parallax ringan pada hero image saat scroll
        window.addEventListener('scroll', function() {
            const heroImg = document.querySelector('.hero-history img');
            if(heroImg) {
                heroImg.style.transform = `translateY(${window.scrollY * 0.18}px) scale(1.04)`;
            }
            const nav = document.getElementById('mainNav');
            if(nav) {
                if (window.scrollY > 60) {
                    nav.classList.add('scrolled');
                } else {
                    nav.classList.remove('scrolled');
                }
            }
        });
    </script>
</body>
</html><?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/sejarah.blade.php ENDPATH**/ ?>