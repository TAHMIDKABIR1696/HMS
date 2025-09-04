<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoCare - Medical Reports</title>
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
    --sidebar-collapsed: 70px;
    --header-height: 80px;
    --transition-speed: 0.3s;
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
    background:var(--white);
    box-shadow:0 10px 30px rgba(46,125,50,0.15);
}

/* Header */
.header { 
    background:linear-gradient(to right,var(--primary),var(--primary-dark)); 
    height: var(--header-height);
    color:var(--white); 
    display: flex;
    align-items: center;
    padding: 0 30px;
    flex-shrink: 0;
}
.header h2 { 
    font-size:28px; 
    font-weight:600; 
    display: flex;
    align-items: center;
    gap: 12px;
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
    transition: width var(--transition-speed);
    flex-shrink: 0;
}
.logo { 
    padding:0 25px 25px; 
    border-bottom:1px solid rgba(255,255,255,0.1); 
    display:flex; 
    align-items:center; 
    gap:12px; 
    white-space: nowrap;
    overflow: hidden;
}
.logo i { 
    font-size:28px; 
    flex-shrink: 0;
}
.logo h1 { 
    font-size:22px; 
    font-weight:600;
    transition: opacity var(--transition-speed);
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
    white-space: nowrap;
    overflow: hidden;
}
.nav-links a:hover, .nav-links a.active { 
    background-color: rgba(255,255,255,0.1); 
    color: var(--white); 
}
.nav-links i { 
    width:20px; 
    text-align:center; 
    flex-shrink: 0;
}

/* Content */
.content-area { 
    flex:1; 
    padding:30px;
    overflow-y: auto;
    background: #f9fbf9;
}

/* Reports Container */
.reports-container {
    background: var(--white);
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    max-width: 1000px;
    margin: 0 auto;
}

/* Page Title */
.page-title {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 25px;
    color: var(--primary-dark);
    display: flex;
    align-items: center;
    gap: 12px;
}

/* Reports List */
.reports-list {
    display: grid;
    gap: 20px;
}

.report-card {
    background: var(--white);
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    border-left: 4px solid var(--primary);
    transition: all 0.3s;
}

.report-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.report-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
}

.report-doctor {
    font-weight: 600;
    color: var(--primary-dark);
    display: flex;
    align-items: center;
    gap: 8px;
}

.report-date {
    color: var(--text-light);
    font-size: 14px;
}

.report-content {
    color: var(--text-dark);
    line-height: 1.6;
    margin-bottom: 15px;
    padding: 15px;
    background: var(--primary-bg);
    border-radius: 8px;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: var(--text-light);
}

.empty-state i {
    font-size: 64px;
    margin-bottom: 20px;
    color: #cfd8dc;
}

.empty-state p {
    font-size: 18px;
    margin-bottom: 25px;
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

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
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
    
    .reports-container {
        padding: 20px;
    }
}

@media (max-width:600px) { 
    .header {
        padding: 0 20px;
    }
    
    .header h2 {
        font-size: 20px;
    }
    
    .content-area { 
        padding:15px; 
    } 
    
    .reports-container { 
        padding:20px; 
    }
    
    .page-title {
        font-size: 24px;
    }
    
    .report-header {
        flex-direction: column;
        gap: 10px;
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
        <h2><i class="fas fa-file-medical-alt"></i> Medical Reports</h2>
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
                <li><a href="{{ route('patient.home') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#" class="active"><i class="fas fa-file-medical-alt"></i> Reports</a></li>
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
            <div class="reports-container">
                <h2 class="page-title"><i class="fas fa-file-medical"></i> My Reports</h2>

                @if($reports->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-file-medical"></i>
                        <p>No reports found.</p>
                    </div>
                @else
                    <div class="reports-list">
                        @foreach($reports as $report)
                            <div class="report-card">
                                <div class="report-header">
                                    <div class="report-doctor">
                                        <i class="fas fa-user-md"></i>
                                        Doctor: {{ $report->doctor->name }}
                                    </div>
                                    <div class="report-date">
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ $report->created_at->format('d M Y, h:i A') }}
                                    </div>
                                </div>
                                <div class="report-content">
                                    <strong>Report:</strong> {{ $report->report_text }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
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
</script>

</body>
</html>