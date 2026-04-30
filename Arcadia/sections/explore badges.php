<?php /* ============================================================
   SECTION 05 — EXPLORE BADGES (clickable category filter)
   Include: <?php include 'sections/05-explore-badges.php'; ?>
   ============================================================ */ ?>

<style>
    /* ── EXPLORE BADGES SECTION ── */
    .arc-badges {
        background: #FFF8F1;
        padding: 84px 0;
    }

    /* Filter pill tabs */
    .arc-filter-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .arc-filter-btn {
        background: #FFFFFF;
        border: 2px solid #E7E5E4;
        color: #1C1917;
        font-family: 'Nunito', sans-serif;
        font-size: 0.78rem;
        font-weight: 700;
        padding: 5px 15px;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.18s;
        line-height: 1.5;
    }

    .arc-filter-btn:hover {
        border-color: #F97316;
        color: #F97316;
        background: #FFF8F1;
    }

    .arc-filter-btn.active {
        background: #F97316;
        border-color: #F97316;
        color: #FFFFFF;
        box-shadow: 0 3px 10px rgba(249, 115, 22, 0.28);
    }

    /* Badge grid */
    .arc-badge-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(148px, 1fr));
        gap: 1rem;
    }

    .arc-badge-item {
        background: #FFFFFF;
        border: 2px solid #E7E5E4;
        border-radius: 16px;
        padding: 1.25rem 1rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.22s;
        /* hidden by default — JS toggles .visible */
        display: none;
    }

    .arc-badge-item.visible {
        display: block;
        animation: badgeFadeIn 0.3s ease both;
    }

    @keyframes badgeFadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .arc-badge-item:hover {
        border-color: #F97316;
        box-shadow: 0 8px 24px rgba(249, 115, 22, 0.13);
        transform: translateY(-3px);
    }

    /* Badge icon circle */
    .arc-badge-ico {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FDE8D0, #fcd9a8);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        margin: 0 auto 0.75rem;
    }

    .arc-badge-item h6 {
        font-family: 'Poppins', sans-serif;
        font-size: 0.77rem;
        font-weight: 800;
        color: #1C1917;
        margin-bottom: 5px;
        line-height: 1.3;
    }

    .arc-badge-xp {
        font-family: 'Nunito', sans-serif;
        font-size: 0.7rem;
        font-weight: 800;
        color: #F97316;
        margin-bottom: 3px;
    }

    .arc-badge-count {
        font-family: 'Nunito', sans-serif;
        font-size: 0.67rem;
        color: #A8A29E;
    }

    /* Show All button */
    .arc-show-all-btn {
        display: inline-block;
        margin-top: 2rem;
        background: #FFFFFF;
        border: 2px solid #E7E5E4;
        color: #1C1917;
        font-family: 'Nunito', sans-serif;
        font-weight: 800;
        font-size: 0.85rem;
        padding: 0.55rem 1.7rem;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .arc-show-all-btn:hover {
        border-color: #F97316;
        color: #F97316;
        background: #FFF8F1;
    }

    @media (max-width: 576px) {
        .arc-badge-grid {
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
        }
    }
</style>

<!-- ═══════════════════════════════════════
     EXPLORE BADGES SECTION
═══════════════════════════════════════ -->
<section class="arc-badges">
    <div class="container text-center">

        <span class="arc-section-label">Badge</span>
        <h2 class="arc-section-title">Explore Badges</h2>
        <p class="arc-section-sub mx-auto">
            Hundreds of badges across 9 categories. Each badge earns Micro XP and bragging rights.
        </p>
        <div class="arc-divider"></div>

        <!-- ── Category Filter Tabs ── -->
        <div class="arc-filter-wrap">
            <button class="arc-filter-btn active" data-filter="all">🌟 All</button>
            <button class="arc-filter-btn" data-filter="coding">💻 Coding</button>
            <button class="arc-filter-btn" data-filter="academic">📚 Academic</button>
            <button class="arc-filter-btn" data-filter="leadership">🦁 Leadership</button>
            <button class="arc-filter-btn" data-filter="extracurricular">🎭 Extracurricular</button>
            <button class="arc-filter-btn" data-filter="athletics">🏃 Athletics</button>
            <button class="arc-filter-btn" data-filter="research">🔬 Research</button>
            <button class="arc-filter-btn" data-filter="special">⭐ Special</button>
            <button class="arc-filter-btn" data-filter="event">🎪 Event</button>
            <button class="arc-filter-btn" data-filter="rare">💎 Rare</button>
        </div>

        <!-- ── Badge Grid ── -->
        <div class="arc-badge-grid">

            <!-- CODING -->
            <div class="arc-badge-item" data-cat="coding">
                <div class="arc-badge-ico">💻</div>
                <h6>TBD Gradbook Quizzes</h6>
                <div class="arc-badge-xp">⚡ 50 XP · 🪙 25</div>
                <div class="arc-badge-count">12.4K claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="coding">
                <div class="arc-badge-ico">⚙️</div>
                <h6>Algorithms Ace</h6>
                <div class="arc-badge-xp">⚡ 80 XP · 🪙 40</div>
                <div class="arc-badge-count">3.2K claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="coding">
                <div class="arc-badge-ico">🔧</div>
                <h6>TECHNOHUB</h6>
                <div class="arc-badge-xp">⚡ 120 XP · 🪙 60</div>
                <div class="arc-badge-count">1.8K claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="coding rare">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#EDE9FE,#C4B5FD);">🧬</div>
                <h6>Paraverse Publisher</h6>
                <div class="arc-badge-xp">⚡ 200 XP · 🪙 100</div>
                <div class="arc-badge-count">500 claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="coding rare">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#DBEAFE,#BFDBFE);">🌐</div>
                <h6>TaroVerse Legend SDK</h6>
                <div class="arc-badge-xp">⚡ 300 XP · 🪙 150</div>
                <div class="arc-badge-count">120 claimed</div>
            </div>

            <!-- ACADEMIC -->
            <div class="arc-badge-item" data-cat="academic">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#DCFCE7,#BBF7D0);">📖</div>
                <h6>Dean's Lister</h6>
                <div class="arc-badge-xp">⚡ 150 XP · 🪙 75</div>
                <div class="arc-badge-count">4.1K claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="academic">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#FEF3C7,#FDE68A);">🎓</div>
                <h6>Perfect Attendance</h6>
                <div class="arc-badge-xp">⚡ 100 XP · 🪙 50</div>
                <div class="arc-badge-count">6.8K claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="academic">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#F5F3FF,#EDE9FE);">✏️</div>
                <h6>Thesis Defender</h6>
                <div class="arc-badge-xp">⚡ 250 XP · 🪙 125</div>
                <div class="arc-badge-count">900 claimed</div>
            </div>

            <!-- LEADERSHIP -->
            <div class="arc-badge-item" data-cat="leadership">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#FEE2E2,#FECACA);">🦁</div>
                <h6>Student Council</h6>
                <div class="arc-badge-xp">⚡ 180 XP · 🪙 90</div>
                <div class="arc-badge-count">250 claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="leadership">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#FFEDD5,#FED7AA);">👑</div>
                <h6>Org President</h6>
                <div class="arc-badge-xp">⚡ 400 XP · 🪙 200</div>
                <div class="arc-badge-count">80 claimed</div>
            </div>

            <!-- EXTRACURRICULAR -->
            <div class="arc-badge-item" data-cat="extracurricular">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#FCE7F3,#FBCFE8);">🎭</div>
                <h6>Drama Club Star</h6>
                <div class="arc-badge-xp">⚡ 75 XP · 🪙 35</div>
                <div class="arc-badge-count">700 claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="extracurricular">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#ECFDF5,#A7F3D0);">🎵</div>
                <h6>Choir Member</h6>
                <div class="arc-badge-xp">⚡ 60 XP · 🪙 30</div>
                <div class="arc-badge-count">1.1K claimed</div>
            </div>

            <!-- ATHLETICS -->
            <div class="arc-badge-item" data-cat="athletics">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#DBEAFE,#BFDBFE);">🏅</div>
                <h6>Varsity Athlete</h6>
                <div class="arc-badge-xp">⚡ 130 XP · 🪙 65</div>
                <div class="arc-badge-count">380 claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="athletics">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#F0FDF4,#DCFCE7);">⚽</div>
                <h6>Sports Champion</h6>
                <div class="arc-badge-xp">⚡ 220 XP · 🪙 110</div>
                <div class="arc-badge-count">140 claimed</div>
            </div>

            <!-- RESEARCH -->
            <div class="arc-badge-item" data-cat="research">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#F5F3FF,#EDE9FE);">🔬</div>
                <h6>Research Fellow</h6>
                <div class="arc-badge-xp">⚡ 280 XP · 🪙 140</div>
                <div class="arc-badge-count">220 claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="research">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#EFF6FF,#DBEAFE);">📊</div>
                <h6>Data Analyst</h6>
                <div class="arc-badge-xp">⚡ 200 XP · 🪙 100</div>
                <div class="arc-badge-count">310 claimed</div>
            </div>

            <!-- SPECIAL -->
            <div class="arc-badge-item" data-cat="special rare">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#FEF9C3,#FEF08A);">⭐</div>
                <h6>Founding Member</h6>
                <div class="arc-badge-xp">⚡ 500 XP · 🪙 250</div>
                <div class="arc-badge-count">50 claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="special">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#FFFBEB,#FEF3C7);">🏆</div>
                <h6>Top Performer</h6>
                <div class="arc-badge-xp">⚡ 350 XP · 🪙 175</div>
                <div class="arc-badge-count">90 claimed</div>
            </div>

            <!-- EVENT -->
            <div class="arc-badge-item" data-cat="event">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#FFF1F2,#FFE4E6);">🎪</div>
                <h6>Hackathon Finisher</h6>
                <div class="arc-badge-xp">⚡ 160 XP · 🪙 80</div>
                <div class="arc-badge-count">600 claimed</div>
            </div>
            <div class="arc-badge-item" data-cat="event">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#F0F9FF,#E0F2FE);">🥇</div>
                <h6>Hackathon Winner</h6>
                <div class="arc-badge-xp">⚡ 350 XP · 🪙 175</div>
                <div class="arc-badge-count">45 claimed</div>
            </div>

            <!-- RARE -->
            <div class="arc-badge-item" data-cat="rare">
                <div class="arc-badge-ico" style="background:linear-gradient(135deg,#F5F3FF,#8B5CF6);color:#fff;">💎</div>
                <h6>Diamond Scholar</h6>
                <div class="arc-badge-xp">⚡ 600 XP · 🪙 300</div>
                <div class="arc-badge-count">18 claimed</div>
            </div>

        </div><!-- /.arc-badge-grid -->

        <button class="arc-show-all-btn" id="arcShowAll">Show All Badges →</button>

    </div>
</section>

<script>
    /* ── BADGE FILTER ── */
    (function() {
        const filterBtns = document.querySelectorAll('.arc-filter-btn');
        const badgeItems = document.querySelectorAll('.arc-badge-item');
        const showAllBtn = document.getElementById('arcShowAll');

        /* Show badges matching category */
        function applyFilter(cat) {
            badgeItems.forEach(item => {
                const cats = item.dataset.cat || '';
                if (cat === 'all' || cats.split(' ').includes(cat)) {
                    item.classList.add('visible');
                } else {
                    item.classList.remove('visible');
                }
            });
        }

        /* Default — show all */
        applyFilter('all');

        /* Tab clicks */
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                applyFilter(this.dataset.filter);
                if (showAllBtn) showAllBtn.textContent = 'Show All Badges →';
                isShowingAll = false;
            });
        });

        /* Show All / Show Less toggle */
        let isShowingAll = false;
        if (showAllBtn) {
            showAllBtn.addEventListener('click', function() {
                isShowingAll = !isShowingAll;
                if (isShowingAll) {
                    badgeItems.forEach(item => item.classList.add('visible'));
                    this.textContent = 'Show Less ↑';
                } else {
                    const active = document.querySelector('.arc-filter-btn.active');
                    applyFilter(active ? active.dataset.filter : 'all');
                    this.textContent = 'Show All Badges →';
                }
            });
        }
    })();
</script>