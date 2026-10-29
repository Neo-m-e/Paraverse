<section id="laf-how-to-turn-in" class="py-15 py-lg-20">
  <div class="app-container container-xxl">
    <div class="row align-items-center g-10">
      <div class="col-lg-5 order-2 order-lg-1 text-center">
        <img src="<?= $LAF_BASE_URL ?>/assets/images/3D3.png" class="mw-100 h-400px object-fit-contain" alt="Item logging illustration">
      </div>
      <div class="col-lg-7 order-1 order-lg-2">
        <span class="badge badge-light-warning mb-3">SURRENDER PROCESS</span>
        <h2 class="text-gray-900 fw-bolder fs-2x mb-4">How to turn in found items</h2>
        <p class="text-muted fs-6 mb-8">Found something on campus? Follow these simple steps so the item is properly logged and returned to its rightful owner.</p>

        <?php
        $turnInSteps = [
          ['Secure Item', 'Don’t leave the item unattended. Keep it safely with you and do not post it on social media until it has been properly logged.'],
          ['Bring to Discipline Office', 'Go to Room 1501, 15th Floor and hand the item to the staff on duty. Open Monday–Friday, 8:00 AM–5:00 PM.'],
          ['Office Logging', 'The item will be recorded in the Lost & Found system. The rightful owner will be notified if there is a match.']
        ];
        foreach ($turnInSteps as $index => $step):
        ?>
          <div class="d-flex align-items-start mb-6">
            <div class="symbol symbol-45px symbol-circle me-5 flex-shrink-0">
              <span class="symbol-label bg-light-warning text-warning fw-bolder fs-4"><?= $index + 1 ?></span>
            </div>
            <div>
              <h3 class="text-gray-900 fw-bold fs-5 mb-2"><?= htmlspecialchars($step[0]) ?></h3>
              <p class="text-muted fs-6 mb-0"><?= htmlspecialchars($step[1]) ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
