<?php
include('dbcon.php');

if (isset($_POST['inp']) && isset($_POST['userId'])) {
    $inp = $_POST['inp'];
    $userId = $_POST['userId'];

    $query = $pdo->prepare("SELECT * FROM categories WHERE name LIKE :val AND user_id = :userId");

    $inp = "%$inp%";
    $query->bindParam('val', $inp);
    $query->bindParam('userId', $userId); // Use 'userId' to match the placeholder in the query
    $query->execute();
    $allcat = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($allcat as $cat) {
        ?>
        <tr>
            <td scope="row"><?php echo $cat['id'] ?></td>
            <td><?php echo $cat['name'] ?></td>
            <td><?php echo $cat['description'] ?></td>
            <td class="d-flex justify-content-between" width="200px">
                <a class="custm-btm" href="?Catremove=<?php echo $cat['id'] ?>"
                    class="button px-13 py-5 -dark-1 bg-red-1 text-black" onclick="return confirmDelete();">Remove</a>
                <a class="custm-btm" href="editCategory.php?cId=<?php echo $cat['id'] ?>"
                    class="button px-13 py-5 -dark-1 bg-dark-green-1 text-black editbtn">Edit</a>
            </td>
        </tr>
        <?php
    }
}
?>
