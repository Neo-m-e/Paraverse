/**
 * Section: How to Report + Lost Items Board
 * Lost and Found — FEU Tech
 */

"use strict";

document.addEventListener('DOMContentLoaded', function () {

  /* ── Lost board cards: "I Found This!" → popup ───────── */
  document.querySelectorAll('.btn-i-found').forEach(function (btn) {
    btn.addEventListener('click', function () {
      lafShowModal('modalHowToSurrender');
    });
  });

});
