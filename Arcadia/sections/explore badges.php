<style>
    /*bg*/
    .arc-wrapper-fluid {
        width: 100vw;
        background-color: #FFF9F3;
        margin-left: calc(-50vw + 50%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .arc-wrapper-fluid::before,
    .arc-wrapper-fluid::after {
        content: "";
        position: absolute;
        pointer-events: none;
        z-index: 1;
    }

    .arc-wrapper-fluid::before {
        top: -5%;
        right: -5%;
        width: 700px;
        height: 700px;
        background: radial-gradient(circle, rgba(255, 219, 199, 0.6) 0%, rgba(255, 249, 243, 0) 70%);
        filter: blur(80px);
    }

    /*to be aligned to logo and lock*/
    .arc-container {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }

    /*filter*/
    .arc-filter-btn {
        background: #FFFFFF;
        border: 1px solid #2D2D2D;
        color: #2D2D2D;
        font-weight: 700;
        padding: 8px 22px;
        border-radius: 50px;
        transition: all 0.2s ease;
        cursor: pointer;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .arc-filter-btn.active {
        background: #F05A28;
        color: #FFFFFF !important;
        border-color: #F05A28;
        box-shadow: 0 4px 15px rgba(240, 90, 40, 0.4);
    }

    /*description*/
    .arc-category-desc {
        color: #4B5563;
        font-weight: 500;
        font-size: 0.95rem;
        margin: 20px 0 50px 0;
        min-height: 1.5em;
        transition: opacity 0.3s ease;
        text-align: left;
        white-space: nowrap;
    }

    /*badges container*/
    .arc-badge-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
        width: 100%;
    }

    @media (max-width: 1200px) {
        .arc-badge-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .arc-badge-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /*cards*/
    .arc-card {
        background: #FFFFFF;
        border: 1px solid #D1D5DB;
        border-radius: 24px;
        padding: 40px 20px;
        text-align: center;
        transition: transform 0.3s ease, border-color 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
    }

    .arc-card:hover {
        transform: translateY(-8px);
        border-color: #F05A28;
    }

    .arc-badge-img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-bottom: 25px;
    }

    .arc-card h6 {
        font-size: 0.95rem;
        font-weight: 800;
        color: #1F2937;
        margin-bottom: 10px;
    }

    .arc-xp {
        color: #F05A28;
        font-weight: 800;
        font-size: 0.8rem;
    }

    .arc-coins {
        color: #9CA3AF;
        font-size: 0.75rem;
    }

    .btn-arc-view {
        border: 1px solid #2D2D2D;
        border-radius: 50px;
        padding: 12px 45px;
        background: #FFFFFF;
        font-weight: 700;
        margin-top: 50px;
        transition: 0.3s;
    }

    .btn-arc-view:hover {
        background: #2D2D2D;
        color: #FFFFFF;
    }
</style>

<div class="arc-wrapper-fluid">
    <div class="arc-container">
        <div class="mb-10 text-start">
            <span class="badge rounded-pill px-3 py-2 mb-4" style="background:#FFDBC7; color:#E8521A; font-weight: 800; font-size: 0.65rem; letter-spacing: 1px;">COLLECTIBLES</span>
            <h2 class="display-5 fw-bolder text-dark mb-3">Explore Badges</h2>
            <p style="max-width: 550px;">
                Hundreds of badges across 8 categories. Each badge unlocks XP and bragging rights.
            </p>
        </div>

        <div class="d-flex flex-wrap justify-content-start gap-2 mb-4">
            <button class="arc-filter-btn active" onclick="filterArcadia('top', this, 'Unlock a world of achievements, from academic excellence to extracurricular success.')">Top Badges</button>
            <button class="arc-filter-btn" onclick="filterArcadia('fun', this, 'Easily earned for engaging in enjoyable activities')">🎮 Fun</button>
            <button class="arc-filter-btn" onclick="filterArcadia('activity', this, 'Participation in extracurricular engagements')">🏅 Activity</button>
            <button class="arc-filter-btn" onclick="filterArcadia('learning', this, 'Demonstrating skill mastery or academic progress')">📚 Learning</button>
            <button class="arc-filter-btn" onclick="filterArcadia('exclusive', this, 'Access-based, reserved for select users')">🔒 Exclusive</button>
            <button class="arc-filter-btn" onclick="filterArcadia('milestone', this, 'Marks significant progress, achievements, or long-term dedication')">🎯 Milestone</button>
            <button class="arc-filter-btn" onclick="filterArcadia('temporary', this, 'Time-sensitive or event-driven achievements')">⌛ Temporary</button>
            <button class="arc-filter-btn" onclick="filterArcadia('course', this, 'Completing an educational course')">🎓 Course</button>
            <button class="arc-filter-btn" onclick="filterArcadia('rare', this, 'Only a few recipients receive these for exceptional or uncommon achievements')">🏆 Rare</button>
            <button class="arc-filter-btn" onclick="filterArcadia('hero', this, 'Difficult to earn, given for extraordinary efforts, leadership, or impact')">🦸 Hero</button>
        </div>

        <div id="arcDesc" class="arc-category-desc">
            Unlock a world of achievements, from academic excellence to extracurricular success. Your journey to greatness starts here!
        </div>

        <div class="arc-badge-grid" id="arcGrid">
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/MD-30S6l1DbT2AbxtRIcEouvcHoB1GPjyTt5xPIEzw.png" class="arc-badge-img">
                <h6>TBS: Overboard Optimist</h6>
                <div class="arc-xp">+15 XP</div>
                <div class="arc-coins">0 Coins</div>
            </div>
            <div class="arc-card" data-cat="learning">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-5vL0R9f4EJermejgbxgHrvRAjr7tfqt4UnvK7WQu.png" class="arc-badge-img">
                <h6>Attendance Ace</h6>
                <div class="arc-xp">+125 XP</div>
                <div class="arc-coins">25 Coins</div>
            </div>
            <div class="arc-card" data-cat="activity">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-hZanzIodO0zWTjCseJlRu69LOOr4uvkUK0zqngS9.png" class="arc-badge-img">
                <h6>TECHNOWEEK</h6>
                <div class="arc-xp">+75 XP</div>
                <div class="arc-coins">30 Coins</div>
            </div>
            <div class="arc-card" data-cat="exclusive">
                <img src="https://via.placeholder.com/100" class="arc-badge-img">
                <h6>Paraverse Pathfinder</h6>
                <div class="arc-xp">+120 XP</div>
                <div class="arc-coins">75 Coins</div>
            </div>
            <div class="arc-card" data-cat="exclusive">
                <img src="https://via.placeholder.com/100" class="arc-badge-img">
                <h6>Tamaraw Legacy Link</h6>
                <div class="arc-xp">+350 XP</div>
                <div class="arc-coins">400 Coins</div>
            </div>
            <div class="arc-card" data-cat="rare">
                <img src="https://via.placeholder.com/100" class="arc-badge-img">
                <h6>Tamaraw Legacy Link</h6>
                <div class="arc-xp">+350 XP</div>
                <div class="arc-coins">400 Coins</div>
            </div>
            <div class="arc-card" data-cat="temporary">
                <img src="https://via.placeholder.com/100" class="arc-badge-img">
                <h6>Tamaraw Legacy Link</h6>
                <div class="arc-xp">+350 XP</div>
                <div class="arc-coins">400 Coins</div>
            </div>
            <!-- ========== add below here ========== -->
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/MD-Cas7TRQ4lAbyYNeR7hSbNjcX6CqtGb0enpi0KboM.png" class="arc-badge-img">
                <h6>Kind Heart</h6>
                <div class="arc-xp">+25 XP</div>
                <div class="arc-coins">25 Coins</div>
            </div>
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-sSrin9vmLaNUMBPbjRKYUgfycND95wh4YmRIOTXL.png" class="arc-badge-img">
                <h6>Career XP Central</h6>
                <div class="arc-xp">+5 XP</div>
                <div class="arc-coins">0 Coins</div>
            </div>
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-NkAMoYYxHQkI99IaWBINXreu1oG2sTXyWYCnBtSm.png" class="arc-badge-img">
                <h6>Portal of Possibilities</h6>
                <div class="arc-xp">+5 XP</div>
                <div class="arc-coins">0 Coins</div>
            </div>
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-hZxwofTDpCmBckoyTJbNMyEmXXkUQG3phRRwWQx2.png" class="arc-badge-img">
                <h6>The Paraverse Explorer</h6>
                <div class="arc-xp">+5 XP</div>
                <div class="arc-coins">0 Coins</div>
            </div>
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-N9gcJKzbc28JSOxiTdshAtrlhZwb8UO3OebNyvjq.png" class="arc-badge-img">
                <h6>The Knowledge Vault</h6>
                <div class="arc-xp">+5 XP</div>
                <div class="arc-coins">0 Coins</div>
            </div>
            <div class="arc-card" data-cat="activity">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-TwrQWlvs0zMALMSvWghbHZuIOZjutfKy8HcgqE.png" class="arc-badge-img">
                <h6>Arcadia Initiate</h6>
                <div class="arc-xp">+75 XP</div>
                <div class="arc-coins">20 Coins</div>
            </div>
            <div class="arc-card" data-cat="activity">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-sZ0w1ZeH55g6FM4KWRhcErmxQdwPDrn1712JqSyk.png" class="arc-badge-img">
                <h6>Kick-Off Celebration</h6>
                <div class="arc-xp">+75 XP</div>
                <div class="arc-coins">20 Coins</div>
            </div>
            <div class="arc-card" data-cat="learning">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-JxdA2Ri5bcoMeiQlp6HguUwgMNC2QvDx9EzER0Gi.png" class="arc-badge-img">
                <h6>Master of Midterms</h6>
                <div class="arc-xp">+125 XP</div>
                <div class="arc-coins">25 Coins</div>
            </div>
            <div class="arc-card" data-cat="learning">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-JGyJia0UhDaDviqA3LOh6Dwe8BKel4h8F8EBQZHL.png" class="arc-badge-img">
                <h6>Academic Dean's Champion</h6>
                <div class="arc-xp">+125 XP</div>
                <div class="arc-coins">50 Coins</div>
            </div>
            <!-- ========== dont add below here ========== -->
        </div>
        <button class="btn-arc-view">View All Badges &rarr;</button>
    </div>
</div>

<script>
    /* ── Filter generated to have filtered badges :> ── */
    function filterArcadia(category, button, description) {
        document.querySelectorAll('.arc-filter-btn').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const descEl = document.getElementById('arcDesc');
        descEl.style.opacity = '0';
        setTimeout(() => {
            descEl.textContent = description;
            descEl.style.opacity = '1';
        }, 200);

        const cards = document.querySelectorAll('.arc-card');
        let shown = 0;
        cards.forEach(card => {
            if (category === 'top') {
                // Top Badges: shows 5 
                if (shown < 5) {
                    card.style.display = 'flex';
                    shown++;
                } else {
                    card.style.display = 'none';
                }
            } else {
                // All other filters: show ALL matching cards, no limit
                if (card.dataset.cat === category) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            }
        });
    }

    window.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.arc-card');
        let shown = 0;
        cards.forEach(card => {
            if (shown < 5) {
                card.style.display = 'flex';
                shown++;
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>