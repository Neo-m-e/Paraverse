(function ($) {
  'use strict';

  $(document).ready(function () {
    // Init Bootstrap tooltips if any
    $('[data-bs-toggle="tooltip"]').each(function () {
      new bootstrap.Tooltip(this);
    });

    console.log('[Discourse] Dashboard initialized.');
  });
})(jQuery);

/* ── View-post: comment interactions ── */
function dcInitViewPost() {
  $('.dc-comment-like').on('click', function () {
    var $btn = $(this);
    var $bubble = $btn.closest('.bg-light');
    var $dislike = $bubble.find('.dc-comment-dislike');
    var on = $btn.toggleClass('text-success').hasClass('text-success');
    $btn.find('i').attr('class', on ? 'bi bi-hand-thumbs-up-fill' : 'bi bi-hand-thumbs-up');
    if (on) {
      $dislike.removeClass('text-danger');
      $dislike.find('i').attr('class', 'bi bi-hand-thumbs-down');
    }
  });

  $('.dc-comment-dislike').on('click', function () {
    var $btn = $(this);
    var $bubble = $btn.closest('.bg-light');
    var $like = $bubble.find('.dc-comment-like');
    var on = $btn.toggleClass('text-danger').hasClass('text-danger');
    $btn.find('i').attr('class', on ? 'bi bi-hand-thumbs-down-fill' : 'bi bi-hand-thumbs-down');
    if (on) {
      $like.removeClass('text-success');
      $like.find('i').attr('class', 'bi bi-hand-thumbs-up');
    }
  });

  $('.dc-reply-btn').on('click', function () {
    var $box = $(this).closest('.bg-light').find('.dc-reply-box');
    $box.toggleClass('d-none');
    if (!$box.hasClass('d-none')) {
      $box.find('textarea').focus();
    }
  });

  $('.dc-reply-cancel').on('click', function () {
    $(this).closest('.dc-reply-box').addClass('d-none');
  });

  var anonAvatar = '/Discourse/assets/images/anonymous.png';
  $('.dc-anon-toggle').on('change', function () {
    var $cb = $(this);
    var $row = $cb.closest('.d-flex.gap-3');
    var $avatarImg = $row.find('img');
    var originalSrc = $avatarImg.data('original-src');
    if (!originalSrc) {
      originalSrc = $avatarImg.attr('src') || '';
      $avatarImg.data('original-src', originalSrc);
    }
    if ($avatarImg.length) {
      $avatarImg.attr('src', $cb.is(':checked') ? anonAvatar : originalSrc);
    }
  });
}

/* ── View-post: post action buttons ── */
function dcInitPostActions() {
  var $likeBtn = $('#postLikeBtn');
  var $dislikeBtn = $('#postDislikeBtn');
  var $saveBtn = $('#postSaveBtn');
  var $toast = $('#dc-toast');

  function showToast(msg) {
    if (!$toast.length) return;
    $toast.find('span').text(msg);
    $toast.css('display', 'flex');
    clearTimeout(window._dcToast);
    window._dcToast = setTimeout(function () { $toast.css('display', 'none'); }, 2200);
  }

  if ($likeBtn.length) {
    $likeBtn.on('click', function () {
      var liked = $likeBtn.attr('data-on') === '1';
      liked = !liked;
      $likeBtn.attr('data-on', liked ? '1' : '0');
      if (liked && $dislikeBtn.length) {
        $dislikeBtn.attr('data-on', '0');
        $dislikeBtn.css('cssText', '');
        $dislikeBtn.find('i').attr('class', 'bi bi-hand-thumbs-down');
        if ($dislikeBtn.find('span').length) {
          $dislikeBtn.html('<i class="bi bi-hand-thumbs-down"></i> Dislike');
        }
      }
      $likeBtn.css('cssText', liked ? 'background:rgba(23,198,112,.15);color:#17c671;border-color:#17c671;' : '');
      $likeBtn.find('i').attr('class', liked ? 'bi bi-hand-thumbs-up-fill' : 'bi bi-hand-thumbs-up');
    });
  }

  if ($dislikeBtn.length) {
    $dislikeBtn.on('click', function () {
      var on = $dislikeBtn.attr('data-on') === '1';
      on = !on;
      $dislikeBtn.attr('data-on', on ? '1' : '0');
      if (on && $likeBtn.length) {
        $likeBtn.attr('data-on', '0');
        $likeBtn.css('cssText', '');
        $likeBtn.find('i').attr('class', 'bi bi-hand-thumbs-up');
      }
      $dislikeBtn.css('cssText', on ? 'background:rgba(220,53,69,.12);color:#dc3545;border-color:#dc3545;' : '');
      $dislikeBtn.find('i').attr('class', on ? 'bi bi-hand-thumbs-down-fill' : 'bi bi-hand-thumbs-down');
    });
  }

  if ($saveBtn.length) {
    $saveBtn.on('click', function () {
      var on = $saveBtn.attr('data-on') === '1';
      on = !on;
      $saveBtn.attr('data-on', on ? '1' : '0');
      $saveBtn.css('cssText', on ? 'background:rgba(13,110,253,.12);color:#0d6efd;border-color:#0d6efd;' : '');
      $saveBtn.html(on
        ? '<i class="bi bi-bookmark-fill"></i> Saved'
        : '<i class="bi bi-bookmark"></i> Save');
      if (on) showToast('Saved!');
    });
  }

  var $shareBtn = $('#postShareBtn');
  if (!$shareBtn.length) {
    $shareBtn = $('.btn[onclick*="clipboard"]');
  }
  $('.btn[onclick*="clipboard"]').each(function () {
    var $btn = $(this);
    $btn.removeAttr('onclick');
    $btn.on('click', function () {
      try { navigator.clipboard.writeText(window.location.href); } catch (e) {}
      $btn.css('color', '#0d6efd');
      setTimeout(function () { $btn.css('color', ''); }, 2000);
      showToast('Link copied!');
    });
  });
}

/* ── View-post: See More / See Less ── */
function dcInitPostBody() {
  $('.dc-post-body-wrap').each(function () {
    var $wrap = $(this);
    var $textDiv = $wrap.find('.dc-body-text');
    var $link = $wrap.find('.dc-see-more-link');
    if (!$textDiv.length || !$link.length) return;
    if ($textDiv[0].scrollHeight > $textDiv[0].clientHeight + 2) {
      $link.removeClass('d-none');
    }
  });
}

function dcTogglePostBody(e, link) {
  e.preventDefault();
  var $link = $(link);
  var $wrap = $link.closest('.dc-post-body-wrap');
  var $textDiv = $wrap.find('.dc-body-text');
  if (!$textDiv.length) return;
  var expanded = $textDiv.toggleClass('dc-expanded').hasClass('dc-expanded');
  $link.text(expanded ? 'See Less' : 'See More');
}

$(document).ready(function () {
  if ($('.dc-post-body-wrap').length) {
    dcInitViewPost();
    dcInitPostActions();
    dcInitPostBody();
  }
});
