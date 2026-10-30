<section id="laf-built" class="bg-gray-900 bgi-no-repeat bgi-position-center bgi-size-cover py-15 py-lg-20" style="background-image: url('/assets/media/patterns/header-bg.png')">
  <div class="app-container container-xxl">
    <div class="text-center mb-12">
      <span class="badge badge-light-warning mb-3">BUILT FOR CAMPUS</span>
      <h2 class="text-white fw-bolder fs-2x">Built for <span class="text-warning fst-italic">Campus Life</span></h2>
      <p class="text-gray-500 fs-6 mx-auto mw-600px mt-3">
        Our platform is designed to help you find lost and found campus items and reunite students or staff with their belongings.
      </p>
    </div>

    <?php
    $campusFeatures = [
      ['bi-broadcast-pin', 'primary', 'Live Item Feed', 'Browse all items surrendered to the Discipline Unit in real time. Filter by category, date, and location to easily find what you lost.'],
      ['bi-people-fill', 'warning', 'Featured Users', 'Recognizing honest community members and active contributors who turn in found items to help keep our campus trustworthy.'],
      ['bi-arrow-left-right', 'success', 'Transaction History', 'Monitor the entire lifecycle of items within the platform with a clear record of surrendered and claimed belongings.'],
      ['bi-tags', 'info', 'Category Tags', 'Items are organized into groups like Electronics, Academic, and Personal Essentials for faster browsing.'],
      ['bi-geo-alt-fill', 'danger', 'Location Tagging', 'View the school facility, floor, or area where the item was found so you can trace misplaced belongings.'],
      ['bi-buildings', 'success', 'Campus-Wide Access', 'A centralized platform for students, faculty, and staff connected to a single organized database.']
    ];
    ?>
    <div class="row g-5">
      <?php foreach ($campusFeatures as $feature): ?>
        <div class="col-md-6 col-lg-4">
          <div class="card bg-gray-900 border border-gray-800 h-100">
            <div class="card-body p-7">
              <div class="symbol symbol-50px mb-5">
                <span class="symbol-label bg-light-<?= $feature[1] ?>">
                  <i class="bi <?= $feature[0] ?> fs-2x text-<?= $feature[1] ?>"></i>
                </span>
              </div>
              <h3 class="text-white fw-bold fs-4 mb-3"><?= htmlspecialchars($feature[2]) ?></h3>
              <p class="text-gray-500 fs-6 mb-0"><?= htmlspecialchars($feature[3]) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
