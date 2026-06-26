(function ($) {
  'use strict';

  // Fade-in on load via rAF double-frame trick
  $(document).ready(function () {
    const $hero = $('#discourse-hero');
    if ($hero.length) {
      $hero.css({
        opacity: '0',
        transform: 'translateY(12px)',
        transition: 'opacity 0.5s ease, transform 0.5s ease'
      });

      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          $hero.css({
            opacity: '1',
            transform: 'translateY(0)'
          });
        });
      });
    }
  });
})(jQuery);