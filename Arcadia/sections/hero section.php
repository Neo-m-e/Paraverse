<?php /* ============================================================
   SECTION 02 — HERO
   Include: <?php include 'sections/02-hero.php'; ?>
   ============================================================ */ ?>

<style>
/* ── HERO SECTION ── */
.arc-hero {
  background: #FFF8F1;
  padding: 72px 0 56px;
  position: relative;
  overflow: hidden;
}

/* subtle radial glow top-right */
.arc-hero::before {
  content: '';
  position: absolute;
  top: -100px; right: -150px;
  width: 520px; height: 520px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(249,115,22,0.11) 0%, transparent 70%);
  pointer-events: none;
}
/* soft circle bottom-left */
.arc-hero::after {
  content: '';
  position: absolute;
  bottom: -80px; left: -100px;
  width: 340px; height: 340px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(249,115,22,0.06) 0%, transparent 70%);
  pointer-events: none;
}

.arc-hero-tag {
  display: inline-block;
  background: #FDE8D0;
  color: #F97316;
  font-family: 'Nunito', sans-serif;
  font-size: 0.7rem;
  font-weight: 800;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  padding: 4px 14px;
  border-radius: 20px;
  margin-bottom: 1rem;
}

.arc-hero h1 {
  font-family: 'Poppins', sans-serif;
  font-size: clamp(2rem, 4.5vw, 3.1rem);
  font-weight: 800;
  line-height: 1.13;
  color: #1C1917;
  margin-bottom: 1.1rem;
}
.arc-hero h1 em {
  font-style: normal;
  color: #F97316;
}

.arc-hero .hero-desc {
  font-family: 'Nunito', sans-serif;
  font-size: 0.97rem;
  color: #78716C;
  line-height: 1.75;
  max-width: 430px;
  margin-bottom: 1.75rem;
}

/* CTA Buttons */
.arc-btn-primary {
  display: inline-block;
  background: #F97316;
  color: #fff;
  font-family: 'Nunito', sans-serif;
  font-weight: 800;
  font-size: 0.9rem;
  padding: 0.65rem 1.6rem;
  border-radius: 10px;
  border: none;
  text-decoration: none;
  box-shadow: 0 4px 16px rgba(249,115,22,0.35);
  transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
  cursor: pointer;
}
.arc-btn-primary:hover {
  background: #E05A00;
  color: #fff;
  transform: translateY(-2px);
  box-shadow: 0 8px 22px rgba(249,115,22,0.4);
}

.arc-btn-secondary {
  display: inline-block;
  background: transparent;
  color: #1C1917;
  font-family: 'Nunito', sans-serif;
  font-weight: 700;
  font-size: 0.9rem;
  padding: 0.65rem 1.5rem;
  border-radius: 10px;
  border: 2px solid #E7E5E4;
  text-decoration: none;
  transition: all 0.2s;
  cursor: pointer;
}
.arc-btn-secondary:hover {
  border-color: #F97316;
  color: #F97316;
  background: #FDE8D0;
}

/* Stats */
.arc-hero-stats {
  display: flex;
  flex-wrap: wrap;
  gap: 2.2rem;
  margin-top: 2rem;
}
.arc-hero-stat .stat-num {
  font-family: 'Poppins', sans-serif;
  font-size: 1.55rem;
  font-weight: 900;
  color: #F97316;
  line-height: 1;
}
.arc-hero-stat .stat-lbl {
  font-family: 'Nunito', sans-serif;
  font-size: 0.72rem;
  font-weight: 700;
  color: #A8A29E;
  margin-top: 3px;
}

/* Hero illustration placeholder */
.arc-hero-img {
  width: 100%;
  min-height: 360px;
  background: linear-gradient(135deg, #FDE8D0 0%, #fcd9a8 100%);
  border-radius: 22px;
  border: 2px dashed #F97316;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 10px;
  color: #A8A29E;
  font-family: 'Nunito', sans-serif;
  font-size: 0.85rem;
  font-weight: 700;
  position: relative;
  overflow: hidden;
}
.arc-hero-img .img-icon { font-size: 3.5rem; }
.arc-hero-img .img-label { font-size: 0.8rem; color: #C4A882; }

/* Floating stat badges */
.arc-hero-img .float-badge {
  position: absolute;
  background: #fff;
  border-radius: 12px;
  padding: 8px 14px;
  box-shadow: 0 4px 16px rgba(0,0,0,0.10);
  font-family: 'Nunito', sans-serif;
  font-size: 0.75rem;
  font-weight: 800;
  color: #1C1917;
  display: flex; align-items: center; gap: 6px;
}
.arc-hero-img .float-badge.top-right { top: 20px; right: 20px; }
.arc-hero-img .float-badge.bottom-left { bottom: 20px; left: 20px; }
.arc-hero-img .float-badge .dot {
  width: 8px; height: 8px; border-radius: 50%; background: #22C55E;
}

@media (max-width: 991px) {
  .arc-hero { padding: 50px 0 40px; }
  .arc-hero-img { min-height: 260px; }
  .arc-hero-stats { gap: 1.4rem; }
}
</style>

<!-- ═══════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════ -->
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