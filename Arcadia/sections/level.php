<link rel="stylesheet" href="assets/css/level.css" />
<section class="level-section pt-20 pb-20" id="arcLevelSection">
  <div class="arc-container text-center">

    <!-- Badge Pill -->
    <div class="arc-badge-pill">Progress</div>

    <!-- Title -->
    <h2 class="fw-bolder text-white mb-4" style="font-size: 3.5rem; line-height: 1.2;">Level Up System</h2>
    <p class="text-gray-500 fw-semibold fs-5 mx-auto mb-15" style="max-width: 600px;">
      Start at Bronze and climb to Diamond. Each level unlocks new titles and exclusive perks.
    </p>

    <!-- Level Track -->
    <div class="level-track">

      <div class="level-item level-item--bronze">
        <div class="level-circle">
          <span>🥉</span>
        </div>
        <div class="level-label mt-3 fw-bolder fs-4">Bronze</div>
        <div class="level-xp fw-bold text-gray-500 fs-7">0 - 4,799 XP</div>
      </div>

      <div class="level-item level-item--silver">
        <div class="level-circle">
          <span>🥈</span>
        </div>
        <div class="level-label mt-3 fw-bolder fs-4">Silver</div>
        <div class="level-xp fw-bold text-gray-500 fs-7">4,800 - 9,599 XP</div>
      </div>

      <div class="level-item level-item--gold">
        <div class="level-circle">
          <span>🥇</span>
        </div>
        <div class="level-label mt-3 fw-bolder fs-4">Gold</div>
        <div class="level-xp fw-bold text-gray-500 fs-7">9,600 - 14,399 XP</div>
      </div>

      <div class="level-item level-item--platinum">
        <div class="level-circle">
          <span>🛡️</span>
        </div>
        <div class="level-label mt-3 fw-bolder fs-4">Platinum</div>
        <div class="level-xp fw-bold text-gray-500 fs-7">14,400 - 19,199 XP</div>
      </div>

      <div class="level-item level-item--diamond">
        <div class="level-circle">
          <span>💎</span>
        </div>
        <div class="level-label mt-3 fw-bolder fs-4">Diamond</div>
        <div class="level-xp fw-bold text-gray-500 fs-7">19,200+ XP</div>
      </div>

    </div>

    <!-- Titles Table -->
    <div class="titles-table text-start">
      <h3 class="text-white fw-bolder mb-1">Titles per Level</h3>
      <p class="text-muted fs-7 mb-8">Each level has 3 unlockable titles as you gain more XP.</p>

      <div class="row g-5">

        <div class="col-lg">
          <div class="tier-label tier-label--bronze fw-bolder fs-8 text-uppercase mb-4">BRONZE</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-bronze-1.png" class="title-icon">Initiate Of The Scroll</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-bronze-2.png" class="title-icon">Acolyte Of Inquiry</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-bronze-3.png" class="title-icon">Scholar-Errant</div>
        </div>

        <div class="col-lg">
          <div class="tier-label tier-label--silver fw-bolder fs-8 text-uppercase mb-4">SILVER</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-silver-1.png" class="title-icon">Lex Arcanum Examiner</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-silver-2.png" class="title-icon">Seer Of Equations</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-silver-3.png" class="title-icon">Magister Cognitum</div>
        </div>

        <div class="col-lg">
          <div class="tier-label tier-label--gold fw-bolder fs-8 text-uppercase mb-4">GOLD</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-gold-1.png" class="title-icon">Warden Of The Codex</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-gold-2.png" class="title-icon">Technosophus Primus</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-gold-3.png" class="title-icon">Lumen Scholaris</div>
        </div>

        <div class="col-lg">
          <div class="tier-label tier-label--platinum fw-bolder fs-8 text-uppercase mb-4">PLATINUM</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-platinum-1.png" class="title-icon">Chronicler Of The Unseen</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-platinum-2.png" class="title-icon">Aetherial Theorist</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-platinum-3.png" class="title-icon">Primarch Of Logic</div>
        </div>

        <div class="col-lg">
          <div class="tier-label tier-label--diamond fw-bolder fs-8 text-uppercase mb-4">DIAMOND</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-diamond-1.png" class="title-icon">The Unbound Scholar</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-diamond-2.png" class="title-icon">Domain Architect</div>
          <div class="title-chip"><img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/levels/MD-diamond-3.png" class="title-icon">Capstone Alchemist</div>
        </div>

      </div>
    </div>

  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const section = document.getElementById('arcLevelSection');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          section.classList.add('animate-in');
        }
      });
    }, {
      threshold: 0.2
    });
    observer.observe(section);
  });
</script>