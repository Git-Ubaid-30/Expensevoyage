

<?php

include('php/query.php');
include('../session.php');
include('checkadmin.php');
include 'include/A-header.php';
// include'admin/include/A-header1.php';
?>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px 0;
            border: none;
            border-bottom: 2px solid #ccc;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            outline: none;
            border-bottom-color: #007bff;
        }
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
        .file-input-wrapper .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .file-input-wrapper .btn:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        button[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
    </style>

    <div class="container">
        <h1>Add Destination</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="destination">Destination Name:</label>
                <input type="text" id="destination" name="destination">
                <span class="error"><?php echo $destinationErr; ?></span>
            </div>

            <div class="form-group">
                <label for="country">Country Name:</label>
                <input type="text" id="country" name="country">
                <span class="error"><?php echo $countryErr; ?></span>
            </div>

            <div class="form-group">
                <label for="currency">Currency:</label>
                <input type="text" id="currency" name="currency">
                <span class="error"><?php echo $currencyErr; ?></span>
            </div>

            <div class="form-group">
                <label for="image">Destination Image:</label>
                <div class="file-input-wrapper">
                    <button type="button" class="btn">Choose File</button>
                    <input type="file" id="image" name="image">
                </div>
                <span class="error"><?php echo $imageErr; ?></span>
            </div>

            <button type="submit" name="adddestination">Add Destination</button>
        </form>
    </div>

    </section>
</div>
<?php
include 'include/A-footer.php';
?>

   <!-- JavaScript -->
   <script src="../../ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
  <script src="../../%40googlemaps/markerclusterer%402.5.3/dist/index.min.js"></script>

  <script src="admin/js/vendors.js"></script>
  <script src="admin/js/main.js"></script>