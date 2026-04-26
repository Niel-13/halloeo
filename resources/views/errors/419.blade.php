<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Halaman Kadaluarsa | HalloEO</title>
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

        .info-box {
            margin-top: 2rem;
            padding: 1.5rem;
            background: #fff3cd;
            border-radius: 15px;
            border-left: 4px solid #ffc107;
        }

        .info-box h4 {
            font-family: 'Fredoka', sans-serif;
            color: #856404;
            margin-bottom: 0.5rem;
        }

        .info-box p {
            color: #856404;
            font-size: 0.95rem;
            line-height: 1.6;
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
            <i class="fas fa-hourglass-end"></i>
        </div>
        
        <h1 class="error-code">419</h1>
        <h2 class="error-title">Halaman Kadaluarsa</h2>
        
        <p class="error-message">
            Sesi Anda telah kadaluarsa karena tidak ada aktivitas dalam waktu yang lama. 
            Untuk keamanan data Anda, silakan muat ulang halaman dan coba lagi.
        </p>

        <div class="error-actions">
            <a href="javascript:location.reload()" class="btn btn-primary">
                <i class="fas fa-sync"></i> Muat Ulang Halaman
            </a>
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="fas fa-home"></i> Kembali ke Beranda
            </a>
        </div>

        <div class="info-box">
            <h4><i class="fas fa-lightbulb"></i> Tips:</h4>
            <p>
                Jika Anda sedang mengisi form, pastikan untuk tidak meninggalkan halaman terlalu lama. 
                Data yang sudah Anda isi mungkin akan hilang setelah reload.
            </p>
        </div>
    </div>
</body>
</html>
