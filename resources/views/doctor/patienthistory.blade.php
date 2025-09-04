<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoCare - Patient History</title>
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
    --history-color: #607d8b;
    --history-bg: #eceff1;
    --sidebar-width: 280px;
    --header-height: 80px;
}

* { 
    margin: 0; 
    padding: 0; 
    box-sizing: border-box; 
}

body { 
    font-family: 'Poppins', sans-serif; 
    background: #f0f7f4; 
    color: var(--text-dark); 
    line-height: 1.6; 
    height: 100vh;
    overflow: hidden;
}

.app-container { 
    height: 100vh; 
    display: flex;
    flex-direction: column;
}

/* Header */
.header { 
    background: linear-gradient(135deg, var(--primary), var(--primary-dark)); 
    height: var(--header-height);
    color: var(--white); 
    display: flex;
    align-items: center;
    padding: 0 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    z-index: 100;
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
    flex: 1;
    overflow: hidden;
}

/* Sidebar */
.sidebar { 
    width: var(--sidebar-width); 
    background: linear-gradient(to bottom, var(--primary-dark), var(--primary));
    color: var(--white); 
    display: flex;
    flex-direction: column;
    box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
    z-index: 10;
}

.logo { 
    padding: 30px 25px; 
    border-bottom: 1px solid rgba(255, 255, 255, 0.1); 
    display: flex; 
    align-items: center; 
    gap: 12px; 
}

.logo i { 
    font-size: 32px; 
    color: #a5d6a7;
}

.logo h1 { 
    font-size: 24px; 
    font-weight: 600; 
}

.nav-links { 
    list-style: none; 
    padding: 25px 15px; 
    flex: 1;
}

.nav-links li { 
    margin-bottom: 8px; 
}

.nav-links a { 
    display: flex; 
    align-items: center; 
    gap: 12px; 
    padding: 14px 15px; 
    color: rgba(255, 255, 255, 0.9); 
    text-decoration: none; 
    border-radius: 8px; 
    transition: all 0.3s; 
}

.nav-links a:hover, 
.nav-links a.active { 
    background-color: rgba(255, 255, 255, 0.15); 
    color: var(--white); 
    transform: translateX(5px);
}

.nav-links i { 
    width: 20px; 
    text-align: center; 
    font-size: 18px;
}

/* Content */
.content-area { 
    flex: 1; 
    padding: 30px; 
    overflow-y: auto;
    background: #f5f9f6;
}

.content-header {
    margin-bottom: 25px;
}

.content-header h1 {
    font-size: 28px;
    color: var(--primary-dark);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.content-header p {
    color: var(--text-light);
    font-size: 16px;
}

/* Card Styling */
.card {
    background: var(--white);
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    margin-bottom: 30px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eaeaea;
}

.card-title {
    font-size: 20px;
    font-weight: 600;
    color: var(--history-color);
    display: flex;
    align-items: center;
    gap: 10px;
}

.header-actions {
    display: flex;
    gap: 10px;
}

.btn-icon {
    background: var(--primary-bg);
    border: none;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-dark);
    cursor: pointer;
    transition: all 0.3s;
}

.btn-icon:hover {
    background: var(--primary-light);
    color: white;
    transform: rotate(10deg);
}

/* History Table Styling */
.history-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

.history-table th {
    background-color: var(--history-bg);
    color: var(--history-color);
    text-align: left;
    padding: 18px;
    font-weight: 600;
    border-bottom: 2px solid #b0bec5;
}

.history-table td {
    padding: 18px;
    border-bottom: 1px solid #eaeaea;
    transition: background-color 0.2s;
}

.history-table tr:hover td {
    background-color: #f7fbf8;
}

/* Date styling */
.appointment-date {
    font-weight: 500;
    color: var(--primary-dark);
}

/* Status indicator */
.status-indicator {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 8px;
}

.status-completed {
    background-color: var(--primary);
}

.status-upcoming {
    background-color: #ff9800;
}

.status-cancelled {
    background-color: #f44336;
}

/* Empty state */
.empty-state {
    text-align: center;
    padding: 60px 40px;
    color: var(--text-light);
}

.empty-state i {
    font-size: 64px;
    margin-bottom: 20px;
    color: #cfd8dc;
}

.empty-state h3 {
    font-size: 22px;
    margin-bottom: 10px;
    color: #90a4ae;
}

.empty-state p {
    font-size: 16px;
}

/* Search and filter */
.search-container {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.search-box {
    flex: 1;
    position: relative;
}

.search-box input {
    width: 100%;
    padding: 12px 20px 12px 45px;
    border: 1px solid #e0e0e0;
    border-radius: 50px;
    font-size: 16px;
    transition: all 0.3s;
}

.search-box input:focus {
    outline: none;
    border-color: var(--primary-light);
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
}

.search-box i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
}

.filter-btn {
    background: var(--white);
    border: 1px solid #e0e0e0;
    border-radius: 50px;
    padding: 0 20px;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.3s;
}

.filter-btn:hover {
    border-color: var(--primary-light);
    color: var(--primary-dark);
}

/* Responsive */
@media (max-width: 992px) { 
    .sidebar {
        width: 80px;
    }
    
    .logo h1, .nav-links span {
        display: none;
    }
    
    .logo {
        justify-content: center;
        padding: 25px 15px;
    }
    
    .nav-links {
        padding: 25px 10px;
    }
    
    .nav-links a {
        justify-content: center;
        padding: 16px;
    }
    
    .content-area {
        margin-left: 0;
        padding: 20px;
    }
}

@media (max-width: 768px) { 
    .header {
        padding: 0 20px;
        height: 70px;
    }
    
    .header h2 {
        font-size: 22px;
    }
    
    .main-layout {
        flex-direction: column;
    }
    
    .sidebar {
        width: 100%;
        height: auto;
        order: 2;
    }
    
    .logo {
        padding: 20px;
        justify-content: center;
    }
    
    .nav-links {
        display: flex;
        padding: 10px;
        justify-content: center;
    }
    
    .nav-links li {
        margin-bottom: 0;
        margin-right: 5px;
    }
    
    .nav-links a {
        padding: 12px 15px;
    }
    
    .content-area {
        order: 1;
        padding: 20px;
        overflow-y: visible;
        height: auto;
    }
    
    .history-table {
        display: block;
        overflow-x: auto;
    }
    
    .search-container {
        flex-direction: column;
    }
}

@media (max-width: 576px) { 
    body { 
        font-size: 14px;
    }
    
    .header {
        padding: 0 15px;
    }
    
    .header h2 {
        font-size: 20px;
    }
    
    .content-area {
        padding: 15px;
    }
    
    .card {
        padding: 20px;
    }
    
    .history-table th, 
    .history-table td { 
        padding: 12px 10px; 
        font-size: 14px;
    }
    
    .empty-state {
        padding: 40px 20px;
    }
    
    .empty-state i {
        font-size: 48px;
    }
    
    .empty-state h3 {
        font-size: 18px;
    }
}
</style>
</head>
<body>
<div class="app-container">
    <div class="header">
        <h2><i class="fas fa-history"></i> Patient History</h2>
    </div>
    <div class="main-layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <h1>EcoCare HMS</h1>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('doctor.home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="#" class="active"><i class="fas fa-history"></i> <span>Patient History</span></a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content-area">
            <div class="content-header">
                <h1><i class="fas fa-clipboard-list"></i> Patient Appointment History</h1>
                <p>View and manage patient appointment records</p>
            </div>
            
            <!-- Search and Filter -->
            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search patients...">
                </div>
                <div class="filter-btn">
                    <i class="fas fa-filter"></i>
                    <span>Filter</span>
                </div>
            </div>
            
            <!-- History Table -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list-alt"></i> Appointment Records</h3>
                    <div class="header-actions">
                        <button class="btn-icon"><i class="fas fa-download"></i></button>
                        <button class="btn-icon"><i class="fas fa-print"></i></button>
                    </div>
                </div>
                
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td>
                                    <div style="display: flex; align-items: center;">
                                        <div class="status-indicator status-completed"></div>
                                        {{ $appointment->full_name }}
                                    </div>
                                </td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td class="appointment-date">
                                    {{ \Carbon\Carbon::parse($appointment->date)->format('d M Y') }}
                                </td>
                                <td>
                                    <span class="status-badge status-approved">
                                        Completed
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="fas fa-calendar-times"></i>
                                        <h3>No history found</h3>
                                        <p>Patient appointment history will appear here.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar active link
    document.querySelectorAll('.nav-links a').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.nav-links a').forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Simulate loading animation
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
    });
    
    setTimeout(() => {
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s, transform 0.5s';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 150);
        });
    }, 300);
    
    // Search functionality
    const searchInput = document.querySelector('.search-box input');
    searchInput.addEventListener('focus', function() {
        this.parentElement.style.boxShadow = '0 0 0 3px rgba(76, 175, 80, 0.2)';
    });
    
    searchInput.addEventListener('blur', function() {
        this.parentElement.style.boxShadow = 'none';
    });
});
</script>
</body>
</html>