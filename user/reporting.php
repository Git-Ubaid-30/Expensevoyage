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
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-30 fw-500">History</h1>
                </div>
            </div>

            <div class="single-field relative d-flex items-center md:d-none ml-30 search">
                <input id="r_inp_value" class="pl-50 border-light text-dark-1 h-50 rounded-8" type="email"
                    placeholder="Search by Destination">
                <button class="absolute d-flex items-center h-full">
                    <i class="icon-search text-20 px-15 text-dark-1"></i>
                </button>
            </div>

            <div class="tabs__content pt-30 js-tabs-content">
                <div class="tabs__pane -tab-item-1 is-tab-el-active">
                    <div class="overflow-scroll scroll-bar-1">
                        <table class="table-2 col-12">
                            <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>Destination</th>
                                    <th>Budget</th>
                                    <th>Arrival Date</th>
                                    <th>Departure Date</th>
                                    <th>Action</th>
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
                    url: "r_config.php",
                    type: "post",
                    data: { userId: <?php echo json_encode($_SESSION['userId']); ?> },
                    success: function (data) {
                        $('tbody').html(data);
                    }
                })
            }
            selectAllData();

            $("#r_inp_value").keyup(function () {
                let inpVal = $(this).val();
                if (inpVal != "") {
                    $.ajax({
                        url: "r_search.php",
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