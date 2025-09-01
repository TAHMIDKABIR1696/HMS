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
    --primary-bg: #e8f5e9;
    --text-dark: #2c3e50;
    --white: #ffffff;
}
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'Poppins', sans-serif; background:#f0f7f4; color:var(--text-dark); line-height:1.6; }
.container { max-width:1100px; margin:30px auto; background:var(--white); border-radius:16px; overflow:hidden; box-shadow:0 10px 30px rgba(46,125,50,0.15); }

/* Layout */
.main-layout { display:flex; min-height:600px; }

/* Sidebar */
.sidebar { width:260px; background:var(--primary-dark); color:var(--white); padding:25px 0; }
.logo { padding:0 25px 25px; border-bottom:1px solid rgba(255,255,255,0.1); display:flex; align-items:center; gap:10px; }
.logo i { font-size:26px; }
.logo h1 { font-size:20px; font-weight:600; }
.nav-links { list-style:none; padding:20px; }
.nav-links li { margin-bottom:10px; }
.nav-links a { display:flex; align-items:center; gap:12px; padding:12px 14px; color:rgba(255,255,255,0.9); text-decoration:none; border-radius:8px; transition:all 0.3s; }
.nav-links a:hover, .nav-links a.active { background:rgba(255,255,255,0.1); color:var(--white); }
.nav-links i { width:20px; text-align:center; }

/* Content */
.content { flex:1; padding:30px; }

/* Alerts */
.alert-success { background: var(--primary-bg); color: var(--primary-dark);
    padding:14px 18px; border-radius:10px; margin-bottom:20px;
    display:flex; align-items:center; gap:10px; font-weight:500;
    border-left:4px solid var(--primary); }
.alert-success i { font-size:18px; }

/* Form */
h2 { font-size:24px; font-weight:600; margin-bottom:20px; color:var(--primary-dark); }
form label { display:block; margin-bottom:6px; font-weight:500; }
form input {
    width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:10px;
    font-size:15px; transition:all 0.3s; background:#f9f9f9; margin-bottom:18px;
}
form input:focus {
    border-color:var(--primary); outline:none;
    box-shadow:0 0 0 3px rgba(46,125,50,0.2); background:var(--white);
}
button[type="submit"] {
    background: var(--primary); color: var(--white);
    border:none; padding:14px 26px; border-radius:10px;
    font-size:16px; font-weight:600; cursor:pointer;
    transition:all 0.3s;
}
button[type="submit"]:hover {
    background: var(--primary-dark);
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(46,125,50,0.3);
}

/* Responsive */
@media(max-width:900px){
  .main-layout{ flex-direction:column; }
  .sidebar{ width:100%; }
}
</style>
</head>
<body>

<div class="container">
  <div class="main-layout">
    
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo">
        <i class="fas fa-heartbeat"></i>
        <h1>EcoCare HMS</h1>
      </div>
      <ul class="nav-links">
        <li><a href="{{ route('doctor.home') }}"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('doctor.profile') }}" class="active"><i class="fas fa-user"></i> Profile</a></li>
        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
        </li>
      </ul>
    </div>

    <!-- Content -->
    <div class="content">
      <h2>👤 My Profile</h2>

      @if(session('success'))
        <div class="alert-success">
          <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('doctor.profile.update') }}" method="POST">
        @csrf

        <label>Full Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

        <label>Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">

        <label>Address</label>
        <input type="text" name="address" value="{{ old('address', $user->address) }}">

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

        <label>New Password (optional)</label>
        <input type="password" name="password">

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation">

        <button type="submit">💾 Save Changes</button>
      </form>
    </div>

  </div>
</div>

</body>
</html>
