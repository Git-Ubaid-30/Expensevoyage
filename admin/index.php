<?php
include('php/query.php');
include('../session.php');
include('checkadmin.php');
include 'include/A-header.php';

$user_name = '';
$user_phone = '';
$user_email = '';
// Check if admin or user is logged in and assign session values
if (isset($_SESSION['admin'])) {
  // $user_name = $_SESSION['adminfirstname'];
  // $user_phone = $_SESSION['adminphone']; // Assuming 'phone' is stored in session
  $user_email = $_SESSION['admin'];
} else if (isset($_SESSION['user'])) {
  $user_name = $_SESSION['userfirstname'];
  $user_phone = $_SESSION['userphone'];
  $user_email = $_SESSION['user'];
}
?>


<style>
  h1 {
    text-align: center;
  }

  .rainbow-text {
    font-weight: bold;
    background-image: linear-gradient(90deg, blue, violet);
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
  }

  .details {
    text-align: center;
    font-size: 18px;
    margin-top: 10px;
  }
</style>
<div class="dashboard__main bg-light">
  <div class="dashboard__content bg-light">
    <div class="row y-gap-20 justify-between bg-light items-end pb-60 lg:pb-40 md:pb-32">
      <div class="col-auto">



      </div>

      <div class="col-auto">

      </div>
    </div>


    <div class="row y-gap-30">



      <div class="">
        <div class="py-30 px-30 rounded-4  shadow-3">
          <div class="row y-gap-20 justify-between items-center">

            <!-- HTML Content -->
            <h1>Welcome, <span class="rainbow-text"><?php if (isset($_SESSION['adminfirstname'])) {
              echo $_SESSION['adminfirstname'];
            } else {
              echo "Session for adminfirstname is not set!";
            } ?></span>!</h1>

            <div class="details">

              <p><strong>Email:</strong> <?php echo htmlspecialchars($user_email); ?></p>
              <p><strong>GoTrip</strong></p>
            </div>

          </div>


        </div>
      </div>
    </div>


  </div>
</div>
</div>
</div>

<!-- JavaScript -->
<script src="../../ajax/libs/Chart.js/3.7.1/chart.min.js"
  integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
<script src="../../%40googlemaps/markerclusterer%402.5.3/dist/index.min.js"></script>

<script src="js/vendors.js"></script>
<script src="js/main.js"></script>