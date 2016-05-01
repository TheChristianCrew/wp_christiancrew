<?php
/**
 * TeamSpeak Button
 */
class Forums_BTN extends WP_Widget {

  public function __construct() {
      $widget_ops = array(
        'classname' => 'forums_btn',
        'description' => 'Forums button'
      );
      parent::__construct( 'forums_btn', 'Forums Button', $widget_ops );
  }

  /**
   * Front end display
   */
  public function widget( $args, $instance ) {
    ?>
    <div class="forums-btn grid-1-4">
      <a href="https://forums.ccgaming.com">
        <i class="fa fa-comments"></i>
        Chat with us on the forums
      </a>
    </div>
    <?php
  }

  /**
   * Back end widget form
   */
  public function form( $instance ) {
    ?>
    <p>
      This widget will display a button with the forums information. There are no configurable options.
    </p>
    <?php
  }

}
