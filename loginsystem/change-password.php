<?php 
session_start();
include_once('includes/config.php');

if (strlen($_SESSION['id']==0)) {
    header('location:logout.php');
} else {
    // Code for Update Password
    if(isset($_POST['update']))
    {
        $oldpassword=$_POST['currentpassword']; 
        $newpassword=$_POST['newpassword'];
        
        $sql=mysqli_query($con,"SELECT password FROM users where password='$oldpassword'");
        $num=mysqli_fetch_array($sql);
        
        if($num>0)
        {
            $userid=$_SESSION['id'];
            $ret=mysqli_query($con,"update users set password='$newpassword' where id='$userid'");
            echo "<script>alert('Password Changed Successfully !!');</script>";
            echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
        }
        else
        {
            echo "<script>alert('Old Password not match !!');</script>";
            echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Change Password | System</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />

        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f2f2f2;
            }
            
            .card-password {
                border: none;
                border-radius: 15px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.05);
                overflow: hidden;
            }

            .card-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 20px;
                border-bottom: none;
            }

            .form-floating input {
                border-radius: 10px;
                padding-right: 40px; /* Space for eye icon */
            }

            .form-floating input:focus {
                border-color: #764ba2;
                box-shadow: 0 0 0 0.25rem rgba(118, 75, 162, 0.25);
            }

            .btn-update {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border: none;
                border-radius: 50px;
                padding: 12px;
                font-weight: 600;
                letter-spacing: 1px;
                width: 100%;
                transition: all 0.3s;
            }

            .btn-update:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
            }

            /* Eye Icon Styling */
            .password-wrapper {
                position: relative;
            }
            .toggle-password {
                position: absolute;
                top: 50%;
                right: 15px;
                transform: translateY(-50%);
                cursor: pointer;
                color: #aaa;
                z-index: 10;
            }
            .toggle-password:hover {
                color: #764ba2;
            }
        </style>

        <script language="javascript" type="text/javascript">
            function valid() {
                if(document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                    alert("Password and Confirm Password Field do not match !!");
                    document.changepassword.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>
    
    <body class="sb-nav-fixed">
        <?php include_once('includes/navbar.php');?>
        
        <div id="layoutSidenav">
            <?php include_once('includes/sidebar.php');?>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <h1 class="h3">Security Settings</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="welcome.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div>
                        <hr class="mb-4" />

                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-8">
                                <div class="card card-password mb-4">
                                    <div class="card-header text-center">
                                        <i class="fas fa-key fa-3x mb-2"></i>
                                        <h4 class="mb-0">Change Password</h4>
                                        <p class="small text-white-50 mb-0">Ensure your account is using a strong password</p>
                                    </div>
                                    
                                    <div class="card-body p-4">
                                        <form method="post" name="changepassword" onSubmit="return valid();">
                                            
                                            <div class="form-floating mb-3 password-wrapper">
                                                <input class="form-control" id="currentpassword" name="currentpassword" type="password" placeholder="Current Password" required />
                                                <label for="currentpassword">Current Password</label>
                                                <i class="fas fa-eye toggle-password" onclick="togglePass('currentpassword', this)"></i>
                                            </div>

                                            <hr class="my-4">

                                            <div class="form-floating mb-3 password-wrapper">
                                                <input class="form-control" id="newpassword" name="newpassword" type="password" placeholder="New Password" required />
                                                <label for="newpassword">New Password</label>
                                                <i class="fas fa-eye toggle-password" onclick="togglePass('newpassword', this)"></i>
                                            </div>

                                            <div class="form-floating mb-4 password-wrapper">
                                                <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm Password" required />
                                                <label for="confirmpassword">Confirm New Password</label>
                                                <i class="fas fa-eye toggle-password" onclick="togglePass('confirmpassword', this)"></i>
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-update text-white" name="update">
                                                Update Password
                                            </button>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
                <?php include('includes/footer.php');?>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        
        <script>
            function togglePass(inputId, icon) {
                const input = document.getElementById(inputId);
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                
                // Toggle Icon Class
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            }
        </script>
    </body>
</html>
<?php } ?>