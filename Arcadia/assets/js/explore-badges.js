/* ── EXPLORE BADGES — Gamified Interactions ── */
(function() {

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

    function sparkle(el) {
        const rect = el.getBoundingClientRect();
        for (let i = 0; i < 8; i++) {
            const s = document.createElement('div');
            const angle = (Math.PI * 2 / 8) * i;
            const dist = 40 + Math.random() * 20;
            s.style.cssText = `
                position:fixed;
                left:${rect.left + rect.width/2}px;
                top:${rect.top + rect.height/2}px;
                width:6px;height:6px;
                background:${['#FFD700','#F97316','#E8521A'][i%3]};
                border-radius:50%;pointer-events:none;z-index:9999;
                --dx:${Math.cos(angle)*dist}px;--dy:${Math.sin(angle)*dist}px;
                animation:sparkle-fly .6s ease-out forwards;
            `;
            if (!document.getElementById('sparkle-style')) {
                const ss = document.createElement('style');
                ss.id = 'sparkle-style';
                ss.textContent = `@keyframes sparkle-fly{0%{transform:translate(0,0);opacity:1}100%{transform:translate(var(--dx),var(--dy));opacity:0}}`;
                document.head.appendChild(ss);
            }
            document.body.appendChild(s);
            setTimeout(() => s.remove(), 700);
        }
    }

    /* ── Badge card click ── */
    const collected = new Set();
    document.querySelectorAll('.bc').forEach((card, i) => {
        const rarEl = card.querySelector('.g-rar');
        const rar = rarEl ? rarEl.textContent.trim() : 'Common';
        const xpEl = card.querySelector('.bc-xp');
        const xpText = xpEl ? xpEl.textContent.trim() : '+XP';

        card.addEventListener('click', (e) => {
            if (collected.has(i)) {
                spawnXpPop(e.clientX - 30, e.clientY - 30, '✅ Already Collected!', '#22c55e');
                return;
            }
            collected.add(i);
            card.classList.add('collected');
            sparkle(card);

            const colors = { Legendary:'#F59E0B', Epic:'#8B5CF6', Rare:'#3B82F6', Common:'#94A3B8' };
            spawnXpPop(e.clientX - 30, e.clientY - 50,
                `${xpText} 🏅 ${rar}!`,
                colors[rar] || '#E8521A');

            /* Screen shake for Legendary */
            if (rar === 'Legendary') {
                document.body.style.animation = 'shake 0.3s ease';
                if (!document.getElementById('shake-style')) {
                    const ss = document.createElement('style');
                    ss.id = 'shake-style';
                    ss.textContent = `@keyframes shake{0%,100%{transform:translate(0,0)}20%{transform:translate(-4px,2px)}40%{transform:translate(4px,-2px)}60%{transform:translate(-3px,1px)}80%{transform:translate(3px,-1px)}}`;
                    document.head.appendChild(ss);
                }
                setTimeout(() => { document.body.style.animation = ''; }, 350);
            }
        });
    });

    window.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.arc-card');
        let shown = 0;
        cards.forEach(card => {
            card.style.display = shown < 5 ? 'flex' : 'none';
            if (shown < 5) shown++;
        });
    });

    /* ── View all btn ── */
    const viewBtn = document.querySelector('.btn-arc-view');
    if (viewBtn) {
        viewBtn.addEventListener('click', (e) => {
            spawnXpPop(e.clientX - 40, e.clientY - 50, '🏅 View All Badges!', '#F05A28');
        });
    }
})();
