    /* ── Filter generated to have filtered badges :> ── */
    function filterArcadia(category, button, description) {
        document.querySelectorAll('.arc-filter-btn').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const descEl = document.getElementById('arcDesc');
        descEl.style.opacity = '0';
        setTimeout(() => {
            descEl.textContent = description;
            descEl.style.opacity = '1';
        }, 200);

        const cards = document.querySelectorAll('.arc-card');
        let shown = 0;
        cards.forEach(card => {
            if (category === 'top') {
                // Top Badges: shows 5 
                if (shown < 5) {
                    card.style.display = 'flex';
                    shown++;
                } else {
                    card.style.display = 'none';
                }
            } else {
                // All other filters: show ALL matching cards, no limit
                if (card.dataset.cat === category) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            }
        });
    }

    window.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.arc-card');
        let shown = 0;
        cards.forEach(card => {
            if (shown < 5) {
                card.style.display = 'flex';
                shown++;
            } else {
                card.style.display = 'none';
            }
        });
    });
