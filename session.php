<?php
include('dbcon.php');

session_start();

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $query = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $query->bindParam(':email', $email);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the password
        if (password_verify($password, $user['password']) || $user['password'] === $password) {
            // Extract initials
            $firstNameInitial = isset($user['first_name']) ? substr($user['first_name'], 0, 1) : '';
            $lastNameInitial = isset($user['last_name']) ? substr($user['last_name'], 0, 1) : '';
            $initials = $firstNameInitial . $lastNameInitial;

            // Store user data in session
            if ($user['role_id'] == 1) {
                $_SESSION['admin'] = $user['email'];
                $_SESSION['adminfirstname'] = $user['first_name'];
                $_SESSION['adminId'] = $user['id'];
                $_SESSION['adminphone'] = $user['phone'];
                $_SESSION['initials'] = $initials;
                header('Location: admin/index.php');
                exit();
            } else if ($user['role_id'] == 2) {
                $_SESSION['user'] = $user['email'];
                $_SESSION['userfirstname'] = $user['first_name'];
                $_SESSION['userId'] = $user['id'];
                $_SESSION['userphone'] = $user['phone'];
                $_SESSION['initials'] = $initials;
                echo "<script>location.assign('user/index.php');</script>";
            }
        } else {
            echo "<script>alert('Invalid User Name or Password');</script>";
        }
    } else {
        echo "<script>alert('Invalid User Name or Password');</script>";
    }
}
?>
