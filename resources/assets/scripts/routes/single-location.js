/* eslint-disable */
import faqHooks from '../util/faqOpen';
import * as markerimage from '../../images/RedDot.svg';
import Hammer from 'hammerjs';
import loadGoogle from '../util/loadGoogle';

export default {
  init() {
    // custom equalizer for about section
    const aboutSections = $('.section--about');
    const isDesktop = window.matchMedia("(min-width: 1024px)");
    $(window).on('load resize',function(){
      console.log('single loc equalizer','matches:',isDesktop.matches);
      if (isDesktop.matches) {
        aboutSections.each(function(){
          const leftCol = $(this).find('> .row > .column').eq(0);
          const rightCol = $(this).find('> .row > .column').eq(1);
          // pretitle equalizer
          const rightColPretitle = rightCol.find('.pretitle');
          if (rightColPretitle.length) {
            leftCol.find('h2').css('margin-top',rightColPretitle.outerHeight(true)+'px');
          } else {
            leftCol.find('h2').css('margin-top',0);
          }
        });
      }
    });

    // faq fxns
    faqHooks();

    // map fxns
    let map, marker, mapCircle;
    const distanceKM = 10;
    const $map = $('.splash-hero__loc__map');
    if ($map.length) {
      const placeLoc = [parseFloat($map.find('.marker').data('lat')),parseFloat($map.find('.marker').data('lng'))];
      loadGoogle(function(){
        initMap($map,placeLoc);

        // create initial map centering on Toronto
        function initMap($map,placeLoc) {
          const icon = {
            url: markerimage,
            scaledSize: new google.maps.Size(20, 20),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(10, 10)
          }
          map = new google.maps.Map($map[0], {
            center: { lat: placeLoc[0], lng: placeLoc[1]},
            zoom: 11,
            disableDefaultUI: true
          });
          marker = new google.maps.Marker({
            position: { lat: placeLoc[0], lng: placeLoc[1]},
            icon: icon,
            map,
            title: 'Location'
          });
        }

      });
    }

    // communication section slider
    $('.section__commSlider').each(function(){
      const cards = $(this);
      // hook up swipe gestures
      let listSwipe = new Hammer(cards.find('.section__commSlider__slides__inner')[0]);
      listSwipe.on('swipe', function(ev) {
        const deltaX = ev.deltaX;
        if (ev.distance > 40) { // threshold for swipe
          const activeSlide = cards.find('.section__commSlider__slides__nav button.active').prevAll().length;
          if (deltaX > 0 && activeSlide) { // swipe right
            cards.find('.section__commSlider__slides__nav button').eq(activeSlide - 1).trigger('click');
          } else if (deltaX < 0) { // swipe left
            cards.find('.section__commSlider__slides__nav button').eq(activeSlide + 1).trigger('click');
          }
        }
      });
    })

    $('.section__commSlider__slides__nav button').on('click',function(){
        $(this).addClass('active').siblings().removeClass('active');
        const index = $(this).prevAll().length;
        const slides = $(this).closest('.section__commSlider').find('.section__commSlider__slide');
        slides.css('left','-'+index+'00%');
    });
  },
};
