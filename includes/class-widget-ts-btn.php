<?php
/**
 * TeamSpeak Button
 */
class TS_BTN extends WP_Widget {

  public function __construct() {
      $widget_ops = array(
        'classname' => 'ts_btn',
        'description' => 'TeamSpeak button'
      );
      parent::__construct( 'ts_btn', 'TeamSpeak Button', $widget_ops );
  }

  /**
   * Front end display
   */
  public function widget( $args, $instance ) {
    ?>
    <div class="ts-widget grid-1-4">
      <a href="<?php echo get_template_directory_uri(); ?>/tsviewer.php" class="ts-btn">
        <em class="ts-users">-</em> people on<br /> TeamSpeak
        <div class="overlay">
          <strong>Server IP:</strong> ts.ccgaming.com<br />
          <strong>Password:</strong> none
          <strong class="server-details">Server Details</strong>
        </div>
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
      This widget will display a button with TeamSpeak information. There are no configurable options.
    </p>
    <?php
  }

}
