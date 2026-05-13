/**
 * Section: Search Bar + Recently Surrendered Items
 * Lost and Found — FEU Tech
 */

"use strict";

document.addEventListener('DOMContentLoaded', function () {

  /* ── Surrendered cards: "How to Claim" → popup ───────── */
  document.querySelectorAll('.btn-how-to-claim').forEach(function (btn) {
    btn.addEventListener('click', function () {
      lafShowModal('modalHowToClaim');
    });
  });

  /* ── Search bar: filter surrendered cards ────────────── */
  var searchInput    = document.getElementById('search-input');
  var searchCategory = document.getElementById('search-category');

  function runSearch() {
    var query = searchInput ? searchInput.value.toLowerCase().trim() : '';
    var cat   = searchCategory ? searchCategory.value : 'All Categories';

    document.querySelectorAll('.laf-item-card').forEach(function (card) {
      var name    = (card.querySelector('.item-name')?.textContent || '').toLowerCase();
      var floor   = (card.querySelector('.item-meta')?.textContent || '').toLowerCase();
      var cardCat = (card.querySelector('.badge-laf-cat')?.textContent || '').trim();

      var matchQuery = !query || name.includes(query) || floor.includes(query);
      var matchCat   = cat === 'All Categories' || cardCat === cat;

      card.closest('.col-sm-6, .col-lg-3, [class*="col-"]').style.display =
        (matchQuery && matchCat) ? '' : 'none';
    });
  }

  if (searchInput)    searchInput.addEventListener('input', runSearch);
  if (searchCategory) searchCategory.addEventListener('change', runSearch);
  var searchBtn = document.querySelector('.laf-search-btn');
  if (searchBtn)      searchBtn.addEventListener('click', runSearch);

});
