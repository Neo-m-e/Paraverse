 /* ── Scroll Animation ── */
    const howCards = document.querySelectorAll('.arc-how-card');
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

    howCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        howObserver.observe(card);
    });
