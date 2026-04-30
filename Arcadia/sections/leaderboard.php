<?php /* includes/hall-of-fame.php */ ?>
<style> 
  /* ── HALL OF FAME ── */
.hof-section { background: #FFF8F1; padding: 80px 0; }

.podium-wrap {
  display: flex;
  align-items: flex-end;
  justify-content: center;
  gap: 1rem;
  margin-bottom: 2.5rem;
}
.podium-item { text-align: center; }
.podium-item .podium-avatar {
  width: 68px; height: 68px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.8rem;
  margin: 0 auto 6px;
  border: 3px solid transparent;
}
.podium-item.first .podium-avatar  { border-color: #F59E0B; background: #FEF3C7; }
.podium-item.second .podium-avatar { border-color: #94A3B8; background: #F1F5F9; }
.podium-item.third .podium-avatar  { border-color: #B45309; background: #FEF3C7; }
.podium-item .podium-name { font-size: 0.78rem; font-weight: 800; color: #1C1917; }
.podium-item .podium-role { font-size: 0.68rem; color: #78716C; }
.podium-item .podium-base {
  border-radius: 12px 12px 0 0;
  margin-top: 10px;
  display: flex; align-items: flex-end; justify-content: center;
  padding-bottom: 0.5rem;
  font-size: 1.4rem; font-weight: 900;
}
.podium-item.first .podium-base  { height: 100px; background: linear-gradient(180deg, #F59E0B, #D97706); color: #fff; min-width: 110px; }
.podium-item.second .podium-base { height: 70px;  background: linear-gradient(180deg,  #94A3B8, #64748B); color: #fff; min-width: 100px; }
.podium-item.third .podium-base  { height: 55px;  background: linear-gradient(180deg, #CD7C3A, #B45309); color: #fff; min-width: 100px; }

.leaderboard-row-mini {
  display: flex; align-items: center; gap: 1rem;
  background: #fff;
  border: 1px solid #E7E5E4;
  border-radius: 10px;
  padding: 0.65rem 1rem;
  margin-bottom: 0.5rem;
  transition: box-shadow 0.18s;
}
.leaderboard-row-mini:hover { box-shadow: 0 4px 14px rgba(0,0,0,0.07); }
.leaderboard-row-mini .rank { font-size: 0.8rem; font-weight: 900; color: #78716C; min-width: 24px; }
.leaderboard-row-mini .av {
  width: 36px; height: 36px; border-radius: 50%;
  background: #FDE8D0;
  display: flex; align-items: center; justify-content: center; font-size: 1rem;
}
.leaderboard-row-mini .info { flex: 1; }
.leaderboard-row-mini .info .uname { font-size: 0.82rem; font-weight: 800; }
.leaderboard-row-mini .info .urole { font-size: 0.7rem; color: #78716C; }
.leaderboard-row-mini .pts { font-size: 0.82rem; font-weight: 800; color: #F97316; }

.btn-view-leaderboard {
  background: #F97316;;
  color: #fff;
  border: none;
  border-radius: 10px;
  font-weight: 700;
  font-size: 0.9rem;
  padding: 0.65rem 1.8rem;
  box-shadow: 0 4px 14px rgba(249,115,22,0.3);
  transition: all 0.2s;
  cursor: pointer;
}
.btn-view-leaderboard:hover { background: #E05A00; transform: translateY(-1px); }

</style>
<section class="hof-section">
  <div class="container text-center">
    <span class="section-label">Leaderboard</span>
    <h2 class="section-title">Hall of Fame</h2>
    <p class="section-subtitle">
      112,641 players competing. Where do you rank?
    </p>
    <div class="divider-orange"></div>

    <!-- Podium -->
    <div class="podium-wrap mt-4">
      <!-- 2nd -->
      <div class="podium-item second">
        <div class="podium-avatar">👤</div>
        <div class="podium-name">Ray T. Ramirez</div>
        <div class="podium-role">CS - 3rd Year</div>
        <div class="podium-base">2</div>
      </div>
      <!-- 1st -->
      <div class="podium-item first">
        <div class="podium-avatar" style="font-size:2rem;">👑</div>
        <div class="podium-name">James D. Miguel</div>
        <div class="podium-role">IT - 4th Year</div>
        <div class="podium-base">1</div>
      </div>
      <!-- 3rd -->
      <div class="podium-item third">
        <div class="podium-avatar">👤</div>
        <div class="podium-name">Mary T. Comiso</div>
        <div class="podium-role">IS - 2nd Year</div>
        <div class="podium-base">3</div>
      </div>
    </div>

    <!-- Mini Leaderboard rows (4-8) -->
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="leaderboard-row-mini">
          <div class="rank">4</div>
          <div class="av">👤</div>
          <div class="info">
            <div class="uname">Carlo A. Reyes</div>
            <div class="urole">IT - 3rd Year · Diamond</div>
          </div>
          <div class="pts">💎 4,810 XP</div>
        </div>

        <div class="leaderboard-row-mini">
          <div class="rank">5</div>
          <div class="av">👤</div>
          <div class="info">
            <div class="uname">Tricia M. Santos</div>
            <div class="urole">CS - 4th Year · Platinum</div>
          </div>
          <div class="pts">🏆 3,950 XP</div>
        </div>

        <div class="leaderboard-row-mini">
          <div class="rank">6</div>
          <div class="av">👤</div>
          <div class="info">
            <div class="uname">Mark B. Torres</div>
            <div class="urole">IS - 3rd Year · Platinum</div>
          </div>
          <div class="pts">🏆 3,720 XP</div>
        </div>

        <div class="leaderboard-row-mini">
          <div class="rank">7</div>
          <div class="av">👤</div>
          <div class="info">
            <div class="uname">Diana C. Flores</div>
            <div class="urole">CS - 2nd Year · Gold</div>
          </div>
          <div class="pts">🥇 2,610 XP</div>
        </div>

        <div class="leaderboard-row-mini">
          <div class="rank">8</div>
          <div class="av">👤</div>
          <div class="info">
            <div class="uname">Nico P. Bautista</div>
            <div class="urole">IT - 1st Year · Gold</div>
          </div>
          <div class="pts">🥇 2,440 XP</div>
        </div>

      </div>
    </div>

    <button class="btn-view-leaderboard mt-4">View Full Leaderboard →</button>
  </div>
</section>
