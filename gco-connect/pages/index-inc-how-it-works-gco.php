<?php
$steps = [
  ['num' => '01', 'title' => 'Service Type', 'desc' => 'Select the service you want to avail', 'icon' => 'ki-category', 'paths' => 4],
  ['num' => '02', 'title' => 'Basic Info', 'desc' => 'Verify and update your contact details', 'icon' => 'ki-profile-circle', 'paths' => 3],
  ['num' => '03', 'title' => 'Schedule Booking', 'desc' => 'Choose your preferred date and time', 'icon' => 'ki-calendar-2', 'paths' => 5],
  ['num' => '04', 'title' => 'Appointment Details', 'desc' => 'Provide your purpose with any additional notes', 'icon' => 'ki-notepad-bookmark', 'paths' => 6],
  ['num' => '05', 'title' => 'Completed', 'desc' => 'Get ready for your session', 'icon' => 'ki-check-circle', 'paths' => 2],
];
?>
<section id="how-it-works" class="bg-gco py-20">
  <div class="container-xxl">

    <div class="text-center mb-15">
      <span
        class="badge bg-white bg-opacity-20 text-white border border-white border-opacity-25 fs-9 ls-2 text-uppercase fw-bold py-2 px-4 mb-4">HOW
        IT WORKS</span>
      <h2 class="text-white fw-bolder fs-2x mb-4"><span class="text-white opacity-75">Book your appointment in</span> 5
        easy steps</h2>
      <p class="text-white opacity-75 fs-5">Follow our simple process to get the <u>support you need</u></p>
    </div>

    <div class="row g-5 justify-content-center">
      <?php foreach ($steps as $i => $step): ?>
      <div class="col-12 col-lg-10">
        <div class="d-flex flex-column flex-md-row align-items-center gap-5">

          <!-- Step number -->
          <div class="symbol symbol-circle symbol-70px flex-shrink-0">
            <div class="symbol-label bg-white text-primary fw-bolder fs-3">
              <?= htmlspecialchars($step['num'])?>
            </div>
          </div>

          <!-- Step card -->
          <div class="card bg-white bg-opacity-10 border border-white border-opacity-25 flex-grow-1">
            <div class="card-body p-6">
              <div class="d-flex align-items-start gap-4">
                <div class="symbol symbol-45px flex-shrink-0">
                  <span class="symbol-label bg-white bg-opacity-10">
                    <i class="ki-duotone <?= $step['icon']?> fs-2x text-white">
                      <?php for ($p = 1; $p <= $step['paths']; $p++): ?><span class="path<?= $p?>"></span>
                      <?php
  endfor; ?>
                    </i>
                  </span>
                </div>
                <div>
                  <h3 class="text-white fw-bold fs-4 mb-2 lh-sm">
                    <?= htmlspecialchars($step['title'])?>
                  </h3>
                  <p class="text-white opacity-75 fs-6 mb-0">
                    <?= htmlspecialchars($step['desc'])?>
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <?php
endforeach; ?>
    </div>

    <div class="text-center mt-12">
      <div class="d-inline-block rounded-pill px-8 py-4 border border-white border-opacity-25">
        <p class="text-white opacity-75 mb-0 fs-7">
          <i class="ki-duotone ki-information-2 fs-4 text-white me-2"><span class="path1"></span><span
              class="path2"></span><span class="path3"></span></i>
          Need help? Our support team is here to guide you through each step
        </p>
      </div>
    </div>

  </div>
</section>