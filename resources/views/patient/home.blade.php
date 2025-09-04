<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCare - Patient Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f7f4;
            color: #2c3e50;
            line-height: 1.6;
        }
        
        .app-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(to bottom, #2e7d32, #1b5e20);
            color: white;
            padding: 20px 0;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        
        .logo {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo img {
            width: 40px;
            height: 40px;
        }
        
        .logo h1 {
            font-size: 22px;
            font-weight: 600;
        }
        
        .nav-links {
            list-style: none;
            padding: 0 15px;
        }
        
        .nav-links li {
            margin-bottom: 5px;
        }
        
        .nav-links a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .nav-links a:hover, .nav-links a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .nav-links i {
            width: 20px;
            text-align: center;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .header {
            background-color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .welcome h2 {
            font-size: 24px;
            font-weight: 600;
            color: #2e7d32;
        }
        
        .welcome p {
            color: #7f8c8d;
            font-size: 14px;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-info {
            text-align: right;
        }
        
        .user-info .name {
            font-weight: 500;
            color: #2c3e50;
        }
        
        .user-info .role {
            font-size: 13px;
            color: #7f8c8d;
        }
        
        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: #2e7d32;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 18px;
        }
        
        /* Dashboard Content */
        .dashboard-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }
        
        .quick-actions {
            margin-bottom: 30px;
        }
        
        .quick-actions h3 {
            font-size: 20px;
            font-weight: 600;
            color: #2e7d32;
            margin-bottom: 20px;
            padding-left: 10px;
            border-left: 4px solid #2e7d32;
        }
        
        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }
        
        .action-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            cursor: pointer;
            border: 1px solid rgba(46, 125, 50, 0.1);
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .action-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            background-color: #e8f5e9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #2e7d32;
        }
        
        .action-card h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        
        .action-card p {
            color: #7f8c8d;
            font-size: 14px;
        }
        
        /* Appointments */
        .appointments {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .section-header h3 {
            font-size: 20px;
            font-weight: 600;
            color: #2e7d32;
        }
        
        .view-all {
            color: #2e7d32;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .appointment-list {
            display: grid;
            gap: 15px;
        }
        
        .appointment-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border-left: 4px solid #2e7d32;
        }
        
        .appointment-date {
            min-width: 70px;
            text-align: center;
            padding-right: 15px;
            border-right: 1px solid #eee;
            margin-right: 15px;
        }
        
        .appointment-date .day {
            font-size: 22px;
            font-weight: 700;
            color: #2e7d32;
        }
        
        .appointment-date .month {
            font-size: 14px;
            color: #7f8c8d;
        }
        
        .appointment-info {
            flex: 1;
        }
        
        .appointment-info h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .appointment-info p {
            font-size: 14px;
            color: #7f8c8d;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .appointment-status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-confirmed {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        
        /* Statistics */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        
        .stat-info h4 {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
        }
        
        .stat-info p {
            font-size: 14px;
            color: #7f8c8d;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .app-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                padding: 10px 0;
            }
            
            .nav-links {
                display: flex;
                overflow-x: auto;
                padding-bottom: 10px;
            }
            
            .nav-links li {
                margin-bottom: 0;
                margin-right: 5px;
            }
            
            .nav-links a {
                padding: 10px 15px;
                white-space: nowrap;
            }
        }
        
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .user-info {
                text-align: center;
            }
            
            .action-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <h1>EcoCare HMS</h1>
            </div>
            
            <ul class="nav-links">
                <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="{{ route('patient.profile') }}"><i class="fas fa-user"></i> Profile</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div class="welcome">
                    <h2>👋 Welcome, {{ Auth::user()->name }}</h2>
                    <p>Here's what's happening with your health today</p>
                </div>
                
                <div class="user-menu">
                    <div class="user-info">
                        <div class="name">{{ Auth::user()->name }}</div>
                        <div class="role">Patient</div>
                    </div>
                    <div class="avatar">P</div>
                </div>
            </div>
            
            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <h3>Quick Actions</h3>
                    <div class="action-grid">
                        <a href="{{ route('patient.book-appointment') }}" >

                            <div class="action-card" >
                                <div class="action-icon">
                                    <i class="fas fa-calendar-plus"></i>
                                </div>
                                <h4>Book Appointment</h4>
                                <p>Schedule with your doctor</p>
                            </div>
                        </a>

                        <a href="https://www.lazzpharma.com/">

                            <div class="action-card" >
                                <div class="action-icon">
                                    <i class="fas fa-pills"></i>
                                </div>
                                <h4>Medicine Store</h4>
                                <p>Order your medications</p>
                            </div>
                        </a>

                        <a href="{{ route('patient.ambulance-booking') }}">
                            <div class="action-card" >
                                <div class="action-icon">
                                    <i class="fas fa-ambulance"></i>
                                </div>
                                <h4>Book Ambulance</h4>
                                <p>Emergency services</p>
                            </div>
                        </a>

                        <a href="{{ route('patient.reports') }}">
                            <div class="action-card" >
                                <div class="action-icon">
                                    <i class="fas fa-file-medical"></i>
                                </div>
                                <h4>Medical Reports</h4>
                                <p>View your test results</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple JavaScript for interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Add active class to clicked nav items
            const navItems = document.querySelectorAll('.nav-links a');
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    navItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Action card click handlers
            const actionCards = document.querySelectorAll('.action-card');
            actionCards.forEach(card => {
                card.addEventListener('click', function() {
                    // In a real application, this would navigate to the appropriate page
                    console.log('Clicked: ' + this.querySelector('h4').textContent);
                });
            });
        });
    </script>
</body>
</html>