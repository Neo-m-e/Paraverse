<?php /* ============================================================
   SECTION 06 — CLAIMABLE REWARDS
   Include: <?php include 'sections/06-claimable-rewards.php'; ?>
   ============================================================ */ ?>

<style>
    /* ── CLAIMABLE REWARDS SECTION ── */
    .arc-rewards {
        background: #FFFFFF;
        padding: 84px 0;
    }

    /* Card */
    .arc-reward-card {
        border: 2px solid #E7E5E4;
        border-radius: 18px;
        overflow: hidden;
        background: #FFFFFF;
        height: 100%;
        transition: border-color 0.22s, transform 0.22s, box-shadow 0.22s;
    }

    .arc-reward-card:hover {
        border-color: #F97316;
        transform: translateY(-4px);
        box-shadow: 0 14px 36px rgba(249, 115, 22, 0.10);
    }

    /* Image / product area */
    .arc-reward-img {
        width: 100%;
        height: 165px;
        background: linear-gradient(135deg, #1C1917 0%, #292524 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        position: relative;
    }

    /* "NEW" badge chip */
    .arc-reward-new {
        position: absolute;
        top: 10px;
        left: 10px;
        background: #F97316;
        color: #fff;
        font-family: 'Nunito', sans-serif;
        font-size: 0.62rem;
        font-weight: 900;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 2px 9px;
        border-radius: 6px;
    }

    /* Limited chip */
    .arc-reward-ltd {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(255, 255, 255, 0.12);
        color: #fff;
        font-family: 'Nunito', sans-serif;
        font-size: 0.6rem;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 6px;
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    /* Card body */
    .arc-reward-body {
        padding: 1rem 1.1rem 1.2rem;
    }

    .arc-reward-name {
        font-family: 'Poppins', sans-serif;
        font-size: 0.86rem;
        font-weight: 800;
        color: #1C1917;
        margin-bottom: 3px;
    }

    .arc-reward-sub {
        font-family: 'Nunito', sans-serif;
        font-size: 0.74rem;
        color: #78716C;
        line-height: 1.55;
        margin-bottom: 0.75rem;
    }

    .arc-reward-cost {
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        font-weight: 800;
        color: #F97316;
    }

    .arc-reward-stock {
        font-family: 'Nunito', sans-serif;
        font-size: 0.7rem;
        color: #A8A29E;
        font-weight: 700;
    }

    /* Claim button */
    .arc-btn-claim {
        display: block;
        width: 100%;
        margin-top: 0.75rem;
        background: #FFF8F1;
        border: 2px solid #F97316;
        color: #F97316;
        font-family: 'Nunito', sans-serif;
        font-weight: 800;
        font-size: 0.8rem;
        padding: 0.45rem;
        border-radius: 9px;
        cursor: pointer;
        transition: all 0.18s;
        text-align: center;
        text-decoration: none;
    }

    .arc-btn-claim:hover {
        background: #F97316;
        color: #fff;
    }

    @media (max-width: 768px) {
        .arc-rewards {
            padding: 56px 0;
        }
    }
</style>

<!-- ═══════════════════════════════════════
     CLAIMABLE REWARDS SECTION
═══════════════════════════════════════ -->
<section class="arc-rewards">
    <div class="container text-center">

        <span class="arc-section-label">Store</span>
        <h2 class="arc-section-title">Claimable Rewards</h2>
        <p class="arc-section-sub mx-auto">
            Redeem your hard-earned Coins for exclusive rewards linked to official TLU Tech.
        </p>
        <div class="arc-divider"></div>

        <div class="row g-4 mt-1">

            <!-- Reward 1: Hoodie -->
            <div class="col-lg-3 col-md-6">
                <div class="arc-reward-card">
                    <div class="arc-reward-img" style="background:linear-gradient(135deg,#1C1917,#292524);">
                        <span class="arc-reward-new">NEW</span>
                        <span class="arc-reward-ltd">Limited</span>
                        🧥
                    </div>
                    <div class="arc-reward-body">
                        <div class="arc-reward-name">Paraverse Hoodie</div>
                        <div class="arc-reward-sub">Exclusive limited edition Arcadia hoodie — Official TLU Merchandise</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="arc-reward-cost">🪙 4,500</div>
                            <div class="arc-reward-stock">Qty: 15</div>
                        </div>
                        <a href="#" class="arc-btn-claim">Claim Now</a>
                    </div>
                </div>
            </div>

            <!-- Reward 2: Shirt -->
            <div class="col-lg-3 col-md-6">
                <div class="arc-reward-card">
                    <div class="arc-reward-img" style="background:linear-gradient(135deg,#1e3a5f,#1D4ED8);">
                        👕
                    </div>
                    <div class="arc-reward-body">
                        <div class="arc-reward-name">Paraverse Shirt</div>
                        <div class="arc-reward-sub">Official TLU Tech exclusive drifit shirt — available in all sizes</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="arc-reward-cost">🪙 3,200</div>
                            <div class="arc-reward-stock">Qty: 30</div>
                        </div>
                        <a href="#" class="arc-btn-claim">Claim Now</a>
                    </div>
                </div>
            </div>

            <!-- Reward 3: Tote Bag -->
            <div class="col-lg-3 col-md-6">
                <div class="arc-reward-card">
                    <div class="arc-reward-img" style="background:linear-gradient(135deg,#064e3b,#059669);">
                        👜
                    </div>
                    <div class="arc-reward-body">
                        <div class="arc-reward-name">Paraverse Tote Bag</div>
                        <div class="arc-reward-sub">Premium canvas tote bag with Arcadia embroidered logo — eco-friendly</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="arc-reward-cost">🪙 4,900</div>
                            <div class="arc-reward-stock">Qty: 20</div>
                        </div>
                        <a href="#" class="arc-btn-claim">Claim Now</a>
                    </div>
                </div>
            </div>

            <!-- Reward 4: Powerbank -->
            <div class="col-lg-3 col-md-6">
                <div class="arc-reward-card">
                    <div class="arc-reward-img" style="background:linear-gradient(135deg,#1e1b4b,#4338CA);">
                        🔋
                    </div>
                    <div class="arc-reward-body">
                        <div class="arc-reward-name">Paraverse Powerbank</div>
                        <div class="arc-reward-sub">Official TLU Tech 10,000mAh fast-charge powerbank — Premium Edition</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="arc-reward-cost">🪙 6,300</div>
                            <div class="arc-reward-stock">Qty: 10</div>
                        </div>
                        <a href="#" class="arc-btn-claim">Claim Now</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>