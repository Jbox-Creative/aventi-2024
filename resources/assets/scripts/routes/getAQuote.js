/* eslint-disable */
import haversineDistance from '../util/haversine';
import * as markerimage1 from '../../images/RedDot.svg';
import * as markerimage2 from '../../images/BlueDot.svg';
import loadGoogle from '../util/loadGoogle';

export default {
  init() {
    loadGoogle(function(){
      // variables
      let mapInit = false;
      let usedG1 = false;
      let usedG2 = false;
      let autocompleteStart, autocompleteEnd, map, startMarker, endMarker, mapCircle, inCanada;
      const icon1 = {
        url: markerimage1,
        scaledSize: new google.maps.Size(20, 20),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(10, 10)
      }
      const icon2 = {
        url: markerimage2,
        scaledSize: new google.maps.Size(20, 20),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(10, 10)
      }

      loadForm();
      $(document).on('gform_post_render', loadForm);

      function loadForm() {
        populateOptionImages();
        addAutocomplete();

        // interacting with form inputs
        $('input').on('change keyup',function(){
          isInputValid($(this));
          if ($(this).closest('.address-input').length) {
            if ($(this).val() == '') {
              if ($(this).closest('.address-input').next('.address-input').length) {
                if (startMarker !== undefined) { startMarker.setMap(null); startMarker = undefined; }
              } else {
                if (endMarker !== undefined) { endMarker.setMap(null); endMarker = undefined; }
              }
              centerMap();
            }
          }
        });

        // interact with form submit
        $('input[type="submit"]').on('click',function(e){
          const form = $(this).closest('form');
          const isValid = isFormValid(form);
          if (isValid) {
            $('.quote-form__intro').slideUp();
            $('.quote-form__background').fadeOut();
            $('html, body').animate({ scrollTop: 0 }, 600);
            // push GTM event
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ event: "formSubmissionFull" });
          }
        });
      }

      function populateOptionImages() {
        console.log('populating option images');
        const optionImages = $('.form-section__data img');
        const radios = $('.gfield_radio li');
        radios.each(function(){
          const radio = $(this);
          const text = $(this).find('label').text().trim().toLowerCase();
          optionImages.each(function(){
            const option = $(this).data('option').toLowerCase();
            if (option == text) {
              $(this).clone().prependTo(radio);
            }
          });
        });
      }

      function addAutocomplete() {
        // add autocomplete to location fields
        autocompleteStart = new google.maps.places.Autocomplete($('.address-input input')[0], {types: ['geocode']});
        autocompleteEnd = new google.maps.places.Autocomplete($('.address-input input')[1], {types: ['geocode']});
        autocompleteStart.setFields(['address_components','geometry']);
        autocompleteEnd.setFields(['address_components','geometry']);
        // when autocomplete is used, update map
        autocompleteStart.addListener('place_changed', function() { usedG1 = true; fillInAddress('start'); isInputValid($('input[id$="_4"]')); });
        autocompleteEnd.addListener('place_changed', function() { usedG2 = true; fillInAddress('end'); isInputValid($('input[id$="_5"]')); });
        // clear usedG1/G2 when the user manually types
        $('.address-input input').eq(0).on('keyup',function(){ usedG1 = false; });
        $('.address-input input').eq(1).on('keyup',function(){ usedG2 = false; });
      }

      function fillInAddress(pos = 'start') {
        // Get the place details from the autocomplete object.
        if (pos == 'start') {
          var place = autocompleteStart.getPlace();
          // if it's the starting address and also in Canada, populate the hidden closest location fields
          inCanada = false;
          const postalRegex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
          $.each(place.address_components,function(index,item){
            if (item.long_name == 'Canada') {
              inCanada = true;
            }
            if (postalRegex.exec(item.long_name)) {
              $('.quote-form input.gform_hidden').filter('[id$="_26"]').val(item.long_name);
            }
          });
          if (inCanada) { populateAddressFields(place); }
        } else {
          var place = autocompleteEnd.getPlace();
          // if the starting address is outside Canada, populate the hidden location fields based on the ending address
          if (!inCanada && usedG1) {
            populateAddressFields(place);
          }
        }
        const placeLoc = [place.geometry.location.lat(),place.geometry.location.lng()];
        updateMap(placeLoc,pos);
        // if both From and To inputs have been used, determine the Move Type
        if (usedG1 && usedG2) {
          const fromPlace = autocompleteStart.getPlace();
          const toPlace = autocompleteEnd.getPlace();
          let moveType = false;
          if ('address_components' in fromPlace && 'address_components' in toPlace) {
            var fromCountry, fromProvince, toCountry, toProvince;
            $.each(fromPlace.address_components, function(index,item){
              if (item.types[0]=='administrative_area_level_1') {
                fromProvince = item.long_name;
              }
              if (item.types[0]=='country') {
                fromCountry = item.long_name;
              }
            });
            $.each(toPlace.address_components, function(index,item){
              if (item.types[0]=='administrative_area_level_1') {
                toProvince = item.long_name;
              }
              if (item.types[0]=='country') {
                toCountry = item.long_name;
              }
            });
            if (fromCountry == toCountry && fromProvince == toProvince) {
              moveType = "Interprovincial";
            } else if(fromCountry == toCountry) {
              moveType = "Out of Province";
            } else {
              moveType = "Out of Country";
            }
          } else {
            moveType = "Error";
          }
          $('.quote-form input.gform_hidden').filter('[id$="_27"]').val(moveType);
        }
      }

      function populateAddressFields(place) {
        if (locData && locData.length) {
          let closestLoc = false;
          let closestLocDist = 99999999999;
          const placeLoc = [place.geometry.location.lat(),place.geometry.location.lng()];
          $.each(locData,function(index,item){
            const distanceKM = haversineDistance(placeLoc,[item.lat,item.lng]);
            if (distanceKM < closestLocDist) {
              closestLocDist = distanceKM;
              closestLoc = item;
            }
          })
          if (closestLoc) {
            // add closest location name and email to the hidden fields in the Quote Form (24, 25)
            $('.quote-form input.gform_hidden').filter('[id$="_24"]').val(closestLoc.name);
            $('.quote-form input.gform_hidden').filter('[id$="_25"]').val(closestLoc.email);
          }
        }
      }

      function updateMap(placeLoc,marker = 'start') {
        const $map = $('.form-section__map');
        if (!mapInit) {
          $map.parent().addClass('form-section__side__box--map');
          initMap($map,placeLoc);
          $map.show();
          mapInit = true;
        }
        if (marker == 'start') {
          if (startMarker !== undefined) { startMarker.setMap(null); }
          startMarker = popMarker(placeLoc, 'Your Start Location');
        } else {
          if (endMarker !== undefined) { endMarker.setMap(null); }
          endMarker = popMarker(placeLoc, 'Your End Location');
        }
        centerMap();
        autocompleteStart.bindTo('bounds', map);
        autocompleteEnd.bindTo('bounds', map);
      }
      // create initial map centering on Toronto
      function initMap($map,placeLoc) {
        map = new google.maps.Map($map[0], {
          center: { lat: placeLoc[0], lng: placeLoc[1]},
          zoom: 14,
          disableDefaultUI: true
        });
      }
      // populate marker function
      function popMarker(placeLoc,title) {
        const icon = title=='Your Start Location' ? icon1 : icon2;
        const newPos = { lat: placeLoc[0], lng: placeLoc[1]};
        const marker = new google.maps.Marker({
          position: newPos,
          map,
          icon: icon,
          title: title
        });
        return marker;
      }
      // center map to show all markers and add distance radius if both markers are present
      function centerMap() {
        // Create map boundaries from all map markers.
        var bounds = new google.maps.LatLngBounds();
        var twoPoints = startMarker !== undefined && endMarker !== undefined;
        if (startMarker) {
          bounds.extend({
              lat: startMarker.position.lat(),
              lng: startMarker.position.lng()
          });
        }

        if (endMarker) {
          bounds.extend({
              lat: endMarker.position.lat(),
              lng: endMarker.position.lng()
          });
        }

        if (mapCircle !== undefined) { mapCircle.setMap(null); }

          $('.distance-display').remove();
        if( !twoPoints ){
          // Case: Single marker.
          map.setCenter( bounds.getCenter() );
        } else{
          // Case: Multiple markers.
          map.fitBounds( bounds );
          const distanceKM = haversineDistance(
            [startMarker.position.lat(),startMarker.position.lng()],
            [endMarker.position.lat(),endMarker.position.lng()]
            );
          // create radius circle
          mapCircle = new google.maps.Circle({
            strokeColor: "#e82c2a",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#e82c2a",
            fillOpacity: 0.35,
            map,
            center: startMarker.position,
            radius: distanceKM * 1000
          });
          // create/update distance display
          $('.form-section__side__box--map').append('<div class="distance-display">Total '+Math.round(distanceKM * 100) / 100+' km</div>');
        }
      }

      // validate get a quote form
      function isFormValid(form) {
        const requiredInputs = form.find('.gfield_contains_required');
        let isValid = true;
        requiredInputs.each(function(){
          const input = $(this).find('input');
          const tempIsValid = isInputValid(input);
          if (!tempIsValid) {
            isValid = false;
          }
        });
        console.log('form is valid:',isValid,' errors: '+$('.input-error').length+'/'+requiredInputs.length);
        return isValid;
      }
      // validate single input
      function isInputValid(input) {
        const inputType = input.eq(0).attr('type');
        let isValid = true;
        input.removeClass('input-error').closest('.gfield').removeClass('gfield_error');
        if (inputType == 'text') {
          const val = input.val();
          const label = input.attr('placeholder');
          console.log('checking '+label+': '+val,val!='');
          if (val=='') {
            isValid = false;
            input.addClass('input-error').closest('.gfield').addClass('gfield_error');
          }
          // special case for From/To Address fields, make sure they used the Google Places dropdown
          if ((input.attr('name') == 'input_4') && isValid && !usedG1) {
            isValid = false;
            input.addClass('input-error');
          }
          if ((input.attr('name') == 'input_5') && isValid && !usedG2) {
            isValid = false;
            input.addClass('input-error');
          }
        }
        return isValid;
      }
    });
  },
};
