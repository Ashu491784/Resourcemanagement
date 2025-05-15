<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
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
</body>
</html>