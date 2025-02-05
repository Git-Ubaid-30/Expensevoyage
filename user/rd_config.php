<?php
include('dbcon.php');

if (isset($_POST['trip_id']) && isset($_POST['userId'])) {
    $tripId = $_POST['trip_id'];
    $userId = $_POST['userId'];

    $query = $pdo->prepare("SELECT expenses.*, categories.name AS catName, categories.id AS catId, trips.name AS tripName, trips.id AS tId 
        FROM expenses 
        INNER JOIN trips ON expenses.t_id = trips.id 
        INNER JOIN categories ON expenses.c_id = categories.id 
        WHERE expenses.t_id = :tripId 
        AND expenses.user_id = :userId
        ORDER BY expenses.expanse_date DESC");
    
    $query->bindParam(':userId', $userId);  // Bind the user_id from the POST data
    $query->bindParam(':tripId', $tripId, PDO::PARAM_INT);
    $query->execute();

    $allExpenses = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($allExpenses as $expenses) {
        ?>
        <tr>
            <td scope="row"><?php echo $expenses['id']; ?></td>
            <td><?php echo htmlspecialchars($expenses['tripName']); ?></td>
            <td><?php echo htmlspecialchars($expenses['price']); ?></td>
            <td><?php echo htmlspecialchars($expenses['catName']); ?></td>
            <td><?php echo htmlspecialchars($expenses['note']); ?></td>
            <td><?php 
                $arrivalDate = DateTime::createFromFormat('Y-m-d', $expenses['expanse_date']);
                echo $arrivalDate->format('F j, Y'); 
            ?></td>
        </tr>
        <?php
    }
}
?>
