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
}
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'Poppins', sans-serif; background:#f0f7f4; color:var(--text-dark); line-height:1.6; }
.app-container { max-width:1200px; margin:30px auto; background:var(--white); border-radius:16px; overflow:hidden; box-shadow:0 10px 30px rgba(46,125,50,0.15); }

/* Header */
.header { background:linear-gradient(to right,var(--primary),var(--primary-dark)); padding:25px 30px; color:var(--white); }
.header h2 { font-size:28px; font-weight:600; }

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
.form-container { background:var(--white); border-radius:12px; padding:30px; box-shadow:0 5px 15px rgba(0,0,0,0.05); }
.alert-success { background-color: var(--primary-bg); color: var(--primary-dark); padding:15px 20px; border-radius:10px; margin-bottom:25px; display:flex; align-items:center; gap:12px; border-left:4px solid var(--primary); }
.alert-success i { font-size:20px; }

/* Table Styling */
.appointment-table-container {
    background: var(--white);
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    margin-top: 20px;
}

.appointment-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

.appointment-table th {
    background-color: var(--primary-bg);
    color: var(--primary-dark);
    text-align: left;
    padding: 16px;
    font-weight: 600;
    border-bottom: 2px solid var(--primary-light);
}

.appointment-table td {
    padding: 16px;
    border-bottom: 1px solid #eaeaea;
}

.appointment-table tr:hover {
    background-color: #f7fbf8;
}

/* Status badges */
.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
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
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    border: none;
    transition: all 0.3s;
}

.btn-approve {
    background-color: var(--primary);
    color: white;
}

.btn-approve:hover {
    background-color: var(--primary-dark);
}

.btn-cancel {
    background-color: #f44336;
    color: white;
}

.btn-cancel:hover {
    background-color: #d32f2f;
}

.btn-report {
    background-color: #2196f3;
    color: white;
}

.btn-report:hover {
    background-color: #0b7dda;
}

.action-container {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.no-action {
    color: var(--text-light);
    font-style: italic;
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

/* Alert messages */
.alert-message {
    padding: 12px 16px;
    border-radius: 8px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
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

/* Responsive */
@media (max-width:900px) { 
    .main-layout { flex-direction:column; } 
    .sidebar { width:100%; margin-bottom:20px; } 
    .appointment-table {
        display: block;
        overflow-x: auto;
    }
    .action-container {
        flex-direction: column;
    }
}
@media (max-width:600px) { 
    body { padding:10px; } 
    .header { padding:15px 20px; } 
    .content-area { padding:20px; } 
    .appointment-table-container { padding:15px; }
    .appointment-table th, 
    .appointment-table td { padding: 12px 8px; }
}
</style>
</head>
<body>
<div class="app-container">
    <div class="header">
        <h2>📅 Appointment Management</h2>
    </div>
    <div class="main-layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <h1>EcoCare HMS</h1>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('doctor.home') }}" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                
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
            <div class="appointment-table-container">
                <h3 style="color: var(--primary-dark); margin-bottom: 20px;">
                    <i class="fas fa-list-alt"></i> Appointment List
                </h3>
                
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