<!doctype html>
<html lang="id">
  <head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mahasiswa - LP3I Karawang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Flatpickr for better date input -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Tom Select for nicer selects -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <style>
      :root { --brand-dark: #004269; --brand-accent: #009DA5; --brand-pink: #F15B67; --brand-red: #FF0000; }
      /* Color theme — match admin/dashboard vibe */
      body.registration-bg {
        /* Gradient behind floating logos */
        background: linear-gradient(135deg, #009DA5 0%, #004269 70%);
        min-height: 100vh;
        padding-top: 190px;
        color: #111827;
        font-family: 'Poppins', sans-serif;
        position: relative;
        overflow-x: hidden;
      }
      @media (max-width: 900px) {
        body.registration-bg { padding-top: 130px; }
        body.registration-bg.header-compact-body { padding-top: 70px; }
      }

      /* Limit the registration container width so it doesn't reach the navbar edges */
      .registration-container { max-width: 1100px; margin: 0 auto; background: none !important; position: relative; z-index: 1; }

      /* Animated logos should live on the page background (not inside the map container) */
      .lp3i-page-anim {
        position: fixed;
        inset: 0;
        z-index: 0;
        pointer-events: none;
        overflow: hidden;
      }
      .lp3i-page-anim .lp3i-anim-area {
        width: 100%;
        height: 100%;
        max-height: none;
        position: relative;
      }
      .lp3i-page-anim .lp3i-anim-img {
        position: absolute;
        width: 220px;
        height: 220px;
        opacity: 0.62;
        mix-blend-mode: screen;
        will-change: transform, filter;
        animation: lp3i-bg-drift-a var(--dur, 18s) cubic-bezier(.45,0,.25,1) infinite alternate;
        animation-delay: calc(var(--i) * -1.15s);
        filter:
          drop-shadow(0 0 18px rgba(255,255,255,0.42))
          drop-shadow(0 0 34px rgba(0,157,165,0.32))
          contrast(1.35)
          brightness(1.55)
          saturate(1.10);
      }

      @keyframes lp3i-bg-drift-a {
        0%   { transform: translate3d(0,0,0) rotate(calc(var(--rot, 10deg) * -1)) scale(0.98); }
        33%  { transform: translate3d(calc(var(--dx, 44px) * 0.55), calc(var(--dy, 34px) * -0.25), 0) rotate(var(--rot, 10deg)) scale(1.05); }
        66%  { transform: translate3d(calc(var(--dx, 44px) * -0.35), calc(var(--dy, 34px) * 0.65), 0) rotate(calc(var(--rot, 10deg) * -0.6)) scale(1.02); }
        100% { transform: translate3d(var(--dx, 44px), var(--dy, 34px), 0) rotate(calc(var(--rot, 10deg) * 0.2)) scale(1.08); }
      }

      @keyframes lp3i-bg-drift-b {
        0%   { transform: translate3d(0,0,0) rotate(calc(var(--rot, 10deg) * 0.4)) scale(1.02); }
        25%  { transform: translate3d(calc(var(--dx, 44px) * -0.6), calc(var(--dy, 34px) * 0.25), 0) rotate(calc(var(--rot, 10deg) * -1)) scale(1.08); }
        50%  { transform: translate3d(calc(var(--dx, 44px) * 0.25), calc(var(--dy, 34px) * -0.75), 0) rotate(var(--rot, 10deg)) scale(1.00); }
        100% { transform: translate3d(var(--dx, 44px), var(--dy, 34px), 0) rotate(calc(var(--rot, 10deg) * -0.2)) scale(1.10); }
      }

      @media (max-width: 768px) {
        .lp3i-page-anim .lp3i-anim-img { width: 160px; height: 160px; opacity: 0.56; }
      }
      @media (max-width: 480px) {
        .lp3i-page-anim .lp3i-anim-img { width: 135px; height: 135px; opacity: 0.52; }
      }

      /* Spread 9 logos across the background + varied movement */
      .lp3i-page-anim .lp3i-anim-img:nth-child(1) { left: 6%;  top: 14%; --dx: 54px; --dy: 36px; --rot: 14deg; --dur: 17s; }
      .lp3i-page-anim .lp3i-anim-img:nth-child(2) { left: 38%; top: 8%;  --dx: -62px; --dy: 40px; --rot: 11deg; --dur: 21s; animation-name: lp3i-bg-drift-b; }
      .lp3i-page-anim .lp3i-anim-img:nth-child(3) { left: 72%; top: 16%; --dx: 48px; --dy: -44px; --rot: 16deg; --dur: 19s; }
      .lp3i-page-anim .lp3i-anim-img:nth-child(4) { left: 14%; top: 46%; --dx: -56px; --dy: -34px; --rot: 12deg; --dur: 23s; animation-name: lp3i-bg-drift-b; }
      .lp3i-page-anim .lp3i-anim-img:nth-child(5) { left: 46%; top: 42%; --dx: 66px; --dy: 28px; --rot: 10deg; --dur: 18s; }
      .lp3i-page-anim .lp3i-anim-img:nth-child(6) { left: 80%; top: 46%; --dx: -44px; --dy: 46px; --rot: 15deg; --dur: 22s; animation-name: lp3i-bg-drift-b; }
      .lp3i-page-anim .lp3i-anim-img:nth-child(7) { left: 8%;  top: 74%; --dx: 52px; --dy: -30px; --rot: 13deg; --dur: 20s; }
      .lp3i-page-anim .lp3i-anim-img:nth-child(8) { left: 40%; top: 78%; --dx: -68px; --dy: -26px; --rot: 9deg;  --dur: 24s; animation-name: lp3i-bg-drift-b; }
      .lp3i-page-anim .lp3i-anim-img:nth-child(9) { left: 74%; top: 76%; --dx: 58px; --dy: 34px; --rot: 12deg; --dur: 19.5s; }

      .registration-card {
        background: rgba(255,255,255,0.24); /* option A: more solid card for higher contrast */
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 2px solid rgba(0,157,165,0.86); /* brand accent (stronger) */
        border-radius: 14px;
        box-shadow:
          0 18px 45px rgba(2,6,23,0.34),
          0 0 0 1px rgba(241,91,103,0.18) inset,
          0 0 34px rgba(0,157,165,0.30);
        overflow: hidden;
      }

      .registration-card .card-body {
        padding: 2.25rem;
      }

      .registration-header {
        display:flex;
        align-items:center;
        gap:1rem;
        margin-bottom:1rem;
      }

      /* Remove logo box — keep only color/gradient accents */

      .registration-card h2 {
        color: rgba(255,255,255,0.98);
        text-shadow:
          0 0 10px rgba(255,255,255,0.25),
          0 0 22px rgba(0,157,165,0.20);
      }

      .registration-card p.text-muted { color: #6b7280; }
      /* header subtext — white; show required note (asterisk + text) in red */
      .registration-subtext {
        color: rgba(255,255,255,0.86);
        text-shadow: 0 0 12px rgba(255,255,255,0.18);
      }
      .registration-subtext .required { color: var(--brand-pink); font-weight:700; }

      /* Inputs */
      .registration-card .form-control,
      .registration-card .form-select {
        background: transparent !important; /* no fill */
        border: 2px solid rgba(0,157,165,0.55) !important;
        color: rgba(255,255,255,0.96) !important;
        text-align: center;
        border-radius: 10px;
        box-shadow:
          0 0 0 1px rgba(241,91,103,0.14) inset,
          0 0 18px rgba(0,157,165,0.10) !important;
        text-shadow: 0 0 10px rgba(255,255,255,0.16);
      }

      .registration-card .form-control::placeholder {
        color: rgba(255,255,255,0.70);
        text-shadow: 0 0 10px rgba(255,255,255,0.10);
        text-align: center;
      }

      .registration-card .form-control:focus,
      .registration-card .form-select:focus {
        border-color: var(--brand-accent);
        box-shadow:
          0 0 0 4px rgba(0,157,165,0.22),
          0 0 26px rgba(0,157,165,0.20) !important;
        background: transparent !important;
        color: rgba(255,255,255,0.98) !important;
      }

      /* TomSelect: match transparent inputs */
      .registration-card .ts-control {
        background: transparent !important;
        border: 2px solid rgba(0,157,165,0.55) !important;
        box-shadow:
          0 0 0 1px rgba(241,91,103,0.14) inset,
          0 0 18px rgba(0,157,165,0.10) !important;
      }
      .registration-card .ts-control,
      .registration-card .ts-control .item,
      .registration-card .ts-control input {
        color: rgba(255,255,255,0.96) !important;
        text-shadow: 0 0 10px rgba(255,255,255,0.14);
        text-align: center;
      }
      .registration-card .ts-control .ts-placeholder {
        color: rgba(255,255,255,0.70) !important;
        text-align: center;
      }
      .registration-card .ts-dropdown {
        background: rgba(0,0,0,0.92) !important;
        border: 1px solid rgba(255,255,255,0.20) !important;
      }
      .registration-card .ts-dropdown .option,
      .registration-card .ts-dropdown .create {
        color: rgba(255,255,255,0.92) !important;
      }

      /* Labels */
      .registration-card .form-label {
        color: rgba(255,255,255,0.92);
        font-weight: 650;
        text-shadow: 0 0 10px rgba(255,255,255,0.16);
      }

      .registration-card hr {
        border-color: rgba(0,157,165,0.40);
        border-top-width: 2px;
        opacity: 1;
        box-shadow: 0 0 16px rgba(0,157,165,0.12);
      }

      .btn-primary {
        background: linear-gradient(90deg,var(--brand-dark),var(--brand-accent));
        border: none;
        box-shadow: 0 8px 24px rgba(0,66,105,0.12);
      }

      .btn-outline-secondary {
        color: var(--brand-dark);
        border-color: rgba(0,66,105,0.12);
      }

      .register-btn {
            display: inline-flex !important;
            align-items: center;
            gap: 0.5rem;
            background: var(--brand-dark) !important;
            color: white !important;
            padding: 0.5rem 1rem !important;
            text-decoration: none !important;
            border-radius: 20px !important;
            font-weight: 600 !important;
            font-size: 0.9rem !important;
            box-shadow: 0 4px 15px rgba(0, 66, 105, 0.3) !important;
            border: none !important;
            cursor: pointer !important;
        }
        .register-btn:hover { background: #003352 !important; transform: translateY(-2px); }

      /* Keep single-column layout that fits the container */
      .registration-layout { display:block; }

      /* New layout: left illustration column + right form (responsive) */
      .registration-grid { display: grid; grid-template-columns: 1fr; gap: 0; align-items: start; }
      .lp3i-anim-bg {
        background: #004269;
        border-radius: 12px;
        padding: 1rem;
        min-height: 320px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .lp3i-anim-area {
        width: 100%;
        height: 300px;
        max-height: 320px;
        position: relative;
      }
      .lp3i-anim-img {
        position: absolute;
        width: 90px;
        height: 90px;
        object-fit: contain;
        opacity: 0.92;
        pointer-events: none;
        animation: lp3i-float 8s cubic-bezier(.6,-0.01,.4,1.01) infinite alternate;
        animation-delay: calc(var(--i) * 1.7s);
      }
      .lp3i-anim-img:nth-child(1) { left: 10%; top: 18%; }
      .lp3i-anim-img:nth-child(2) { left: 60%; top: 10%; }
      .lp3i-anim-img:nth-child(3) { left: 35%; top: 60%; }
      @keyframes lp3i-float {
        0%   { transform: translate(0,0) scale(1) rotate(-8deg); filter: blur(0px); }
        18%  { transform: translate(-12px, 18px) scale(1.08) rotate(6deg); filter: blur(0.5px); }
        36%  { transform: translate(18px, -10px) scale(0.97) rotate(-12deg); filter: blur(0.7px); }
        54%  { transform: translate(-10px, 22px) scale(1.04) rotate(8deg); filter: blur(0.2px); }
        72%  { transform: translate(12px, -16px) scale(1.02) rotate(-6deg); filter: blur(0.6px); }
        100% { transform: translate(-8px, 10px) scale(1.01) rotate(0deg); filter: blur(0px); }
      }
      /* Make object-position slightly higher on smaller screens to keep focal points visible */
      @media (max-width: 576px) {
        .lp3i-anim-area { height: 140px; }
        .lp3i-anim-img { width: 54px; height: 54px; }
      }
      @media (max-width: 768px) {
        .lp3i-anim-area { height: 180px; }
        .lp3i-anim-img { width: 70px; height: 70px; }
      }

      /* Mobile-friendly layout: stack illustration and form */
      @media (max-width: 992px) {
        .registration-grid { grid-template-columns: 1fr; gap: 1rem; }
        .registration-illustration { order: -1; padding: 0; background: transparent; }
        .illustration-wrapper { height: 220px; margin: 0; border:none; background: transparent; width: calc(100% + 2.5rem); margin-left: -1.25rem; margin-right: -1.25rem; }
        .illustration-wrapper::after { display: none; }
        .illustration-wrapper img { width: 100%; height: 100%; object-fit: cover; object-position: center 45%; border-radius: 12px; display:block; }
        .registration-card .card-body { padding: 1.25rem; }
        .registration-card h2 { font-size: 1.5rem; }
        .registration-subtext { font-size: 0.95rem; }
        .registration-illustration { padding: 0; }
        .registration-illustration img { max-height: 160px; }
      }

      @media (max-width: 480px) {
        .illustration-wrapper { height: 160px; }
        .illustration-wrapper img { object-position: center 35%; }
      }
/* Login Button Styling (adjacent to register) */
        .login-btn {
            display: inline-flex !important;
            align-items: center;
            gap: 0.5rem;
            background: #004269 !important;
            color: white !important;
            padding: 0.55rem 1rem !important;
            text-decoration: none !important;
            border-radius: 18px !important;
            font-weight: 600 !important;
            font-size: 0.9rem !important;
            transition: all 0.25s ease;
            border: 1px solid rgba(255,255,255,0.12) !important;
            cursor: pointer !important;
            white-space: nowrap;
        }

        .login-btn:hover {
            background: rgba(255,255,255,0.06) !important;
            transform: translateY(-1px);
            box-shadow: none !important;
        }
      /* Form actions and spacing */
      .form-actions { display:flex; gap: 1rem; align-items:center; justify-content:space-between; margin-top: 1.25rem; }
      .form-actions .btn { min-width: 150px; border-radius: 28px; padding: 0.6rem 1.25rem; font-weight:600; }
      .form-actions .btn-cancel { background: transparent; color: var(--brand-pink); border: 1.5px solid var(--brand-pink); box-shadow:none; }
      .form-actions .btn-cancel:hover { background: rgba(241,91,103,0.04); }
      .form-actions .btn-submit { background: linear-gradient(90deg,var(--brand-dark),var(--brand-accent)); color: white; border: none; box-shadow: 0 8px 24px rgba(0,66,105,0.12); }

      @media (max-width: 576px) {
        .form-actions { flex-direction: column; gap: 0.75rem; align-items: stretch; }
        .form-actions .btn { width: 100%; min-width: 0; }
      }
    </style>
    <style>
      /* Form field sizing, labels and consistent spacing */
      .registration-card h2 { font-size: 1.9rem; font-weight:800; margin-bottom: 0.25rem; }
      .registration-subtext { font-size: 0.95rem; margin-bottom: 0.6rem; }
      .registration-subtext .required { font-weight:700; opacity:0.95; font-size:0.95rem; }

      /* Normalize spacing between fields */
      .mb-3 { margin-bottom: 16px !important; }

      /* Labels: consistent alignment and size */
      .elegant-form .form-label { display:block; margin-bottom:6px; font-size:0.95rem; }

      /* Inputs and selects: uniform height, padding and border */
      .elegant-form .form-control,
      .elegant-form .form-select {
        height:44px; padding: .56rem .75rem; border-radius:10px; border:1.5px solid rgba(30,60,114,0.12); box-shadow:none; background: #fff; transition: box-shadow .12s ease, border-color .12s ease; font-size:0.95rem;
      }
      .elegant-form textarea.form-control { min-height:110px; height:auto; padding:.75rem .9rem; }
      .elegant-form .form-control:focus, .elegant-form .form-select:focus { border-color: var(--brand-accent); box-shadow: 0 6px 18px rgba(0,157,165,0.06); }

      /* Polished select appearance (match input height, smaller font, balanced padding, modern radius) */
      .elegant-form select.form-control,
      .elegant-form .form-select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        padding-right: 2rem; /* make room for custom caret */
        font-size: 0.92rem;
        line-height: 1.25;
        display: inline-block;
        vertical-align: middle;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='10' viewBox='0 0 14 10'%3E%3Cpath fill='%236B7280' d='M7 10L0 0h14z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 12px 8px;
      }

      /* Option readability */
      .elegant-form select.form-control option {
        font-size: 0.93rem;
        padding: 6px 8px;
      }

      /* Tom Select adjustments so placeholder and options aren't truncated */
      .ts-control { min-height:44px; border-radius:10px; }
      .ts-control .ts-input, .ts-control .item { line-height:1.2; height:44px; padding: .35rem .4rem; }
      .ts-control .ts-placeholder { white-space: normal; color: #6b7280; }
      .ts-dropdown, .ts-control .dropdown-content { max-height: 260px; overflow:auto; }

      /* Make dropdowns fill their column and not appear cramped */
      .form-select, .ts-control { width:100% !important; }

      /* Responsive: reduce gaps slightly on small screens */
      @media (max-width: 576px) {
        .registration-card .card-body { padding: 1rem; }
        .elegant-form .form-control, .elegant-form .form-select { height:44px; }
      }
    </style>
    <!-- Alerts style moved inside a proper style block above -->
    <style>
      /* Inline elegant form styles for registration page */
      .elegant-form .form-control,
      .elegant-form .form-select,
      .elegant-form textarea.form-control {
        border-radius: 12px;
        padding: .75rem .9rem;
        border: 2px solid rgba(255,255,255,0.35);
        background: linear-gradient(180deg, #ffffff, #fbfbff);
        box-shadow: 0 6px 18px rgba(30, 60, 114, 0.06);
        transition: all .18s ease-in-out;
      }
      .elegant-form .form-control:focus,
      .elegant-form .form-select:focus,
      .elegant-form textarea.form-control:focus {
        border-color: rgba(0,157,165,0.55);
        box-shadow: 0 10px 26px rgba(30,60,114,0.12), 0 0 0 4px rgba(116,185,255,0.06);
        outline: none;
      }
      .elegant-form .form-label { font-weight:650; }
      .elegant-form .btn { border-radius: 900px; padding: .68rem 1.2rem; transition: transform .08s ease, box-shadow .08s ease; }
      .elegant-form .btn-primary { background: linear-gradient(90deg,var(--brand-dark),var(--brand-accent)); border:none; color:#fff; }
      .elegant-form .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 12px 30px rgba(30,60,114,0.14); }
      .ts-dropdown, .ts-control .dropdown-content { max-height: 240px; overflow: auto; }
    </style>

    <style>
      /* Final overrides (keep form controls transparent + white text) */
      .registration-card .elegant-form .form-control,
      .registration-card .elegant-form .form-select,
      .registration-card .elegant-form textarea.form-control {
        /* Slight brand-dark tint behind inputs for readability on gradient */
        background: rgba(0, 66, 105, 0.22) !important;
        background-image: none !important;
        color: rgba(255,255,255,0.96) !important;
        border: 2px solid rgba(0,157,165,0.72) !important;
        box-shadow:
          0 0 0 1px rgba(241,91,103,0.14) inset,
          0 0 18px rgba(0,157,165,0.14) !important;
        text-shadow: 0 0 10px rgba(255,255,255,0.14);
        text-align: center;
      }

        .registration-card .elegant-form .ts-control,
        .registration-card .elegant-form .ts-control .item,
        .registration-card .elegant-form .ts-control input {
          text-align: center;
        }

        .registration-card .elegant-form .ts-control input::placeholder {
          text-align: center;
        }

      .registration-card .elegant-form .form-control::placeholder {
        color: rgba(255,255,255,0.78) !important;
        text-align: center;
      }

      .registration-card .elegant-form .form-control:focus,
      .registration-card .elegant-form .form-select:focus,
      .registration-card .elegant-form textarea.form-control:focus {
        background: rgba(0, 66, 105, 0.28) !important;
        color: rgba(255,255,255,0.98) !important;
        border-color: rgba(0,157,165,0.75) !important;
        box-shadow:
          0 0 0 4px rgba(0,157,165,0.22),
          0 0 26px rgba(0,157,165,0.20) !important;
      }

      /* Native select dropdown list (best-effort; browser dependent) */
      .registration-card .elegant-form select option {
        background: #000000;
        color: #ffffff;
      }

      /* TomSelect (Jenis Kelas) */
      .registration-card .ts-control {
        background: rgba(0, 66, 105, 0.22) !important;
        border: 2px solid rgba(0,157,165,0.72) !important;
        box-shadow:
          0 0 0 1px rgba(241,91,103,0.14) inset,
          0 0 18px rgba(0,157,165,0.14) !important;
      }
      .registration-card .ts-control,
      .registration-card .ts-control .item,
      .registration-card .ts-control input {
        color: rgba(255,255,255,0.96) !important;
        text-shadow: 0 0 10px rgba(255,255,255,0.14);
      }
      .registration-card .ts-control .ts-placeholder {
        color: rgba(255,255,255,0.92) !important;
      }

      /* TomSelect caret (dropdown arrow) */
      .registration-card .ts-control:after {
        border-color: rgba(255,255,255,0.88) transparent transparent transparent !important;
      }
      .registration-card .ts-dropdown {
        background: rgba(0,0,0,0.92) !important;
        border: 1px solid rgba(255,255,255,0.20) !important;
      }
      .registration-card .ts-dropdown .option,
      .registration-card .ts-dropdown .create {
        color: rgba(255,255,255,0.96) !important;
        background: transparent !important;
      }
      .registration-card .ts-dropdown .option.active,
      .registration-card .ts-dropdown .option:hover {
        background: rgba(0,157,165,0.22) !important;
        color: rgba(255,255,255,0.98) !important;
      }
    </style>
  </head>
  <body class="registration-bg">
    @include('partials.header')

    <!-- Floating logos as page background (not inside map container) -->
    <div class="lp3i-page-anim" aria-hidden="true">
      <div class="lp3i-anim-area">
        <img src="/storage/image/SIMBOLISASE.png" class="lp3i-anim-img" style="--i:0;" alt="">
        <img src="/storage/image/SIMBOLISASE.png" class="lp3i-anim-img" style="--i:1;" alt="">
        <img src="/storage/image/SIMBOLISAIS.png" class="lp3i-anim-img" style="--i:2;" alt="">

        <img src="/storage/image/SIMBOLISOAA.png" class="lp3i-anim-img" style="--i:3;" alt="">
        <img src="/storage/image/SIMBOLISOAA.png" class="lp3i-anim-img" style="--i:4;" alt="">
        <img src="/storage/image/SIMBOLISASE.png" class="lp3i-anim-img" style="--i:5;" alt="">

        <img src="/storage/image/SIMBOLISAIS.png" class="lp3i-anim-img" style="--i:6;" alt="">
        <img src="/storage/image/SIMBOLISOAA.png" class="lp3i-anim-img" style="--i:7;" alt="">
        <img src="/storage/image/SIMBOLISAIS.png" class="lp3i-anim-img" style="--i:8;" alt="">
      </div>
    </div>

    <div class="container registration-container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card registration-card shadow-sm">
            <div class="card-body p-4">
              
                <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data" novalidate class="elegant-form">
                  @csrf
                  <div class="registration-grid">
                    <div>
                      <div class="registration-header">
                    <!-- logo removed — keeping layout minimal and colorful -->
                    <div>
                      <h2 class="mb-0">Pendaftaran Mahasiswa Baru</h2>
                      <p class="registration-subtext small mb-0">Silahakan Isi data diri dengan benar</p>
                    </div>
                  </div>

              {{-- Flash / validation messages --}}
              @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif

              @if($errors->any())
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach($errors->all() as $err)
                      <li>{{ $err }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              

                <div class="row">
                  <div class="mb-3 col-lg-4 col-md-6">
                    <label class="form-label">Nama Lengkap *</label>
                    <input type="text" name="nama_mhs" value="{{ old('nama_mhs') }}" class="form-control" required>
                  </div>

                  <div class="mb-3 col-lg-4 col-md-6">
                    <label class="form-label">Jenis Kelas</label>
                    <select id="jenis_kelas" name="jenis_kelas" class="form-select">
                      <option value="">-- Pilih --</option>
                      <option value="Regular" {{ old('jenis_kelas') == 'Regular' ? 'selected' : '' }}>Regular</option>
                      <option value="Karyawan" {{ old('jenis_kelas') == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                    </select>
                  </div>

                  <div class="mb-3 col-lg-4 col-md-6">
                    <label class="form-label">No. HP *</label>
                    <input type="text" name="no_tlp" value="{{ old('no_tlp') }}" class="form-control" required>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-3 col-lg-4 col-md-6">
                    <label class="form-label">Bidang Keahlian</label>
                    <select name="id_program_studi" class="form-select">
                      <option value="">--Pilih--</option>
                      <option value="1" {{ (string) old('id_program_studi') === '1' ? 'selected' : '' }}>Accounting Information System</option>
                      <option value="2" {{ (string) old('id_program_studi') === '2' ? 'selected' : '' }}>Application Software Engineering</option>
                      <option value="3" {{ (string) old('id_program_studi') === '3' ? 'selected' : '' }}>Office Administration Automatization</option>
                    </select>
                  </div>

                  <div class="mb-3 col-lg-4 col-md-6">
                    <label class="form-label">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="form-control">
                  </div>

                  <div class="mb-3 col-lg-4 col-md-6">
                    <label class="form-label">Alamat Lengkap</label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control" required>
                  </div>
                </div>

                {{-- <div class="row">
                  <div class="mb-3 col-md-6">
                    <label class="form-label">Sumber Pendaftaran</label>
                    <select name="sumber_pendaftaran" class="form-control">
                      <option value="offline" {{ old('sumber_pendaftaran') == 'offline' ? 'selected' : '' }}>Offline</option>
                      <option value="online" {{ old('sumber_pendaftaran') == 'online' ? 'selected' : '' }}>Online</option>
                    </select>
                  </div>
                </div> --}}

                <hr />
                <div class="row mt-3">
                  <div class="mb-3 col-lg-4 col-md-6">
                    <label class="form-label">Email Akun</label>
                    <input type="email" name="account_email" value="{{ old('account_email') }}" class="form-control">
                  </div>

                  <div class="mb-3 col-lg-4 col-md-6">
                    <label class="form-label">Password Akun</label>
                    <input type="password" name="password" class="form-control" autocomplete="new-password">
                  </div>

                  <div class="mb-3 col-lg-4 col-md-6">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                  </div>
                </div>

                <div class="form-actions w-100">
                    <a href="/" class="btn btn-cancel btn-lg">Batal</a>
                    <button type="submit" class="btn btn-primary btn-lg btn-submit">Daftar Sekarang</button>
                  </div>
                </div>
              </form>

                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tom Select (Bootstrap 5 theme) -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    <script>
      // initialize Tom Select for the new Jenis Kelas dropdown
      new TomSelect('#jenis_kelas', { create: false, placeholder: 'Pilih jenis kelas...' });
    </script>
  </body>
</html>