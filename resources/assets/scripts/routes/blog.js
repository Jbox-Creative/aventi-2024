export default {
  init() {
    // filter follows user down the page
    $(window).on('scroll',function(){
      const filter = $('.blogOverview__filter');
      if (document.body.clientWidth > 750) {
        const cont = $('.blogOverview');
        const posts = $('.blogOverview__posts');
        const winT = $(this).scrollTop();
        const contT = cont.offset().top;
        const headerOffset = $('.header__main').outerHeight();
        if (winT + headerOffset > contT) {
          filter.addClass('clipped');
          const filterHeight = filter.find('.blogOverview__filter__inner').outerHeight();
          const postsBottom = posts.offset().top + posts.outerHeight();
          if (winT + headerOffset + filterHeight > postsBottom) {
            filter.addClass('end');
          } else {
            filter.removeClass('end');
          }
        } else {
          filter.removeClass('clipped end');
        }
      } else {
        filter.removeClass('clipped end');
      }
    });
    // filtering blog posts
    $('.blogOverview__filter a').on('click',function(e){
        e.preventDefault();
        $(this).addClass('active').siblings().removeClass('active');
        const filterID = $(this).data('id');
        const posts = $('.blogOverview .card');
        if (filterID == -1) {
          posts.show('fast');
        } else {
          posts.each(function(){
            $(this).hide('fast');
            const terms = $(this).data('terms').toString();
            if (terms!=null) {
              console.log(terms);
              if (terms.includes(filterID)) {
                $(this).show('fast');
              }
            }
          });
        }
    });
  },
};
