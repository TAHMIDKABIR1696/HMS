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
form input, form select, form textarea { width:100%; padding:14px 16px; border:1px solid #ddd; border-radius:10px; font-size:16px; transition:all 0.3s; font-family:'Poppins',sans-serif; background:#f9f9f9; margin-bottom:20px; }
form input:focus, form select:focus, form textarea:focus { border-color:var(--primary); outline:none; box-shadow:0 0 0 3px rgba(46,125,50,0.2); background:var(--white); }
textarea { min-height:120px; resize:vertical; }

.btn-submit { background: var(--primary); color: var(--white); border:none; padding:16px 28px; border-radius:10px; font-size:16px; font-weight:600; cursor:pointer; transition:all 0.3s; display:flex; align-items:center; gap:10px; }
.btn-submit:hover { background: var(--primary-dark); transform:translateY(-2px); box-shadow:0 5px 15px rgba(46,125,50,0.3); }

/* Responsive */
@media (max-width:900px) { .main-layout { flex-direction:column; } .sidebar { width:100%; margin-bottom:20px; } }
@media (max-width:600px) { body { padding:10px; } .header { padding:15px 20px; } .content-area { padding:20px; } .form-container { padding:20px; } }
</style>
</head>
<body>
<div class="app-container">
    <div class="header">
        <h2>📅 Book Appointment</h2>
    </div>
    <div class="main-layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <h1>EcoCare HMS</h1>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('patient.home') }}" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
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
                <!-- Success Message -->
                <div class="alert-success" id="successMessage" style="display:none;">
                    <i class="fas fa-check-circle"></i>
                    <span>Your appointment has been successfully booked!</span>
                </div>

                <form id="appointmentForm" method="POST" action="{{ route('patient.book-appointment.store') }}">
                    @csrf
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                        <input type="text" name="full_name" placeholder="Full name" required>
                        <input type="email" name="email" placeholder="Email address" required>
                    </div>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
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
});
</script>
</body>
</html>
