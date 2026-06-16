<?php
$META_TITLE = "Sliding Puzzle";
$META_DESC  = "Paraverse Sliding Puzzle — FEU Institute of Technology EdITH";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title><?= htmlspecialchars($META_TITLE) ?> — Paraverse</title>
  <meta name="description" content="<?= htmlspecialchars($META_DESC) ?>">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;900&family=Exo+2:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">

  <style>
    body {
      background-color: #0d0826; 
    }

    .mode-card {
      background: linear-gradient(160deg, rgba(11, 3, 34, .75) 0%, rgba(27, 29, 82, .4) 100%);
      border: 1px solid rgba(139, 111, 255, .2);
      border-radius: 16px;
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      cursor: pointer;
      transition: border-color .2s ease, box-shadow .2s ease, transform .18s ease;
      text-decoration: none !important;
    }

    .mode-card:hover {
      border-color: #8B6FFF;
      box-shadow: 0 0 28px rgba(139, 111, 255, .35), 0 8px 32px rgba(0, 0, 0, .5);
      transform: translateY(-3px);
    }

    .mode-grid-preview {
      display: grid;
      gap: 3px;
      border-radius: 8px;
      overflow: hidden;
      background: rgba(4, 0, 15, .4);
      border: 1px solid rgba(139, 111, 255, .15);
    }

    .mode-grid-preview span {
      display: block;
      background: rgba(139, 111, 255, .18);
      border-radius: 3px;
    }
  </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 py-5">

  <div class="puzzle-card d-flex flex-column align-items-center p-4 p-md-5 rounded-4"
    style="width:100%; max-width:420px; background: rgba(20, 15, 45, 0.6); border: 1px solid rgba(139, 111, 255, 0.15);">

    <div class="d-flex flex-column align-items-center gap-2 w-100 mb-3">
      <div class="d-flex align-items-center justify-content-center rounded-3 overflow-hidden"
        style="width:68px; height:68px; background:linear-gradient(135deg,#2A1C5A,#3C2166); border:1.5px solid rgba(139,111,255,.3);">
        <img src="assets/images/paraverse.svg" alt="Paraverse Logo" width="46" height="46" style="object-fit:contain;">
      </div>
      <p class="puzzle-title mb-0 text-uppercase text-white fw-bold text-center"
        style="font-family:'Orbitron',sans-serif; font-size:.92rem; letter-spacing:.26em;">
        Paraverse Sliding Puzzle
      </p> 
      <div class="w-100 mt-4" style="height:1px; background:linear-gradient(90deg,transparent,rgba(139,111,255,.3),transparent);"></div>
    </div>

    <div class="d-flex flex-column align-items-center mb-4">
      <p class="mb-0 text-center" style="font-family:'Exo 2',sans-serif; font-size:.7rem; letter-spacing:.08em; color:rgba(237,232,255,.35);">
        Choose your difficulty
      </p>
    </div>

    <div class="d-flex flex-column gap-3 w-100">

      <a href="3x3/index.php" class="mode-card d-flex align-items-center gap-4 p-4 text-decoration-none text-reset">
        <div class="mode-grid-preview flex-shrink-0" style="grid-template-columns: repeat(3, 1fr); width: 54px; height: 54px;">
          <?php for ($i = 0; $i < 9; $i++): ?>
            <span style="height:16px;" class="<?= $i === 8 ? 'opacity-0' : '' ?>"></span>
          <?php endfor; ?>
        </div>

        <div class="d-flex flex-column gap-1 flex-grow-1">
          <div class="d-flex align-items-center gap-2">
            <span class="fw-bold text-light" style="font-family:'Orbitron',sans-serif; font-size:.82rem; letter-spacing:.16em;">
              3 &times; 3
            </span>
          </div>
          <span class="text-white-50" style="font-family:'Exo 2',sans-serif; font-size:.68rem;">
            8 tiles &nbsp;&middot;&nbsp; Beginner
          </span>
        </div>

        <i class="bi bi-chevron-right flex-shrink-0" style="color: rgba(139,111,255,.6); font-size: 16px;"></i>
      </a>

      <a href="4x4/index.php" class="mode-card d-flex align-items-center gap-4 p-4 text-decoration-none text-reset">
        <div class="mode-grid-preview flex-shrink-0" style="grid-template-columns: repeat(4, 1fr); width: 54px; height: 54px;">
          <?php for ($i = 0; $i < 16; $i++): ?>
            <span style="height:12px;" class="<?= $i === 15 ? 'opacity-0' : '' ?>"></span>
          <?php endfor; ?>
        </div>

        <div class="d-flex flex-column gap-1 flex-grow-1">
          <div class="d-flex align-items-center gap-2">
            <span class="fw-bold text-light" style="font-family:'Orbitron',sans-serif; font-size:.82rem; letter-spacing:.16em;">
              4 &times; 4
            </span>
          </div>
          <span class="text-white-50" style="font-family:'Exo 2',sans-serif; font-size:.68rem;">
            15 tiles &nbsp;&middot;&nbsp; Intermediate
          </span>
        </div>

        <i class="bi bi-chevron-right flex-shrink-0" style="color: rgba(139,111,255,.6); font-size: 16px;"></i>
      </a>

      <a href="5x5/index.php" class="mode-card d-flex align-items-center gap-4 p-4 text-decoration-none text-reset">
        <div class="mode-grid-preview flex-shrink-0" style="grid-template-columns: repeat(5, 1fr); width: 54px; height: 54px;">
          <?php for ($i = 0; $i < 25; $i++): ?>
            <span style="height:9px;" class="<?= $i === 24 ? 'opacity-0' : '' ?>"></span>
          <?php endfor; ?>
        </div>

        <div class="d-flex flex-column gap-1 flex-grow-1">
          <div class="d-flex align-items-center gap-2">
            <span class="fw-bold text-light" style="font-family:'Orbitron',sans-serif; font-size:.82rem; letter-spacing:.16em;">
              5 &times; 5
            </span>
          </div>
          <span class="text-white-50" style="font-family:'Exo 2',sans-serif; font-size:.68rem;">
            24 tiles &nbsp;&middot;&nbsp; Expert
          </span>
        </div>

        <i class="bi bi-chevron-right flex-shrink-0" style="color: rgba(139,111,255,.6); font-size: 16px;"></i>
      </a>

    </div></div></body>

</html>