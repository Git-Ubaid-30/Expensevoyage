

<?php
// forget_password.php
session_start();
include 'dbcon.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    
    // Check if the email exists in the database
    $stmt = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        
        // Generate a unique token
        $token = bin2hex(random_bytes(32));
        
        // Store the token in the database
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $stmt = $mysqli->prepare("INSERT INTO password_reset_tokens (user_id, token, expiry) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $token, $expiry);
        $stmt->execute();
        
        // Send email with reset link
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.resend.com'; // Replace with your SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = 'resend'; // Replace with your SMTP username
            $mail->Password = 're_SubzhaKD_7L4x9ESoKJ6cSK4hTaB7LuyU'; // Replace with your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('hello@axis96.xyz', 'Go Trip');
            $mail->addAddress($email);
            
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click the following link to reset your password: <a href='http://trip.sarimyaseen.com/reset_password.php?token=$token'>Reset Password</a>";
            
            $mail->send();
            echo json_encode(['status' => 'success', 'message' => 'Password reset link sent. Check your email.']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email not found']);
    }
    exit;
}
?>
<?php 
  include 'admin/include/header.php';
?>

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
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>

    <div class="container">
        <h2>Forget Password</h2>
        <div id="alert" style="display: none;"></div>
        <form id="forgetPasswordForm">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
    $(document).ready(function() {
        $('#forgetPasswordForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'forget.php',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#alert').removeClass('alert-danger').addClass('alert-success').text(response.message).show();
                    } else {
                        $('#alert').removeClass('alert-success').addClass('alert-danger').text(response.message).show();
                    }
                },
                error: function() {
                    $('#alert').removeClass('alert-success').addClass('alert-success').text('An error occurred. Please try again.').show();
                }
            });
        });
    });
    </script>


<?php 
  include 'admin/include/footer.php';
?>