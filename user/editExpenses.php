<?php
include('php/query.php');
// include('../session.php');
include('checkuser.php');
include("components/header_db.php");
?>

<?php
if (isset($_GET["eId"])) {
    $expensesId = $_GET["eId"];
    $query = $pdo->prepare("SELECT expenses.*, categories.name as catName , categories.id as catId , trips.name as tripName , trips.id as tripId FROM expenses INNER JOIN trips on expenses.t_id = trips.id inner join categories on expenses.c_id = categories.id where expenses.id = :eId");
    $query->bindParam("eId", $expensesId);
    $query->execute();
    $expenses = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="dashboard__main">
    <section class="layout-pt-lg layout-pb-lg bg-blue-2">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
                        <div class="row y-gap-20">
                            <div class="col-12">
                                <h1 class="text-22 fw-500">Update Expenses</h1>
                            </div>
                            <form action="" method="post" onsubmit="return validateForm()">
                                <div class="form-group mt-5">
                                    <select name="tId" class="form-control" required>
                                        <option value="<?php echo $expenses['tripId'] ?>">
                                            <?php echo $expenses['tripName'] ?>
                                        </option>
                                        <?php
                                        $query = $pdo->prepare("SELECT * FROM trips WHERE name != :eName");
                                        $query->bindParam('eName', $expenses['tripName']);
                                        $query->execute();
                                        $allTrips = $query->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($allTrips as $trip) {
                                            echo "<option value='{$trip['id']}'>{$trip['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                    <small class="text-danger"><?php echo $tIdErr ?></small>
                                </div>

                                <div class="form-group mt-5">
                                    <div class="form-input">
                                        <input value="<?php echo htmlspecialchars($expenses['price']) ?>" name="ePrice"
                                            type="text" pattern="^\d+(\.\d{1,2})?$"
                                            title="Enter a valid price (up to 2 decimal places)" required>
                                        <label class="lh-1 text-14 text-light-1">Price*</label>
                                    </div>
                                    <small class="text-danger"><?php echo $ePriceErr ?></small>
                                </div>

                                <div class="form-group mt-5">
                                    <select name="cId" class="form-control" required>
                                        <option value="<?php echo $expenses['catId'] ?>">
                                            <?php echo $expenses['catName'] ?>
                                        </option>
                                        <?php
                                        $query = $pdo->prepare("SELECT * FROM categories WHERE name != :eName");
                                        $query->bindParam('eName', $expenses['catName']);
                                        $query->execute();
                                        $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($allCategories as $category) {
                                            echo "<option value='{$category['id']}'>{$category['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                    <small class="text-danger"><?php echo $cIdErr ?></small>
                                </div>

                                <div class="col-12 mt-5">
                                    <div class="form-input">
                                        <textarea
                                            name="eNote"><?php echo htmlspecialchars($expenses['note']) ?></textarea>
                                        <label class="lh-1 text-14 text-light-1">Note (optional)</label>
                                    </div>
                                </div>

                                <button class="button mt-5 px-20 py-10 -dark-1 bg-blue-1 text-white"
                                    name="updateExpenses">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include("components/footer_db.php");
    ?>