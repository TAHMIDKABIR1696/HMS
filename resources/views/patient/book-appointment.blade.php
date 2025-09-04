<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoCare - Book Appointment</title>
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
.form-container { 
    background:var(--white); 
    border-radius:16px; 
    padding:30px; 
    box-shadow:0 5px 20px rgba(0,0,0,0.05); 
    margin-bottom: 30px;
    transition: all 0.3s;
}
.alert-success { 
    background-color: var(--primary-bg); 
    color: var(--primary-dark); 
    padding:15px 20px; 
    border-radius:10px; 
    margin-bottom:25px; 
    display:flex; 
    align-items:center; 
    gap:12px; 
    border-left:4px solid var(--primary);
    animation: fadeIn 0.5s ease-in-out;
}
.alert-success i { 
    font-size:20px; 
}
form input, form select, form textarea { 
    width:100%; 
    padding:14px 16px; 
    border:1px solid #ddd; 
    border-radius:10px; 
    font-size:16px; 
    transition:all 0.3s; 
    font-family:'Poppins',sans-serif; 
    background:#f9f9f9; 
    margin-bottom:20px;
}
form input:focus, form select:focus, form textarea:focus { 
    border-color:var(--primary); 
    outline:none; 
    box-shadow:0 0 0 3px rgba(46,125,50,0.2); 
    background:var(--white); 
    transform: translateY(-2px);
}
textarea { 
    min-height:120px; 
    resize:vertical; 
}

.btn-submit { 
    background: var(--primary); 
    color: var(--white); 
    border:none; 
    padding:16px 28px; 
    border-radius:10px; 
    font-size:16px; 
    font-weight:600; 
    cursor:pointer; 
    transition:all 0.3s; 
    display:flex; 
    align-items:center; 
    gap:10px;
}
.btn-submit:hover { 
    background: var(--primary-dark); 
    transform:translateY(-2px); 
    box-shadow:0 5px 15px rgba(46,125,50,0.3); 
}

/* Appointment List Styling */
.appointment-list-container {
    background: var(--white);
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

.appointment-list {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

.appointment-list th {
    background-color: var(--primary-bg);
    color: var(--primary-dark);
    text-align: left;
    padding: 16px;
    font-weight: 600;
    border-bottom: 2px solid var(--primary-light);
}

.appointment-list td {
    padding: 16px;
    border-bottom: 1px solid #eaeaea;
    transition: background 0.2s;
}

.appointment-list tr:hover {
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

/* Tabs */
.tabs {
    display: flex;
    margin-bottom: 25px;
    border-bottom: 2px solid #eaeaea;
}

.tab-button {
    padding: 12px 24px;
    background: none;
    border: none;
    font-size: 16px;
    font-weight: 500;
    color: var(--text-light);
    cursor: pointer;
    position: relative;
    transition: all 0.3s;
}

.tab-button.active {
    color: var(--primary-dark);
    font-weight: 600;
}

.tab-button.active::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 3px;
    background-color: var(--primary);
    border-radius: 3px;
}

.tab-content {
    display: none;
    animation: fadeIn 0.5s;
}

.tab-content.active {
    display: block;
}

/* Form grid improvements */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
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

/* Responsive */
@media (max-width: 1100px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}

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
    
    .appointment-list {
        display: block;
        overflow-x: auto;
    }
    
    .content-area {
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
    .form-container, .appointment-list-container { 
        padding:20px; 
    }
    .appointment-list th, 
    .appointment-list td { 
        padding: 12px 8px; 
    }
    .tabs { 
        flex-direction: column; 
    }
    .tab-button { 
        width: 100%; 
        text-align: center; 
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
        <h2><i class="fas fa-calendar-alt"></i> Patient Appointment Portal</h2>
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
                <li><a href="{{ route('patient.home') }}" ><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#" class="active"><i class="fas fa-file-medical"></i>Appointment</a></li>
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
            <!-- Tabs for navigation -->
            <div class="tabs">
                <button class="tab-button active" data-tab="book">Book Appointment</button>
                <button class="tab-button" data-tab="view">My Appointments</button>
            </div>
            
            <!-- Book Appointment Tab -->
            <div id="book-tab" class="tab-content active">
                <div class="form-container">
                    <!-- Success Message -->
                    <div class="alert-success" id="successMessage" style="display:none;">
                        <i class="fas fa-check-circle"></i>
                        <span>Your appointment has been successfully booked!</span>
                    </div>

                    <form id="appointmentForm" method="POST" action="{{ route('patient.book-appointment.store') }}">
                        @csrf
                        <div class="form-grid">
                            <input type="text" name="full_name" placeholder="Full name" required>
                            <input type="email" name="email" placeholder="Email address" required>
                        </div>
                        <div class="form-grid">
                            <input type="date" id="date" name="date" required>
                            <select name="doctor_id" required>
                                <option value="">Select Doctor</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="text" name="phone" placeholder="Phone Number" required>
                        <textarea name="message" placeholder="Describe your problem"></textarea>
                        <button type="submit" class="btn-submit"><i class="fas fa-paper-plane"></i> Submit Request</button>
                    </form>
                </div>
            </div>
            
            <!-- View Appointments Tab -->
            <div id="view-tab" class="tab-content">
                <div class="appointment-list-container">
                    <h3 style="color: var(--primary-dark); margin-bottom: 20px;">
                        <i class="fas fa-list-alt"></i> My Appointments
                    </h3>

                    {{-- Ensure $appointments exists (fallback to query if controller didn't pass it) --}}
                    @php
                        if (! isset($appointments)) {
                            try {
                                $appointments = \App\Models\Appointment::where('patient_id', auth()->id())->latest()->get();
                            } catch (\Throwable $e) {
                                // If DB / model problem, fallback to empty collection to avoid errors in the view
                                $appointments = collect();
                            }
                        }
                    @endphp

                    @if($appointments->isEmpty())
                        <div class="empty-state">
                            <i class="fas fa-calendar-times"></i>
                            <p>No appointments booked yet.</p>
                        </div>
                    @else
                        <table class="appointment-list">
                            <thead>
                                <tr>
                                    <th>Doctor</th>
                                    <th>Date & Time</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        {{-- Doctor name (do not rely on missing Doctor model) --}}
                                        <td>
                                            @php
                                                $doc = \App\Models\User::find($appointment->doctor_id);
                                            @endphp
                                            {{ $doc->name ?? 'Unknown Doctor' }}
                                        </td>

                                        {{-- Date & time --}}
                                        <td>
                                            @php
                                                $date = $appointment->appointment_date ?? $appointment->date ?? null;
                                                $time = $appointment->appointment_time ?? null;
                                            @endphp

                                            {{ $date ? \Carbon\Carbon::parse($date)->format('d M Y') : '-' }}
                                            @if($time)
                                                - {{ \Carbon\Carbon::parse($time)->format('g:i A') }}
                                            @endif
                                        </td>

                                        {{-- Message (if you later add message column) --}}
                                        <td>{{ $appointment->message ?? '-' }}</td>

                                        {{-- Status badge --}}
                                        <td>
                                            @switch($appointment->status)
                                                @case('approved')
                                                    <span class="status-badge status-approved">Approved</span>
                                                    @break
                                                @case('cancelled')
                                                    <span class="status-badge status-cancelled">Cancelled</span>
                                                    @break
                                                @default
                                                    <span class="status-badge status-pending">Pending</span>
                                            @endswitch
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set minimum date to today
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth()+1).padStart(2,'0');
    const dd = String(today.getDate()).padStart(2,'0');
    document.getElementById('date').setAttribute('min', `${yyyy}-${mm}-${dd}`);

    // Form submission handler
    const form = document.getElementById('appointmentForm');
    const successMessage = document.getElementById('successMessage');
    form.addEventListener('submit', function(e) {
        // Uncomment for JS demo, remove for actual Laravel submission
        // e.preventDefault();
        // successMessage.style.display = 'flex';
        // setTimeout(()=>{form.reset(); successMessage.style.display='none';},5000);
    });

    // Sidebar active link
    document.querySelectorAll('.nav-links a').forEach(item=>{
        item.addEventListener('click', function(){
            document.querySelectorAll('.nav-links a').forEach(i=>i.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Tab functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.getAttribute('data-tab');
            
            // Update active tab button
            tabButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            
            // Show active tab content
            tabContents.forEach(content => content.classList.remove('active'));
            document.getElementById(`${tabId}-tab`).classList.add('active');
        });
    });
    
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