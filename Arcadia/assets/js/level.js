document.addEventListener('DOMContentLoaded', function () {
    const section = document.getElementById('arcLevelSection');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                section.classList.add('animate-in');
            }
        });
    }, {
        threshold: 0.2
    });
    observer.observe(section);
});
