<?php
include('php/query.php');
// include('../session.php');
include('checkuser.php');
include("components/header_db.php");
?>


<div class="dashboard__main">
  <div class="dashboard__content bg-light-2">
    <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
      <div class="col-auto">

        <h1 class="text-30 lh-14 fw-600">Dashboard</h1>

      </div>

      <div class="col-auto">

      </div>
    </div>

    <div class="row y-gap-30">

      <?php

      $query = $pdo->prepare('SELECT COUNT(*) as total_trips FROM trips where user_id = :id');
      $query->bindParam('id', $_SESSION['userId']);
      $query->execute();

      $trips = $query->fetch(PDO::FETCH_ASSOC);

      ?>

      <div class="col-xl-3 col-md-6">
        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
          <div class="row y-gap-20 justify-between items-center">
            <div class="col-auto">
              <div class="fw-500 lh-14">All Trips</div>
              <!-- Display the total number of trips dynamically -->
              <div class="text-26 lh-16 fw-600 mt-5"><?php echo $trips['total_trips']; ?></div>
              <div class="text-15 lh-14 text-light-1 mt-5">Total Trips</div>
            </div>

            <div class="col-auto">
              <img src="img/dashboard/icons/1.svg" alt="icon">
            </div>
          </div>
        </div>
      </div>


      <?php

      $query = $pdo->prepare('SELECT SUM(price) as total_expanse FROM expenses where user_id = :id');
      $query->bindParam('id', $_SESSION['userId']);
      $query->execute();

      $expenses = $query->fetch(PDO::FETCH_ASSOC);

      $total_expenses = $expenses['total_expanse'] ?? 0;

      ?>

      <div class="col-xl-3 col-md-6">
        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
          <div class="row y-gap-20 justify-between items-center">
            <div class="col-auto">
              <div class="fw-500 lh-14">All Expanse</div>
              <div class="text-26 lh-16 fw-600 mt-5"><?php echo $total_expenses ?></div>
              <div class="text-15 lh-14 text-light-1 mt-5">Total Expanse</div>
            </div>

            <div class="col-auto">
              <img src="img/dashboard/icons/2.svg" alt="icon">
            </div>
          </div>
        </div>
      </div>

      <?php

      $query = $pdo->prepare('SELECT SUM(budget) as total_budget FROM trips where user_id = :id');
      $query->bindParam('id', $_SESSION['userId']);
      $query->execute();

      $budget = $query->fetch(PDO::FETCH_ASSOC);

      $total_budget = $budget['total_budget'] ?? 0;

      ?>

      <div class="col-xl-3 col-md-6">
        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
          <div class="row y-gap-20 justify-between items-center">
            <div class="col-auto">
              <div class="fw-500 lh-14">Total Budget</div>
              <div class="text-26 lh-16 fw-600 mt-5"><?php echo $total_budget ?></div>
              <div class="text-15 lh-14 text-light-1 mt-5">Total Budget</div>
            </div>

            <div class="col-auto">
              <img src="img/dashboard/icons/3.svg" alt="icon">
            </div>
          </div>
        </div>
      </div>



    </div>

    <div class="row y-gap-30 pt-20" style="width:100%;">

      <div class="col-xl-12">
        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
          <div class="d-flex justify-between items-center">
            <h2 class="text-18 lh-1 fw-500">Recent Trips</h2>
            <div class="">
              <a href="#" class="text-14 text-blue-1 fw-500 underline">View All</a>
            </div>
          </div>

          <div class="overflow-scroll scroll-bar-1 pt-30">
            <table class="table-2 col-12">
              <thead class="">
                <tr>
                  <th>#</th>
                  <th>Destination</th>
                  <th>Budget</th>
                  <th>Arrival Date</th>
                  <th>Departure Date</th>
                  <th class="text-left">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Query to get the recent trips from your database
                $query = $pdo->prepare('SELECT id, destination, budget, arrival_date, departure_date FROM trips  where user_id = :id ORDER BY arrival_date DESC LIMIT 5');
                $query->bindParam('id', $_SESSION['userId']);
                $query->execute();
                $trips = $query->fetchAll(PDO::FETCH_ASSOC);

                // Check if there are any trips
                if (!empty($trips)) {
                  foreach ($trips as $trip) {
                    // Display each trip row
                    echo "<tr>
                <td>{$trip['id']}</td>
                <td>{$trip['destination']}</td>
                <td class='fw-500'>\${$trip['budget']}</td>
                <td>{$trip['arrival_date']}</td>
                <td>{$trip['departure_date']}</td>
                <td>";

                    // Example status logic based on trip dates (you can modify this as per your needs)
                    $current_date = date('Y-m-d');
                    if ($trip['departure_date'] >= $current_date) {
                      echo "<div class='rounded-100 py-4 text-center col-12 text-14 fw-500 bg-blue-1-05 text-blue-1'>Upcoming</div>";
                    } else {
                      echo "<div class='rounded-100 py-4 text-center col-12 text-14 fw-500 bg-yellow-4 text-yellow-3'>Completed</div>";
                    }

                    echo "</td>
              </tr>";
                  }
                } else {
                  // Display a message if there are no trips
                  echo "<tr><td colspan='3' class='text-center'>No recent trips found</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php
    include("components/footer_db.php");
    ?>