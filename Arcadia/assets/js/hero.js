/* ── COUNTER ANIMATION ── */
document.addEventListener('DOMContentLoaded', () => {

    /* ── XP Pop helper ── */
    function spawnXpPop(x, y, text) {
        const el = document.createElement('div');
        el.className = 'xp-pop';
        el.textContent = text;
        el.style.left = x + 'px';
        el.style.top  = y + 'px';
        document.body.appendChild(el);
        setTimeout(() => el.remove(), 1300);
    }

    /* ── Counter ── */
    const animateCounter = (el) => {
        const target = parseInt(el.getAttribute('data-count'));
        let current = 0;
        const increment = target / 60;
        const update = () => {
            if (current < target) {
                current += increment;
                el.innerHTML = `<span>${Math.ceil(current).toLocaleString()}</span>+`;
                setTimeout(update, 16);
            } else {
                el.innerHTML = `<span>${target.toLocaleString()}</span>+`;
            }
        };
        update();
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll('.stat-num').forEach(animateCounter);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    const statsSection = document.querySelector('.arc-hero-stats');
    if (statsSection) observer.observe(statsSection);

    /* ── Float-card click → XP pop ── */
    document.querySelectorAll('.float-card').forEach(card => {
        card.addEventListener('click', (e) => {
            spawnXpPop(e.clientX - 20, e.clientY - 30, '+10 XP ⚡');
        });
    });

    /* ── Primary button click → screen flash ── */
    const primaryBtn = document.querySelector('.arc-btn-primary');
    if (primaryBtn) {
        primaryBtn.addEventListener('click', () => {
            const flash = document.createElement('div');
            flash.style.cssText = `
                position:fixed;inset:0;background:rgba(232,82,26,0.12);
                pointer-events:none;z-index:99999;
                animation:btn-flash 0.35s ease-out forwards;
            `;
            if (!document.getElementById('arc-flash-style')) {
                const s = document.createElement('style');
                s.id = 'arc-flash-style';
                s.textContent = `@keyframes btn-flash{0%{opacity:1}100%{opacity:0}}`;
                document.head.appendChild(s);
            }
            document.body.appendChild(flash);
            setTimeout(() => flash.remove(), 400);
        });
    }

    /* ── Pixel particle spawner ── */
    const hero = document.querySelector('.arc-hero');
    if (hero) {
        const colors = ['#E8521A','#F5A623','#FFD966','#ff7a47'];
        function spawnParticle() {
            const p = document.createElement('div');
            p.className = 'hero-particle';
            const size = Math.random() * 6 + 3;
            p.style.cssText = `
                width:${size}px;height:${size}px;
                background:${colors[Math.floor(Math.random()*colors.length)]};
                left:${Math.random()*100}%;
                bottom:${Math.random()*40}%;
                animation-duration:${Math.random()*3+2}s;
                animation-delay:${Math.random()*2}s;
                opacity:0;
                border-radius:${Math.random()>0.5?'50%':'3px'};
            `;
            hero.appendChild(p);
            setTimeout(() => p.remove(), 5500);
        }
        setInterval(spawnParticle, 400);
    }
});
