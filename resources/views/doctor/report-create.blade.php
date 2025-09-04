<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Reports - EcoCare HMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2e7d32;
            --primary-dark: #1b5e20;
            --primary-light: #4caf50;
            --primary-bg: #e8f5e9;
            --accent: #8bc34a;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
            --white: #ffffff;
            --sidebar-width: 260px;
            --header-height: 80px;
            --transition-speed: 0.3s;
        }
        
        * { margin:0; padding:0; box-sizing:border-box; }
        
        html, body { 
            height: 100%; 
            overflow: hidden;
            font-family: 'Poppins', sans-serif; 
            background: linear-gradient(135deg, #f0f7f4 0%, #e0f2e9 100%);
            color: var(--text-dark); 
            line-height: 1.6;
        }
        
        .app-container {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            background: var(--white);
            box-shadow: 0 10px 30px rgba(46,125,50,0.15);
        }
        
        /* Header */
        .header { 
            background: linear-gradient(to right, var(--primary), var(--primary-dark)); 
            height: var(--header-height);
            color: var(--white); 
            display: flex;
            align-items: center;
            padding: 0 30px;
            flex-shrink: 0;
        }
        
        .header h2 { 
            font-size: 28px; 
            font-weight: 600; 
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        /* Layout */
        .main-layout {
            display: flex;
            height: calc(100% - var(--header-height));
            overflow: hidden;
        }
        
        /* Sidebar */
        .sidebar { 
            width: var(--sidebar-width);
            background: linear-gradient(to bottom, var(--primary-dark), var(--primary));
            color: var(--white);
            padding: 25px 0;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }
        
        .logo { 
            padding: 0 25px 25px; 
            border-bottom: 1px solid rgba(255,255,255,0.1); 
            display: flex; 
            align-items: center; 
            gap: 12px; 
        }
        
        .logo i { 
            font-size: 28px; 
        }
        
        .logo h1 { 
            font-size: 22px; 
            font-weight: 600;
        }
        
        .nav-links { 
            list-style: none; 
            padding: 25px 15px;
            flex-grow: 1;
        }
        
        .nav-links li { 
            margin-bottom: 10px; 
        }
        
        .nav-links a { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            padding: 14px 15px; 
            color: rgba(255,255,255,0.9); 
            text-decoration: none; 
            border-radius: 8px; 
            transition: all 0.3s;
        }
        
        .nav-links a:hover, .nav-links a.active { 
            background-color: rgba(255,255,255,0.1); 
            color: var(--white); 
        }
        
        .nav-links i { 
            width: 20px; 
            text-align: center; 
        }
        
        /* Content */
        .content-area { 
            flex: 1; 
            padding: 30px;
            overflow-y: auto;
            background: #f9fbf9;
        }
        
        .form-container {
            background: var(--white);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            max-width: 800px;
            margin: 0 auto;
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 25px;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        /* Alert */
        .alert-success {
            background: var(--primary-bg);
            color: var(--primary-dark);
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            border-left: 4px solid var(--primary);
        }
        
        .alert-success i {
            font-size: 20px;
        }
        
        /* Form */
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
        }
        
        select, textarea {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            background: #f9f9f9;
            font-family: 'Poppins', sans-serif;
        }
        
        select:focus, textarea:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(46,125,50,0.2);
            background: var(--white);
            transform: translateY(-2px);
        }
        
        textarea {
            min-height: 200px;
            resize: vertical;
        }
        
        .btn-primary {
            background: var(--primary);
            color: var(--white);
            border: none;
            padding: 16px 28px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46,125,50,0.3);
        }
        
        /* Toggle sidebar button */
        .toggle-sidebar {
            display: none;
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 100;
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
        
        /* Responsive */
        @media (max-width: 900px) {
            .sidebar {
                position: fixed;
                left: 0;
                top: var(--header-height);
                bottom: 0;
                z-index: 100;
                transform: translateX(-100%);
                transition: transform var(--transition-speed);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .toggle-sidebar {
                display: block;
            }
            
            .content-area {
                padding: 20px;
            }
        }
        
        @media (max-width: 600px) {
            .header {
                padding: 0 20px;
            }
            
            .header h2 {
                font-size: 20px;
            }
            
            .content-area {
                padding: 15px;
            }
            
            .form-container {
                padding: 20px;
            }
            
            .page-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="app-container">
        <div class="header">
            <h2><i class="fas fa-user-md"></i> Doctor Portal</h2>
            <button class="toggle-sidebar" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <div class="main-layout">
            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="logo">
                    <i class="fas fa-heartbeat"></i>
                    <h1>EcoCare HMS</h1>
                </div>
                <ul class="nav-links">
                    <li><a href="{{ route('doctor.home') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="{{ route('doctor.appointment') }}" class="active"><i class="fas fa-file-medical"></i> Appointments</a></li>
                    <li><a href="#" class="active"><i class="fas fa-file-medical"></i> Write Reports</a></li>

                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                    </li>
                </ul>
            </div>
            
            <!-- Content -->
            <div class="content-area">
                <div class="form-container">
                    <h2 class="page-title"><i class="fas fa-file-medical-alt"></i> Write Report for Patient</h2>
                    
                    @if(session('success'))
                        <div class="alert-success">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('doctor.reports.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="patient-select">Select Patient</label>
                            <select name="patient_id" id="patient-select" required>
                                <option value="">-- Choose Patient --</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }} ({{ $patient->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="report-text">Medical Report</label>
                            <textarea name="report_text" id="report-text" rows="5" required placeholder="Enter the patient's medical report details..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn-primary"><i class="fas fa-paper-plane"></i> Submit Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar on mobile
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('active');
                    
                    // Change icon based on sidebar state
                    const icon = sidebarToggle.querySelector('i');
                    if (sidebar.classList.contains('active')) {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                    } else {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', (e) => {
                if (window.innerWidth < 900 && 
                    sidebar.classList.contains('active') && 
                    !sidebar.contains(e.target) && 
                    e.target !== sidebarToggle) {
                    sidebar.classList.remove('active');
                    const icon = sidebarToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        });
    </script>
</body>
</html>