<?php
include('php/query.php');
// include('../session.php');
include('checkuser.php');
include("components/header_db.php");
?>

<div class="dashboard__main">
    <section class="layout-pt-lg layout-pb-lg bg-blue-2">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
                        <div class="row y-gap-20">
                            <div class="col-12">
                                <h1 class="text-22 fw-500">Expenses</h1>
                            </div>
                            <form action="" method="post">
                                <div class="form-group mt-5">
                                    <select name="tId" id="" class="form-control">
                                        <option value="">Select Trip</option>
                                        <?php
                                        $query = $pdo->prepare("Select * from trips where user_id = :id");
                                        $query->bindParam("id", $_SESSION['userId']); // Bind user_id from session
                                        $query->execute();
                                        $allTrips = $query->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($allTrips as $trip) {
                                            ?>
                                            <option value="<?php echo $trip['id'] ?>"><?php echo $trip['name'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <!-- <small id="helpId" class="text-danger"><?php echo $tIdErr ?></small> -->
                                </div>
                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo htmlspecialchars ($ePrice) ?>" name="ePrice" type="text">
                                        <label class="lh-1 text-14 text-light-1">Price*</label>
                                    </div>
                                    <small id="helpId" class="text-danger"><?php echo $ePriceErr ?></small>
                                </div>
                                <div class="form-group mt-5">
                                    <select name="cId" id="" class="form-control" required>
                                        <option value="">Select category</option>
                                        <?php
                                        $query = $pdo->prepare("SELECT * FROM categories WHERE user_id = :id");
                                        $query->bindParam("id", $_SESSION['userId']);
                                        $query->execute();
                                        $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($allCategories as $category) {
                                            ?>
                                            <option value="<?php echo $category['id'] ?>"><?php echo htmlspecialchars($category['name']) ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <!-- <small id="helpId" class="text-danger"><?php echo $cIdErr; ?></small> -->
                                </div>

                                <div class="col-12 mt-5">
                                    <div class="form-input ">
                                        <textarea name="eNote" id=""><?php echo htmlspecialchars ($eNote) ?></textarea>
                                        <label class="lh-1 text-14 text-light-1">Note(optional)</label>
                                    </div>
                                </div>
                                <button class="button mt-5 px-20 py-10 -dark-1 bg-blue-1 text-white"
                                    name="addExpenses">Add</button>
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