
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

  function toggleMute() { muted = !muted; return muted; }
  function isMuted()     { return muted; }

  return { slide, invalid, shuffle, win, toggleMute, isMuted };
})();


/* ── Puzzle Logic ────────────────────────────────────────────── */
class Puzzle3x3 {
  constructor() {
    this.SIZE    = 3;
    this.TOTAL   = 9;
    this.tiles   = [];
    this.moves   = 0;
    this.solved  = false;

    // Timer state
    this._timerInterval = null;
    this._seconds       = 0;
    this._timerRunning  = false;

    // Game state: 'preview' | 'playing'
    this._gameState = 'preview';

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
    this._ghostVisible = false;

    this._bindEvents();
    this._initPreview();
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
    this._updateTimer();

    // Show Play button, hide Shuffle; disable tile clicks
    if (this.playBtn)    this.playBtn.style.display    = '';
    if (this.shuffleBtn) this.shuffleBtn.style.display = 'none';
    if (this.giveupBtn)  this.giveupBtn.style.display  = 'none';
    if (this.controlsEl) this.controlsEl.style.display = 'none';

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

    // Reset to solved order then shuffle
    this.tiles = [...Array(this.TOTAL).keys()].map(i => i === this.TOTAL - 1 ? 0 : i + 1);
    this._shuffle();
    this._render();
    this._setTilesInteractive(true);
    this._startTimer();
    SoundFX.shuffle();
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
    }, 1000);
  }

  _stopTimer() {
    this._timerRunning = false;
    if (this._timerInterval) {
      clearInterval(this._timerInterval);
      this._timerInterval = null;
    }
  }

  _updateTimer() {
    if (!this.timerEl) return;
    const m = Math.floor(this._seconds / 60).toString().padStart(2, '0');
    const s = (this._seconds % 60).toString().padStart(2, '0');
    this.timerEl.textContent = `${m}:${s}`;
  }

  _formatTime(secs) {
    const m = Math.floor(secs / 60);
    const s = secs % 60;
    if (m > 0) return `${m}m ${s}s`;
    return `${s}s`;
  }

  /* ── Shuffle (internal) ── */
  _shuffle() {
    const steps = 250 + Math.floor(Math.random() * 150);
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
    setTimeout(() => { this._showSolved(); SoundFX.win(); }, 200);
  }

  /* ── Rendering ── */
  _render() {
    const TSIZE = 108;
    const GAP   = 5;
    const COLS  = this.SIZE;
    const gridW = TSIZE * COLS + GAP * (COLS - 1);
    const gridH = gridW;

    this.gridEl.style.width  = `${gridW}px`;
    this.gridEl.style.height = `${gridH}px`;

    if (!this._tileEls) {
      this._tileEls = {};
      this.gridEl.innerHTML = '';

      // Ghost guide
      const ghost = document.createElement('div');
      ghost.classList.add('tile-ghost');
      ghost.style.width              = `${gridW}px`;
      ghost.style.height             = `${gridH}px`;
      ghost.style.backgroundImage    = "url('assets/images/paraverse.svg')";
      ghost.style.backgroundSize     = `${gridW}px ${gridH}px`;
      ghost.style.backgroundPosition = '0 0';
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

        el.style.backgroundImage    = "url('assets/images/paraverse.svg')";
        el.style.backgroundSize     = `${gridW}px ${gridH}px`;
        el.style.backgroundPosition = `-${offX}px -${offY}px`;
        el.style.backgroundRepeat   = 'no-repeat';

        el.addEventListener('click', () => {
          this._move(this.tiles.indexOf(v));
        });

        this.gridEl.appendChild(el);
        this._tileEls[v] = el;
      }

      // Apply ghost visibility
      ghost.style.opacity = this._ghostVisible ? '0.22' : '0';
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

  _showSolved(gaveUp = false) {
    if (this.solvedMov)  this.solvedMov.textContent  = gaveUp ? 'You gave up 😅' : `Solved in ${this.moves} move${this.moves !== 1 ? 's' : ''} · ${this._formatTime(this._seconds)}`;
    if (this.solvedTime) this.solvedTime.textContent  = gaveUp ? `After ${this._formatTime(this._seconds)}` : '';
    if (this.solvedEl)   this.solvedEl.classList.add('show');
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

    // Play Again from solved overlay
    document.getElementById('btn-play-again')?.addEventListener('click', () => {
      this._restart();
    });

    // Give Up — show solved overlay immediately
    this.giveupBtn?.addEventListener('click', () => {
      if (this._gameState !== 'playing') return;
      this.solved = true;
      this._stopTimer();
      this._showSolved(true);
      SoundFX.win();
    });
    this.ghostBtn?.addEventListener('click', () => {
      this._ghostVisible = !this._ghostVisible;
      const ghost = this.gridEl.querySelector('.tile-ghost');
      if (ghost) ghost.style.opacity = this._ghostVisible ? '0.22' : '0';
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
  }
}

document.addEventListener('DOMContentLoaded', () => { new Puzzle3x3(); });
