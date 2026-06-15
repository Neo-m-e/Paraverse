<?php
$size       = isset($PUZZLE_SIZE) ? (int) filter_var($PUZZLE_SIZE, FILTER_SANITIZE_NUMBER_INT) : 3;
$sizeLabel  = htmlspecialchars($PUZZLE_SIZE ?? '3x3');
$TILE_SIZE  = $size === 4 ? 78 : 108;
$GAP        = 5;
$gridPx     = $TILE_SIZE * $size + $GAP * ($size - 1);
$difficulties = ['3'=>'Beginner','4'=>'Intermediate','5'=>'Expert'];
$difficulty = htmlspecialchars($difficulties[$size] ?? 'Beginner');
?>

<style>
/* ── Page centering ── */
.pv-wrap {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem 1rem;
}

/* ── Card ── */
.pv-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1.2rem;
  width: 100%;
  max-width: 500px;
  background: linear-gradient(160deg, rgba(11,3,34,.80) 0%, rgba(27,29,82,.5) 100%);
  border: 1px solid rgba(139,111,255,.25);
  box-shadow: 0 12px 48px rgba(0,0,0,.6);
  backdrop-filter: blur(18px);
  border-radius: 16px;
  padding: 1.75rem;
}

/* ── Header ── */
.pv-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}
.pv-brand {
  display: flex;
  align-items: center;
  gap: 10px;
}
.pv-logo {
  width: 40px; height: 40px;
  background: rgba(139,111,255,.12);
  border: 1px solid rgba(139,111,255,.25);
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
}
.pv-logo img { width: 26px; height: 26px; object-fit: contain; }
.pv-brand-name {
  font-family: 'Orbitron', sans-serif;
  font-size: .78rem; font-weight: 700;
  letter-spacing: .1em; color: #EDE8FF;
  display: block;
}
.pv-brand-sub {
  font-size: .62rem; color: rgba(237,232,255,.4);
}
.pv-badge {
  font-family: 'Orbitron', sans-serif;
  font-size: .58rem; font-weight: 600;
  letter-spacing: .1em; text-transform: uppercase;
  color: #B8A3FF;
  background: rgba(139,111,255,.15);
  border: 1px solid rgba(139,111,255,.3);
  border-radius: 4px;
  padding: 3px 8px;
}

.pv-divider { width:100%; height:1px; background:rgba(139,111,255,.15); }

/* ── Grid shell ── */
.pv-shell {
  position: relative;
  padding: 8px;
  border-radius: 12px;
  background: rgba(4,0,15,.4);
  border: 1px solid rgba(139,111,255,.2);
  box-shadow: inset 0 0 30px rgba(0,0,0,.5);
  line-height: 0;   /* kills inline whitespace */
}

/* ── The grid itself — JS sets width/height/position ── */
#pv-grid {
  position: relative;        /* tiles anchor here */
  display: block;
  overflow: hidden;
  width: <?= $gridPx ?>px;
  height: <?= $gridPx ?>px;
}

/* ── Tiles ── */
.pv-tile {
  position: absolute;
  border-radius: 8px;
  border: 1px solid rgba(139,111,255,.3);
  background: rgba(27,29,82,.75);
  cursor: pointer;
  user-select: none;
  overflow: hidden;
  box-shadow: inset 0 1px 0 rgba(255,255,255,.08), 0 3px 10px rgba(0,0,0,.45);
  transition: top .16s cubic-bezier(.25,.46,.45,.94),
              left .16s cubic-bezier(.25,.46,.45,.94),
              box-shadow .15s ease;
}
.pv-tile:hover { border-color: #8B6FFF; box-shadow: 0 0 18px rgba(139,111,255,.5); }
.pv-tile.empty {
  cursor: default;
  background: rgba(4,0,15,.6) !important;
  border-color: rgba(139,111,255,.08) !important;
  box-shadow: inset 0 0 20px rgba(0,0,0,.7) !important;
}
.pv-tile.flash { animation: pvFlash .22s ease; }
@keyframes pvFlash {
  0%  { box-shadow: 0 0 22px rgba(139,111,255,.6); }
  50% { box-shadow: 0 0 36px rgba(139,111,255,.9); }
  100%{ box-shadow: inset 0 1px 0 rgba(255,255,255,.08), 0 3px 10px rgba(0,0,0,.45); }
}

/* ── Ghost guide ── */
.pv-ghost {
  position: absolute;
  top: 0; left: 0;
  pointer-events: none;
  border-radius: 6px;
  opacity: 0;
  filter: brightness(1.4) saturate(1.2);
  transition: opacity .3s ease;
  width: <?= $gridPx ?>px;
  height: <?= $gridPx ?>px;
}

/* ── Solved overlay ── */
.pv-solved {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 10px;
  opacity: 0;
  pointer-events: none;
  transition: opacity .35s ease;
  backdrop-filter: blur(8px);
  background: rgba(4,0,15,.92);
  z-index: 20;
}
.pv-solved.show { opacity: 1; pointer-events: auto; }
.pv-solved-title {
  font-family: 'Orbitron', sans-serif;
  font-size: 1rem; font-weight: 700;
  color: #EDE8FF; letter-spacing: .1em;
}
.pv-solved-stats { font-size: .72rem; color: rgba(237,232,255,.5); }

/* ── Stats row ── */
.pv-stats {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}
.pv-stat { display: flex; flex-direction: column; align-items: center; gap: 2px; }
.pv-stat-label {
  font-family: 'Orbitron', sans-serif;
  font-size: .52rem; letter-spacing: .16em;
  text-transform: uppercase; color: rgba(237,232,255,.35);
}
.pv-stat-val {
  font-family: 'Orbitron', sans-serif;
  font-size: 1.05rem; font-weight: 700; color: #B8A3FF;
}

/* ── Buttons ── */
.pv-btn {
  display: inline-flex; align-items: center; justify-content: center; gap: 7px;
  font-family: 'Orbitron', sans-serif;
  font-size: .68rem; font-weight: 600;
  letter-spacing: .14em; text-transform: uppercase;
  color: #B8A3FF;
  background: linear-gradient(135deg, #2A1C5A, #3C2166);
  border: 1px solid #8B6FFF;
  border-radius: 8px;
  padding: 9px 18px;
  cursor: pointer;
  transition: box-shadow .15s ease, border-color .15s ease;
  white-space: nowrap;
}
.pv-btn:hover { box-shadow: 0 0 12px rgba(139,111,255,.4); border-color: #C4ADFF; }
.pv-btn-full { width: 100%; }
.pv-btn-danger {
  color: rgba(255,160,160,.85);
  border-color: rgba(255,100,100,.4);
  background: linear-gradient(135deg, rgba(60,10,10,.6), rgba(80,20,20,.5));
}
.pv-btn-danger:hover { border-color: rgba(255,100,100,.8); box-shadow: 0 0 12px rgba(255,80,80,.25); }
.pv-btn-icon {
  display: inline-flex; align-items: center; justify-content: center;
  width: 38px; height: 38px; flex-shrink: 0;
  color: rgba(237,232,255,.7);
  background: transparent;
  border: 1px solid rgba(139,111,255,.25);
  border-radius: 8px; padding: 0; cursor: pointer;
  transition: border-color .15s ease;
}
.pv-btn-icon:hover { border-color: #8B6FFF; }
.pv-btn-eye {
  display: inline-flex; align-items: center; justify-content: center;
  width: 26px; height: 26px; flex-shrink: 0;
  color: rgba(139,111,255,.7);
  background: transparent;
  border: 1px solid rgba(139,111,255,.25);
  border-radius: 6px; padding: 0; cursor: pointer;
  transition: border-color .15s ease;
}
.pv-btn-eye:hover { border-color: #8B6FFF; }

/* ── Action + hint rows ── */
.pv-actions { display: flex; align-items: center; gap: .75rem; width: 100%; }
.pv-hint    { display: flex; align-items: center; gap: 8px; width: 100%; }
.pv-hint-text { font-size: .62rem; font-style: italic; color: rgba(237,232,255,.32); }

/* ── Back link ── */
.pv-back { width: 100%; }
.pv-back a {
  display: inline-flex; align-items: center; gap: 6px;
  font-family: 'Orbitron', sans-serif;
  font-size: .62rem; font-weight: 600;
  letter-spacing: .1em; text-transform: uppercase;
  color: rgba(139,111,255,.5);
  text-decoration: none;
  transition: color .15s ease;
}
.pv-back a:hover { color: #B8A3FF; }
</style>

<div class="pv-wrap">
  <div class="pv-card">

    <!-- Header -->
    <div class="pv-header">
      <div class="pv-brand">
        <div class="pv-logo"><img src="assets/images/paraverse.svg" alt="Paraverse"></div>
        <div>
          <span class="pv-brand-name">Paraverse</span>
          <span class="pv-brand-sub">FEU Institute of Technology · EdITH</span>
        </div>
      </div>
      <span class="pv-badge"><?= $sizeLabel ?> · <?= $difficulty ?></span>
    </div>

    <div class="pv-divider"></div>

    <!-- Grid -->
    <div class="pv-shell">
      <div id="pv-grid" role="grid" aria-label="<?= $sizeLabel ?> sliding puzzle"></div>

      <!-- Solved overlay -->
      <div id="pv-solved" class="pv-solved" aria-live="polite">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#F6C90E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 9H4a2 2 0 0 1-2-2V5h4"/><path d="M18 9h2a2 2 0 0 0 2-2V5h-4"/>
          <path d="M6 5h12v6a6 6 0 0 1-12 0V5Z"/><path d="M12 17v4"/><path d="M8 21h8"/>
        </svg>
        <span class="pv-solved-title">Puzzle Solved!</span>
        <span id="pv-solved-stats" class="pv-solved-stats"></span>
        <button id="btn-play-again" class="pv-btn">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
          Play Again
        </button>
      </div>
    </div>

    <!-- Stats (hidden until playing) -->
    <div id="pv-controls" class="pv-stats" style="display:none;">
      <div class="pv-stat">
        <span class="pv-stat-label">Moves</span>
        <span id="pv-moves" class="pv-stat-val">0</span>
      </div>
      <div class="pv-stat">
        <span class="pv-stat-label">Time</span>
        <span id="pv-timer" class="pv-stat-val">00:00</span>
      </div>
      <button id="btn-sound" class="pv-btn-icon" aria-label="Toggle sound">
        <span id="icon-sound-on"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/></svg></span>
        <span id="icon-sound-off" style="display:none;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><line x1="23" y1="9" x2="17" y2="15"/><line x1="17" y1="9" x2="23" y2="15"/></svg></span>
      </button>
    </div>

    <!-- Actions -->
    <div class="pv-actions">
      <button id="btn-play"    class="pv-btn pv-btn-full"><svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>Play</button>
      <button id="btn-restart" class="pv-btn" style="display:none;"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>Restart</button>
      <button id="btn-giveup"  class="pv-btn pv-btn-danger" style="display:none;"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>Give Up</button>
    </div>

    <!-- Hint -->
    <div id="pv-hint" class="pv-hint" style="display:none;">
      <button id="btn-ghost" class="pv-btn-eye" aria-label="Toggle guide">
        <span id="icon-eye-off"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg></span>
        <span id="icon-eye-on" style="display:none;"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></span>
      </button>
      <span class="pv-hint-text">Having a hard time? Show the guide image.</span>
    </div>

    <!-- Back -->
    <div class="pv-back">
      <a href="../">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
        Choose Mode
      </a>
    </div>

  </div>
</div>

<script>
const PV_TILE_SIZE = <?= $TILE_SIZE ?>;
const PV_SIZE      = <?= $size ?>;
const PV_GAP       = <?= $GAP ?>;
const PV_GRID_PX   = <?= $gridPx ?>;
</script>
<script src="assets/js/puzzle.js"></script>
<script>
/* Hint row observer */
new MutationObserver(() => {
  const playing = document.getElementById('btn-restart').style.display !== 'none';
  document.getElementById('pv-hint').style.display = playing ? 'flex' : 'none';
}).observe(document.getElementById('btn-restart'), { attributes: true, attributeFilter: ['style'] });
</script>
