<?php 
session_start();
require_once('includes/config.php');

// Code for Registration 
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contact=$_POST['contact'];
    
    $sql=mysqli_query($con,"select id from users where email='$email'");
    $row=mysqli_num_rows($sql);
    
    if($row>0)
    {
        echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
    } else {
        $msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$password','$contact')");

        if($msg)
        {
            echo "<script>alert('Registered successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>User Signup | Registration System</title>
        
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
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px 0;
            }

            @keyframes gradientBG {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            .card-signup {
                background: rgba(255, 255, 255, 0.95); /* Sedikit lebih solid agar form terbaca jelas */
                backdrop-filter: blur(10px);
                border: none;
                border-radius: 20px;
                box-shadow: 0 15px 35px rgba(0,0,0,0.2);
                overflow: hidden;
            }

            .card-header {
                background: transparent;
                border-bottom: 1px solid rgba(0,0,0,0.05);
                padding: 25px;
                text-align: center;
            }

            .card-header h3 {
                color: #333;
                font-weight: 700;
                margin-bottom: 5px;
            }

            .form-floating input {
                border-radius: 10px;
                border: 1px solid #ddd;
            }

            .form-floating input:focus {
                border-color: #23a6d5;
                box-shadow: 0 0 0 0.25rem rgba(35, 166, 213, 0.25);
            }

            .form-floating label {
                padding-left: 15px;
            }

            .btn-signup {
                background: linear-gradient(45deg, #23a6d5, #23d5ab);
                border: none;
                border-radius: 50px;
                padding: 12px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 1px;
                transition: all 0.3s ease;
                width: 100%;
                color: white;
            }

            .btn-signup:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(35, 166, 213, 0.4);
                color: white;
            }

            .footer-links a {
                color: #666;
                text-decoration: none;
                transition: color 0.3s;
                font-weight: 500;
            }
            .footer-links a:hover {
                color: #23a6d5;
            }
        </style>

        <script type="text/javascript">
            function checkpass() {
                if(document.signup.password.value != document.signup.confirmpassword.value) {
                    alert('Password and Confirm Password field does not match');
                    document.signup.confirmpassword.focus();
                    return false;
                }
                return true;
            } 
        </script>
    </head>
    
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card card-signup">
                        <div class="card-header">
                            <div class="mb-2 text-primary display-4"><i class="fas fa-user-plus"></i></div>
                            <h3>Create Account</h3>
                            <p class="text-muted small mb-0">Isi data diri Anda untuk bergabung</p>
                        </div>
                        
                        <div class="card-body p-5">
                            <form method="post" name="signup" onsubmit="return checkpass();">

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="fname" name="fname" type="text" placeholder="First Name" required />
                                            <label for="fname"><i class="fas fa-user me-2"></i>First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="lname" name="lname" type="text" placeholder="Last Name" required />
                                            <label for="lname"><i class="fas fa-user-tag me-2"></i>Last Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required />
                                    <label for="email"><i class="fas fa-envelope me-2"></i>Email Address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="contact" name="contact" type="text" placeholder="1234567890" 
                                           required pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" />
                                    <label for="contact"><i class="fas fa-phone-alt me-2"></i>Contact Number</label>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" 
                                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                                   title="At least one number, one uppercase, one lowercase letter, and at least 6 characters" required/>
                                            <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm Password" 
                                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required />
                                            <label for="confirmpassword"><i class="fas fa-check-circle me-2"></i>Confirm Password</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-signup" name="submit">
                                        <i class="fas fa-paper-plane me-2"></i> Register Now
                                    </button>
                                </div>

                            </form>
                        </div>
                        
                        <div class="card-footer text-center py-3 bg-light border-0 footer-links">
                            <div class="small mb-2"><a href="login.php">Sudah punya akun? Login disini</a></div>
                            <div class="small"><a href="index.php"><i class="fas fa-arrow-left me-1"></i> Kembali ke Home</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>