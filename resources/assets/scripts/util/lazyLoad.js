/* eslint-disable */
import './polyfills';
import LazyLoad from 'vanilla-lazyload/dist/lazyload.min.js';

export default () => {
  if ('loading' in HTMLImageElement.prototype) {
    // use native lazyloading if available via browser
    const images = document.querySelectorAll('img.lazyload');
    images.forEach(img => {
      img.src = img.dataset.src;
      if (img.dataset.srcset !== undefined) { img.srcset = img.dataset.srcset; }
    });
  } else {
    // lazyLoad fallback
    const myLazyLoad = new LazyLoad({
      elements_selector: '.lazyload',
      skip_invisible: false,
      callback_set: function (img) {
        picturefill({ // polyfill for IE 11
            elements: [img]
        });
      },
    });
  }
}
