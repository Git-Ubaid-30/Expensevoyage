<?php
include('php/query.php');
// include('../session.php');
include('checkuser.php');
include("components/header_db.php");

if (isset($_GET['rId'])) {
    $tripId = $_GET['rId'];
} else {
    // Handle case when rId is not set
    echo "No trip ID specified.";
    exit;
}
?>

<style>
    .search {
        width: 95%;
    }
    .custm-btn {
    height: 40px;
    margin: auto;
    margin-top: 45px;
}
.single-field.relative.d-flex.items-center.md\:d-none.ml-30.search {
    background: #d6d6e1;
    padding: 7px 70px;
    border-radius: 30px;
}
input#to_date, input#from_date{
    background: white;
    border-radius: 15px;
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
                    <h1 class="text-30 fw-500">Report Detail</h1>
                </div>
            </div>

            <div class="single-field relative d-flex items-center md:d-none ml-30 search">
                <form id="dateRangeForm">
                    <div class="row">

                        <div class="col-md-4">
                            <label for="from_date">From Date:</label>
                            <input type="date" id="from_date" name="from_date" required>
                        </div>
                        <div class="col-md-4"> <label for="to_date">To Date:</label>
                            <input type="date" id="to_date" name="to_date" required>
                        </div>
                   

                    <div class="col-md-4 d-flex align-item-end">
                        
                        <button type="submit" class="fancy-button text-white custm-btn">Search</button>
                    </div>
            </div>





            </form>
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
            // Get the trip ID from the URL query string
            let urlParams = new URLSearchParams(window.location.search);
            let tripId = urlParams.get('rId'); // Get 'rId' from URL

            function selectAllData() {
                if (tripId) {  // Check if tripId is available
                    $.ajax({
                        url: "rd_config.php",
                        type: "post",
                        data: { trip_id: tripId, userId: <?php echo json_encode($_SESSION['userId']); ?>},  // Send trip_id in AJAX request
                        success: function (data) {
                            $('tbody').html(data);
                        },
                        error: function (xhr, status, error) {
                            console.error("Error in AJAX request: ", error);
                        }
                    });
                } else {
                    console.error("Trip ID not found in URL.");
                }
            }

            selectAllData();

            $('#dateRangeForm').on('submit', function (e) {
                e.preventDefault();  // Prevent form from submitting normally

                var fromDate = $('#from_date').val();
                var toDate = $('#to_date').val();

                // Check if dates are filled in
                if (fromDate && toDate) {
                    $.ajax({
            url: "rd_search.php",  // PHP file that fetches data
            method: "POST",  // Change to POST
            data: { from_date: fromDate, to_date: toDate, trip_id: tripId, userId: <?php echo json_encode($_SESSION['userId']); ?> },
            success: function (data) {
                $('tbody').html(data);  // Show the results
            },
            error: function (xhr, status, error) {
                console.error("Error in AJAX request: ", error);
            }
        });
                } else {
                    alert("Please select both dates.");
                }
            });
        });

    </script>