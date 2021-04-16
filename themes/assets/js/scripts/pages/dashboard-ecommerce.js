/*=========================================================================================
  Author: Muhammad Saif
  Author URL: https://saifcodes.com
==========================================================================================*/

$(window).on('load', function () {
  'use strict';
  var isRtl = $('html').attr('data-textdirection') === 'rtl';

  // On load Toast
  setTimeout(function () {
    toastr['success'](
      'You have successfully logged in to HMS.',
      '👋 Welcome!',
      {
        closeButton: true,
        tapToDismiss: false,
        rtl: isRtl
      }
    );
  }, 2000);

  
});
