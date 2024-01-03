import lazyLoad from '../util/lazyLoad';
import forms from '../util/forms';
import smoothScroll from '../util/smooth-scroll';
import smoothScrollToHash from '../util/scrollToHashLoad';
import navigation from '../components/navigation';
import footerScroll from '../components/footer-scroll';
import wordMarquee from '../blocks/word-marquee';
import teamGrid from '../blocks/team-grid';

export default {
  init() {
    // lazy loading images
    lazyLoad();
    // form JS
    if ($('.gform_wrapper').length) {
      forms();
    }
    // smooth scroll on click
    smoothScroll('a[href*="#"]');
    // Handle smooth scroll for loading hash
    smoothScrollToHash();
    // Footer Scroll
    footerScroll();
    // mega-menu JS
    if ($('.header').length) {
      navigation();
    }
    if ($('.word-marquee').length) {
      wordMarquee();
    }
    if ($('.team-grid').length) {
      teamGrid();
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
