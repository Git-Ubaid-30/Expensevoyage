<?php
include('php/query.php');
include('components/header.php');
?>




<section data-anim-wrap class="masthead -type-1 z-5">
  <div data-anim-child="fade" class="masthead__bg">
    <img src="" alt="image" data-src="img/webimg/img-1.jpg" class="js-lazy">
  </div>

  <div class="container">
    <div class="row justify-center">
      <div class="col-auto">
        <div class="text-center">
          <h1 data-anim-child="slide-up delay-4" class="text-60 lg:text-40 md:text-30 text-white">Find Next Place To
            Visit</h1>
          <p data-anim-child="slide-up delay-5" class="text-white mt-6 md:mt-10">Discover amzaing places at
            exclusive deals</p>
        </div>

        <div data-anim-child="slide-up delay-6" class="tabs -underline mt-60 js-tabs">
          <div class="tabs__controls d-flex x-gap-30 y-gap-20 justify-center sm:justify-start js-tabs-controls">
            <div class="">
              <button class="tabs__button text-15 fw-500 text-white pb-4 js-tabs-button is-tab-el-active"
                data-tab-target="">
               
              </button>
            </div>
          </div>

        
        </div>
      </div>
    </div>
  </div>
</section>

<section class="layout-pt-lg layout-pb-md">
  <div class="container">
    <div data-anim="slide-up delay-1" class="row y-gap-20 justify-between items-end">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Popular Destinations</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
        </div>
      </div>

      <!-- <div class="col-auto md:d-none">

        <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
          View All Destinations <div class="icon-arrow-top-right ml-15"></div>
        </a>

      </div> -->
    </div>

    <div class="relative pt-40 sm:pt-20 js-section-slider" data-gap="30" data-scrollbar
      data-slider-cols="base-2 xl-4 lg-3 md-2 sm-2 base-1" data-anim="slide-up delay-2">
      
      <div class="swiper-wrapper">
        <?php
        $query = $pdo->query('select * from destinations');
        $allgallery = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allgallery as $gallery){
        ?>
            <div class="swiper-slide">
              <a href="#" class="citiesCard -type-2">
                <div class="citiesCard__image rounded-4 ratio ratio-1:1">
                <img class="img-ratio rounded-4 js-lazy" src="<?php echo $gallery ['image']?>" >

                </div>
                <div class="citiesCard__content mt-10">
                  <h4 class="text-18 lh-13 fw-500 text-dark-1">
                  <?php echo $gallery ['destination']?>
                  <?php echo $gallery ['country']?>
                  </h4>
                  <div class="text-14 text-light-1">Currency <?php echo htmlspecialchars($gallery['currency']); ?></div>
                </div>
              </a>
            </div>
            <?php
            }
            ?>
         
      </div>


      <button
        class="section-slider-nav -prev flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-prev">
        <i class="icon icon-chevron-left text-12"></i>
      </button>

      <button
        class="section-slider-nav -next flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-next">
        <i class="icon icon-chevron-right text-12"></i>
      </button>


      <div class="slider-scrollbar bg-light-2 mt-40 sm:d-none js-scrollbar"></div>

     
    </div>
  </div>
</section>

<section class="layout-pt-md layout-pb-md">
  <div class="container">
    <div class="row y-gap-20">
      <div data-anim="slide-up" class="col-md-6">

        <div class="ctaCard -type-1 rounded-4 ">
          <div class="ctaCard__image ratio ratio-63:55">
            <img class="img-ratio js-lazy" src="#" data-src="img/backgrounds/1.png" alt="image">
          </div>

          <div class="ctaCard__content py-70 px-70 lg:py-30 lg:px-30">


            <h4 class="text-40 lg:text-26 text-white">Things to do on<br> your trip</h4>

            <div class="d-inline-block mt-30">
              <a href="#" class="button px-48 py-15 -blue-1 -min-180 bg-white text-dark-1">Experiences</a>
            </div>
          </div>
        </div>

      </div>

      <div data-anim="slide-up delay-1" class="col-md-6">

        <div class="ctaCard -type-1 rounded-4 ">
          <div class="ctaCard__image ratio ratio-63:55">
          <img class="img-ratio js-lazy" src="#" data-src="img/webimg/img-1.jpg" alt="image">
          </div>

          <div class="ctaCard__content py-70 px-70 lg:py-30 lg:px-30">

            <div class="text-15 fw-500 text-white mb-10">Enjoy Summer Deals</div>


            <h4 class="text-40 lg:text-26 text-white">Up to 70% Discount!</h4>

            <div class="d-inline-block mt-30">
              <a href="#" class="button px-48 py-15 -blue-1 -min-180 bg-white text-dark-1">Learn More</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>



<section class="layout-pt-lg layout-pb-md">
  <div data-anim-wrap class="container">
    <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Why Choose Us</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot things </p>
        </div>
      </div>
    </div>

    <div class="row y-gap-40 justify-between pt-50">

      <div data-anim-child="slide-up delay-2" class="col-lg-3 col-sm-6">

        <div class="featureIcon -type-1 ">
          <div class="d-flex justify-center">
            <img src="#" data-src="img/featureIcons/1/1.svg" alt="image" class="js-lazy">
          </div>

          <div class="text-center mt-30">
            <h4 class="text-18 fw-500">Customizable Travel Plans</h4>
            <p class="text-15 mt-10">Icon Idea: Gear or Pencil
              Text: "We offer flexible, customizable trip options tailored to your preferences, allowing you to plan
              your perfect getaway exactly how you envision it."</p>
          </div>
        </div>

      </div>

      <div data-anim-child="slide-up delay-3" class="col-lg-3 col-sm-6">

        <div class="featureIcon -type-1 ">
          <div class="d-flex justify-center">
            <img src="#" data-src="img/featureIcons/1/2.svg" alt="image" class="js-lazy">
          </div>

          <div class="text-center mt-30">
            <h4 class="text-18 fw-500">Affordable & Transparent Pricing</h4>
            <p class="text-15 mt-10">Icon Idea: Price Tag or Wallet
              Text: "We provide clear, affordable pricing with no hidden fees, helping you get the best value for your
              adventure without compromising on quality."</p>
          </div>
        </div>

      </div>

      <div data-anim-child="slide-up delay-4" class="col-lg-3 col-sm-6">

        <div class="featureIcon -type-1 ">
          <div class="d-flex justify-center">
            <img src="#" data-src="img/featureIcons/1/3.svg" alt="image" class="js-lazy">
          </div>

          <div class="text-center mt-30">
            <h4 class="text-18 fw-500">24/7 Support & Assistance</h4>
            <p class="text-15 mt-10">Icon Idea: Headset or Lifebuoy
              Text: "Our dedicated support team is available around the clock to assist you with any questions or
              concerns, so you can travel with peace of mind."</p>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<section class="layout-pt-lg layout-pb-lg bg-blue-2">
  <div data-anim-wrap class="container">
    <div class="row y-gap-40 justify-between">
      <div data-anim-child="slide-up delay-1" class="col-xl-5 col-lg-6">
        <h2 class="text-30">What our customers are<br> saying us?</h2>
        <p class="mt-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit
          amet tempor nibh finibus et. Aenean eu enim justo.</p>

        <div class="row y-gap-30 pt-60 lg:pt-40">
          <div class="col-sm-5 col-6">
            <div class="text-30 lh-15 fw-600">13m+</div>
            <div class="text-light-1 lh-15">Happy People</div>
          </div>

          <div class="col-sm-5 col-6">
            <div class="text-30 lh-15 fw-600">4.88</div>
            <div class="text-light-1 lh-15">Overall rating</div>

            <div class="d-flex x-gap-5 items-center pt-10">

              <div class="icon-star text-blue-1 text-10"></div>

              <div class="icon-star text-blue-1 text-10"></div>

              <div class="icon-star text-blue-1 text-10"></div>

              <div class="icon-star text-blue-1 text-10"></div>

              <div class="icon-star text-blue-1 text-10"></div>

            </div>
          </div>
        </div>
      </div>

      <div data-anim-child="slide-up delay-2" class="col-lg-6">
        <div class="overflow-hidden js-testimonials-slider-3" data-scrollbar>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row items-center x-gap-30 y-gap-20">
                <div class="col-auto">
                  <img src="#" data-src="img/avatars/1.png" alt="image" class="js-lazy">
                </div>

                <div class="col-auto">
                  <h5 class="text-16 fw-500">Annette Black</h5>
                  <div class="text-15 text-light-1 lh-15">UX / UI Designer</div>
                </div>
              </div>

              <p class="text-18 fw-500 text-dark-1 mt-30 sm:mt-20">The place is in a great location in Gumbet. The
                area is safe and beautiful. The apartment was comfortable and the host was kind and responsive to
                our requests.</p>
            </div>

            <div class="swiper-slide">
              <div class="row items-center x-gap-30 y-gap-20">
                <div class="col-auto">
                  <img src="#" data-src="img/avatars/1.png" alt="image" class="js-lazy">
                </div>

                <div class="col-auto">
                  <h5 class="text-16 fw-500">Annette Black</h5>
                  <div class="text-15 text-light-1 lh-15">UX / UI Designer</div>
                </div>
              </div>

              <p class="text-18 fw-500 text-dark-1 mt-30 sm:mt-20">The place is in a great location in Gumbet. The
                area is safe and beautiful. The apartment was comfortable and the host was kind and responsive to
                our requests.</p>
            </div>

            <div class="swiper-slide">
              <div class="row items-center x-gap-30 y-gap-20">
                <div class="col-auto">
                  <img src="#" data-src="img/avatars/1.png" alt="image" class="js-lazy">
                </div>

                <div class="col-auto">
                  <h5 class="text-16 fw-500">Annette Black</h5>
                  <div class="text-15 text-light-1 lh-15">UX / UI Designer</div>
                </div>
              </div>

              <p class="text-18 fw-500 text-dark-1 mt-30 sm:mt-20">The place is in a great location in Gumbet. The
                area is safe and beautiful. The apartment was comfortable and the host was kind and responsive to
                our requests.</p>
            </div>

          </div>

          <div class="d-flex items-center mt-60 sm:mt-20 js-testimonials-slider-pag">
            <div class="text-dark-1 fw-500 js-current">01</div>
            <div class="slider-scrollbar bg-border ml-20 mr-20 w-max-300 js-scrollbar"></div>
            <div class="text-dark-1 fw-500 js-all">05</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="layout-pt-lg layout-pb-md">
  <div data-anim-wrap class="container">
    <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Get inspiration for your next trip</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames</p>
        </div>
      </div>
    </div>

    <div class="row y-gap-30 pt-40">

      <div data-anim-child="slide-left delay-1" class="col-lg-4 col-sm-6">

        <a href="#" class="blogCard -type-1 d-block ">
          <div class="blogCard__image">
            <div class="ratio ratio-4:3 rounded-4 rounded-8">
              <img class="img-ratio js-lazy" src="#" data-src="img/blog/1.png" alt="image">
            </div>
          </div>

          <div class="mt-20">
            <h4 class="text-dark-1 text-18 fw-500">10 European ski destinations you should visit this winter</h4>
            <div class="text-light-1 text-15 lh-14 mt-5">April 06, 2022</div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-left delay-2" class="col-lg-4 col-sm-6">

        <a href="#" class="blogCard -type-1 d-block ">
          <div class="blogCard__image">
            <div class="ratio ratio-4:3 rounded-4 rounded-8">
              <img class="img-ratio js-lazy" src="#" data-src="img/blog/2.png" alt="image">
            </div>
          </div>

          <div class="mt-20">
            <h4 class="text-dark-1 text-18 fw-500">Booking travel during Corona: good advice in an uncertain time
            </h4>
            <div class="text-light-1 text-15 lh-14 mt-5">April 06, 2022</div>
          </div>
        </a>

      </div>

      <div data-anim-child="slide-left delay-3" class="col-lg-4 col-sm-6">

        <a href="#" class="blogCard -type-1 d-block ">
          <div class="blogCard__image">
            <div class="ratio ratio-4:3 rounded-4 rounded-8">
              <img class="img-ratio js-lazy" src="#" data-src="img/blog/1.png" alt="image">
            </div>
          </div>

          <div class="mt-20">
            <h4 class="text-dark-1 text-18 fw-500">Where can I go? 5 amazing countries that are open right now</h4>
            <div class="text-light-1 text-15 lh-14 mt-5">April 06, 2022</div>
          </div>
        </a>

      </div>

    </div>
  </div>
</section>



<section class="layout-pt-md layout-pb-md bg-dark-2">
  <div class="container">
    <div class="row y-gap-30 justify-between items-center">
      <div class="col-auto">
        <div class="row y-gap-20  flex-wrap items-center">
          <div class="col-auto">
            <div class="icon-newsletter text-60 sm:text-40 text-white"></div>
          </div>

          <div class="col-auto">
            <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
            <div class="text-white">Sign up and we'll send the best deals to you</div>
          </div>
        </div>
      </div>

      <div class="col-auto">
        <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
          <div>
            <input class="bg-white h-60" type="text" placeholder="Your Email">
          </div>

          <div>
            <button class="button -md h-60 bg-blue-1 text-white">Subscribe</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php
include('components/footer.php');
?>