(function ($) {
  'use strict';

  $(document).ready(function () {

    // ── Mark all notifications read ─────────────────────────
    const $markAllBtn = $('#discourse-mark-all-read');
    if ($markAllBtn.length) {
      $markAllBtn.on('click', function () {
        $('.discourse-notif-unread').each(function () {
          var $item = $(this);
          $item.removeClass('discourse-notif-unread');
          var $dot = $item.find('.discourse-notif-dot');
          if ($dot.length) {
            $dot.addClass('discourse-notif-dot-read');
          }
        });
        $markAllBtn.css('opacity', '0.4').prop('disabled', true);
      });
    }

    // ── Report modal — selectable options ───────────────────
    const $reportOptions = $('.discourse-report-option');
    $reportOptions.on('click', function () {
      $reportOptions.removeClass('discourse-report-option-active');
      $(this).addClass('discourse-report-option-active');
    });

    // ── Report submit feedback ──────────────────────────────
    const $reportSubmit = $('#discourseReportSubmit');
    if ($reportSubmit.length) {
      $reportSubmit.on('click', function () {
        const $selected = $('.discourse-report-option-active');
        const reason = $selected.length ? $selected.attr('data-option') : 'unknown';

        console.log('[Discourse] Report submitted. Reason:', reason);

        // Swap button text briefly then close modal
        $reportSubmit.html('<i class="bi bi-check-circle me-2"></i> Report Submitted!').css('background', '#388e3c');

        setTimeout(function () {
          const reportModalEl = $('#modalReportPost')[0];
          const modal = reportModalEl ? bootstrap.Modal.getInstance(reportModalEl) : null;
          if (modal) modal.hide();

          // Reset button after hide
          setTimeout(function () {
            $reportSubmit.html('<i class="bi bi-send me-2"></i> Submit Report').css('background', '');
          }, 400);
        }, 1000);
      });
    }

    // ── Reset report modal state on close ──────────────────
    const $reportModal = $('#modalReportPost');
    const $reportOtherText = $('#discourseReportOtherText');
    if ($reportModal.length) {
      $reportModal.on('hidden.bs.modal', function () {
        $reportOptions.each(function (i) {
          $(this).toggleClass('discourse-report-option-active', i === 0);
        });
        if ($reportOtherText.length) {
          $reportOtherText.hide().val('');
        }
      });
    }

  });

  // Delegated or document level actions
  $(document).on('click', '.discourse-report-option', function () {
    const $option = $(this);
    const $reportOptions = $('.discourse-report-option');
    const $reportOtherText = $('#discourseReportOtherText');

    $reportOptions.removeClass('discourse-report-option-active');
    $option.addClass('discourse-report-option-active');

    if ($reportOtherText.length) {
      if ($option.attr('data-option') === 'other') {
        $reportOtherText.show().focus();
      } else {
        $reportOtherText.hide().val('');
      }
    }
  });

})(jQuery);