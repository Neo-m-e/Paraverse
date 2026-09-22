<?php
$photoBase = isset($GCO_BASE)
  ? $GCO_BASE . 'assets/img/GCO Assets/gco faculties'
  : 'assets/img/GCO Assets/gco faculties';
$logoBase = isset($GCO_BASE)
  ? $GCO_BASE . 'assets/img/programs-logo'
  : 'assets/img/programs-logo';

$all_team = [
  [
    'name' => 'Marietta M. Bengat',
    'role' => 'DIRECTOR',
    'email' => 'mmbengat@feutech.edu.ph',
    'photo' => 'Bengat.png',
    'contactText' => 'Contact Director'
  ],
  [
    'name' => 'Rochile G. Borje',
    'role' => 'GUIDANCE COUNSELOR',
    'email' => 'rgborje@feutech.edu.ph',
    'programs' => ['BSCE', 'BSCEM', 'BSCPE', 'BSECE'],
    'photo' => 'borje.png',
    'contactText' => 'Contact Counselor'
  ],
  [
    'name' => 'Vilma R. Colinco',
    'role' => 'GUIDANCE COUNSELOR',
    'email' => 'vrcolinco@feutech.edu.ph',
    'programs' => ['BSITSMBA', 'BSCYBER', 'BSMFGE', 'BSCE'],
    'photo' => 'Colinco.png',
    'contactText' => 'Contact Counselor'
  ],
  [
    'name' => 'Charlene Marie A. Arabejo',
    'role' => 'GUIDANCE COUNSELOR',
    'email' => 'caarabejo@feutech.edu.ph',
    'programs' => ['BSITSMBA', 'BSCYBER'],
    'photo' => 'Arabejo.png',
    'contactText' => 'Contact Counselor'
  ],
  [
    'name' => 'Paula Trisha D. Balcera',
    'role' => 'GUIDANCE COUNSELOR',
    'email' => 'pdbalcera@feutech.edu.ph',
    'programs' => ['BSITWMA', 'BSITAGD'],
    'photo' => 'balcera.png',
    'contactText' => 'Contact Counselor'
  ],
  [
    'name' => 'Moira Ashley C. Roy',
    'role' => 'PSYCHOMETRICIAN',
    'email' => 'mcroy@feutech.edu.ph',
    'programs' => ['BSMFGE', 'BSCE', 'BSITWMA', 'BSITAGD'],
    'photo' => 'roy.png',
    'contactText' => 'Contact Psychometrician'
  ]
];
?>
<section class="py-20 overflow-hidden position-relative" style="z-index: 0;">
  <!-- Background Gradient Blobs -->
  <div class="position-absolute w-100 h-100 top-0 start-0 overflow-hidden" style="z-index: 0; pointer-events: none;">
    <!-- Top right blob -->
    <div class="position-absolute bg-primary rounded-circle"
      style="width: 40vw; height: 40vw; top: 5%; right: 5%; opacity: 0.06; filter: blur(70px);">
    </div>
    <!-- Bottom left blob -->
    <div class="position-absolute bg-danger rounded-circle"
      style="width: 35vw; height: 35vw; bottom: 10%; left: 5%; opacity: 0.06; filter: blur(70px);">
    </div>
  </div>
  <!-- Uneven background design icons -->
  <img src="<?php echo htmlspecialchars($assetsBase ?? 'assets'); ?>/img/bg-assets/human-brain.png"
    class="position-absolute d-none d-lg-block"
    style="top: 15%; right: 5%; opacity: 0.4; pointer-events: none; width: 260px; transform: rotate(10deg); z-index: 0;"
    alt="">
  <img src="<?php echo htmlspecialchars($assetsBase ?? 'assets'); ?>/img/bg-assets/brain.png"
    class="position-absolute d-none d-lg-block"
    style="bottom: 10%; left: 5%; opacity: 0.4; pointer-events: none; width: 240px; transform: rotate(-15deg); z-index: 0;"
    alt="">
  <div class="container-xxl position-relative" style="z-index: 1;">

    <div class="text-center mb-15">
      <span class="badge badge-light-primary fs-9 ls-2 text-uppercase fw-bold py-2 px-4 mb-4">MEET THE TEAM</span>
      <h2 class="fw-bolder fs-2x mb-4 text-gray-900">Our <span class="text-primary">Dedicated Team</span></h2>
      <p class="text-gray-600 fs-5 mw-500px mx-auto">Meet our professional team ready to support your wellness journey
      </p>
    </div>

    <!-- TEAM CAROUSEL AREA -->
    <div class="mb-20">
      <div class="swiper my-5 pb-10 px-5" id="allTeamSwiper">
        <div class="swiper-wrapper">
          <?php foreach ($all_team as $m): ?>
          <div class="swiper-slide h-auto py-5">
            <div
              class="card card-bordered overflow-hidden h-100 mx-auto transition-all duration-300 hover-elevate-up shadow-sm border-0 bg-white"
              style="max-width: 300px; border-radius: 1rem;">
              <div class="ratio ratio-1x1 overflow-hidden bg-light position-relative">
                <img src="<?= htmlspecialchars($photoBase . '/' . $m['photo'])?>"
                  alt="<?= htmlspecialchars($m['name'])?>"
                  class="object-fit-cover w-100 h-100 position-absolute top-0 start-0 hover-scale"
                  onerror="this.src='../../team/team-blank.jpg'">
              </div>
              <div class="card-body p-6 d-flex flex-column text-start">
                <span
                  class="badge badge-light-primary fs-9 text-uppercase ls-1 mb-4 border border-primary border-opacity-25 align-self-start fw-bold px-3 py-2">
                  <?= htmlspecialchars($m['role'])?>
                </span>
                <h3 class="fw-bold fs-3 mb-1 text-gray-900">
                  <?= htmlspecialchars($m['name'])?>
                </h3>
                <a href="mailto:<?= htmlspecialchars($m['email'])?>"
                  class="text-gray-500 fs-7 d-block mb-5 text-truncate hover-primary transition-all text-decoration-none">
                  <i class="ki-duotone ki-sms fs-6 me-1"><span class="path1"></span><span class="path2"></span></i>
                  <?= htmlspecialchars($m['email'])?>
                </a>

                <?php if (isset($m['programs']) && !empty($m['programs'])): ?>
                <div class="border-top border-gray-200 mb-4 opacity-50"></div>
                <div class="text-gray-400 fs-9 fw-bold text-uppercase ls-2 mb-3">Assigned Programs</div>
                <div class="d-flex flex-wrap gap-2 mb-4">
                  <?php foreach ($m['programs'] as $p): ?>
                  <span
                    class="badge badge-light bg-gray-100 text-gray-700 fs-8 fw-semibold d-flex align-items-center gap-2 px-3 py-2 rounded-pill shadow-sm border border-gray-200">
                    <img src="<?= htmlspecialchars($logoBase . '/' . $p . '.png')?>" alt="<?= htmlspecialchars($p)?>"
                      class="w-15px h-15px">
                    <?= htmlspecialchars($p)?>
                  </span>
                  <?php
    endforeach; ?>
                </div>
                <?php
  else: ?>
                <div class="border-top border-gray-200 mb-4 opacity-50"></div>
                <div class="flex-grow-1 mb-4 d-flex align-items-center text-gray-500 fs-6 fst-italic">
                  "Leading the GCO team with vision and dedication to student wellness."
                </div>
                <?php
  endif; ?>

                <div class="mt-auto pt-4 border-top border-gray-200">
                  <a href="mailto:<?= htmlspecialchars($m['email'])?>"
                    class="btn <?= $m['role'] === 'DIRECTOR' ? 'btn-primary' : 'btn-light-primary'?> btn-sm fw-bold w-100 rounded-pill hover-elevate-up transition-all py-3">
                    <?php if ($m['role'] === 'DIRECTOR'): ?>
                    <i class="ki-duotone ki-messages fs-5 me-2"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                        class="path5"></span></i>
                    <?php
  else: ?>
                    <i class="ki-duotone ki-messages fs-5 me-2"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                        class="path5"></span></i>
                    <?php
  endif; ?>
                    <?= htmlspecialchars($m['contactText'])?>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php
endforeach; ?>
        </div>
        <div class="swiper-pagination mt-10 position-relative"></div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swiper !== 'undefined') {
          new Swiper('#allTeamSwiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: false,
            grabCursor: true,
            autoplay: { delay: 3500, disableOnInteraction: false, pauseOnMouseEnter: true },
            pagination: { el: '.swiper-pagination', clickable: true, dynamicBullets: true },
            breakpoints: {
              640: { slidesPerView: 2, spaceBetween: 20 },
              992: { slidesPerView: 3, spaceBetween: 25 },
              1200: { slidesPerView: 4, spaceBetween: 30 }
            }
          });
        }
      });
    </script>
    <style>
      .hover-scale {
        transition: transform .5s cubic-bezier(0.25, 1, 0.5, 1);
      }

      .card:hover .hover-scale {
        transform: scale(1.1);
      }

      #allTeamSwiper {
        padding-bottom: 3.5rem !important;
        padding-top: 1rem !important;
      }

      #allTeamSwiper .swiper-pagination-bullet {
        background-color: var(--bs-primary);
        opacity: .3;
        transition: all 0.3s ease;
        width: 10px;
        height: 10px;
      }

      #allTeamSwiper .swiper-pagination-bullet-active {
        opacity: 1;
        width: 32px;
        border-radius: 8px;
        background-color: var(--bs-primary);
      }

      .hover-primary:hover {
        color: var(--bs-primary) !important;
      }

      .hover-elevate-up {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .card.hover-elevate-up:hover {
        transform: translateY(-8px);
        box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .08) !important;
        z-index: 10;
      }
    </style>

  </div>
</section>