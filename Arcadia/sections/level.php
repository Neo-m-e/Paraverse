<?php /* includes/level-system.php */ ?>
<style>
 /* ── LEVEL UP SYSTEM ── */
.level-section {
  background: #1C1917;
  padding: 80px 0;
  position: relative;
  overflow: hidden;
}
.level-section::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse at 70% 60%, rgba(245,158,11,0.08) 0%, transparent 60%);
  pointer-events: none;
}
.level-section .section-label { color: #F59E0B; }
.level-section .section-title { color: #fff; }
.level-section .section-subtitle { color: #A8A29E; }

.level-track {
  display: flex;
  align-items: flex-end;
  justify-content: center;
  gap: 0;
  padding: 2rem 0 1rem;
  position: relative;
}
.level-track::before {
  content: '';
  position: absolute;
  top: 50%; left: 10%;
  right: 10%; height: 3px;
  background: linear-gradient(90deg, #78716C, #F59E0B);
  transform: translateY(-50%);
  z-index: 0;
}
.level-node {
  display: flex; flex-direction: column; align-items: center;
  position: relative; z-index: 1;
  flex: 1;
  cursor: pointer;
  transition: transform 0.2s;
}
.level-node:hover { transform: scale(1.05); }
.level-node .node-circle {
  width: 56px; height: 56px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.4rem;
  border: 3px solid transparent;
  background: #292524;
  transition: all 0.2s;
  position: relative;
}
.level-node.active .node-circle,
.level-node:hover .node-circle {
  border-color: #F59E0B;
  box-shadow: 0 0 20px rgba(245,158,11,0.4);
}
.level-node .node-name {
  color: #fff;
  font-weight: 800;
  font-size: 0.8rem;
  margin-top: 8px;
}
.level-node .node-xp {
  color: #A8A29E;
  font-size: 0.68rem;
  font-weight: 600;
}

.titles-table {
  background:  #292524;
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 16px;
  overflow: hidden;
  margin-top: 2rem;
}
.titles-table .table-header {
  background: rgba(249,115,22,0.1);
  padding: 1rem 1.5rem;
  color: #fff;
  font-weight: 800;
  font-size: 0.85rem;
  border-bottom: 1px solid rgba(255,255,255,0.08);
}
.titles-row {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 0;
}
.titles-col {
  padding: 1rem;
  border-right: 1px solid rgba(255,255,255,0.06);
}
.titles-col:last-child { border-right: none; }
.titles-col .col-head {
  font-size: 0.72rem;
  font-weight: 800;
  color: var(--arcadia-gold);
  text-transform: uppercase;
  letter-spacing: 0.06em;
  margin-bottom: 0.5rem;
}
.titles-col .title-chip {
  display: block;
  background: rgba(255,255,255,0.06);
  border-radius: 6px;
  padding: 4px 8px;
  font-size: 0.7rem;
  color: #E7E5E4;
  font-weight: 600;
  margin-bottom: 4px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>  
<section class="level-section">
  <div class="container text-center">
    <span class="section-label">Progression</span>
    <h2 class="section-title" style="color:#fff;">Level Up System</h2>
    <p class="section-subtitle">
      Start at Bronze and climb to Diamond. Each level unlocks exclusive Titles and
      exclusive perks.
    </p>
    <div class="divider-orange"></div>

    <!-- Level Track -->
    <div class="level-track mt-4">
      <div class="level-node active" title="Bronze">
        <div class="node-circle" style="background:linear-gradient(135deg,#B45309,#D97706);">🥉</div>
        <div class="node-name">Bronze</div>
        <div class="node-xp">0 - 499 XP</div>
      </div>
      <div class="level-node" title="Silver">
        <div class="node-circle" style="background:linear-gradient(135deg,#64748B,#94A3B8);">🥈</div>
        <div class="node-name">Silver</div>
        <div class="node-xp">500 - 1499 XP</div>
      </div>
      <div class="level-node" title="Gold">
        <div class="node-circle" style="background:linear-gradient(135deg,#D97706,#F59E0B);">🥇</div>
        <div class="node-name">Gold</div>
        <div class="node-xp">1500 - 2999 XP</div>
      </div>
      <div class="level-node" title="Platinum">
        <div class="node-circle" style="background:linear-gradient(135deg,#0EA5E9,#38BDF8);">🏆</div>
        <div class="node-name">Platinum</div>
        <div class="node-xp">3000 - 4999 XP</div>
      </div>
      <div class="level-node" title="Diamond">
        <div class="node-circle" style="background:linear-gradient(135deg,#6366F1,#818CF8);">💎</div>
        <div class="node-name">Diamond</div>
        <div class="node-xp">5000+ XP</div>
      </div>
    </div>

    <!-- Titles Table -->
    <div class="titles-table text-start mt-4">
      <div class="table-header">Titles per Level</div>
      <div class="titles-row p-3">
        <!-- Bronze -->
        <div class="titles-col">
          <div class="col-head" style="color:#D97706;">🥉 Bronze</div>
          <span class="title-chip">Rookie Scholar</span>
          <span class="title-chip">Fresh Coder</span>
          <span class="title-chip">Newcomer</span>
          <span class="title-chip">Curious Mind</span>
        </div>
        <!-- Silver -->
        <div class="titles-col">
          <div class="col-head" style="color:#94A3B8;">🥈 Silver</div>
          <span class="title-chip">Rising Star</span>
          <span class="title-chip">Problem Solver</span>
          <span class="title-chip">Dedicated Learner</span>
          <span class="title-chip">Badge Collector</span>
        </div>
        <!-- Gold -->
        <div class="titles-col">
          <div class="col-head" style="color:#F59E0B;">🥇 Gold</div>
          <span class="title-chip">Campus Legend</span>
          <span class="title-chip">Code Warrior</span>
          <span class="title-chip">Academic Titan</span>
          <span class="title-chip">XP Hunter</span>
        </div>
        <!-- Platinum -->
        <div class="titles-col">
          <div class="col-head" style="color:#38BDF8;">🏆 Platinum</div>
          <span class="title-chip">Tech Maestro</span>
          <span class="title-chip">Elite Achiever</span>
          <span class="title-chip">Honor Graduate</span>
          <span class="title-chip">Innovator</span>
        </div>
        <!-- Diamond -->
        <div class="titles-col">
          <div class="col-head" style="color:#818CF8;">💎 Diamond</div>
          <span class="title-chip">Arcadia Champion</span>
          <span class="title-chip">Legendary Coder</span>
          <span class="title-chip">Grand Scholar</span>
          <span class="title-chip">Paraverse God</span>
        </div>
      </div>
    </div>
  </div>
</section>
