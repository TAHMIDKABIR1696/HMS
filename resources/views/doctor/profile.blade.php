<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoCare - Profile</title>
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
    flex-shrink: 0;
}
.logo { 
    padding:0 25px 25px; 
    border-bottom:1px solid rgba(255,255,255,0.1); 
    display:flex; 
    align-items:center; 
    gap:12px; 
}
.logo i { 
    font-size:28px; 
}
.logo h1 { 
    font-size:22px; 
    font-weight:600;
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
}
.nav-links a:hover, .nav-links a.active { 
    background-color: rgba(255,255,255,0.1); 
    color: var(--white); 
}
.nav-links i { 
    width:20px; 
    text-align:center; 
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
}
.alert-success i { 
    font-size:20px; 
}

/* Form Styling */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    margin-bottom: 20px;
}

form label { 
    display:block; 
    margin-bottom:8px; 
    font-weight:500; 
    color: var(--text-dark);
}
form input {
    width:100%; 
    padding:14px 16px; 
    border:1px solid #ddd; 
    border-radius:10px; 
    font-size:16px; 
    transition:all 0.3s; 
    background:#f9f9f9; 
}
form input:focus {
    border-color:var(--primary); 
    outline:none; 
    box-shadow:0 0 0 3px rgba(46,125,50,0.2); 
    background:var(--white); 
    transform: translateY(-2px);
}

.full-width {
    grid-column: span 2;
}

.password-note {
    font-size: 13px;
    color: var(--text-light);
    margin-top: 6px;
    margin-bottom: 15px;
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
    margin-top: 10px;
}
.btn-submit:hover { 
    background: var(--primary-dark); 
    transform:translateY(-2px); 
    box-shadow:0 5px 15px rgba(46,125,50,0.3); 
}

/* Profile Header */
.profile-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}
.profile-header h2 {
    font-size: 28px;
    font-weight: 700;
    color: var(--primary-dark);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

/* User info */
.user-info {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
}
.user-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 32px;
    color: white;
}
.user-details {
    flex: 1;
}
.user-name {
    font-weight: 600;
    font-size: 22px;
    color: var(--primary-dark);
}
.user-role {
    font-size: 16px;
    color: var(--text-light);
}

/* Responsive */
@media (max-width: 1100px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    .full-width {
        grid-column: span 1;
    }
}

@media (max-width: 900px) { 
    .sidebar {
        width: 70px;
    }
    .logo h1, .nav-links a span {
        display: none;
    }
    .logo {
        justify-content: center;
        padding: 0 10px 20px;
    }
    .nav-links {
        padding: 20px 5px;
    }
    .nav-links a {
        justify-content: center;
        padding: 15px;
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
    .form-container { 
        padding:20px; 
    }
    
    .user-info {
        flex-direction: column;
        text-align: center;
    }
    
    .sidebar {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 60px;
        width: 100%;
        z-index: 100;
        flex-direction: row;
        padding: 0;
    }
    .logo {
        display: none;
    }
    .nav-links {
        display: flex;
        padding: 0;
        width: 100%;
        justify-content: space-around;
    }
    .nav-links li {
        margin: 0;
        flex: 1;
        display: flex;
        justify-content: center;
    }
    .nav-links a {
        padding: 12px;
        border-radius: 0;
        width: 100%;
        justify-content: center;
    }
    .main-layout {
        flex-direction: column;
    }
    .content-area {
        margin-bottom: 60px;
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
        <h2><i class="fas fa-user-circle"></i> Doctor Profile</h2>
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
                <li><a href="{{ route('doctor.profile') }}" class="active"><i class="fas fa-user"></i> <span>Profile</span></a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="content-area">
            @if(session('success'))
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <div class="user-info">
                <div class="user-avatar">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div class="user-details">
                    <div class="user-name">{{ $user->name }}</div>
                    <div class="user-role">Doctor at EcoCare Hospital</div>
                </div>
            </div>

            <div class="form-container">
                <form action="{{ route('doctor.profile.update') }}" method="POST">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label><i class="fas fa-user"></i> Full Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label><i class="fas fa-phone"></i> Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
                        </div>

                        <div class="form-group full-width">
                            <label><i class="fas fa-map-marker-alt"></i> Address</label>
                            <input type="text" name="address" value="{{ old('address', $user->address) }}">
                        </div>

                        <div class="form-group">
                            <label><i class="fas fa-lock"></i> New Password (optional)</label>
                            <input type="password" name="password">
                            <p class="password-note">Leave blank to keep current password</p>
                        </div>

                        <div class="form-group">
                            <label><i class="fas fa-lock"></i> Confirm Password</label>
                            <input type="password" name="password_confirmation">
                        </div>
                    </div>

                    <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Responsive sidebar behavior
    function handleSidebar() {
        if (window.innerWidth <= 900) {
            document.querySelectorAll('.nav-links a span').forEach(span => {
                span.style.display = 'none';
            });
            document.querySelector('.logo h1').style.display = 'none';
            document.querySelector('.logo').style.justifyContent = 'center';
        } else {
            document.querySelectorAll('.nav-links a span').forEach(span => {
                span.style.display = 'inline';
            });
            document.querySelector('.logo h1').style.display = 'block';
        }
    }
    
    // Initial call
    handleSidebar();
    
    // Listen for window resize
    window.addEventListener('resize', handleSidebar);
});
</script>
</body>
</html>