/* eslint-disable */
export default () => {
  gform.addFilter( 'gform_datepicker_options_pre_init', function( optionsObj, formId, fieldId ) {
    optionsObj.firstDay = 1;
    optionsObj.minDate = '+2d';
    optionsObj.maxDate = '+2y';
    return optionsObj;
  });

  $(window).on('scroll',function(){
    $('.datepicker').datepicker("hide");
  });

  function removeAuto() {
    // remove autocomplete from date fields and address search fields for Google Autocomplete
    $('input.datepicker, .address-input input').attr('autocomplete','none');
    setTimeout(function(){
      $('input.datepicker, .address-input input').attr('autocomplete','none');
    }, 100);
  }

  $(window).on('load',removeAuto);

  processLabels();
  $(document).on('gform_post_render', processLabels);
  function processLabels() {
    removeAuto();
    // populate form labels as placeholders
    $('.gfield').each(function(){
      const isMulti = $(this).find('.ginput_complex').length;
      if (isMulti) {
        $('.ginput_left, .ginput_right').each(function(){
          const label = $(this).find('label');
          $(this).find('input[type="text"]').attr('placeholder',label.text());
        })
      } else {
        const label = $(this).find('.gfield_label');
        $(this).find('input[type="text"]').attr('placeholder',label.text());
      }
    });
  }
  // stop a user from pressing enter and submitting form prematurely
  $(document).on( 'keypress', '.gform_wrapper', function (e) {
   var code = e.keyCode || e.which;
   if ( code == 13 && ! jQuery( e.target ).is( 'textarea,input[type="submit"],input[type="button"]' ) ) {
     e.preventDefault();
     return false;
   }
  });
}
