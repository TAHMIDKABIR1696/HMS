<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoCare - Ambulance Bookings</title>
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

        /* Success Alert */
        .alert-success {
            background-color: var(--primary-bg);
            color: var(--primary-dark);
            padding: 16px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 4px solid var(--primary);
            animation: fadeIn 0.5s ease-in-out;
        }
        .alert-success i {
            font-size: 20px;
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
        .status-confirmed {
            background-color: #c8e6c9;
            color: #2e7d32;
        }
        .status-completed {
            background-color: #e3f2fd;
            color: #1565c0;
        }
        .status-cancelled {
            background-color: #ffcdd2;
            color: #c62828;
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
        .filter-section {
            display: flex;
            gap: 15px;
        }
        .filter-select {
            padding: 10px 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
            background: var(--white);
            cursor: pointer;
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
            max-width: 600px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-height: 80vh;
            overflow-y: auto;
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
        .booking-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .detail-item {
            margin-bottom: 15px;
        }
        .detail-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }
        .detail-value {
            color: var(--text-light);
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
        @media (max-width: 1200px) {
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
            .filter-section {
                width: 100%;
                justify-content: space-between;
            }
            .filter-select {
                flex: 1;
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
            .booking-details {
                grid-template-columns: 1fr;
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

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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

                <li><a href="#" class="active"><i class="fas fa-ambulance"></i> <span>Ambulance</span></a></li>

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
                <h1 class="page-title"><i class="fas fa-ambulance"></i> Ambulance Bookings</h1>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <div class="table-container">
                <div class="table-controls">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Search bookings...">
                    </div>
                    <div class="filter-section">
                        <select class="filter-select" id="statusFilter">
                            <option value="">All Statuses</option>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <select class="filter-select" id="typeFilter">
                            <option value="">All Types</option>
                            <option value="normal">Normal</option>
                            <option value="ac">AC</option>
                            <option value="icu">ICU</option>
                        </select>
                    </div>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Phone</th>
                            <th>Pickup Area</th>
                            <th>Hospital</th>
                            <th>Type</th>
                            <th>Distance</th>
                            <th>Fee</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->patient_name }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ $booking->pickup_area }}</td>
                            <td>{{ $booking->drop_hospital }}</td>
                            <td>{{ $booking->ambulance_type }}</td>
                            <td>{{ $booking->distance_km }} km</td>
                            <td>{{ $booking->total_fee }} BDT</td>
                            <td>
                                <span class="status-badge 
                                    @if($booking->status == 'pending') status-pending
                                    @elseif($booking->status == 'confirmed') status-confirmed
                                    @elseif($booking->status == 'completed') status-completed
                                    @elseif($booking->status == 'cancelled') status-cancelled
                                    @endif">
                                    {{ ucfirst($booking->status ?? 'pending') }}
                                </span>
                            </td>
                            <td>
                                <div class="action-cell">
                                    <div class="icon-btn view-btn" onclick="showBookingDetails({{ $booking->id }})">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div class="icon-btn edit-btn">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <div class="icon-btn delete-btn" onclick="showDeleteModal({{ $booking->id }}, '{{ $booking->patient_name }}')">
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

<!-- Booking Details Modal -->
<div class="modal" id="detailsModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Booking Details</h3>
            <button class="close-btn" onclick="closeModal('detailsModal')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="booking-details">
                <div class="detail-item">
                    <div class="detail-label">Patient Name</div>
                    <div class="detail-value" id="detail-patient"></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Phone Number</div>
                    <div class="detail-value" id="detail-phone"></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Pickup Area</div>
                    <div class="detail-value" id="detail-area"></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Pickup Address</div>
                    <div class="detail-value" id="detail-address"></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Hospital</div>
                    <div class="detail-value" id="detail-hospital"></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Ambulance Type</div>
                    <div class="detail-value" id="detail-type"></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Distance</div>
                    <div class="detail-value" id="detail-distance"></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Fee</div>
                    <div class="detail-value" id="detail-fee"></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal('detailsModal')">Close</button>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Confirm Deletion</h3>
            <button class="close-btn" onclick="closeModal('deleteModal')">&times;</button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete the booking for <strong id="bookingPatientName"></strong>? This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal('deleteModal')">Cancel</button>
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
            const patient = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const phone = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            const area = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
            
            if (patient.includes(searchValue) || phone.includes(searchValue) || area.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    
    // Filter functionality
    const statusFilter = document.getElementById('statusFilter');
    const typeFilter = document.getElementById('typeFilter');
    
    function applyFilters() {
        const statusValue = statusFilter.value;
        const typeValue = typeFilter.value;
        const rows = document.querySelectorAll('.data-table tbody tr');
        
        rows.forEach(row => {
            const status = row.querySelector('td:nth-child(9) .status-badge').textContent.toLowerCase();
            const type = row.querySelector('td:nth-child(6)').textContent.toLowerCase();
            
            const statusMatch = !statusValue || status.includes(statusValue);
            const typeMatch = !typeValue || type.includes(typeValue);
            
            if (statusMatch && typeMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
    
    statusFilter.addEventListener('change', applyFilters);
    typeFilter.addEventListener('change', applyFilters);
});

// Modal functionality
function showBookingDetails(id) {
    // In a real application, you would fetch these details from an API
    // For demonstration, we'll use sample data
    const sampleData = {
        patient: "John Doe",
        phone: "+1 234-567-8900",
        area: "Downtown",
        address: "123 Main St, Apt 4B",
        hospital: "City General Hospital",
        type: "AC Ambulance",
        distance: "5.2 km",
        fee: "1500 BDT"
    };
    
    document.getElementById('detail-patient').textContent = sampleData.patient;
    document.getElementById('detail-phone').textContent = sampleData.phone;
    document.getElementById('detail-area').textContent = sampleData.area;
    document.getElementById('detail-address').textContent = sampleData.address;
    document.getElementById('detail-hospital').textContent = sampleData.hospital;
    document.getElementById('detail-type').textContent = sampleData.type;
    document.getElementById('detail-distance').textContent = sampleData.distance;
    document.getElementById('detail-fee').textContent = sampleData.fee;
    
    document.getElementById('detailsModal').style.display = 'flex';
}

function showDeleteModal(id, name) {
    document.getElementById('bookingPatientName').textContent = name;
    document.getElementById('deleteModal').style.display = 'flex';
    document.getElementById('deleteForm').action = `/admin/ambulance-bookings/${id}`;
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Close modal if clicked outside
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
};
</script>
</body>
</html>