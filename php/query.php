<?php
include('dbcon.php');
?>


<!-- add expenses start here -->

<?php
$ePrice = $eNote = "";
$tIdErr = $ePriceErr = $cIdErr = "";

// Regular expression patterns
$idPattern = '/^[0-9]+$/'; // For tId and cId (only digits allowed)
$pricePattern = '/^\d+(\.\d{1,2})?$/'; // For ePrice (valid number, optional up to 2 decimal places)

if (isset($_POST["addExpenses"])) {
    $tId = $_POST["tId"];
    $ePrice = $_POST["ePrice"];
    $cId = $_POST["cId"];
    $eNote = isset($_POST["eNote"]) ? $_POST["eNote"] : ""; // Note is optional

    // Validate tId (must be numeric)
    if (empty($tId) || !preg_match($idPattern, $tId)) {
        $tIdErr = "Must select a valid Trip (numeric)";
    }

    // Validate ePrice (must be a valid number)
    if (empty($ePrice) || !preg_match($pricePattern, $ePrice)) {
        $ePriceErr = "Price is required and must be a valid number (up to 2 decimal places)";
    }

    // Validate cId (must be numeric)
    if (empty($cId)) {
        $cIdErr = "Must select a valid Category";
    }

    // If no errors, proceed with checking budget and executing the queries
    if (empty($tIdErr) && empty($ePriceErr) && empty($cIdErr)) {
        try {
            // Get the current budget for the trip
            $query = $pdo->prepare("SELECT budget FROM trips WHERE id = :tId");
            $query->bindParam("tId", $tId);
            $query->execute();
            $trip = $query->fetch(PDO::FETCH_ASSOC);

            if ($trip) {
                $currentBudget = $trip['budget'];

                // Check if the expense exceeds the current budget
                if ($ePrice > $currentBudget) {
                    echo '<script>alert("Expense exceeds the available budget. You only have ' . $currentBudget . ' left.");</script>';
                } else {
                    // Start a transaction
                    $pdo->beginTransaction();

                    // Insert the new expense into the expenses table
                    $insertExpenseQuery = $pdo->prepare("INSERT INTO expenses (t_id, price, c_id, note) VALUES (:tId, :ePrice, :cId, :eNote)");
                    $insertExpenseQuery->bindParam("tId", $tId);
                    $insertExpenseQuery->bindParam("ePrice", $ePrice);
                    $insertExpenseQuery->bindParam("cId", $cId);
                    $insertExpenseQuery->bindParam("eNote", $eNote); // Bind optional note
                    $insertExpenseQuery->execute();

                    // Update the trip's budget by subtracting the new expense amount
                    $updateBudgetQuery = $pdo->prepare("UPDATE trips SET budget = budget - :ePrice WHERE id = :tId");
                    $updateBudgetQuery->bindParam("ePrice", $ePrice);
                    $updateBudgetQuery->bindParam("tId", $tId);
                    $updateBudgetQuery->execute();

                    // Commit the transaction
                    $pdo->commit();

                    // Get the updated budget to check if it is now zero
        $query = $pdo->prepare("SELECT budget FROM trips WHERE id = :tId");
        $query->bindParam("tId", $tId);
        $query->execute();
        $updatedTrip = $query->fetch(PDO::FETCH_ASSOC);

        if ($updatedTrip && $updatedTrip['budget'] == 0) {
            echo '<script>alert("Expense added and budget updated successfully. Your budget is now 0."); location.assign("viewExpenses.php");</script>';
        } else {
            echo '<script>alert("Expense added and budget updated successfully."); location.assign("viewExpenses.php");</script>';
        }
                }
                


            } else {
                echo '<script>alert("Trip not found.");</script>';
            }
        } catch (Exception $e) {
            // Rollback the transaction in case of an error
            $pdo->rollBack();
            echo '<script>alert("Failed to add expense: ' . $e->getMessage() . '");</script>';
        }
    }
}

?>

<!-- remove expenses start here -->

<?php
if (isset($_GET['eRemove'])) {
    $expensesId = $_GET['eRemove'];
    $query = $pdo->prepare("delete from expenses where id = :eId");
    $query->bindParam("eId", $expensesId);
    $query->execute();
    echo '<script> alert("Remove Successfully");location.assign("viewExpenses.php")</script>';
}
?>



<!-- update expenses start here -->

<?php
if (isset($_POST["updateExpenses"])) {
    // Validation patterns
    $idPattern = "/^\d+$/"; // Numeric values only
    $pricePattern = "/^\d+(\.\d{1,2})?$/"; // Numbers with up to 2 decimal places

    // Error messages
    $tIdErr = $ePriceErr = $cIdErr = "";
    $eNote = isset($_POST["eNote"]) ? $_POST["eNote"] : "";

    // Validate Trip ID
    if (empty($_POST["tId"]) || !preg_match($idPattern, $_POST["tId"])) {
        $tIdErr = "Must select a valid Trip (numeric)";
    }

    // Validate Price
    if (empty($_POST["ePrice"]) || !preg_match($pricePattern, $_POST["ePrice"])) {
        $ePriceErr = "Price is required and must be a valid number (up to 2 decimal places)";
    }

    // Validate Category ID
    if (empty($_POST["cId"]) || !preg_match($idPattern, $_POST["cId"])) {
        $cIdErr = "Must select a valid Category (numeric)";
    }

    // If no validation errors, proceed with updating
    if (empty($tIdErr) && empty($ePriceErr) && empty($cIdErr)) {
        $expensesId = $_GET["eId"];
        $tId = $_POST["tId"];
        $ePrice = $_POST["ePrice"];
        $cId = $_POST["cId"];

        try {
            // Get the current budget for the trip
            $query = $pdo->prepare("SELECT budget FROM trips WHERE id = :tId");
            $query->bindParam("tId", $tId);
            $query->execute();
            $trip = $query->fetch(PDO::FETCH_ASSOC);

            if ($trip) {
                $currentBudget = $trip['budget'];

                // Check if the new expense exceeds the current budget
                if ($ePrice > $currentBudget) {
                    echo '<script>alert("Expense exceeds the available budget. You only have ' . $currentBudget . ' left.");</script>';
                } else {
                    // Start a transaction
                    $pdo->beginTransaction();

                    // Update the expense in the expenses table
                    $updateExpenseQuery = $pdo->prepare("UPDATE expenses SET t_id = :tId, price = :ePrice, c_id = :cId, note = :eNote WHERE id = :eId");
                    $updateExpenseQuery->bindParam("tId", $tId);
                    $updateExpenseQuery->bindParam("ePrice", $ePrice);
                    $updateExpenseQuery->bindParam("cId", $cId);
                    $updateExpenseQuery->bindParam("eNote", $eNote);
                    $updateExpenseQuery->bindParam("eId", $expensesId);
                    $updateExpenseQuery->execute();

                    // Update the trip's budget by subtracting the updated expense amount
                    $updateBudgetQuery = $pdo->prepare("UPDATE trips SET budget = budget - :ePrice WHERE id = :tId");
                    $updateBudgetQuery->bindParam("ePrice", $ePrice);
                    $updateBudgetQuery->bindParam("tId", $tId);
                    $updateBudgetQuery->execute();

                    // Commit the transaction
                    $pdo->commit();

                    // Get the updated budget to check if it is now zero
                    $query = $pdo->prepare("SELECT budget FROM trips WHERE id = :tId");
                    $query->bindParam("tId", $tId);
                    $query->execute();
                    $updatedTrip = $query->fetch(PDO::FETCH_ASSOC);

                    if ($updatedTrip && $updatedTrip['budget'] == 0) {
                        echo '<script>alert("Expense updated and budget is now 0."); location.assign("viewExpenses.php");</script>';
                    } else {
                        echo '<script>alert("Expense updated successfully."); location.assign("viewExpenses.php");</script>';
                    }
                }
            } else {
                echo '<script>alert("Trip not found.");</script>';
            }
        } catch (Exception $e) {
            // Rollback the transaction in case of an error
            $pdo->rollBack();
            echo '<script>alert("Failed to update expense: ' . $e->getMessage() . '");</script>';
        }
    }
}
?>




<!-- add trips start here -->

<?php

$t_dest = $t_bud = $t_arrival = $t_depart = $t_name = "";
$t_destErr = $t_budErr = $t_arrivalErr = $t_departErr = $t_nameErr = "";

// Regular expression patterns
$destinationPattern = "/^[a-zA-Z\s]+$/"; // Letters and spaces only
$budgetPattern = "/^\d+(\.\d{1,2})?$/";  // Valid number with optional 2 decimal places
$datePattern = "/^\d{4}-\d{2}-\d{2}$/";  // YYYY-MM-DD format
$namePattern = "/^[a-zA-Z\s]+$/";        // Letters and spaces only

if (isset($_POST['addTrip'])) {
    // Fetch form data
    $t_dest = $_POST['t_destination'];
    $t_bud = $_POST['t_budget'];
    $t_arrival = $_POST['t_arrivdate'];
    $t_depart = $_POST['t_depdate'];
    $t_name = $_POST['t_name'];

    // Validate Destination
    if (empty($t_dest) || !preg_match($destinationPattern, $t_dest)) {
        $t_destErr = "Must enter a valid destination (letters and spaces only)";
    }

    // Validate Budget
    if (empty($t_bud) || !preg_match($budgetPattern, $t_bud)) {
        $t_budErr = "Must enter a valid budget (numbers only, optional 2 decimals)";
    }

    // Validate Arrival Date
    if (empty($t_arrival) || !preg_match($datePattern, $t_arrival)) {
        $t_arrivalErr = "Must enter a valid arrival date (format: YYYY-MM-DD)";
    }

    // Validate Departure Date
    if (empty($t_depart) || !preg_match($datePattern, $t_depart)) {
        $t_departErr = "Must enter a valid departure date (format: YYYY-MM-DD)";
    }

    // Validate Name
    if (empty($t_name) || !preg_match($namePattern, $t_name)) {
        $t_nameErr = "Must enter a valid name (letters and spaces only)";
    } else {
        // Check for duplicate trip name
        $checkQuery = $pdo->prepare("SELECT COUNT(*) FROM trips WHERE name = :t_name");
        $checkQuery->bindParam("t_name", $t_name);
        $checkQuery->execute();
        $tripCount = $checkQuery->fetchColumn();

        if ($tripCount > 0) {
            $t_nameErr = "A trip with this name already exists. Please choose a different name.";
        }
    }

    // If there are no errors, proceed with inserting into the database
    if (empty($t_destErr) && empty($t_budErr) && empty($t_arrivalErr) && empty($t_departErr) && empty($t_nameErr)) {
        $query = $pdo->prepare("INSERT INTO trips(destination, budget, arrival_date, departure_date, name) VALUES(:t_destination, :t_budget, :t_arrival, :t_departure, :t_name)");
        $query->bindParam("t_destination", $t_dest);
        $query->bindParam("t_budget", $t_bud);
        $query->bindParam("t_arrival", $t_arrival);
        $query->bindParam("t_departure", $t_depart);
        $query->bindParam("t_name", $t_name);
        $query->execute();

        echo '<script>alert("Trip added successfully"); location.assign("viewTrip.php");</script>';
    }
}
?>





<!-- remove expenses start here -->

<?php
if (isset($_GET['tripRemove'])) {
    $tripId = $_GET['tripRemove'];
    $query = $pdo->prepare("delete from trips where id = :tId");
    $query->bindParam("tId", $tripId);
    $query->execute();
    echo '<script> alert("Remove Successfully");location.assign("viewTrip.php")</script>';
}
?>



<!-- update trips start here -->

<?php
if (isset($_POST['updateTrip'])) {
    $tripId = $_GET['tId'];
    $t_dest = $_POST['t_destination'];
    $t_bud = $_POST['t_budget']; // Ensure this is the budget field
    $t_arrival = $_POST['t_arrivdate'];
    $t_depart = $_POST['t_depdate'];
    $t_name = $_POST['t_name'];

    // Prepare the query
    $query = $pdo->prepare("UPDATE trips SET destination = :t_destination, budget = :t_budget, arrival_date = :t_arrivdate, departure_date = :t_depart, name = :t_name WHERE id = :tId");

    // Bind parameters
    $query->bindParam("t_destination", $t_dest);
    $query->bindParam("t_budget", $t_bud); // Update the budget field here
    $query->bindParam("t_arrivdate", $t_arrival);
    $query->bindParam("t_depart", $t_depart); // Corrected parameter name
    $query->bindParam("t_name", $t_name);
    $query->bindParam("tId", $tripId);

    // Execute the query
    $query->execute();

    // Redirect after update
    echo '<script> alert("Trip updated successfully"); location.assign("viewTrip.php"); </script>';
}
?>




<?php
$Cat = $Desc = "";
$errCat = $errdesc = "";

// Regular expression patterns
$Categorypattern = '/^[a-zA-Z\s]+$/'; // For category name (only letters and spaces allowed)
$Descriptionpattern = '/^[a-zA-Z0-9\s]+$/'; // For description (alphanumeric characters and spaces allowed)

if (isset($_POST["addCat"])) {
    $cName = trim($_POST["category"]); // Trim to remove leading/trailing spaces
    $cDesc = trim($_POST["description"]);

    // Validate category (must be alphabetic)
    if (empty($cName) || !preg_match($Categorypattern, $cName)) {
        $errCat = "Please enter a valid category (only letters and spaces allowed).";
    } else {
        $Cat = $cName;
    }

    // Validate description (must be alphanumeric)
    if (empty($cDesc) || !preg_match($Descriptionpattern, $cDesc)) {
        $errdesc = "Please enter a valid description (alphanumeric characters only).";
    } else {
        $Desc = $cDesc;
    }

    // If no errors, check for duplicate category and execute the query
    if (empty($errCat) && empty($errdesc)) {
        try {
            // Check if the category already exists
            $checkQuery = $pdo->prepare("SELECT COUNT(*) FROM categories WHERE name = :name");
            $checkQuery->bindParam("name", $cName);
            $checkQuery->execute();
            $categoryCount = $checkQuery->fetchColumn();

            if ($categoryCount > 0) {
                $errCat = "The category already exists. Please choose a different name.";
            } else {
                // If no duplicate, insert the new category
                $query = $pdo->prepare("INSERT INTO categories (name, description) VALUES (:name, :desc)");
                $query->bindParam("name", $cName);
                $query->bindParam("desc", $cDesc);

                $query->execute();

                echo '<script>alert("Category added successfully"); location.assign("viewCategory.php");</script>';
            }
        } catch (Exception $e) {
            echo '<script>alert("Failed to add category: ' . $e->getMessage() . '");</script>';
        }
    }
}
?>




<?php
if (isset($_GET['Catremove'])) {
    $id = $_GET['Catremove'];
    $query = $pdo->prepare("DELETE FROM categories WHERE id = :cId");
    $query->bindParam(":cId", $id);
    $query->execute();
    echo '<script> alert("Remove Successfully");location.assign("viewCategory.php")</script>';
}
?>

<?php
// Initialize error variables
$cCatErr = $cDesErr = '';
$valid = true;

$alphaPattern = '/^[a-zA-Z\s]+$/'; // Allow only alphabetic characters and spaces

// Check if the form has been submitted
if (isset($_POST['updateCategory'])) {
    // Get form inputs
    $cName = $_POST['cName'];
    $cDes = $_POST['cDes'];
    $cId = $_GET['cId']; // Assuming the ID comes from the URL


    // Validate Category Name
    if (empty($cName)) {
        $cCatErr = 'Category name is required.';
        $valid = false;
    } elseif (!preg_match($alphaPattern, $cName)) {
        $cCatErr = 'Category name can only contain alphabets and spaces.';
        $valid = false;
    }

    // Validate Description
    if (empty($cDes)) {
        $cDesErr = 'Description is required.';
        $valid = false;
    } elseif (!preg_match($alphaPattern, $cDes)) {
        $cDesErr = 'Description can only contain alphabets and spaces.';
        $valid = false;
    }

    // If all validations pass, proceed with the update
    if ($valid) {
        try {
            // Prepare the update query
            $query = $pdo->prepare("UPDATE categories SET name = :name, description = :description  WHERE id = :id");
            $query->bindParam(':name', $cName);
            $query->bindParam(':description', $cDes);
            $query->bindParam(':id', $cId);

            // Execute the update query
            if ($query->execute()) {
                echo "<script>alert('Category updated successfully.'); window.location.href='viewCategory.php';</script>";
            } else {
                echo "<script>alert('Error updating category.');</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>