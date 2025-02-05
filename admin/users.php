<?php
include('php/query.php');
include('../session.php');
include('checkadmin.php');
include 'include/A-header.php';

?> 
<div class="dashboard__main">
 <section class="p-5 layout-pb-lg bg-blue-2">
  
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-30 fw-500">All Users </h1>
                    
                </div>
                <div class="col-md-6">
                   
                </div>

                <div class="tabs__content pt-30 js-tabs-content">
                    <div class="tabs__pane -tab-item-1 is-tab-el-active">
                        <div class="overflow-scroll scroll-bar-1">
                        <?php


// Function to sanitize input
function sanitize($input) {
    return htmlspecialchars(strip_tags($input));
}

// Handle delete action
if (isset($_POST['delete'])) {
    $id = sanitize($_POST['id']);
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// Handle update action
if (isset($_POST['update'])) {
    $id = sanitize($_POST['id']);
    $first_name = sanitize($_POST['first_name']);
    $last_name = sanitize($_POST['last_name']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    
    $stmt = $pdo->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone WHERE id = :id");
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// Fetch users
$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
$query = "SELECT * FROM users WHERE 
          first_name LIKE :search OR 
          last_name LIKE :search OR 
          email LIKE :search OR 
          phone LIKE :search";
$stmt = $pdo->prepare($query);
$searchParam = "%$search%";
$stmt->bindParam(':search', $searchParam);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="p-5 layout-pb-lg bg-blue-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-30 fw-500">All Users</h1>
            </div>
            <div class="col-md-6">
                <form action="" method="GET" class="d-flex justify-content-end">
                    <input type="text" name="search" placeholder="Search users..." class="form-control mr-2" value="<?php echo $search; ?>">
                    <button type="submit" class="btn btn-primary" >Search</button>
                </form>
            </div>

            <div class="tabs__content pt-30 js-tabs-content">
                <div class="tabs__pane -tab-item-1 is-tab-el-active">
                    <div class="overflow-scroll scroll-bar-1">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            foreach ($result as $row): ?>
                                    <tr>
                                        <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td>
                                            <button onclick="openModal(<?php echo $row['id']; ?>, '<?php echo $row['first_name']; ?>', '<?php echo $row['last_name']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['phone']; ?>')" class="btn btn-sm btn-outline-primary mr-2"></button>
                                            <form action="" method="POST" class="d-inline">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="delete" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')" style="color : red;">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
function openModal(id, firstName, lastName, email, phone) {
    var modal = new bootstrap.Modal(document.getElementById('editModal'));
    document.getElementById('editId').value = id;
    document.getElementById('editFirstName').value = firstName;
    document.getElementById('editLastName').value = lastName;
    document.getElementById('editEmail').value = email;
    document.getElementById('editPhone').value = phone;
    modal.show();
}
</script>


                        </div>
                    </div>
                </div>

            </div>
    </section>


<?php
include 'include/A-footer.php';
?> 