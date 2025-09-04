<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoCare - Doctor Income</title>
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
    --income-color: #4caf50;
    --income-bg: #e8f5e9;
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

/* Income Table Styling */
.income-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

.income-table th {
    background-color: var(--primary-bg);
    color: var(--primary-dark);
    text-align: left;
    padding: 18px;
    font-weight: 600;
    border-bottom: 2px solid var(--primary-light);
}

.income-table td {
    padding: 18px;
    border-bottom: 1px solid #eaeaea;
    transition: background-color 0.2s;
}

.income-table tr:hover td {
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

.status-approved {
    background-color: #c8e6c9;
    color: #2e7d32;
}

/* Amount styling */
.amount {
    font-weight: 600;
    color: var(--income-color);
    font-size: 16px;
}

/* Total Income */
.total-income {
    background: linear-gradient(135deg, var(--primary-light), var(--primary));
    color: white;
    padding: 25px 30px;
    border-radius: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 8px 20px rgba(46, 125, 50, 0.2);
    margin-top: 30px;
    transition: transform 0.3s;
}

.total-income:hover {
    transform: scale(1.02);
}

.total-income h3 {
    font-size: 20px;
    font-weight: 500;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.total-amount {
    font-size: 32px;
    font-weight: 700;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
    
    .income-table {
        display: block;
        overflow-x: auto;
    }
    
    .total-income {
        flex-direction: column;
        text-align: center;
        gap: 15px;
        padding: 20px;
    }
    
    .total-income h3 {
        font-size: 18px;
    }
    
    .total-amount {
        font-size: 28px;
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
    
    .income-table th, 
    .income-table td { 
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
        <h2><i class="fas fa-money-bill-wave"></i> Income Summary</h2>
    </div>
    <div class="main-layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <h1>EcoCare HMS</h1>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('doctor.home') }}" ><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="#" class="active"><i class="fas fa-file-medical"></i>Income</a></li>
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
                <h1><i class="fas fa-money-bill-trend-up"></i> Earnings Overview</h1>
                <p>View your approved appointments and income details</p>
            </div>
            
            <!-- Income Table -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-money-bill-wave"></i> Approved Appointments & Income</h3>
                    <div class="header-actions">
                        <button class="btn-icon"><i class="fas fa-download"></i></button>
                        <button class="btn-icon"><i class="fas fa-print"></i></button>
                    </div>
                </div>
                
                <table class="income-table">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Amount (৳)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->full_name }}</td>
                                <td>Oct 15, 2023</td>
                                <td>
                                    <span class="status-badge status-approved">
                                        <i class="fas fa-check-circle"></i> Approved
                                    </span>
                                </td>
                                <td class="amount">2000 tk</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="empty-state">
                                        <i class="fas fa-calendar-times"></i>
                                        <h3>No approved appointments yet</h3>
                                        <p>Your approved appointments and income will appear here.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Total Income -->
            <div class="total-income">
                <h3><i class="fas fa-wallet"></i> Total Income:</h3>
                <div class="total-amount">৳ {{ $totalIncome }} tk</div>
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
    const cards = document.querySelectorAll('.card, .total-income');
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
});
</script>
</body>
</html>