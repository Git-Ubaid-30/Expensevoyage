<?php
include('php/query.php');
include('components/header.php');
?>

<?php


$query = $pdo->query('select * from gallery');
$allgallery = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($allgallery as $gallery) {
    ?>

    <section class="layout-pt-lg layout-pb-md">
        <div class="container">
            <div data-anim="slide-up delay-1" class="row y-gap-20 justify-between items-end">
                <div class="col-auto">
                    <div class="sectionTitle -md">
                        <h2 class="sectionTitle__title text">Popular Destinations</h2>
                        <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
                    </div>
                </div>

                <div class="col-auto md:d-none">

                    <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
                        View All Destinations <div class="icon-arrow-top-right ml-15"></div>
                    </a>

                </div>
            </div>

            <div class="relative pt-40 sm:pt-20 js-section-slider limit-3" data-gap="30" data-scrollbar
                data-slider-cols="base-2 xl-4 lg-3 md-2 sm-2 base-1" data-anim="slide-up delay-2">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">

                        <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                            <div class="citiesCard__image ratio ratio-3:4">
                                <img src="#" data-src="img/<?php echo $gallery['image'] ?>" alt="image" class="js-lazy">
                            </div>

                            <div
                                class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                                <div class="citiesCard__bg"></div>

                                <div class="citiesCard__top">
                                    <div class="text-14 text-white">14 Hotel - 22 Cars - 18 Tours - 95 Activity</div>
                                </div>

                                <div class="citiesCard__bottom">
                                    <h4 class="text-26 md:text-20 lh-13 text-white mb-20"><?php echo $gallery['name'] ?></h4>
                                    <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">Discover</button>
                                </div>
                            </div>
                        </a>

                    </div>



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

                <div class="row pt-20 d-none md:d-block">
                    <div class="col-auto">
                        <div class="d-inline-block">

                            <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
                                View All Destinations <div class="icon-arrow-top-right ml-15"></div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
}
?>
<?php
include('components/footer.php');
?> 