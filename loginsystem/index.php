<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Sistem Pendaftaran dan Manajemen User" />
        <meta name="author" content="" />
        <title>Home | Registration and Login System</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
                background-size: 400% 400%;
                animation: gradientBG 15s ease infinite;
                min-height: 100vh;
            }

            @keyframes gradientBG {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            .navbar {
                background: rgba(0, 0, 0, 0.2) !important;
                backdrop-filter: blur(10px);
            }

            .hero-title {
                color: white;
                font-weight: 700;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            }

            .breadcrumb {
                background: transparent;
                justify-content: center;
            }
            .breadcrumb-item a {
                color: #f8f9fa;
                text-decoration: none;
            }

            /* Card Styling (Glassmorphism) */
            .custom-card {
                background: rgba(255, 255, 255, 0.9);
                border: none;
                border-radius: 15px;
                overflow: hidden;
                transition: all 0.4s ease;
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                cursor: pointer;
                height: 100%;
            }

            .custom-card:hover {
                transform: translateY(-15px) scale(1.03);
                box-shadow: 0 15px 40px rgba(0,0,0,0.4);
            }

            .custom-card .card-body {
                color: #333;
                font-size: 1.2rem;
                font-weight: 600;
                padding: 2rem 1rem;
                text-align: center;
            }

            .custom-card .icon-area {
                font-size: 3rem;
                margin-bottom: 15px;
            }
            
            /* Warna khusus untuk icon/text per kartu */
            .card-blue .icon-area { color: #0d6efd; }
            .card-yellow .icon-area { color: #ffc107; }
            .card-red .icon-area { color: #dc3545; }

            .btn-custom {
                border-radius: 50px;
                padding: 10px 25px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 1px;
                width: 100%;
                display: block;
                text-align: center;
                text-decoration: none;
                margin-top: 10px;
            }

            /* Footer Fix */
            footer {
                color: white;
                text-align: center;
                padding: 20px;
                margin-top: auto;
            }
        </style>
    </head>
    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark">
            <a class="navbar-brand ps-3" href="index.php"><i class="fas fa-layer-group me-2"></i> Sistem RPL</a>
        </nav>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_content" style="padding-left: 0;">
                <main>
                    <div class="container px-4">
                        
                        <div class="text-center mt-5 mb-5">
                            <h1 class="hero-title display-4">Selamat Datang</h1>
                            <p class="lead text-white">Sistem Pendaftaran & Manajemen Pengguna Terintegrasi</p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active text-white-50" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="row justify-content-center">
                            
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="custom-card card-blue">
                                    <div class="card-body">
                                        <div class="icon-area">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div>Belum Punya Akun?</div>
                                        <p class="small text-muted mt-2">Daftarkan diri Anda sekarang untuk mengakses fitur lengkap.</p>
                                        <a href="signup.php" class="btn btn-primary btn-custom text-white">Daftar Sekarang</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="custom-card card-yellow">
                                    <div class="card-body">
                                        <div class="icon-area">
                                            <i class="fas fa-sign-in-alt"></i>
                                        </div>
                                        <div>Sudah Terdaftar?</div>
                                        <p class="small text-muted mt-2">Masuk ke sistem menggunakan akun yang telah dibuat.</p>
                                        <a href="login.php" class="btn btn-warning btn-custom text-dark">Login User</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="custom-card card-red">
                                    <div class="card-body">
                                        <div class="icon-area">
                                            <i class="fas fa-user-shield"></i>
                                        </div>
                                        <div>Administrator</div>
                                        <p class="small text-muted mt-2">Panel khusus untuk manajemen data sistem.</p>
                                        <a href="admin" class="btn btn-danger btn-custom text-white">Login Admin</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div style="height: 50px"></div>
                    </div>
                </main>
                
                <?php include_once('includes/footer.php');?>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>