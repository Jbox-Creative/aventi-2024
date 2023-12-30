export default () => {
  const tabletQuery = window.matchMedia('(max-width: 1024px)');

  // mobile menu toggle
  $('.header__menu-toggle').on('click',function() {
    if(tabletQuery.matches) {
      const header = $('.header');

      if (!$(this).hasClass('toggled')) {
        $(this).addClass('toggled').prop('ariaExpanded', true);
        header.addClass('open');
        header.find('.main-nav__list--mobile .menu-item').find('.menu-item__link').first().focus();
      } else {
        $(this).removeClass('toggled').prop('ariaExpanded', false);
        header.removeClass('open');
      }
    }
  });
}
