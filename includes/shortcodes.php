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
