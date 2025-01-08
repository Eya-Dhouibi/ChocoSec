
  export function setupStickyHeader() {
    const $header = $(".header-wrapper.sticky-top");
    if (!$header.length) return;

    let lastScrollTop = 0;
    const headerHeight = $header.outerHeight();
    $("body").css("padding-top", `${headerHeight}px`);

    $(window).on("scroll", () => {
      const currentScroll = $(window).scrollTop();
      const isScrollingDown = currentScroll > lastScrollTop;

      $header.toggleClass("scroll_down", isScrollingDown);
      $header.toggleClass("scroll_up", !isScrollingDown);
      $header.toggleClass("sticky-header", currentScroll > headerHeight);

      lastScrollTop = currentScroll;
    });
  }

  export function handleHeaderIcons() {
    const $headerIcons = $(".header-icons");
    const $mobileContainer = $(".mobile-topbar-content");
    const $desktopContainer = $(".topbar-header-content");

    if (!$headerIcons.length || !$mobileContainer.length || !$desktopContainer.length) return;

    const moveIcons = () => {
      const isMobile = window.matchMedia("(max-width: 991px)").matches;
      const $targetContainer = isMobile ? $mobileContainer : $desktopContainer;

      if (!$targetContainer.find($headerIcons).length) {
        $headerIcons.appendTo($targetContainer);
      }
    };

    moveIcons();
    $(window).on("resize", moveIcons);
  }
