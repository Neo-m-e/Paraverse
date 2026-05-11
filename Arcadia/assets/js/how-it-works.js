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

})();
