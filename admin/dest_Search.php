<?php
include('./php/dbcon.php');

if (isset($_POST['inp'])) {
    $inp = $_POST['inp'];
    
    // Prepare and bind the query with a wildcard for the 'like' operator
    $query = $pdo->prepare("SELECT * FROM destinations WHERE destination LIKE :val");
    $inp = "%$inp%";
    $query->bindParam(':val', $inp);
    $query->execute();
    
    $allcat = $query->fetchAll(PDO::FETCH_ASSOC);

    // Loop through the fetched data
    foreach ($allcat as $cat) {
        ?>
        <tr>
            <td><?php echo $cat['destination']; ?></td>
            <td><?php echo $cat['country']; ?></td>
            <td><?php echo $cat['image']; ?></td>
            <td>
                <?php
                // Adjust the format to include both date and time
                $arrivalDate = DateTime::createFromFormat('Y-m-d H:i:s', $cat['created_at']);
                
                // Check if the date conversion was successful
                if ($arrivalDate !== false) {
                    echo $arrivalDate->format('F j, Y g:i A');  // Format to display date and time
                } else {
                    echo "Invalid Date";  // Display an error message if the date is invalid
                }
                ?>
            </td>
            <td class="d-flex justify-content-between" width="200px">
                <a class="custm-btm" href="?Catremove=<?php echo $cat['id']; ?>" 
                   class="button px-13 py-5 -dark-1 bg-red-1 text-black" 
                   onclick="return confirmDelete();">Remove</a>
                
                <a class="custm-btm" href="editCategory.php?cId=<?php echo $cat['id']; ?>" 
                   class="button px-13 py-5 -dark-1 bg-dark-green-1 text-black editbtn">Edit</a>
            </td>
        </tr>
        <?php
    }
}
?>
