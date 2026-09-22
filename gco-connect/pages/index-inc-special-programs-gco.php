<?php
$eventsBase = isset($GCO_BASE) ? $GCO_BASE . 'assets/img/events' : 'assets/img/events';
$programs = [
  // ── Slide 1 (3 cards) ─────────────────────────────────────────
  [
    'title' => 'IQ and EQ Testing',
    'category' => 'Event Ended',
    'desc' => "GCO R.A.D.A.R.: IQ and EQ Testing for Term 2, AY '25-26",
    'date' => 'Mon • January 19, 2026 • 08:00 AM',
    'location' => 'Case room F1604',
    'image' => 'IQ and EQ Testing.png',
  ],
  [
    'title' => 'Kumustahan',
    'category' => 'Event Ended',
    'desc' => '"KUMUSTAHAN": Group Routine Interview for Students',
    'date' => 'Thu • December 4, 2025 • 09:00 AM',
    'location' => '1603 AVR',
    'image' => 'kumustahan.png',
  ],
  [
    'title' => 'Starting Your Career Path',
    'category' => 'Event Ended',
    'desc' => 'Career Development Activity: G.A.B.A.Y. Series – Psychological Testing &amp; Career Discussion',
    'date' => 'Mon • December 1, 2025 • 09:00 AM',
    'location' => '1603 AVR',
    'image' => 'career path.png',
  ],
  // ── Slide 2 (2 cards) ─────────────────────────────────────────
  [
    'title' => 'Mental Health Awareness Seminar',
    'category' => 'Upcoming',
    'desc' => 'GCO Wellness Talk: Understanding Stress, Anxiety &amp; Resilience for FEU Tech Students',
    'date' => 'Fri • March 21, 2026 • 10:00 AM',
    'location' => '1603 AVR',
    'image' => 'kumustahan.png',
  ],
  [
    'title' => 'Peer Facilitators Training',
    'category' => 'Upcoming',
    'desc' => 'COPE Program: Peer Facilitators Training &amp; Orientation for AY 2025–2026',
    'date' => 'Wed • April 8, 2026 • 09:00 AM',
    'location' => 'Case room F1604',
    'image' => 'career path.png',
  ],
];
?>
<section id="featured-events" class="bg-gco py-20">
  <div class="container-xxl">

    <div class="text-center mb-15">
      <span
        class="badge bg-white bg-opacity-20 text-white border border-white border-opacity-25 fs-9 ls-2 text-uppercase fw-bold py-2 px-4 mb-4">SPECIAL
        PROGRAMS</span>
      <h2 class="text-white fw-bolder fs-2x mb-4"><span class="text-white opacity-75">Featured </span> <span
          class="text-white">Events &amp; Activities</span></h2>
      <p class="text-white opacity-75 fs-5 mw-600px mx-auto">Join program-based interviews, testing, and consultation
        sessions&mdash;connected in <strong class="text-white">Eventually</strong>.</p>
    </div>

    <!-- Swiper carousel -->
    <div class="swiper my-5 pb-10 px-5" id="eventsSwiper">
      <div class="swiper-wrapper">
        <?php foreach ($programs as $p): ?>
        <div class="swiper-slide h-auto">
          <div class="card card-bordered overflow-hidden h-100 transition-all duration-300 hover-elevate-up shadow-sm border-0 bg-white"
            style="border-radius: 1rem;">
            <?php if (!empty($p['image'])): ?>
            <div class="ratio ratio-16x9 overflow-hidden">
              <img src="<?= htmlspecialchars($eventsBase . '/' . $p['image'])?>"
                alt="<?= htmlspecialchars($p['title'])?>" class="object-fit-cover w-100 h-100">
            </div>
            <?php endif; ?>

            <div class="card-body p-6 d-flex flex-column text-start">
              <span class="badge badge-light-danger text-danger fs-9 text-uppercase ls-1 fw-bold mb-4 align-self-start px-3 py-2 border border-danger border-opacity-25">
                <?= htmlspecialchars($p['category'])?>
              </span>
              <h4 class="fw-bold fs-5 mb-4 text-gray-900">
                <?= $p['desc']?>
              </h4>
              <div class="mt-auto">
                <div class="d-flex align-items-center gap-2 text-gray-500 fs-7 mb-2">
                  <i class="ki-duotone ki-calendar-2 fs-5 text-primary">
                    <span class="path1"></span><span class="path2"></span>
                    <span class="path3"></span><span class="path4"></span><span class="path5"></span>
                  </i>
                  <?= htmlspecialchars($p['date'])?>
                </div>
                <div class="d-flex align-items-center gap-2 text-gray-500 fs-7">
                  <i class="ki-duotone ki-geolocation fs-5 text-primary">
                    <span class="path1"></span><span class="path2"></span>
                  </i>
                  <?= htmlspecialchars($p['location'])?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination mt-10 position-relative"></div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        if (typeof Swiper !== 'undefined') {
          new Swiper('#eventsSwiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: false,
            grabCursor: true,
            autoplay: {
              delay: 4000,
              disableOnInteraction: false,
              pauseOnMouseEnter: true
            },
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
              dynamicBullets: true
            },
            breakpoints: {
              640: {
                slidesPerView: 1,
                spaceBetween: 20
              },
              768: {
                slidesPerView: 2,
                spaceBetween: 25
              },
              1024: {
                slidesPerView: 3,
                spaceBetween: 30
              }
            }
          });
        }
      });
    </script>

    <style>
      #eventsSwiper {
        padding-bottom: 3.5rem !important;
        padding-top: 1rem !important;
      }

      #eventsSwiper .swiper-pagination-bullet {
        background-color: #fff;
        opacity: .3;
        transition: all 0.3s ease;
        width: 10px;
        height: 10px;
      }

      #eventsSwiper .swiper-pagination-bullet-active {
        opacity: 1;
        width: 32px;
        border-radius: 8px;
        background-color: #fff;
      }

      .bg-gco {
        background-color: #7a1d1d;
        /* Match GCO Red if needed, or keep existing class */
      }
    </style>

  </div>
</section>