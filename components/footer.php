<style>
  /* Quick Links Title Styling */
.quick-links-title {
    font-size: 24px; /* Increase font size */
    font-weight: 700; /* Make it bold */
    color: #333; /* Dark color for visibility */
    margin-bottom: 20px; /* Add some space below the title */
}

/* Quick Links Anchor (Link) Styling */
.quick-links a {
    font-size: 18px; /* Increase font size for links */
    color: #007bff; /* Attractive link color */
    text-decoration: none; /* Remove underline */
    font-weight: 500; /* Medium weight for links */
    transition: color 0.3s ease; /* Smooth hover effect */
}

/* Hover Effect */
.quick-links a:hover {
    color: #0056b3; /* Darker color on hover */
    text-decoration: underline; /* Underline on hover */
}

</style>

<footer class="footer -type-1">
  <div class="container">
    <div class="pt-60 pb-60">
      <div class="row y-gap-40 justify-between xl:justify-start">

        <div class="col-xl-3 col-lg-4 col-sm-6">
          <img src="img/logo/logo-removebg-preview.png" width="300px" alt="Logo">
          <h6 style="margin-left:30px; width:100%;" class="mt-2 text-15">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h6>
        </div>




        <div class="col-xl-2 col-lg-4 col-sm-6">
          <h5 class="text-26 fw-500 mb-30 quick-links-title">Quick links</h5>
          <div class="d-flex y-gap-10 flex-column quick-links">
            <a class="text-21" href="index.php">Home</a>
            <a class="text-21" href="contact.php">Contact</a>
            <a class="text-21" href="About.php">About</a>
            <a class="text-21" href="gallery.php">Gallery</a>
          </div>
        </div>


        <div class="col-xl-2 col-lg-4 col-sm-6">
          <h5 class="text-26 fw-500 mb-30">Contact Us</h5>

          <div class="mt-30">
            <div class="text-21 mt-30">Toll Free Customer Care</div>
            <a href="#" class="text-21 fw-500 text-blue-1 mt-5">+(1) 123 456 7890</a>
          </div>

          <div class="mt-35">
            <div class="text-21 mt-30">Need live support?</div>
            <a href="#" class="text-21 fw-500 text-blue-1 mt-5">hi@gotrip.com</a>
          </div>
        </div>





      </div>
    </div>

    <div class="py-20 border-top-light">
      <div class="row justify-between items-center y-gap-10">
        <div class="col-auto">
          <div class="row x-gap-30 y-gap-10">
            <div class="col-auto">
              <div class="d-flex items-center">
                © 2022 GoTrip LLC All rights reserved.
              </div>
            </div>

            <div class="col-auto">
              <div class="d-flex x-gap-15">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Site Map</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-auto">
          <div class="row y-gap-10 items-center">
            <div class="col-auto">
              <div class="d-flex items-center">
                <button class="d-flex items-center text-14 fw-500 text-dark-1 mr-10">
                  <i class="icon-globe text-16 mr-10"></i>
                  <span class="underline">English (US)</span>
                </button>

                <button class="d-flex items-center text-14 fw-500 text-dark-1">
                  <i class="icon-usd text-16 mr-10"></i>
                  <span class="underline">USD</span>
                </button>
              </div>
            </div>

            <div class="col-auto">
              <div class="d-flex x-gap-20 items-center">
                <a href="#"><i class="icon-facebook text-14"></i></a>
                <a href="#"><i class="icon-twitter text-14"></i></a>
                <a href="#"><i class="icon-instagram text-14"></i></a>
                <a href="#"><i class="icon-linkedin text-14"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

</main>

<div class="langMenu is-hidden js-langMenu" data-x="lang" data-x-toggle="is-hidden">
  <div class="langMenu__bg" data-x-click="lang"></div>

  <div class="langMenu__content bg-white rounded-4">
    <div class="d-flex items-center justify-between px-30 py-20 sm:px-15 border-bottom-light">
      <div class="text-20 fw-500 lh-15">Select your language</div>
      <button class="pointer" data-x-click="lang">
        <i class="icon-close"></i>
      </button>
    </div>

    <div class="modalGrid px-30 py-30 sm:px-15 sm:py-15">

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
          <div class="text-14 lh-15 mt-5 js-title">United States</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
          <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
          <div class="text-14 lh-15 mt-5 js-title">España</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
          <div class="text-14 lh-15 mt-5 js-title">France</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
          <div class="text-14 lh-15 mt-5 js-title">Italia</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
          <div class="text-14 lh-15 mt-5 js-title">United States</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
          <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
          <div class="text-14 lh-15 mt-5 js-title">España</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
          <div class="text-14 lh-15 mt-5 js-title">France</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
          <div class="text-14 lh-15 mt-5 js-title">Italia</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
          <div class="text-14 lh-15 mt-5 js-title">United States</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
          <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
          <div class="text-14 lh-15 mt-5 js-title">España</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
          <div class="text-14 lh-15 mt-5 js-title">France</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
          <div class="text-14 lh-15 mt-5 js-title">Italia</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
          <div class="text-14 lh-15 mt-5 js-title">United States</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
          <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
          <div class="text-14 lh-15 mt-5 js-title">España</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
          <div class="text-14 lh-15 mt-5 js-title">France</div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
          <div class="text-14 lh-15 mt-5 js-title">Italia</div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="currencyMenu is-hidden js-currencyMenu" data-x="currency" data-x-toggle="is-hidden">
  <div class="currencyMenu__bg" data-x-click="currency"></div>

  <div class="currencyMenu__content bg-white rounded-4">
    <div class="d-flex items-center justify-between px-30 py-20 sm:px-15 border-bottom-light">
      <div class="text-20 fw-500 lh-15">Select your currency</div>
      <button class="pointer" data-x-click="currency">
        <i class="icon-close"></i>
      </button>
    </div>

    <div class="modalGrid px-30 py-30 sm:px-15 sm:py-15">

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">USD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">AUD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">BRL</span>
            - R$
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">BGN</span>
            - лв.
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">CAD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">USD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">AUD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">BRL</span>
            - R$
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">BGN</span>
            - лв.
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">CAD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">USD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">AUD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">BRL</span>
            - R$
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">BGN</span>
            - лв.
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">CAD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">USD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">AUD</span>
            - $
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">BRL</span>
            - R$
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">BGN</span>
            - лв.
          </div>
        </div>
      </div>

      <div class="modalGrid__item js-item">
        <div class="py-10 px-15 sm:px-5 sm:py-5">
          <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
          <div class="text-14 lh-15 mt-5">
            <span class="js-title">CAD</span>
            - $
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="mapFilter" data-x="mapFilter" data-x-toggle="-is-active">
  <div class="mapFilter__overlay"></div>

  <div class="mapFilter__close">
    <button class="button -blue-1 size-40 bg-white shadow-2" data-x-click="mapFilter">
      <i class="icon-close text-15"></i>
    </button>
  </div>

  <div class="mapFilter__grid" data-x="mapFilter__grid" data-x-toggle="-filters-hidden">
    <div class="mapFilter-filter scroll-bar-1">
      <div class="px-20 py-20 md:px-15 md:py-15">
        <div class="d-flex items-center justify-between">
          <div class="text-18 fw-500">Filters</div>

          <button class="size-40 flex-center rounded-full bg-blue-1" data-x-click="mapFilter__grid">
            <i class="icon-chevron-left text-12 text-white"></i>
          </button>
        </div>

        <div class="mapFilter-filter__item">
          <h5 class="text-18 fw-500 mb-10">Popular Filters</h5>
          <div class="sidebar-checkbox">

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="form-checkbox">
                    <input type="checkbox">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>
                  <div class="text-15 ml-10">Breakfast Included</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">92</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="form-checkbox">
                    <input type="checkbox">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>
                  <div class="text-15 ml-10">Romantic</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">45</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="form-checkbox">
                    <input type="checkbox">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>
                  <div class="text-15 ml-10">Airport Transfer</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">21</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="form-checkbox">
                    <input type="checkbox">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>
                  <div class="text-15 ml-10">WiFi Included </div>
                </div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">78</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="form-checkbox">
                    <input type="checkbox">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>
                  <div class="text-15 ml-10">5 Star</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">679</div>
              </div>
            </div>

          </div>
        </div>

        <div class="mapFilter-filter__item">
          <h5 class="text-18 fw-500 mb-10">Nightly Price</h5>
          <div class="row x-gap-10 y-gap-30">
            <div class="col-12">
              <div class="js-price-rangeSlider">
                <div class="text-14 fw-500"></div>

                <div class="d-flex justify-between mb-20">
                  <div class="text-15 text-dark-1">
                    <span class="js-lower"></span>
                    -
                    <span class="js-upper"></span>
                  </div>
                </div>

                <div class="px-5">
                  <div class="js-slider"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mapFilter-filter__item">
          <h5 class="text-18 fw-500 mb-10">Amenities</h5>
          <div class="sidebar-checkbox">

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Breakfast Included</div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">92</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">WiFi Included </div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">45</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Pool</div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">21</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Restaurant </div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">78</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Air conditioning </div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">679</div>
              </div>
            </div>

          </div>
        </div>

        <div class="mapFilter-filter__item">
          <h5 class="text-18 fw-500 mb-10">Star Rating</h5>
          <div class="row x-gap-10 y-gap-10 pt-10">

            <div class="col-auto">
              <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">1</a>
            </div>

            <div class="col-auto">
              <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">2</a>
            </div>

            <div class="col-auto">
              <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">3</a>
            </div>

            <div class="col-auto">
              <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">4</a>
            </div>

            <div class="col-auto">
              <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">5</a>
            </div>

          </div>
        </div>

        <div class="mapFilter-filter__item">
          <h5 class="text-18 fw-500 mb-10">Guest Rating</h5>
          <div class="sidebar-checkbox">

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="form-radio d-flex items-center ">
                  <div class="radio">
                    <input type="radio" name="name">
                    <div class="radio__mark">
                      <div class="radio__icon"></div>
                    </div>
                  </div>
                  <div class="ml-10">Any</div>
                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">92</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="form-radio d-flex items-center ">
                  <div class="radio">
                    <input type="radio" name="name">
                    <div class="radio__mark">
                      <div class="radio__icon"></div>
                    </div>
                  </div>
                  <div class="ml-10">Wonderful 4.5+</div>
                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">45</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="form-radio d-flex items-center ">
                  <div class="radio">
                    <input type="radio" name="name">
                    <div class="radio__mark">
                      <div class="radio__icon"></div>
                    </div>
                  </div>
                  <div class="ml-10">Very good 4+</div>
                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">21</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="form-radio d-flex items-center ">
                  <div class="radio">
                    <input type="radio" name="name">
                    <div class="radio__mark">
                      <div class="radio__icon"></div>
                    </div>
                  </div>
                  <div class="ml-10">Good 3.5+ </div>
                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">78</div>
              </div>
            </div>

          </div>
        </div>

        <div class="mapFilter-filter__item">
          <h5 class="text-18 fw-500 mb-10">Style</h5>
          <div class="sidebar-checkbox">

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Budget</div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">92</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Mid-range </div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">45</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Luxury</div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">21</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Family-friendly </div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">78</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Business </div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">679</div>
              </div>
            </div>

          </div>
        </div>

        <div class="mapFilter-filter__item">
          <h5 class="text-18 fw-500 mb-10">Neighborhood</h5>
          <div class="sidebar-checkbox">

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Central London</div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">92</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Guests&#39; favourite area </div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">45</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Westminster Borough</div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">21</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Kensington and Chelsea </div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">78</div>
              </div>
            </div>

            <div class="row y-gap-10 items-center justify-between">
              <div class="col-auto">

                <div class="d-flex items-center">
                  <div class="form-checkbox ">
                    <input type="checkbox" name="name">
                    <div class="form-checkbox__mark">
                      <div class="form-checkbox__icon icon-check"></div>
                    </div>
                  </div>

                  <div class="text-15 ml-10">Oxford Street </div>

                </div>

              </div>

              <div class="col-auto">
                <div class="text-15 text-light-1">679</div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="mapFilter-results scroll-bar-1">
      <div class="px-20 py-20 md:px-15 md:py-15">
        <div class="row y-gap-10 justify-between">
          <div class="col-auto">
            <div class="text-14 text-light-1">
              <span class="text-dark-1 text-15 fw-500">3,269 properties</span>
              in Europe
            </div>
          </div>

          <div class="col-auto">
            <button class="button -blue-1 h-40 px-20 md:px-5 text-blue-1 bg-blue-1-05 rounded-100">
              <i class="icon-up-down mr-10"></i>
              Top picks for your search
            </button>
          </div>
        </div>


        <div class="mapFilter-results__item">
          <div class="row x-gap-20 y-gap-20">
            <div class="col-md-auto">
              <div class="ratio ratio-1:1 size-120">
                <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
              </div>
            </div>

            <div class="col-md">
              <div class="row x-gap-20 y-gap-10 justify-between">
                <div class="col-lg">
                  <h4 class="text-16 lh-17 fw-500">
                    Great Northern Hotel, a Tribute Portfolio Hotel, London
                    <span class="text-10 text-yellow-2">
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                    </span>
                  </h4>
                </div>

                <div class="col-auto">
                  <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                    <i class="icon-heart text-12"></i>
                  </button>
                </div>
              </div>

              <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="size-38 rounded-4 flex-center bg-blue-1">
                      <span class="text-14 fw-600 text-white">4.8</span>
                    </div>

                    <div class="ml-10">
                      <div class="text-13 lh-14 fw-500">Exceptional</div>
                      <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                    </div>
                  </div>
                </div>

                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="text-14 text-light-1 mr-10">8 nights</div>
                    <div class="fw-500">US$72</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mapFilter-results__item">
          <div class="row x-gap-20 y-gap-20">
            <div class="col-md-auto">
              <div class="ratio ratio-1:1 size-120">
                <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
              </div>
            </div>

            <div class="col-md">
              <div class="row x-gap-20 y-gap-10 justify-between">
                <div class="col-lg">
                  <h4 class="text-16 lh-17 fw-500">
                    Great Northern Hotel, a Tribute Portfolio Hotel, London
                    <span class="text-10 text-yellow-2">
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                    </span>
                  </h4>
                </div>

                <div class="col-auto">
                  <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                    <i class="icon-heart text-12"></i>
                  </button>
                </div>
              </div>

              <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="size-38 rounded-4 flex-center bg-blue-1">
                      <span class="text-14 fw-600 text-white">4.8</span>
                    </div>

                    <div class="ml-10">
                      <div class="text-13 lh-14 fw-500">Exceptional</div>
                      <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                    </div>
                  </div>
                </div>

                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="text-14 text-light-1 mr-10">8 nights</div>
                    <div class="fw-500">US$72</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mapFilter-results__item">
          <div class="row x-gap-20 y-gap-20">
            <div class="col-md-auto">
              <div class="ratio ratio-1:1 size-120">
                <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
              </div>
            </div>

            <div class="col-md">
              <div class="row x-gap-20 y-gap-10 justify-between">
                <div class="col-lg">
                  <h4 class="text-16 lh-17 fw-500">
                    Great Northern Hotel, a Tribute Portfolio Hotel, London
                    <span class="text-10 text-yellow-2">
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                    </span>
                  </h4>
                </div>

                <div class="col-auto">
                  <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                    <i class="icon-heart text-12"></i>
                  </button>
                </div>
              </div>

              <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="size-38 rounded-4 flex-center bg-blue-1">
                      <span class="text-14 fw-600 text-white">4.8</span>
                    </div>

                    <div class="ml-10">
                      <div class="text-13 lh-14 fw-500">Exceptional</div>
                      <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                    </div>
                  </div>
                </div>

                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="text-14 text-light-1 mr-10">8 nights</div>
                    <div class="fw-500">US$72</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mapFilter-results__item">
          <div class="row x-gap-20 y-gap-20">
            <div class="col-md-auto">
              <div class="ratio ratio-1:1 size-120">
                <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
              </div>
            </div>

            <div class="col-md">
              <div class="row x-gap-20 y-gap-10 justify-between">
                <div class="col-lg">
                  <h4 class="text-16 lh-17 fw-500">
                    Great Northern Hotel, a Tribute Portfolio Hotel, London
                    <span class="text-10 text-yellow-2">
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                    </span>
                  </h4>
                </div>

                <div class="col-auto">
                  <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                    <i class="icon-heart text-12"></i>
                  </button>
                </div>
              </div>

              <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="size-38 rounded-4 flex-center bg-blue-1">
                      <span class="text-14 fw-600 text-white">4.8</span>
                    </div>

                    <div class="ml-10">
                      <div class="text-13 lh-14 fw-500">Exceptional</div>
                      <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                    </div>
                  </div>
                </div>

                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="text-14 text-light-1 mr-10">8 nights</div>
                    <div class="fw-500">US$72</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mapFilter-results__item">
          <div class="row x-gap-20 y-gap-20">
            <div class="col-md-auto">
              <div class="ratio ratio-1:1 size-120">
                <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
              </div>
            </div>

            <div class="col-md">
              <div class="row x-gap-20 y-gap-10 justify-between">
                <div class="col-lg">
                  <h4 class="text-16 lh-17 fw-500">
                    Great Northern Hotel, a Tribute Portfolio Hotel, London
                    <span class="text-10 text-yellow-2">
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                    </span>
                  </h4>
                </div>

                <div class="col-auto">
                  <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                    <i class="icon-heart text-12"></i>
                  </button>
                </div>
              </div>

              <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="size-38 rounded-4 flex-center bg-blue-1">
                      <span class="text-14 fw-600 text-white">4.8</span>
                    </div>

                    <div class="ml-10">
                      <div class="text-13 lh-14 fw-500">Exceptional</div>
                      <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                    </div>
                  </div>
                </div>

                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="text-14 text-light-1 mr-10">8 nights</div>
                    <div class="fw-500">US$72</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mapFilter-results__item">
          <div class="row x-gap-20 y-gap-20">
            <div class="col-md-auto">
              <div class="ratio ratio-1:1 size-120">
                <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
              </div>
            </div>

            <div class="col-md">
              <div class="row x-gap-20 y-gap-10 justify-between">
                <div class="col-lg">
                  <h4 class="text-16 lh-17 fw-500">
                    Great Northern Hotel, a Tribute Portfolio Hotel, London
                    <span class="text-10 text-yellow-2">
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                    </span>
                  </h4>
                </div>

                <div class="col-auto">
                  <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                    <i class="icon-heart text-12"></i>
                  </button>
                </div>
              </div>

              <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="size-38 rounded-4 flex-center bg-blue-1">
                      <span class="text-14 fw-600 text-white">4.8</span>
                    </div>

                    <div class="ml-10">
                      <div class="text-13 lh-14 fw-500">Exceptional</div>
                      <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                    </div>
                  </div>
                </div>

                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="text-14 text-light-1 mr-10">8 nights</div>
                    <div class="fw-500">US$72</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="mapFilter-results__item">
          <div class="row x-gap-20 y-gap-20">
            <div class="col-md-auto">
              <div class="ratio ratio-1:1 size-120">
                <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
              </div>
            </div>

            <div class="col-md">
              <div class="row x-gap-20 y-gap-10 justify-between">
                <div class="col-lg">
                  <h4 class="text-16 lh-17 fw-500">
                    Great Northern Hotel, a Tribute Portfolio Hotel, London
                    <span class="text-10 text-yellow-2">
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                    </span>
                  </h4>
                </div>

                <div class="col-auto">
                  <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                    <i class="icon-heart text-12"></i>
                  </button>
                </div>
              </div>

              <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="size-38 rounded-4 flex-center bg-blue-1">
                      <span class="text-14 fw-600 text-white">4.8</span>
                    </div>

                    <div class="ml-10">
                      <div class="text-13 lh-14 fw-500">Exceptional</div>
                      <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                    </div>
                  </div>
                </div>

                <div class="col-auto">
                  <div class="d-flex items-center">
                    <div class="text-14 text-light-1 mr-10">8 nights</div>
                    <div class="fw-500">US$72</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="mapFilter-map">
      <div class="map js-map"></div>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
<script src="../../../unpkg.com/%40googlemaps/markerclusterer%402.5.3/dist/index.min.js"></script>

<script src="js/vendors.js"></script>
<script src="js/main.js"></script>
</body>


<!-- Mirrored from creativelayers.net/themes/gotrip-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2024 06:58:47 GMT -->

</html>