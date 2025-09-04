<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCare - Doctors Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2e7d32;
            --primary-dark: #1b5e20;
            --primary-light: #4caf50;
            --primary-bg: #e8f5e9;
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
        }

        /* Header */
        .header { 
            background:linear-gradient(to right,var(--primary),var(--primary-dark)); 
            height: var(--header-height);
            color:var(--white); 
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .header h2 { 
            font-size:28px; 
            font-weight:600; 
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
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
            box-shadow: 4px 0 12px rgba(0,0,0,0.1);
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

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .action-buttons {
            display: flex;
            gap: 15px;
        }
        .btn {
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }
        .btn-primary {
            background: var(--primary);
            color: white;
            border: none;
        }
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46,125,50,0.3);
        }

        /* Table Container */
        .table-container {
            background: var(--white);
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        /* Table Styling */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .data-table th {
            background-color: var(--primary-bg);
            color: var(--primary-dark);
            text-align: left;
            padding: 16px;
            font-weight: 600;
            border-bottom: 2px solid var(--primary-light);
        }
        .data-table td {
            padding: 16px;
            border-bottom: 1px solid #eaeaea;
            transition: background 0.2s;
        }
        .data-table tr:hover {
            background-color: #f7fbf8;
        }
        .doctor-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
            margin-right: 12px;
        }
        .doctor-info {
            display: flex;
            align-items: center;
        }

        /* Status badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }
        .status-active {
            background-color: #c8e6c9;
            color: #2e7d32;
        }
        .status-inactive {
            background-color: #ffecb3;
            color: #7d6608;
        }

        /* Action buttons */
        .action-cell {
            display: flex;
            gap: 10px;
        }
        .icon-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .view-btn {
            background: #e3f2fd;
            color: #1565c0;
        }
        .edit-btn {
            background: #e8f5e9;
            color: #2e7d32;
        }
        .delete-btn {
            background: #ffebee;
            color: #c62828;
        }
        .icon-btn:hover {
            transform: scale(1.1);
        }

        /* Search and Filters */
        .table-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-box {
            position: relative;
            width: 300px;
        }
        .search-input {
            width: 100%;
            padding: 12px 16px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .search-input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(46,125,50,0.2);
        }
        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }
        .filter-btn {
            background: var(--white);
            border: 1px solid #ddd;
            padding: 10px 16px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .filter-btn:hover {
            border-color: var(--primary);
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

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .modal-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--primary-dark);
        }
        .close-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-light);
        }
        .modal-body {
            margin-bottom: 25px;
        }
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }
        .btn-cancel {
            background: #f0f0f0;
            color: var(--text-dark);
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-confirm {
            background: #dc3545;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-cancel:hover {
            background: #e0e0e0;
        }
        .btn-confirm:hover {
            background: #c82333;
        }

        /* Responsive */
        @media (max-width: 1100px) {
            .data-table {
                display: block;
                overflow-x: auto;
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
            .table-controls {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .search-box {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 0 20px;
            }
            .header h2 {
                font-size: 20px;
            }
            .content-area {
                padding: 20px;
            }
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .action-buttons {
                width: 100%;
                justify-content: space-between;
            }
            .btn {
                flex: 1;
                justify-content: center;
            }
        }

        @media (max-width: 600px) {
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
        <h2><i class="fas fa-heartbeat"></i> EcoCare HMS</h2>
        <div class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <div style="font-weight: 600;">{{ Auth::user()->name }}</div>
                <div style="font-size: 13px; opacity: 0.8;">Administrator</div>
            </div>
        </div>
    </div>
    <div class="main-layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <h1>EcoCare HMS</h1>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="#" class="active"><i class="fas fa-user-md"></i> <span>Doctors</span></a></li>

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
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-user-md"></i> Doctors</h1>
            </div>

            <div class="table-container">
                <div class="table-controls">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Search doctors...">
                    </div>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Doctor</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $doctor)
                        <tr>
                            <td>
                                <div class="doctor-info">
                                    <div class="doctor-avatar">
                                        {{ strtoupper(substr($doctor->name, 0, 1)) }}
                                    </div>
                                    {{ $doctor->name }}
                                </div>
                            </td>
                            <td>{{ $doctor->email }}</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>
                                <div class="action-cell">
                                    <div class="icon-btn delete-btn" onclick="showDeleteModal({{ $doctor->id }}, '{{ $doctor->name }}')">
                                        <i class="fas fa-trash"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Confirm Deletion</h3>
            <button class="close-btn" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete <strong id="doctorName"></strong>? This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Cancel</button>
            <form id="deleteForm" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-confirm">Delete</button>
            </form>
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
    
    // Search functionality
    const searchInput = document.querySelector('.search-input');
    searchInput.addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('.data-table tbody tr');
        
        rows.forEach(row => {
            const name = row.querySelector('td:first-child').textContent.toLowerCase();
            const email = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            
            if (name.includes(searchValue) || email.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

// Delete functionality
let currentDoctorId = null;

function showDeleteModal(id, name) {
    currentDoctorId = id;
    document.getElementById('doctorName').textContent = name;
    document.getElementById('deleteModal').style.display = 'flex';
    document.getElementById('deleteForm').action = `/admin/doctors/${id}`;
}

function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
    currentDoctorId = null;
}

// Close modal if clicked outside
window.onclick = function(event) {
    const modal = document.getElementById('deleteModal');
    if (event.target === modal) {
        closeModal();
    }
};
</script>
</body>
</html>