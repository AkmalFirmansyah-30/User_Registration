<?php 
session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
    header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Profile | Registration and Login System</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f2f2f2;
            }

            /* Kartu Profil Kiri (Identitas) */
            .profile-card-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                border: none;
                border-radius: 15px;
                text-align: center;
                padding: 40px 20px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            }

            .profile-avatar {
                width: 120px;
                height: 120px;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 20px;
                border: 4px solid rgba(255,255,255,0.3);
            }

            /* Kartu Detail Kanan */
            .profile-card-details {
                background: white;
                border-radius: 15px;
                border: none;
                box-shadow: 0 5px 20px rgba(0,0,0,0.05);
                height: 100%;
            }

            .detail-row {
                padding: 15px 0;
                border-bottom: 1px solid #f0f0f0;
                display: flex;
                align-items: center;
            }
            
            .detail-row:last-child {
                border-bottom: none;
            }

            .detail-icon {
                width: 40px;
                height: 40px;
                background-color: #f8f9fa;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #764ba2;
                margin-right: 20px;
            }

            .detail-label {
                font-size: 0.85rem;
                color: #888;
                margin-bottom: 2px;
            }

            .detail-value {
                font-weight: 600;
                color: #333;
                font-size: 1rem;
            }

            .btn-edit-profile {
                background: #764ba2;
                color: white;
                border-radius: 50px;
                padding: 10px 30px;
                transition: all 0.3s;
            }
            
            .btn-edit-profile:hover {
                background: #667eea;
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(118, 75, 162, 0.3);
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
                            <h1 class="h3 text-gray-800">My Profile</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="welcome.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <hr class="mb-4" />

                        <?php 
                        $userid=$_SESSION['id'];
                        $query=mysqli_query($con,"select * from users where id='$userid'");
                        while($result=mysqli_fetch_array($query))
                        {?>
                        
                        <div class="row">
                            
                            <div class="col-xl-4 col-md-5 mb-4">
                                <div class="card profile-card-header h-100">
                                    <div class="card-body">
                                        <div class="profile-avatar">
                                            <i class="fas fa-user fa-4x text-white"></i>
                                        </div>
                                        <h3 class="fw-bold"><?php echo $result['fname']." ".$result['lname'];?></h3>
                                        <p class="text-white-50 mb-4">User Account</p>
                                        
                                        <div class="d-grid gap-2">
                                            <a href="edit-profile.php" class="btn btn-light text-primary fw-bold rounded-pill">
                                                <i class="fas fa-user-edit me-2"></i> Edit Profile
                                            </a>
                                            <a href="change-password.php" class="btn btn-outline-light rounded-pill">
                                                <i class="fas fa-key me-2"></i> Change Password
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8 col-md-7 mb-4">
                                <div class="card profile-card-details">
                                    <div class="card-header bg-white border-0 pt-4 px-4">
                                        <h5 class="fw-bold text-primary"><i class="fas fa-info-circle me-2"></i>Personal Information</h5>
                                    </div>
                                    <div class="card-body px-4 pb-4">
                                        
                                        <div class="detail-row">
                                            <div class="detail-icon"><i class="fas fa-user"></i></div>
                                            <div>
                                                <div class="detail-label">First Name</div>
                                                <div class="detail-value"><?php echo $result['fname'];?></div>
                                            </div>
                                        </div>

                                        <div class="detail-row">
                                            <div class="detail-icon"><i class="fas fa-user-tag"></i></div>
                                            <div>
                                                <div class="detail-label">Last Name</div>
                                                <div class="detail-value"><?php echo $result['lname'];?></div>
                                            </div>
                                        </div>

                                        <div class="detail-row">
                                            <div class="detail-icon"><i class="fas fa-envelope"></i></div>
                                            <div>
                                                <div class="detail-label">Email Address</div>
                                                <div class="detail-value"><?php echo $result['email'];?></div>
                                            </div>
                                        </div>

                                        <div class="detail-row">
                                            <div class="detail-icon"><i class="fas fa-phone-alt"></i></div>
                                            <div>
                                                <div class="detail-label">Contact Number</div>
                                                <div class="detail-value"><?php echo $result['contactno'];?></div>
                                            </div>
                                        </div>

                                        <div class="detail-row">
                                            <div class="detail-icon"><i class="fas fa-calendar-check"></i></div>
                                            <div>
                                                <div class="detail-label">Registration Date</div>
                                                <div class="detail-value">
                                                    <?php echo date('d F Y', strtotime($result['posting_date']));?>
                                                    <span class="badge bg-success ms-2 rounded-pill">Active</span>
                                                </div>
                                            </div>
                                        </div>

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
    </body>
</html>
<?php } ?>