<?php
include('php/query.php');
include('../session.php');
include('checkadmin.php');

// Sanitize function to clean input data
function sanitize($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// Ensure admin is logged in
if (isset($_SESSION['adminId'])) {
    $adminId = $_SESSION['adminId'];

    // Fetch admin data
    $query = $pdo->prepare("SELECT * FROM users WHERE id = :adminId");
    $query->bindParam(":adminId", $adminId);
    $query->execute();
    $admin = $query->fetch(PDO::FETCH_ASSOC);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update Personal Information
    if (isset($_POST['saveChanges'])) {
        $first_name = sanitize($_POST['first_name']);
        $last_name = sanitize($_POST['last_name']);
        $email = sanitize($_POST['email']);
        $phone = sanitize($_POST['phone']);
        $birthday = sanitize($_POST['birthday']);

        $query = $pdo->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, birthday = :birthday WHERE id = :adminId");
        $query->bindParam(":first_name", $first_name);
        $query->bindParam(":last_name", $last_name);
        $query->bindParam(":email", $email);
        $query->bindParam(":phone", $phone);
        $query->bindParam(":birthday", $birthday);
        $query->bindParam(":adminId", $adminId);

        if (!$query->execute()) {
            $errorInfo = $query->errorInfo();
            echo "<script>alert('Error updating personal information: " . $errorInfo[2] . "');</script>";
        } else {
            echo "<script>alert('Personal information updated successfully.');</script>";
            header("Location: db-settings.php"); // Change this to your desired page
            exit();
        }
    }

    // Update Location Information
    if (isset($_POST['saveLocation'])) {
        $address1 = sanitize($_POST['address1']);
        $address2 = sanitize($_POST['address2']);
        $city = sanitize($_POST['city']);
        $state = sanitize($_POST['state']);
        $country = sanitize($_POST['country']);
        $zip = sanitize($_POST['zip']);

        $query = $pdo->prepare("UPDATE users SET address1 = :address1, address2 = :address2, city = :city, state = :state, country = :country, zip = :zip WHERE id = :adminId");
        $query->bindParam(":address1", $address1);
        $query->bindParam(":address2", $address2);
        $query->bindParam(":city", $city);
        $query->bindParam(":state", $state);
        $query->bindParam(":country", $country);
        $query->bindParam(":zip", $zip);
        $query->bindParam(":adminId", $adminId);

        if (!$query->execute()) {
            $errorInfo = $query->errorInfo();
            echo "<script>alert('Error updating location information: " . $errorInfo[2] . "');</script>";
        } else {
            echo "<script>alert('Location information updated successfully.');</script>";
            header("Location: db-settings.php"); // Change this to your desired page
            exit();
        }
    }

    // Change Password
    if (isset($_POST['changePassword'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
    
        // Verify current password
        $query = $pdo->prepare("SELECT password FROM users WHERE id = :adminId");
        $query->bindParam(":adminId", $adminId);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            $stored_password = $row['password'];
    
            // Check if the stored password is in plain text or hashed
            if ($stored_password === $current_password || password_verify($current_password, $stored_password)) {
                // Proceed to change the password
                if ($new_password === $confirm_password) {
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $query = $pdo->prepare("UPDATE users SET password = :password WHERE id = :adminId");
                    $query->bindParam(":password", $hashed_password);
                    $query->bindParam(":adminId", $adminId);
    
                    if ($query->execute()) {
                        echo "<script>alert('Password changed successfully.');</script>";
                        header("Location: db-settings.php"); // Change this to your desired page
                        exit();
                    } else {
                        echo "<script>alert('Error changing password.');</script>";
                    }
                } else {
                    echo "<script>alert('New passwords do not match.');</script>";
                }
            } else {
                echo "<script>alert('Current password is incorrect.');</script>";
            }
        } else {
            echo "<script>alert('Error: Unable to find the user.');</script>";
        }
    }
    
}
?>






<?php
include 'include/A-header.php'
    ?>

<div class="dashboard__main">
    <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
            <div class="col-auto">
                <h1 class="text-30 lh-14 fw-600">Settings</h1>
                <div class="text-15 text-light-1">Manage your account settings</div>
            </div>
        </div>

        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="tabs -underline-2 js-tabs">
                <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">
                    <div class="col-auto">
                        <button
                            class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button is-tab-el-active"
                            data-tab-target=".-tab-item-1">Personal Information</button>
                    </div>
                    <div class="col-auto">
                        <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button"
                            data-tab-target=".-tab-item-2">Location Information</button>
                    </div>
                    <div class="col-auto">
                        <button class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 js-tabs-button"
                            data-tab-target=".-tab-item-3">Change Password</button>
                    </div>
                </div>

                <div class="tabs__content pt-30 js-tabs-content">
                    <!-- Personal Information Tab -->
                    <div class="tabs__pane -tab-item-1 is-tab-el-active">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="col-xl-9">
                                <div class="row x-gap-20 y-gap-20">
                                    <div class="col-md-6">
                                        <div class="form-input">
                                            <input type="text" name="first_name"
                                                value="<?php echo $admin['first_name'] ?? ''; ?>" required>
                                            <label class="lh-1 text-16 text-light-1">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-input">
                                            <input type="text" name="last_name"
                                                value="<?php echo $admin['last_name'] ?? ''; ?>" required>
                                            <label class="lh-1 text-16 text-light-1">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-input">
                                            <input type="email" name="email"
                                                value="<?php echo $admin['email'] ?? ''; ?>" required>
                                            <label class="lh-1 text-16 text-light-1">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-input">
                                            <input type="tel" name="phone" value="<?php echo $admin['phone'] ?? ''; ?>"
                                                required>
                                            <label class="lh-1 text-16 text-light-1">Phone Number</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-input">
                                            <input type="date" name="birthday"
                                                value="<?php echo $admin['birthday'] ?? ''; ?>" required>
                                            <label class="lh-1 text-16 text-light-1">Birthday</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block pt-30">
                                <button type="submit" name="saveChanges"
                                    class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                                    Save Changes <div class="icon-arrow-top-right ml-15"></div>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Location Information Tab -->
                    <div class="tabs__pane -tab-item-2">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="col-xl-9">
                                <div class="row x-gap-20 y-gap-20">
                                    <div class="col-12">
                                        <div class="form-input">
                                            <input type="text" name="address1"
                                                value="<?php echo $admin['address1'] ?? ''; ?>" required>
                                            <label class="lh-1 text-16 text-light-1">Address Line 1</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-input">
                                            <input type="text" name="address2"
                                                value="<?php echo $admin['address2'] ?? ''; ?>">
                                            <label class="lh-1 text-16 text-light-1">Address Line 2</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-input">
                                            <input type="text" name="city" value="<?php echo $admin['city'] ?? ''; ?>"
                                                required>
                                            <label class="lh-1 text-16 text-light-1">City</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-input">
                                            <input type="text" name="state" value="<?php echo $admin['state'] ?? ''; ?>"
                                                required>
                                            <label class="lh-1 text-16 text-light-1">State</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-input">
                                            <input type="text" name="country"
                                                value="<?php echo $admin['country'] ?? ''; ?>" required>
                                            <label class="lh-1 text-16 text-light-1">Country</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-input">
                                            <input type="text" name="zip" value="<?php echo $admin['zip'] ?? ''; ?>"
                                                required>
                                            <label class="lh-1 text-16 text-light-1">ZIP Code</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block pt-30">
                                <button type="submit" name="saveLocation"
                                    class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                                    Save Changes <div class="icon-arrow-top-right ml-15"></div>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Change Password Tab -->
                    <div class="tabs__pane -tab-item-3">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="col-xl-9">
                                <div class="row x-gap-20 y-gap-20">
                                    <div class="col-12">
                                        <div class="form-input">
                                            <input type="password" name="current_password" required>
                                            <label class="lh-1 text-16 text-light-1">Current Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-input">
                                            <input type="password" name="new_password" required>
                                            <label class="lh-1 text-16 text-light-1">New Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-input">
                                            <input type="password" name="confirm_password" required>
                                            <label class="lh-1 text-16 text-light-1">New Password Again</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block pt-30">
                                <button type="submit" name="changePassword"
                                    class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                                    Change Password <div class="icon-arrow-top-right ml-15"></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add your JavaScript files here -->
<!-- JavaScript -->
<script src="../../ajax/libs/Chart.js/3.7.1/chart.min.js"
    integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
<script src="../../%40googlemaps/markerclusterer%402.5.3/dist/index.min.js"></script>

<script src="js/vendors.js"></script>
<script src="js/main.js"></script>