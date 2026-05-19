/* ============================================================
   hero.js — Hero section scripts
   ✅ SAFE TO EDIT
   ============================================================ */

document.addEventListener('DOMContentLoaded', function () {

  // ── Init AOS (once, for whole page) ──
  if (typeof AOS !== 'undefined') {
    AOS.init({ once: true, duration: 650, offset: 60 });
  }

  // ── Smooth scroll for "See How It Works" ──
  document.querySelectorAll('.scroll-laf').forEach(function (el) {
    el.addEventListener('click', function (e) {
      var target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // ── Navbar shadow on scroll ──
  window.addEventListener('scroll', function () {
    var navbar = document.querySelector('.app-header, header, .navbar');
    if (navbar) {
      if (window.scrollY > 10) {
        navbar.style.boxShadow = '0 2px 20px rgba(75,94,170,0.12)';
      } else {
        navbar.style.boxShadow = '';
      }
    }
  });

});
