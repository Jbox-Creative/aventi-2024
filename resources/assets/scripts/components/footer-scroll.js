export default () => {
  // footer scroll appear and bottom clip && add dispatch tracker iframe when footer is near view
  $(window).on('scroll resize',function(){
    const winT = $(this).scrollTop();
    const winH = $(this).outerHeight();
    const winM = winT + (winH / 2);
    const winB = winT + winH;
    const docH = $('body').outerHeight();
    // footer scroll code
    if (winM > docH / 2) {
      $('.footer__scroll').addClass('visible');
    } else {
      $('.footer__scroll').removeClass('visible');
    }
    if (winB - ($(window).outerWidth() < 640 ? 200 : 100) > $('.footer').offset().top) {
      $('.footer__scroll').addClass('end');
    } else {
      $('.footer__scroll').removeClass('end');
    }
  });
}
