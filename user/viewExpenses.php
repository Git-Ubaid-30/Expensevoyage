<?php
include('php/query.php');
// include('../session.php');
include('checkuser.php');
include("components/header_db.php");

$query = $pdo->prepare("SELECT * FROM trips WHERE budget <= 500 and user_id = :id");
$query->bindParam('id', $_SESSION['userId']); 
$tripsWarning = $query->fetchAll(PDO::FETCH_ASSOC);

// Check if there are any trips with low budget
$warningMessage = "";
if (!empty($tripsWarning)) {
    $warningMessage = "Warning: Your budget is running low. Here are the trips with a budget of 500 or less: ";
    foreach ($tripsWarning as $trip) {
        $warningMessage .= $trip['destination'] . " (" . $trip['budget'] . " left), ";
    }
    // Remove trailing comma and space
    $warningMessage = rtrim($warningMessage, ', ');
}
?>

<style>
    .search {
        width: 95%;
    }
</style>

<div class="dashboard__main">
    <section class="p-5 layout-pb-lg bg-blue-2">
        <?php if (!empty($warningMessage)): ?>
            <marquee direction="left" class="mb-50"><?php echo htmlspecialchars($warningMessage); ?></marquee>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-30 fw-500">View Expenses</h1>

                </div>
                <div class="col-md-6 text-right"> <!-- Align the button to the right -->
                    <a href="addExpenses.php" class="fancy-button text-white">Add Expenses</a>
                </div>
            </div>

            <div class="single-field relative d-flex items-center md:d-none ml-30 search">
                <input id="e_inp_value" class="pl-50 border-light text-dark-1 h-50 rounded-8" type="email" placeholder="Search by Trip Name">
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
                                    <th scope="col">Trip Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Date</th>
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
                    url: "exp_config.php",
                    type: "post",
                    data: { userId: <?php echo json_encode($_SESSION['userId']); ?> },
                    success: function (data) {
                        $('tbody').html(data);
                    }
                })
            }
            selectAllData();

            $("#e_inp_value").keyup(function () {
                let inpVal = $(this).val();
                if (inpVal != "") {
                    $.ajax({
                        url: "e_search.php",
                        type: "post",
                        data: { inp: inpVal, userId: <?php echo json_encode($_SESSION['userId']); ?> },
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