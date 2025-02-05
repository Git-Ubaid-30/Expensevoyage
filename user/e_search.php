<?php
include('dbcon.php');

if (isset($_POST['inp']) && isset($_POST['userId'])) {
    $inp = $_POST['inp'];
    $userId = $_POST['userId'];

    $query = $pdo->prepare("SELECT expenses.*, categories.name AS catName, categories.id AS catId, trips.name AS tripName, trips.id AS tId 
    FROM expenses 
    INNER JOIN trips ON expenses.t_id = trips.id 
    INNER JOIN categories ON expenses.c_id = categories.id 
    WHERE trips.name LIKE :val AND expenses.user_id = :id");

    $inp = "%$inp%";
    $query->bindParam('val', $inp);
    $query->bindParam('id', $userId); // Use 'id' to match the placeholder in the query
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
            <td><?php $arrivalDate = DateTime::createFromFormat('Y-m-d', $expenses['expanse_date']);
            echo $arrivalDate->format('F j, Y'); ?></td>
            <td class="d-flex justify-content-between" width="200px">
                <a class="custm-btm" href="?eRemove=<?php echo $expenses['id'] ?>"
                    class="button px-13 py-5 -dark-1 bg-red-1 text-black" onclick="return confirmDelete();">Remove</a>
                <a class="custm-btm" href="editExpenses.php?eId=<?php echo $expenses['id'] ?>"
                    class="button px-13 py-5 -dark-1 bg-dark-green-1 text-black editbtn">Edit</a>
            </td>
        </tr>
        <?php
    }
}
?>
