<?php include('php/query.php');
include('components/header.php');
?>

<div class="ratio ratio-16:9">
  <div class="map-ratio">
    <div class="map js-map-single">
      
    </div>
  </div>
</div>

<section>
  <div class="relative container">
    
    <div class="row justify-end">
      <div class="col-xl-5 col-lg-7">
        <div class="map-form px-40 pt-40 pb-50 lg:px-30 lg:py-30 md:px-24 md:py-24 bg-white rounded-4 shadow-4">
          <div class="text-22 fw-500">
            Send a message
          </div>

          <div class="row y-gap-20 pt-20">
            <style>
              .form-container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                /* Space between inputs */
              }

              .form-input {
                position: relative;
              }

              .form-input textarea {
                grid-column: 1 / span 2;
                /* Make the textarea span both columns */
              }

              /* Optional: Styling for button to appear centered under the form */
              .button-container {
                grid-column: 1 / span 2;
                display: flex;
                justify-content: center;
                margin-top: 20px;
              }
            </style>

            <form action="" method="post">
              <div class="form-container">
                <!-- Full Name Field on the left -->
                <div class="form-group">
                  <div class="form-input">
                    <input type="text" name="name" class="form-control">
                    <label class="lh-1 text-16 text-light-1">Full Name*</label>
                  </div>
                  <!-- <small id="helpId" class="text-danger"><?php echo $cNameErr ?></small> -->
                </div>


                <!-- Phone Number Field on the right -->
                <div class="form-group">
                  <div class="form-input">
                    <input type="tel" name="phone" class="form-control">
                    <label class="lh-1 text-16 text-light-1">Phone Number*</label>
                  </div>
                  <!-- <small id="helpId" class="text-danger"><?php echo $cPhoneErr ?></small> -->

                </div>

                <!-- Email Field on the left -->
                <div class="form-group">
                  <div class="form-input">
                    <input type="email" name="email" class="form-control">
                    <label class="lh-1 text-16 text-light-1">Email*</label>
                  </div>
                  <!-- <small id="helpId" class="text-danger"><?php echo $cEmailErr ?></small> -->
                </div>

                <!-- Subject Field on the right -->
                <div class="form-group">
                  <div class="form-input">
                    <input type="text" name="subject" class="form-control">
                    <label class="lh-1 text-16 text-light-1">Subject*</label>
                  </div>
                  <!-- <small id="helpId" class="text-danger"><?php echo $cSubjectErr ?></small> -->
                </div>

                <!-- Message Field (Text Area) on both columns -->
                <div class="form-group col-12" >
                  <div class="form-input" >
                    <textarea name="message" rows="4" class="form-control" ></textarea>
                    <label class="lh-1 text-16 text-light-1">Your Message (optional)</label>
                  </div>
                </div>
              </div>

              <!-- Submit button centered under the form -->
              <div class="button-container">
                <button type="submit" name="submitform" class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                  Send a Message
                  <div class="icon-arrow-top-right ml-15"></div>
                </button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="contact__map--area section--padding pt-0">
         
        </div>




<!-- JavaScript -->


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
<script src="../../../unpkg.com/%40googlemaps/markerclusterer%402.5.3/dist/index.min.js"></script>

<script src="js/vendors.js"></script>
<script src="js/main.js"></script>
</body>


<!-- Mirrored from creativelayers.net/themes/gotrip-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2024 07:00:31 GMT -->

</html>

<?php
include('components/footer.php');
?>