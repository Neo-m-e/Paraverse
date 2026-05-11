<link rel="stylesheet" href="assets/css/arc-headers.css" />
<link rel="stylesheet" href="assets/css/claimable.css" />
<section class="arc-rewards-section">
    <div class="arc-container">

        <!-- Uniform header — arc-headers system -->
        <div class="arc-section-header text-center mb-5" style="margin-bottom: 80px !important;">
            <span class="arc-section-tag">🛍️ Store</span>
            <h2 class="arc-section-title">Claimable <span>Rewards</span></h2>
            <p class="arc-section-sub">Redeem your hard-earned coins for exclusive limited-edition FEU Tech merch.</p>
        </div>

        <div class="row g-4">
            <!-- Hoodie -->
            <div class="col-lg-3 col-md-6">
                <div class="arc-reward-card arc-highlight" data-coins="5500" data-item="Paraverse Hoodie">
                    <div class="arc-img-container">
                        <span class="arc-badge-hot fs-8 fw-bolder text-uppercase">HOT ITEM</span>
                        <img src="assets/images/Hoodie_v1 BACK.png" alt="Paraverse Hoodie" />
                    </div>
                    <div class="arc-card-content">
                        <h5 class="fw-bolder text-gray-900 mb-2">Paraverse Hoodie</h5>
                        <p class="text-gray-700 fs-7 mb-0">The Modern Identity Hoodie from the official 'The Paraverse'</p>
                    </div>
                    <div class="arc-card-footer">
                        <div class="arc-coin-group fw-bolder fs-5"><img src="assets/images/SM-colored-coin.png" alt="coin" class="arc-coin-token" /> 5,500</div>
                        <div class="text-gray-700 fs-8 text-end lh-sm">12 left</div>
                    </div>
                </div>
            </div>

            <!-- Shirt -->
            <div class="col-lg-3 col-md-6">
                <div class="arc-reward-card" data-coins="2000" data-item="Paraverse Shirt">
                    <div class="arc-img-container">
                        <img src="assets/images/T-Shirt Back.png" alt="Paraverse Shirt" />
                    </div>
                    <div class="arc-card-content">
                        <h5 class="fw-bolder text-gray-900 mb-2">Paraverse Shirt</h5>
                        <p class="text-gray-700 fs-7 mb-0">The Atom Tornado T-Shirt from the official 'The Paraverse'</p>
                    </div>
                    <div class="arc-card-footer">
                        <div class="arc-coin-group fw-bolder fs-5"><img src="assets/images/SM-colored-coin.png" alt="coin" class="arc-coin-token" /> 2,000</div>
                        <div class="text-gray-700 fs-8 text-end lh-sm">30 left</div>
                    </div>
                </div>
            </div>

            <!-- Tote Bag -->
            <div class="col-lg-3 col-md-6">
                <div class="arc-reward-card" data-coins="2500" data-item="Paraverse Tote Bag">
                    <div class="arc-img-container">
                        <img src="assets/images/Tote Bag_v1.png" alt="Paraverse Tote Bag" />
                    </div>
                    <div class="arc-card-content">
                        <h5 class="fw-bolder text-gray-900 mb-2">Paraverse Tote Bag</h5>
                        <p class="text-gray-700 fs-7 mb-0">The Modern Tote Bag from the official 'The Paraverse'</p>
                    </div>
                    <div class="arc-card-footer">
                        <div class="arc-coin-group fw-bolder fs-5"><img src="assets/images/SM-colored-coin.png" alt="coin" class="arc-coin-token" /> 2,500</div>
                        <div class="text-gray-700 fs-8 text-end lh-sm">50 left</div>
                    </div>
                </div>
            </div>

            <!-- Powerbank -->
            <div class="col-lg-3 col-md-6">
                <div class="arc-reward-card" data-coins="5500" data-item="Paraverse Powerbank">
                    <div class="arc-img-container">
                        <img src="assets/images/Powerbank.png" alt="Paraverse Powerbank" />
                    </div>
                    <div class="arc-card-content">
                        <h5 class="fw-bolder text-gray-900 mb-2">Paraverse Powerbank</h5>
                        <p class="text-gray-700 fs-7 mb-0">The paraverse powerbank finished with the Paraverse insignia.</p>
                    </div>
                    <div class="arc-card-footer">
                        <div class="arc-coin-group fw-bolder fs-5"><img src="assets/images/SM-colored-coin.png" alt="coin" class="arc-coin-token" /> 5,500</div>
                        <div class="text-gray-700 fs-8 text-end lh-sm">25 left</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    function spawnPop(x, y, text, color) {
        const el = document.createElement('div');
        el.style.cssText = `position:fixed;left:${x}px;top:${y}px;font-size:1rem;font-weight:900;color:${color||'#E8521A'};pointer-events:none;z-index:9999;text-shadow:0 2px 8px rgba(0,0,0,.15);white-space:nowrap;animation:xp-rise 1.2s ease-out forwards;`;
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

})();
</script>
