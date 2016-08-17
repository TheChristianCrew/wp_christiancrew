<?php
/**
 * Shortcodes
 */

/**
 * Grid container
 */
function grid ( $atts, $content = null ) {
  return '<div class="grid">'. do_shortcode( $content ) .'</div>';
}
add_shortcode( 'grid', 'grid' );

/**
 * Grid Rows
 */
function col( $atts, $content = null ) {

  extract( shortcode_atts( array(
    'col' => '1-1'
  ), $atts ) );

  return '<div class="col-'. $col .'">'. do_shortcode( $content ) .'</div>';

}
add_shortcode( 'col', 'col' );

/**
 * TeamSpeak Button
 */
function ts_btn() {
  return '<div class="widget-ts sc">
      <a href="'. get_template_directory_uri() .'/tsviewer.php" class="ts-btn">
        <em class="ts-users">-</em> people on<br /> TeamSpeak
        <div class="overlay">
          <strong>Server IP:</strong> ts.ccgaming.com<br />
          <strong>Password:</strong> none
          <strong class="server-details">Server Details</strong>
        </div>
      </a>
    </div>';
}
add_shortcode( 'ts-btn', 'ts_btn' );

/**
 * Forums Button
 */
function forums_btn() {
  return '<div class="widget-forum sc">
    <a href="https://forums.ccgaming.com">
      <i class="fa fa-comments"></i>
      Chat with us on the forums
    </a>
  </div>';
}
add_shortcode( 'forums-btn', 'forums_btn' );

/**
 * Steam Button
 */
 function steam_btn() {
   return '<div class="widget-steam sc">
     <a href="https://steamcommunity.com/groups/christiancrewgaming">
       <i class="fa fa-steam"></i>
       Join our Steam group
     </a>
   </div>';
 }
 add_shortcode( 'steam-btn', 'steam_btn' );

/**
 * Join Button
 */
function join_btn() {
  return '<div class="widget-join sc">
    <a href="'. get_site_url() .'/join">
      <i class="fa fa-pencil"></i>
      Join Christian Crew Gaming!
    </a>
  </div>';
}
add_shortcode( 'join-btn', 'join_btn' );

/**
 * Unban Request Button
 */
 function unban_request_btn() {
   return '<div class="widget-unban-request sc">
     <a href="https://servers.ccgaming.com/index.php?p=protest">
       <i class="fa fa-frown-o"></i>
       Request to be unbanned from our servers
     </a>
   </div>';
 }
 add_shortcode( 'unban-request-btn', 'unban_request_btn' );

/**
* Admin Request Button
*/
function admin_request_btn() {
  return '<div class="widget-admin-request sc">
    <a href="'. get_site_url() .'/about/adminrequest">
      <i class="fa fa-gavel"></i>
      Request to be an admin of our servers
    </a>
  </div>';
}
add_shortcode( 'admin-request-btn', 'admin_request_btn' );
