
    /* ── Animate steps on scroll ── */
    const worthSteps = document.querySelectorAll('.arc-worth-step');
    const worthObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, i * 200);
                worthObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    worthSteps.forEach(step => worthObserver.observe(step));
