<?php
include('include/config.php');

$page_title = "Login Page"; 
$meta_description = "Login Home page description blogin website";
$meta_keyword = "computer science, definisi komputer, animals";

include('include/header.php');

if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message'])){
        $_SESSION['message'] = "You are already logged In";
    }
    header("Location: Dashboard/index.php");
    exit(0);
}


include('include/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

            <?php include('message.php'); ?>
            
               <div class="card">
                    <div class="card-header">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="card-body">

                        <form action="logincode.php" method="POST">
                            <div class="form-group mb-3">
                                <label>Email Id</label>
                                <input type="email" name="email" placeholder="Enter Email Address" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="login_btn" class="btn btn-primary">Login Now</button>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" href=" register.php">Register</a>
                        </li>
                        </form>
                    </div>
               </div> 
            </div>
        </div>
    </div>
</div>

<?php
include('include/footer.php');
?>