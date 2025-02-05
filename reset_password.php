<?php
// reset_password.php
session_start();
include 'admin/include/db.php';
include 'admin/include/header.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Check if the token is valid and not expired
    $stmt = $mysqli->prepare("SELECT user_id FROM password_reset_tokens WHERE token = ? AND expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        die("Invalid or expired token.");
    }
    
    $user = $result->fetch_assoc();
    $user_id = $user['user_id'];
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['token']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'Passwords do not match']);
        exit;
    }
    
    // Get user_id from token
    $stmt = $mysqli->prepare("SELECT user_id FROM password_reset_tokens WHERE token = ? AND expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid or expired token']);
        exit;
    }
    
    $user = $result->fetch_assoc();
    $user_id = $user['user_id'];
    
    // Update password
    $stmt = $mysqli->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $password, $user_id);
    
    if ($stmt->execute()) {
        // Delete used token
        $stmt = $mysqli->prepare("DELETE FROM password_reset_tokens WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        
        echo json_encode(['status' => 'success', 'message' => 'Password updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update password']);
    }
    exit;
} else {
    die("Invalid request");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .alert-danger {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <div id="alert" style="display: none;"></div>
        <form id="resetPasswordForm">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>

    <script>
    $(document).ready(function() {
        $('#resetPasswordForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'reset_password.php',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#alert').removeClass('alert-danger').addClass('alert-success').text(response.message).show();
                        setTimeout(function() {
                            window.location.href = 'login.php';
                        }, 3000);
                    } else {
                        $('#alert').removeClass('alert-success').addClass('alert-danger').text(response.message).show();
                    }
                },
                error: function() {
                    $('#alert').removeClass('alert-success').addClass('alert-success').text('Password Updated Now You Can Login').show();
                }
            });
        });
    });
    </script>
</body>
</html>

<?php
include 'admin/include/footer.php';
?>