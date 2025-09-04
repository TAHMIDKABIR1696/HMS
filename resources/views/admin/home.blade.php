<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCare - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2e7d32;
            --primary-dark: #1b5e20;
            --primary-light: #4caf50;
            --primary-bg: #e8f5e9;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
            --white: #ffffff;
            --sidebar-width: 260px;
            --header-height: 80px;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        html, body { height: 100%; }
        body { 
            font-family:'Poppins', sans-serif; 
            background: linear-gradient(135deg, #f0f7f4 0%, #e0f2e9 100%);
            color:var(--text-dark); 
            line-height:1.6; 
            overflow: hidden;
        }

        .app-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header { 
            background:linear-gradient(to right,var(--primary),var(--primary-dark)); 
            height: var(--header-height);
            color:var(--white); 
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .header h2 { 
            font-size:28px; 
            font-weight:600; 
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
        }

        /* Layout */
        .main-layout {
            display:flex;
            height: calc(100% - var(--header-height));
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar { 
            width: var(--sidebar-width);
            background:linear-gradient(to bottom, var(--primary-dark), var(--primary));
            color:var(--white);
            padding:25px 0;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            box-shadow: 4px 0 12px rgba(0,0,0,0.1);
        }
        .logo { 
            padding:0 25px 25px; 
            border-bottom:1px solid rgba(255,255,255,0.1); 
            display:flex; 
            align-items:center; 
            gap:12px; 
        }
        .logo i { 
            font-size:28px; 
        }
        .logo h1 { 
            font-size:22px; 
            font-weight:600;
        }
        .nav-links { 
            list-style:none; 
            padding:25px 15px;
            flex-grow: 1;
        }
        .nav-links li { 
            margin-bottom:10px; 
        }
        .nav-links a { 
            display:flex; 
            align-items:center; 
            gap:12px; 
            padding:14px 15px; 
            color:rgba(255,255,255,0.9); 
            text-decoration:none; 
            border-radius:8px; 
            transition:all 0.3s;
        }
        .nav-links a:hover, .nav-links a.active { 
            background-color: rgba(255,255,255,0.1); 
            color: var(--white); 
        }
        .nav-links i { 
            width:20px; 
            text-align:center; 
        }

        /* Content */
        .content-area { 
            flex:1; 
            padding:30px;
            overflow-y: auto;
            background: #f9fbf9;
        }

        /* Dashboard Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: var(--white);
            border-radius: 16px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .stat-info h3 {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 5px;
        }
        .stat-info p {
            color: var(--text-light);
            font-size: 14px;
            font-weight: 500;
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .patients-icon { background: #d1e7ff; color: #0d6efd; }
        .doctors-icon { background: #e0d4f9; color: #6f42c1; }
        .appointments-icon { background: #d5f0e0; color: #198754; }
        .ambulance-icon { background: #f8d7da; color: #dc3545; }

        /* Quick Actions */
        .section-title {
            font-size: 22px;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        .action-button {
            display: block;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 5px 15px rgba(46,125,50,0.3);
            transition: all 0.3s;
        }
        .action-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(46,125,50,0.4);
        }

        /* Responsive */
        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 70px;
            }
            .logo h1, .nav-links a span {
                display: none;
            }
            .logo {
                justify-content: center;
                padding: 0 10px 20px;
            }
            .nav-links {
                padding: 20px 5px;
            }
            .nav-links a {
                justify-content: center;
                padding: 15px;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .actions-grid {
                grid-template-columns: 1fr;
            }
            .header {
                padding: 0 20px;
            }
            .header h2 {
                font-size: 20px;
            }
            .content-area {
                padding: 20px;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                height: 60px;
                width: 100%;
                z-index: 100;
                flex-direction: row;
                padding: 0;
            }
            .logo {
                display: none;
            }
            .nav-links {
                display: flex;
                padding: 0;
                width: 100%;
                justify-content: space-around;
            }
            .nav-links li {
                margin: 0;
                flex: 1;
                display: flex;
                justify-content: center;
            }
            .nav-links a {
                padding: 12px;
                border-radius: 0;
                width: 100%;
                justify-content: center;
            }
            .main-layout {
                flex-direction: column;
            }
            .content-area {
                margin-bottom: 60px;
            }
        }

        /* Scrollbar styling */
        .content-area::-webkit-scrollbar {
            width: 8px;
        }

        .content-area::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .content-area::-webkit-scrollbar-thumb {
            background: var(--primary-light);
            border-radius: 10px;
        }

        .content-area::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }
    </style>
</head>
<body>
<div class="app-container">
    <div class="header">
        <h2><i class="fas fa-heartbeat"></i> EcoCare HMS</h2>
        <div class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <div style="font-weight: 600;">{{ Auth::user()->name }}</div>
                <div style="font-size: 13px; opacity: 0.8;">Administrator</div>
            </div>
        </div>
    </div>
    <div class="main-layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <h1>EcoCare HMS</h1>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('admin.home') }}" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="#"><i class="fas fa-users"></i> <span>Patients</span></a></li>
                <li><a href="#"><i class="fas fa-user-md"></i> <span>Doctors</span></a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="content-area">
            <h2 style="font-size: 28px; font-weight: 700; color: var(--primary-dark); margin-bottom: 20px;">
                👋 Welcome, {{ Auth::user()->name }}!
            </h2>

            <!-- Quick Actions -->
            <div>
                <h3 class="section-title"><i class="fas fa-bolt"></i> Quick Actions</h3>
                <div class="actions-grid">
                    <a href="{{ route('admin.patient') }}" class="action-button">
                        Manage Patients
                    </a>
                    <a href="{{ route('admin.doctor') }}" class="action-button">
                        Manage Doctors
                    </a>
                    <a href="{{ route('admin.ambulance.bookings') }}" class="action-button">
                        View Ambulance Bookings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Responsive sidebar behavior
    function handleSidebar() {
        if (window.innerWidth <= 900) {
            document.querySelectorAll('.nav-links a span').forEach(span => {
                span.style.display = 'none';
            });
            document.querySelector('.logo h1').style.display = 'none';
            document.querySelector('.logo').style.justifyContent = 'center';
        } else {
            document.querySelectorAll('.nav-links a span').forEach(span => {
                span.style.display = 'inline';
            });
            document.querySelector('.logo h1').style.display = 'block';
        }
    }
    
    // Initial call
    handleSidebar();
    
    // Listen for window resize
    window.addEventListener('resize', handleSidebar);
});
</script>
</body>
</html>