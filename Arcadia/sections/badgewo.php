<?php /* ============================================================
   SECTION 04 — BADGES WORTH MORE THAN JUST A PICTURE (dark bg)
   Include: <?php include 'sections/04-badges-worth.php'; ?>
   ============================================================ */ ?>

<style>
/* ── BADGES WORTH MORE SECTION ── */
.arc-worth {
  background: #1C1917;
  padding: 84px 0;
  position: relative;
  overflow: hidden;
}

/* Radial glow overlays */
.arc-worth::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background:
    radial-gradient(ellipse at 15% 50%, rgba(249,115,22,0.13) 0%, transparent 55%),
    radial-gradient(ellipse at 85% 20%, rgba(139,92,246,0.08) 0%, transparent 50%);
  pointer-events: none;
}

/* Reuse shared label/title/divider styles if already on page,
   otherwise these override per-section. */
.arc-worth .arc-section-label { color: #F97316; }
.arc-worth .arc-section-title { color: #FFFFFF; }
.arc-worth .arc-section-sub   { color: #A8A29E; }
.arc-worth .arc-divider       { background: #F97316; }

/* Step cards */
.arc-worth-card {
  background: #292524;
  border: 1px solid rgba(255,255,255,0.07);
  border-radius: 18px;
  padding: 1.9rem 1.4rem;
  text-align: center;
  height: 100%;
  transition: border-color 0.22s, transform 0.22s, box-shadow 0.22s;
}
.arc-worth-card:hover {
  border-color: #F97316;
  transform: translateY(-4px);
  box-shadow: 0 14px 36px rgba(249,115,22,0.12);
}

.arc-worth-icon {
  width: 60px; height: 60px;
  border-radius: 50%;
  background: rgba(249,115,22,0.14);
  border: 2px solid rgba(249,115,22,0.28);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.65rem;
  margin: 0 auto 1rem;
}

.arc-worth-card h6 {
  font-family: 'Poppins', sans-serif;
  font-weight: 800;
  font-size: 0.96rem;
  color: #FFFFFF;
  margin-bottom: 0.45rem;
}
.arc-worth-card p {
  font-family: 'Nunito', sans-serif;
  font-size: 0.82rem;
  color: #A8A29E;
  line-height: 1.7;
  margin: 0;
}

/* Bottom CTA banner */
.arc-worth-banner {
  background: rgba(249,115,22,0.09);
  border: 1px solid rgba(249,115,22,0.22);
  border-radius: 14px;
  padding: 1rem 1.5rem;
  margin-top: 2.5rem;
  font-family: 'Nunito', sans-serif;
  font-size: 0.86rem;
  color: #D6D3D1;
  line-height: 1.65;
}
.arc-worth-banner strong { color: #F97316; }
.arc-worth-banner a {
  color: #F97316;
  font-weight: 800;
  text-decoration: underline;
}
.arc-worth-banner a:hover { color: #FB923C; }

@media (max-width: 768px) {
  .arc-worth { padding: 56px 0; }
}
</style>

<!-- ═══════════════════════════════════════
     BADGES WORTH MORE — DARK SECTION
═══════════════════════════════════════ -->
<section class="arc-worth">
  <div class="container text-center position-relative" style="z-index:1;">

    <span class="arc-section-label">Every Badge Counts</span>
    <h2 class="arc-section-title">
      Your Badges Are Worth More<br>Than Just a Picture
    </h2>
    <p class="arc-section-sub mx-auto">
      Every badge you earn represents real-world effort, skill, and achievement.
      Save enough Coins and redeem exclusive TED Tech merch — for free.
    </p>
    <div class="arc-divider"></div>

    <div class="row g-4 justify-content-center mt-1">

      <!-- Step 1 -->
      <div class="col-lg-3 col-md-6">
        <div class="arc-worth-card">
          <div class="arc-worth-icon">📋</div>
          <h6>Complete a Task</h6>
          <p>
            Join academic activities, events, challenges, and tasks to earn your
            exclusive digital badges.
          </p>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="col-lg-3 col-md-6">
        <div class="arc-worth-card">
          <div class="arc-worth-icon">💰</div>
          <h6>Collect Your Rewards</h6>
          <p>
            Each badge gives you Coins and XP. Coins redeem merch; XP levels up
            your Arcadia rank on the leaderboard.
          </p>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="col-lg-3 col-md-6">
        <div class="arc-worth-card">
          <div class="arc-worth-icon">🎽</div>
          <h6>Claim Free Merch</h6>
          <p>
            Head to the Store when you have enough Coins. Exchange them for
            exclusive official TLU Tech merchandise.
          </p>
        </div>
      </div>

    </div>

    <!-- CTA Banner -->
    <div class="arc-worth-banner">
      <strong>🏆 Your rank matters.</strong>
      The higher you earn, the higher you climb in the
      <a href="#">Leaderboard</a>.
      More Badges &rarr; Higher level &rarr; Top of the Board.
    </div>

  </div>
</section>