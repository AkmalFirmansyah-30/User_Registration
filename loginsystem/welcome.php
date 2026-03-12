<?php 
session_start();
include_once('includes/config.php');

if (strlen($_SESSION['id']==0)) {
    header('location:logout.php');
} else {
    // Logika Sapaan Waktu (Server Time)
    date_default_timezone_set('Asia/Jakarta'); // Sesuaikan timezone jika perlu
    $hour = date('H');
    if ($hour >= 5 && $hour < 12) {
        $greeting = "Selamat Pagi";
        $icon_greet = "fa-sun";
    } elseif ($hour >= 12 && $hour < 15) {
        $greeting = "Selamat Siang";
        $icon_greet = "fa-cloud-sun";
    } elseif ($hour >= 15 && $hour < 18) {
        $greeting = "Selamat Sore";
        $icon_greet = "fa-coffee";
    } else {
        $greeting = "Selamat Malam";
        $icon_greet = "fa-moon";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard | User System</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f2f2f2;
            }

            /* Custom Banner Gradient */
            .welcome-banner {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 20px;
                color: white;
                padding: 40px;
                position: relative;
                overflow: hidden;
                box-shadow: 0 10px 20px rgba(118, 75, 162, 0.3);
                margin-bottom: 30px;
            }

            /* Dekorasi lingkaran di background banner */
            .welcome-banner::before {
                content: '';
                position: absolute;
                top: -50px;
                right: -50px;
                width: 200px;
                height: 200px;
                background: rgba(255,255,255,0.1);
                border-radius: 50%;
            }
            .welcome-banner::after {
                content: '';
                position: absolute;
                bottom: -30px;
                right: 50px;
                width: 100px;
                height: 100px;
                background: rgba(255,255,255,0.1);
                border-radius: 50%;
            }

            /* Card Styling Dashboard */
            .dashboard-card {
                border: none;
                border-radius: 15px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                background: white;
                height: 100%;
                overflow: hidden;
            }

            .dashboard-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            }

            .card-icon-bg {
                position: absolute;
                right: -10px;
                bottom: -10px;
                font-size: 5rem;
                opacity: 0.1;
                transform: rotate(-15deg);
            }

            .stat-value {
                font-size: 1.8rem;
                font-weight: 700;
                color: #333;
            }
            
            .stat-label {
                color: #888;
                font-size: 0.9rem;
            }

            /* Breadcrumb clean style */
            .breadcrumb {
                background: transparent;
                padding-left: 0;
            }
        </style>
    </head>
    
    <body class="sb-nav-fixed">
        <?php include_once('includes/navbar.php');?>
        
        <div id="layoutSidenav">
            <?php include_once('includes/sidebar.php');?>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <h1 class="h3 text-gray-800">Dashboard Area</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <hr class="mb-4" />

                        <?php 
                        $userid=$_SESSION['id'];
                        $query=mysqli_query($con,"select * from users where id='$userid'");
                        while($result=mysqli_fetch_array($query))
                        {?> 
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="welcome-banner">
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <h2 class="fw-bold mb-2">
                                                <i class="fas <?php echo $icon_greet; ?> me-2"></i> 
                                                <?php echo $greeting; ?>, <?php echo $result['fname'];?>!
                                            </h2>
                                            <p class="mb-0 text-white-50">Selamat datang kembali di panel dashboard Anda. Berikut adalah ringkasan akun Anda.</p>
                                        </div>
                                        <div class="col-md-4 text-center d-none d-md-block">
                                            <i class="fas fa-user-astronaut fa-4x text-white-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card dashboard-card border-start border-4 border-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="stat-label">Nama Lengkap</div>
                                                <div class="stat-value text-primary h5 mt-1"><?php echo $result['fname']." ".$result['lname'];?></div>
                                            </div>
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                        <a href="profile.php" class="stretched-link"></a>
                                        <div class="card-icon-bg"><i class="fas fa-user"></i></div>
                                    </div>
                                    <div class="card-footer bg-transparent border-0 small text-primary">
                                        Lihat Profil Detail <i class="fas fa-arrow-right ms-1"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card dashboard-card border-start border-4 border-success">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="stat-label">Email Terdaftar</div>
                                                <div class="stat-value text-success h5 mt-1"><?php echo $result['email'];?></div>
                                            </div>
                                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                        </div>
                                        <div class="card-icon-bg"><i class="fas fa-envelope"></i></div>
                                    </div>
                                    <div class="card-footer bg-transparent border-0 small text-success">
                                        Status: Aktif <i class="fas fa-check-circle ms-1"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card dashboard-card border-start border-4 border-warning">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="stat-label">Pengaturan</div>
                                                <div class="stat-value text-warning h5 mt-1">Ganti Password</div>
                                            </div>
                                            <i class="fas fa-key fa-2x text-gray-300"></i>
                                        </div>
                                        <a href="change-password.php" class="stretched-link"></a>
                                        <div class="card-icon-bg"><i class="fas fa-cog"></i></div>
                                    </div>
                                    <div class="card-footer bg-transparent border-0 small text-warning">
                                        Update Keamanan <i class="fas fa-arrow-right ms-1"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php } ?>
                        
                    </div>
                </main>
                <?php include('includes/footer.php');?>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>