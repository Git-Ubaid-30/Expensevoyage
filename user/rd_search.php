<?php
include('dbcon.php');

if (isset($_POST['from_date']) && isset($_POST['to_date']) && isset($_POST['trip_id'])) {
    // Get the date range from AJAX request
    $fromDate = $_POST['from_date'];
    $toDate = $_POST['to_date'];
    $tripId = $_POST['trip_id'];

    $query = $pdo->prepare("
        SELECT expenses.*, categories.name AS catName, categories.id AS catId, trips.name AS tripName, trips.id AS tId 
        FROM expenses 
        INNER JOIN trips ON expenses.t_id = trips.id 
        INNER JOIN categories ON expenses.c_id = categories.id 
        WHERE expenses.t_id = :tripId 
        AND expenses.user_id = :userId
        AND expenses.expanse_date BETWEEN :from_date AND :to_date
        ORDER BY expenses.expanse_date DESC
    ");

    // Bind the parameters to prevent SQL injection
    $query->bindParam(':from_date', $fromDate);
    $query->bindParam(':to_date', $toDate);
    $query->bindParam(':tripId', $tripId, PDO::PARAM_INT);
    $query->bindParam(':userId', $_SESSION['userId'], PDO::PARAM_INT); // Bind the user ID

    // Execute the query
    $query->execute();

    $allExpenses = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($allExpenses as $expenses) {
        ?>
        <tr>
            <td scope="row"><?php echo $expenses['id'] ?></td>
            <td><?php echo $expenses['tripName'] ?></td>
            <td><?php echo $expenses['price'] ?></td>
            <td><?php echo $expenses['catName'] ?></td>
            <td><?php echo $expenses['note'] ?></td>
            <td><?php 
            $arrivalDate = DateTime::createFromFormat('Y-m-d', $expenses['expanse_date']);
            echo $arrivalDate->format('F j, Y'); 
            ?></td>
        </tr>
        <?php
    }
}
?>
    