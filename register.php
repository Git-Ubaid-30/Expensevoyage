<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('components/header.php');

// Include the database connection file
require_once 'dbcon.php'; // Assuming this file contains the $pdo connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the input values
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Check if any fields are empty
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($phone)) {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        // Check if email already exists
        $checkEmailQuery = "SELECT email FROM users WHERE email = :email";
        $stmt = $pdo->prepare($checkEmailQuery);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Email already exists.');</script>";
        } else {
            // Insert the new user data
            $insertQuery = "INSERT INTO users (first_name, last_name, email, password, phone, role_id) 
                            VALUES (:first_name, :last_name, :email, :password, :phone, 2)";
            $stmt = $pdo->prepare($insertQuery);
            
            // Bind the parameters
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password); // In real use, make sure to hash the password!
            $stmt->bindParam(':phone', $phone);
            
            if ($stmt->execute()) {
                echo "<script>alert('Signup successful!');</script>";
            } else {
                echo "<script>alert('Error: Unable to execute query.');</script>";
            }
        }
    }
}
?>

<section class="layout-pt-lg layout-pb-lg bg-blue-2">
  <div class="container">
    <div class="row justify-center">
      <div class="col-xl-6 col-lg-7 col-md-9">
        <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
          <div class="row y-gap-20">
            <div class="col-12">
              <div id="alertContainer" class="fixed top-4 right-4 z-50"></div>
              
              <form id="signupForm" method="post">
                <div class="row y-gap-20">
                  <div class="col-12">
                    <h1 class="text-22 fw-500">Sign in or create an account</h1>
                    <p class="mt-10">Already have an account? <a href="login.php" class="text-blue-1">Log in</a></p>
                  </div>

                  <div class="col-12">
                    <div class="form-input">
                      <input type="text" name="first_name" required>
                      <label class="lh-1 text-14 text-light-1">First Name</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-input">
                      <input type="text" name="last_name" required>
                      <label class="lh-1 text-14 text-light-1">Last Name</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-input">
                      <input type="email" name="email" required>
                      <label class="lh-1 text-14 text-light-1">Email</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-input">
                      <input type="password" name="password" required>
                      <label class="lh-1 text-14 text-light-1">Password</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-input">
                      <input type="text" name="phone" required>
                      <label class="lh-1 text-14 text-light-1">Phone Number</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="d-flex">
                      <div class="form-checkbox mt-5">
                        <input type="checkbox" name="newsletter">
                        <div class="form-checkbox__mark">
                          <div class="form-checkbox__icon icon-check"></div>
                        </div>
                      </div>
                      <div class="text-15 lh-15 text-light-1 ml-10">Email me exclusive Agoda promotions. I can opt out later as stated in the Privacy Policy.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="button py-20 -dark-1 bg-blue-1 text-white w-100" style="width:120px;">
                      Sign Up <div class="icon-arrow-top-right ml-15"></div>
                    </button>
                  </div>
                </div>

                <div class="row y-gap-20 pt-30">
                  <div class="col-12">
                    <div class="text-center px-30">By signing up, I agree to GoTrip Terms of Use and Privacy Policy.</div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('components/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $("#signupForm").submit(function(event) {
      event.preventDefault();

      $.ajax({
        type: "POST",
        url: "register.php",
        data: $(this).serialize(),
        success: function(response) {
          let success = response.includes("Signup successful!");
          showAlert(response, success);

          if(success) {
            setTimeout(function() {
              window.location.href = "login.php";
            }, 2000);
          }
        },
        error: function(xhr, status, error) {
          showAlert("An error occurred: " + error, false);
        }
      });
    });

    function showAlert(message, success) {
      let alertColor = success ? 'bg-green-500' : 'bg-red-500';
      $('#alertContainer').html(`
        <div class="${alertColor} text-white p-4 rounded shadow-md">
          ${message}
        </div>
      `).fadeIn().delay(3000).fadeOut();
    }
  });
</script>
