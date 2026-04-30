<?php /* ============================================================
   SECTION 03 — HOW IT WORKS
   Include: <?php include 'sections/03-how-it-works.php'; ?>
   ============================================================ */ ?>

<style>
    /* ── HOW IT WORKS SECTION ── */
    .arc-how {
        background: #FFFFFF;
        padding: 80px 0;
    }

    /* Section label */
    .arc-section-label {
        display: block;
        font-family: 'Nunito', sans-serif;
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #F97316;
        margin-bottom: 8px;
    }

    /* Section title */
    .arc-section-title {
        font-family: 'Poppins', sans-serif;
        font-size: clamp(1.6rem, 2.5vw, 2.2rem);
        font-weight: 800;
        color: #1C1917;
        margin-bottom: 0.5rem;
    }

    /* Section subtitle */
    .arc-section-sub {
        font-family: 'Nunito', sans-serif;
        font-size: 0.93rem;
        color: #78716C;
        max-width: 480px;
        margin: 0 auto 0.75rem;
        line-height: 1.75;
    }

    /* Orange divider line */
    .arc-divider {
        width: 48px;
        height: 4px;
        background: #F97316;
        border-radius: 2px;
        margin: 0 auto 2.5rem;
    }

    /* Cards */
    .arc-how-card {
        background: #FFF8F1;
        border: 2px solid #F3EDE6;
        border-radius: 18px;
        padding: 2rem 1.5rem;
        text-align: center;
        height: 100%;
        transition: transform 0.22s, box-shadow 0.22s, border-color 0.22s;
    }

    .arc-how-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 36px rgba(249, 115, 22, 0.10);
        border-color: #FDBA74;
    }

    .arc-how-icon {
        width: 68px;
        height: 68px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.9rem;
        margin: 0 auto 1.1rem;
    }

    .arc-how-icon.earn {
        background: #FEF3C7;
    }

    .arc-how-icon.collect {
        background: #DCFCE7;
    }

    .arc-how-icon.redeem {
        background: #FEE2E2;
    }

    .arc-how-card h5 {
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        font-weight: 800;
        color: #1C1917;
        margin-bottom: 0.6rem;
    }

    .arc-how-card p {
        font-family: 'Nunito', sans-serif;
        font-size: 0.86rem;
        color: #78716C;
        line-height: 1.75;
        margin: 0;
    }

    /* Step number chip */
    .arc-how-step {
        display: inline-block;
        background: #F97316;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        font-size: 0.7rem;
        font-weight: 900;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        line-height: 24px;
        text-align: center;
        margin-bottom: 0.6rem;
    }

    @media (max-width: 768px) {
        .arc-how {
            padding: 56px 0;
        }
    }
</style>

<!-- ═══════════════════════════════════════
     HOW IT WORKS SECTION
═══════════════════════════════════════ -->
<section class="arc-how">
    <div class="container text-center">
        <span class="arc-section-label">Simple &amp; Fun</span>
        <h2 class="arc-section-title">How Arcadia Works</h2>
        <p class="arc-section-sub">
            Three easy steps to turn your everyday academic grind into epic adventures.
        </p>
        <div class="arc-divider"></div>

        <div class="row g-4">

            <!-- Step 1: Earn Badges -->
            <div class="col-md-4">
                <div class="arc-how-card">
                    <div class="arc-how-step">1</div>
                    <div class="arc-how-icon earn">🏅</div>
                    <h5>Earn Badges</h5>
                    <p>
                        Complete academic tasks, attend events, join competitions, and achieve
                        milestones to collect digital badges across TLU's ecosystem and prove
                        your skills to the world.
                    </p>
                </div>
            </div>

            <!-- Step 2: Collect XP + Coins -->
            <div class="col-md-4">
                <div class="arc-how-card">
                    <div class="arc-how-step">2</div>
                    <div class="arc-how-icon collect">🪙</div>
                    <h5>Collect XP + Coins</h5>
                    <p>
                        XP unlocks higher ranks and exclusive titles, while Coins let you redeem
                        real merchandise from TLU's official reward store. Every action earns
                        you points in this place.
                    </p>
                </div>
            </div>

            <!-- Step 3: Redeem Real Merch -->
            <div class="col-md-4">
                <div class="arc-how-card">
                    <div class="arc-how-step">3</div>
                    <div class="arc-how-icon redeem">🎁</div>
                    <h5>Redeem Real Merch</h5>
                    <p>
                        Exchange your Coins for exclusive TLU Tech merch. Your effort translates
                        into physical rewards that celebrate your achievements and show off your
                        TLU pride.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>