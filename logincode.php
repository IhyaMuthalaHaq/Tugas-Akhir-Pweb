<?php
session_start();
include('Dashboard/config/dbcon.php');

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT id, fname, lname, email, role_as, password FROM user WHERE email=?";
    $stmt = mysqli_prepare($con, $login_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);

                // Verifikasi password dengan password yang di-hash dari database
                if (password_verify($password, $user['password'])) {
                    $_SESSION['auth'] = true;
                    $_SESSION['auth_role'] = $user['role_as'];
                    $_SESSION['auth_user'] = [
                        'user_id' => $user['id'],
                        'user_name' => $user['fname'].' '.$user['lname'],
                        'user_email' => $user['email'],
                    ];

                    if ($_SESSION['auth_role'] == '1' || $_SESSION['auth_role'] == '1') {
                        $_SESSION['message'] = "Welcome to Dashboard";
                        header("Location: Dashboard/index.php");
                        exit();
                    } else if($_SESSION['auth_role'] == '0')//0-user
                        $_SESSION['message'] = "You are Logged In";
                        header("Location: index.php");
                        exit();
                    }
                } else {
                    $_SESSION['message'] = "Invalid Email or Password";
                    header("Location: login.php");
                    exit();
                }
            } else {
                $_SESSION['message'] = "Invalid Email or Password";
                header("Location: login.php");
                exit();
            }
        } else {
            // Handle SQL execution error
            $_SESSION['message'] = "SQL Execution Error: " . mysqli_error($con);
            header("Location: login.php");
            exit();
        }
    } else {
        // Handle prepared statement error
        $_SESSION['message'] = "Prepared Statement Error: " . mysqli_error($con);
        header("Location: login.php");
        exit();
    }
//  else {
//     $_SESSION['message'] = "You are not allowed to access this file";
//     header("Location: login.php");
//     exit();
// }
?>