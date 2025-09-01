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
}
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'Poppins', sans-serif; background:#f0f7f4; color:var(--text-dark); line-height:1.6; }
.app-container { max-width:1200px; margin:30px auto; background:var(--white); border-radius:16px; overflow:hidden; box-shadow:0 10px 30px rgba(46,125,50,0.15); }

/* Header */
.header { background:linear-gradient(to right,var(--primary),var(--primary-dark)); padding:25px 30px; color:var(--white); }
.header h2 { font-size:28px; font-weight:600; display: flex; align-items: center; gap: 10px; }

/* Layout */
.main-layout { display:flex; gap:30px; }

/* Sidebar */
.sidebar { width:260px; background:var(--primary-dark); color:var(--white); padding:25px 0; border-radius:16px; }
.logo { padding:0 25px 25px; border-bottom:1px solid rgba(255,255,255,0.1); display:flex; align-items:center; gap:12px; }
.logo i { font-size:28px; }
.logo h1 { font-size:22px; font-weight:600; }
.nav-links { list-style:none; padding:0 15px; }
.nav-links li { margin-bottom:10px; }
.nav-links a { display:flex; align-items:center; gap:12px; padding:14px 15px; color:rgba(255,255,255,0.9); text-decoration:none; border-radius:8px; transition:all 0.3s; }
.nav-links a:hover, .nav-links a.active { background-color: rgba(255,255,255,0.1); color: var(--white); }
.nav-links i { width:20px; text-align:center; }

/* Content */
.content-area { flex:1; padding:30px; }

/* History Table Styling */
.history-table-container {
    background: var(--white);
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    margin-top: 20px;
}

.history-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

.history-table th {
    background-color: var(--history-bg);
    color: var(--history-color);
    text-align: left;
    padding: 16px;
    font-weight: 600;
    border-bottom: 2px solid #b0bec5;
}

.history-table td {
    padding: 16px;
    border-bottom: 1px solid #eaeaea;
}

.history-table tr:hover {
    background-color: #f7fbf8;
}

/* Date styling */
.appointment-date {
    font-weight: 500;
    color: var(--primary-dark);
}

/* Empty state */
.empty-state {
    text-align: center;
    padding: 40px;
    color: var(--text-light);
}

.empty-state i {
    font-size: 48px;
    margin-bottom: 15px;
    color: #cfd8dc;
}

.empty-state h3 {
    margin-bottom: 10px;
    font-weight: 500;
}

/* Responsive */
@media (max-width:900px) { 
    .main-layout { flex-direction:column; } 
    .sidebar { width:100%; margin-bottom:20px; } 
    .history-table {
        display: block;
        overflow-x: auto;
    }
}
@media (max-width:600px) { 
    body { padding:10px; } 
    .header { padding:15px 20px; } 
    .content-area { padding:20px; } 
    .history-table-container { padding:15px; }
    .history-table th, 
    .history-table td { padding: 12px 8px; }
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
                <li><a href="{{ route('doctor.home') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content-area">
            <!-- History Table -->
            <div class="history-table-container">
                <h3 style="color: var(--history-color); margin-bottom: 20px;">
                    <i class="fas fa-list-alt"></i> Patient Appointment History
                </h3>
                
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Appointment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->full_name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td class="appointment-date">
                                    {{ \Carbon\Carbon::parse($appointment->date)->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
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
    document.querySelectorAll('.nav-links a').forEach(item=>{
        item.addEventListener('click', function(){
            document.querySelectorAll('.nav-links a').forEach(i=>i.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
</script>
</body>
</html>