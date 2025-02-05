<?php
include('dbcon.php');

// Check for userId in POST data or use session
if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];
} else {
    $userId = $_SESSION['userId']; // Fallback to session if not sent
}

// Prepare the query
$query = $pdo->prepare("
    SELECT expenses.*, categories.name AS catName, categories.id AS catId, trips.name AS tripName, trips.id AS tId 
    FROM expenses 
    INNER JOIN trips ON expenses.t_id = trips.id 
    INNER JOIN categories ON expenses.c_id = categories.id 
    WHERE expenses.user_id = :userId
");

// Bind the user ID parameter
$query->bindParam(':userId', $userId);

// Execute the query
$query->execute();

// Fetch all results
$allExpenses = $query->fetchAll(PDO::FETCH_ASSOC);

// Check if any records were found
if (empty($allExpenses)) {
    echo "<tr><td colspan='7'>No expenses found.</td></tr>";
} else {
    foreach ($allExpenses as $expenses) {
        ?>
        <tr>
            <td scope="row"><?php echo $expenses['id']; ?></td>
            <td><?php echo htmlspecialchars($expenses['tripName']); ?></td>
            <td><?php echo htmlspecialchars($expenses['price']); ?></td>
            <td><?php echo htmlspecialchars($expenses['catName']); ?></td>
            <td><?php echo htmlspecialchars($expenses['note']); ?></td>
            <td>
                <?php 
                $arrivalDate = DateTime::createFromFormat('Y-m-d', $expenses['expanse_date']);
                echo $arrivalDate ? $arrivalDate->format('F j, Y') : 'N/A'; 
                ?>
            </td>
            <td class="d-flex justify-content-between" width="200px">
                <a class="custm-btm" href="?eRemove=<?php echo $expenses['id']; ?>"
                   class="button px-13 py-5 -dark-1 bg-red-1 text-black" onclick="return confirmDelete();">Remove</a>
                <a class="custm-btm" href="editExpenses.php?eId=<?php echo $expenses['id']; ?>"
                   class="button px-13 py-5 -dark-1 bg-dark-green-1 text-black editbtn">Edit</a>
            </td>
        </tr>
        <?php
    }
}
?>
