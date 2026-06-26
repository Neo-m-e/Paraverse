(function ($) {
  'use strict';

  function highlightCode(code, lang) {
    var html = code
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;');
      
    var strings = [];
    var comments = [];
    
    if (lang === 'python') {
      html = html.replace(/&quot;&quot;&quot;([\s\S]*?)&quot;&quot;&quot;/g, function(match) {
        strings.push('<span class="hl-string">' + match + '</span>');
        return '___STR_PLACEHOLDER_' + (strings.length - 1) + '___';
      });
      html = html.replace(/&#039;&#039;&#039;([\s\S]*?)&#039;&#039;&#039;/g, function(match) {
        strings.push('<span class="hl-string">' + match + '</span>');
        return '___STR_PLACEHOLDER_' + (strings.length - 1) + '___';
      });
    }
    html = html.replace(/(["'])(?:\\.|[^\\])*?\1/g, function(match) {
      strings.push('<span class="hl-string">' + match + '</span>');
      return '___STR_PLACEHOLDER_' + (strings.length - 1) + '___';
    });
    
    if (lang === 'python') {
      html = html.replace(/#.*$/gm, function(match) {
        comments.push('<span class="hl-comment">' + match + '</span>');
        return '___COM_PLACEHOLDER_' + (comments.length - 1) + '___';
      });
    } else if (lang === 'php') {
      html = html.replace(/(\/\/|#).*$/gm, function(match) {
        comments.push('<span class="hl-comment">' + match + '</span>');
        return '___COM_PLACEHOLDER_' + (comments.length - 1) + '___';
      });
      html = html.replace(/\/\*[\s\S]*?\*\//g, function(match) {
        comments.push('<span class="hl-comment">' + match + '</span>');
        return '___COM_PLACEHOLDER_' + (comments.length - 1) + '___';
      });
    } else {
      html = html.replace(/\/\/.*$/gm, function(match) {
        comments.push('<span class="hl-comment">' + match + '</span>');
        return '___COM_PLACEHOLDER_' + (comments.length - 1) + '___';
      });
      html = html.replace(/\/\*[\s\S]*?\*\//g, function(match) {
        comments.push('<span class="hl-comment">' + match + '</span>');
        return '___COM_PLACEHOLDER_' + (comments.length - 1) + '___';
      });
    }

    var keywords = [];
    var types = [];
    var preprocessors = [];

    if (lang === 'cpp') {
      keywords = ['alignas', 'alignof', 'and', 'and_eq', 'asm', 'atomic_cancel', 'atomic_commit', 'atomic_noexcept', 'auto', 'bitand', 'bitor', 'break', 'case', 'catch', 'class', 'co_await', 'co_return', 'co_yield', 'compl', 'concept', 'const', 'consteval', 'constexpr', 'constinit', 'const_cast', 'continue', 'decltype', 'default', 'delete', 'do', 'dynamic_cast', 'else', 'enum', 'explicit', 'export', 'extern', 'false', 'for', 'friend', 'goto', 'if', 'inline', 'mutable', 'namespace', 'new', 'noexcept', 'not', 'not_eq', 'nullptr', 'operator', 'or', 'or_eq', 'private', 'protected', 'public', 'reflexpr', 'register', 'reinterpret_cast', 'requires', 'return', 'sizeof', 'static', 'static_assert', 'static_cast', 'struct', 'switch', 'synchronized', 'template', 'this', 'thread_local', 'throw', 'true', 'try', 'typedef', 'typeid', 'typename', 'union', 'using', 'virtual', 'volatile', 'while', 'xor', 'xor_eq'];
      types = ['bool', 'char', 'char8_t', 'char16_t', 'char32_t', 'double', 'float', 'int', 'long', 'short', 'signed', 'unsigned', 'void', 'wchar_t', 'size_t', 'string', 'vector', 'map', 'set'];
      preprocessors = ['#include', '#define', '#ifdef', '#ifndef', '#endif', '#if', '#else', '#elif'];
    } else if (lang === 'java') {
      keywords = ['abstract', 'assert', 'break', 'case', 'catch', 'class', 'const', 'continue', 'default', 'do', 'else', 'enum', 'extends', 'final', 'finally', 'for', 'goto', 'if', 'implements', 'import', 'instanceof', 'interface', 'native', 'new', 'package', 'private', 'protected', 'public', 'return', 'static', 'strictfp', 'super', 'switch', 'synchronized', 'this', 'throw', 'throws', 'transient', 'try', 'volatile', 'while', 'true', 'false', 'null'];
      types = ['boolean', 'byte', 'char', 'double', 'float', 'int', 'long', 'short', 'void', 'String', 'Object', 'List', 'ArrayList', 'Map', 'HashMap'];
    } else if (lang === 'python') {
      keywords = ['False', 'None', 'True', 'and', 'as', 'assert', 'async', 'await', 'break', 'class', 'continue', 'def', 'del', 'elif', 'else', 'except', 'finally', 'for', 'from', 'global', 'if', 'import', 'in', 'is', 'lambda', 'nonlocal', 'not', 'or', 'pass', 'raise', 'return', 'try', 'while', 'with', 'yield'];
      types = ['int', 'float', 'complex', 'str', 'list', 'tuple', 'range', 'dict', 'set', 'frozenset', 'bool', 'bytes', 'bytearray', 'memoryview'];
    } else if (lang === 'php') {
      keywords = ['__halt_compiler', 'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch', 'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final', 'finally', 'fn', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'isset', 'list', 'match', 'namespace', 'new', 'or', 'print', 'private', 'protected', 'public', 'require', 'require_once', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor', 'yield', 'yield from', 'true', 'false', 'null'];
      types = ['int', 'float', 'string', 'bool', 'array', 'object', 'iterable', 'resource', 'mixed', 'void'];
    } else {
      keywords = ['var', 'let', 'const', 'function', 'class', 'return', 'if', 'else', 'for', 'while', 'do', 'switch', 'case', 'break', 'continue', 'new', 'this', 'true', 'false', 'null'];
    }

    preprocessors.forEach(function(prep) {
      var escapedPrep = prep.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
      var regex = new RegExp('\\b' + escapedPrep + '\\b', 'g');
      html = html.replace(regex, '<span class="hl-preprocessor">' + prep + '</span>');
    });

    if (keywords.length > 0) {
      var keywordRegex = new RegExp('\\b(' + keywords.join('|') + ')\\b', 'g');
      html = html.replace(keywordRegex, '<span class="hl-keyword">$1</span>');
    }

    if (types.length > 0) {
      var typeRegex = new RegExp('\\b(' + types.join('|') + ')\\b', 'g');
      html = html.replace(typeRegex, '<span class="hl-type">$1</span>');
    }

    html = html.replace(/\b([a-zA-Z_][a-zA-Z0-9_]*)(?=\s*\()/g, '<span class="hl-function">$1</span>');
    html = html.replace(/\b(0x[a-fA-F0-9]+|\d+(\.\d+)?)\b/g, '<span class="hl-number">$1</span>');

    var tags = [];
    html = html.replace(/(<span[^>]*>|<\/span>|___STR_PLACEHOLDER_\d+___|___COM_PLACEHOLDER_\d+___)/g, function(match) {
      tags.push(match);
      return '___TAG_PLACEHOLDER_' + (tags.length - 1) + '___';
    });

    html = html.replace(/([+\-*\/=<>!%&|^~]+)/g, '<span class="hl-operator">$1</span>');

    html = html.replace(/___TAG_PLACEHOLDER_(\d+)___/g, function(match, idx) {
      return tags[idx];
    });

    html = html.replace(/___STR_PLACEHOLDER_(\d+)___/g, function(match, idx) {
      return strings[idx];
    });
    html = html.replace(/___COM_PLACEHOLDER_(\d+)___/g, function(match, idx) {
      return comments[idx];
    });

    return html;
  }

  function highlightAllCodeBlocks() {
    $('.dc-code-block').each(function() {
      var $block = $(this);
      if ($block.attr('contenteditable') === 'true') {
        return;
      }
      if ($block.attr('data-highlighted') === 'true') {
        return;
      }
      var lang = $block.attr('data-language') || 'general';
      var rawCode = $block.text();
      $block.html(highlightCode(rawCode, lang));
      $block.attr('data-highlighted', 'true');
    });
  }

  window.highlightCode = highlightCode;
  window.highlightAllCodeBlocks = highlightAllCodeBlocks;

  $(document).ready(function () {
    highlightAllCodeBlocks();

    // Upvote / Downvote event delegation
    $(document).on('click', '.dc-vote-up, .dc-vote-down', function (e) {
      e.preventDefault();
      var btn = $(this);
      var card = btn.closest('[data-dc="post-card"]');
      if (!card.length) return;

      var upBtn = card.find('.dc-vote-up');
      var downBtn = card.find('.dc-vote-down');
      var countEl = card.find('.dc-vote-count');
      if (!upBtn.length || !downBtn.length || !countEl.length) return;

      // Initialize base-count if not set
      var baseCount = card.data('base-count');
      if (baseCount === undefined) {
        baseCount = parseInt(countEl.text().replace(/,/g, ''), 10) || 0;
        card.data('base-count', baseCount);
      }

      var currentVote = card.data('current-vote') || null; // 'up', 'down', or null
      var isUpClick = btn.hasClass('dc-vote-up');

      if (isUpClick) {
        currentVote = (currentVote === 'up') ? null : 'up';
      } else {
        currentVote = (currentVote === 'down') ? null : 'down';
      }
      card.data('current-vote', currentVote);

      // Update UI count
      var display = baseCount;
      if (currentVote === 'up') display = baseCount + 1;
      if (currentVote === 'down') display = baseCount - 1;
      countEl.text(display.toLocaleString());

      // Update button classes and icons
      if (currentVote === 'up') {
        upBtn.addClass('text-success');
        upBtn.find('i').attr('class', 'bi bi-hand-thumbs-up-fill p-0');
      } else {
        upBtn.removeClass('text-success');
        upBtn.find('i').attr('class', 'bi bi-hand-thumbs-up p-0');
      }

      if (currentVote === 'down') {
        downBtn.addClass('text-danger');
        downBtn.find('i').attr('class', 'bi bi-hand-thumbs-down-fill p-0');
      } else {
        downBtn.removeClass('text-danger');
        downBtn.find('i').attr('class', 'bi bi-hand-thumbs-down p-0');
      }
    });

    // ── Poll Engine Event Delegation ─────────────────────────
    $(document).on('click', '.discourse-poll-option', function () {
      const container = this.closest('.discourse-poll-options');
      if (!container) return;

      $(container).find('.discourse-poll-option').removeClass('selected');
      $(this).addClass('selected');
      $(container).addClass('show-results');
    });

  });

  // ── Post card: Comment / Share / Save ─────────────────────
  (function () {
    var feedToast = document.getElementById('dc-feed-toast');

    function showFeedToast(msg) {
      if (!feedToast) return;
      $(feedToast).find('span').text(msg);
      $(feedToast).css('display', 'flex');
      clearTimeout(window._dcFeedToast);
      window._dcFeedToast = setTimeout(function () { $(feedToast).css('display', 'none'); }, 2200);
    }

    // Comment — toggle quick comment drawer
    $(document).on('click', '.dc-post-comment', function (e) {
      e.preventDefault();
      var $card = $(this).closest('[data-dc="post-card"]');
      var $drawer = $card.find('.dc-quick-comment-drawer');
      if ($drawer.length) {
        $drawer.slideToggle(200);
        var $input = $drawer.find('input[type="text"]');
        if ($input.length) $input.focus();
      }
    });

    // Handle quick comment submission
    $(document).on('submit', '.dc-quick-comment-form', function(e) {
      e.preventDefault();
      var $form = $(this);
      var $input = $form.find('input[type="text"]');
      var commentText = $input.val().trim();
      var $postIdInput = $form.find('input[name="post_id"]');
      var postId = $postIdInput.length ? $postIdInput.val() : '';
      if (!commentText || !postId) return;

      var $card = $form.closest('[data-dc="post-card"]');
      var $commentsList = $card.find('.dc-quick-comments-list');
      var $commentCountBtn = $card.find('.dc-post-comment');

      function escapeHtml(text) {
        return text
          .replace(/&/g, "&amp;")
          .replace(/</g, "&lt;")
          .replace(/>/g, "&gt;")
          .replace(/"/g, "&quot;")
          .replace(/'/g, "&#039;");
      }

      var avatar = window.currentUser ? window.currentUser.avatar : '/Discourse/assets/images/anonymous.png';
      var displayName = window.currentUser ? window.currentUser.displayName : 'You';
      
      var newCommentHtml = `
        <div class="d-flex align-items-start gap-2 fs-7 animate__animated animate__fadeIn">
          <img src="${avatar}" class="h-25px w-25px rounded-circle" alt="User avatar">
          <div class="bg-light p-2 rounded-3 flex-grow-1">
            <div class="d-flex justify-content-between">
              <span class="fw-bold text-gray-800">${displayName}</span>
              <span class="text-muted fs-9">just now</span>
            </div>
            <p class="text-gray-700 m-0 mt-1">${escapeHtml(commentText)}</p>
          </div>
        </div>
      `;
      
      if ($commentsList.length) {
        $commentsList.append(newCommentHtml);
        $commentsList.scrollTop($commentsList[0].scrollHeight);
      }

      $input.val('');

      if ($commentCountBtn.length) {
        var countText = $commentCountBtn.text().replace(/Comments?/g, '').trim();
        var count = parseInt(countText, 10) || 0;
        count++;
        $commentCountBtn.html('<i class="bi bi-chat me-1"></i> ' + count + (count === 1 ? ' Comment' : ' Comments'));
      }

      showFeedToast('Comment posted!');
      if (typeof highlightAllCodeBlocks === 'function') {
        highlightAllCodeBlocks();
      }
    });

    // Share — copy URL, brief blue highlight, toast
    $(document).on('click', '.dc-post-share', function (e) {
      e.preventDefault();
      var $btn = $(this);
      var $card = $btn.closest('[data-dc="post-card"]');
      var $titleLink = $card.find('a.dc-post-title-link');
      var url = $titleLink.length && $titleLink.attr('href') ? $titleLink.prop('href') : window.location.href;
      try { navigator.clipboard.writeText(url); } catch (err) {}
      $btn.css('color', '#0d6efd');
      setTimeout(function () { $btn.css('color', ''); }, 2000);
      showFeedToast('Link copied!');
    });

    // Save — toggle bookmark state, toast on save
    $(document).on('click', '.dc-post-save', function(e) {
      e.preventDefault();
      var $btn = $(this);
      var $card = $btn.closest('[data-dc="post-card"]');
      if (!$card.length) return;
      var postId = $card.attr('data-post-id');
      if (!postId) return;

      var saved = $btn.attr('data-on') !== '1';
      $btn.attr('data-on', saved ? '1' : '0');
      $btn.html(saved
        ? '<i class="bi bi-bookmark-fill me-1"></i> Saved'
        : '<i class="bi bi-bookmark me-1"></i> Save');
      
      showFeedToast(saved ? 'Post saved!' : 'Post unsaved!');
    });

    // Check for URL status parameters on load
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'success') {
      showFeedToast('Post created successfully!');
      window.history.replaceState({}, document.title, window.location.pathname);
    } else if (urlParams.get('status') === 'error') {
      alert('Failed to create post. Please try again.');
      window.history.replaceState({}, document.title, window.location.pathname);
    }
  })();

  (function() {
    function initSeeMore() {
      $('.dc-body-clamp').each(function() {
        var $span = $(this);
        var $link = $span.next('.dc-see-more-link');
        if (!$link.length) return;
        // Only show link if content overflows 3 lines
        if ($span[0].scrollHeight > $span[0].clientHeight + 2) {
          $link.removeClass('d-none');
        }
      });
    }
    if (document.readyState === 'loading') {
      $(document).on('DOMContentLoaded', initSeeMore);
    } else {
      initSeeMore();
    }
  })();

  window.dcToggleBody = function (e, link) {
    e.preventDefault();
    var $link = $(link);
    var $span = $link.prev('.dc-body-clamp');
    if (!$span.length) return;
    var expanded = $span.toggleClass('dc-expanded').hasClass('dc-expanded');
    $link.text(expanded ? 'See Less' : 'See More');
  };

})(jQuery);
