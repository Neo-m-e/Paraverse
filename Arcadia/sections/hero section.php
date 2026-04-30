
<style>
  /* space above hero below header */
  .arc-hero {
    background: #FFF5EC;
    padding: 80px 0;
    position: relative;
    overflow: hidden;
    width: 100vw;
    margin-left: calc(-50vw + 50%);
  }
  dotlottie-player {
    width: 100% !important;
    height: 100% !important;
    transform: scale(1.1);
  }
  /* Radial Glow  */
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
  .arc-hero .container {
    position: relative;
    z-index: 1;
  }
  /* Tagline Styling */
  .arc-hero-tag {
    display: inline-flex;
    align-items: center;
    background: #FFFFFF;
    color: #F97316;
    font-family: 'Nunito', sans-serif;
    font-size: 0.75rem;
    font-weight: 800;
    padding: 8px 20px;
    border-radius: 50px;
    border: 1px solid #FDE8D0;
    margin-bottom: 2rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
  }
  .arc-hero-tag .dot {
    height: 8px;
    width: 8px;
    background-color: #F97316;
    border-radius: 50%;
    display: inline-block;
    margin-right: 10px;
  }
  /* Typography */
  .arc-hero h1 {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(2.8rem, 6vw, 4.2rem);
    /* Mas malaki na siya beh */
    font-weight: 900;
    line-height: 1.05;
    color: #1C1917;
    margin-bottom: 1.8rem;
  }
  .arc-hero h1 em {
    font-style: normal;
    color: #F97316;
  }
  .arc-hero .hero-desc {
    font-family: 'Nunito', sans-serif;
    font-size: 1.15rem;
    color: #78716C;
    line-height: 1.7;
    max-width: 520px;
    margin-bottom: 3rem;
  }
  /* Buttons - Mas "Juicy" version */
  .arc-btn-primary {
    background: #F97316;
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
    color: #F97316 !important;
    font-weight: 800;
    padding: 16px 36px;
    border-radius: 50px;
    border: 2px solid #F97316;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
  }
  /* Circular Illustration Wrapper */
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
  /* Floating Badges with Hover Animation */
  .float-card {
    position: absolute;
    background: #fff;
    padding: 14px 22px;
    border-radius: 18px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 12px;
    font-family: 'Nunito', sans-serif;
    font-size: 0.85rem;
    font-weight: 800;
    animation: floating 3s ease-in-out infinite;
  }
  @keyframes floating {
    0% {
      transform: translateY(0px);
    }
    50% {
      transform: translateY(-15px);
    }
    100% {
      transform: translateY(0px);
    }
  }
  /* Stats Bar Animation */
  .stat-item .stat-num {
    font-family: 'Poppins', sans-serif;
    font-size: 2.2rem;
    font-weight: 900;
    color: #F97316;
    display: block;
  }
  .stat-item .stat-num span {
    color: #F97316;
  }
</style>
<section class="arc-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      <!-- Left Side -->
      <div class="col-lg-6">
        <div class="arc-hero-tag">
          <span class="dot"></span> FEU Tech's Gamified Learning Platform
        </div>
        <h1>
          Learn Like It's<br>
          a <em>Game,</em><br>
          Not a <em>Chore.</em>
        </h1>
        <p class="hero-desc">
          Transform your academic journey into an epic adventure at FEU Tech.
          Earn badges, collect XP, climb leaderboards, and redeem real rewards.
        </p>
        <div class="d-flex gap-3 mb-5">
          <a href="#" class="arc-btn-primary">Start Your Journey →</a>
          <a href="#" class="arc-btn-secondary">See How It Works</a>
        </div>
        <div class="d-flex gap-5 mt-5 arc-hero-stats">
          <div class="stat-item">
            <span class="stat-num" data-count="12581">0</span>
            <span class="stat-lbl fw-bold text-muted">Active Players</span>
          </div>
          <div class="stat-item">
            <span class="stat-num" data-count="500">0</span>
            <span class="stat-lbl fw-bold text-muted">Unique Badges</span>
          </div>
          <div class="stat-item">
            <span class="stat-num" data-count="20">0</span>
            <span class="stat-lbl fw-bold text-muted">Rewards in Store</span>
          </div>
        </div>
      </div>
      <!-- Right Content (Animation Version) -->
      <div class="col-lg-6">
        <div class="hero-illustration-wrap">
          <!-- Animation Player Container -->
          <!-- Lottie Player using your JSON file -->
          <dotlottie-player
            src="assets/images/hero.json"
            background="transparent"
            speed="1"
            style="width: 300px; height: 300px;"
            loop
            autoplay>
          </dotlottie-player>
          <!-- Floating Cards with different delays -->
          <div class="float-card" style="top: 15%; left: -5%; animation-delay: 0s;">
            <span style="font-size: 1.5rem;">🎖️</span>
            <div>Level Up!<br><small class="text-muted fw-normal">Bronze → Silver</small></div>
          </div>
          <div class="float-card" style="top: 5%; right: -5%; animation-delay: 1s;">
            <span style="font-size: 1.5rem;">📈</span>
            <div>Top Scholar<br><small class="text-muted fw-normal">+500 XP</small></div>
          </div>
          <div class="float-card" style="bottom: 15%; right: -8%; animation-delay: 0.5s;">
            <span style="font-size: 1.5rem;">🌟</span>
            <div>12,581 Players<br><small class="text-muted fw-normal">Online Now</small></div>
          </div>
        </div>
      </div>
</section>
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<script>
  /* ── COUNTER ANIMATION FIX ── */
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
    }, {
      threshold: 0.5
    });

    const statsSection = document.querySelector('.arc-hero-stats');
    if (statsSection) observer.observe(statsSection);
  });
</script>