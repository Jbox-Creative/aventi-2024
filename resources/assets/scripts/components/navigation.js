export default () => {
  // set up Mega menu links
  const init = (action) => {
    const megaMenu = $('.enable-megamenu a')
    megaMenu.on(action, function(e) {
      console.log(action);
      if (action == 'mouseover') {
        if ($('.enable-megamenu').hasClass('active')) {
          $('.enable-megamenu').removeClass('active')
        }
        if (!$(this).closest('.enable-megamenu').hasClass('active')) {
          $(this).closest('.enable-megamenu').addClass('active')
        }
      }
      if (action == 'click') {
        if ($(e.target).hasClass('mega-menu__buttons')) {
          $(this).closest('.enable-megamenu').toggleClass('active');
          e.preventDefault();
          e.stopPropagation();
        } else {
          // Close mobile menu when clicking a parent link
          if ($(window).width() < 1070) {
            $('.header__nav').removeClass('active');
            $('.header').removeClass('active');
            $('#hamburger').removeClass('active');
          }
        }
      }
    })
  };
  if ($(window).width() < 1070) {
    init('click')
  } else {
    init('mouseover');
    $('.header__main').on('mouseleave', function() {
      $('.enable-megamenu').removeClass('active')
    })
  }

  $('#hamburger').on('click', function(e) {
    e.preventDefault()
    if (!$(this).hasClass('active')) {
      $('.header').addClass('active')
      $('.header__nav').addClass('active')
      $(this).addClass('active')
    } else {
      $('.header__nav').removeClass('active')
      $('.header').removeClass('active')
      $(this).removeClass('active')
    }
  })
  $(window).on('resize', function() {
    if ($(window).width() <= 1070) {
      init('click')
    } else {
      init('mouseover')
    }
  })

  $(window).on('load scroll',function() {
    const marker = $(window).width() <= 640 ? 0 : ($('.header__top').length ? $('.header__top').height() : 0);
    if ($(window).scrollTop() > marker) {
      if (!$('.header').hasClass('fixed')) { $('.header').addClass('fixed'); }
    } else {
      if ($('.header').hasClass('fixed')) { $('.header').removeClass('fixed'); }
    }
  })

  $(window).on('load resize',updateMargins)
  updateMargins();

  function updateMargins() {
    if ($(window).width() <= 640) {
      const topOffset = Math.max($('.mobile-only.navigation').outerHeight(), 0);
      $('.header__nav').css('margin-top', topOffset-2);
      $('body > .wrap.container').css('margin-top', topOffset);
      console.log(topOffset);
    } else {
      $('.header__nav').css('margin-top', 0);
      $('body > .wrap.container').css('margin-top', 0);
    }
  }
}
