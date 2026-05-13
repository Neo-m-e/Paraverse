/**
 * Section: Hero Banner + User Profile Card
 * Lost and Found — FEU Tech
 */

"use strict";

document.addEventListener('DOMContentLoaded', function () {

  /* ── Hero: I Lost Something → navigate to form page ──── */
  var btnLost = document.getElementById('btn-i-lost-something');
  if (btnLost) {
    btnLost.addEventListener('click', function () {
      window.location.href = '/LAF/pages/lost-something/index.php';
    });
  }

  /* ── Hero: I Found Something → How to Surrender popup ── */
  var btnFound = document.getElementById('btn-i-found-something');
  if (btnFound) {
    btnFound.addEventListener('click', function () {
      lafShowModal('modalHowToSurrender');
    });
  }

});
