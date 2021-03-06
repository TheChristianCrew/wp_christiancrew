/**
 * Main CC JavaScript file
 */

/**
 * Initiate responiveNav plugin
 * http://responsive-nav.com
 */
var nav = responsiveNav(".site-nav");

/**
 * Begin jQuery
 */
jQuery(document).ready(function($){

  /**
   * Get TeamSpeak data through the PlanetTeamSpeak REST API
   * https://www.planetteamspeak.com/rest-api/
   */
  $.getJSON('https://api.planetteamspeak.com/serverstatus/ts.ccgaming.com/', function(json) {

    var $ts_users = $('.ts-users');

    // Did we get a successfull connection?
    if (json.status == 'success') {
      var $ts_data = json.result;
      $ts_users.html($ts_data.users);
    } else {
      $ts_users.html('TS : Offline').addClass('offline');
    }

  });

  $('.ts-btn').magnificPopup({
    type: 'ajax'
  });

  /**
   * jQuery parallax effect
   * https://github.com/wagerfield/parallax
   */
   $('#scene').parallax();

   // Get viewport size
   $(window).resize(function() {
     $('#scene').css( { 'width': $(this).width(), 'height': $(this).height() } );
   });
   $(window).resize();

});
