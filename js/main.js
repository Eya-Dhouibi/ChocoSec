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

  document.addEventListener('DOMContentLoaded', () => {
    const searchIcon = document.getElementById('search-icon');
    const searchInputContainer = document.getElementById('search-input-container');

    searchIcon.addEventListener('click', () => {
        // Basculer entre visible et caché
        searchInputContainer.classList.toggle('search-input-visible');
    });
});



})();