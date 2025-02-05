<?php
include('php/query.php');
// include('../session.php');
include('checkuser.php');
include("components/header_db.php");
?>
<?php
if (isset($_GET["cId"])) {
    $CategoryId = $_GET["cId"];
    $query = $pdo->prepare("SELECT * FROM categories where id = :id");
    $query->bindParam("id", $CategoryId);
    $query->execute();
    $Category = $query->fetch(PDO::FETCH_ASSOC);
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
                                <h1 class="text-22 fw-500">Update Categories</h1>
                            </div>
                            <form action="" method="post">

                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo $Category['name'] ?>" name="cName" type="text">
                                        <label class="lh-1 text-14 text-light-1">Category</label>

                                    </div>
                                    <small id="helpId" class="text-danger"><?php echo $cCatErr; ?></small>
                                </div>
                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo $Category['description'] ?>" name="cDes" type="text">
                                        <label class="lh-1 text-14 text-light-1">Description</label>

                                    </div>
                                    <small id="helpId" class="text-danger"><?php echo $cDesErr; ?></small>
                                </div>

                             


                                <button class="button mt-5 px-20 py-10 -dark-1 bg-blue-1 text-white"
                                    name="updateCategory">update</button>
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