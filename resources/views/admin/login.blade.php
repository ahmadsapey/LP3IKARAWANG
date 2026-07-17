<!doctype html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - LP3I Karawang</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --brand-dark: #004269;
            --brand-accent: #009DA5;
            --brand-blue: #0077b6;
            --error-color: #e63946;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--brand-dark) 0%, #001f33 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 1.5rem;
        }

        /* Ambient Background Blobs */
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 1;
            opacity: 0.35;
            animation: floatBlob 10s ease-in-out infinite alternate;
        }

        .blob-1 {
            width: 300px;
            height: 300px;
            background: var(--brand-accent);
            top: -50px;
            left: -50px;
        }

        .blob-2 {
            width: 400px;
            height: 400px;
            background: var(--brand-blue);
            bottom: -100px;
            right: -100px;
            animation-delay: -3s;
        }

        @keyframes floatBlob {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(50px, 30px) scale(1.1); }
        }

        /* Glassmorphism Card */
        .login-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px) saturate(120%);
            -webkit-backdrop-filter: blur(16px) saturate(120%);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #fff;
            padding: 3rem 2.5rem;
            border-radius: 20px;
            max-width: 440px;
            width: 100%;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            z-index: 10;
            position: relative;
            animation: cardAppear 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes cardAppear {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .logo-section {
            text-align: center;
            margin-bottom: 2.25rem;
        }

        .logo-section i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #fff 0%, var(--brand-accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.75rem;
        }

        .logo-section h2 {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        .logo-section p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.85);
            letter-spacing: 0.3px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
            font-size: 1.1rem;
            transition: color 0.3s;
        }

        .form-control {
            width: 100%;
            padding: 0.9rem 1.25rem 0.9rem 3.25rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.3s;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .form-control:focus {
            border-color: var(--brand-accent);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 4px rgba(0, 157, 165, 0.2);
        }

        .form-control:focus + i {
            color: var(--brand-accent);
        }

        .help {
            color: rgba(255, 255, 255, 0.55);
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: block;
            line-height: 1.4;
        }

        .error-alert {
            background: rgba(230, 57, 70, 0.15);
            border: 1px solid rgba(230, 57, 70, 0.3);
            color: #ff9fa5;
            padding: 0.9rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: shake 0.4s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        .btn-submit {
            width: 100%;
            padding: 0.95rem;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--brand-accent) 0%, #00828a 100%);
            color: #fff;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s;
            box-shadow: 0 8px 24px rgba(0, 157, 165, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(0, 157, 165, 0.45);
            background: linear-gradient(135deg, #00b3bd 0%, var(--brand-accent) 100%);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .footer-note {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.4);
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 2.25rem 1.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- Background Decoration -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="login-card">
        <div class="logo-section">
            <i class="fa-solid fa-user-shield"></i>
            <h2>Admin LP3I</h2>
            <p>Portal Pengelolaan Konten Website</p>
        </div>

        @if($errors->any())
            <div class="error-alert">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form method="POST" action="{{ url('/admin/login') }}">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-wrapper">
                    <input id="username" name="username" type="text" class="form-control" required autofocus placeholder="Masukkan username">
                    <i class="fa-solid fa-user"></i>
                </div>
                <small class="help">Gunakan username admin Anda (bukan alamat email).</small>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input id="password" name="password" type="password" class="form-control" required placeholder="••••••••">
                    <i class="fa-solid fa-lock"></i>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <span>Masuk Ke Panel</span>
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </button>
        </form>

        <div class="footer-note">
            &copy; 2026 LP3I Karawang. All rights reserved.
        </div>
    </div>

</body>
</html>