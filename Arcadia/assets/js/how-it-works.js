/* ── HOW IT WORKS — Gamified Interactions ── */
(function() {
    const combos = {};

    function spawnXpPop(x, y, text, color) {
        const el = document.createElement('div');
        el.style.cssText = `
            position:fixed;left:${x}px;top:${y}px;
            font-size:1rem;font-weight:900;color:${color||'#E8521A'};
            pointer-events:none;z-index:9999;
            text-shadow:0 2px 8px rgba(0,0,0,.15);white-space:nowrap;
            animation:xp-rise 1.2s ease-out forwards;
        `;
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

    const howCards = document.querySelectorAll('.arc-how-card');

    /* ── Scroll animate ── */
    const howObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, i * 150);
            }
        });
    }, { threshold: 0.1 });

    howCards.forEach((card, idx) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        howObserver.observe(card);

        /* Add combo badge */
        const badge = document.createElement('div');
        badge.className = 'combo-badge';
        card.appendChild(badge);

        combos[idx] = 0;

        /* Step ripple + combo */
        const step = card.querySelector('.arc-how-step');
        if (step) {
            step.addEventListener('click', (e) => {
                e.stopPropagation();
                step.classList.add('ripple');
                setTimeout(() => step.classList.remove('ripple'), 600);
                combos[idx]++;
                badge.textContent = `x${combos[idx]} COMBO!`;
                badge.classList.add('show');
                clearTimeout(card._comboTimer);
                card._comboTimer = setTimeout(() => {
                    badge.classList.remove('show');
                    combos[idx] = 0;
                }, 1800);
                const xpTexts = ['+50 XP','⚡ +75 XP','🔥 +100 XP!','💥 COMBO! +150 XP!','🌟 MEGA COMBO! +250 XP!'];
                const idx2 = Math.min(combos[idx]-1, xpTexts.length-1);
                spawnXpPop(e.clientX - 20, e.clientY - 30, xpTexts[idx2]);
            });
        }

        /* Card click */
        card.addEventListener('click', (e) => {
            if (e.target.closest('.arc-how-step')) return;
            spawnXpPop(e.clientX - 20, e.clientY - 30, '✅ Step Complete!', '#22c55e');
        });
    });
})();
