<?php
include('php/query.php');
include('components/header.php');
?>


    <section data-anim="fade" class="d-flex items-center py-15 border-top-light">
      <div class="container">
        <div class="row y-gap-10 items-center justify-between">
          <div class="col-auto">
            <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
              <div class="col-auto">
                <div class="">Home</div>
              </div>
              <div class="col-auto">
                <div class="">&gt;</div>
              </div>
              <div class="col-auto">
                <div class="text-dark-1">Destinations</div>
              </div>
            </div>
          </div>

          <div class="col-auto">
            <a href="#" class="text-14 text-light-1">World Wide Tourism</a>
          </div>
        </div>
      </div>
    </section>

    <section class="layout-pb-md">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="relative d-flex">
              <img src="images/1_2.png" alt="image" class="col-12 rounded-4">

              <div class="absolute z-2 px-50 py-60">
                <h1 class="text-50 fw-600 text-white">Explore Our Destinations</h1>
                <div class="text-white">Explore Our World Wide Destinations To Visit!</div>
              </div>

             
            </div>
          </div>
        </div>

        <div class="row x-gap-20 y-gap-20 items-center pt-20">

          <div class="col">
            <button class="d-flex flex-column justify-center px-20 py-15 rounded-4 border-light text-16 lh-14 fw-500 col-12">
              <i class="icon-bed text-25 mb-10"></i>
              Hotel
            </button>
          </div>

          <div class="col">
            <button class="d-flex flex-column justify-center px-20 py-15 rounded-4 border-light text-16 lh-14 fw-500 col-12">
              <i class="icon-destination text-25 mb-10"></i>
              Tour
            </button>
          </div>

          <div class="col">
            <button class="d-flex flex-column justify-center px-20 py-15 rounded-4 border-light text-16 lh-14 fw-500 col-12">
              <i class="icon-ski text-25 mb-10"></i>
              Activity
            </button>
          </div>

          <div class="col">
            <button class="d-flex flex-column justify-center px-20 py-15 rounded-4 border-light text-16 lh-14 fw-500 col-12">
              <i class="icon-home text-25 mb-10"></i>
              Holiday Rentals
            </button>
          </div>

          <div class="col">
            <button class="d-flex flex-column justify-center px-20 py-15 rounded-4 border-light text-16 lh-14 fw-500 col-12">
              <i class="icon-car text-25 mb-10"></i>
              Car
            </button>
          </div>

          <div class="col">
            <button class="d-flex flex-column justify-center px-20 py-15 rounded-4 border-light text-16 lh-14 fw-500 col-12">
              <i class="icon-yatch text-25 mb-10"></i>
              Cruise
            </button>
          </div>

          <div class="col">
            <button class="d-flex flex-column justify-center px-20 py-15 rounded-4 border-light text-16 lh-14 fw-500 col-12">
              <i class="icon-tickets text-25 mb-10"></i>
              Flights
            </button>
          </div>

        </div>

        <div class="row y-gap-20 pt-40">
          <div class="col-auto">
            <h2 class="">Discover What We Offers To Our Clients</h2>
          </div>

          <div class="col-xl-8">
            <p class="text-15 text-dark-1">
            Discover a world of unforgettable places! Whether you're seeking thrilling adventures, peaceful escapes, or cultural discoveries, our selection of global destinations will inspire your next journey. Explore the vibrant streets of international cities, relax on pristine beaches, or immerse yourself in rich histories – your dream trip awaits!
              
            </p>

            <a href="#" class="d-block text-14 fw-500 text-blue-1 underline mt-20">Show More</a>
          </div>

          

       
        <div class="mt-30 border-top-light"></div>
      </div>
    </section>

 
  
<!-- Destinations We Offers -->

<section class="layout-pt-md layout-pb-lg">
  <div class="container">
    <div class="row y-gap-20">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Destinations We Offer</h2>
          <p class="sectionTitle__text mt-5 sm:mt-0">These popular destinations We Offer</p>
        </div>
      </div>
    </div>

    <div class="pt-40 js-section-slider" data-gap="30" data-slider-cols="xl-6 lg-4 md-3 sm-2 base-1">
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
    </div>
  </div>
</section>
    <!-- Testimonials -->

    <section class="layout-pt-lg layout-pb-lg bg-light-2">
      <div class="container">
        <div class="row y-gap-40 justify-between">
          <div class="col-xl-5 col-lg-6">
            <h2 class="text-30">What our customers are<br> saying us?</h2>
            <p class="mt-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Aenean eu enim justo.</p>

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

          <div class="col-lg-6">
            <div class="overflow-hidden js-section-slider" data-scrollbar="" data-slider-cols="base-1">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="row items-center x-gap-30 y-gap-20">
                    <div class="col-auto">
                      <img src="images/1_6.png" alt="image">
                    </div>

                    <div class="col-auto">
                      <h5 class="text-16 fw-500">Annette Black</h5>
                      <div class="text-15 text-light-1 lh-15">UX / UI Designer</div>
                    </div>
                  </div>

                  <p class="text-18 fw-500 text-dark-1 mt-30 sm:mt-20">The place is in a great location in Gumbet. The area is safe and beautiful. The apartment was comfortable and the host was kind and responsive to our requests.</p>
                </div>

                <div class="swiper-slide">
                  <div class="row items-center x-gap-30 y-gap-20">
                    <div class="col-auto">
                      <img src="images/1_6.png" alt="image">
                    </div>

                    <div class="col-auto">
                      <h5 class="text-16 fw-500">Annette Black</h5>
                      <div class="text-15 text-light-1 lh-15">UX / UI Designer</div>
                    </div>
                  </div>

                  <p class="text-18 fw-500 text-dark-1 mt-30 sm:mt-20">The place is in a great location in Gumbet. The area is safe and beautiful. The apartment was comfortable and the host was kind and responsive to our requests.</p>
                </div>

                <div class="swiper-slide">
                  <div class="row items-center x-gap-30 y-gap-20">
                    <div class="col-auto">
                      <img src="images/1_6.png" alt="image">
                    </div>

                    <div class="col-auto">
                      <h5 class="text-16 fw-500">Annette Black</h5>
                      <div class="text-15 text-light-1 lh-15">UX / UI Designer</div>
                    </div>
                  </div>

                  <p class="text-18 fw-500 text-dark-1 mt-30 sm:mt-20">The place is in a great location in Gumbet. The area is safe and beautiful. The apartment was comfortable and the host was kind and responsive to our requests.</p>
                </div>

              </div>

              <div class="d-flex items-center mt-60 sm:mt-20">
                <div class="text-dark-1 fw-500">01</div>
                <div class="slider-scrollbar bg-border ml-20 mr-20 w-max-300 js-scrollbar"></div>
                <div class="text-dark-1 fw-500">05</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



  



    <!-- FAQ -->


    <section class="layout-pt-lg layout-pb-md">
      <div class="container">
        <div class="row y-gap-20">
          <div class="col-lg-4">
            <h2 class="text-30 fw-500">
              FAQs about<br>
              London
            </h2>
          </div>

          <div class="col-lg-8">
            <div class="accordion -simple row y-gap-20 js-accordion">

              <div class="col-12">
                <div class="accordion__item px-20 py-20 border-light rounded-4">
                  <div class="accordion__button d-flex items-center">
                    <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                      <i class="icon-plus"></i>
                      <i class="icon-minus"></i>
                    </div>

                    <div class="button text-dark-1">What do I need to hire a car?</div>
                  </div>

                  <div class="accordion__content">
                    <div class="pt-20 pl-60">
                      <p class="text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="accordion__item px-20 py-20 border-light rounded-4">
                  <div class="accordion__button d-flex items-center">
                    <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                      <i class="icon-plus"></i>
                      <i class="icon-minus"></i>
                    </div>

                    <div class="button text-dark-1">How old do I have to be to rent a car?</div>
                  </div>

                  <div class="accordion__content">
                    <div class="pt-20 pl-60">
                      <p class="text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="accordion__item px-20 py-20 border-light rounded-4">
                  <div class="accordion__button d-flex items-center">
                    <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                      <i class="icon-plus"></i>
                      <i class="icon-minus"></i>
                    </div>

                    <div class="button text-dark-1">Can I book a hire car for someone else?</div>
                  </div>

                  <div class="accordion__content">
                    <div class="pt-20 pl-60">
                      <p class="text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="accordion__item px-20 py-20 border-light rounded-4">
                  <div class="accordion__button d-flex items-center">
                    <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                      <i class="icon-plus"></i>
                      <i class="icon-minus"></i>
                    </div>

                    <div class="button text-dark-1">How do I find the cheapest car hire deal?</div>
                  </div>

                  <div class="accordion__content">
                    <div class="pt-20 pl-60">
                      <p class="text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="accordion__item px-20 py-20 border-light rounded-4">
                  <div class="accordion__button d-flex items-center">
                    <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                      <i class="icon-plus"></i>
                      <i class="icon-minus"></i>
                    </div>

                    <div class="button text-dark-1">What should I look for when I'm choosing a car?</div>
                  </div>

                  <div class="accordion__content">
                    <div class="pt-20 pl-60">
                      <p class="text-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- footer -->

    <?php
include('components/footer.php');
?>  