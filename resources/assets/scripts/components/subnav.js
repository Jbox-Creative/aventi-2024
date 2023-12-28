export default () => {
  // make subnav items hook to header when scrolled past and stop if they reach the end of the focus element
  const subnavs = $('.subnav');
  $(window).on('load scroll',function(){
    const winT = $(this).scrollTop();
    const headerH = $('.header__main').outerHeight();
    const focus = $('.subnav-focus');
    const focusB = focus.offset().top + focus.outerHeight();

    subnavs.each(function(){
      const thisT = $(this).offset().top;
      if (thisT <= winT + headerH && winT + headerH + 100<focusB) {
        if (!$(this).hasClass('clipped')) {
          $(this).find('.subnav__inner').css('width',$(this).width());
          $(this).addClass('clipped');
        }
        // highlight portions of the subnav when that section is in view
        const links = $(this).find('a');
        links.each(function(){
          const linkSection = $($(this).attr('href'));
          if (linkSection.length) {
            const linkT = linkSection.offset().top;
            if (winT + headerH + $('.subnav').outerHeight() >= linkT - 50) {
              $(this).addClass('active').siblings().removeClass('active');
            }
          }
        });
      } else if ($(this).hasClass('clipped')) {
        $(this).removeClass('clipped');
      }
    });
  });
  // ensure subnavs resize if the window is resized and the subnav is clipped
  $(window).on('resize',function(){
    subnavs.each(function(){
      if ($(this).hasClass('clipped')) {
        $(this).find('.subnav__inner').css('width',$(this).width());
      } else {
        $(this).find('.subnav__inner').attr('style','');
      }
    });
  });
}
