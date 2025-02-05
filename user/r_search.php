<?php
include('dbcon.php');



if (isset($_POST['inp']) && isset($_POST['userId'])) {
    $inp = $_POST['inp'];
    $userId = $_POST['userId'];
    $query = $pdo->prepare("SELECT id, destination, budget, arrival_date, departure_date FROM trips WHERE destination LIKE :val and user_id = :id
    ORDER BY arrival_date DESC ");
       
    $inp = "%$inp%";
    $query->bindParam('val', $inp);
    $query->bindParam('id', $userId); // Use 'userId' to match the placeholder in the query
    $query->execute();
    $allTrips = $query->fetchAll(PDO::FETCH_ASSOC);
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
            <td>
                <a class="custm-btm" href="report_details.php?rId=<?php echo $trip['id'] ?>"
                    class="button px-13 py-5 -dark-1 bg-dark-green-1 text-black editbtn">Details</a>
            </td>

        </tr>
        <?php
    }
?>
<?php
}
?>