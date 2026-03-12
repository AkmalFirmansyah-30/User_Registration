<?php session_start(); 
include_once('includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
    $password=$_POST['password'];
    $dec_password=$password;
    $useremail=$_POST['uemail'];
    $ret= mysqli_query($con,"SELECT id,fname FROM users WHERE email='$useremail' and password='$dec_password'");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $_SESSION['id']=$num['id'];
        $_SESSION['name']=$num['fname'];
        header("location:welcome.php");
    }
    else
    {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>User Login | Registration System</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />

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

            .card-header h3 {
                color: #333;
                font-weight: 600;
            }

            .form-floating input {
                border-radius: 10px;
                border: 1px solid #ddd;
                padding-right: 45px; /* Space for eye icon */
            }

            .form-floating input:focus {
                border-color: #e73c7e;
                box-shadow: 0 0 0 0.25rem rgba(231, 60, 126, 0.25);
            }

            .btn-login {
                background: linear-gradient(45deg, #e73c7e, #ee7752);
                border: none;
                border-radius: 50px;
                padding: 12px;
                font-weight: 600;
                font-size: 1rem;
                letter-spacing: 1px;
                transition: all 0.3s ease;
                width: 100%;
            }

            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(231, 60, 126, 0.4);
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

            .password-toggle:hover {
                color: #e73c7e;
            }

            .footer-links a {
                color: #666;
                text-decoration: none;
                transition: color 0.3s;
                font-size: 0.9rem;
            }
            .footer-links a:hover {
                color: #e73c7e;
            }
            
            .icon-head {
                font-size: 3rem;
                color: #e73c7e;
                margin-bottom: 10px;
            }
        </style>
    </head>
    
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card card-login">
                        <div class="card-header">
                            <div class="icon-head">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <h3>Welcome Back!</h3>
                            <p class="text-muted small">Masuk untuk mengakses akun Anda</p>
                        </div>
                        
                        <div class="card-body px-4 pb-4">
                            <form method="post">
                                
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="uemail" type="email" id="inputEmail" placeholder="name@example.com" required/>
                                    <label for="inputEmail"><i class="fas fa-envelope me-2"></i>Email address</label>
                                </div>
                                
                                <div class="form-floating mb-4 position-relative">
                                    <input class="form-control" name="password" type="password" id="inputPassword" placeholder="Password" required />
                                    <label for="inputPassword"><i class="fas fa-lock me-2"></i>Password</label>
                                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberPasswordCheck">
                                        <label class="form-check-label small text-muted" for="rememberPasswordCheck">Ingat saya</label>
                                    </div>
                                    <a class="small text-danger text-decoration-none fw-bold" href="password-recovery.php">Lupa Password?</a>
                                </div>

                                <button class="btn btn-primary btn-login text-white" name="login" type="submit">LOGIN</button>
                            </form>
                        </div>
                        
                        <div class="card-footer text-center py-3 bg-light border-0">
                            <div class="footer-links">
                                <div class="mb-2">Belum punya akun? <a href="signup.php" class="fw-bold text-primary">Daftar Sekarang</a></div>
                                <div><a href="index.php"><i class="fas fa-arrow-left me-1"></i> Kembali ke Home</a></div>
                            </div>
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