<?php /* includes/hall-of-fame.php */ ?>
<style>
    /* ── EXACT BG FROM ARC-WRAPPER-FLUID ── */
    .hof-wrapper-fluid {
        width: 100vw;
        background-color: #FFF9F3;
        margin-left: calc(-50vw + 50%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .hof-wrapper-fluid::before,
    .hof-wrapper-fluid::after {
        content: "";
        position: absolute;
        pointer-events: none;
        z-index: 1;
    }

    .hof-wrapper-fluid::before {
        top: -5%;
        right: -5%;
        width: 700px;
        height: 700px;
        background: radial-gradient(circle, rgba(255, 219, 199, 0.6) 0%, rgba(255, 249, 243, 0) 70%);
        filter: blur(80px);
    }

    /* Container for content */
    .arc-container {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }

    /* ── PODIUM STYLES ── */
    .podium-wrap {
        display: flex;
        align-items: flex-end;
        justify-content: center;
        gap: 0;
        margin-bottom: 4rem;
        margin-top: 3rem;
    }

    .podium-item { 
        text-align: center; 
        position: relative;
        z-index: 2;
    }

    .podium-avatar-box {
        width: 110px; height: 110px;
        background: #1a1614; 
        border-radius: 35px;
        margin: 0 auto 15px;
        display: flex; align-items: center; justify-content: center;
        position: relative;
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .podium-item.first .podium-avatar-box { 
        width: 135px; height: 135px; 
        border: 4px solid #FFD700;
        transform: translateY(-20px);
    }

    .avatar-emoji { font-size: 2.5rem; }
    .podium-item.first .avatar-emoji { font-size: 3.2rem; }

    .rank-badge-mini {
        position: absolute;
        bottom: 5px; right: 5px;
        width: 28px; height: 28px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 900; font-size: 0.8rem;
        border: 2px solid #1a1614;
    }
    .podium-item.first .rank-badge-mini { background: #F59E0B; color: #fff; width: 32px; height: 32px; }
    .podium-item.second .rank-badge-mini { background: #94A3B8; color: #fff; }
    .podium-item.third .rank-badge-mini { background: #CD7C3A; color: #fff; }

    .podium-name { font-size: 0.95rem; font-weight: 800; color: #1C1917; margin-bottom: 2px; }
    .podium-xp { font-size: 0.85rem; font-weight: 700; color: #F97316; opacity: 0.8; margin-bottom: 15px; }

    .podium-base {
        display: flex; align-items: center; justify-content: center;
        font-size: 2.5rem; font-weight: 900;
    }
    .podium-item.first .podium-base { 
        height: 140px; width: 160px;
        background: linear-gradient(180deg, #FFD966, #F59E0B);
        color: rgba(255,255,255,0.6);
        border-radius: 12px 12px 0 0;
    }
    .podium-item.second .podium-base { 
        height: 100px; width: 140px;
        background: linear-gradient(180deg, #E2E8F0, #94A3B8);
        color: rgba(255,255,255,0.6);
        border-radius: 12px 0 0 0;
    }
    .podium-item.third .podium-base { 
        height: 80px; width: 140px;
        background: linear-gradient(180deg, #CD7C3A, #8B4513);
        color: rgba(255,255,255,0.6);
        border-radius: 0 12px 0 0;
    }

    /* ── MINI LEADERBOARD ── */
    .other-players-label {
        color: #D1D5DB;
        text-transform: uppercase;
        font-weight: 800;
        font-size: 0.7rem;
        letter-spacing: 2px;
        margin-bottom: 2rem;
    }

    .mini-leaderboard-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        margin-bottom: 3rem;
    }

    .leaderboard-row-mini {
        display: flex; align-items: center; gap: 12px;
        background: rgba(255, 255, 255, 0.7);
        border: 1px solid #E7E5E4;
        border-radius: 15px;
        padding: 10px 20px;
        min-width: 240px;
        transition: all 0.2s;
    }
    .leaderboard-row-mini:hover { transform: translateY(-3px); background: #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }

    .rank-num { font-weight: 900; font-size: 1rem; color: #1C1917; }
    .mini-av {
        width: 35px; height: 35px; background: #1a1614; border-radius: 10px;
        display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
    }
    .mini-info .m-name { font-size: 0.85rem; font-weight: 800; display: block; }
    .mini-info .m-xp { font-size: 0.75rem; color: #78716C; font-weight: 600; }

    .btn-view-leaderboard {
        background: linear-gradient(90deg, #F97316, #EA580C);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-weight: 800;
        font-size: 1rem;
        padding: 1rem 2.5rem;
        box-shadow: 0 10px 20px rgba(249,115,22,0.2);
        cursor: pointer;
    }
</style>

<section class="hof-wrapper-fluid">
    <div class="arc-container text-center">
            <span class="badge rounded-pill px-3 py-2 mb-4" style="background:#FFDBC7; color:#E8521A; font-weight: 800; font-size: 0.8rem; letter-spacing: 1px;">COLLECTIBLES</span>
       <h2 class="fw-bolder mt-3" style="font-size: 4rem; color: #1a1614; font-family: 'Inter', sans-serif;">Hall of Fame</h2>
        <p class="text-muted fw-semibold mb-5">12,581 players competing. Where do you rank?</p>

        <!-- Podium Section -->
        <div class="podium-wrap">
            <!-- 2nd -->
            <div class="podium-item second">
                <div class="podium-avatar-box">
                    <span class="avatar-emoji">🐹</span>
                    <div class="rank-badge-mini">2</div>
                </div>
                <div class="podium-name">Janine C. Miguel</div>
                <div class="podium-xp">48,200 XP</div>
                <div class="podium-base">2</div>
            </div>

            <!-- 1st -->
            <div class="podium-item first">
                <div class="podium-avatar-box">
                    <span class="avatar-emoji">🐻</span>
                    <div class="rank-badge-mini">1</div>
                </div>
                <div class="podium-name">Juan T. Hernandez</div>
                <div class="podium-xp" style="color: #F59E0B;">62,850 XP</div>
                <div class="podium-base">1</div>
            </div>

            <!-- 3rd -->
            <div class="podium-item third">
                <div class="podium-avatar-box">
                    <span class="avatar-emoji">🐱</span>
                    <div class="rank-badge-mini">3</div>
                </div>
                <div class="podium-name">Mark T. Castillo</div>
                <div class="podium-xp">41,100 XP</div>
                <div class="podium-base">3</div>
            </div>
        </div>

        <div class="other-players-label">Other Top Players</div>

        <!-- Mini Rows Grid -->
        <div class="mini-leaderboard-flex">
            <?php 
            $others = [
                ['r'=>4, 'e'=>'🦊', 'n'=>'Sofia R. Cruz', 'x'=>'37,450 XP'],
                ['r'=>5, 'e'=>'🐴', 'n'=>'Carlos M. Reyes', 'x'=>'33,800 XP'],
                ['r'=>6, 'e'=>'🐯', 'n'=>'Ana P. Santos', 'x'=>'29,600 XP'],
                ['r'=>7, 'e'=>'🦁', 'n'=>'Diego L. Torres', 'x'=>'25,120 XP'],
                ['r'=>8, 'e'=>'🐸', 'n'=>'Maria C. Bautista', 'x'=>'21,980 XP']
            ];
            foreach($others as $p): ?>
                <div class="leaderboard-row-mini">
                    <span class="rank-num"><?= $p['r'] ?></span>
                    <div class="mini-av"><?= $p['e'] ?></div>
                    <div class="mini-info text-start">
                        <span class="m-name"><?= $p['n'] ?></span>
                        <span class="m-xp"><?= $p['x'] ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="btn-view-leaderboard">View Full Leaderboard →</button>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const viewBtn = document.querySelector('.btn-view-leaderboard');
    if (viewBtn) {
        viewBtn.addEventListener('click', function() {
            console.log("Navigating to full leaderboard...");
            // window.location.href = 'leaderboard.php'; 
        });
    }

    const podiumBoxes = document.querySelectorAll('.podium-avatar-box');
    podiumBoxes.forEach(box => {
        box.addEventListener('mouseenter', () => {
            box.style.transition = 'transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            box.style.transform = box.parentElement.classList.contains('first') 
                ? 'translateY(-30px) scale(1.05)' 
                : 'translateY(-10px) scale(1.05)';
        });
        box.addEventListener('mouseleave', () => {
            box.style.transform = box.parentElement.classList.contains('first') 
                ? 'translateY(-20px) scale(1)' 
                : 'translateY(0) scale(1)';
        });
    });

    const xpValues = document.querySelectorAll('.podium-xp, .m-xp');
    xpValues.forEach(xp => {
        xp.style.opacity = '0';
        setTimeout(() => {
            xp.style.transition = 'opacity 1s ease-in';
            xp.style.opacity = '1';
        }, 500);
    });
});
</script>