<link rel="stylesheet" href="assets/css/explore-badges.css" />
<div class="arc-wrapper-fluid">
    <div class="arc-container">
        <div class="mb-10 text-start">
            <span class="arc-collect-pill fw-bolder ls-1">COLLECTIBLES</span>
            <h2 class="display-5 fw-bolder text-dark mb-3">Explore Badges</h2>
            <p style="max-width: 550px;">
                Hundreds of badges across 8 categories. Each badge unlocks XP and bragging rights.
            </p>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <button class="arc-filter-btn active" onclick="filterArcadia('top', this, 'Unlock a world of achievements, from academic excellence to extracurricular success.')">Top Badges</button>
            <button class="arc-filter-btn" onclick="filterArcadia('fun', this, 'Easily earned for engaging in enjoyable activities')">🎮 Fun</button>
            <button class="arc-filter-btn" onclick="filterArcadia('activity', this, 'Recognizes participation in events, projects, or extracurricular engagements')">🏅 Activity</button>
            <button class="arc-filter-btn" onclick="filterArcadia('learning', this, 'Awarded for demonstrating knowledge, skill mastery, or academic progress')">📚 Learning</button>
            <button class="arc-filter-btn" onclick="filterArcadia('exclusive', this, 'Earned by being part of a select group, program, or unique experience')">🔒 Exclusive</button>
            <button class="arc-filter-btn" onclick="filterArcadia('milestone', this, 'Marks significant progress, achievements, or long-term dedication')">🎯 Milestone</button>
            <button class="arc-filter-btn" onclick="filterArcadia('temporary', this, 'Time-sensitive badges given for special events, seasonal activities, or challenges')">⌛ Temporary</button>
            <button class="arc-filter-btn" onclick="filterArcadia('course', this, 'Granted for successfully completing a course or structured learning program')">🎓 Course</button>
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
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="learning">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-5vL0R9f4EJermejgbxgHrvRAjr7tfqt4UnvK7WQu.png" class="arc-badge-img">
                <h6>Attendance Ace</h6>
                <div class="arc-xp">+125 XP</div>
                <div class="arc-coins">25 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="activity">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-hZanzIodO0zWTjCseJlRu69LOOr4uvkUK0zqngS9.png" class="arc-badge-img">
                <h6>TECHNOWEEK</h6>
                <div class="arc-xp">+75 XP</div>
                <div class="arc-coins">30 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="exclusive">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-MYSizEnMC1ZldTbqIWQhwqkXenDahu9Eh708qxrR.png" class="arc-badge-img">
                <h6>The Innovator Member</h6>
                <div class="arc-xp">+150 XP</div>
                <div class="arc-coins">50 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="exclusive">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-WVwvWILWuMcJGVh4xtZdgjCAfd01jjC7p9l4tCNo.png" class="arc-badge-img">
                <h6>The Study Sage</h6>
                <div class="arc-xp">+150 XP</div>
                <div class="arc-coins">120 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="rare">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-p7II2RSea5nMyC1QNBOhGrnmSHeaepj6qY1vqfPA.png" class="arc-badge-img">
                <h6>Tamaraw Legacy Link</h6>
                <div class="arc-xp">+350 XP</div>
                <div class="arc-coins">400 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="temporary">
                <img src="https://via.placeholder.com/100" class="arc-badge-img">
                <h6>Badge Name Here</h6>
                <div class="arc-xp">+XX XP</div>
                <div class="arc-coins">XX Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <!-- ========== add below here ========== -->
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/MD-Cas7TRQ4lAbyYNeR7hSbNjcX6CqtGb0enpi0KboM.png" class="arc-badge-img">
                <h6>Kind Heart</h6>
                <div class="arc-xp">+25 XP</div>
                <div class="arc-coins">25 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-sSrin9vmLaNUMBPbjRKYUgfycND95wh4YmRIOTXL.png" class="arc-badge-img">
                <h6>Career XP Central</h6>
                <div class="arc-xp">+5 XP</div>
                <div class="arc-coins">0 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-NkAMoYYxHQkI99IaWBINXreu1oG2sTXyWYCnBtSm.png" class="arc-badge-img">
                <h6>Portal of Possibilities</h6>
                <div class="arc-xp">+5 XP</div>
                <div class="arc-coins">0 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-hZxwofTDpCmBckoyTJbNMyEmXXkUQG3phRRwWQx2.png" class="arc-badge-img">
                <h6>The Paraverse Explorer</h6>
                <div class="arc-xp">+5 XP</div>
                <div class="arc-coins">0 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="fun">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-N9gcJKzbc28JSOxiTdshAtrlhZwb8UO3OebNyvjq.png" class="arc-badge-img">
                <h6>The Knowledge Vault</h6>
                <div class="arc-xp">+5 XP</div>
                <div class="arc-coins">0 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="activity">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-TwrQWlvs0zMALMSvWghbHZuIOZjutfKy8HcgqE.png" class="arc-badge-img">
                <h6>Arcadia Initiate</h6>
                <div class="arc-xp">+75 XP</div>
                <div class="arc-coins">20 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="activity">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-sZ0w1ZeH55g6FM4KWRhcErmxQdwPDrn1712JqSyk.png" class="arc-badge-img">
                <h6>Kick-Off Celebration</h6>
                <div class="arc-xp">+75 XP</div>
                <div class="arc-coins">20 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="learning">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-JxdA2Ri5bcoMeiQlp6HguUwgMNC2QvDx9EzER0Gi.png" class="arc-badge-img">
                <h6>Master of Midterms</h6>
                <div class="arc-xp">+125 XP</div>
                <div class="arc-coins">25 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="learning">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-JGyJia0UhDaDviqA3LOh6Dwe8BKel4h8F8EBQZHL.png" class="arc-badge-img">
                <h6>Academic Dean's Champion</h6>
                <div class="arc-xp">+125 XP</div>
                <div class="arc-coins">50 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="exclusive">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-6gpuavi5AywKBY485zhPH1aBOAy7PyewYcngccAy.png" class="arc-badge-img">
                <h6>Paraverse Pathfinder</h6>
                <div class="arc-xp">+120 XP</div>
                <div class="arc-coins">0 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="milestone">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-yvld3g9ivxHNJvrlkotqrqzz1IZRuzOnYDb7HA9P.png" class="arc-badge-img">
                <h6>Annual Students' Recognition Honoree</h6>
                <div class="arc-xp">+175 XP</div>
                <div class="arc-coins">35 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="milestone">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-ww0peOHLAZCHg5Q5C6gXtUeoB6DXWll3pSdrCofF.png" class="arc-badge-img">
                <h6>Prestige Graduate: Summa</h6>
                <div class="arc-xp">+300 XP</div>
                <div class="arc-coins">150 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="milestone">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-vTwtaca9ZJmbBjPN4K0sBJttp8bhEyU9PpDyi5bC.png" class="arc-badge-img">
                <h6>S.A.S.E. Completer: Sikhay Honor</h6>
                <div class="arc-xp">+175 XP</div>
                <div class="arc-coins">35 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="course">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-YcddNOV8FNifwkapQ70XUsNRqWC3m1K1nabQcKuW.png " class="arc-badge-img">
                <h6>Visual Story Illustrator</h6>
                <div class="arc-xp">+250 XP</div>
                <div class="arc-coins">0 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="course">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-zcMNJS8s8m4XrwwvGzKMvk1826LZPubpiGbfKN1B.png" class="arc-badge-img">
                <h6>Seasoned Electronics Specialist</h6>
                <div class="arc-xp">+250 XP</div>
                <div class="arc-coins">0 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="course">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-BAR4iaJ51dqsmjqIqcyBxUkGNOSSEG3SVeRjVgmr.png" class="arc-badge-img">
                <h6>Athletic Vanguard</h6>
                <div class="arc-xp">+175 XP</div>
                <div class="arc-coins">35 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="hero">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-UHqjBKZPy2rR3D7EVbZziNhOJif5RTGhCbGOVMre.png" class="arc-badge-img">
                <h6>Research Trailblazer</h6>
                <div class="arc-xp">+500 XP</div>
                <div class="arc-coins">300 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="hero">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-dmquUsIk515AhxXnv25G9dMFedRdeR56uZyoeNcz.png" class="arc-badge-img">
                <h6>Most Outstanding ITE Student MOITES 2025</h6>
                <div class="arc-xp">+750 XP</div>
                <div class="arc-coins">350 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <div class="arc-card" data-cat="hero">
                <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/badges/OR-BAR4iaJ51dqsmjqIqcyBxUkGNOSSEG3SVeRjVgmr.png" class="arc-badge-img">
                <h6>Athletic Vanguard</h6>
                <div class="arc-xp">+175 XP</div>
                <div class="arc-coins">35 Coins</div>
                <button class="btn-view-badge">View Details</button>
            </div>
            <!-- ========== dont add below here ========== -->
        </div>
        <button class="btn-arc-view">View All Badges &rarr;</button>
    </div>
</div>

<script src="assets/js/explore-badges.js"></script>