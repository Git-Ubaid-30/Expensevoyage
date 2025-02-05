<?php
include('dbcon.php');


// Initialize variables and error messages
$destinationErr = $countryErr = $currencyErr = $imageErr = "";
$destination = $country = $currency = $image = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adddestination'])) {
    // Validate Destination
    if (empty($_POST["destination"])) {
        $destinationErr = "Destination name is required";
        $isValid = false;
    } else {
        $destination = $_POST["destination"];
    }

    // Validate Country
    if (empty($_POST["country"])) {
        $countryErr = "Country name is required";
        $isValid = false;
    } else {
        $country = $_POST["country"];
    }

    // Validate Currency
    if (empty($_POST["currency"])) {
        $currencyErr = "Currency is required";
        $isValid = false;
    } else {
        $currency = $_POST["currency"];
    }

    // Validate Image
    if (empty($_FILES["image"]["name"])) {
        $imageErr = "Image is required";
        $isValid = false;
    } else {
        $image = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $image_folder = "uploads/" . $image;
        move_uploaded_file($image_tmp, $image_folder);
    }

    // Insert into database if all validations pass
    if ($isValid) {
        try {
            // Use prepared statements with PDO
            $sql = "INSERT INTO destinations (destination, country, currency, image, created_at)
                    VALUES (:destination, :country, :currency, :image, NOW())";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':destination' => $destination,
                ':country' => $country,
                ':currency' => $currency,
                ':image' => $image,
            ]);

            echo "<script>
            alert('Destination added successfully!');
            window.location.href = '" . $_SERVER['PHP_SELF'] . "';
          </script>";
    exit();
            
        } catch (PDOException $e) {
            echo "<script>alert('Something went wrong: " . $e->getMessage() . "');</script>";
        }
    }
}
?>
