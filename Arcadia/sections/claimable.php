<link rel="stylesheet" href="assets/css/arc-headers.css" />
<link rel="stylesheet" href="assets/css/claimable.css" />
<section class="arc-rewards-section">
    <div class="arc-container">
        <div class="arc-rewards-layout">

            <!-- LEFT: Text + button -->
            <div class="arc-rewards-left">
                <span class="arc-section-tag">🛍️ Store</span>
                <h2 class="arc-rewards-title">Claimable <span>Rewards</span></h2>
                <p class="arc-rewards-sub">Redeem your hard-earned coins for exclusive limited-edition FEU Tech merch.</p>

                <div class="arc-rewards-tags">
                    <span class="arc-rtag">🔖 Bookmarks</span>
                    <span class="arc-rtag">🔌 Data Cable Sets</span>
                    <span class="arc-rtag">🧥 Jackets</span>
                    <span class="arc-rtag">🪪 Lanyards</span>
                    <span class="arc-rtag">☕ Mugs</span>
                    <span class="arc-rtag">📓 Notebooks</span>
                    <span class="arc-rtag">👕 Shirts</span>
                </div>

                <a href="#" class="arc-btn-primary arc-store-btn">🛒 Visit the Store</a>
            </div>

            <!-- RIGHT: 2x2 card grid -->
            <div class="arc-rewards-grid">

                <!-- Hoodie — orange -->
                <div class="arc-pcard" data-coins="5500" data-item="Paraverse Hoodie" style="background: linear-gradient(135deg, #F5A623 0%, #E8521A 100%);">
                    <div class="arc-pcard-top">
                        <span class="arc-pcard-name">HOODIE</span>
                        <span class="arc-badge-hot">HOT</span>
                    </div>
                    <div class="arc-pcard-img">
                        <img src="assets/images/Hoodie_v1 BACK.png" style="height:170px;" alt="Paraverse Hoodie" />
                    </div>
                    <div class="arc-pcard-foot">
                        <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/coins/OR-colored-coin.png" class="arc-pdot-coin" /> 5,500 TC
                    </div>
                </div>

                <!-- Shirt — dark -->
                <div class="arc-pcard arc-pcard-dark" data-coins="2000" data-item="Paraverse Shirt">
                    <div class="arc-pcard-top">
                        <span class="arc-pcard-name">SHIRT</span>
                    </div>
                    <div class="arc-pcard-img">
                        <img src="assets/images/T-Shirt Back.png" alt="Paraverse Shirt" />
                    </div>
                    <div class="arc-pcard-foot">
                        <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/coins/OR-colored-coin.png" class="arc-pdot-coin" /> 2,000 TC
                    </div>
                </div>

                <!-- Tote Bag — dark -->
                <div class="arc-pcard arc-pcard-dark" data-coins="2500" data-item="Paraverse Tote Bag">
                    <div class="arc-pcard-top">
                        <span class="arc-pcard-name">TOTE BAG</span>
                    </div>
                    <div class="arc-pcard-img">
                        <img src="assets/images/Tote Bag_v1.png" style="height:200px;" alt="Paraverse Tote Bag" />
                    </div>
                    <div class="arc-pcard-foot">
                        <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/coins/OR-colored-coin.png" class="arc-pdot-coin" /> 2,500 TC
                    </div>
                </div>

                <!-- Powerbank — orange accent -->
                <div class="arc-pcard" data-coins="5500" data-item="Paraverse Powerbank" style="background: linear-gradient(135deg, #E8521A 0%, #c73d0e 100%);">
                    <div class="arc-pcard-top">
                        <span class="arc-pcard-name">POWERBANK</span>
                    </div>
                    <div class="arc-pcard-img">
                        <img src="assets/images/Powerbank.png" style="height:200px;" alt="Paraverse Powerbank" />
                    </div>
                    <div class="arc-pcard-foot">
                        <img src="https://paraverse.feutech.edu.ph/arcadia/assets/images/coins/OR-colored-coin.png" class="arc-pdot-coin" /> Free
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    (function() {
        function spawnPop(x, y, text) {
            const el = document.createElement('div');
            el.style.cssText = `position:fixed;left:${x}px;top:${y}px;font-size:1rem;font-weight:900;color:#E8521A;pointer-events:none;z-index:9999;text-shadow:0 2px 8px rgba(0,0,0,.15);white-space:nowrap;animation:xp-rise 1.2s ease-out forwards;`;
            el.textContent = text;
            if (!document.getElementById('xp-rise-style')) {
                const s = document.createElement('style');
                s.id = 'xp-rise-style';
                s.textContent = `@keyframes xp-rise{0%{opacity:1;transform:translateY(0) scale(1)}50%{opacity:1;transform:translateY(-40px) scale(1.2)}100%{opacity:0;transform:translateY(-80px) scale(.8)}}`;
                document.head.appendChild(s);
            }
            document.body.appendChild(el);
            setTimeout(() => el.remove(), 1300);
        }
        document.querySelectorAll('.arc-pcard').forEach(card => {
            card.addEventListener('click', e => spawnPop(e.clientX - 30, e.clientY - 20, `🪙 ${parseInt(card.dataset.coins).toLocaleString()} TC`));
        });
    })();
</script>