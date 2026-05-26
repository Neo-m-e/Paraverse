/**
 * Refactored: custom CSS → Bootstrap/Metronic utilities
 * DISCOURSE — Search + Filter Bar JS
 * File: assets/js/sec-search-filter.js
 */

(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    // ── Live search filter ──────────────────────────────────
    const searchInput = document.getElementById('discourse-search-input');

    if (searchInput) {
      searchInput.addEventListener('input', function () {
        const query = this.value.trim().toLowerCase();
        
        // Query post cards dynamically inside the input listener to ensure 
        // the filter matches new elements loaded via tabs or AJAX updates.
        const postCards = document.querySelectorAll('.discourse-post-card');

        postCards.forEach(function (card) {
          const titleEl   = card.querySelector('.discourse-post-title');
          const excerptEl = card.querySelector('.discourse-post-excerpt');
          const text = [
            titleEl   ? titleEl.textContent   : '',
            excerptEl ? excerptEl.textContent : ''
          ].join(' ').toLowerCase();

          if (!query || text.includes(query)) {
            card.style.display = '';
          } else {
            card.style.display = 'none';
          }
        });
      });
    }

  });
})();