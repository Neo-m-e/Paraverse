<?php /* includes/faq.php */ ?>
<style>
    /* ── SECTION BG (Hof Version) ── */
    .hof-section {
        position: relative;
        padding: 120px 0;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
        background: #ffffff; 
        overflow: hidden;
    }

    /* Wave SVG as Background using ::before */
    .hof-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* Gamit yung path/wave SVG mo beh */
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 1440 800' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3CradialGradient id='w9a' cx='0%25' cy='50%25' r='55%25'%3E%3Cstop offset='0%25' stop-color='%23E8521A' stop-opacity='0.09'/%3E%3Cstop offset='100%25' stop-color='%23E8521A' stop-opacity='0'/%3E%3C/radialGradient%3E%3CradialGradient id='w9b' cx='100%25' cy='50%25' r='55%25'%3E%3Cstop offset='0%25' stop-color='%23F5A623' stop-opacity='0.09'/%3E%3Cstop offset='100%25' stop-color='%23F5A623' stop-opacity='0'/%3E%3C/radialGradient%3E%3C/defs%3E%3Crect width='1440' height='800' fill='url(%23w9a)'/%3E%3Crect width='1440' height='800' fill='url(%23w9b)'/%3E%3Cpath d='M-100 600 Q360 200 720 400 Q1080 600 1540 200' fill='none' stroke='rgba(232,82,26,0.09)' stroke-width='3'/%3E%3Cpath d='M-100 700 Q360 300 720 500 Q1080 700 1540 300' fill='none' stroke='rgba(232,82,26,0.06)' stroke-width='2.5'/%3E%3Cpath d='M-100 500 Q360 100 720 300 Q1080 500 1540 100' fill='none' stroke='rgba(232,82,26,0.04)' stroke-width='2'/%3E%3Cpath d='M1540 600 Q1080 200 720 400 Q360 600 -100 200' fill='none' stroke='rgba(245,166,35,0.07)' stroke-width='3'/%3E%3Cpath d='M1540 700 Q1080 300 720 500 Q360 700 -100 300' fill='none' stroke='rgba(245,166,35,0.05)' stroke-width='2.5'/%3E%3C/svg%3E");
        background-size: cover;
        background-position: center;
        z-index: 0;
        pointer-events: none;
    }

    .hof-container {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }

    .hof-tag {
        background-color: #FFF2EB;
        border: 1.2px solid #FFD8C2;
        border-radius: 50px;
        color: #E8521A;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        padding: 6px 20px;
        display: inline-block;
        margin-bottom: 15px;
    }

    /* ── ORIGINAL ACCORDION STYLES ── */
    .faq-accordion .accordion-item {
        border: 1px solid #E7E5E4;
        border-radius: 12px !important;
        margin-bottom: 0.75rem;
        overflow: hidden;
        background: #fff;
    }
    .faq-accordion .accordion-button {
        font-weight: 700;
        font-size: 0.92rem;
        background: #fff;
        color: #1C1917;
        box-shadow: none;
        padding: 1.1rem 1.25rem;
    }
    .faq-accordion .accordion-button:not(.collapsed) {
        background: #FDE8D0;
        color: #F97316;
    }
    .faq-accordion .accordion-button::after {
        filter: none;
    }
    .faq-accordion .accordion-button:not(.collapsed)::after {
        filter: hue-rotate(20deg) saturate(2);
    }
    .faq-accordion .accordion-body {
        font-size: 0.87rem;
        color: #78716C;
        line-height: 1.8;
        background: #fff;
    }

    /* ── UTILITIES & TITLES ── */
    .divider-orange {
        width: 48px; height: 4px;
        background: #F97316;
        border-radius: 2px;
        margin: 0 auto 1rem;
    }
    .section-title {
        font-size: clamp(1.6rem, 2.5vw, 2.2rem);
        font-weight: 800;
        color: #1C1917;
        margin-bottom: 0.5rem;
    }
    .section-subtitle {
        font-size: 0.92rem;
        color: #78716C;
        max-width: 500px;
        margin: 0 auto 2.5rem;
        line-height: 1.7;
    }
</style>

<section class="hof-section">
    <div class="hof-container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <span class="hof-tag">Got Questions?</span>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Everything you need to know about Arcadia.</p>
                <div class="divider-orange"></div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="accordion faq-accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What is Arcadia?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Arcadia is a gamified learning platform at TLU Tech that turns academic participation into real rewards. You earn digital badges, collect XP and Coins by completing academic tasks, attending events, and joining competitions. These can be exchanged for exclusive TLU merchandise and climb the leaderboard.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                How do I earn points?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Points (XP and Coins) are earned automatically when you complete qualifying activities such as attending classes with perfect records, submitting projects, winning competitions, joining org events, and achieving academic milestones. Each badge has a defined XP and Coin reward listed on the badge page.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What can I do with my points?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                XP raises your rank on the leaderboard and unlocks exclusive Titles (e.g., "Campus Legend", "Diamond Scholar"). Coins are your currency — visit the Arcadia Store to redeem them for official TLU Tech merchandise like hoodies, shirts, tote bags, and powerbanks.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                How does the Hall of Fame work?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The Hall of Fame shows the top-ranked students by total XP earned. Rankings are updated in real-time as students complete tasks and earn badges. The top 3 students are featured on the podium, and the full leaderboard shows rankings for all registered participants.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                Is Arcadia free to use?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! Arcadia is completely free for all registered TLU students. Simply log in with your school credentials and start earning badges, XP, and Coins right away.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                Where do I claim my orders?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                After redeeming your Coins for a reward in the Arcadia Store, you will receive a claim code via email. Present this code at the designated TLU Tech office or during scheduled claim events on campus.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>