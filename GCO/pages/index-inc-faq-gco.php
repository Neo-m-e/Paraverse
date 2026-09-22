<?php
$faqs = [
  ['q' => 'What is GCO Connect?', 'a' => 'GCO Connect is the official online appointment system of the FEU Tech Guidance and Counseling Office (GCO). It allows students to easily book counseling, consultation, and other guidance services.'],
  ['q' => 'Who is eligible to use GCO Connect?', 'a' => 'All currently enrolled students of FEU Tech, FEU Diliman, and FEU Alabang are eligible to use GCO Connect to access counseling and guidance services.'],
  ['q' => 'What services are available for booking through GCO Connect?', 'a' => 'Available services include Counseling, Consultation, Interviews (Kumustahan), and Psychological Testing.'],
  ['q' => 'How can I schedule an appointment using GCO Connect?', 'a' => 'Log in to the GCO Connect portal using your student credentials, select your desired service, choose an available time slot with your assigned counselor, and confirm your booking.'],
  ['q' => 'How can I book a follow-up appointment in GCO Connect?', 'a' => 'After your initial session, you can book a follow-up appointment through the same portal by selecting the "Follow-up" option or coordinating with your counselor during your session.'],
  ['q' => 'How can I view or obtain my appointment records?', 'a' => 'You can view your current and past appointments through the "My Appointments" or "History" section of the GCO Connect dashboard. For formal records, please contact the GCO office directly.'],
  ['q' => 'Who should I contact if I experience technical issues or need assistance?', 'a' => 'If you experience any technical issues with GCO Connect, you may email the Guidance and Counseling Office at guidance@feutech.edu.ph or visit the GCO office in person.'],
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
  <img src="<?php echo htmlspecialchars($assetsBase ?? 'assets'); ?>/img/bg-assets/flower.png"
    class="position-absolute d-none d-lg-block"
    style="top: 15%; left: 5%; opacity: 0.4; pointer-events: none; width: 220px; transform: rotate(15deg); z-index: 0;"
    alt="">
  <img src="<?php echo htmlspecialchars($assetsBase ?? 'assets'); ?>/img/bg-assets/happy-face.png"
    class="position-absolute d-none d-lg-block"
    style="bottom: 10%; right: 5%; opacity: 0.4; pointer-events: none; width: 240px; transform: rotate(-20deg); z-index: 0;"
    alt="">
  <div class="container-xxl position-relative" style="z-index: 1;">

    <div class="text-center mb-15">
      <span class="badge badge-light-primary fs-9 ls-2 text-uppercase fw-bold py-2 px-4 mb-4">FAQ</span>
      <h2 class="fw-bolder fs-2x mb-4 text-gray-600">Frequently Asked Questions</h2>
      <p class="text-gray-600 fs-5 mw-500px mx-auto">Find answers to common questions about our counseling services</p>
    </div>

    <!--
      Pure HTML5 accordion — no JavaScript required.
      <details>/<summary> toggle natively in every modern browser.
      gco-design.css wires the Bootstrap .accordion-button open/closed styles
      to details[open] so the chevron and active colours apply correctly.
    -->
    <div class="accordion accordion-icon-toggle mw-900px mx-auto" id="kt_accordion_faq">
      <?php foreach ($faqs as $i => $faq): ?>
      <details class="accordion-item mb-5 bg-white border border-gray-200 rounded-2 shadow-none">
        <summary class="accordion-button fs-5 fw-bold text-gray-600 p-6">
          <?= htmlspecialchars($faq['q'])?>
        </summary>
        <div class="accordion-body text-gray-600 fs-6 px-6 pb-6 pt-0 lh-lg">
          <?= htmlspecialchars($faq['a'])?>
        </div>
      </details>
      <?php endforeach; ?>
    </div>

  </div>
</section>