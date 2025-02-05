<?php

include('php/query.php');
include('../session.php');
include('checkadmin.php');
include 'include/A-header.php';
// include'admin/include/A-header1.php';

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
                    <h1 class="text-30 fw-500">View Destination</h1>
                </div>
                <div class="col-md-6 text-right"> <!-- Align the button to the right -->
                    <a href="adddestination.php" class="fancy-button text-white">Add Destination</a>
                </div>
            </div>

            <div class="single-field relative d-flex items-center md:d-none ml-30 search">
                <input id="c_inp_value" class="pl-50 border-light text-dark-1 h-50 rounded-8" type="email" placeholder="Search by Destination">
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
                                    <!-- <th>#</th> -->
                                    <th>Destination</th>
                                    <th>country</th>
                                    <th>image</th>
                                    <th>created_at</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody> <!-- Add ID for easier targeting -->



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
                    url: "dest_config.php",
                    type: "post",
                    success: function (data) {
                        $('tbody').html(data);
                    }
                })
            }
            selectAllData();

            $("#c_inp_value").keyup(function () {
                let inpVal = $(this).val();
                if (inpVal != "") {
                    $.ajax({
                        url: "dest_search.php",
                        type: "post",
                        data: { inp: inpVal },
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