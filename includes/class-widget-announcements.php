<?php
/**
 * TeamSpeak Button
 */
class CC_Announcements extends WP_Widget {

  public function __construct() {
      $widget_ops = array(
        'classname' => 'cc_announcements',
        'description' => 'Home page announcements'
      );
      parent::__construct( 'cc_announcements', 'Announcements', $widget_ops );
  }

  /**
   * Front end display
   */
  public function widget( $args, $instance ) {
    $title = $instance['announcement_title'];
    $description = $instance['announcement_description'];
    $url = $instance['announcement_url'];
    $bg_img = !empty($instance['announcement_bg_img']) ? ' style="background: url('. $instance['announcement_bg_img'] .') no-repeat"' : '';
    ?>
    <div class="col-1-2">
      <article class="announcement"<?php echo $bg_img; ?>>
        <a href="<?php echo $url; ?>">
          <div class="overlay">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $description; ?></p>
            <span>Read More <i class="fa fa-arrow-circle-o-right"></i></span>
          </div>
        </a>
      </article>
    </div>
    <?php
  }

  /**
   * Back end widget form
   */
  public function form( $instance ) {
    $announcement_title = ! empty( $instance['announcement_title'] ) ? $instance['announcement_title'] : '';
    $announcement_description = ! empty( $instance['announcement_description'] ) ? $instance['announcement_description'] : '';
    $announcement_url = ! empty( $instance['announcement_url'] ) ? $instance['announcement_url'] : '';
    $announcement_bg_img = ! empty( $instance['announcement_bg_img'] ) ? $instance['announcement_bg_img'] : '';
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'announcement_title' ); ?>"><?php _e( 'Announcement title:' ); ?></label>
  		<input class="widefat" id="<?php echo $this->get_field_id( 'announcement_title' ); ?>" name="<?php echo $this->get_field_name( 'announcement_title' ); ?>" type="text" value="<?php echo esc_attr( $announcement_title ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'announcement_description' ); ?>"><?php _e( 'Announcement description:' ); ?></label>
  		<input class="widefat" id="<?php echo $this->get_field_id( 'announcement_description' ); ?>" name="<?php echo $this->get_field_name( 'announcement_description' ); ?>" type="text" value="<?php echo esc_attr( $announcement_description ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'announcement_url' ); ?>"><?php _e( 'Announcement URL:' ); ?></label>
  		<input class="widefat" id="<?php echo $this->get_field_id( 'announcement_url' ); ?>" name="<?php echo $this->get_field_name( 'announcement_url' ); ?>" type="text" value="<?php echo esc_attr( $announcement_url ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'announcement_bg_img' ); ?>"><?php _e( 'Announcement background image:' ); ?></label>
  		<input class="widefat" id="<?php echo $this->get_field_id( 'announcement_bg_img' ); ?>" name="<?php echo $this->get_field_name( 'announcement_bg_img' ); ?>" type="text" value="<?php echo esc_attr( $announcement_bg_img ); ?>">
    </p>
    <?php
  }

  /**
   * Save widget options
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();

    $instance['announcement_title'] = ( ! empty( $new_instance['announcement_title'] ) ) ? strip_tags( $new_instance['announcement_title'] ) : '';
    $instance['announcement_description'] = ( ! empty( $new_instance['announcement_description'] ) ) ? strip_tags( $new_instance['announcement_description'] ) : '';
    $instance['announcement_url'] = ( ! empty( $new_instance['announcement_url'] ) ) ? strip_tags( $new_instance['announcement_url'] ) : '';
    $instance['announcement_bg_img'] = ( ! empty( $new_instance['announcement_bg_img'] ) ) ? strip_tags( $new_instance['announcement_bg_img'] ) : '';

    return $instance;
  }

}
