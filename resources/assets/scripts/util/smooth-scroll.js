/* Smooth Scroll to a specific section of the page by providing its ID attribute as hashValue parameter to the function */

export default function smoothScroll(selector) {
  $(selector).click(function (e) {
    const scrollTo = $($(this).attr('href'));
    if (scrollTo.length) {
      e.preventDefault();
      scrollToElement(scrollTo);
    }
  });
}

export const scrollToElement = function (element) {
  let headerHeight = $('.header__main').outerHeight() + ($('.subnav').length ? $('.subnav').outerHeight() : 0);
  if ($('.template-faq').length) { headerHeight -= 40; }

  if(element.length) {
    $('html, body').animate(
      {
        scrollTop: element.offset().top - headerHeight - 20,
      },
      500
    );
  }
}
