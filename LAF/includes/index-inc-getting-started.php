<section id="laf-getting-started" class="bg-white bgi-no-repeat bgi-position-center bgi-size-cover py-15 py-lg-20" style="background-image: url('/assets/media/patterns/header-bg.png')">
  <div class="app-container container-xxl">
    <div class="text-center mb-12">
      <span class="badge badge-light-primary mb-3">FIRST THINGS FIRST</span>
      <h2 class="text-gray-900 fw-bolder fs-2x">Getting started is easy</h2>
    </div>

    <div class="row g-8 text-center">
      <?php
      $gettingStartedSteps = [
        ['bi-person-plus', 'Access the Platform', 'Log in directly using your Paraverse FIT account to access the Lost and Found system and start tracking items.'],
        ['bi-search', 'Search or Report', 'Use our platform to search for lost items or to report something you found on campus.'],
        ['bi-people', 'Recover or Reunite', 'Once you spot your missing item in the system, visit the Discipline Unit in person to verify and claim your belongings safely.']
      ];
      foreach ($gettingStartedSteps as $step):
      ?>
        <div class="col-md-4">
          <div class="card card-bordered h-100 hover-elevate-up">
            <div class="card-body p-8">
              <div class="symbol symbol-65px symbol-circle mb-5">
                <span class="symbol-label bg-light-primary">
                  <i class="bi <?= $step[0] ?> fs-2x text-primary"></i>
                </span>
              </div>
              <h3 class="fw-bold text-gray-900 fs-4 mb-3"><?= htmlspecialchars($step[1]) ?></h3>
              <p class="text-muted fs-6 mb-0"><?= htmlspecialchars($step[2]) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
