<?php
include('dbcon.php');
if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];
} else {
    $userId = $_SESSION['userId']; // Fallback to session if not sent
}

$query = $pdo->prepare("select * from categories Where user_id = :id");
$query->bindParam('id', $userId); // Use the userId from AJAX
$query->execute(); // Execute the query
$allcat = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($allcat as $cat) {
    ?>
    <tr>
        <td scope="row"><?php echo $cat['id'] ?></td>
        <td><?php echo $cat['name'] ?></td>
        <td scope="row"><?php echo $cat['description'] ?></td>
        <td class="d-flex justify-content-between" width="200px">
            <a class="custm-btm" href="?Catremove=<?php echo $cat['id'] ?>" class="button px-13 py-5 -dark-1 bg-red-1 text-black"
                onclick="return confirmDelete();">Remove</a>
            <a class="custm-btm" href="editCategory.php?cId=<?php echo $cat['id'] ?>"
                class="button px-13 py-5 -dark-1 bg-dark-green-1 text-black editbtn">Edit</a>
        </td>
    </tr>
    <?php
}
?>