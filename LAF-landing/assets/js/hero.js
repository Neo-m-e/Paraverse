document.addEventListener('DOMContentLoaded', function () {
  // Init AOS once for the whole page
  if (typeof AOS !== 'undefined') AOS.init({ once: true, duration: 650, offset: 60 });

  // Smooth scroll for hero CTA
  document.querySelectorAll('.scroll-laf').forEach(function (el) {
    el.addEventListener('click', function (e) {
      var target = document.querySelector(this.getAttribute('href'));
      if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
    });
  });
});
