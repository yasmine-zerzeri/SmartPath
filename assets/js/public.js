/* ========================================
   PUBLIC.JS - Scripts pour pages publiques
   ======================================== */

// Menu mobile
function toggleMobileMenu() {
    const menu = document.getElementById('navbar-menu');
    if (menu) {
        menu.classList.toggle('active');
    }
}

// Fermer le menu mobile en cliquant à l'extérieur
document.addEventListener('click', function(event) {
    const menu = document.getElementById('navbar-menu');
    const toggle = document.querySelector('.mobile-menu-toggle');
    const navbar = document.querySelector('.navbar');
    
    if (menu && navbar && !navbar.contains(event.target) && menu.classList.contains('active')) {
        menu.classList.remove('active');
    }
});
