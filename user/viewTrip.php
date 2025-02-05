<?php
include('php/query.php');
// include('../session.php');
include('checkuser.php');
include("components/header_db.php");
?>

<style>
    .search {
        width: 95%;
    }
</style>

<div class="dashboard__main">

    <section class="p-5 layout-pb-lg bg-blue-2">

        <?php
        $today = new DateTime();
        $tomorrow = $today->modify('+1 day')->format('Y-m-d');

        // Query to get trips that have arrival_date as tomorrow
        $query = $pdo->prepare("SELECT destination FROM trips WHERE arrival_date = :tomorrow AND user_id = :id");
        $query->bindParam('id', $_SESSION['userId']);        
        $query->bindParam(':tomorrow', $tomorrow);
        $query->execute();
        $trips = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($trips)) {
            $messages = [];
            foreach ($trips as $trip) {
                $messages[] = "You have one day left for your trip to " . htmlspecialchars($trip['destination']);
            }
            $marqueeMessage = implode(' | ', $messages);
            echo '<marquee direction="left" class="mb-50">' . htmlspecialchars($marqueeMessage) . '</marquee>';
        }
        ?>
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-30 fw-500">View Tripes</h1>
                </div>
                <div class="col-md-6 text-right"> <!-- Align the button to the right -->
                    <a href="addTrip.php" class="fancy-button text-white">Add Trip</a>
                </div>
            </div>

            <div class="single-field relative d-flex items-center md:d-none ml-30 search">
                <input id="t_inp_value" class="pl-50 border-light text-dark-1 h-50 rounded-8" type="email" placeholder="Search by Name">
                <button class="absolute d-flex items-center h-full">
                    <i class="icon-search text-20 px-15 text-dark-1"></i>
                </button>
            </div>

            <div class="tabs__content pt-30 js-tabs-content">
                <div class="tabs__pane -tab-item-1 is-tab-el-active">
                    <div class="overflow-scroll scroll-bar-1">
                        <table class="table-3 -border-bottom col-12">
                            <thead class="bg-light-2">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">destination</th>
                                    <th scope="col">budget</th>
                                    <th scope="col">Arrival_date</th>
                                    <th scope="col">Departure_date</th>
                                    <th scope="col">Name</th>
                                    <th class="text-center">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>


                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


    </section>

    <?php
    include("components/footer_db.php");
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            function selectAllData() {
                $.ajax({
                    url: "trip_config.php",
                    type: "post",
                    data: { userId: <?php echo json_encode($_SESSION['userId']); ?> }, // Send userId
                    success: function (data) {
                        $('tbody').html(data);
                    }
                })
            }
            selectAllData();

            $("#t_inp_value").keyup(function () {
                let inpVal = $(this).val();
                if (inpVal != "") {
                    $.ajax({
                    url: "t_search.php",
                    type: "post",
                    data: { inp: inpVal, userId: <?php echo json_encode($_SESSION['userId']); ?> }, // Send userId
                    success: function (data) {
                        $('tbody').html(data);
                    }

                    })
                }
                else {
                    selectAllData();
                }

            })

        })

    </script>
                                
