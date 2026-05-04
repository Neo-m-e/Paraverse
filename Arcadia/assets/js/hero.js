
/* ── COUNTER ANIMATION generated to have design :> ── */
document.addEventListener('DOMContentLoaded', () => {
    const animateCounter = (el) => {
        const target = parseInt(el.getAttribute('data-count'));
        let current = 0;
        const increment = target / 50;
        const update = () => {
            if (current < target) {
                current += increment;
                el.innerHTML = `<span>${Math.ceil(current).toLocaleString()}</span>+`;
                setTimeout(update, 20);
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
});
