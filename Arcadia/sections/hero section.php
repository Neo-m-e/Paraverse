<style>
  /*space above hero below header*/
  .arc-hero {
    background: #FFF5EC;
    padding: 80px 0;
    position: relative;
    overflow: hidden;
    width: 100vw;
    margin-left: calc(-50vw + 50%);
  }

  /*animation*/
  dotlottie-player {
    width: 100% !important;
    height: 100% !important;
    transform: scale(1.1);
  }

  /*Radial Glow BG*/
  .arc-hero::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 70%;
    transform: translate(-50%, -50%);
    width: 800px;
    height: 800px;
    background: radial-gradient(circle, rgba(255, 255, 255, 1) 0%, rgba(255, 245, 236, 0) 70%);
    z-index: 0;
  }

  /*FEUTECH GAMIFIED*/
  .arc-hero-tag {
    display: inline-flex;
    align-items: center;
    background: #FFFFFF;
    color: #E8521A;
    font-size: 0.75rem;
    font-weight: 800;
    padding: 8px 20px;
    border-radius: 50px;
    border: 1px solid #FDE8D0;
    margin-bottom: 2rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
  }

  /*FEUTECH GAMIFIED DOT*/
  .arc-hero-tag .dot {
    height: 8px;
    width: 8px;
    background-color: #E8521A;
    border-radius: 50%;
    display: inline-block;
    margin-right: 10px;
  }

  /*Learn like*/
  .arc-hero h1 {
    font-size: clamp(2.8rem, 6vw, 4.2rem);
    font-weight: 2000;
    line-height: 1.05;
    color: #1C1917;
    margin-bottom: 1.8rem;
  }

  /*game*/
  .arc-hero h1 em {
    font-style: normal;
    color: #E8521A;
  }

  /*chore*/
  .arc-hero h1 em2 {
    font-style: normal;
    color: #F5A623;
  }

  /*description*/
  .arc-hero .hero-desc {
    font-size: 1.15rem;
    color: #78716C;
    line-height: 1.7;
    max-width: 520px;
    margin-bottom: 3rem;
  }

  /*Buttons*/
  .arc-btn-primary {
    background: #E8521A;
    color: #fff !important;
    font-weight: 800;
    padding: 16px 36px;
    border-radius: 50px;
    text-decoration: none;
    box-shadow: 0 10px 25px rgba(249, 115, 22, 0.3);
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    display: inline-block;
  }

  .arc-btn-primary:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 30px rgba(249, 115, 22, 0.4);
  }

  .arc-btn-secondary {
    background: #fff;
    color: #E8521A !important;
    font-weight: 800;
    padding: 16px 36px;
    border-radius: 50px;
    border: 2px solid #E8521A;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
  }

  /*floating bubble box*/
  .float-card {
    position: absolute;
    background: #fff;
    padding: 14px 22px;
    border-radius: 18px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 0.85rem;
    font-weight: 800;
    animation: floating 3s ease-in-out infinite;
  }

  /*floating bubbles placeholder*/
  .hero-illustration-wrap {
    position: relative;
    width: 100%;
    max-width: 550px;
    aspect-ratio: 1/1;
    background: radial-gradient(circle, #FDE8D0 0%, rgba(255, 245, 236, 0) 75%);
    border-radius: 50%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /*floaters of bubble*/
  @keyframes floating {
    0%   { transform: translateY(0px); }
    50%  { transform: translateY(-15px); }
    100% { transform: translateY(0px); }
  }

  /*to be aligned to logo and lock*/
  .arc-container {
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 10;
  }

  /*number information*/
  .stat-item .stat-num {
    font-size: 2.2rem;
    font-weight: 2000;
    color: #E8521A;
    display: block;
  }
</style>

<section class="arc-hero">
  <div class="arc-container text-start">
    <div class="row align-items-center g-5">

      <!-- Left Side -->
      <div class="col-lg-6">

        <!-- Tag -->
        <div class="arc-hero-tag fw-bolder fs-8 ls-1 mb-8">
          <span class="dot"></span> FEU Tech's Gamified Learning Platform
        </div>

        <!-- Heading -->
        <h1 class="fw-bolder text-gray-900 lh-sm mb-6">
          Learn Like It's<br>
          a <em>Game,</em><br>
          Not a <em2>Chore.</em2>
        </h1>

        <!-- Description -->
        <p class="hero-desc text-gray-500 fs-5 fw-semibold mb-10">
          Transform your academic journey into an epic adventure at FEU Tech.
          Earn badges, collect XP, climb leaderboards, and redeem real rewards.
        </p>

        <!-- Buttons -->
        <div class="d-flex justify-content-start gap-3 mb-5">
          <a href="#" class="arc-btn-primary">Start Your Journey →</a>
          <a href="#" class="arc-btn-secondary">See How It Works</a>
        </div>

        <!-- Stats -->
        <div class="d-flex justify-content-start gap-5 mt-5 arc-hero-stats">
          <div class="stat-item">
            <span class="stat-num fw-bolder" data-count="12581">0</span>
            <span class="stat-lbl fw-bold text-gray-500 fs-6">Active Players</span>
          </div>
          <div class="stat-item">
            <span class="stat-num fw-bolder" data-count="500">0</span>
            <span class="stat-lbl fw-bold text-gray-500 fs-6">Unique Badges</span>
          </div>
          <div class="stat-item">
            <span class="stat-num fw-bolder" data-count="20">0</span>
            <span class="stat-lbl fw-bold text-gray-500 fs-6">Rewards in Store</span>
          </div>
        </div>

      </div>

      <!-- Right Side -->
      <div class="col-lg-6">
        <div class="hero-illustration-wrap">
          <dotlottie-player
            src="assets/images/hero.json"
            background="transparent"
            speed="1"
            style="width: 300px; height: 300px;"
            loop
            autoplay>
          </dotlottie-player>

          <!-- Float Card 1 -->
          <div class="float-card" style="top: 15%; left: -5%; animation-delay: 0s;">
            <span class="fs-2">🎖️</span>
            <div>
              <span class="fw-bolder text-gray-800 fs-7">Level Up!</span><br>
              <small class="text-gray-500 fw-normal">Bronze → Silver</small>
            </div>
          </div>

          <!-- Float Card 2 -->
          <div class="float-card" style="top: 5%; right: -5%; animation-delay: 1s;">
            <span class="fs-2">📈</span>
            <div>
              <span class="fw-bolder text-gray-800 fs-7">Top Scholar</span><br>
              <small class="text-gray-500 fw-normal">+500 XP</small>
            </div>
          </div>

          <!-- Float Card 3 -->
          <div class="float-card" style="bottom: 15%; right: -8%; animation-delay: 0.5s;">
            <span class="fs-2">🌟</span>
            <div>
              <span class="fw-bolder text-gray-800 fs-7">12,581 Players</span><br>
              <small class="text-gray-500 fw-normal">Online Now</small>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<script>
  /* ── COUNTER ANIMATION generated to have design :> ── */
  document.addEventListener('DOMContentLoaded', () => {
    const animateCounter = (el) => {
      const target = parseInt(el.getAttribute('data-count'));
      let current = 0;
      const increment = target / 50;
      const update = () => {
        if (current < target) {
          current += increment;
          el.innerHTML = `<span>${Math.ceil(current).toLocaleString()}</span>+`;
          setTimeout(update, 20);
        } else {
          el.innerHTML = `<span>${target.toLocaleString()}</span>+`;
        }
      };
      update();
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.querySelectorAll('.stat-num').forEach(animateCounter);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    const statsSection = document.querySelector('.arc-hero-stats');
    if (statsSection) observer.observe(statsSection);
  });
</script>