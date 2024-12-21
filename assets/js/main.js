/** 
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chocoSec
 */

AOS.init();

(function() {
  "use strict";

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector(".header-wrapper.sticky-top");
    if (header) {
      let lastScrollTop = 0;
      const heightHeader = header.offsetHeight;
      document.body.style.paddingTop = `${heightHeader}px`;

      window.addEventListener("scroll", function () {
        const currentScroll = window.scrollY;

        if (currentScroll > lastScrollTop) {
          // Scroll down
          header.classList.add("scroll_down");
          header.classList.remove("scroll_up");
        } else {
          // Scroll up
          header.classList.add("scroll_up");
          header.classList.remove("scroll_down");
        }

        if (currentScroll > heightHeader) {
          header.classList.add("sticky-header");
        } else {
          header.classList.remove("sticky-header");
        }

        lastScrollTop = currentScroll;
      });
    }

    // Handle the search icon toggle
    const searchIcon = document.getElementById('search-icon');
    const searchInputContainer = document.getElementById('search-input-container');
    if (searchIcon && searchInputContainer) {
      searchIcon.addEventListener('click', () => {
        searchInputContainer.classList.toggle('search-input-visible');
      });
    }

    // Handle the navbar toggler and overlay
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navMenu = document.getElementById('navbarNav');
    const closeMenuButton = document.getElementById('close-menu');
    const menuOverlay = document.getElementById('menu-overlay');

    if (navbarToggler && navMenu && menuOverlay) {
      navbarToggler.addEventListener('click', function () {
        navMenu.classList.toggle('show');
        menuOverlay.classList.toggle('show');
      });

      closeMenuButton?.addEventListener('click', function () {
        navMenu.classList.remove('show');
        menuOverlay.classList.remove('show');
      });

      document.addEventListener('click', function (event) {
        if (
          !navMenu.contains(event.target) &&
          !navbarToggler.contains(event.target) &&
          !menuOverlay.contains(event.target)
        ) {
          navMenu.classList.remove('show');
          menuOverlay.classList.remove('show');
        }
      });

      menuOverlay.addEventListener('click', function () {
        navMenu.classList.remove('show');
        menuOverlay.classList.remove('show');
      });
    }

    // Handle the user icon dropdown
    const userIcon = document.querySelector('.user-icon');
    const dropdownUser = document.querySelector('.user-dropdown');
    if (userIcon && dropdownUser) {
      userIcon.addEventListener('click', function (e) {
        e.preventDefault();
        dropdownUser.classList.toggle('active');
      });

      document.addEventListener('click', function (e) {
        if (!userIcon.contains(e.target) && !dropdownUser.contains(e.target)) {
          dropdownUser.classList.remove('active');
        }
      });
    }

    // Handle moving header icons based on screen size
    function moveHeaderIcons() {
      const headerIcons = document.querySelector('.header-icons');
      const mobileTopbarContent = document.querySelector('.mobile-topbar-content');
      const topbarHeaderContent = document.querySelector('.topbar-header-content');

      if (window.matchMedia('(max-width:991px)').matches) {
        if (headerIcons && mobileTopbarContent && !mobileTopbarContent.contains(headerIcons)) {
          mobileTopbarContent.appendChild(headerIcons);
        }
      } else {
        if (headerIcons && topbarHeaderContent && !topbarHeaderContent.contains(headerIcons)) {
          topbarHeaderContent.appendChild(headerIcons);
        }
      }
    }

    // Execute on page load and window resize
    moveHeaderIcons();
    window.addEventListener('resize', moveHeaderIcons);

  });
})();

document.addEventListener('DOMContentLoaded', function() {
    var cartIcon = document.getElementById('cart-icon');
    var cartMenu = document.getElementById('cart-menu');
    var cartOverlay = document.getElementById('cart-overlay');
  
    // Fonction pour afficher/masquer le menu et l'overlay
    function toggleCartMenu() {
      cartMenu.classList.toggle('show');
      cartOverlay.classList.toggle('show');
    }
  
    // Afficher/masquer le menu du panier
    cartIcon.addEventListener('click', toggleCartMenu);
  
    // Fermer le menu si l'on clique en dehors du menu, de l'icône ou de l'overlay
    document.addEventListener('click', function(event) {
      if (!cartMenu.contains(event.target) && !cartIcon.contains(event.target) && !cartOverlay.contains(event.target)) {
        cartMenu.classList.remove('show');
        cartOverlay.classList.remove('show');
      }
    });
  
    // Fermer le menu si l'on clique sur l'overlay ou sur le menu
    cartOverlay.addEventListener('click', toggleCartMenu);
    cartMenu.addEventListener('click', toggleCartMenu);
  });
  