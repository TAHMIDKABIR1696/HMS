<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenCare Hospital Management System</title>
    <link href="https://fonts.bunny.net/css?instrument-sans:400,500,600|poppins:400,500,600,700" rel="stylesheet">
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
            flex-direction: column;
            margin: 0;
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 25%, #f1f8e9 50%, #c8e6c9 75%, #e8f5e9 100%);
        }

        /* Full page container */
        .container {
            display: flex;
            flex-direction: column;
            flex: 1;
            width: 100%;
            height: 100%;
            border-radius: 0;
            box-shadow: none;
        }

        /* Enhanced header with better visual hierarchy */
        header {
            background: linear-gradient(135deg, #2e7d32 0%, #388e3c 50%, #4caf50 100%);
            padding: 20px 30px;
            text-align: center;
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(30deg);
        }

        /* Fill available space */
        .main-content {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            gap: 20px;
        }

        /* Enhanced footer */
        footer {
            background: linear-gradient(to right, #1b5e20, #2e7d32);
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 0.9rem;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }
        
        .logo {
            width: 90px;
            height: 90px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .logo i {
            font-size: 45px;
            color: #2e7d32;
            transition: color 0.3s ease;
        }
        
        h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 2.8rem;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
            position: relative;
            z-index: 1;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
        
        .tagline {
            font-style: italic;
            font-weight: 500;
            margin-bottom: 10px;
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }
        
        .welcome-section {
            flex: 1;
            min-width: 300px;
            padding: 40px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }
        
        .welcome-section:hover {
            transform: translateY(-5px);
        }
        
        .welcome-section h2 {
            font-family: 'Poppins', sans-serif;
            color: #2e7d32;
            margin-bottom: 20px;
            font-size: 1.9rem;
            position: relative;
            padding-bottom: 10px;
        }
        
        .welcome-section h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, #4caf50, #81c784);
            border-radius: 2px;
        }
        
        .welcome-section p {
            line-height: 1.7;
            margin-bottom: 20px;
            color: #424242;
        }
        
        .slogan {
            background: linear-gradient(to right, #e8f5e9, #f1f8e9);
            padding: 25px;
            border-radius: 16px;
            margin: 25px 0;
            text-align: center;
            border-left: 5px solid #4caf50;
            position: relative;
            overflow: hidden;
        }
        
        .slogan::before {
            content: '"';
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 60px;
            color: #c8e6c9;
            font-family: 'Poppins', sans-serif;
            line-height: 1;
        }
        
        .slogan-text {
            font-size: 1.6rem;
            font-weight: 600;
            color: #1b5e20;
            font-style: italic;
            position: relative;
            z-index: 1;
        }
        
        .features {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 30px 0;
        }
        
        .feature {
            flex: 1;
            min-width: 120px;
            text-align: center;
            padding: 20px 15px;
            background: #f8fdf9;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8f5e9;
        }
        
        .feature:hover {
            transform: translateY(-8px);
            background: white;
            box-shadow: 0 12px 20px rgba(46, 125, 50, 0.15);
        }
        
        .feature i {
            font-size: 28px;
            color: #4caf50;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }
        
        .feature:hover i {
            transform: scale(1.2);
        }
        
        .feature p {
            font-weight: 600;
            color: #2e7d32;
        }
        
        .auth-section {
            flex: 1;
            min-width: 300px;
            padding: 40px;
            background: #f8fdf9;
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }
        
        .auth-section:hover {
            transform: translateY(-5px);
        }
        
        .auth-buttons {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            max-width: 320px;
        }
        
        .btn {
            padding: 18px 25px;
            border-radius: 50px;
            border: none;
            font-weight: 600;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-login {
            background: linear-gradient(to right, #2e7d32, #4caf50);
            color: white;
        }
        
        .btn-login:hover {
            background: linear-gradient(to right, #1b5e20, #2e7d32);
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(46, 125, 50, 0.4);
        }
        
        .btn-register {
            background: white;
            color: #2e7d32;
            border: 2px solid #4caf50;
        }
        
        .btn-register:hover {
            background: #e8f5e9;
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
        }
        
        .eco-message {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background: linear-gradient(to right, #c8e6c9, #e8f5e9);
            border-radius: 12px;
            font-size: 0.95rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .eco-message::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, #4caf50, #81c784);
        }
        
        .eco-message p {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: #1b5e20;
            font-weight: 500;
        }
        
        footer p {
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
                padding: 15px;
                gap: 15px;
            }
            
            h1 {
                font-size: 2.3rem;
            }
            
            .slogan-text {
                font-size: 1.3rem;
            }
            
            .welcome-section, .auth-section {
                padding: 25px;
            }
            
            .features {
                gap: 15px;
            }
            
            .feature {
                min-width: calc(50% - 15px);
            }
        }
        
        @media (max-width: 480px) {
            header {
                padding: 20px 15px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .logo {
                width: 70px;
                height: 70px;
            }
            
            .logo i {
                font-size: 35px;
            }
            
            .feature {
                min-width: 100%;
            }
            
            .btn {
                padding: 16px 20px;
                font-size: 1rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo-container">
                <div class="logo">
                    <i class="fas fa-heartbeat"></i>
                </div>
            </div>
            <h1>GreenCare HMS</h1>
            <p class="tagline">Sustainable Healthcare Management</p>
        </header>
        
        <div class="main-content">
            <div class="welcome-section">
                <h2>Welcome to Our Healthcare Community</h2>
                <p>At GreenCare, we believe in providing exceptional medical care while respecting our planet. Our hospital management system is designed to create a seamless experience for both patients and healthcare professionals.</p>
                
                <div class="slogan">
                    <p class="slogan-text">"A Welcome Place for Healing and for Practice."</p>
                </div>
                
                <p>Our eco-friendly approach ensures that we deliver top-quality healthcare while minimizing our environmental impact through sustainable practices and digital solutions.</p>
                
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-leaf"></i>
                        <p>Sustainable</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-user-md"></i>
                        <p>Professional</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-hand-holding-heart"></i>
                        <p>Caring</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-laptop-medical"></i>
                        <p>Digital</p>
                    </div>
                </div>
            </div>
            
            <div class="auth-section">
                <div class="auth-buttons">
                    <a href="{{ url('/login') }}" class="btn btn-login">
                        <i class="fas fa-sign-in-alt"></i> Login to Account
                    </a>
                    <a href="{{ url('/register') }}" class="btn btn-register">
                        <i class="fas fa-user-plus"></i> Register New Account
                    </a>
                </div>
                                
                <div class="eco-message">
                    <p><i class="fas fa-recycle"></i> By going digital with our HMS, we've saved approximately 12,000 sheets of paper per month, contributing to a greener planet.</p>
                </div>
            </div>
        </div>
        
        <footer>
            <p>&copy; 2025 GreenCare Hospital Management System. Combining Healthcare Excellence with Environmental Responsibility.</p>
        </footer>
    </div>

    <script>
        // Simple animation for features
        document.addEventListener('DOMContentLoaded', function() {
            const features = document.querySelectorAll('.feature');
            
            features.forEach(feature => {
                feature.addEventListener('mouseenter', function() {
                    this.style.transition = 'all 0.3s ease';
                });
            });
            
            // Button functionality
            const loginBtn = document.querySelector('.btn-login');
            const registerBtn = document.querySelector('.btn-register');
            
            loginBtn.addEventListener('click', function() {
                
                // In a real application: window.location.href = '/login';
            });
            
            registerBtn.addEventListener('click', function() {
                
                // In a real application: window.location.href = '/register';
            });
        });
    </script>
</body>
</html>