/**
 * ARCADIA LANDING PAGE — MAIN JAVASCRIPT
 * Handles: Badge filtering, smooth interactions, counters
 */

document.addEventListener('DOMContentLoaded', function () {

  /* ── BADGE CATEGORY FILTER ── */
  const filterBtns  = document.querySelectorAll('.badge-filter-btn');
  const badgeItems  = document.querySelectorAll('.badge-item');

  function filterBadges(category) {
    badgeItems.forEach(item => {
      const cats = item.dataset.category || '';
      if (category === 'all' || cats.includes(category)) {
        item.classList.add('visible');
      } else {
        item.classList.remove('visible');
      }
    });
  }

  filterBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      filterBadges(this.dataset.filter);
    });
  });

  // Show all by default
  filterBadges('all');

  /* ── SHOW ALL BADGES TOGGLE ── */
  const showAllBtn = document.getElementById('showAllBadges');
  let showingAll   = false;

  if (showAllBtn) {
    showAllBtn.addEventListener('click', function () {
      showingAll = !showingAll;
      const hiddenItems = document.querySelectorAll('.badge-item.visible');
      if (showingAll) {
        badgeItems.forEach(item => item.classList.add('visible'));
        this.textContent = 'Show Less ↑';
      } else {
        filterBadges(document.querySelector('.badge-filter-btn.active')?.dataset.filter || 'all');
        this.textContent = 'Show All Badges →';
      }
    });
  }

  /* ── ANIMATED COUNTERS ── */
  function animateCounter(el, target, suffix = '') {
    let start = 0;
    const duration = 1500;
    const step = Math.ceil(target / (duration / 16));
    const timer = setInterval(() => {
      start += step;
      if (start >= target) { start = target; clearInterval(timer); }
      el.textContent = start.toLocaleString() + suffix;
    }, 16);
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counters = entry.target.querySelectorAll('[data-count]');
        counters.forEach(el => {
          const target = parseInt(el.dataset.count, 10);
          const suffix = el.dataset.suffix || '';
          animateCounter(el, target, suffix);
        });
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.3 });

  const heroStats = document.querySelector('.hero-stat-block');
  if (heroStats) observer.observe(heroStats);

  /* ── LEVEL NODE HIGHLIGHT ── */
  const levelNodes = document.querySelectorAll('.level-node');
  levelNodes.forEach(node => {
    node.addEventListener('click', function () {
      levelNodes.forEach(n => n.classList.remove('active'));
      this.classList.add('active');
    });
  });

  /* ── SMOOTH REVEAL ON SCROLL ── */
  const revealEls = document.querySelectorAll('.how-card, .step-card, .badge-item, .reward-card');
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.style.opacity    = '1';
          entry.target.style.transform  = 'translateY(0)';
        }, i * 60);
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  revealEls.forEach(el => {
    el.style.opacity   = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.45s ease, transform 0.45s ease';
    revealObserver.observe(el);
  });

});
