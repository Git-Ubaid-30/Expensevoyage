<?php
include('php/query.php');
include 'session.php';
include('components/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .error-alert {
            position: fixed;
            top: 100px;
            right: 20px;
            background-color: red;
            color: white;
            padding: 10px;
            border-radius: 5px;
            display: none;
            z-index: 9999;
        }
    </style>
</head>
<body>

<div class="error-alert" id="error-alert"></div>

<section class="layout-pt-lg layout-pb-lg bg-blue-2">
    <div class="container">
        <div class="row justify-center">
            <div class="col-xl-6 col-lg-7 col-md-9">
                <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
                    <form method="POST">
                        <div class="row y-gap-20">
                            <div class="col-12">
                                <h1 class="text-22 fw-500">Welcome back</h1>
                                <p class="mt-10">Don't have an account yet? <a href="register.php" class="text-blue-1">Sign up for free</a></p>
                            </div>

                            <div class="col-12">
                                <div class="form-input ">
                                    <input type="text" name="email" required="">
                                    <label class="lh-1 text-14 text-light-1">Email</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-input ">
                                    <input type="password" name="password" required="">
                                    <label class="lh-1 text-14 text-light-1">Password</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" name="signin" class="button py-20 -dark-1 bg-blue-1 text-white" style="width: 115px;">
                                    Sign In <div class="icon-arrow-top-right ml-15"></div>
                                </button>
                                 <p class="mt-10">Forget Your Password<a href="forget.php" class="text-blue-1"> Here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('#loginForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: '', // The same page handles the PHP request
                method: 'POST',
                data: $(this).serialize() + '&ajax=true', // Append ajax=true to indicate AJAX request
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        window.location.href = response.redirect; // Redirect on success
                    } else if (response.status === 'error') {
                        $('#error-alert').text(response.message).fadeIn().delay(3000).fadeOut(); // Show error
                    }
                },
                error: function() {
                    $('#error-alert').text('An unexpected error occurred').fadeIn().delay(3000).fadeOut();
                }
            });
        });
    });
</script>

</body>
</html>

<?php
include('components/footer.php');
?>