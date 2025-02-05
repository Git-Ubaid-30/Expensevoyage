<?php
include('php/query.php');
include('../session.php');
include('checkadmin.php');
include('../user/checkuser.php');

// Check if there is an active session for admin or user
if (!isset($_SESSION['adminId']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php"); // Redirect if no session exists
    exit;
}

// Handle logout confirmation
if (isset($_POST['logout_confirm'])) {
    // Unset admin session variables if they exist
    if (isset($_SESSION['adminId'])) {
        unset($_SESSION['adminId']);
        unset($_SESSION['adminfirstname']);
        unset($_SESSION['admin']);
        unset($_SESSION['adminphone']);
    }

    // Unset user session variables if they exist
    elseif (isset($_SESSION['user'])) {
        unset($_SESSION['userId']);
        unset($_SESSION['userfirstname']);
        unset($_SESSION['user']);
        unset($_SESSION['userphone']);
    }

    // Destroy the session
    session_destroy();

    // Redirect to login or home page
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .logout-container {
            margin-top: 150px;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary logout-container">
            <div class="card-header text-center">
                <h2 class="login-box-msg">Are you sure you want to log out?</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" name="logout_confirm" class="btn btn-primary btn-block">
                                <i class="fas fa-sign-out-alt"></i> Yes, Logout
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary btn-block" onclick="window.location.href='index.php';">
                                <i class="fas fa-arrow-left"></i> Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>
</html>
