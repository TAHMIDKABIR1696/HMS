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
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 25%, #f1f8e9 50%, #c8e6c9 75%, #e8f5e9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #2e7d32;
        }
        
        .container {
            max-width: 1000px;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(56, 142, 60, 0.2);
            display: flex;
            flex-direction: column;
        }
        
        header {
            background: linear-gradient(to right, #2e7d32, #4caf50);
            padding: 20px;
            text-align: center;
            color: white;
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .logo i {
            font-size: 40px;
            color: #2e7d32;
        }
        
        h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .tagline {
            font-style: italic;
            font-weight: 500;
            margin-bottom: 10px;
        }
        
        .main-content {
            display: flex;
            flex-wrap: wrap;
        }
        
        .welcome-section {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            background: white;
        }
        
        .welcome-section h2 {
            font-family: 'Poppins', sans-serif;
            color: #2e7d32;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        
        .slogan {
            background: #e8f5e9;
            padding: 20px;
            border-radius: 12px;
            margin: 20px 0;
            text-align: center;
            border-left: 5px solid #4caf50;
        }
        
        .slogan-text {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1b5e20;
            font-style: italic;
        }
        
        .features {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 25px 0;
        }
        
        .feature {
            flex: 1;
            min-width: 120px;
            text-align: center;
            padding: 15px;
            background: #f1f8e9;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        
        .feature:hover {
            transform: translateY(-5px);
            background: #e8f5e9;
        }
        
        .feature i {
            font-size: 24px;
            color: #4caf50;
            margin-bottom: 10px;
        }
        
        .auth-section {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            background: #f1f8e9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .auth-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
            max-width: 300px;
        }
        
        .btn {
            padding: 15px 25px;
            border-radius: 50px;
            border: none;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-login {
            background: #2e7d32;
            color: white;
        }
        
        .btn-login:hover {
            background: #1b5e20;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.3);
        }
        
        .btn-register {
            background: white;
            color: #2e7d32;
            border: 2px solid #4caf50;
        }
        
        .btn-register:hover {
            background: #e8f5e9;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.2);
        }
        
        .eco-message {
            text-align: center;
            margin-top: 30px;
            padding: 15px;
            background: #c8e6c9;
            border-radius: 10px;
            font-size: 0.9rem;
        }
        
        footer {
            background: #1b5e20;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .slogan-text {
                font-size: 1.2rem;
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