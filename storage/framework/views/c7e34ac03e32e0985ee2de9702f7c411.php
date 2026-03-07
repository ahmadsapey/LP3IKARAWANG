<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login Pendaftar</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --brand-dark: #004269;
      --brand-accent: #009DA5;
      --glass-bg: rgba(255, 255, 255, 0.12);
      --glass-border: rgba(255, 255, 255, 0.25);
      --input-bg: rgba(255, 255, 255, 0.08);
    }

    * { box-sizing: border-box; }

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: radial-gradient(circle at top left, #0b7280, var(--brand-dark));
      color: #fff;
      overflow-x: hidden;
    }

    /* Floating Background Elements */
    .lp3i-page-anim { position: fixed; inset: 0; z-index: 0; pointer-events: none; }
    .lp3i-anim-img {
      position: absolute;
      width: 120px;
      opacity: 0.1;
      filter: blur(1px);
      animation: lp3i-float 15s infinite ease-in-out alternate;
    }
    .lp3i-anim-img:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
    .lp3i-anim-img:nth-child(2) { top: 60%; left: 80%; animation-delay: -5s; width: 150px; }
    .lp3i-anim-img:nth-child(3) { top: 75%; left: 15%; animation-delay: -10s; width: 80px; }

    @keyframes lp3i-float {
      0% { transform: translate(0, 0) rotate(0deg); }
      100% { transform: translate(30px, 50px) rotate(15deg); }
    }

    /* Card Styling */
    .card {
      width: 90%;
      max-width: 420px;
      padding: 3rem 2.5rem;
      background: var(--glass-bg);
      border-radius: 24px;
      border: 1px solid var(--glass-border);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
      z-index: 1;
      transition: transform 0.3s ease;
    }

    .logo-wrap { margin-bottom: 1.5rem; }
    .logo-wrap img { height: 55px; filter: drop-shadow(0 4px 10px rgba(0,0,0,0.2)); }

    .login-title { 
      font-weight: 700; 
      letter-spacing: 2px; 
      margin-bottom: 0.5rem; 
      text-transform: uppercase;
    }
    
    .lead { 
      font-size: 0.85rem; 
      color: rgba(255, 255, 255, 0.7); 
      margin-bottom: 2rem; 
      line-height: 1.5;
    }

    /* Alerts */
    .alert-success, .alert-error {
      padding: 0.8rem;
      border-radius: 10px;
      margin-bottom: 1.5rem;
      font-size: 0.85rem;
      border-left: 4px solid;
    }
    .alert-success { background: rgba(40, 167, 69, 0.2); border-color: #28a745; color: #d4edda; }
    .alert-error { background: rgba(220, 53, 69, 0.2); border-color: #dc3545; color: #f8d7da; }

    /* Forms */
    .form-group { margin-bottom: 1.5rem; text-align: left; }
    .form-label { 
      font-size: 0.8rem; 
      font-weight: 600; 
      text-transform: uppercase; 
      letter-spacing: 1px; 
      margin-bottom: 8px; 
      display: block;
      color: rgba(255,255,255,0.9);
    }

    .input-wrap { position: relative; }
    .form-control {
      width: 100%;
      padding: 12px 16px;
      background: var(--input-bg);
      border: 1px solid var(--glass-border);
      border-radius: 12px;
      color: #fff;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      outline: none;
      background: rgba(255,255,255,0.15);
      border-color: var(--brand-accent);
      box-shadow: 0 0 0 4px rgba(0, 157, 165, 0.2);
    }

    .forgot { 
      font-size: 0.75rem; 
      color: var(--brand-accent); 
      text-decoration: none; 
      font-weight: 600;
      transition: opacity 0.2s;
    }
    .forgot:hover { opacity: 0.8; text-decoration: underline; }

    /* Button */
    .btn-primary {
      width: 100%;
      padding: 14px;
      margin-top: 1rem;
      border-radius: 12px;
      border: none;
      background: linear-gradient(135deg, var(--brand-accent), var(--brand-dark));
      color: white;
      font-weight: 700;
      font-size: 1rem;
      cursor: pointer;
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 15px 25px rgba(0, 157, 165, 0.3);
      filter: brightness(1.1);
    }

    .btn-primary:active { transform: translateY(0); }

    .small-note { 
      margin-top: 1.5rem; 
      font-size: 0.85rem; 
      color: rgba(255,255,255,0.7); 
    }
    .small-note a { color: var(--brand-accent); font-weight: 700; text-decoration: none; }
    .small-note a:hover { text-decoration: underline; }

    @media (max-width: 480px) {
      .card { padding: 2rem 1.5rem; }
      .lp3i-anim-img { width: 60px; }
    }
  </style>
</head>
<body>
  <div class="lp3i-page-anim" aria-hidden="true">
    <div class="lp3i-anim-area">
      <img src="<?php echo e(asset('image/SIMBOLISASE.png')); ?>" class="lp3i-anim-img" style="--i:0;" alt="">
      <img src="<?php echo e(asset('image/SIMBOLISASIOAA.png')); ?>" class="lp3i-anim-img" style="--i:1;" alt="">
      <img src="<?php echo e(asset('image/SIMBOLISAIS.png')); ?>" class="lp3i-anim-img" style="--i:2;" alt="">
    </div>
  </div>

  <div class="card">
    <div class="logo-wrap">
      <img src="<?php echo e(asset('storage/image/LOGO_LP3I_BLUE.png')); ?>" alt="LP3I Karawang">
    </div>
    
    <h2 class="login-title">Selamat Datang</h2>
    <p class="lead">Silakan masuk untuk memantau status pendaftaran kuliah Anda.</p>

    <?php if(session('success')): ?> <div class="alert-success"><?php echo e(session('success')); ?></div> <?php endif; ?>
    <?php if($errors->any()): ?> <div class="alert-error"><?php echo e($errors->first()); ?></div> <?php endif; ?>

    <form action="<?php echo e(route('pendaftar.login.post')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <div class="form-group">
        <label class="form-label">Alamat Email</label>
        <div class="input-wrap">
          <input type="email" name="email" required class="form-control" placeholder="nama@email.com" autocomplete="email">
        </div>
      </div>

      <div class="form-group">
        <div style="display:flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
            <label class="form-label" style="margin-bottom:0">Password</label>
            <a href="<?php echo e(route('pendaftar.forgot-password')); ?>" class="forgot">Lupa?</a>
        </div>
        <div class="input-wrap">
          <input type="password" name="password" required class="form-control" placeholder="••••••••" autocomplete="current-password">
        </div>
      </div>

      <button class="btn-primary" type="submit">Masuk Sekarang</button>
      
      <div class="small-note">
        Belum memiliki akun? <a href="<?php echo e(route('mahasiswa.create')); ?>">Daftar Disini</a>
      </div>
    </form>
  </div>
</body>
</html><?php /**PATH D:\Lp3i\LP3IKARAWANG\resources\views/pendaftar/login.blade.php ENDPATH**/ ?>