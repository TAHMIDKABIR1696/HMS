<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoCare - Ambulance</title>
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

/* Form Styling */
.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: var(--text-dark);
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-group input, 
.form-group select {
    width: 100%;
    padding: 14px 16px;
    border: 1px solid #ddd;
    border-radius: 10px;
    font-size: 16px;
    transition: all 0.3s;
    background: #f9f9f9;
    font-family: 'Poppins', sans-serif;
}

.form-group input:focus, 
.form-group select:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
    background: var(--white);
    transform: translateY(-2px);
}

.btn-submit {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
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
    margin-top: 10px;
    box-shadow: 0 4px 12px rgba(46, 125, 50, 0.3);
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(46, 125, 50, 0.4);
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

/* Ambulance info cards */
.ambulance-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.ambulance-card {
    background: var(--white);
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    transition: transform 0.3s;
}

.ambulance-card:hover {
    transform: translateY(-5px);
}

.ambulance-icon {
    font-size: 36px;
    color: var(--primary);
    margin-bottom: 15px;
}

.ambulance-card h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: var(--primary-dark);
}

.ambulance-card p {
    color: var(--text-light);
    font-size: 14px;
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
    
    .form-grid {
        grid-template-columns: 1fr;
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
    
    .form-group input, 
    .form-group select { 
        padding: 12px 14px; 
        font-size: 14px;
    }
    
    .btn-submit {
        padding: 14px 20px;
        font-size: 14px;
    }
}
</style>
</head>
<body>
<div class="app-container">
    <div class="header">
        <h2><i class="fas fa-ambulance"></i> Ambulance Booking</h2>
    </div>
    <div class="main-layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <h1>EcoCare HMS</h1>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('patient.home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="#" class="active"><i class="fas fa-ambulance"></i> <span>Ambulance</span></a></li>
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
                <h1><i class="fas fa-ambulance"></i> Emergency Ambulance Service</h1>
                <p>Book an ambulance for emergency medical transportation</p>
            </div>
            
            <!-- Ambulance Info Cards -->
            <div class="ambulance-info">
                <div class="ambulance-card">
                    <div class="ambulance-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>24/7 Availability</h3>
                    <p>Our ambulance services are available round the clock</p>
                </div>
                
                <div class="ambulance-card">
                    <div class="ambulance-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <h3>Quick Response</h3>
                    <p>Average response time of less than 15 minutes</p>
                </div>
                
                <div class="ambulance-card">
                    <div class="ambulance-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3>Medical Staff</h3>
                    <p>Trained paramedics and emergency medical technicians</p>
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

            <!-- Booking Form -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-calendar-plus"></i> Book an Ambulance</h3>
                </div>
                
                <form id="ambulanceForm" action="{{ route('patient.ambulance.store') }}" method="POST">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="patient_name"><i class="fas fa-user"></i> Patient Name</label>
                            <input type="text" id="patient_name" name="patient_name" value="{{ old('patient_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone"><i class="fas fa-phone"></i> Phone Number</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="pickup_area"><i class="fas fa-map-marker-alt"></i> Pickup Area</label>
                            <select id="pickup_area" name="pickup_area" required>
                                <option value="">-- Select Area --</option>
                                @foreach($areaToHospital as $area => $hospital)
                                    <option value="{{ $area }}" {{ old('pickup_area') == $area ? 'selected' : '' }}>{{ $area }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="drop_hospital"><i class="fas fa-hospital"></i> Drop Hospital</label>
                            <select id="drop_hospital" name="drop_hospital" required disabled>
                                <option value="">-- Select Hospital --</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pickup_address"><i class="fas fa-map-pin"></i> Pickup Address</label>
                        <input type="text" id="pickup_address" name="pickup_address" value="{{ old('pickup_address') }}" required>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="ambulance_type"><i class="fas fa-ambulance"></i> Ambulance Type</label>
                            <select id="ambulance_type" name="ambulance_type" required>
                                <option value="">-- Select Type --</option>
                                @foreach($ambulanceTypes as $type)
                                    <option value="{{ $type }}" {{ old('ambulance_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date"><i class="fas fa-calendar-day"></i> Preferred Date</label>
                            <input type="date" id="date" name="date" value="{{ old('date') }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Confirm Booking
                    </button>
                </form>
            </div>
            
        </div>
    </div>
</div>

<script>
const areaToHospital = @json($areaToHospital);

const areaSelect = document.getElementById('pickup_area');
const hospitalSelect = document.getElementById('drop_hospital');

areaSelect.addEventListener('change', function () {
    const selectedArea = this.value;
    
    // Reset hospital options
    hospitalSelect.innerHTML = '<option value="">-- Select Hospital --</option>';
    hospitalSelect.disabled = true;

    if (areaToHospital[selectedArea]) {
        areaToHospital[selectedArea].forEach(hospital => {
            let option = document.createElement('option');
            option.value = hospital.name;
            option.textContent = hospital.name;
            hospitalSelect.appendChild(option);
        });
        hospitalSelect.disabled = false;
    }
});

// Set minimum date to today
const today = new Date();
const yyyy = today.getFullYear();
const mm = String(today.getMonth()+1).padStart(2,'0');
const dd = String(today.getDate()).padStart(2,'0');
document.getElementById('date').setAttribute('min', `${yyyy}-${mm}-${dd}`);

// Form animation
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar active link
    document.querySelectorAll('.nav-links a').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.nav-links a').forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Simulate loading animation
    const cards = document.querySelectorAll('.card, .ambulance-card');
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
    
    // Form input focus effects
    const formInputs = document.querySelectorAll('input, select');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });
});
</script>

</body>
</html>