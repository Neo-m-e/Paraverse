/**
 * Lost and Found — Custom Scripts
 * FEU Tech · Educational Innovation and Technology Hub
 */

"use strict";

/* ── Utility: show a Bootstrap modal by ID ──────────────── */
function lafShowModal(id) {
  var el = document.getElementById(id);
  if (!el) return;
  bootstrap.Modal.getOrCreateInstance(el).show();
}

/* ── Privacy localStorage helpers ───────────────────────── */
/* key: "laf_privacy_{itemId}_{field}"  value: "shown" | "hidden" */
function lafGetPrivacy(itemId, field) {
  try { return localStorage.getItem('laf_privacy_' + itemId + '_' + field) || 'hidden'; }
  catch(e) { return 'hidden'; }
}
function lafSetPrivacy(itemId, field, state) {
  try { localStorage.setItem('laf_privacy_' + itemId + '_' + field, state); }
  catch(e) {}
}

/* ── Cascading Location Data ─────────────────────────────── */
var FEUTech_placeOptions = {
  "1st Floor":  ["Parking", "TAMbayan"],
  "2nd Floor":  ["Student Plaza"],
  "3rd Floor":  ["Pool", "Gym", "Comfort Room"],
  "4th Floor":  ["Study Area", "Room", "Comfort Room", "Hallway", "Stairs"],
  "5th Floor":  ["Study Area", "Room", "Comfort Room", "Hallway", "Stairs"],
  "6th Floor":  ["Study Area", "Room", "Comfort Room", "Hallway", "Stairs"],
  "7th Floor":  ["Room", "Comfort Room", "Hallway", "Stairs"],
  "8th Floor":  ["Canteen", "Associate Lounge"],
  "9th Floor":  ["Study Area", "Room", "Comfort Room", "Hallway", "Stairs"],
  "10th Floor": ["Room", "Comfort Room", "Hallway", "Stairs"],
  "11th Floor": ["Room", "Comfort Room", "Hallway", "Stairs", "Study Area", "Student Lounge"],
  "12th Floor": ["Room", "Comfort Room", "Hallway", "Stairs"],
  "14th Floor": ["Library", "Discussion Room", "Mathematics Resource Center (MRC)", "English Resource Center (ERC)", "Comfort Room", "Hallway", "Stairs"],
  "15th Floor": ["Room", "Comfort Room", "Hallway", "Stairs"],
  "16th Floor": ["Room", "Comfort Room", "Hallway", "Stairs"],
  "17th Floor": [],
};

var FEUTech_roomRanges = {
  "4th Floor":  [401, 412],
  "5th Floor":  [501, 511],
  "6th Floor":  [601, 612],
  "7th Floor":  [701, 713],
  "9th Floor":  [901, 912],
  "10th Floor": [1001, 1013],
  "11th Floor": [1101, 1112],
  "12th Floor": [1201, 1212],
  "15th Floor": [1501, 1511],
  "16th Floor": [1601, 1611],
};

document.addEventListener('DOMContentLoaded', function () {

  /* ══════════════════════════════════════════════════════
     DASHBOARD: apply privacy state to surrendered cards
     Each card has data-item-id and cells with dash-floor,
     dash-time, dash-by classes + data-real attribute.
  ══════════════════════════════════════════════════════ */
  document.querySelectorAll('.laf-item-card[data-item-id]').forEach(function (card) {
    var itemId = card.getAttribute('data-item-id');

    var fieldMap = [
      { cls: 'dash-floor', field: 'floor'        },
      { cls: 'dash-time',  field: 'time'         },
      { cls: 'dash-by',    field: 'surrendered_by'},
    ];

    fieldMap.forEach(function (f) {
      var cell = card.querySelector('.' + f.cls);
      if (!cell) return;
      var real  = cell.getAttribute('data-real') || '';
      var state = lafGetPrivacy(itemId, f.field);
      if (state === 'shown') {
        var emoji = cell.textContent.trim().charAt(0); /* 📍 🕐 👤 */
        cell.textContent = emoji + ' ' + real;
      }
      /* if hidden, leave the ●● dots that are already in the HTML */
    });
  });

  /* ══════════════════════════════════════════════════════
     ITEM-DETAILS PAGE: eye toggle + save to localStorage
  ══════════════════════════════════════════════════════ */
  var container = document.querySelector('.app-container[data-item-id]');
  var itemId    = container ? container.getAttribute('data-item-id') : null;

  document.querySelectorAll('.btn-eye').forEach(function (btn) {
    var targetId = btn.getAttribute('data-target');
    var field    = btn.getAttribute('data-field');
    var realVal  = btn.getAttribute('data-real');
    var span     = document.getElementById(targetId);
    if (!span) return;

    /* store original dots on first load */
    if (!span.dataset.dots) span.dataset.dots = span.textContent.trim();

    /* apply saved state on page load */
    var saved = itemId ? lafGetPrivacy(itemId, field) : 'hidden';
    applyState(span, btn, realVal, saved);

    btn.addEventListener('click', function () {
      var current = span.dataset.state || 'hidden';
      var next    = current === 'hidden' ? 'shown' : 'hidden';
      applyState(span, btn, realVal, next);
      if (itemId) lafSetPrivacy(itemId, field, next);
    });
  });

  function applyState(span, btn, realVal, state) {
    span.dataset.state = state;
    if (state === 'shown') {
      span.textContent = realVal;
      btn.innerHTML = '<i class="bi bi-eye"></i>';
      btn.title = 'Click to hide from dashboard';
    } else {
      span.textContent = span.dataset.dots || '●●●●●●●●';
      btn.innerHTML = '<i class="bi bi-eye-slash"></i>';
      btn.title = 'Click to show on dashboard';
    }
  }

  /* ══════════════════════════════════════════════════════
     HERO BUTTONS
  ══════════════════════════════════════════════════════ */
  var btnLost = document.getElementById('btn-i-lost-something');
  if (btnLost) {
    btnLost.addEventListener('click', function () {
      window.location.href = 'pages/lost-something/index.php';
    });
  }

  var btnFound = document.getElementById('btn-i-found-something');
  if (btnFound) {
    btnFound.addEventListener('click', function () {
      lafShowModal('modalHowToSurrender');
    });
  }

  /* ══════════════════════════════════════════════════════
     MODAL TRIGGERS
  ══════════════════════════════════════════════════════ */
  document.querySelectorAll('.btn-how-to-claim').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      lafShowModal('modalHowToClaim');
    });
  });

  document.querySelectorAll('.btn-i-found').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      lafShowModal('modalHowToSurrender');
    });
  });

  var btnMine = document.getElementById('btn-this-is-mine');
  if (btnMine) btnMine.addEventListener('click', function () { lafShowModal('modalHowToClaim'); });

  var btnFoundDetail = document.getElementById('btn-i-found-detail');
  if (btnFoundDetail) btnFoundDetail.addEventListener('click', function () { lafShowModal('modalHowToSurrender'); });

  /* ══════════════════════════════════════════════════════
     SEARCH BAR
  ══════════════════════════════════════════════════════ */
  var searchInput    = document.getElementById('search-input');
  var searchCategory = document.getElementById('search-category');

  function runSearch() {
    var query = searchInput ? searchInput.value.toLowerCase().trim() : '';
    var cat   = searchCategory ? searchCategory.value : 'All Categories';

    document.querySelectorAll('.laf-item-card').forEach(function (card) {
      var name    = (card.querySelector('.item-name')?.textContent || '').toLowerCase();
      var floor   = (card.querySelector('.item-meta')?.textContent || '').toLowerCase();
      var cardCat = (card.querySelector('.badge-laf-cat')?.textContent || '').trim();
      var ok = (!query || name.includes(query) || floor.includes(query))
            && (cat === 'All Categories' || cardCat === cat);
      card.style.display = ok ? '' : 'none';
    });

    document.querySelectorAll('.laf-lost-card').forEach(function (card) {
      var name    = (card.querySelector('.lost-title')?.textContent || '').toLowerCase();
      var floor   = (card.querySelector('.lost-meta')?.textContent || '').toLowerCase();
      var cardCat = (card.querySelector('.badge-laf-cat')?.textContent || '').trim();
      var ok = (!query || name.includes(query) || floor.includes(query))
            && (cat === 'All Categories' || cardCat === cat);
      card.style.display = ok ? '' : 'none';
    });
  }

  if (searchInput)    searchInput.addEventListener('input', runSearch);
  if (searchCategory) searchCategory.addEventListener('change', runSearch);
  var searchBtn = document.querySelector('.laf-search-btn');
  if (searchBtn) searchBtn.addEventListener('click', runSearch);

  /* ══════════════════════════════════════════════════════
     LOST SOMETHING FORM — Cascading Location Dropdowns
  ══════════════════════════════════════════════════════ */
  var floorSel  = document.getElementById('loc-floor');
  var areaSel   = document.getElementById('loc-area');
  var roomSel   = document.getElementById('loc-room');
  var areaWrap  = document.getElementById('loc-area-wrap');
  var roomWrap  = document.getElementById('loc-room-wrap');
  var locHidden = document.getElementById('item-location');

  if (floorSel) {
    /* Populate floor options */
    Object.keys(FEUTech_placeOptions).forEach(function (floor) {
      var opt = document.createElement('option');
      opt.value = floor;
      opt.textContent = floor;
      floorSel.appendChild(opt);
    });

    function updateLocationHidden() {
      var f = floorSel.value;
      var a = (areaWrap.style.display !== 'none') ? areaSel.value : '';
      var r = (roomWrap.style.display  !== 'none') ? roomSel.value  : '';
      if (locHidden) locHidden.value = [f, a, r].filter(Boolean).join(', ');
    }

    floorSel.addEventListener('change', function () {
      var floor = this.value;
      var areas = FEUTech_placeOptions[floor] || [];

      /* Reset area + room */
      areaSel.innerHTML = '<option value="">Select Area</option>';
      roomSel.innerHTML = '<option value="">Select Room</option>';
      areaWrap.style.display = 'none';
      areaSel.required = false;
      roomWrap.style.display = 'none';
      roomSel.required = false;

      if (floor && areas.length > 0) {
        areas.forEach(function (area) {
          var opt = document.createElement('option');
          opt.value = area;
          opt.textContent = area;
          areaSel.appendChild(opt);
        });
        areaWrap.style.display = '';
        areaSel.required = true;
      }
      updateLocationHidden();
    });

    areaSel.addEventListener('change', function () {
      var floor = floorSel.value;
      var area  = this.value;

      /* Reset room */
      roomSel.innerHTML = '<option value="">Select Room</option>';
      roomWrap.style.display = 'none';
      roomSel.required = false;

      if (area === 'Room' && FEUTech_roomRanges[floor]) {
        var range = FEUTech_roomRanges[floor];
        for (var n = range[0]; n <= range[1]; n++) {
          var opt = document.createElement('option');
          opt.value = 'Room ' + n;
          opt.textContent = 'Room ' + n;
          roomSel.appendChild(opt);
        }
        roomWrap.style.display = '';
        roomSel.required = true;
      }
      updateLocationHidden();
    });

    roomSel.addEventListener('change', updateLocationHidden);
  }

  /* ══════════════════════════════════════════════════════
     LOST SOMETHING FORM — View Details Summary
  ══════════════════════════════════════════════════════ */
  var btnSummary = document.getElementById('btn-view-summary');
  if (btnSummary) {
    btnSummary.addEventListener('click', function (e) {
      e.preventDefault();
      var itemName = document.getElementById('item-name')?.value?.trim()    || '—';
      var category = document.getElementById('item-category')?.value         || '—';
      var location = document.getElementById('item-location')?.value?.trim() || '—';
      var dateSeen = document.getElementById('item-date')?.value              || '—';
      var timeSeen = document.getElementById('item-time')?.value              || '—';

      var setVal = function (id, v) { var el = document.getElementById(id); if (el) el.textContent = v; };
      setVal('review-item',     itemName);
      setVal('review-category', category);
      setVal('review-location', location);
      setVal('review-datetime', dateSeen + (timeSeen !== '—' ? ' · ' + timeSeen : ''));
      setVal('review-reporter', document.getElementById('reporter-name')?.textContent?.trim() || 'You');

      lafShowModal('modalConfirmDetails');
    });
  }

  var btnSubmit = document.getElementById('btn-submit-report');
  if (btnSubmit) {
    btnSubmit.addEventListener('click', function () {
      var m = bootstrap.Modal.getInstance(document.getElementById('modalConfirmDetails'));
      if (m) m.hide();
      alert('Your lost report has been submitted! You will be notified if a match is found.');
    });
  }

  /* ══════════════════════════════════════════════════════
     UPLOAD ZONE
  ══════════════════════════════════════════════════════ */
  var uploadZone = document.getElementById('upload-zone');
  var fileInput  = document.getElementById('item-photo');
  if (uploadZone && fileInput) {
    uploadZone.addEventListener('click', function (e) {
      if (e.target.tagName !== 'A') fileInput.click();
    });
    uploadZone.addEventListener('dragover',  function (e) { e.preventDefault(); uploadZone.style.borderColor = 'var(--laf-purple)'; });
    uploadZone.addEventListener('dragleave', function ()  { uploadZone.style.borderColor = '#c8c7e8'; });
    uploadZone.addEventListener('drop', function (e) {
      e.preventDefault(); uploadZone.style.borderColor = '#c8c7e8';
      fileInput.files = e.dataTransfer.files; handleFilePreview(fileInput);
    });
    fileInput.addEventListener('change', function () { handleFilePreview(fileInput); });
  }

  function handleFilePreview(input) {
    if (!input.files || !input.files[0]) return;
    var reader = new FileReader();
    reader.onload = function (e) {
      var preview = document.getElementById('upload-preview');
      if (preview) { preview.src = e.target.result; preview.style.display = 'block'; }
      var icon  = document.getElementById('upload-icon');  if (icon)  icon.style.display  = 'none';
      var label = document.getElementById('upload-label'); if (label) label.textContent = input.files[0].name;
    };
    reader.readAsDataURL(input.files[0]);
  }

});