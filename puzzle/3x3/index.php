<?php

$PUZZLE_SIZE = 3;
$META_TITLE  = "{$PUZZLE_SIZE}×{$PUZZLE_SIZE} Sliding Puzzle";
$META_DESC   = "Paraverse {$PUZZLE_SIZE}×{$PUZZLE_SIZE} Sliding Puzzle — FEU Institute of Technology EdITH";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title><?= htmlspecialchars($META_TITLE) ?> — Paraverse</title>
  <meta name="description" content="<?= htmlspecialchars($META_DESC) ?>">

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;900&family=Exo+2:wght@400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/puzzle.css">
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 overflow-hidden">


  <div class="puzzle-card d-flex flex-column align-items-center rounded-4 position-relative">

    <!-- Back to home — absolute top-left inside card -->
    <a href="../index.php" class="position-absolute top-0 start-0 d-flex align-items-center gap-2 text-decoration-none m-3"
      style="font-family:'Exo 2',sans-serif;font-size:.65rem;letter-spacing:.08em;color:rgba(139,111,255,.6);z-index:5;">
      <i class="bi bi-chevron-left" style="font-size:.7rem;"></i>
      Back
    </a>

    <!-- Brand -->
    <div class="d-flex flex-column align-items-center gap-2">
      <div class="logo-wrap d-flex align-items-center justify-content-center rounded-3 overflow-hidden"
        style="width:68px;height:68px;background:linear-gradient(135deg,#2A1C5A,#3C2166);border:1.5px solid rgba(139,111,255,.3);">
        <img src="../assets/images/paraverse.svg" alt="Paraverse Logo" width="46" height="46" style="object-fit:contain;">
      </div>

      <p class="puzzle-title mb-0 text-uppercase text-white fw-bold text-center"
        style="font-family:'Orbitron',sans-serif;font-size:.92rem;letter-spacing:.26em;">
        Paraverse Sliding Puzzle
      </p>
    </div>

    <!-- Divider -->
    <div class="pv-divider w-100" style="height:1px;background:linear-gradient(90deg,transparent,rgba(139,111,255,.3),transparent);"></div>

    <!-- Personal best for this grid size -->
    <p id="best-stat" class="best-stat-text mb-0 text-center" aria-live="polite"></p>

    <!-- Grid shell -->
    <div class="grid-shell position-relative rounded-3 p-2">
      <div id="puzzle-grid" class="puzzle-grid position-relative" role="grid" tabindex="0"
        aria-label="<?= $PUZZLE_SIZE ?> by <?= $PUZZLE_SIZE ?> sliding puzzle" data-size="<?= $PUZZLE_SIZE ?>"></div>

      <!-- Solved overlay -->
      <div id="solved-overlay"
        class="solved-overlay position-absolute top-0 start-0 w-100 h-100 rounded-3
                  d-flex flex-column align-items-center justify-content-center gap-3"
        aria-live="polite">
        <i class="overlay-icon bi bi-stars" style="font-size:1.6rem;"></i>
        <p class="overlay-title mb-0 fw-black text-uppercase"
          style="font-family:'Orbitron',sans-serif;font-size:1.25rem;letter-spacing:.22em;">Puzzle Solved!</p>
        <p id="solved-moves" class="mb-0"
          style="font-family:'Exo 2',sans-serif;font-size:.85rem;letter-spacing:.1em;color:rgba(237,232,255,.85);"></p>
        <p id="solved-time" class="mb-0"
          style="font-family:'Exo 2',sans-serif;font-size:.85rem;letter-spacing:.1em;color:rgba(237,232,255,.6);"></p>
        <div class="d-flex gap-2 mt-1">
          <button id="btn-play-again" type="button" class="btn-pv">
            <i class="bi bi-arrow-clockwise" style="font-size:.8rem;"></i> Play Again
          </button>
          <button id="btn-new-puzzle" type="button" class="btn-pv">
            <i class="bi bi-shuffle" style="font-size:.8rem;"></i> New Puzzle
          </button>
        </div>
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
        <i class="bi bi-volume-up-fill icon-sound-on" style="font-size:1rem;"></i>
        <i class="bi bi-volume-mute-fill icon-sound-off" style="font-size:1rem;display:none;"></i>
      </button>
    </div>

    <!-- Action row -->
    <div class="d-flex align-items-center justify-content-between w-100 gap-3">

      <!-- PLAY button — preview state -->
      <button id="btn-play" type="button" aria-label="Start puzzle" class="btn-pv btn-pv-full">
        <i class="bi bi-play-fill" style="font-size:.85rem;flex-shrink:0;"></i>
        Play
      </button>

      <!-- RESTART button — playing state -->
      <button id="btn-shuffle" type="button" aria-label="Restart puzzle" class="btn-pv" style="display:none;">
        <i class="bi bi-arrow-clockwise" style="font-size:.8rem;flex-shrink:0;"></i>
        Restart
      </button>

      <!-- GIVE UP button — playing state -->
      <button id="btn-giveup" type="button" aria-label="Give up and see solution" class="btn-pv btn-pv-danger" style="display:none;">
        <i class="bi bi-x-octagon" style="font-size:.8rem;flex-shrink:0;"></i>
        Give Up
      </button>

    </div>

    <!-- Hint row with inline eye toggle — shown while playing -->
    <div id="hint-row" class="d-flex align-items-center gap-2 w-100" style="display:none!important;">
      <!-- Eye / Ghost toggle button -->
      <button id="btn-ghost" type="button" aria-label="Toggle guide" class="btn-eye-pv">
        <!-- Eye open -->
        <i class="bi bi-eye-fill icon-ghost-on" style="font-size:.85rem;display:none;"></i>
        <i class="bi bi-eye-slash-fill icon-ghost-off" style="font-size:.85rem;"></i>
      </button>
      <span class="hint-text">Having a hard time? Click the eye for a hint.</span>
    </div>

  </div><!-- /.puzzle-card -->

  <script src="../assets/js/puzzle.js"></script>
</body>

</html>