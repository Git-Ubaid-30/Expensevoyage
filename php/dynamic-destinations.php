<?php
// Include the database connection file
$pdo = require_once 'dbcon.php';
// Fetch destinations
$query = $pdo->query("SELECT * FROM `destinations`");
$query->execute();
$destinations = $query->fetchAll(PDO::FETCH_ASSOC);
?>

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
        <?php if ($destinations): ?>
          <?php foreach ($destinations as $row): ?>
            <div class="swiper-slide">
              <a href="#" class="citiesCard -type-2">
                <div class="citiesCard__image rounded-4 ratio ratio-1:1">
                  <img class="img-ratio rounded-4 js-lazy" data-src="<?php echo htmlspecialchars($row['image'] ?? ''); ?>" src="#" alt="<?php echo htmlspecialchars($row['destination'] ?? 'Unknown'); ?>">
                </div>
                <div class="citiesCard__content mt-10">
                  <h4 class="text-18 lh-13 fw-500 text-dark-1">
                    <?php echo htmlspecialchars($row['destination'] ?? 'Unknown'); ?>
                    <?php echo isset($row['country']) ? ', ' . htmlspecialchars($row['country']) : ''; ?>
                  </h4>
                  <div class="text-14 text-light-1">Currency <?php echo htmlspecialchars($row['currency'] ?? 'Unknown'); ?></div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No destinations found or there was an error fetching the data.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php
// Close the database connection
$pdo = null; // Close the PDO connection
?>
