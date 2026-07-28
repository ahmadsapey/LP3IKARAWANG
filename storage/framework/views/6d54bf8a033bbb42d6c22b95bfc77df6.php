<?php
    $carouselData = isset($carouselData) ? $carouselData : (isset($carousel) ? $carousel : []);
    $newsData = isset($newsData) ? $newsData : [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LP3I Karawang - Politeknik LP3I Kampus Karawang</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('images/logos/Logo_LP3I.png')); ?>" type="image/png">
    
    <!-- Fonts & Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* Design Tokens & Theme Setup */
        :root {
            --primary: #1e3c72;
            --primary-dark: #0f2347;
            --primary-light: #2a5298;
            --primary-glow: rgba(30, 60, 114, 0.15);
            --cyan: #009da5;
            --cyan-light: #00d4ff;
            --cyan-glow: rgba(0, 157, 165, 0.35);
            --gold: #ffd700;
            --gold-glow: rgba(255, 215, 0, 0.35);
            --dark-bg: #0b1329;
            --dark-bg-card: rgba(15, 23, 42, 0.4);
            --light-bg: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --glass-bg: rgba(255, 255, 255, 0.75);
            --glass-border: rgba(255, 255, 255, 0.45);
            --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            --card-shadow: 0 10px 30px rgba(30, 60, 114, 0.06);
            --card-shadow-hover: 0 20px 45px rgba(30, 60, 114, 0.12);
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }

        body { 
            font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif; 
            line-height: 1.6; 
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
            width: 550px;
            height: 550px;
            background: radial-gradient(circle, var(--cyan-light) 0%, var(--primary) 70%, transparent 100%);
            top: 15%;
            left: -150px;
        }

        .glow-blob-2 {
            width: 650px;
            height: 650px;
            background: radial-gradient(circle, var(--primary-light) 0%, var(--cyan) 70%, transparent 100%);
            top: 55%;
            right: -250px;
            animation-delay: -7s;
        }

        .glow-blob-3 {
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, var(--cyan-light) 0%, var(--primary-dark) 70%, transparent 100%);
            bottom: 5%;
            left: 15%;
            animation-delay: -14s;
        }

        @keyframes floatBlob {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(60px, -40px) scale(1.15); }
            100% { transform: translate(-40px, 50px) scale(0.9); }
        }

        /* Hero Section Styling */
        .hero { 
            min-height: 85vh; 
            position: relative; 
            overflow: hidden; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: white; 
            padding-top: 4rem;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(11, 19, 41, 0.45) 0%, rgba(11, 19, 41, 0.88) 100%);
            z-index: 1;
            pointer-events: none;
        }

        .carousel-container { 
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            z-index: 0; 
        }

        .carousel-slide { 
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            opacity: 0; 
            background-size: cover; 
            background-position: center; 
            z-index: 0;
            will-change: transform, opacity;
        }

        .hero-content { 
            position: relative; 
            z-index: 2; 
            text-align: center; 
            max-width: 1080px; 
            padding: 2.5rem 1.5rem; 
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.75rem;
        }

        .hero-badge {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 6px 18px;
            border-radius: 100px;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--gold);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .hero-badge i {
            font-size: 0.9rem;
        }

        .hero-content h1 { 
            font-size: 3.75rem; 
            font-weight: 800; 
            line-height: 1.08;
            letter-spacing: -0.75px;
            text-shadow: 0 4px 18px rgba(0,0,0,0.35); 
            text-align: center;
            max-width: 860px;
        }

        .hero-highlight {
            display: inline-block;
            background: linear-gradient(135deg, var(--cyan-light) 0%, #00ffd5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 900;
        }

        .hero-subline {
            display: block;
            font-size: 2.4rem;
            font-weight: 700;
            color: rgba(255,255,255,0.92);
            margin-top: 0.85rem;
        }

        .hero-content p {
            font-size: 1.25rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            max-width: 840px;
            line-height: 1.75;
            text-shadow: 0 2px 10px rgba(0,0,0,0.18);
        }

        /* Dual CTAs */
        .hero-actions {
            display: flex;
            gap: 1.25rem;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 1rem;
        }

        .btn-primary-glow {
            background: linear-gradient(90deg, var(--cyan) 0%, #028a90 100%);
            color: white;
            text-decoration: none;
            padding: 15px 36px;
            font-weight: 700;
            border-radius: 50px;
            font-size: 0.98rem;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 0 20px rgba(0, 157, 165, 0.45);
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn-primary-glow:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 157, 165, 0.7);
            color: white;
        }

        .btn-secondary-glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: white;
            text-decoration: none;
            padding: 15px 36px;
            font-weight: 700;
            border-radius: 50px;
            font-size: 0.98rem;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
        }

        .btn-secondary-glass:hover {
            background: rgba(255, 255, 255, 0.18);
            border-color: rgba(255, 255, 255, 0.45);
            transform: translateY(-3px);
            color: white;
        }

        /* Floating statistics card overlay */
        .hero-stats {
            display: flex;
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 1.5rem 3.5rem;
            margin-top: 2rem;
            gap: 3.5rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .stat-num {
            font-size: 2.4rem;
            font-weight: 800;
            color: var(--gold);
            line-height: 1;
        }

        .stat-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.85);
            margin-top: 4px;
        }

        .stat-divider {
            width: 1px;
            background: rgba(255, 255, 255, 0.18);
        }

        /* --- Section Styling Commons --- */
        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 3.5rem auto;
            position: relative;
            z-index: 10;
        }

        .section-label {
            display: inline-block;
            color: var(--cyan);
            font-weight: 800;
            font-size: 1.50rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin-bottom: 0.7rem;
        }

        .section-title {
            font-size: 2.6rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1.25;
            letter-spacing: -0.5px;
        }

        .section-title span {
            color: var(--cyan);
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1.25rem;
            margin-top: 0.6rem;
        }

        /* --- Reasons/Alasan Section --- */
        .reasons { 
            padding: 6.5rem 2rem; 
            position: relative;
            background: #f8fafc; 
        }

        .reasons .container { 
            max-width: 1240px; 
            margin: 0 auto; 
            position: relative;
            z-index: 5;
        }

        .reasons-grid { 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 2rem; 
            margin-top: 1.5rem; 
        }

        .reason-card { 
            background: rgba(255, 255, 255, 0.85); 
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.55);
            border-radius: 24px; 
            padding: 2.5rem 1.75rem; 
            text-align: center; 
            box-shadow: var(--card-shadow); 
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
            position: relative;
            overflow: hidden;
            will-change: transform, box-shadow;
        }

        .reason-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--cyan) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .reason-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(30, 60, 114, 0.12);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .reason-card:hover::before {
            opacity: 1;
        }

        .reason-card-icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.05) 0%, rgba(0, 157, 165, 0.05) 100%);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: var(--transition);
        }

        .reason-card-icon i {
            font-size: 2.1rem;
            color: var(--primary);
            transition: var(--transition);
        }

        .reason-card:hover .reason-card-icon {
            background: linear-gradient(135deg, var(--primary) 0%, var(--cyan) 100%);
        }

        .reason-card:hover .reason-card-icon i {
            color: white;
            transform: scale(1.1);
        }

        .reason-card h4 { 
            margin-bottom: 0.6rem; 
            font-size: 1.25rem; 
            font-weight: 750;
            color: var(--primary); 
        }

        .reason-card p { 
            font-size: 0.95rem; 
            color: #475569; 
            line-height: 1.6;
        }

        /* --- Kegiatan Section (Dark Theme Showcase) --- */
        .kegiatan {
            padding: 6.5rem 2rem;
            background: linear-gradient(180deg, #0b1329 0%, #070d1e 100%);
            position: relative;
            overflow: hidden;
        }

        .kegiatan .glow-blob {
            opacity: 0.12;
        }

        .kegiatan .section-title {
            color: white;
        }

        .kegiatan .section-subtitle {
            color: rgba(255, 255, 255, 0.6);
        }

        .kegiatan-container {
            max-width: 1240px;
            margin: 0 auto;
            position: relative;
            z-index: 5;
        }

        .gk-viewport { 
            overflow: visible; 
            position: relative; 
            width: 100%;
        }

        .gk-track {
            display: flex;
            gap: 2rem;
            will-change: transform;
        }

        /* Slide Card styling */
        .gk-slide {
            flex: 0 0 calc(33.333% - 1.33rem);
            border-radius: 24px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            transition: var(--transition);
        }

        .gk-slide-inner {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .gk-slide-image-wrap {
            position: relative;
            width: 100%;
            height: 380px;
            overflow: hidden;
        }

        .gk-slide-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .gk-slide-overlay {
            position: absolute;
            inset: 0;
            background: rgba(11, 19, 41, 0.65);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
            backdrop-filter: blur(4px);
        }

        .gk-zoom-badge {
            background: white;
            color: var(--primary);
            font-weight: 700;
            font-size: 0.85rem;
            padding: 10px 22px;
            border-radius: 50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .gk-slide:hover .gk-slide-img {
            transform: scale(1.08);
        }

        .gk-slide:hover .gk-slide-overlay {
            opacity: 1;
        }

        .gk-slide:hover .gk-zoom-badge {
            transform: translateY(0);
        }

        .gk-slide-caption {
            padding: 1.75rem;
            background: rgba(11, 19, 41, 0.35);
        }

        .gk-slide-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.68rem;
            font-weight: 700;
            color: white;
            background: linear-gradient(135deg, var(--cyan) 0%, var(--primary-light) 100%);
            padding: 4px 12px;
            border-radius: 100px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.75rem;
        }

        .gk-slide-caption h3 {
            font-size: 1.15rem;
            font-weight: 750;
            color: white;
            margin-bottom: 0.5rem;
            line-height: 1.35;
        }

        .gk-slide-caption p {
            font-size: 0.88rem;
            color: rgba(255, 255, 255, 0.75);
            line-height: 1.5;
        }

        /* Arrows styling */
        .gk-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            z-index: 10;
        }

        .gk-arrow:hover {
            background: white;
            color: var(--primary);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.35);
            transform: translateY(-50%) scale(1.05);
        }

        .gk-arrow.prev { left: -72px; }
        .gk-arrow.next { right: -72px; }

        .gk-arrow:disabled {
            opacity: 0.3;
            cursor: default;
            pointer-events: none;
        }

        /* Bullet dots */
        .gk-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 3rem;
        }

        .gk-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            cursor: pointer;
            transition: var(--transition);
            padding: 0;
        }

        .gk-dot.active {
            background: var(--cyan);
            width: 32px;
            border-radius: 100px;
        }

        /* Empty state kegiatan */
        .gk-empty { text-align: center; padding: 4rem 2rem; color: #94a3b8; font-size: 1.05rem; }
        .gk-empty i { font-size: 2.5rem; margin-bottom: .6rem; display: block; opacity: .5; }

        /* --- Video Profile Section --- */
        .video-profile {
            padding: 6.5rem 2rem;
            background: #f8fafc;
            position: relative;
        }

        .study-section {
            padding: 5.5rem 2rem;
            background: white;
        }

        .study-container {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 2.5rem;
            align-items: center;
            max-width: 1240px;
            margin: 0 auto;
        }

        .study-content {
            display: grid;
            gap: 1.75rem;
        }

        .study-box {
            background: #f8fafc;
            border-radius: 24px;
            padding: 1.75rem;
            border: 1px solid rgba(15, 23, 42, 0.06);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        }

        .study-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            color: white;
            font-size: 0.9rem;
            font-weight: 700;
            padding: 0.85rem 1.35rem;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .study-badge-blue {
            background: linear-gradient(135deg, #2563eb 0%, #0ea5e9 100%);
        }

        .study-badge-yellow {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            color: #0f172a;
        }

        .study-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 1rem;
        }

        .study-list li {
            background: white;
            border-radius: 18px;
            padding: 1.25rem 1.4rem;
            border: 1px solid rgba(15, 23, 42, 0.08);
        }

        .study-list li strong {
            display: block;
            font-size: 1rem;
            margin-bottom: 0.45rem;
            color: #0f172a;
        }

        .study-list li span {
            display: block;
            color: #64748b;
            font-size: 0.9rem;
        }

        .study-image-group {
            display: grid;
            grid-template-columns: 1fr; /* always stacked vertically */
            gap: 1.25rem;
        }

        .study-image-wrap {
            overflow: hidden;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
            background: #fff;
        }

        .study-image-wrap.secondary-image {
            max-height: 360px;
        }

        .study-image {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
            transition: transform 0.35s ease;
        }

        .study-image-wrap:hover .study-image {
            transform: scale(1.02);
        }

        @media (max-width: 900px) {
            .study-container {
                grid-template-columns: 1fr;
            }
        }

        .video-container {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
            z-index: 5;
        }

        .video-mockup {
            background: #0f172a;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(15, 23, 42, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.05);
            will-change: transform;
        }

        .mockup-header {
            background: #1e293b;
            padding: 14px 22px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .mockup-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .mockup-dot.red { background: #ef4444; }
        .mockup-dot.yellow { background: #f59e0b; }
        .mockup-dot.green { background: #10b981; }

        .mockup-title {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 600;
            margin-left: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .video-preview-wrapper {
            position: relative;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
            background: black;
            overflow: hidden;
        }

        .video-poster {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .video-overlay-glow {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle, rgba(30, 60, 114, 0.25) 0%, rgba(11, 19, 41, 0.7) 100%);
            pointer-events: none;
        }

        .play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 88px;
            height: 88px;
            background: linear-gradient(135deg, var(--cyan) 0%, var(--primary-light) 100%);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 1.8rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0, 157, 165, 0.5);
            z-index: 10;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            padding-left: 6px;
        }

        .play-pulse {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(0, 157, 165, 0.4);
            animation: playPulse 2.2s infinite;
            z-index: -1;
        }

        @keyframes playPulse {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.6); opacity: 0; }
        }

        .play-btn:hover {
            transform: translate(-50%, -50%) scale(1.1);
        }

        .video-preview-wrapper iframe {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            border: none;
            z-index: 5;
        }

        .video-caption {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-muted);
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* --- Partners Section --- */
        .partners { 
            padding: 5.5rem 2rem; 
            background: white; 
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .partners .container { 
            max-width: 1240px; 
            margin: 0 auto; 
        }

        .partners-heading {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 2rem;
        }

        .partners-accent {
            width: 8px;
            height: 48px;
            background: linear-gradient(180deg, var(--primary) 0%, var(--cyan) 100%);
            border-radius: 4px;
        }

        .partners-heading h2 {
            font-size: 1.85rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1.25;
        }

        .partners-desc {
            color: var(--text-muted);
            font-size: 1.05rem;
            line-height: 1.6;
            margin-bottom: 3.5rem;
            max-width: 900px;
        }

        /* Partners carousel: colossal image + vertical thumbnails */
        .partners-carousel {
            display: grid;
            grid-template-columns: 1fr 120px;
            gap: 20px;
            align-items: start;
            width: 100%;
            background: white;
            padding: 18px;
            border-radius: 18px;
            border: 1px solid rgba(30,60,114,0.06);
            box-shadow: var(--card-shadow);
        }

        .colossal-wrap {
            overflow: hidden;
            border-radius: 12px;
            height: 420px;
            position: relative;
        }

        .colossal-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .partners-thumbs {
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: stretch;
            justify-content: flex-start;
        }

        .partners-thumb {
            width: 100%;
            height: 90px;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
            border: 1px solid rgba(0,0,0,0.05);
            background: #fff;
            padding: 4px;
        }

        .partners-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .partners-thumb.active {
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
            border-color: rgba(0,157,165,0.12);
        }

        @media (max-width: 900px) {
            .partners-carousel {
                grid-template-columns: 1fr;
            }
            .partners-thumbs {
                flex-direction: row;
                overflow-x: auto;
                gap: 8px;
            }
            .partners-thumb { height: 70px; width: 120px; flex: 0 0 120px; }
            .colossal-wrap { height: 260px; }
        }

        /* --- News Section --- */
        .news { 
            padding: 6.5rem 2rem; 
            background: #f8fafc; 
        }

        .news .container { 
            max-width: 1240px; 
            margin: 0 auto; 
        }

        .news-grid { 
            display: grid; 
            grid-template-columns: repeat(3, 1fr); 
            gap: 2.5rem; 
            margin-top: 1rem; 
        }

        .news-card { 
            background: white; 
            border-radius: 24px; 
            overflow: hidden; 
            box-shadow: var(--card-shadow); 
            transition: box-shadow 0.3s ease, border-color 0.3s ease; 
            display: flex;
            flex-direction: column;
            text-decoration: none; 
            color: inherit; 
            border: 1px solid rgba(0, 0, 0, 0.03);
            will-change: transform, box-shadow;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(30, 60, 114, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .news-image-wrap {
            position: relative;
            width: 100%;
            height: 230px;
            overflow: hidden;
        }

        .news-image { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .news-card:hover .news-image {
            transform: scale(1.08);
        }

        .news-category {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(30, 60, 114, 0.85);
            backdrop-filter: blur(8px);
            color: white;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            z-index: 2;
        }

        .news-content { 
            padding: 2rem; 
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .news-content h3 {
            font-size: 1.25rem;
            font-weight: 750;
            color: var(--primary);
            line-height: 1.4;
            margin-bottom: 0.75rem;
            transition: color 0.3s ease;
        }

        .news-card:hover .news-content h3 {
            color: var(--cyan);
        }

        .news-excerpt {
            font-size: 0.92rem;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .news-footer {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1.25rem;
            border-top: 1px solid #f1f5f9;
        }

        .news-more {
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
        }

        .news-card:hover .news-more {
            color: var(--cyan);
            transform: translateX(4px);
        }

        .see-all-btn-wrap {
            text-align: center; 
            margin-top: 3.5rem;
        }

        .see-all-btn { 
            background: transparent; 
            color: var(--primary); 
            border: 2px solid var(--primary);
            padding: 12px 32px; 
            border-radius: 50px; 
            text-decoration: none; 
            font-weight: 700; 
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .see-all-btn:hover {
            background: var(--primary);
            color: white;
            box-shadow: 0 10px 20px rgba(30, 60, 114, 0.15);
            transform: translateY(-2px);
        }

        /* Modal styling overrides */
        #gk-modal {
            backdrop-filter: blur(15px);
        }

        #gk-modal-content {
            background: rgba(255, 255, 255, 0.95) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
        }

        #gk-modal-close {
            transition: var(--transition);
        }

        #gk-modal-close:hover {
            background: var(--primary) !important;
            transform: scale(1.1);
        }

        /* --- Responsive Design --- */
        @media (max-width: 1200px) {
            .gk-arrow.prev { left: 10px; }
            .gk-arrow.next { right: 10px; }
        }

        @media (max-width: 1024px) {
            .reasons-grid { grid-template-columns: repeat(2, 1fr); }
            .gk-slide { flex: 0 0 calc(50% - 1rem); }
            .news-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .hero-content h1 { font-size: 2.8rem; }
            .hero-content p { font-size: 1.1rem; }
            .hero-stats { padding: 1.25rem 2rem; gap: 1.5rem; }
            .stat-num { font-size: 1.8rem; }
            .section-title { font-size: 2rem; }
            .video-profile { padding: 4.5rem 1rem; }
            .kegiatan { padding: 4.5rem 1rem; }
            .reasons { padding: 4.5rem 1rem; }
            .news { padding: 4.5rem 1rem; }
        }

        @media (max-width: 640px) {
            .reasons-grid {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                gap: 1.25rem;
                padding: 10px 1rem 25px 1rem;
                margin-top: 1rem;
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
            .reasons-grid::-webkit-scrollbar {
                display: none;
            }
            .reason-card {
                flex: 0 0 85%;
                scroll-snap-align: center;
                opacity: 1 !important;
                transform: none !important;
            }
            .gk-viewport {
                padding: 10px 1rem 20px 1rem;
            }
            .gk-slide {
                flex: 0 0 280px;
                max-width: 82vw;
            }
            .gk-slide-image-wrap {
                height: 240px;
            }
            .news-grid {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                gap: 1.25rem;
                padding: 10px 1rem 25px 1rem;
                margin-top: 1.5rem;
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
            .news-grid::-webkit-scrollbar {
                display: none;
            }
            .news-card {
                flex: 0 0 85%;
                scroll-snap-align: center;
                opacity: 1 !important;
                transform: none !important;
            }
            .hero-content h1 { font-size: 2.2rem; }
            .hero-stats { display: none; }
            .gk-arrow { display: none !important; }
        }

        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap');

/* Style Dasar */
.study-section {
  padding: 60px 20px;
  background-color: #ffffff;
  font-family: 'Plus Jakarta Sans', sans-serif;
}

.study-container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 48px;
}

.study-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 40px;
}

/* Header & Badges */
.study-header {
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 24px;
}

.study-badge {
  width: 52px;
  height: 52px;
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 800;
  font-size: 1.25rem;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  flex-shrink: 0;
}

.badge-blue {
  background-color: #0077cd;
  color: #ffffff;
}

.badge-yellow {
  background-color: #f7d046;
  color: #1a1a1a;
}

.study-title-group {
  display: flex;
  flex-direction: column;
}

.study-title {
  font-size: 1.6rem;
  font-weight: 800;
  color: #0f172a;
  margin: 0;
  letter-spacing: -0.02em;
}

.study-subtitle {
  font-size: 0.75rem;
  font-weight: 700;
  color: #94a3b8;
  margin: 4px 0 0 0;
  letter-spacing: 0.08em;
}

/* Grids */
.study-grid {
  display: grid;
  gap: 16px;
}

.study-grid-2col {
  grid-template-columns: repeat(2, 1fr);
}

.study-grid-1col {
  grid-template-columns: 1fr;
}

/* Modern Card Style */
.study-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 20px;
  padding: 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  overflow: hidden;
  transition: all 0.25s ease;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
}

/* Pseudo element untuk aksen garis tebal melengkung di sebelah kiri */
.study-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  width: 6px;
}

.card-blue::before {
  background-color: #0077cd;
}

.card-yellow::before {
  background-color: #f7d046;
}

/* Hover Effect halus */
.study-card.clickable {
  cursor: pointer;
}

.study-card.clickable:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
  border-color: #cbd5e1;
}

/* Teks Dalam Kartu */
.study-card-body {
  display: flex;
  flex-direction: column;
  gap: 8px;
  padding-left: 6px;
}

.program-title {
  font-size: 1.1rem;
  font-weight: 800;
  color: #0f172a;
  line-height: 1.3;
}

.program-subtitle {
  font-size: 0.725rem;
  font-weight: 700;
  color: #94a3b8;
  letter-spacing: 0.06em;
}

/* Arrow Button (Bulatan Panah) */
.arrow-button {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background-color: #f8fafc;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #94a3b8;
  transition: all 0.2s ease;
  flex-shrink: 0;
}

.study-card:hover .arrow-button {
  background-color: #e2e8f0;
  color: #0f172a;
}

/* Gambar Kanan */
.study-image-group {
    display: flex;
    flex-direction: column;
    gap: 16px;
    align-items: flex-start; /* top-align with left cards */
    justify-content: flex-start;
    flex: 0 0 360px; /* constrain right column width */
}

.study-image-wrap {
    width: 100%;
    max-width: 360px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    max-height: 360px; /* limit primary image height to match left content */
}

.study-image-wrap.secondary-image {
    max-height: 200px; /* smaller secondary image */
}

.study-image {
    width: 100%;
    max-width: 360px;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Responsif untuk Layar Tablet/Mobile */
@media (max-width: 992px) {
  .study-container {
    flex-direction: column;
    gap: 40px;
  }

  .study-grid-2col {
    grid-template-columns: 1fr;
  }

  .study-image-wrap {
    width: 100%;
    max-width: 320px;
  }
}
    </style>
</head>
<body>

<?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<!-- Hero Section -->
<section class="hero">
    <div class="carousel-container">
        <?php $__currentLoopData = $carouselData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="carousel-slide <?php echo e($index == 0 ? 'active' : ''); ?>" 
               style="background-image: url('<?php echo e(asset(isset($item['image']) && $item['image'] ? $item['image'] : 'storage/image/default-hero.jpg')); ?>')">
           </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <div class="hero-content">
        <div class="hero-badge animate-hero">
            <i class="fas fa-graduation-cap"></i>
            <span>PMB LP3I Karawang TA 2026/2027</span>
        </div>
        <h1 class="animate-hero hero-title">
            Bangun dan <span class="hero-highlight">Awali Karir Profesionalmu</span>
            <br>
            <span class="hero-subline">Dimulai Dari Sini</span>
        </h1>
        <p class="animate-hero">LP3I Karawang hadir sebagai lembaga pendidikan vokasi yang akan membantu kalian meraih karier profesional menuju impian masa depan yang cerah.</p>
        
        <div class="hero-actions animate-hero">
            <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn-primary-glow">
                Daftar Sekarang <i class="fas fa-arrow-right"></i>
            </a>
            <a href="https://api.whatsapp.com/send?phone=6285117704112" target="_blank" rel="noopener noreferrer" class="btn-secondary-glass">
                <i class="fab fa-whatsapp"></i> Hubungi Konselor
            </a>
        </div>

        <div class="hero-stats animate-hero">
            <div class="stat-item">
                <span class="stat-num">95%</span>
                <span class="stat-label">Lulusan Kerja</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <span class="stat-num">300+</span>
                <span class="stat-label">Mitra DUDI</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <span class="stat-num">4</span>
                <span class="stat-label">Sertifikasi BNSP</span>
            </div>
        </div>
    </div>
</section>

<!-- Reasons Section -->
<section class="reasons" id="alasan">
    <!-- Ambient Glow Background Blobs -->
    <div class="bg-glow-container">
        <div class="glow-blob glow-blob-1"></div>
        <div class="glow-blob glow-blob-2"></div>
    </div>

    <div class="container">
        <div class="section-header">
            <span class="section-label">4 Alasan</span>
            <h2 class="section-title">Mengapa Memilih <span>LP3I Karawang?</span></h2>
            <p class="section-subtitle">Keunggulan utama kami untuk mempersiapkan peserta didik memiliki standar kompetensi siap kerja dan unggul di dunia industri secara relevan.</p>
        </div>

        <div class="reasons-grid">
            <div class="reason-card">
                <div class="reason-card-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h4>Kurikulum link and match</h4>
                <p>Pendidikan yang berbasis keahlian dan keterampilan praktis disesuaikan dengan kebutuhan industri.</p>
            </div>
            <div class="reason-card">
                <div class="reason-card-icon">
                    <i class="fas fa-award"></i>
                </div>
                <h4>Sertifikasi Kompetensi</h4>
                <p>Peserta didik dibekali 4 sertifikasi kompetensi resmi nasional dan internasional (BNSP & ITC).</p>
            </div>
            <div class="reason-card">
                <div class="reason-card-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h4>Tenaga Pengajar Praktisi</h4>
                <p>Sebagian besar tenaga pengajar LP3I Karawang berasal dari industri sesuai bidangnya.</p>
            </div>
            <div class="reason-card">
                <div class="reason-card-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h4>Layanan Penempatan Kerja</h4>
                <p>Peserta didik yang memiliki kualifikasi dan kompetensi yang sudah ditetapkan oleh LP3I Karawang akan mendapat layanan penempatan kerja dari CnP.</p>
            </div>
        </div>
    </div>
</section>

<!-- Kegiatan Section (Dark Mode Showcase) -->
<section class="kegiatan" id="kegiatan-showcase">
    <!-- Ambient Glow Background Blobs -->
    <div class="bg-glow-container">
        <div class="glow-blob glow-blob-3"></div>
    </div>

    <div class="kegiatan-container">
        <div class="section-header">
            <span class="section-label">Aktivitas Seru</span>
            <h2 class="section-title">Gabung &amp; Rasakan <span>Pengalaman Berbeda!</span></h2>
            <p class="section-subtitle">Momen terbaik, prestasi membanggakan, dan atmosfer belajar seru di LP3I Karawang yang menanti kamu!</p>
        </div>

        <div class="gk-viewport" id="gk-viewport">
            <div class="gk-track" id="gk-track">
                <div class="gk-empty" id="gk-empty"><i class="fas fa-images"></i>Memuat kegiatan…</div>
            </div>
        </div>

        <!-- Modal untuk detail kegiatan -->
        <div id="gk-modal" style="display:none;position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;background:rgba(11,19,41,0.92);align-items:center;justify-content:center;">
            <div id="gk-modal-content" style="background:#fff;border-radius:24px;max-width:95vw;max-height:90vh;padding:0;box-shadow:0 15px 50px rgba(0,0,0,0.3);position:relative;display:flex;flex-direction:column;align-items:center;overflow:hidden;">
                <button id="gk-modal-close" style="position:absolute;top:15px;right:20px;background:rgba(30,60,114,0.9);color:#fff;border:none;border-radius:50%;width:40px;height:40px;font-size:1.3rem;cursor:pointer;z-index:2;display:flex;align-items:center;justify-content:center;"><i class="fas fa-times"></i></button>
                <img id="gk-modal-img" src="" alt="" style="max-width:100%;max-height:55vh;object-fit:cover;border-bottom:1px solid #f1f5f9;">
                <div style="padding:2rem;text-align:center;max-width:750px;">
                    <div style="display:flex;justify-content:center;align-items:center;margin-bottom:12px;">
                        <span id="gk-modal-badge" style="background:linear-gradient(90deg,#009da5,#1e3c72);color:#fff;padding:5px 16px;font-size:.78rem;font-weight:800;border-radius:99px;letter-spacing:1px;text-transform:uppercase;">Highlight</span>
                    </div>
                    <h3 id="gk-modal-title" style="font-size:1.3rem;color:#1e3c72;font-weight:800;margin-bottom:10px;line-height:1.35;"></h3>
                    <div id="gk-modal-caption" style="font-size:.95rem;color:#475569;font-weight:500;line-height:1.6;text-align:center;"></div>
                </div>
            </div>
        </div>

        <button class="gk-arrow prev" id="gk-prev" style="display:none" aria-label="Previous"><i class="fas fa-chevron-left"></i></button>
        <button class="gk-arrow next" id="gk-next" style="display:none" aria-label="Next"><i class="fas fa-chevron-right"></i></button>

        <div class="gk-dots" id="gk-dots"></div>
    </div>
</section>

<!-- Video Profile Section -->
<section class="video-profile" id="profil-video">
    <div class="video-container">
        <div class="section-header">
            <span class="section-label">Mari bergabung</span>
            <h2 class="section-title">Kenali Kami Lebih Dekat</h2>
            
        </div>

        <div class="video-mockup">
            <div class="mockup-header">
                <div class="mockup-dot red"></div>
                <div class="mockup-dot yellow"></div>
                <div class="mockup-dot green"></div>
                <div class="mockup-title"><i class="fab fa-youtube"></i> LP3I Karawang Profile Video</div>
            </div>
            <div class="video-preview-wrapper" id="video-preview-wrapper">
                <!-- Glowing Thumbnail Preview -->
                <img src="<?php echo e(asset('storage/image/gedung.jpeg')); ?>" class="video-poster" alt="LP3I Karawang Campus Tour Thumbnail">
                <div class="video-overlay-glow"></div>
                <button class="play-btn" id="play-video-btn" aria-label="Play video">
                    <i class="fas fa-play"></i>
                    <span class="play-pulse"></span>
                </button>
            </div>
        </div>
        
    </div>
</section>

<section class="study-section" id="study">
  <div class="study-container">
    
    <!-- Sisi Kiri: Daftar Program -->
    <div class="study-content">
      

      <!-- Section Vokasi -->
      <div class="study-box">
        <div class="study-header">
          <div class="study-badge badge-yellow">D3</div>
          <div class="study-title-group">
            <h2 class="study-title">Diploma 3 Tahun</h2>
            <p class="study-subtitle">Program Pendidikan Di LP3I Karawang.</p>
          </div>
        </div>

        <div class="study-grid study-grid-1col">
          <div class="study-card card-yellow clickable">
            <div class="study-card-body">
              <strong class="program-title">Administrasi bisnis</strong>
              <span class="program-subtitle">PENILAIAN KINERJA A</span>
            </div>
            <div class="arrow-button">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6"/>
              </svg>
            </div>
          </div>

          <div class="study-card card-yellow clickable">
            <div class="study-card-body">
              <strong class="program-title">Teknik Otomotif</strong>
              <span class="program-subtitle">PENILAIAN KINERJA A</span>
            </div>
            <div class="arrow-button">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6"/>
              </svg>
            </div>
          </div>

          <div class="study-card card-yellow clickable">
            <div class="study-card-body">
              <strong class="program-title">Teknik Informatika</strong>
              <span class="program-subtitle">PENILAIAN KINERJA A</span>
            </div>
            <div class="arrow-button">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6"/>
              </svg>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Sisi Kanan: Gambar Gambar/Aset -->
    <div class="study-image-group">
      <div class="study-image-wrap">
        <img src="<?php echo e(asset('storage/image/AIS2.JPG')); ?>" alt="AIS LP3I Karawang" class="study-image">
      </div>
      <div class="study-image-wrap secondary-image">
        <img src="<?php echo e(asset('storage/image/AIS.JPG')); ?>" alt="AIS Program LP3I Karawang" class="study-image">
      </div>
    </div>

  </div>
</section>

<!-- Partners Section -->
<section class="partners" id="partners">
    <div class="container">
        <div class="partners-heading">
            <div class="partners-accent"></div>
            <h2>Mitra Perusahaan &amp; Dunia Industri<br>Menerima Lulusan Kami</h2>
        </div>
        <p class="partners-desc">LP3I Karawang telah menjalin kemitraan erat dengan dunia usaha dan dunia industri berskala nasional dan multinasional untuk mempermudah penempatan kerja lulusan kami.</p>

        <!-- Partners marquee: horizontal auto-scrolling logos -->
        <style>
        .partners-marquee { overflow: hidden; padding: 18px 0; }
        .partners-marquee .marquee-track { display:flex; gap:64px; align-items:center; width:max-content; }
        .partners-marquee .marquee-track img{ height:180px; max-height:220px; object-fit:contain; opacity:0.98; filter:grayscale(40%); }
        .partners-marquee .marquee-anim { display:flex; animation: marquee-anim 28s linear infinite; }
        .partners-marquee .marquee-anim:hover { animation-play-state: paused; }

        @keyframes marquee-anim {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }
        </style>

        <div class="partners-marquee" aria-hidden="false">
            <div class="marquee-anim" aria-hidden="false">
                <div class="marquee-track" aria-hidden="true">
                    <img src="<?php echo e(asset('storage/image/01.png')); ?>" alt="Partner 1">
                    <img src="<?php echo e(asset('storage/image/02.png')); ?>" alt="Partner 2">
                    <img src="<?php echo e(asset('storage/image/03.png')); ?>" alt="Partner 3">
                    <img src="<?php echo e(asset('storage/image/04.png')); ?>" alt="Partner 4">
                </div>
                <!-- duplicate for seamless loop -->
                <div class="marquee-track" aria-hidden="true">
                    <img src="<?php echo e(asset('storage/image/01.png')); ?>" alt="Partner 1">
                    <img src="<?php echo e(asset('storage/image/02.png')); ?>" alt="Partner 2">
                    <img src="<?php echo e(asset('storage/image/03.png')); ?>" alt="Partner 3">
                    <img src="<?php echo e(asset('storage/image/04.png')); ?>" alt="Partner 4">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="news">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Update Terkini</span>
            <h2 class="section-title">Berita &amp; Artikel <span>Terbaru</span></h2>
            <p class="section-subtitle">Temukan informasi seputar akademik, prestasi mahasiswa, karir, dan tips dunia kerja di blog kami.</p>
        </div>

        <div class="news-grid">
            <?php $__currentLoopData = $newsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $newsImage = null;
                    if (!empty($news['image']) && file_exists(public_path($news['image']))) {
                        $newsImage = asset($news['image']);
                    } elseif (!empty($news['image']) && file_exists(public_path('storage/' . ltrim($news['image'], '/')))) {
                        $newsImage = asset('storage/' . ltrim($news['image'], '/'));
                    } elseif (!empty($news['image_path']) && file_exists(public_path($news['image_path']))) {
                        $newsImage = asset($news['image_path']);
                    } elseif (!empty($news['image_path']) && file_exists(public_path('storage/' . ltrim($news['image_path'], '/')))) {
                        $newsImage = asset('storage/' . ltrim($news['image_path'], '/'));
                    }
                    
                    if (!$newsImage) {
                        $newsImage = asset('storage/image/landingPage1.png');
                    }
                
                    $newsUrl = $news['link'] ?? (isset($news['slug']) ? url('/news/' . $news['slug']) : (isset($news['id']) ? url('/news/' . $news['id']) : '#'));
                ?>

                <a href="<?php echo e($newsUrl); ?>" class="news-card" aria-label="<?php echo e($news['title'] ?? 'Berita'); ?>">
                    <div class="news-image-wrap">
                        <span class="news-category"><?php echo e($news['category'] ?? 'Artikel'); ?></span>
                        <img src="<?php echo e($newsImage); ?>" class="news-image" alt="<?php echo e($news['title'] ?? 'Berita'); ?>">
                    </div>
                    <div class="news-content">
                        <h3><?php echo e($news['title'] ?? ''); ?></h3>
                        <p class="news-excerpt"><?php echo e(Str::limit($news['excerpt'] ?? '', 95)); ?></p>
                        <div class="news-footer">
                            <span style="font-size:0.8rem;color:var(--text-muted);"><i class="far fa-calendar-alt"></i> <?php echo e(isset($news['created_at']) ? \Carbon\Carbon::parse($news['created_at'])->translatedFormat('d M Y') : 'Baru'); ?></span>
                            <span class="news-more">Baca Selengkapnya <i class="fas fa-chevron-right" style="font-size:0.75rem;"></i></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="see-all-btn-wrap">
            <a href="<?php echo e(url('/news')); ?>" class="see-all-btn">
                Lihat Semua Berita <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<!-- GSAP Core & ScrollTrigger CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<script>
    // Header Scroll Event
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

    // YouTube lazy load play button handler
    const playBtn = document.getElementById('play-video-btn');
    if (playBtn) {
        playBtn.addEventListener('click', function() {
            const wrapper = document.getElementById('video-preview-wrapper');
            wrapper.innerHTML = `<iframe src="https://www.youtube.com/embed/2dmy9PbQpz0?autoplay=1" title="Video profil LP3I Karawang" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
        });
    }

    // GSAP Animation setup
    document.addEventListener('DOMContentLoaded', function() {
        // Register ScrollTrigger
        gsap.registerPlugin(ScrollTrigger);

        // 1. Hero Content Entrance Animation
        gsap.from('.animate-hero', {
            y: 40,
            opacity: 0,
            duration: 1,
            stagger: 0.15,
            ease: 'power4.out',
            delay: 0.2
        });

        // 2. Hero Slider logic using Ken Burns effect
        const slides = gsap.utils.toArray('.carousel-slide');
        if (slides.length > 0) {
            let current = 0;
            
            // Set initial state
            gsap.set(slides, { opacity: 0, scale: 1.12 });
            gsap.set(slides[0], { opacity: 1, scale: 1.02 });
            
            // Trigger slow Ken Burns zoom on first slide
            gsap.to(slides[0], { scale: 1.06, duration: 6, ease: 'sine.out' });
            
            function nextSlide() {
                let next = (current + 1) % slides.length;
                let tl = gsap.timeline();
                
                // Fade out current and reset scale
                tl.to(slides[current], { opacity: 0, scale: 1.12, duration: 1.5, ease: 'power2.inOut' });
                
                // Fade in next and scale down (Ken Burns effect)
                tl.fromTo(slides[next], 
                    { opacity: 0, scale: 1.16 }, 
                    { opacity: 1, scale: 1.02, duration: 1.5, ease: 'power2.inOut' }, 
                    0
                );
                
                // Slow continuous zoom on active
                gsap.to(slides[next], { scale: 1.06, duration: 6, ease: 'sine.out', delay: 1.2 });
                current = next;
            }
            setInterval(nextSlide, 5000);
        }

        // 3. Reasons Cards Entrance Animation (ScrollTrigger)
        gsap.from('.reason-card', {
            scrollTrigger: {
                trigger: '.reasons',
                start: 'top 80%',
                toggleActions: 'play none none none'
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.12,
            ease: 'power2.out'
        });

        // 4. Video Profile Mockup Entrance Animation
        gsap.from('.video-mockup', {
            scrollTrigger: {
                trigger: '.video-profile',
                start: 'top 80%',
                toggleActions: 'play none none none'
            },
            scale: 0.95,
            y: 40,
            opacity: 0,
            duration: 1,
            ease: 'power3.out'
        });

        // 5. Partners Grid Card Entrance Animation
        gsap.from('.partners-hero', {
            scrollTrigger: {
                trigger: '.partners',
                start: 'top 85%',
                toggleActions: 'play none none none'
            },
            y: 30,
            opacity: 0,
            duration: 0.8,
            ease: 'power2.out'
        });

        // 6. News Cards Entrance Animation
        gsap.from('.news-card', {
            scrollTrigger: {
                trigger: '.news',
                start: 'top 80%',
                toggleActions: 'play none none none'
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.15,
            ease: 'power2.out'
        });
    });

    // Activities Carousel logic (Glide.js styled, custom slider)
    (function(){
        const AUTOPLAY   = 5000;
        const track      = document.getElementById('gk-track');
        const viewport   = document.getElementById('gk-viewport');
        const dotsWrap   = document.getElementById('gk-dots');
        const emptyEl    = document.getElementById('gk-empty');
        const prevBtn    = document.getElementById('gk-prev');
        const nextBtn    = document.getElementById('gk-next');

        let items = [], dots = [], idx = 0, perView = 3, timer = null, dragging = false, startX = 0, startLeft = 0;

        function getPerView(){
            const w = window.innerWidth;
            if (w <= 640) return 1;
            if (w <= 1024) return 2;
            return 3;
        }

        function slideWidth(){
            if (!items.length) return 0;
            return items[0].offsetWidth + parseFloat(getComputedStyle(track).gap || 32);
        }

        function maxIdx(){ return Math.max(0, items.length - perView); }

        function moveTo(i, smooth = true){
            idx = Math.max(0, Math.min(i, maxIdx()));
            const targetX = -idx * slideWidth();
            
            if (smooth) {
                gsap.to(track, {
                    x: targetX,
                    duration: 0.6,
                    ease: 'power2.out',
                    overwrite: 'auto'
                });
            } else {
                gsap.set(track, { x: targetX });
            }
            updateActive();
            updateDots();
            updateArrows();
        }

        function updateActive(){
            items.forEach((el, i) => {
                const isActive = (i >= idx && i < idx + perView);
                el.style.opacity = isActive ? '1' : '0.4';
                el.style.transform = isActive ? 'scale(1)' : 'scale(0.95)';
            });
        }

        function updateArrows(){
            prevBtn.disabled = idx <= 0;
            nextBtn.disabled = idx >= maxIdx();
        }

        function buildDots(){
            dotsWrap.innerHTML = '';
            dots = [];
            const total = maxIdx() + 1;
            for (let i = 0; i < total; i++){
                const d = document.createElement('button');
                d.className = 'gk-dot' + (i === 0 ? ' active' : '');
                d.setAttribute('aria-label', `Slide group ${i + 1}`);
                d.addEventListener('click', () => { moveTo(i); resetAuto(); });
                dotsWrap.appendChild(d);
                dots.push(d);
            }
        }

        function updateDots(){
            dots.forEach((d, i) => d.classList.toggle('active', i === idx));
        }

        function build(data){
            const active = data.filter(d => d.status === 'active' && d.image_path);
            if (!active.length){ emptyEl.innerHTML = '<i class="fas fa-images"></i>Belum ada kegiatan.'; return; }
            emptyEl.style.display = 'none';
            track.innerHTML = '';

            active.forEach(item => {
                const card = document.createElement('div');
                card.className = 'gk-slide';
                card.style.cursor = 'pointer';
                card.innerHTML = `
                    <div class="gk-slide-inner">
                        <div class="gk-slide-image-wrap">
                            <img src="/${item.image_path}" alt="${item.title || 'Kegiatan'}" loading="lazy" draggable="false" class="gk-slide-img">
                            <div class="gk-slide-overlay">
                                <span class="gk-zoom-badge"><i class="fas fa-expand-alt"></i> Detail</span>
                            </div>
                        </div>
                        <div class="gk-slide-caption">
                            <span class="gk-slide-tag"><i class="fas fa-sparkles"></i> Highlight</span>
                            <h3>${item.title || 'Momen Spesial LP3I'}</h3>
                            <p>${item.caption || 'Ayo jadi bagian dari cerita sukses ini!'}</p>
                        </div>
                    </div>`;

                card.addEventListener('click', function() {
                    document.getElementById('gk-modal-img').src = `/${item.image_path}`;
                    document.getElementById('gk-modal-img').alt = item.title || 'Kegiatan';
                    document.getElementById('gk-modal-title').textContent = item.title || 'Momen Spesial LP3I';
                    let caption = item.caption || 'Ayo jadi bagian dari cerita sukses ini!';
                    caption = caption.replace(/\n/g, '<br>');
                    document.getElementById('gk-modal-caption').innerHTML = caption;
                    document.getElementById('gk-modal').style.display = 'flex';
                });
                track.appendChild(card);
                items.push(card);
            });

            // Modal events setup
            const modal = document.getElementById('gk-modal');
            const closeBtn = document.getElementById('gk-modal-close');
            function closeModal() {
                modal.style.display = 'none';
            }
            if (closeBtn) closeBtn.onclick = closeModal;
            if (modal) {
                modal.addEventListener('mousedown', function(e) {
                    if (e.target === modal) closeModal();
                });
            }
            document.addEventListener('keydown', function(e) {
                if (modal && modal.style.display === 'flex' && (e.key === 'Escape' || e.keyCode === 27)) {
                    closeModal();
                }
            });

            perView = getPerView();
            prevBtn.style.display = '';
            nextBtn.style.display = '';
            buildDots();
            moveTo(0, false);
            
            // GSAP slide-in cards on scroll for Kegiatan Showcase
            gsap.from('.gk-slide', {
                scrollTrigger: {
                    trigger: '#kegiatan-showcase',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 50,
                opacity: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power2.out',
                onComplete: () => {
                    startAuto();
                }
            });
        }

        function startAuto(){
            stopAuto();
            timer = setInterval(() => {
                if (idx >= maxIdx()) moveTo(0);
                else moveTo(idx + 1);
            }, AUTOPLAY);
        }
        function stopAuto(){ clearInterval(timer); }
        function resetAuto(){ stopAuto(); startAuto(); }

        prevBtn.addEventListener('click', () => { moveTo(idx - 1); resetAuto(); });
        nextBtn.addEventListener('click', () => { moveTo(idx + 1); resetAuto(); });

        /* Drag / swipe mechanics using GSAP */
        function pointerDown(x){ 
            dragging = true; 
            startX = x; 
            startLeft = -idx * slideWidth(); 
            gsap.killTweensOf(track);
            track.style.cursor = 'grabbing'; 
            stopAuto();
        }
        function pointerMove(x){ 
            if (!dragging) return; 
            const dx = x - startX; 
            gsap.set(track, { x: startLeft + dx }); 
        }
        function pointerUp(x){
            if (!dragging) return; 
            dragging = false; 
            track.style.cursor = '';
            const dx = x - startX;
            if (Math.abs(dx) > 55) { 
                dx < 0 ? moveTo(idx + 1) : moveTo(idx - 1); 
            } else { 
                moveTo(idx); 
            }
            resetAuto();
        }
        track.addEventListener('mousedown',  e => { e.preventDefault(); pointerDown(e.clientX); });
        window.addEventListener('mousemove', e => pointerMove(e.clientX));
        window.addEventListener('mouseup',   e => pointerUp(e.clientX));
        track.addEventListener('touchstart', e => pointerDown(e.touches[0].clientX), { passive: true });
        track.addEventListener('touchmove',  e => pointerMove(e.touches[0].clientX), { passive: true });
        track.addEventListener('touchend',   e => pointerUp(e.changedTouches[0].clientX), { passive: true });

        /* Keyboard Navigation */
        document.addEventListener('keydown', e => {
            const rect = viewport.getBoundingClientRect();
            if (rect.bottom < 0 || rect.top > window.innerHeight) return;
            if (e.key === 'ArrowLeft') { moveTo(idx - 1); resetAuto(); }
            if (e.key === 'ArrowRight'){ moveTo(idx + 1); resetAuto(); }
        });

        const root = document.getElementById('kegiatan-showcase');
        if (root) {
            root.addEventListener('mouseenter', stopAuto);
            root.addEventListener('mouseleave', () => { if (items.length) startAuto(); });
        }

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => { 
                perView = getPerView(); 
                buildDots(); 
                moveTo(idx, false); 
            }, 150);
        });

        // Fetch Data from Endpoint
        fetch('/carousel-kegiatan')
            .then(r => r.json())
            .then(j => { 
                if (j.success) build(j.data); 
                else emptyEl.innerHTML = '<i class="fas fa-images"></i>Gagal memuat kegiatan.'; 
            })
            .catch(() => { 
                emptyEl.innerHTML = '<i class="fas fa-images"></i>Gagal memuat kegiatan.'; 
            });
    })();
</script>
// Partners colossal carousel
<script>
document.addEventListener('DOMContentLoaded', function(){
    try {
        const images = [
            "<?php echo e(asset('storage/image/01.png')); ?>",
            "<?php echo e(asset('storage/image/02.png')); ?>",
            "<?php echo e(asset('storage/image/03.png')); ?>",
            "<?php echo e(asset('storage/image/04.png')); ?>"
        ];
        const colossal = document.getElementById('colossal-image');
        const thumbs = Array.from(document.querySelectorAll('.partners-thumb'));
        if (!colossal || thumbs.length === 0) return;

        let idx = 0;
        const SPEED = 3800; // ms between slides (adjustable)
        let timer = null;

        function setActiveThumb(i){
            thumbs.forEach((t, j) => {
                t.classList.toggle('active', j === i);
                t.setAttribute('aria-selected', j === i ? 'true' : 'false');
            });
        }

        function show(i){
            if (i < 0) i = images.length - 1;
            if (i >= images.length) i = 0;
            idx = i;
            // simple fade transition
            colossal.style.opacity = 0;
            setTimeout(() => {
                colossal.src = images[idx];
                colossal.style.opacity = 1;
            }, 300);
            setActiveThumb(idx);
        }

        thumbs.forEach((btn, i) => {
            btn.addEventListener('click', () => {
                show(i);
                resetAuto();
            });
        });

        function startAuto(){
            stopAuto();
            timer = setInterval(() => {
                show((idx + 1) % images.length);
            }, SPEED);
        }
        function stopAuto(){ if (timer) clearInterval(timer); }
        function resetAuto(){ stopAuto(); startAuto(); }

        // initialize
        colossal.style.transition = 'opacity 0.45s ease, transform 0.6s ease';
        show(0);
        startAuto();

        // pause on hover
        const wrap = document.querySelector('.colossal-wrap');
        if (wrap){
            wrap.addEventListener('mouseenter', stopAuto);
            wrap.addEventListener('mouseleave', startAuto);
        }
    } catch (e) { console.error(e); }
});
</script>
</body>
</html><?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/index.blade.php ENDPATH**/ ?>