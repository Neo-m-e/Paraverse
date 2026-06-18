
/* ── Audio Engine ────────────────────────────────────────────── */
const SoundFX = (() => {
  let ctx = null;
  let muted = false;

  function getCtx() {
    if (!ctx) ctx = new (window.AudioContext || window.webkitAudioContext)();
    return ctx;
  }

  function crispClick(pitch = 1.0) {
    if (muted) return;
    try {
      const ac = getCtx();
      const bufLen = Math.floor(ac.sampleRate * 0.05);
      const buf    = ac.createBuffer(1, bufLen, ac.sampleRate);
      const data   = buf.getChannelData(0);
      for (let i = 0; i < bufLen; i++) data[i] = Math.random() * 2 - 1;
      const noise  = ac.createBufferSource();
      noise.buffer = buf;
      const bp = ac.createBiquadFilter();
      bp.type            = 'bandpass';
      bp.frequency.value = 3200 * pitch;
      bp.Q.value         = 0.9;
      const hp = ac.createBiquadFilter();
      hp.type            = 'highpass';
      hp.frequency.value = 1800;
      const g = ac.createGain();
      const t = ac.currentTime;
      g.gain.setValueAtTime(0, t);
      g.gain.linearRampToValueAtTime(0.55, t + 0.002);
      g.gain.exponentialRampToValueAtTime(0.0001, t + 0.045);
      noise.connect(bp); bp.connect(hp); hp.connect(g); g.connect(ac.destination);
      noise.start(t); noise.stop(t + 0.05);
    } catch (_) {}
  }

  function slide() {
    crispClick(1.0);
    if (!muted) setTimeout(() => crispClick(1.35), 18);
  }

  function invalid() {
    if (muted) return;
    try {
      const ac = getCtx();
      const bufLen = Math.floor(ac.sampleRate * 0.08);
      const buf    = ac.createBuffer(1, bufLen, ac.sampleRate);
      const data   = buf.getChannelData(0);
      for (let i = 0; i < bufLen; i++) data[i] = Math.random() * 2 - 1;
      const noise = ac.createBufferSource();
      noise.buffer = buf;
      const lp = ac.createBiquadFilter();
      lp.type = 'lowpass';
      lp.frequency.value = 220;
      const g = ac.createGain();
      const t = ac.currentTime;
      g.gain.setValueAtTime(0, t);
      g.gain.linearRampToValueAtTime(0.3,    t + 0.004);
      g.gain.exponentialRampToValueAtTime(0.0001, t + 0.08);
      noise.connect(lp); lp.connect(g); g.connect(ac.destination);
      noise.start(t); noise.stop(t + 0.09);
    } catch (_) {}
  }

  function shuffle() {
    if (muted) return;
    const pitches = [1.1, 0.95, 1.2, 0.85, 1.05, 0.9, 1.15];
    pitches.forEach((p, i) => setTimeout(() => crispClick(p), i * 38));
  }

  function win() {
    if (muted) return;
    try {
      const ac = getCtx();
      const notes = [523, 659, 784, 1047, 1319];
      notes.forEach((freq, i) => {
        setTimeout(() => {
          const osc = ac.createOscillator();
          const g   = ac.createGain();
          osc.connect(g); g.connect(ac.destination);
          osc.type = 'sine';
          osc.frequency.value = freq;
          const t = ac.currentTime;
          g.gain.setValueAtTime(0, t);
          g.gain.linearRampToValueAtTime(0.18, t + 0.008);
          g.gain.exponentialRampToValueAtTime(0.0001, t + 0.3);
          osc.start(t); osc.stop(t + 0.35);
        }, i * 90);
      });
      setTimeout(() => {
        [1047, 1319, 1568].forEach((freq, i) => {
          const osc = ac.createOscillator();
          const g   = ac.createGain();
          osc.connect(g); g.connect(ac.destination);
          osc.type = 'sine';
          osc.frequency.value = freq;
          const t = ac.currentTime;
          g.gain.setValueAtTime(0, t);
          g.gain.linearRampToValueAtTime(0.10 - i * 0.02, t + 0.01);
          g.gain.exponentialRampToValueAtTime(0.0001, t + 0.55);
          osc.start(t); osc.stop(t + 0.6);
        });
      }, notes.length * 90 + 20);
    } catch (_) {}
  }

  function giveUp() {
    if (muted) return;
    try {
      const ac = getCtx();
      const notes = [415, 370, 330, 277, 220];
      notes.forEach((freq, i) => {
        setTimeout(() => {
          const osc = ac.createOscillator();
          const g   = ac.createGain();
          osc.connect(g); g.connect(ac.destination);
          osc.type = 'sawtooth';
          osc.frequency.value = freq;
          const t = ac.currentTime;
          g.gain.setValueAtTime(0, t);
          g.gain.linearRampToValueAtTime(0.14 - i * 0.015, t + 0.02);
          g.gain.exponentialRampToValueAtTime(0.0001, t + 0.32);
          osc.start(t); osc.stop(t + 0.35);
        }, i * 130);
      });
    } catch (_) {}
  }

  function toggleMute() { muted = !muted; return muted; }
  function isMuted()     { return muted; }

  return { slide, invalid, shuffle, win, giveUp, toggleMute, isMuted };
})();

/* ── Available Logos ─────────────────────────────────────────── */
const PUZZLE_LOGOS = [
  'Icare.svg', 'LAF.svg', 'VirtualOffice.svg', 'apas.svg', 'arcadia.svg',
  'associatesportal.svg', 'briefcase.svg', 'calendar.svg', 'comet.svg',
  'credentials.svg', 'discourse.svg', 'docuapproval.svg', 'eventually.svg',
  'flashcards.svg', 'gco.svg', 'leaderboard.svg', 'libra.svg', 'mflix.svg',
  'networkmap.svg', 'paraverse.svg', 'repository.svg', 'solar.svg', 'staar.svg'
];

/* ── Unified Sliding Puzzle Logic ────────────────────────────── */
class SlidingPuzzle {
  constructor(size = 3) {
    this.SIZE    = size;
    this.TOTAL   = size * size;
    this.tiles   = [];
    this.moves   = 0;
    this.solved  = false;

    // Time Limit configurations (3x3: 1 min, 4x4: 3 mins, 5x5: 5 mins)
    const timeLimits = {
      3: 60,
      4: 180,
      5: 300
    };
    this.TIME_LIMIT = timeLimits[this.SIZE] || 60;

    // Timer state
    this._timerInterval = null;
    this._seconds       = 0;
    this._timerRunning  = false;

    // Game state: 'preview' | 'playing'
    this._gameState = 'preview';

    // Logo state
    this.currentLogo = 'paraverse.svg';

    this.gridEl     = document.getElementById('puzzle-grid');
    this.movesEl    = document.getElementById('move-count');
    this.timerEl    = document.getElementById('timer-count');
    this.solvedEl   = document.getElementById('solved-overlay');
    this.solvedMov  = document.getElementById('solved-moves');
    this.solvedTime = document.getElementById('solved-time');
    this.playBtn    = document.getElementById('btn-play');
    this.shuffleBtn = document.getElementById('btn-shuffle');
    this.giveupBtn  = document.getElementById('btn-giveup');
    this.soundBtn   = document.getElementById('btn-sound');
    this.ghostBtn   = document.getElementById('btn-ghost');
    this.controlsEl = document.getElementById('puzzle-controls');
    this.hintRow    = document.getElementById('hint-row');
    this.bestStatEl = document.getElementById('best-stat');
    this._ghostVisible = false;

    this._bindEvents();
    this._initPreview();
  }

  /* ── Randomize game logo background ── */
  _selectRandomLogo() {
    this.currentLogo = PUZZLE_LOGOS[Math.floor(Math.random() * PUZZLE_LOGOS.length)];

    // Update the logo brand image in the card header
    const logoImg = document.querySelector('.logo-wrap img');
    if (logoImg) {
      logoImg.src = `../assets/images/${this.currentLogo}`;
    }
  }

  /* ── Preview state: solved board, no timer, Play button shown ── */
  _initPreview() {
    this._gameState = 'preview';
    this.tiles   = [...Array(this.TOTAL).keys()].map(i => i === this.TOTAL - 1 ? 0 : i + 1);
    this.moves   = 0;
    this.solved  = false;
    this._seconds = 0;
    this._stopTimer();
    this._tileEls = null;
    this.gridEl.innerHTML = '';
    this._hideSolved();
    this._updateMoves();

    // Select random logo for the preview
    this._selectRandomLogo();

    this._updateTimer();
    this._renderBest();

    // Show Play button, hide Shuffle; disable tile clicks
    if (this.playBtn)    this.playBtn.style.display    = '';
    if (this.shuffleBtn) this.shuffleBtn.style.display = 'none';
    if (this.giveupBtn)  this.giveupBtn.style.display  = 'none';
    if (this.controlsEl) this.controlsEl.style.display = 'none';
    if (this.hintRow)    this.hintRow.style.setProperty('display', 'none', 'important');

    this._render();
    // Tiles non-interactive in preview
    this._setTilesInteractive(false);
  }

  /* ── Start game: shuffle + start timer ── */
  _startGame() {
    this._gameState = 'playing';
    this.moves   = 0;
    this.solved  = false;
    this._seconds = 0;
    this._tileEls = null;
    this.gridEl.innerHTML = '';
    this._hideSolved();
    this._updateMoves();

    this._updateTimer();

    // Show Shuffle, hide Play; show controls row
    if (this.playBtn)    this.playBtn.style.display    = 'none';
    if (this.shuffleBtn) this.shuffleBtn.style.display = '';
    if (this.giveupBtn)  this.giveupBtn.style.display  = '';
    if (this.controlsEl) this.controlsEl.style.display = '';
    if (this.hintRow)    this.hintRow.style.setProperty('display', 'flex', 'important');

    // Reset to solved order then shuffle
    this.tiles = [...Array(this.TOTAL).keys()].map(i => i === this.TOTAL - 1 ? 0 : i + 1);
    this._shuffle();
    this._render();
    this._setTilesInteractive(true);
    this._startTimer();
    SoundFX.shuffle();
    this.gridEl.focus();
  }

  /* ── Restart mid-game ── */
  _restart() {
    this._stopTimer();
    this._startGame();
  }

  _setTilesInteractive(enabled) {
    if (!this._tileEls) return;
    Object.values(this._tileEls).forEach(el => {
      el.style.pointerEvents = enabled ? '' : 'none';
    });
  }

  /* ── Timer ── */
  _startTimer() {
    this._stopTimer();
    this._timerRunning = true;
    this._timerInterval = setInterval(() => {
      this._seconds++;
      this._updateTimer();

      // Check if time limit is reached
      if (this._seconds >= this.TIME_LIMIT) {
        this._timeOut();
      }
    }, 1000);
  }

  _stopTimer() {
    this._timerRunning = false;
    if (this._timerInterval) {
      clearInterval(this._timerInterval);
      this._timerInterval = null;
    }
    if (this.timerEl) {
      this.timerEl.classList.remove('pulse-timer');
    }
  }

  _updateTimer() {
    if (!this.timerEl) return;
    const remaining = Math.max(0, this.TIME_LIMIT - this._seconds);
    const m = Math.floor(remaining / 60).toString().padStart(2, '0');
    const s = (remaining % 60).toString().padStart(2, '0');
    this.timerEl.textContent = `${m}:${s}`;

    // Add pulsing alarm class in final 10 seconds of gameplay
    if (remaining <= 10 && this._timerRunning) {
      this.timerEl.classList.add('pulse-timer');
    } else {
      this.timerEl.classList.remove('pulse-timer');
    }
  }

  _timeOut() {
    this.solved = true;
    this._stopTimer();
    this._setTilesInteractive(false);
    setTimeout(() => {
      this._showSolved(false, true);
      SoundFX.giveUp();
    }, 200);
  }

  _formatTime(secs) {
    const m = Math.floor(secs / 60);
    const s = secs % 60;
    if (m > 0) return `${m}m ${s}s`;
    return `${s}s`;
  }

  /* ── Shuffle (internal) ── */
  _shuffle() {
    // Dynamically adjust steps depending on grid size
    const shuffleSteps = {
      3: 250 + Math.floor(Math.random() * 150),
      4: 400 + Math.floor(Math.random() * 200),
      5: 550 + Math.floor(Math.random() * 250)
    };
    const steps = shuffleSteps[this.SIZE] || 300;

    for (let i = 0; i < steps; i++) {
      const movable = this._getMovable();
      this.tiles = this._swapEmpty(this.tiles, movable[Math.floor(Math.random() * movable.length)]);
    }
  }

  _getMovable() {
    const ei  = this.tiles.indexOf(0);
    const row = Math.floor(ei / this.SIZE);
    const col = ei % this.SIZE;
    const m   = [];
    if (row > 0)             m.push(ei - this.SIZE);
    if (row < this.SIZE - 1) m.push(ei + this.SIZE);
    if (col > 0)             m.push(ei - 1);
    if (col < this.SIZE - 1) m.push(ei + 1);
    return m;
  }

  _swapEmpty(arr, idx) {
    const a  = [...arr];
    const ei = a.indexOf(0);
    [a[ei], a[idx]] = [a[idx], a[ei]];
    return a;
  }

  _move(idx) {
    if (this.solved || this._gameState !== 'playing') return;
    const movable = this._getMovable();
    if (!movable.includes(idx)) { SoundFX.invalid(); return; }

    const movingVal = this.tiles[idx];
    const tileEl    = this._tileEls ? this._tileEls[movingVal] : null;
    if (tileEl) {
      tileEl.classList.remove('flash');
      void tileEl.offsetWidth;
      tileEl.classList.add('flash');
    }

    this.tiles = this._swapEmpty(this.tiles, idx);
    this.moves++;
    this._updateMoves();
    this._render();
    SoundFX.slide();
    this._checkWin();
  }

  _checkWin() {
    const win = this.tiles.every((v, i) => i === this.TOTAL - 1 ? v === 0 : v === i + 1);
    if (!win) return;
    this.solved = true;
    this._stopTimer();
    this._setTilesInteractive(false);
    const { newMoves, newTime } = this._updateBest();
    setTimeout(() => { this._showSolved(false, false, newMoves, newTime); SoundFX.win(); }, 200);
  }

  /* ── Personal best (per grid size, stored in localStorage) ── */
  _bestKey() {
    return `paraverse-sliding-puzzle-best-${this.SIZE}`;
  }

  _loadBest() {
    try {
      const raw = localStorage.getItem(this._bestKey());
      const parsed = raw ? JSON.parse(raw) : null;
      if (parsed && typeof parsed.moves === 'number' && typeof parsed.seconds === 'number') return parsed;
    } catch (_) {}
    return null;
  }

  _renderBest() {
    if (!this.bestStatEl) return;
    const best = this._loadBest();
    if (best) {
      this.bestStatEl.innerHTML =
        `Best: <span class="best-value">${best.moves} move${best.moves !== 1 ? 's' : ''}</span>` +
        ` &middot; <span class="best-value">${this._formatTime(best.seconds)}</span>`;
    } else {
      this.bestStatEl.textContent = 'No record yet — be the first!';
    }
  }

  /* Called only on a genuine solve. Returns which categories were beaten. */
  _updateBest() {
    const best = this._loadBest();
    const newMoves = !best || this.moves < best.moves;
    const newTime  = !best || this._seconds < best.seconds;

    if (newMoves || newTime) {
      const updated = {
        moves:   newMoves ? this.moves    : best.moves,
        seconds: newTime  ? this._seconds : best.seconds
      };
      try { localStorage.setItem(this._bestKey(), JSON.stringify(updated)); } catch (_) {}
    }
    this._renderBest();
    return { newMoves, newTime };
  }

  /* ── Rendering ── */
  _calcTileSize() {
    // Measure grid-shell directly — already the correct inner width
    const shell = this.gridEl.parentElement;
    const availableW = (shell ? shell.clientWidth : window.innerWidth) - 18;

    // Estimate vertical space available for the grid
    const card = document.querySelector('.puzzle-card');
    let availableH = availableW;
    if (card) {
      let usedH = 0;
      Array.from(card.children).forEach(child => {
        if (child === shell) return;
        const style = window.getComputedStyle(child);
        if (style.display === 'none') return;
        usedH += child.offsetHeight;
      });
      const cardStyle  = window.getComputedStyle(card);
      const padV       = parseFloat(cardStyle.paddingTop) + parseFloat(cardStyle.paddingBottom);
      const gap        = parseFloat(cardStyle.rowGap || cardStyle.gap || 0);
      const gapCount   = Math.max(card.children.length - 1, 0);
      const viewportH  = window.innerHeight;
      availableH = viewportH - usedH - padV - (gap * gapCount) - 18 - 24; // 24px breathing room
    }

    const GAP  = 5;
    const COLS = this.SIZE;
    const maxByW = Math.floor((availableW - GAP * (COLS - 1)) / COLS);
    const maxByH = Math.floor((availableH - GAP * (COLS - 1)) / COLS);
    const max = Math.min(maxByW, maxByH);

    // Responsive bounds depending on size
    const limits = {
      3: { min: 60, max: 108 },
      4: { min: 50, max: 78 },
      5: { min: 36, max: 62 }
    };
    const { min: minLimit, max: maxLimit } = limits[this.SIZE] || { min: 50, max: 78 };

    return Math.min(maxLimit, Math.max(minLimit, max));
  }

  _render() {
    const TSIZE = this._calcTileSize();
    const GAP   = 5;
    const COLS  = this.SIZE;
    const gridW = TSIZE * COLS + GAP * (COLS - 1);
    const gridH = gridW;

    // Scale and center the background logo image as a whole inside the grid
    const scaleFactor = 0.90; //whole image adjustor
    const scaledGridW = gridW * scaleFactor;
    const scaledGridH = gridH * scaleFactor;
    const paddingX    = (gridW - scaledGridW) / 2;
    const paddingY    = (gridH - scaledGridH) / 2;

    this.gridEl.style.width  = `${gridW}px`;
    this.gridEl.style.height = `${gridH}px`;

    if (!this._tileEls) {
      this._tileEls = {};
      this.gridEl.innerHTML = '';

      // Ghost guide background
      const ghost = document.createElement('div');
      ghost.classList.add('tile-ghost');
      ghost.style.width              = `${gridW}px`;
      ghost.style.height             = `${gridH}px`;
      ghost.style.backgroundImage    = `url('../assets/images/${this.currentLogo}')`;
      ghost.style.backgroundSize     = `${scaledGridW}px ${scaledGridH}px`;
      ghost.style.backgroundPosition = `${paddingX}px ${paddingY}px`;
      ghost.style.backgroundRepeat   = 'no-repeat';
      this.gridEl.appendChild(ghost);

      // Empty slot
      const empty = document.createElement('div');
      empty.classList.add('tile', 'empty');
      empty.style.width  = `${TSIZE}px`;
      empty.style.height = `${TSIZE}px`;
      empty.style.top    = '0px';
      empty.style.left   = '0px';
      this.gridEl.appendChild(empty);
      this._emptyEl = empty;

      // Create tiles
      for (let v = 1; v < this.TOTAL; v++) {
        const el = document.createElement('div');
        el.classList.add('tile', 'img-tile');
        el.style.width  = `${TSIZE}px`;
        el.style.height = `${TSIZE}px`;

        const pos  = v - 1;
        const pCol = pos % COLS;
        const pRow = Math.floor(pos / COLS);
        const offX = pCol * (TSIZE + GAP);
        const offY = pRow * (TSIZE + GAP);

        // Nested image div for high-contrast outline filters
        const imgEl = document.createElement('div');
        imgEl.classList.add('tile-img');
        imgEl.style.width           = '100%';
        imgEl.style.height          = '100%';
        imgEl.style.backgroundImage = `url('../assets/images/${this.currentLogo}')`;
        imgEl.style.backgroundSize  = `${scaledGridW}px ${scaledGridH}px`;
        imgEl.style.backgroundPosition = `${paddingX - offX}px ${paddingY - offY}px`;
        imgEl.style.backgroundRepeat   = 'no-repeat';
        el.appendChild(imgEl);

        const badge = document.createElement('span');
        badge.classList.add('tile-num');
        badge.textContent = v;
        el.appendChild(badge);

        el.addEventListener('click', () => {
          this._move(this.tiles.indexOf(v));
        });

        this.gridEl.appendChild(el);
        this._tileEls[v] = el;
      }

      // Apply ghost visibility class
      this.gridEl.classList.toggle('guide-active', this._ghostVisible);
    }

    // Position tiles
    this.tiles.forEach((val, i) => {
      const col = i % COLS;
      const row = Math.floor(i / COLS);
      const x   = col * (TSIZE + GAP);
      const y   = row * (TSIZE + GAP);
      if (val === 0) {
        this._emptyEl.style.left = `${x}px`;
        this._emptyEl.style.top  = `${y}px`;
      } else {
        const el = this._tileEls[val];
        el.style.left = `${x}px`;
        el.style.top  = `${y}px`;
      }
    });
  }

  _updateMoves() {
    if (this.movesEl) this.movesEl.textContent = this.moves;
  }

  _showSolved(gaveUp = false, timedOut = false, newMoves = false, newTime = false) {
    let statusText = '';
    if (gaveUp) {
      statusText = 'You gave up 😅';
    } else if (timedOut) {
      statusText = 'Time is up! ⏰';
    } else {
      statusText = `Solved in ${this.moves} move${this.moves !== 1 ? 's' : ''} · ${this._formatTime(this._seconds)}`;
    }
    
    if (this.solvedMov) this.solvedMov.textContent = statusText;

    let subText = '';
    if (gaveUp) {
      subText = `After ${this._formatTime(this._seconds)}`;
    } else if (timedOut) {
      subText = `Made ${this.moves} move${this.moves !== 1 ? 's' : ''}`;
    } else if (newMoves && newTime) {
      subText = '🏆 New best — moves & time!';
    } else if (newMoves) {
      subText = '🏆 New best move count!';
    } else if (newTime) {
      subText = '🏆 New best time!';
    } else {
      subText = '';
    }

    if (this.solvedTime) {
      this.solvedTime.textContent = subText;
      this.solvedTime.classList.toggle('new-best-glow', !gaveUp && !timedOut && (newMoves || newTime));
    }

    if (this.solvedEl) {
      this.solvedEl.classList.toggle('gave-up', gaveUp || timedOut);
      this.solvedEl.classList.toggle('timed-out', timedOut);

      // Swap icons and title contents
      const iconEl  = this.solvedEl.querySelector('.overlay-icon');
      const titleEl = this.solvedEl.querySelector('.overlay-title');

      if (iconEl) {
        iconEl.className = 'overlay-icon bi';
        if (gaveUp) {
          iconEl.classList.add('bi-x-octagon-fill');
        } else if (timedOut) {
          iconEl.classList.add('bi-alarm-fill');
        } else {
          iconEl.classList.add('bi-stars');
        }
      }

      if (titleEl) {
        if (gaveUp) {
          titleEl.textContent = 'You Gave Up';
        } else if (timedOut) {
          titleEl.textContent = "Time's Up!";
        } else {
          titleEl.textContent = 'Puzzle Solved!';
        }
      }

      this.solvedEl.classList.add('show');
    }
  }

  _hideSolved() {
    if (this.solvedEl) this.solvedEl.classList.remove('show');
  }

  _bindEvents() {
    // Play button — first launch
    this.playBtn?.addEventListener('click', () => {
      this._startGame();
    });

    // Shuffle/Restart mid-game
    this.shuffleBtn?.addEventListener('click', () => {
      this._restart();
    });

    // Play Again (same logo) from solved overlay
    document.getElementById('btn-play-again')?.addEventListener('click', () => {
      this._restart();
    });

    // New Puzzle (random logo) from solved overlay
    document.getElementById('btn-new-puzzle')?.addEventListener('click', () => {
      this._selectRandomLogo();
      this._restart();
    });

    // Give Up — show solved overlay immediately
    this.giveupBtn?.addEventListener('click', () => {
      if (this._gameState !== 'playing') return;
      this.solved = true;
      this._stopTimer();
      this._showSolved(true);
      SoundFX.giveUp();
    });

    // Ghost Guide toggler
    this.ghostBtn?.addEventListener('click', () => {
      this._ghostVisible = !this._ghostVisible;
      this.gridEl.classList.toggle('guide-active', this._ghostVisible);
      const iconOn  = this.ghostBtn.querySelector('.icon-ghost-on');
      const iconOff = this.ghostBtn.querySelector('.icon-ghost-off');
      const label   = this.ghostBtn.querySelector('.icon-ghost-label');
      if (iconOn && iconOff) {
        iconOn.style.display  = this._ghostVisible ? '' : 'none';
        iconOff.style.display = this._ghostVisible ? 'none' : '';
      }
      if (label) label.textContent = this._ghostVisible ? 'Hide Guide' : 'Show Guide';
      this.ghostBtn.style.color = this._ghostVisible ? 'rgba(237,232,255,.6)' : 'rgba(139,111,255,.4)';
    });

    // Sound toggle
    this.soundBtn?.addEventListener('click', () => {
      const muted   = SoundFX.toggleMute();
      this.soundBtn.classList.toggle('muted', muted);
      const iconOn  = this.soundBtn.querySelector('.icon-sound-on');
      const iconOff = this.soundBtn.querySelector('.icon-sound-off');
      if (iconOn && iconOff) {
        iconOn.style.display  = muted ? 'none' : '';
        iconOff.style.display = muted ? ''     : 'none';
      }
    });

    // Keyboard controls — arrow keys slide the tile adjacent to the
    // empty cell in the pressed direction. Bound to the grid itself
    // (rather than document) so it only activates while the puzzle
    // has focus, and won't hijack arrow keys used elsewhere on the page.
    this.gridEl?.addEventListener('keydown', (e) => {
      if (this._gameState !== 'playing' || this.solved) return;

      let targetIdx;
      const emptyIdx = this.tiles.indexOf(0);
      switch (e.key) {
        case 'ArrowUp':    targetIdx = emptyIdx + this.SIZE; break; // tile below slides up
        case 'ArrowDown':  targetIdx = emptyIdx - this.SIZE; break; // tile above slides down
        case 'ArrowLeft':  targetIdx = emptyIdx + 1;         break; // tile to the right slides left
        case 'ArrowRight': targetIdx = emptyIdx - 1;         break; // tile to the left slides right
        default: return;
      }
      e.preventDefault();
      this._move(targetIdx);
    });
  }
}

/* ── Auto Initialization ── */
document.addEventListener('DOMContentLoaded', () => {
  const gridEl = document.getElementById('puzzle-grid');
  const size = parseInt(gridEl?.dataset.size, 10) || 3;
  const puzzle = new SlidingPuzzle(size);

  // Re-render on resize / orientation change so tiles stay properly sized
  let _resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(_resizeTimer);
    _resizeTimer = setTimeout(() => {
      puzzle._tileEls = null;
      puzzle.gridEl.innerHTML = '';
      puzzle._render();
    }, 120);
  });
});
