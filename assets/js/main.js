/* ========================================
   MAIN.JS - Scripts principaux de SmartPath
   ======================================== */

// Création des étoiles pour le fond spatial
function createStars() {
    const spaceContainer = document.getElementById('space');
    if (!spaceContainer) return;
    
    const starCount = 200;
    
    for (let i = 0; i < starCount; i++) {
        const star = document.createElement('div');
        star.className = Math.random() > 0.7 ? 'star star-pulse' : 'star';
        
        const size = Math.random() * 3 + 1;
        star.style.width = size + 'px';
        star.style.height = size + 'px';
        star.style.left = Math.random() * 100 + '%';
        star.style.top = Math.random() * 100 + '%';
        star.style.animationDelay = Math.random() * 3 + 's';
        star.style.animationDuration = (Math.random() * 2 + 2) + 's';
        
        spaceContainer.appendChild(star);
    }
}

// Création des bulles pour le mode clair
function createBubbles() {
    const spaceContainer = document.getElementById('space');
    if (!spaceContainer || document.getElementById('bubbles')) return;

    const container = document.createElement('div');
    container.id = 'bubbles';
    container.style.position = 'absolute';
    container.style.top = '0';
    container.style.left = '0';
    container.style.width = '100%';
    container.style.height = '100%';
    container.style.pointerEvents = 'none';

    const bubbleCount = 24;
    for (let i = 0; i < bubbleCount; i++) {
        const b = document.createElement('div');
        b.className = 'bubble';
        const size = Math.random() * 60 + 20; // 20 - 80px
        b.style.width = size + 'px';
        b.style.height = size + 'px';
        b.style.left = Math.random() * 100 + '%';
        b.style.bottom = -(Math.random() * 80) + 'px';
        const duration = Math.random() * 12 + 8; // 8 - 20s
        const delay = Math.random() * 6;
        b.style.animation = `bubble-rise ${duration}s linear ${delay}s forwards`;
        b.style.opacity = 0.5 + Math.random() * 0.5;
        container.appendChild(b);
    }

    spaceContainer.appendChild(container);
}

// Supprimer les bulles
function removeBubbles() {
    const existing = document.getElementById('bubbles');
    if (existing) existing.remove();
}

// Toggle du thème clair/sombre
function toggleTheme() {
    const body = document.body;
    const themeIcon = document.getElementById('theme-icon');
    
    body.classList.toggle('light-mode');
    
    if (body.classList.contains('light-mode')) {
        themeIcon.textContent = '☀️';
        localStorage.setItem('theme', 'light');
        createBubbles();
    } else {
        themeIcon.textContent = '🌙';
        localStorage.setItem('theme', 'dark');
        removeBubbles();
    }
}

// Initialisation au chargement de la page
window.addEventListener('DOMContentLoaded', () => {
    // Créer les étoiles
    createStars();
    
    // Charger le thème sauvegardé
    const savedTheme = localStorage.getItem('theme');
    const themeIcon = document.getElementById('theme-icon');
    
    if (savedTheme === 'light') {
        document.body.classList.add('light-mode');
        if (themeIcon) themeIcon.textContent = '☀️';
        createBubbles();
    }
});
