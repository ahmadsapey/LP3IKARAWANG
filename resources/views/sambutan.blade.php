@php
    // Read settings from CSV
    $settingsFile = public_path('data/settings.csv');
    $settings = [];
    if (file_exists($settingsFile) && ($handle = fopen($settingsFile, 'r')) !== false) {
        $header = fgetcsv($handle);
        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) === count($header)) {
                $item = array_combine($header, $row);
                $settings[$item['key']] = $item['value'];
            }
        }
        fclose($handle);
    }

    $bmName = !empty($settings['branch_manager_name']) ? $settings['branch_manager_name'] : 'Aceng Ajat, S.T., M.M.';
    $bmTitle = !empty($settings['branch_manager_title']) ? $settings['branch_manager_title'] : 'Branch Manager';
    $bmRole = !empty($settings['branch_manager_role']) ? $settings['branch_manager_role'] : 'Kepala Kampus LP3I Karawang';
    
    $bmImage = !empty($settings['branch_manager_image']) ? asset($settings['branch_manager_image']) : asset('storage/image/directur.jpeg');
    
    $bmGreeting = !empty($settings['branch_manager_greeting']) ? nl2br(e($settings['branch_manager_greeting'])) : "Assalamu’alaikum Warahmatullahi Wabarakatuh,<br>Salam Sejahtera bagi kita semua.";
    
    $bmQuote = !empty($settings['branch_manager_quote']) ? e($settings['branch_manager_quote']) : "Pendidikan bukan hanya soal deretan teori di atas kertas, melainkan tentang bagaimana kita mempersiapkan diri untuk menjadi solusi di tengah masyarakat.";
    
    $bmContent = !empty($settings['branch_manager_content']) ? $settings['branch_manager_content'] : '';
    if (empty($bmContent)) {
        $bmContent = '<p data-aos="fade-right" data-aos-delay="500">Selamat datang di <strong>LP3I College Kampus Karawang</strong>. Sebagai bagian dari keluarga besar LP3I, saya merasa bangga dan terhormat dapat menyambut Anda di institusi yang memiliki dedikasi penuh terhadap masa depan generasi muda Indonesia.</p>' .
                     '<p data-aos="fade-left" data-aos-delay="900">Di LP3I Karawang, kami berkomitmen menyediakan pendidikan vokasi berkualitas yang membekali lulusan dengan keterampilan praktis dan profesionalisme tinggi. Kami terus berinovasi dalam kurikulum dan memperluas jaringan kerja sama industri untuk memastikan setiap mahasiswa memiliki jalur yang jelas menuju kesuksesan.</p>' .
                     '<p data-aos="fade-up" data-aos-delay="1100">Terima kasih atas kepercayaan Anda memilih LP3I sebagai mitra dalam membangun karier masa depan.</p>';
    } else {
        if (!str_contains($bmContent, '<p>') && !str_contains($bmContent, '<P>')) {
            $paragraphs = explode("\n", $bmContent);
            $formatted = '';
            $delay = 500;
            foreach ($paragraphs as $para) {
                if (trim($para) !== '') {
                    $formatted .= '<p data-aos="fade-up" data-aos-delay="' . $delay . '">' . e(trim($para)) . '</p>';
                    $delay += 200;
                }
            }
            $bmContent = $formatted;
        }
    }
@endphp
<!doctype html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sambutan - LP3I Karawang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
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
        :root {
            --primary: #1e3c72;
            --accent: #009da5;
            --soft-blue: #f0f4f8;
            --text-dark: #1e293b;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background-color: #fcfdfe; color: var(--text-dark); line-height: 1.8; }

        /* --- Custom Hero Section --- */
        .header-bg {
            background: linear-gradient(135deg, var(--primary) 0%, #2a5298 100%);
            height: 300px;
            width: 100%;
            position: absolute;
            top: 0;
            z-index: -1;
            clip-path: polygon(0 0, 100% 0, 100% 70%, 0 100%);
        }

        .main-container {
            max-width: 1100px;
            margin: 120px auto 80px;
            padding: 0 1.5rem;
        }

        /* Profile Layout */
        .profile-section {
            display: flex;
            align-items: flex-end;
            gap: 2.5rem;
            margin-bottom: 3rem;
        }

        .avatar-wrapper {
            position: relative;
            flex-shrink: 0;
        }

        .avatar-box {
            width: 260px;
            height: 320px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            border: 6px solid white;
            background: #eee;
        }

        .avatar-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .avatar-box:hover img {
            transform: scale(1.05);
        }

        /* Badge or Accent on Avatar */
        .avatar-wrapper::after {
            content: '';
            position: absolute;
            bottom: -15px;
            right: -15px;
            width: 80px;
            height: 80px;
            background: var(--accent);
            border-radius: 50%;
            z-index: -1;
            opacity: 0.3;
        }

        .leader-info h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: rgb(6, 4, 118); /* contrast with background gradient */
            margin-bottom: 5px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .leader-info .title-badge {
            background: var(--accent);
            color: white;
            padding: 5px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* --- Content Styling --- */
        .content-card {
            background: white;
            padding: 3.5rem;
            border-radius: 30px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.05);
            position: relative;
        }

        /* Quote Icon */
        .content-card::before {
            content: "\f10d";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            top: 40px;
            left: 40px;
            font-size: 4rem;
            color: #f1f5f9;
            z-index: 0;
        }

        .greeting-text {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .main-text {
            text-align: justify;
            color: #475569;
            position: relative;
            z-index: 1;
        }

        .main-text p {
            margin-bottom: 1.5rem;
        }

        .highlight-box {
            background: var(--soft-blue);
            padding: 20px;
            border-left: 5px solid var(--accent);
            border-radius: 0 15px 15px 0;
            margin: 2rem 0;
            font-style: italic;
            color: var(--primary);
        }

        .closing-signature {
            margin-top: 3rem;
            border-top: 1px solid #f1f5f9;
            padding-top: 2rem;
        }

        .closing-signature p {
            margin: 0;
            color: #64748b;
            font-size: 0.95rem;
        }

        .closing-signature strong {
            color: var(--primary);
            font-size: 1.1rem;
        }

        /* Responsive */
        @media (max-width: 850px) {
            .profile-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
                margin-top: -50px;
            }
            .leader-info h1 {
                color: var(--primary);
                font-size: 2rem;
                margin-top: 1rem;
            }
            .avatar-box {
                width: 220px;
                height: 280px;
            }
            .content-card {
                padding: 2rem;
            }
            .content-card::before { font-size: 2.5rem; }
        }
    </style>
</head>
<body>

@include('partials.header')

<div class="header-bg"></div>

<main class="main-container">
    <section class="profile-section">
        <div class="avatar-wrapper" data-aos="zoom-in" data-aos-delay="100">
            <div class="avatar-box">
                <img src="{{ $bmImage }}" alt="{{ $bmName }}">
            </div>
        </div>
        <div class="leader-info">
            <div class="title-badge" data-aos="fade-right" data-aos-delay="350">{{ $bmTitle }}</div>
            <h1 data-aos="fade-left" data-aos-delay="500">{{ $bmName }}</h1>
        </div>
    </section>


    <section class="content-card" data-aos="fade-up" data-aos-delay="200">
        <div class="greeting-text" data-aos="fade-down" data-aos-delay="350">
            {!! $bmGreeting !!}
        </div>
        
        <div class="main-text">
            {!! $bmContent !!}

            <div class="highlight-box" data-aos="zoom-in" data-aos-delay="700">
                "{!! $bmQuote !!}"
            </div>
        </div>

        <div class="closing-signature" data-aos="fade-up" data-aos-delay="1300">
            <p>Wassalamu’alaikum Warahmatullahi Wabarakatuh.</p>
            <p>Salam hangat,</p>
            <br>
            <strong>{{ $bmName }}</strong><br>
            <span>{{ $bmRole }}</span>
        </div>
    </section>
</main>

@include('layouts.footer')

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

    // Header scroll animation
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('mainNav');
        if (nav) {
            if (window.scrollY > 60) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        }
    });
</script>

</body>
</html>