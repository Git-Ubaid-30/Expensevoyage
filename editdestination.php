<?php
session_start();

// Include your database connection file
$mysqli = include('admin/include/db.php');

// Check if the user is logged in by checking the session
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

// Check if a destination ID is passed for editing
if (isset($_GET['destinationEdit'])) {
    $destinationId = $_GET['destinationEdit'];

    // Get the destination details from the database
    $stmt = $mysqli->prepare("SELECT * FROM destinations WHERE id = ?");
    $stmt->bind_param("i", $destinationId);
    $stmt->execute();
    $result = $stmt->get_result();
    $destination = $result->fetch_assoc();

    if (!$destination) {
        $_SESSION['error_message'] = "Destination not found.";
        header("Location: admin/destination.php");
        exit;
    }
} else {
    header("Location: admin/destinations.php");
    exit;
}

// Handle form submission for updating the destination
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newDestination = $_POST['destination'];
    $newCountry = $_POST['country'];
    $newCurrency = $_POST['currency'];

    // Handle the image upload if a new image is provided
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        
        // Delete the old image
        if (file_exists($destination['image'])) {
            unlink($destination['image']);
        }
        
        // Update the destination record with the new image
        $stmt = $mysqli->prepare("UPDATE destinations SET destination = ?, country = ?, currency = ?, image = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $newDestination, $newCountry, $newCurrency, $imagePath, $destinationId);
    } else {
        // Update the destination record without changing the image
        $stmt = $mysqli->prepare("UPDATE destinations SET destination = ?, country = ?, currency = ? WHERE id = ?");
        $stmt->bind_param("sssi", $newDestination, $newCountry, $newCurrency, $destinationId);
    }

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Destination updated successfully.";
    } else {
        $_SESSION['error_message'] = "Failed to update destination.";
    }

    header("Location: admin/destination.php");
    exit;
}

include 'admin/include/A-header1.php';
?>

<div class="dashboard__main">
    <section class="p-5 layout-pb-lg bg-blue-2">
        <div class="container">
            <h1 class="text-30 fw-500">Edit Destination</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="destination">Destination</label>
                    <input type="text" class="form-control" id="destination" name="destination" value="<?php echo htmlspecialchars($destination['destination']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" value="<?php echo htmlspecialchars($destination['country']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="currency">Currency</label>
                    <input type="text" class="form-control" id="currency" name="currency" value="<?php echo htmlspecialchars($destination['currency']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="image">Change Image (optional)</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <small>Current Image:</small>
                    <br>
                    <img src="<?php echo htmlspecialchars($destination['image']); ?>" alt="Destination Image" width="200">
                </div>

                <button type="submit" class="button px-20 py-10 -dark-1 bg-blue-1 text-white">Update Destination</button>
            </form>
        </div>
    </section>

    <?php include("admin/include/A-footer.php"); ?>
</div>
