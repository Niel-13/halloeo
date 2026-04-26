<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | HalloEO</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&family=Outfit:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --pastel-blue: #A8D8EA;
            --pastel-green: #B8E0D2;
            --dark-pastel-red: #D88A8A;
            --dark: #2C3E50;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, var(--pastel-blue) 0%, var(--pastel-green) 50%, var(--dark-pastel-red) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .error-container {
            background: white;
            padding: 3rem;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            max-width: 600px;
            text-align: center;
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-icon {
            font-size: 8rem;
            background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .error-code {
            font-family: 'Fredoka', sans-serif;
            font-size: 4rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .error-title {
            font-family: 'Fredoka', sans-serif;
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .error-message {
            color: #7f8c8d;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .error-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--pastel-blue), var(--pastel-green));
            color: white;
        }

        .btn-secondary {
            background: transparent;
            color: var(--dark);
            border: 2px solid var(--dark);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .help-text {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e0e0e0;
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .error-container {
                padding: 2rem;
            }

            .error-icon {
                font-size: 5rem;
            }

            .error-code {
                font-size: 3rem;
            }

            .error-title {
                font-size: 1.5rem;
            }

            .error-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-lock"></i>
        </div>
        
        <h1 class="error-code">403</h1>
        <h2 class="error-title">Akses Ditolak</h2>
        
        <p class="error-message">
            Maaf, Anda tidak memiliki izin untuk mengakses halaman ini. 
            Halaman yang Anda coba akses memerlukan hak akses khusus.
        </p>

        <div class="error-actions">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-home"></i> Kembali ke Beranda
            </a>
            <a href="javascript:history.back()" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Halaman Sebelumnya
            </a>
        </div>

        <div class="help-text">
            <p>
                <i class="fas fa-info-circle"></i> 
                Jika Anda merasa ini adalah kesalahan, silakan 
                <a href="{{ route('contact') }}" style="color: var(--pastel-blue); text-decoration: none; font-weight: 600;">hubungi kami</a>.
            </p>
        </div>
    </div>
</body>
</html>
