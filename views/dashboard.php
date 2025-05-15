<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Management System</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="dark-theme">
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <h2>Resource<span>Pro</span></h2>
                <button class="theme-toggle">
                    <i class="fas fa-moon"></i>
                </button>
            </div>
            
            <div class="nav-section">
                <h3 class="section-title">MAIN</h3>
                <ul class="nav-menu">
                    <li class="nav-item active" data-view="dashboard">
                        <a href="#" class="nav-link">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="nav-section">
                <h3 class="section-title">MANAGEMENT</h3>
                <ul class="nav-menu">
                    <li class="nav-item" data-view="companies">
                        <a href="<?= BASIC_PATH ?>/company" class="nav-link">
                            <i class="fas fa-building"></i>
                            <span>Companies</span>
                            <span class="badge">24</span>
                        </a>
                    </li>
                    <li class="nav-item" data-view="branches">
                        <a href="<?= BASIC_PATH ?>/branch" class="nav-link">
                            <i class="fas fa-code-branch"></i>
                            <span>Branches</span>
                            <span class="badge">12</span>
                        </a>
                    </li>
                    <li class="nav-item" data-view="employees">
                        <a href="<?= BASIC_PATH ?>/employee" class="nav-link">
                            <i class="fas fa-users"></i>
                            <span>Employees</span>
                            <span class="badge">342</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="nav-section">
                <h3 class="section-title">RESOURCES</h3>
                <ul class="nav-menu">
                    <li class="nav-item" data-view="inventory">
                        <a href="<?= BASIC_PATH ?>/inventory" class="nav-link">
                            <i class="fas fa-boxes"></i>
                            <span>Inventory</span>
                            <span class="badge warning">15</span>
                        </a>
                    </li>
                    <li class="nav-item" data-view="categories">
                        <a href="<?= BASIC_PATH ?>/categories" class="nav-link">
                            <i class="fas fa-tags"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li class="nav-item" data-view="resources">
                        <a href="<?= BASIC_PATH ?>/resource" class="nav-link">
                            <i class="fas fa-tools"></i>
                            <span>Resources</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="nav-section">
                <h3 class="section-title">SYSTEM</h3>
                <ul class="nav-menu">
                    <li class="nav-item" data-view="issues">
                        <a href="<?= BASIC_PATH ?>/issue" class="nav-link">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>Issues</span>
                            <span class="badge danger">8</span>
                        </a>
                    </li>
                    <li class="nav-item" data-view="positions">
                        <a href="<?= BASIC_PATH ?>/job" class="nav-link">
                            <i class="fas fa-briefcase"></i>
                            <span>Positions</span>
                        </a>
                    </li>
                    <li class="nav-item" data-view="users">
                        <a href="<?= BASIC_PATH ?>/user" class="nav-link">
                            <i class="fas fa-user-cog"></i>
                            <span>Users</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navigation -->
            <div class="top-nav">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search resources, employees...">
                    <button class="search-btn">Search</button>
                </div>
                
                <div class="user-area">
                    <div class="notifications">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </div>
                    <div class="user-profile">
                        <img src="/images/my.jpg" alt="User">
                        <div class="user-info">
                            <h4>Ayesha Madhushani</h4>
                            <p>Admin</p>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
            
            <!-- Content Header -->
            <div class="content-header">
                <h2>Dashboard Overview</h2>
                <div class="breadcrumb">
                    <span>Home</span>
                    <i class="fas fa-chevron-right"></i>
                    <span>Dashboard</span>
                </div>
            </div>
            
            <!-- Dashboard Content -->
            <div class="content-container">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>1,248</h3>
                            <p>Total Resources</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>12%</span>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>342</h3>
                            <p>Active Employees</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>5%</span>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>27</h3>
                            <p>Pending Issues</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="stat-trend down">
                            <i class="fas fa-arrow-down"></i>
                            <span>8%</span>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>15</h3>
                            <p>Low Inventory</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>3%</span>
                        </div>
                    </div>
                </div>
                
                <!-- Charts Row -->
                <div class="charts-row">
                    <div class="chart-container">
                        <div class="chart-header">
                            <h3>Resource Allocation</h3>
                            <div class="chart-actions">
                                <button class="active">Weekly</button>
                                <button>Monthly</button>
                                <button>Yearly</button>
                            </div>
                        </div>
                        <div class="chart-placeholder">
                            <!-- Chart would go here -->
                            <div class="chart-mockup"></div>
                        </div>
                    </div>
                    
                    <div class="chart-container">
                        <div class="chart-header">
                            <h3>Inventory Status</h3>
                            <div class="chart-actions">
                                <button class="active">By Category</button>
                                <button>By Location</button>
                            </div>
                        </div>
                        <div class="chart-placeholder">
                            <!-- Chart would go here -->
                            <div class="chart-mockup pie"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity & Quick Stats -->
                <div class="bottom-row">
                    <div class="recent-activity">
                        <div class="section-header">
                            <h3>Recent Activity</h3>
                            <a href="#" class="view-all">View All</a>
                        </div>
                        <ul class="activity-list">
                            <li class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="activity-details">
                                    <h4>New resource added</h4>
                                    <p>Laptop Dell XPS 15 added to inventory</p>
                                </div>
                                <span class="activity-time">10 min ago</span>
                            </li>
                            <!-- More activity items -->
                        </ul>
                    </div>
                    
                    <div class="quick-stats">
                        <div class="section-header">
                            <h3>Quick Stats</h3>
                        </div>
                        <div class="stats-container">
                            <div class="quick-stat">
                                <div class="stat-label">
                                    <i class="fas fa-building"></i>
                                    <span>Companies</span>
                                </div>
                                <div class="stat-value">24</div>
                            </div>
                            <!-- More quick stats -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>