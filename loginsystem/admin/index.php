<?php session_start(); 
include_once('../includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
    $adminusername=$_POST['username'];
    $pass=md5($_POST['password']);
    $ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $extra="dashboard.php";
        $_SESSION['login']=$_POST['username'];
        $_SESSION['adminid']=$num['id'];
        echo "<script>window.location.href='".$extra."'</script>";
        exit();
    }
    else
    {
        echo "<script>alert('Invalid username or password');</script>";
        $extra="index.php";
        echo "<script>window.location.href='".$extra."'</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin Login | System</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
        
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
                background-size: 400% 400%;
                animation: gradientBG 15s ease infinite;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            @keyframes gradientBG {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            .card-login {
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
                border: none;
                border-radius: 20px;
                box-shadow: 0 15px 35px rgba(0,0,0,0.2);
                overflow: hidden;
            }

            .card-header {
                background: transparent;
                border-bottom: none;
                padding-top: 30px;
                text-align: center;
            }
            
            .admin-icon {
                font-size: 3.5rem;
                background: -webkit-linear-gradient(#8E2DE2, #4A00E0);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                margin-bottom: 10px;
            }

            .form-floating input {
                border-radius: 10px;
                border: 1px solid #ddd;
                padding-right: 45px;
            }

            .form-floating input:focus {
                border-color: #4A00E0;
                box-shadow: 0 0 0 0.25rem rgba(74, 0, 224, 0.25);
            }

            .btn-admin {
                background: linear-gradient(135deg, #8E2DE2, #4A00E0); /* Gradient Ungu Khas Admin */
                border: none;
                border-radius: 50px;
                padding: 12px;
                font-weight: 600;
                letter-spacing: 1px;
                transition: all 0.3s ease;
                width: 100%;
                color: white;
            }

            .btn-admin:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(74, 0, 224, 0.4);
                color: white;
            }

            .password-toggle {
                position: absolute;
                top: 50%;
                right: 15px;
                transform: translateY(-50%);
                cursor: pointer;
                color: #888;
                z-index: 10;
            }
            
            .password-toggle:hover { color: #4A00E0; }

            .back-link a {
                color: #666;
                text-decoration: none;
                font-size: 0.9rem;
                transition: color 0.3s;
            }
            .back-link a:hover { color: #4A00E0; }
        </style>
    </head>
    
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card card-login">
                        
                        <div class="card-header">
                            <div class="admin-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <h3 class="fw-bold text-dark">Admin Panel</h3>
                            <p class="text-muted small">Login untuk mengelola sistem</p>
                        </div>
                        
                        <div class="card-body px-4 pb-4">
                            <form method="post">
                                
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="username" type="text" id="username" placeholder="Username" required/>
                                    <label for="username"><i class="fas fa-user-tie me-2"></i>Username</label>
                                </div>
                                
                                <div class="form-floating mb-4 position-relative">
                                    <input class="form-control" name="password" type="password" id="inputPassword" placeholder="Password" required />
                                    <label for="inputPassword"><i class="fas fa-lock me-2"></i>Password</label>
                                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberCheck">
                                        <label class="form-check-label small text-muted" for="rememberCheck">Ingat Saya</label>
                                    </div>
                                    </div>

                                <button class="btn btn-admin" name="login" type="submit">LOGIN SYSTEM</button>
                            </form>
                        </div>
                        
                        <div class="card-footer text-center py-3 bg-light border-0 back-link">
                            <div class="small"><a href="../index.php"><i class="fas fa-arrow-left me-1"></i> Kembali ke Halaman Depan</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#inputPassword');

            togglePassword.addEventListener('click', function (e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                // toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
            });
        </script>
    </body>
</html>