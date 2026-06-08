<?php



define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

$META_TITLE = "Sliding Puzzle";
$META_DESC  = "Paraverse 3×3 Sliding Puzzle — FEU Institute of Technology EdITH";
$logoPath   = "assets/images/paraverse.svg";
$hasLogo    = file_exists($logoPath);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($META_TITLE) ?> — Paraverse</title>
  <meta name="description" content="<?= htmlspecialchars($META_DESC) ?>">

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;900&family=Exo+2:wght@400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 overflow-hidden">

  <div class="puzzle-card d-flex flex-column align-items-center gap-4 p-4 p-md-5 rounded-4 position-relative">

    <!-- Brand -->
    <div class="d-flex flex-column align-items-center gap-2">
      <div class="logo-wrap d-flex align-items-center justify-content-center rounded-3 overflow-hidden"
        style="width:68px;height:68px;background:linear-gradient(135deg,#2A1C5A,#3C2166);border:1.5px solid rgba(139,111,255,.3);">
        <?php if ($hasLogo): ?>
          <img src="<?= htmlspecialchars($logoPath) ?>" alt="Paraverse Logo" width="46" height="46" style="object-fit:contain;">
        <?php else: ?>
          <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg" width="46" height="46">
            <circle cx="22" cy="22" r="20" stroke="#8B6FFF" stroke-width="1.5" stroke-dasharray="4 2" />
            <polygon points="22,6 27,16 38,16 30,24 33,35 22,29 11,35 14,24 6,16 17,16"
              fill="none" stroke="#B8A3FF" stroke-width="1.2" stroke-linejoin="round" />
            <circle cx="22" cy="22" r="3.5" fill="#8B6FFF" />
          </svg>
        <?php endif; ?>
      </div>

      <p class="mb-0 text-uppercase text-white fw-bold"
        style="font-family:'Orbitron',sans-serif;font-size:.92rem;letter-spacing:.26em;">
        Paraverse
      </p>
      <p class="mb-0 text-uppercase"
        style="font-family:'Exo 2',sans-serif;font-size:.67rem;letter-spacing:.14em;color:rgba(237,232,255,.35);">
        FEU Institute of Technology &middot; EdITH
      </p>
    </div>

    <!-- Divider -->
    <div class="w-100" style="height:1px;background:linear-gradient(90deg,transparent,rgba(139,111,255,.3),transparent);"></div>

    <!-- Grid shell -->
    <div class="grid-shell position-relative rounded-3 p-2">
      <div id="puzzle-grid" class="puzzle-grid position-relative" role="grid" aria-label="3 by 3 sliding puzzle"></div>

      <!-- Solved overlay -->
      <div id="solved-overlay"
        class="solved-overlay position-absolute top-0 start-0 w-100 h-100 rounded-3
                  d-flex flex-column align-items-center justify-content-center gap-3"
        aria-live="polite">
        <span style="font-size:3.2rem;filter:drop-shadow(0 0 12px #5DFFB0);">✦</span>
        <p class="mb-0 fw-black text-uppercase"
          style="font-family:'Orbitron',sans-serif;font-size:1.25rem;letter-spacing:.22em;
                  background:linear-gradient(135deg,#5DFFB0,#A0FFC8);-webkit-background-clip:text;
                  -webkit-text-fill-color:transparent;background-clip:text;
                  filter:drop-shadow(0 0 16px rgba(93,255,176,.6));">Puzzle Solved!</p>
        <p id="solved-moves" class="mb-0"
          style="font-family:'Exo 2',sans-serif;font-size:.85rem;letter-spacing:.1em;color:rgba(237,232,255,.85);"></p>
        <p id="solved-time" class="mb-0"
          style="font-family:'Exo 2',sans-serif;font-size:.85rem;letter-spacing:.1em;color:rgba(237,232,255,.6);"></p>
        <button id="btn-play-again" type="button" class="btn-pv mt-1">
          Play Again
        </button>
      </div>
    </div>

    <!-- Timer + Moves row — hidden until game starts -->
    <div id="puzzle-controls" class="d-flex align-items-center justify-content-between w-100 gap-3" style="display:none!important;">
      <div class="d-flex flex-column gap-1">
        <span class="stat-label">Moves</span>
        <span id="move-count" class="stat-value">0</span>
      </div>
      <div class="d-flex flex-column align-items-center gap-1">
        <span class="stat-label">Time</span>
        <span id="timer-count" class="stat-value" style="min-width:5ch;">00:00</span>
      </div>
      <!-- Sound toggle -->
      <button id="btn-sound" type="button" aria-label="Toggle sound" class="btn-icon-pv">
        <svg class="icon-sound-on" width="16" height="16" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
          <path d="M19.07 4.93a10 10 0 0 1 0 14.14"></path>
          <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
        </svg>
        <svg class="icon-sound-off" width="16" height="16" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          style="display:none;">
          <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
          <line x1="23" y1="9" x2="17" y2="15"></line>
          <line x1="17" y1="9" x2="23" y2="15"></line>
        </svg>
      </button>
    </div>

    <!-- Action row -->
    <div class="d-flex align-items-center justify-content-between w-100 gap-3">

      <!-- PLAY button — preview state -->
      <button id="btn-play" type="button" aria-label="Start puzzle" class="btn-pv btn-pv-full">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink:0;">
          <polygon points="5 3 19 12 5 21 5 3"></polygon>
        </svg>
        Play
      </button>

      <!-- RESTART button — playing state -->
      <button id="btn-shuffle" type="button" aria-label="Restart puzzle" class="btn-pv" style="display:none;">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;">
          <polyline points="16 3 21 3 21 8"></polyline>
          <line x1="4" y1="20" x2="21" y2="3"></line>
          <polyline points="21 16 21 21 16 21"></polyline>
          <line x1="15" y1="15" x2="21" y2="21"></line>
        </svg>
        Restart
      </button>

      <!-- GIVE UP button — playing state -->
      <button id="btn-giveup" type="button" aria-label="Give up and see solution" class="btn-pv btn-pv-danger" style="display:none;">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;">
          <circle cx="12" cy="12" r="10"></circle>
          <line x1="12" y1="8" x2="12" y2="12"></line>
          <line x1="12" y1="16" x2="12.01" y2="16"></line>
        </svg>
        Give Up
      </button>

    </div>

    <!-- Hint row with inline eye toggle — shown while playing -->
    <div id="hint-row" class="d-flex align-items-center gap-2 w-100" style="display:none!important;">
      <!-- Eye / Ghost toggle button -->
      <button id="btn-ghost" type="button" aria-label="Toggle guide" class="btn-eye-pv">
        <!-- Eye open -->
        <svg class="icon-ghost-on" width="14" height="14" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          style="display:none;">
          <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
          <circle cx="12" cy="12" r="3"></circle>
        </svg>
        <!-- Eye closed -->
        <svg class="icon-ghost-off" width="14" height="14" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
          <line x1="1" y1="1" x2="23" y2="23"></line>
        </svg>
      </button>
      <span class="hint-text">Having a hard time? Use the guide above.</span>
    </div>

  </div><!-- /.puzzle-card -->

  <script src="assets/js/puzzle.js"></script>

  <script>
    const shuffleObserver = new MutationObserver(() => {
      const playing = document.getElementById('btn-shuffle').style.display !== 'none';
      const hint = document.getElementById('hint-row');
      if (hint) hint.style.setProperty('display', playing ? 'flex' : 'none', 'important');
    });
    shuffleObserver.observe(document.getElementById('btn-shuffle'), {
      attributes: true,
      attributeFilter: ['style']
    });
  </script>
</body>

</html>