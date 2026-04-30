<?php  ?>
<link rel="stylesheet" href="arcadia/assets/css/arcadia.css">
<section class="arc-hero">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center g-5">

      <!-- Left: Copy -->
      <div class="col-lg-6">
        <span class="arc-hero-tag">🎓 TikTok's Gamified Learning Platform</span>

        <h1>
          Learn Like It's<br>
          a <em>Game,</em><br>
          Not a Chore.
        </h1>

        <p class="hero-desc">
          Transform your academic journey into an epic adventure at TLU. Track Era badges,
          collect XP &amp; Coins, climb leaderboard positions, and explore real rewards —
          all while leveling up your knowledge.
        </p>

        <div class="d-flex flex-wrap gap-3">
          <a href="#" class="arc-btn-primary">Start Your Journey →</a>
          <a href="#" class="arc-btn-secondary">How It Works</a>
        </div>

        <!-- Stats -->
        <div class="arc-hero-stats">
          <div class="arc-hero-stat">
            <div class="stat-num" data-count="12681" data-suffix="+">12,681+</div>
            <div class="stat-lbl">Active Students</div>
          </div>
          <div class="arc-hero-stat">
            <div class="stat-num" data-count="500" data-suffix="+">500+</div>
            <div class="stat-lbl">Unique Badges</div>
          </div>
          <div class="arc-hero-stat">
            <div class="stat-num" data-count="20" data-suffix="+">20+</div>
            <div class="stat-lbl">Rewards to Claim</div>
          </div>
        </div>
      </div>

      <!-- Right: Illustration placeholder -->
      <div class="col-lg-6">
        <div class="arc-hero-img">
          <!-- Replace with: <img src="assets/img/hero-illustration.png" alt="Hero" class="img-fluid"> -->
          <div class="img-icon">🎮</div>
          <div class="img-label">Hero Illustration — Replace with actual image</div>

          <!-- Floating decorative badges -->
          <div class="float-badge top-right">
            <div class="dot"></div>
            12.6K Students Online
          </div>
          <div class="float-badge bottom-left">
            🏅 Badge Earned!
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
/* ── HERO COUNTER ANIMATION ── */
(function() {
  function animateCounter(el) {
    const target = parseInt(el.dataset.count, 10);
    const suffix = el.dataset.suffix || '';
    let current = 0;
    const step = Math.ceil(target / 80);
    const timer = setInterval(() => {
      current = Math.min(current + step, target);
      el.textContent = current.toLocaleString() + suffix;
      if (current >= target) clearInterval(timer);
    }, 18);
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.querySelectorAll('[data-count]').forEach(animateCounter);
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.4 });

  const statsEl = document.querySelector('.arc-hero-stats');
  if (statsEl) observer.observe(statsEl);
})();
</script>