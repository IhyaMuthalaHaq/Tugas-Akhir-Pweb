<?php
session_start();
include('Dashboard/config/dbcon.php');

if (isset($_POST['register_btn'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['cpassword']);

    if ($password === $confirm_password) {
        // Check if email already exists
        $checkemail = "SELECT email FROM user WHERE email=?";
        $stmt_checkemail = mysqli_prepare($con, $checkemail);
        if ($stmt_checkemail) {
            mysqli_stmt_bind_param($stmt_checkemail, "s", $email);
            mysqli_stmt_execute($stmt_checkemail);
            mysqli_stmt_store_result($stmt_checkemail);

            if (mysqli_stmt_num_rows($stmt_checkemail) > 0) {
                // Email already exists
                $_SESSION['message'] = "Email already exists";
                header("Location: register.php");
                exit();
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert user data into database
                $user_query = "INSERT INTO user (fname, lname, email, password) VALUES (?, ?, ?, ?)";
                $stmt_insert_user = mysqli_prepare($con, $user_query);
                if ($stmt_insert_user) {
                    mysqli_stmt_bind_param($stmt_insert_user, "ssss", $fname, $lname, $email, $hashed_password);

                    if (mysqli_stmt_execute($stmt_insert_user)) {
                        $_SESSION['message'] = "Registered Successfully";
                        header("Location: login.php");
                        exit();
                    } else {
                        $_SESSION['message'] = "Something Went Wrong!";
                        header("Location: register.php");
                        exit();
                    }
                } else {
                    $_SESSION['message'] = "Statement preparation error!";
                    header("Location: register.php");
                    exit();
                }
            }
        } else {
            $_SESSION['message'] = "Statement preparation error!";
            header("Location: register.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Password and Confirm Password do not match";
        header("Location: register.php");
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}
?>