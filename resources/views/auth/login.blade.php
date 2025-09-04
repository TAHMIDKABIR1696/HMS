<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GreenCare HMS</title>
    <link href="https://fonts.bunny.net/css?instrument-sans:400,500,600|poppins:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Instrument Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 25%, #f1f8e9 50%, #c8e6c9 75%, #e8f5e9 100%);
            padding: 20px;
        }
        
        .login-container {
            max-width: 440px;
            width: 100%;
            margin: auto;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .login-header {
            background: linear-gradient(135deg, #2e7d32 0%, #388e3c 50%, #4caf50 100%);
            padding: 30px;
            text-align: center;
            color: white;
            position: relative;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .logo i {
            font-size: 40px;
            color: #2e7d32;
        }
        
        .login-header h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 5px;
        }
        
        .login-header p {
            opacity: 0.9;
        }
        
        .login-form {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #2e7d32;
            font-size: 0.95rem;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #4caf50;
            z-index: 2;
        }
        
        .form-input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 2px solid #e8f5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            background: #f8fdf9;
            font-family: inherit;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
            background: white;
        }
        
        .error-message {
            color: #e53935;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 25px 0;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            width: 18px;
            height: 18px;
            accent-color: #4caf50;
            margin-right: 8px;
            cursor: pointer;
        }
        
        .remember-me label {
            color: #555;
            cursor: pointer;
            font-size: 0.95rem;
        }
        
        .forgot-password {
            color: #2e7d32;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s;
        }
        
        .forgot-password:hover {
            color: #1b5e20;
            text-decoration: underline;
        }
        
        .login-button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, #2e7d32, #4caf50);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(46, 125, 50, 0.3);
            font-family: inherit;
        }
        
        .login-button:hover {
            background: linear-gradient(to right, #1b5e20, #2e7d32);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(46, 125, 50, 0.4);
        }
        
        .session-status {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.95rem;
            border-left: 4px solid #4caf50;
        }
        
        .input-error {
            color: #e53935;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }
        
        @media (max-width: 480px) {
            .login-container {
                border-radius: 12px;
            }
            
            .login-header {
                padding: 25px 20px;
            }
            
            .login-form {
                padding: 25px 20px;
            }
            
            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <i class="fas fa-leaf"></i>
            </div>
            <h1>GreenCare HMS</h1>
            <p>Hospital Management System</p>
        </div>
        
        <div class="login-form">
            @if(session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Enter your email">
                    </div>
                    @error('email')
                        <div class="input-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                    </div>
                    @error('password')
                        <div class="input-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="remember-forgot">
                    <div class="remember-me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <label for="remember_me">Remember me</label>
                    </div>
                    
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="login-button">
                    Log In
                </button>
            </form>
        </div>
    </div>

    <script>
        // Simple form interaction enhancements
        document.addEventListener('DOMContentLoaded', function() {
            const formInputs = document.querySelectorAll('.form-input');
            
            formInputs.forEach(input => {
                // Add focus effect
                input.addEventListener('focus', function() {
                    this.parentElement.querySelector('i').style.color = '#2e7d32';
                });
                
                // Remove focus effect
                input.addEventListener('blur', function() {
                    this.parentElement.querySelector('i').style.color = '#4caf50';
                });
            });
            
            // Login button animation
            const loginBtn = document.querySelector('.login-button');
            
            loginBtn.addEventListener('mousedown', function() {
                this.style.transform = 'translateY(0)';
            });
            
            loginBtn.addEventListener('mouseup', function() {
                this.style.transform = 'translateY(-2px)';
            });
        });
    </script>
</body>
</html>