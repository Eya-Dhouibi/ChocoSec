import { setupToggle } from '/script.js';

function toggleMenu() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const closeMenuButton = document.getElementById('close-menu');
    const navMenu = document.getElementById('navbarNav');
    const menuOverlay = document.getElementById('page-overlay');

    setupToggle({
      toggleButton: navbarToggler,
      targetElement: navMenu,
      overlay: menuOverlay,
      closeOnOutsideClick: true,
    });
  
    closeMenuButton.addEventListener('click', () => {
      navMenu.classList.remove('show');
      menuOverlay.classList.remove('show');
    });
  }