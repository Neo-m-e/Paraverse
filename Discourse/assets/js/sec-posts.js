/**
 * DISCOURSE — Posts Feed JS
 * File: assets/js/sec-posts.js
 */

(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    // ── Vote Core Processing Engine Modules ──
    document.querySelectorAll('.discourse-post-card').forEach(function (card) {
      const upBtn    = card.querySelector('.discourse-vote-up');
      const downBtn  = card.querySelector('.discourse-vote-down');
      const countEl  = card.querySelector('.discourse-vote-count');

      if (!upBtn || !downBtn || !countEl) return;

      let currentVote = null; 
      let baseCount   = parseInt(countEl.textContent.replace(/,/g, ''), 10) || 0;

      function updateDisplay () {
        let display = baseCount;
        if (currentVote === 'up')   display = baseCount + 1;
        if (currentVote === 'down') display = baseCount - 1;

        countEl.textContent = display.toLocaleString();

        if (currentVote === 'up') {
          upBtn.classList.add('text-success');
          upBtn.querySelector('i').className = 'bi bi-hand-thumbs-up-fill fs-5';
        } else {
          upBtn.classList.remove('text-success');
          upBtn.querySelector('i').className = 'bi bi-hand-thumbs-up fs-5';
        }

        if (currentVote === 'down') {
          downBtn.classList.add('text-danger');
          downBtn.querySelector('i').className = 'bi bi-hand-thumbs-down-fill fs-5';
        } else {
          downBtn.classList.remove('text-danger');
          downBtn.querySelector('i').className = 'bi bi-hand-thumbs-down fs-5';
        }
      }

      upBtn.addEventListener('click', function (e) {
        e.preventDefault();
        currentVote = currentVote === 'up' ? null : 'up';
        updateDisplay();
      });

      downBtn.addEventListener('click', function (e) {
        e.preventDefault();
        currentVote = currentVote === 'down' ? null : 'down';
        updateDisplay();
      });
    });

    // ── Poll selection engine tracking ──
    document.querySelectorAll('[data-poll-id]').forEach(function (option) {
      option.addEventListener('click', function (e) {
        e.preventDefault();
        const pollId = this.dataset.pollId;

        document.querySelectorAll('[data-poll-id="' + pollId + '"]').forEach(function (opt) {
          opt.classList.remove('selected');
        });

        this.classList.add('selected');
      });
    });

  });
})();