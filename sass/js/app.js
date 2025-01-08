(() => {
  "use strict";

  /**
   * Initialisation d'AOS
   */
  function initializeAOS() {
    AOS.init({
      duration: 600,
      easing: "ease-in-out",
      once: true,
      mirror: false,
    });
  }

  /**
   * Gestionnaire générique pour les événements de bascule
   */
  function setupToggle({
    toggleButton,
    targetElement,
    toggleClass = "show",
    closeOnOutsideClick = false,
    overlay = null,
  }) {
    if (!toggleButton || !targetElement) return;

    const toggleVisibility = () => {
      const isVisible = targetElement.classList.toggle(toggleClass);
      if (overlay) overlay.classList.toggle("show", isVisible);
    };

    const closeVisibility = () => {
      targetElement.classList.remove(toggleClass);
      if (overlay) overlay.classList.remove("show");
    };

    toggleButton.addEventListener("click", toggleVisibility);

    if (overlay) overlay.addEventListener("click", closeVisibility);

    if (closeOnOutsideClick) {
      document.addEventListener("click", (event) => {
        if (
          !targetElement.contains(event.target) &&
          !toggleButton.contains(event.target)
        ) {
          closeVisibility();
        }
      });
    }
  }

  function setupStickyHeader() {
    const header = document.querySelector(".header-wrapper.sticky-top");
    if (!header) return;

    let lastScrollTop = 0;
    const headerHeight = header.offsetHeight;
    document.body.style.paddingTop = `${headerHeight}px`;

    window.addEventListener("scroll", () => {
      const currentScroll = window.scrollY;
      const isScrollingDown = currentScroll > lastScrollTop;

      header.classList.toggle("scroll_down", isScrollingDown);
      header.classList.toggle("scroll_up", !isScrollingDown);
      header.classList.toggle("sticky-header", currentScroll > headerHeight);

      lastScrollTop = currentScroll;
    });
  }
 // function handleHeaderIcons() {
  //   const headerIcons = document.querySelector(".header-icons");
  //   const mobileContainer = document.querySelector(".mobile-topbar-content");
  //   const desktopContainer = document.querySelector(".topbar-header-content");

  //   if (!headerIcons || !mobileContainer || !desktopContainer) return;

  //   const moveIcons = () => {
  //     const isMobile = window.matchMedia("(max-width: 991px)").matches;
  //     const targetContainer = isMobile ? mobileContainer : desktopContainer;

  //     if (!targetContainer.contains(headerIcons)) {
  //       targetContainer.appendChild(headerIcons);
  //     }
  //   };

  //   moveIcons();
  //   window.addEventListener("resize", moveIcons);
  // }

 
  /**
   * Initialisation au chargement du DOM
   */
  document.addEventListener("DOMContentLoaded", () => {
    initializeAOS();
    setupStickyHeader();
    //handleHeaderIcons();

    setupToggle({
      toggleButton: document.getElementById("search-icon"),
      targetElement: document.getElementById("search-input-container"),
      overlay: document.getElementById("cart-overlay"),
    });

    setupToggle({
      toggleButton: document.querySelector(".user-icon"),
      targetElement: document.querySelector(".user-dropdown"),
      closeOnOutsideClick: true,
    });

    setupToggle({
      toggleButton: document.getElementById("cart-icon"),
      targetElement: document.getElementById("cart-menu"),
      overlay: document.getElementById("cart-overlay"),
    });

    function toggleMenu() {
      const navbarToggler = document.querySelector(".navbar-toggler");
      const closeMenuButton = document.getElementById("close-menu");
      const navMenu = document.getElementById("navbarNav");
      const menuOverlay = document.getElementById("page-overlay");

      setupToggle({
        toggleButton: navbarToggler,
        targetElement: navMenu,
        overlay: menuOverlay,
        closeOnOutsideClick: true,
      });

      closeMenuButton.addEventListener("click", () => {
        navMenu.classList.remove("show");
        menuOverlay.classList.remove("show");
      });
    }

    toggleMenu();
  });

  document.addEventListener("DOMContentLoaded", function () {
    const lazyImages = document.querySelectorAll("img[data-src]");

    const loadLazyImage = (image) => {
      image.src = image.dataset.src;
      image.removeAttribute("data-src");
    };

    const options = {
      rootMargin: "200px 0px",
      threshold: 0.01,
    };

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          loadLazyImage(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, options);

    lazyImages.forEach((image) => {
      observer.observe(image);
    });
  });
})();

document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelector(".woocommerce-products-slider");
  jQuery('.carousel').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: false,
    cssEase: 'linear'
  });

  if (slider) {
    jQuery(slider).slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: true,
      dots: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            arrows: true,
            dots: true,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            arrows: false,
            dots: true,
          },
        },
      ],
    });
  }
});

