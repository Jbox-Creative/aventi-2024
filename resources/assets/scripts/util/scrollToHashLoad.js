/* Force a specific smooth scroll to a selector */
import {scrollToElement} from './smooth-scroll';

export default function smoothScrollToHash() {
  const hash = window.location.hash;
  if (hash) {
    if (hash.includes('faq')) {
      // click the FAQ item to open before scrolling to
      $(window).on('load',function(){
        $(hash).find('.faqOverview__item__head').trigger('click');
      });
    }
    const scrollTo = $(hash);
    scrollToElement(scrollTo);
  }
}
