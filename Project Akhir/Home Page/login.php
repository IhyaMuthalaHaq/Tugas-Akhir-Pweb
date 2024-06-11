<?php
// include('includes/config.php');

$page_title = "Login Page"; 
$meta_description = "Login Home page description blogin website";
$meta_keyword = "computer science, definisi komputer, Animals";

include('../Home Page/include/header.php');

if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message'])){
        $_SESSION['message'] = "You are already logged In";
    }
    header("Location: ../Home Page/index.php");
    exit(0);
}


include('../Home Page/include/navbar.php');
?>
<link rel="stylesheet" href="../Home Page/css/style_login.css">
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php include('../Home Page/message.php'); ?>
                <div class="container d-flex justify-content-center align-items-center min-vh-100">
                    <div class="row border rounded-5 p-3 bg-white shadow box-area">
                        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                            <div class="featured-image mb-3">
                                <img src="p1.png" class="img-fluid" style="width: 250px;">
                            </div>
                            <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">FAUNASPHERE
                        </div> 
                        <div class="col-md-6 right-box">
                            <div class="row align-items-center">
                                    <div class="header-text mb-4">
                                        <h2>Selamat Datang</h2>
                                        <p>Di FaunaSphere</p>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email address">
                                    </div>
                                    <div class="input-group mb-1">
                                        <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                                    </div>
                                    <div class="input-group mb-5 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="formCheck">
                                            <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>

                                    <div class="row">
                                        <small>Don't have account? <a href="register.php">Register</a></small>
                                    </div>
                                </div>
                            </div> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../Home Page/include/footer.php');