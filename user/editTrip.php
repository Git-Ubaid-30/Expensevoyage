<?php
include('php/query.php');
// include('../session.php');
include('checkuser.php');
include("components/header_db.php");
?>

<?php
if (isset($_GET["tId"])) {
    $tripId = $_GET["tId"];
    $query = $pdo->prepare("select * from trips where id = :tId");
    $query->bindParam("tId", $tripId);
    $query->execute();
    $trips = $query->fetch(PDO::FETCH_ASSOC);
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
                                <h1 class="text-22 fw-500">Trips</h1>
                            </div>
                            <form action="" method="post">
                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo $trips['destination'] ?>" name="t_destination" type="text">
                                        <label class="lh-1 text-14 text-light-1">Destination</label>
                                    </div>
                                </div>
                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo $trips['budget'] ?>" name="t_budget" type="text">
                                        <label class="lh-1 text-14 text-light-1">Budget</label>
                                    </div>
                                </div>
                                <div class="form-group mt-5">
    <div class="form-input">
        <input value="<?php echo $trips['arrival_date']; ?>" id="arrivalDate" name="t_arrivdate" type="date" min="<?php echo date('Y-m-d'); ?>">
        <label class="lh-1 text-14 text-light-1">Arrival date</label>
    </div>
</div>

<div class="form-group mt-5">
    <div class="form-input">
        <input value="<?php echo $trips['departure_date']; ?>" id="departureDate" name="t_depdate" type="date" min="<?php echo date('Y-m-d'); ?>">
        <label class="lh-1 text-14 text-light-1">Departure date</label>
    </div>
</div>
                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo $trips['name'] ?>" name="t_name" type="text">
                                        <label class="lh-1 text-14 text-light-1">Name</label>
                                    </div>
                                </div>
                                <button class="button mt-5 px-20 py-10 -dark-1 bg-blue-1 text-white"
                                    name="updateTrip">update</button>
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