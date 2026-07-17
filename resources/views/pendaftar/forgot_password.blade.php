<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="shortcut icon" href="{{ asset('images/logos/Logo_LP3I.png') }}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - LP3I Karawang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand-dark: #004269;
            --brand-accent: #009DA5;
            --brand-gradient: linear-gradient(135deg, #004269 0%, #0b7280 100%);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top left, #0b7280, var(--brand-dark));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            color: #fff;
        }

        .container {
            max-width: 450px;
            width: 100%;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
            overflow: hidden;
        }

        .header {
            padding: 2.5rem 2rem 1.5rem;
            text-align: center;
        }

        .icon-circle {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--brand-accent);
            font-size: 1.8rem;
        }

        .header h1 {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .header p {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.5;
        }

        .content { padding: 0 2rem 2.5rem; }

        /* Alerts */
        .alert {
            padding: 0.9rem 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.85rem;
        }
        .alert-success { background: rgba(40, 167, 69, 0.2); border: 1px solid #28a745; color: #d4edda; }
        .alert-error { background: rgba(220, 53, 69, 0.2); border: 1px solid #dc3545; color: #f8d7da; }

        /* Form */
        .form-group { margin-bottom: 1.5rem; }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.9);
        }

        .input-icon-wrap { position: relative; }
        .input-icon-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
        }

        .form-group input {
            width: 100%;
            padding: 12px 12px 12px 42px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .form-group input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--brand-accent);
            box-shadow: 0 0 0 4px rgba(0, 157, 165, 0.2);
        }

        .form-group input::placeholder { color: rgba(255, 255, 255, 0.4); }

        /* Buttons */
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
            margin-top: 1.5rem;
        }

        button, .btn {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: none;
            font-family: inherit;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--brand-accent);
            color: white;
            box-shadow: 0 10px 20px rgba(0, 157, 165, 0.2);
        }

        .btn-primary:hover {
            filter: brightness(1.1);
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(0, 157, 165, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-secondary:hover { background: rgba(255, 255, 255, 0.2); }

        .footer-link {
            text-align: center;
            margin-top: 1.8rem;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .footer-link a {
            color: var(--brand-accent);
            text-decoration: none;
            font-weight: 600;
        }

        .footer-link a:hover { text-decoration: underline; }

        @media (max-width: 480px) {
            .container { border-radius: 0; position: fixed; inset: 0; max-width: 100%; display: flex; flex-direction: column; justify-content: center; }
            body { padding: 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="icon-circle">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h1>Atur Ulang Password</h1>
            <p>Masukkan email Anda untuk menerima kode verifikasi keamanan.</p>
        </div>

        <div class="content">
            @if ($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Email tidak ditemukan atau tidak valid.</span>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('pendaftar.send-reset-code') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-envelope"></i>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="nama@email.com"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn-primary">
                        Kirim Kode Reset <i class="fas fa-paper-plane"></i>
                    </button>
                    <a href="{{ route('pendaftar.login') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Login
                    </a>
                </div>
            </form>

            <div class="footer-link">
                Butuh bantuan lain? <a href="https://wa.me/6285891602476">Hubungi Admin</a>
            </div>
        </div>
    </div>
</body>
</html>