document.addEventListener('DOMContentLoaded', function () {

    /* ── XP Pop ── */
    function spawnXpPop(x, y, text, color) {
        const el = document.createElement('div');
        el.style.cssText = `
            position:fixed; left:${x}px; top:${y}px;
            font-size:1rem; font-weight:900;
            color:${color||'#E8521A'}; pointer-events:none; z-index:9999;
            text-shadow:0 2px 8px rgba(0,0,0,.15);
            animation:xp-rise 1.2s ease-out forwards; white-space:nowrap;
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

    /* ── Confetti burst ── */
    function confettiBurst(x, y) {
        const colors = ['#FFD700','#F97316','#E8521A','#94A3B8','#fff'];
        for (let i = 0; i < 18; i++) {
            const p = document.createElement('div');
            const angle = (Math.PI * 2 / 18) * i;
            const dist  = 60 + Math.random() * 50;
            const dx    = Math.cos(angle) * dist;
            const dy    = Math.sin(angle) * dist;
            const size  = 6 + Math.random() * 6;
            p.style.cssText = `
                position:fixed; left:${x}px; top:${y}px;
                width:${size}px; height:${size}px;
                background:${colors[i%colors.length]};
                border-radius:${Math.random()>0.5?'50%':'2px'};
                pointer-events:none; z-index:9999;
                animation:confetti-fly .8s ease-out forwards;
                --dx:${dx}px; --dy:${dy}px;
            `;
            if (!document.getElementById('confetti-style')) {
                const s = document.createElement('style');
                s.id = 'confetti-style';
                s.textContent = `@keyframes confetti-fly{0%{transform:translate(0,0) rotate(0);opacity:1}100%{transform:translate(var(--dx),var(--dy)) rotate(360deg);opacity:0}}`;
                document.head.appendChild(s);
            }
            document.body.appendChild(p);
            setTimeout(() => p.remove(), 900);
        }
    }

    /* ── Podium hover ── */
    const podiumBoxes = document.querySelectorAll('.podium-avatar-box');
    podiumBoxes.forEach(box => {
        box.addEventListener('mouseenter', () => {
            box.style.transition = 'transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            box.style.transform = box.parentElement.classList.contains('first') ?
                'translateY(-30px) scale(1.08)' : 'translateY(-15px) scale(1.08)';
        });
        box.addEventListener('mouseleave', () => {
            box.style.transform = box.parentElement.classList.contains('first') ?
                'translateY(-20px) scale(1)' : 'translateY(0) scale(1)';
        });
        box.addEventListener('click', (e) => {
            confettiBurst(e.clientX, e.clientY);
            spawnXpPop(e.clientX - 30, e.clientY - 40,
                box.parentElement.classList.contains('first') ? '🏆 Champion!' :
                box.parentElement.classList.contains('second') ? '🥈 Runner Up!' : '🥉 3rd Place!',
                '#FFD700');
        });
    });

    /* ── Mini rows ── */
    const rows = document.querySelectorAll('.leaderboard-row-mini');
    rows.forEach(row => {
        row.addEventListener('click', (e) => {
            row.classList.add('rank-up-flash');
            setTimeout(() => row.classList.remove('rank-up-flash'), 500);
            const xp = row.querySelector('.m-xp');
            if (xp) spawnXpPop(e.clientX - 20, e.clientY - 30, '+XP ⚡');
        });
    });

    /* ── XP fade in ── */
    const xpValues = document.querySelectorAll('.podium-xp, .m-xp');
    xpValues.forEach((xp, i) => {
        xp.style.opacity = '0';
        setTimeout(() => {
            xp.style.transition = 'opacity 0.8s ease-in';
            xp.style.opacity = '1';
        }, 300 + i * 100);
    });

    /* ── View leaderboard button ── */
    const viewBtn = document.querySelector('.btn-view-leaderboard');
    if (viewBtn) {
        viewBtn.addEventListener('click', function (e) {
            confettiBurst(e.clientX, e.clientY);
            spawnXpPop(e.clientX - 40, e.clientY - 50, '🎮 Let\'s go!', '#F97316');
        });
    }

    /* ── Staggered entrance ── */
    rows.forEach((row, i) => {
        row.style.opacity = '0';
        row.style.transform = 'translateX(-20px)';
        row.style.transition = `opacity 0.4s ease, transform 0.4s ease`;
        setTimeout(() => {
            row.style.opacity = '1';
            row.style.transform = 'translateX(0)';
        }, 200 + i * 80);
    });
});
