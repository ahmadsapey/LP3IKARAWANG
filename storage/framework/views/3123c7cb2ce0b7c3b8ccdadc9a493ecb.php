<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - LP3I Karawang</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('images/logos/Logo_LP3I.png')); ?>" type="image/png">
    
    <!-- Fonts & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1e3c72;
            --primary-dark: #0f2347;
            --primary-light: #2a5298;
            --primary-glow: rgba(30, 60, 114, 0.15);
            --cyan: #009da5;
            --cyan-light: #00d4ff;
            --cyan-glow: rgba(0, 157, 165, 0.35);
            --gold: #ffd700;
            --light-bg: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: rgba(255, 255, 255, 0.45);
            --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            --card-shadow: 0 10px 30px rgba(30, 60, 114, 0.06);
            --card-shadow-hover: 0 20px 45px rgba(30, 60, 114, 0.12);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif; 
            line-height: 1.7; 
            color: var(--text-dark); 
            background-color: var(--light-bg);
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
            opacity: 0.14;
            animation: floatBlob 25s infinite alternate ease-in-out;
            pointer-events: none;
        }

        .glow-blob-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, var(--cyan-light) 0%, var(--primary) 70%, transparent 100%);
            top: 20%;
            left: -150px;
        }

        .glow-blob-2 {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, var(--primary-light) 0%, var(--cyan) 70%, transparent 100%);
            top: 60%;
            right: -250px;
            animation-delay: -7s;
        }

        @keyframes floatBlob {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(60px, -40px) scale(1.15); }
            100% { transform: translate(-40px, 50px) scale(0.9); }
        }

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
        }

        .hero-history::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(11, 19, 41, 0.45) 0%, rgba(11, 19, 41, 0.88) 100%);
            z-index: 1;
            pointer-events: none;
        }

        .hero-history img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
            will-change: transform;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            padding: 0 1.5rem;
        }

        .hero-content h1 {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .hero-content p {
            font-size: 1.2rem;
            max-width: 650px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.95);
            font-weight: 500;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        /* --- Section Styling Commons --- */
        .section-padding {
            padding: 6.5rem 0;
            position: relative;
            z-index: 5;
        }

        .container-custom {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* --- Story Section --- */
        .story-grid {
            display: grid;
            grid-template-columns: 1.12fr 0.88fr;
            gap: 4.5rem;
            align-items: center;
        }

        .story-text h2 {
            color: var(--primary);
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1.25;
        }

        .story-text h2 span {
            color: var(--cyan);
        }

        .story-text h2::after {
            content: '';
            display: block;
            width: 70px;
            height: 5px;
            background: linear-gradient(90deg, var(--cyan), var(--primary-light));
            margin-top: 12px;
            border-radius: 4px;
        }

        .story-text p {
            margin-bottom: 1.25rem;
            font-size: 1.05rem;
            line-height: 1.8;
            color: #334155;
        }

        .story-image {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(2, 6, 23, 0.05);
            will-change: transform;
        }

        .story-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .story-image:hover img {
            transform: scale(1.06);
        }

        /* --- Vision & Mission Section --- */
        .vm-section {
            background: #f1f5f9;
            border-top: 1px solid rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        }

        .vm-grid {
            display: grid;
            grid-template-columns: 1fr 1.4fr;
            gap: 2.5rem;
            margin-top: 3.5rem;
        }

        .card-vision {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 3rem;
            border-radius: 24px;
            box-shadow: 0 15px 40px rgba(30, 60, 114, 0.18);
            transition: box-shadow 0.3s ease;
            will-change: transform;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .card-vision:hover {
            box-shadow: 0 25px 50px rgba(30, 60, 114, 0.28);
        }

        .card-vision h2 {
            color: white;
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 1.25rem;
            letter-spacing: -0.3px;
        }

        .card-vision p {
            font-size: 1.15rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
        }

        .card-mission {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.55);
            padding: 3rem;
            border-radius: 24px;
            box-shadow: var(--card-shadow);
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
            will-change: transform;
        }

        .card-mission:hover {
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(30, 60, 114, 0.12);
        }

        .card-mission h2 {
            color: var(--primary);
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 1.25rem;
            letter-spacing: -0.3px;
        }

        .vm-icon {
            font-size: 2.6rem;
            color: var(--cyan);
            margin-bottom: 1.5rem;
        }

        .card-vision .vm-icon {
            color: #00ffd5;
        }

        .mission-list {
            list-style: none;
        }

        .mission-list li {
            position: relative;
            padding-left: 2.2rem;
            margin-bottom: 1.1rem;
            font-size: 1.02rem;
            font-weight: 600;
            color: #334155;
            line-height: 1.6;
        }

        .mission-list li i {
            position: absolute;
            left: 0;
            top: 4px;
            color: var(--cyan);
            font-size: 1.15rem;
        }

        /* --- Responsive Styles & Mobile Optimization --- */
        @media (max-width: 992px) {
            .container-custom {
                padding-left: 2rem !important;
                padding-right: 2rem !important;
            }
            .section-padding {
                padding: 4.5rem 0;
            }
            .story-grid {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }
            .vm-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            .hero-history {
                height: 350px;
            }
            .hero-content h1 {
                font-size: 2.4rem;
            }
            .hero-content p {
                font-size: 1.05rem;
            }
        }

        @media (max-width: 600px) {
            .wrap {
                padding: 2rem 1.25rem;
            }
            .hero-history {
                height: 280px;
            }
            .hero-content h1 {
                font-size: 1.85rem;
                letter-spacing: 1px;
            }
            .hero-content p {
                font-size: 0.95rem;
            }
            .story-text h2 {
                font-size: 1.8rem;
                margin-bottom: 1rem;
            }
            .story-text p {
                font-size: 0.96rem;
                line-height: 1.7;
            }
            .card-vision, .card-mission {
                padding: 2rem 1.5rem;
                border-radius: 20px;
            }
            .card-vision h2, .card-mission h2 {
                font-size: 1.45rem;
            }
            .card-vision p {
                font-size: 0.98rem;
                line-height: 1.7;
            }
            .mission-list li {
                font-size: 0.95rem;
                padding-left: 1.8rem;
                margin-bottom: 0.95rem;
            }
            .mission-list li i {
                font-size: 1rem;
            }
            .vm-icon {
                font-size: 2.2rem;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>

    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Ambient Glow Background Blobs -->
    <div class="bg-glow-container">
        <div class="glow-blob glow-blob-1"></div>
        <div class="glow-blob glow-blob-2"></div>
    </div>

    <!-- Hero Section -->
    <section class="hero-history">
        <img src="<?php echo e(asset('storage/image/gedung.jpeg')); ?>" class="hero-bg" alt="Gedung LP3I">
        <div class="hero-content">
            <h1 class="animate-hero">Jejak Langkah</h1>
            <p class="animate-hero">Membangun masa depan melalui pendidikan vokasi yang relevan dan adaptif sejak hari pertama.</p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="section-padding container-custom story-section">
        <div class="story-grid">
            <div class="story-text">
                <h2>Sejarah <span>Singkat</span></h2>
                <p>
                    LP3I College Kampus Karawang hadir sebagai jawaban atas tantangan dunia industri yang terus berkembang pesat di wilayah Jawa Barat. Berdiri dengan visi menghadirkan pendidikan vokasi yang relevan, kami menjembatani jarak antara dunia pendidikan dan kebutuhan nyata perusahaan.
                </p>
                <p>
                    Perjalanan kami dimulai dengan program studi unggulan dan fokus pada <strong>keterampilan praktis</strong>. Kami percaya, bukan sekadar teori yang penting, namun bagaimana setiap mahasiswa memiliki kompetensi yang diakui secara profesional dan siap kerja.
                </p>
            </div>
            <div class="story-image">
                <img src="<?php echo e(asset('storage/image/gedung.jpeg')); ?>" alt="Kampus LP3I Karawang">
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="section-padding vm-section">
        <div class="container-custom">
            <div class="section-header">
                <span class="section-label">Arah Visi</span>
                <h2 class="section-title">Arah &amp; Tujuan Kami</h2>
                <p class="section-subtitle">Visi dan misi LP3I College Karawang dalam mencetak SDM unggul, berakhlak mulia, dan berdaya saing.</p>
            </div>

            <div class="vm-grid">
                <div class="card-vision">
                    <div class="vm-icon"><i class="fas fa-eye"></i></div>
                    <h2>Visi</h2>
                    <p>
                        "Menjadi lembaga pendidikan vokasi terbaik yang mencetak lulusan berkualitas, berakhlak, adaptif, dan kompeten."
                    </p>
                </div>

                <div class="card-mission">
                    <div class="vm-icon"><i class="fas fa-rocket"></i></div>
                    <h2>Misi Kami</h2>
                    <ul class="mission-list">
                        <li><i class="fas fa-check-circle"></i> Menjadi lembaga pendidikan vokasi terbaik di wilayah PURWASUKA.</li>
                        <li><i class="fas fa-check-circle"></i> Mencetak lulusan yang beretika, sopan, dan santun.</li>
                        <li><i class="fas fa-check-circle"></i> Membentuk pribadi berjiwa wirausaha untuk kemajuan bangsa.</li>
                        <li><i class="fas fa-check-circle"></i> Membangun jaringan terluas di Jawa Barat.</li>
                        <li><i class="fas fa-check-circle"></i> Menciptakan SDM yang berakhlak, adaptif, and kompeten.</li>
                        <li><i class="fas fa-check-circle"></i> Memberikan kesejahteraan dan rasa tentram bagi seluruh keluarga besar LP3I.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- GSAP CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            gsap.registerPlugin(ScrollTrigger);

            // 1. Hero Content Entrance Animation
            gsap.from('.animate-hero', {
                y: 30,
                opacity: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power3.out'
            });

            // 2. Slow Ken Burns parallax zoom on hero bg image
            gsap.fromTo('.hero-bg', 
                { scale: 1.15, y: 0 },
                { 
                    scale: 1.02, 
                    y: 60,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: '.hero-history',
                        start: 'top top',
                        end: 'bottom top',
                        scrub: true
                    }
                }
            );

            // 3. Story Section Animation
            gsap.from('.story-text > *', {
                scrollTrigger: {
                    trigger: '.story-section',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                x: -30,
                opacity: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power2.out'
            });

            gsap.from('.story-image', {
                scrollTrigger: {
                    trigger: '.story-section',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                x: 30,
                opacity: 0,
                duration: 0.8,
                ease: 'power2.out'
            });

            // 4. Vision Mission Section
            gsap.from('.section-header > *', {
                scrollTrigger: {
                    trigger: '.vm-section',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 30,
                opacity: 0,
                duration: 0.6,
                stagger: 0.12,
                ease: 'power2.out'
            });

            gsap.from('.card-vision', {
                scrollTrigger: {
                    trigger: '.vm-grid',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 40,
                opacity: 0,
                duration: 0.8,
                ease: 'power2.out'
            });

            gsap.from('.card-mission', {
                scrollTrigger: {
                    trigger: '.vm-grid',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 40,
                opacity: 0,
                duration: 0.8,
                delay: 0.15,
                ease: 'power2.out'
            });
        });
    </script>
</body>
</html><?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/sejarah.blade.php ENDPATH**/ ?>