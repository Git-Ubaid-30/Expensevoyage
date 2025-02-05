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
                                <h1 class="text-22 fw-500">Trips</h1>
                            </div>
                            <form action="" method="post">
                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo $t_dest ?>" name="t_destination" type="text">
                                        <label class="lh-1 text-14 text-light-1">Destination</label>
                                    </div>
                                    <small id="helpId" class="text-danger"><?php echo $t_destErr ?></small>
                                </div>

                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo $t_bud ?>" name="t_budget" type="text">
                                        <label class="lh-1 text-14 text-light-1">Budget</label>
                                    </div>
                                    <small id="helpId" class="text-danger"><?php echo $t_budErr ?></small>
                                </div>
                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo $t_arrival ?>" name="t_arrivdate" id="arrivalDate"
                                            type="date" min="<?php echo date('Y-m-d'); ?>">
                                        <label class="lh-1 text-14 text-light-1">Arrival date</label>
                                    </div>
                                    <small id="helpId" class="text-danger"><?php echo $t_arrivalErr ?></small>
                                </div>

                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo $t_depart ?>" name="t_depdate" id="departureDate"
                                            type="date" min="<?php echo date('Y-m-d'); ?>">
                                        <label class="lh-1 text-14 text-light-1">Departure date</label>
                                    </div>
                                    <small id="helpId" class="text-danger"><?php echo $t_departErr ?></small>
                                </div>


                                <div class="form-group mt-5">
                                    <div class="form-input ">
                                        <input value="<?php echo $t_name ?>" name="t_name" type="text">
                                        <label class="lh-1 text-14 text-light-1">Name</label>
                                    </div>
                                    <small id="helpId" class="text-danger"><?php echo $t_nameErr ?></small>
                                </div>

                                <button class="button mt-5 px-20 py-10 -dark-1 bg-blue-1 text-white"
                                    name="addTrip">Add</button>
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