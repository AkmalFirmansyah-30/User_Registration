<nav class="sb-topnav navbar navbar-expand navbar-dark">
    <a class="navbar-brand ps-3 fw-bold" href="welcome.php" style="font-family: 'Poppins', sans-serif; letter-spacing: 1px;">
        <i class="fas fa-layer-group me-2"></i> User Panel
    </a>
    
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" href="#!">
        <i class="fas fa-bars fa-lg"></i>
    </button>
    
    <div class="d-none d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0"></div>
    
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw fa-lg"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0" aria-labelledby="navbarDropdown" style="border-radius: 12px;">
                <li>
                    <a class="dropdown-item py-2" href="profile.php">
                        <i class="fas fa-user me-2 text-primary"></i> Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item py-2" href="change-password.php">
                        <i class="fas fa-key me-2 text-warning"></i> Change Password
                    </a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item py-2 text-danger fw-bold" href="logout.php">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    
    <style>
        .sb-topnav {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .dropdown-item:active {
            background-color: #764ba2;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #764ba2;
        }
        
        /* Efek hover untuk tombol toggle */
        #sidebarToggle:hover {
            transform: scale(1.1);
            transition: transform 0.2s;
        }
    </style>
</nav>