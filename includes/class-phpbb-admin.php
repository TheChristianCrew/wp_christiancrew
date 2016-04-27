<?php

class phpBBAdmin {

  private static $options;

  public static function init() {

    add_action( 'admin_menu', array( 'phpBBAdmin', 'phpbb_settings_menu' ) );
    add_action( 'admin_init', array( 'phpBBAdmin', 'phpbb_settings' ) );

  }

  public static function phpbb_settings_menu() {
    add_options_page(
      'phpBB Settings',
      'phpBB Settings',
      'manage_options',
      'phpbb-settings',
      array( 'phpBBAdmin', 'phpbb_settings_page' )
    );
  }

  public static function phpbb_settings_page() {

    if ( current_user_can( 'manage_options' ) )  {

      self::$options = get_option( 'phpbb_options' );

      echo '<div class="wrap">
        <h1>'. esc_html( get_admin_page_title() ) .'</h1>
        <form method="post" action="options.php">';
          settings_fields( 'phpbb_option_group' );
          do_settings_sections( 'phpbb-settings' );
          submit_button();
        echo '</form>
      </div>';

    }

  }

  public static function phpbb_settings() {

    register_setting(
        'phpbb_option_group',
        'phpbb_options',
        array( 'phpBBAdmin', 'sanitize' )
    );

    add_settings_section(
        'phpbb_general_settings',
        'phpBB Information',
        array( 'phpBBAdmin', 'phpbb_settings_section_info' ),
        'phpbb-settings'
    );

    add_settings_field(
        'phpbb_phpbb_path',
        'phpBB Path',
        array( 'phpBBAdmin', 'phpbb_path_callback' ),
        'phpbb-settings',
        'phpbb_general_settings'
    );

    add_settings_field(
        'phpbb_phpbb_url',
        'phpBB URL',
        array( 'phpBBAdmin', 'phpbb_url_callback' ),
        'phpbb-settings',
        'phpbb_general_settings'
    );

  }

  public static function phpbb_settings_section_info() {
    print 'Fill out the details of your phpBB installation.';
  }

  public static function phpbb_path_callback()
  {
      printf(
          '<input type="text" id="phpbb_phpbb_path" name="phpbb_options[phpbb_phpbb_path]" value="%s" />',
          isset( self::$options['phpbb_phpbb_path'] ) ? esc_attr( self::$options['phpbb_phpbb_path']) : ''
      );
  }

  public static function phpbb_url_callback()
  {
      printf(
          '<input type="text" id="phpbb_phpbb_url" name="phpbb_options[phpbb_phpbb_url]" value="%s" />',
          isset( self::$options['phpbb_phpbb_url'] ) ? esc_attr( self::$options['phpbb_phpbb_url']) : ''
      );
  }

  /**
   * Sanitize each setting field as needed
   *
   * @param array $input Contains all settings fields as array keys
   */
  public function sanitize( $input )
  {
      $new_input = array();
      if( isset( $input['phpbb_phpbb_path'] ) )
          $new_input['phpbb_phpbb_path'] = sanitize_text_field( $input['phpbb_phpbb_path'] );

      if( isset( $input['phpbb_phpbb_url'] ) )
          $new_input['phpbb_phpbb_url'] = sanitize_text_field( $input['phpbb_phpbb_url'] );

      return $new_input;
  }

}
