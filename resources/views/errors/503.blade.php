<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 - Sedang Dalam Pemeliharaan | HalloEO</title>
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
            animation: rotate 4s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
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

        .timer {
            background: var(--pastel-blue);
            color: white;
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .timer h3 {
            font-family: 'Fredoka', sans-serif;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .timer p {
            font-size: 2rem;
            font-weight: 600;
            font-family: 'Fredoka', sans-serif;
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

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .contact-info {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e0e0e0;
        }

        .contact-info h4 {
            font-family: 'Fredoka', sans-serif;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .contact-methods {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .contact-method {
            padding: 0.8rem 1.5rem;
            background: var(--pastel-green);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .contact-method:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
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

            .error-actions, .contact-methods {
                flex-direction: column;
            }

            .btn, .contact-method {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-cog"></i>
        </div>
        
        <h1 class="error-code">503</h1>
        <h2 class="error-title">Sedang Dalam Pemeliharaan</h2>
        
        <p class="error-message">
            Kami sedang melakukan pemeliharaan untuk meningkatkan kualitas layanan. 
            Website akan kembali normal dalam waktu singkat. Terima kasih atas pengertian Anda!
        </p>

        <div class="timer">
            <h3><i class="fas fa-clock"></i> Perkiraan Waktu Selesai</h3>
            <p id="countdown">Segera kembali...</p>
        </div>

        <div class="error-actions">
            <a href="javascript:location.reload()" class="btn btn-primary">
                <i class="fas fa-sync"></i> Coba Lagi
            </a>
        </div>

        <div class="contact-info">
            <h4>Butuh bantuan mendesak?</h4>
            <div class="contact-methods">
                <a href="https://wa.me/6281234567890" class="contact-method">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a href="mailto:info@halloeo.com" class="contact-method">
                    <i class="fas fa-envelope"></i> Email
                </a>
            </div>
        </div>
    </div>

    <script>
        // Optional: Auto-refresh countdown
        setInterval(function() {
            location.reload();
        }, 60000); // Refresh every 60 seconds
    </script>
</body>
</html>
