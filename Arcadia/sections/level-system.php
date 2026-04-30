<?php /* includes/level-system.php */ ?>
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
