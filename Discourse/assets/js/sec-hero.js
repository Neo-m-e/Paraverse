/**
 * DISCOURSE — Hero Section JS
 * File: assets/js/sec-hero.js
 */

(function () {
  'use strict';

  // AOS-style fade-in on load if AOS isn't initialized yet
  document.addEventListener('DOMContentLoaded', function () {
    const hero = document.getElementById('discourse-hero');
    if (hero) {
      hero.style.opacity = '0';
      hero.style.transform = 'translateY(12px)';
      hero.style.transition = 'opacity 0.5s ease, transform 0.5s ease';

      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          hero.style.opacity = '1';
          hero.style.transform = 'translateY(0)';
        });
      });
    }
  });
})();
