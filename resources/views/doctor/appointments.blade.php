<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoCare - Doctor Appointments</title>
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
    color: var(--primary-dark);
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

/* Table Styling */
.appointment-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

.appointment-table th {
    background-color: var(--primary-bg);
    color: var(--primary-dark);
    text-align: left;
    padding: 18px;
    font-weight: 600;
    border-bottom: 2px solid var(--primary-light);
}

.appointment-table td {
    padding: 18px;
    border-bottom: 1px solid #eaeaea;
    transition: background-color 0.2s;
}

.appointment-table tr:hover td {
    background-color: #f7fbf8;
}

/* Status badges */
.status-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
    display: inline-block;
}

.status-pending {
    background-color: #ffecb3;
    color: #7d6608;
}

.status-approved {
    background-color: #c8e6c9;
    color: #2e7d32;
}

.status-cancelled {
    background-color: #ffcdd2;
    color: #c62828;
}

/* Buttons */
.btn {
    padding: 10px 18px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    border: none;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-approve {
    background-color: var(--primary);
    color: white;
}

.btn-approve:hover {
    background-color: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(46, 125, 50, 0.3);
}

.btn-cancel {
    background-color: #f44336;
    color: white;
}

.btn-cancel:hover {
    background-color: #d32f2f;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(244, 67, 54, 0.3);
}

.btn-report {
    background-color: #2196f3;
    color: white;
}

.btn-report:hover {
    background-color: #0b7dda;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(33, 150, 243, 0.3);
}

.action-container {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.no-action {
    color: var(--text-light);
    font-style: italic;
    padding: 10px 0;
}

/* Alert messages */
.alert-message {
    padding: 16px 20px;
    border-radius: 12px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    animation: slideIn 0.5s ease-out;
}

@keyframes slideIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.alert-success {
    background-color: var(--primary-bg);
    color: var(--primary-dark);
    border-left: 4px solid var(--primary);
}

.alert-error {
    background-color: #ffebee;
    color: #c62828;
    border-left: 4px solid #f44336;
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
    
    .action-container {
        flex-direction: column;
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
    
    .appointment-table {
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
    
    .appointment-table th, 
    .appointment-table td { 
        padding: 12px 10px; 
        font-size: 14px;
    }
    
    .btn {
        padding: 8px 12px;
        font-size: 13px;
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
        <h2><i class="fas fa-calendar-alt"></i> Appointment Management</h2>
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
                <li><a href="#" class="active"><i class="fas fa-calendar-check"></i> <span>Appointments</span></a></li>
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
                <h1><i class="fas fa-calendar-medical"></i> Manage Appointments</h1>
                <p>Review and manage patient appointment requests</p>
            </div>
            
            <!-- Search and Filter -->
            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search appointments...">
                </div>
                <div class="filter-btn">
                    <i class="fas fa-filter"></i>
                    <span>Filter</span>
                </div>
            </div>
            
            <!-- Success & Error Messages -->
            @if(session('success'))
                <div class="alert-message alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-message alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Appointment Table -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list-alt"></i> Appointment Requests</h3>
                    <div class="header-actions">
                        <button class="btn-icon"><i class="fas fa-download"></i></button>
                        <button class="btn-icon"><i class="fas fa-print"></i></button>
                    </div>
                </div>
                
                <table class="appointment-table">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->full_name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d M Y') }}</td>
                                <td>
                                    @if($appointment->status === 'pending')
                                        <span class="status-badge status-pending">Pending</span>
                                    @elseif($appointment->status === 'approved')
                                        <span class="status-badge status-approved">Approved</span>
                                    @else
                                        <span class="status-badge status-cancelled">Cancelled</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-container">
                                        @if($appointment->status === 'pending')
                                            <form method="POST" action="{{ route('doctor.appointment.approve', $appointment->id) }}">
                                                @csrf
                                                <button class="btn btn-approve">
                                                    <i class="fas fa-check"></i> Approve
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('doctor.appointment.cancel', $appointment->id) }}">
                                                @csrf
                                                <button class="btn btn-cancel">
                                                    <i class="fas fa-times"></i> Cancel
                                                </button>
                                            </form>
                                        @else
                                            <span class="no-action">No Action</span>
                                        @endif
                                        
                                        <a href="{{ route('doctor.reports.create', $appointment->id) }}" class="btn btn-report">
                                            <i class="fas fa-edit"></i> Write Report
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-calendar-times"></i>
                                        <h3>No appointments found</h3>
                                        <p>There are no appointments scheduled at this time.</p>
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
    
    // Button hover effects
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
</body>
</html>