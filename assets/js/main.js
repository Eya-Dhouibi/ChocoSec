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

  
  document.addEventListener('DOMContentLoaded', function () {
    var menu = document.getElementById('navbarNav'); // Le menu (collapse Bootstrap)
    var menuOverlay = document.getElementById('menu-overlay'); // L'overlay

    // Écoute les changements sur le menu grâce à l'événement "shown.bs.collapse" et "hidden.bs.collapse"
    menu.addEventListener('shown.bs.collapse', function () {
        menuOverlay.classList.add('show');
    });

    menu.addEventListener('hidden.bs.collapse', function () {
        menuOverlay.classList.remove('show');
    });

    // Permet de fermer le menu en cliquant sur l'overlay
    menuOverlay.addEventListener('click', function () {
        var collapse = bootstrap.Collapse.getInstance(menu);
        if (collapse) {
            collapse.hide();
        }
    });
});

  
  
  document.addEventListener('DOMContentLoaded', () => {
    const searchIcon = document.getElementById('search-icon');
    const searchInputContainer = document.getElementById('search-input-container');

    searchIcon.addEventListener('click', () => {
        // Basculer entre visible et caché
        searchInputContainer.classList.toggle('search-input-visible');
    });
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


document.addEventListener('DOMContentLoaded', function () {
    const userIcon = document.querySelector('.user-icon');
    const dropdownUser = document.querySelector('.user-dropdown');

    if (userIcon && dropdownUser) {
        // Afficher/Masquer le menu lorsque l'icône utilisateur est cliquée
        userIcon.addEventListener('click', function (e) {
            e.preventDefault();
            dropdownUser.classList.toggle('active');
        });

        // Fermer le menu lorsqu'on clique en dehors
        document.addEventListener('click', function (e) {
            if (!userIcon.contains(e.target) && !dropdownUser.contains(e.target)) {
                dropdownUser.classList.remove('active');
            }
        });
    }
});