/* ── FLOW — Animate steps + interactions ── */
(function() {
    function spawnXpPop(x, y, text, color) {
        const el = document.createElement('div');
        el.style.cssText = `
            position:fixed;left:${x}px;top:${y}px;
            font-size:1rem;font-weight:900;color:${color||'#F59E0B'};
            pointer-events:none;z-index:9999;
            text-shadow:0 2px 8px rgba(0,0,0,.2);white-space:nowrap;
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

    /* ── Scroll animate steps ── */
    const worthSteps = document.querySelectorAll('.arc-worth-step');
    const worthObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => entry.target.classList.add('visible'), i * 200);
                worthObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    worthSteps.forEach(step => worthObserver.observe(step));

    /* ── Step circle click ── */
    const stepTexts = ['🥇', '💎', '🛍️'];
    document.querySelectorAll('.arc-icon-circle').forEach((circle, i) => {
        circle.addEventListener('click', (e) => {
            spawnXpPop(e.clientX - 30, e.clientY - 40, stepTexts[i] || '⚡ +XP!');

            /* Ripple */
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position:absolute;inset:-15px;border-radius:50%;
                border:3px solid #E8521A;
                animation:circle-ripple .6s ease-out forwards;pointer-events:none;
            `;
            if (!document.getElementById('circle-ripple-style')) {
                const s = document.createElement('style');
                s.id = 'circle-ripple-style';
                s.textContent = `@keyframes circle-ripple{0%{transform:scale(1);opacity:1}100%{transform:scale(1.8);opacity:0}}`;
                document.head.appendChild(s);
            }
            circle.style.position = 'relative';
            circle.appendChild(ripple);
            setTimeout(() => ripple.remove(), 700);
        });
    });

    /* ── Banner hover ── */
    const banner = document.querySelector('.arc-worth-banner');
    if (banner) {
        banner.addEventListener('click', (e) => {
            spawnXpPop(e.clientX - 40, e.clientY - 40, '⚡ More XP = Higher Level!', '#F59E0B');
        });
    }
})();
