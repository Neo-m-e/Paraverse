<style>
    /*bg*/
    .arc-worth {
        background-color: #0F0D0C;
        position: relative;
        overflow: hidden;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
    }

    /* glow */
    .arc-worth::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 30%, rgba(232, 82, 26, 0.15) 0%, transparent 80%),
            radial-gradient(circle at 80% 70%, rgba(232, 82, 26, 0.1) 0%, transparent 40%);
        pointer-events: none;
    }

    /* steps container */
    .arc-step-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /*line*/
    .arc-step-line {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 2px;
        background: #E8521A;
        z-index: 0;
        opacity: 0.6;
    }

    /* bubble */
    .arc-icon-circle {
        width: 100px;
        height: 100px;
        background: #1E1B19;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .arc-icon-circle:hover {
        transform: scale(1.1);
        border-color: #E8521A;
    }

    /* Step Number Badge */
    .arc-step-num {
        position: absolute;
        top: 0;
        right: 0;
        background: #E8521A;
        color: white;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        font-size: 12px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Bottom Banner */
    .arc-worth-banner {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        max-width: 800px;
    }

    .text-orange {
        color: #E8521A !important;
    }

    /* scroll animation */
    .arc-worth-step {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .arc-worth-step.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<section class="arc-worth py-20">
    <div class="container position-relative" style="z-index: 1;">

        <!-- Header -->
        <div class="text-center mb-15">
            <span class="text-orange fw-bolder mb-3 d-block text-uppercase ls-2 fs-8">Every Badge Counts</span>
            <h2 class="display-5 fw-bolder text-white mb-5">
                Your Badges Are Worth More <br> Than Just a Picture
            </h2>
            <p class="text-gray-500 fs-6 mx-auto" style="max-width: 650px;">
                Every badge you earn fills your XP and adds Coins in your wallet. <br>
                Save enough Coins and redeem exclusive FEU Tech merch — for free.
            </p>
        </div>

        <!-- Steps -->
        <div class="row g-0 justify-content-center mb-15">

            <!-- Step 1 -->
            <div class="col-md-3 text-center arc-worth-step">
                <div class="d-flex flex-column align-items-center">
                    <div class="arc-step-container w-100 mb-8">
                        <div class="arc-step-line d-none d-md-block" style="left: 50%;"></div>
                        <div class="arc-icon-circle shadow-lg">
                            <span class="arc-step-num fw-bolder">1</span>
                            <span class="fs-1">🥇</span>
                        </div>
                    </div>
                    <h5 class="text-white fw-bolder mb-3 fs-5">Complete a Task</h5>
                    <p class="text-gray-600 fs-7 px-4 fw-semibold">
                        Join events, attend classes, and hit academic milestones to unlock your badges.
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-md-3 text-center arc-worth-step">
                <div class="d-flex flex-column align-items-center">
                    <div class="arc-step-container w-100 mb-8">
                        <div class="arc-step-line d-none d-md-block"></div>
                        <div class="arc-icon-circle shadow-lg">
                            <span class="arc-step-num fw-bolder">2</span>
                            <span class="fs-1">💎</span>
                        </div>
                    </div>
                    <h5 class="text-white fw-bolder mb-3 fs-5">Collect Your Rewards</h5>
                    <p class="text-gray-600 fs-7 px-4 fw-semibold">
                        Every badge auto-credits XP to your level and Coins straight into your wallet.
                    </p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-md-3 text-center arc-worth-step">
                <div class="d-flex flex-column align-items-center">
                    <div class="arc-step-container w-100 mb-8">
                        <div class="arc-step-line d-none d-md-block" style="right: 50%;"></div>
                        <div class="arc-icon-circle shadow-lg">
                            <span class="arc-step-num fw-bolder">3</span>
                            <span class="fs-1">🛍️</span>
                        </div>
                    </div>
                    <h5 class="text-white fw-bolder mb-3 fs-5">Claim Free Merch</h5>
                    <p class="text-gray-600 fs-7 px-4 fw-semibold">
                        Saved enough Coins? Swap them for exclusive limited-edition FEU Tech merch.
                    </p>
                </div>
            </div>

        </div>

        <!-- Bottom Banner -->
        <div class="arc-worth-banner mx-auto p-8 p-md-10 mt-10">
            <div class="d-flex align-items-center gap-6">
                <span class="fs-2">⚡</span>
                <p class="text-gray-500 mb-0 fs-6 fw-semibold">
                    Your <span class="text-orange fw-bolder">XP also levels you up</span> — and the higher your level, the higher you climb on the
                    <a href="#" class="text-orange text-decoration-none fw-bolder">Leaderboard</a>. <br class="d-none d-md-block">
                    More badges = more XP = higher level = top of the board.
                </p>
            </div>
        </div>

    </div>
</section>

<script>
    /* ── Animate steps on scroll ── */
    const worthSteps = document.querySelectorAll('.arc-worth-step');
    const worthObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, i * 200);
                worthObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    worthSteps.forEach(step => worthObserver.observe(step));
</script>