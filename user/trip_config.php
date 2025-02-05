<?php
include('dbcon.php');

if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];
} else {
    $userId = $_SESSION['userId']; // Fallback to session if not sent
}

$query = $pdo->prepare("SELECT * FROM trips WHERE user_id = :id");
$query->bindParam('id', $userId); // Use the userId from AJAX
$query->execute(); // Execute the query
$allTrips = $query->fetchAll(PDO::FETCH_ASSOC);

if (empty($allTrips)) {
    echo '<tr><td colspan="7">No trips found for this user.</td></tr>'; // Handle no results
} else {
    foreach ($allTrips as $trip) {
        ?>
        <tr>
            <td scope="row"><?php echo $trip['id'] ?></td>
            <td><?php echo $trip['destination'] ?></td>
            <td><?php echo $trip['budget'] ?></td>
            <td><?php $arrivalDate = DateTime::createFromFormat('Y-m-d', $trip['arrival_date']);
            echo $arrivalDate->format('F j, Y'); ?></td>
            <td><?php $departureDate = DateTime::createFromFormat('Y-m-d', $trip['departure_date']);
            echo $departureDate->format('F j, Y'); ?></td>
            <td><?php echo $trip['name'] ?></td>
            <td class="d-flex justify-content-between" width="200px">
                <a class="custm-btm" href="?tripRemove=<?php echo $trip['id'] ?>"
                    class="button px-13 py-5 -dark-1 bg-red-1 text-black" onclick="return confirmDelete();">Remove</a>
                <a class="custm-btm" href="editTrip.php?tId=<?php echo $trip['id'] ?>"
                    class="button px-13 py-5 -dark-1 bg-dark-green-1 text-black editbtn">Edit</a>
            </td>
        </tr>
        <?php
    }
}
?>
