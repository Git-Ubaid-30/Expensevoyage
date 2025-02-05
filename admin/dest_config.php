<?php
include('./php/dbcon.php');

$query = $pdo->query("select * from destinations");
$allcat = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($allcat as $cat) {
    ?>
    <tr>
        
        <td><?php echo $cat['destination'] ?></td>
        <td ><?php echo $cat['country'] ?></td>
        <td ><?php echo $cat['image'] ?></td>
        <td>
    <?php
    // Adjust the format to include both date and time
    $arrivalDate = DateTime::createFromFormat('Y-m-d H:i:s', $cat['created_at']);
    
    // Check if the date conversion was successful
    if ($arrivalDate !== false) {
        echo $arrivalDate->format('F j, Y g:i A');  // Format to display just the date
    } else {
        echo "Invalid Date";  // Display an error message if the date is invalid
    }
    ?>
</td>

        <td class="d-flex justify-content-between" width="200px">
            <a class="custm-btm" href="?destremove=<?php echo $cat['id'] ?>" class="button px-13 py-5 -dark-1 bg-red-1 text-black"
                onclick="return confirmDelete();">Remove</a>
            <a class="custm-btm" href="editDestination.php?cId=<?php echo $cat['id'] ?>"
                class="button px-13 py-5 -dark-1 bg-dark-green-1 text-black editbtn">Edit</a>
        </td>
    </tr>
    <?php
}
?>