document.addEventListener('DOMContentLoaded', function () {
    const section = document.getElementById('arcLevelSection');
    if (!section) return;

    /* ── Animate-in on scroll ── */
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) section.classList.add('animate-in');
        });
    }, { threshold: 0.2 });
    observer.observe(section);

    /* ── Level circle click → unlock pop ── */
    const levelLabels = { bronze:'🥉', silver:'🥈', gold:'🥇', platinum:'🛡️', diamond:'💎' };
    document.querySelectorAll('.level-item').forEach(item => {
        item.addEventListener('click', () => {
            const tier = [...item.classList].find(c => c.startsWith('level-item--'))?.split('--')[1] || '';
            const label = item.querySelector('.level-label')?.textContent || tier;
            showUnlockPop(`${levelLabels[tier] || '⭐'} ${label} Tier!`);
        });
    });

    function showUnlockPop(text) {
        const existing = document.querySelector('.level-unlock-pop');
        if (existing) existing.remove();
        const el = document.createElement('div');
        el.className = 'level-unlock-pop';
        el.textContent = text;
        document.body.appendChild(el);
        setTimeout(() => el.remove(), 1600);
    }
});
