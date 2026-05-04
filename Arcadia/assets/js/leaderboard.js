document.addEventListener('DOMContentLoaded', function () {
    const viewBtn = document.querySelector('.btn-view-leaderboard');
    if (viewBtn) {
        viewBtn.addEventListener('click', function () {
            console.log("Navigating to full leaderboard...");
            // window.location.href = 'leaderboard.php'; 
        });
    }

    const podiumBoxes = document.querySelectorAll('.podium-avatar-box');
    podiumBoxes.forEach(box => {
        box.addEventListener('mouseenter', () => {
            box.style.transition = 'transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            box.style.transform = box.parentElement.classList.contains('first') ?
                'translateY(-30px) scale(1.05)' :
                'translateY(-10px) scale(1.05)';
        });
        box.addEventListener('mouseleave', () => {
            box.style.transform = box.parentElement.classList.contains('first') ?
                'translateY(-20px) scale(1)' :
                'translateY(0) scale(1)';
        });
    });

    const xpValues = document.querySelectorAll('.podium-xp, .m-xp');
    xpValues.forEach(xp => {
        xp.style.opacity = '0';
        setTimeout(() => {
            xp.style.transition = 'opacity 1s ease-in';
            xp.style.opacity = '1';
        }, 500);
    });
});