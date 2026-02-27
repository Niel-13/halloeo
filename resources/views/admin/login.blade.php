<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - HalloEO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair Display:wght@400;600;700&family=Outfit:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #A8D8EA 0%, #B8E0D2 50%, #D88A8A 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-container {
            background: white;
            padding: 3rem;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            max-width: 450px;
            width: 100%;
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

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo{
            width: 130px;
            height: 130px;
            margin: 0 auto 1.5rem auto;            border-radius: 50%;
            background: #f0f4f8; 
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow:  0 4px 8px rgba(0,0,0,0.1), inset 0 2px 4px rgba(255,255,255,0.5);
            overflow: hidden;
        }

        .logo img {
            width: 90%;
            height: auto;
            object-fit: contain;
        }

        .login-header h2 {
            font-family: 'Playfair Display', sans-serif;
            color: #2C3E50;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #7f8c8d;
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2C3E50;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: 'Outfit', sans-serif;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #A8D8EA;
            box-shadow: 0 0 0 3px rgba(168, 216, 234, 0.2);
        }

        .btn-login {
            width: 100%;
            padding: 1.2rem;
            background: linear-gradient(135deg, #A8D8EA, #B8E0D2);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Playfair Display', sans-serif;
            margin-top: 1rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .login-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e0e0e0;
        }

        .login-footer a {
            color: #6FA8DC;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-footer a:hover {
            color: #2C3E50;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <img src="{{ asset('images/logohalloeo.png') }}" alt="Logo HalloEO">
            </div>
            <h2>Admin Panel</h2>
            <p>Login untuk mengelola website</p>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="username">
                    <i class="fas fa-user"></i> Username
                </label>
                <input type="text" id="username" name="username" required autofocus placeholder="Masukkan username">
            </div>

            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i> Password
                </label>
                <input type="password" id="password" name="password" required placeholder="Masukkan password">
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <div class="login-footer">
            <a href="{{ route('home') }}">
                <i class="fas fa-arrow-left"></i> Kembali ke Website
            </a>
        </div>
    </div>
</body>
</html>