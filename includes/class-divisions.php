<?php
/**
 * Divisions Custom Post Type
 */

class CC_Divisions {

    /**
     * Initialize plugin
     */
    function __construct() {

        add_action( 'init', array( $this, 'create_post_type' ) );
        add_action( 'add_meta_boxes', array( $this, 'add_division_details_box' ) );
        add_action( 'save_post', array( $this, 'save_division_details' ) );
        add_action( 'admin_head', array( $this, 'division_post_page_css' ) );

        // Template action hooks
        add_action( 'cc_get_division_list', array( $this, 'get_division_list' ) );

    }

    /**
     * Create the division post type
     */
    function create_post_type() {

        register_post_type(
            'divisions',
            array(
                'labels' => array(
                    'name'          => __( 'Divisions' ),
                    'singular_name' => __( 'division' ),
                    'add_new_item'  => __( 'Add New Division', 'cc-divisions-textdomain' ),
                    'not_found'     => __( 'No divisions found.', 'cc-divisions-textdomain' ),
                ),
                'public' => true,
                'rewrite' => array('slug' => 'division'),
                'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
                'hierarchical' => true
            )
        );

    }

    /**
     * Adds meta boxes for division details
     */
    function add_division_details_box() {

    	add_meta_box(
    		'division_details',
    		'Division Details',
    		array(
          $this,
          'render_division_details_form'
        ),
    		'divisions'
    	);

    }

    /**
     * Prints the meta data for division details
     *
     * @param WP_Post $post The object for the current post/page.
     */
    function render_division_details_form( $post ) {

        // Add a nonce field so we can check for it later.
    	wp_nonce_field( 'division_details_data', 'division_details_nonce' );

    	/**
    	 * Retrieve existing data (if any) from database
    	 */
      $steam_store_link = get_post_meta( $post->ID, '_steam_store_link', true );
      $forum_id = get_post_meta( $post->ID, '_forum_id', true );
    	$division_leader_ids = get_post_meta( $post->ID, '_division_leader_ids', true );
      $division_info = get_post_meta( $post->ID, '_division_info', true );

    	?>

      <table class="form-table division-details">
        <tbody>
          <tr>
            <th scope="row"><label for="steam_store_link"><?php _e( 'Steam Store Link', 'cc-divisions-textdomain' ); ?></label></th>
            <td>
              <input type="text" id="steam_store_link" name="steam_store_link" value="<?php echo esc_attr( $steam_store_link ); ?>" size="50" />
              <p class="description">URL to the steam store page</p>
            </td>
          </tr>
          <tr>
            <th scope="row"><label for="forum_id"><?php _e( 'Forum ID', 'cc-divisions-textdomain' ); ?></label></th>
            <td>
              <input type="text" id="forum_id" name="forum_id" value="<?php echo esc_attr( $forum_id ); ?>" size="5" />
              <p class="description">ID of the division's forum section (i.e. forums.ccgaming.com/viewforum.php?f=<span style="font-weight:bold;color:#ff0000;">92</span>)</p>
            </td>
          </tr>
          <tr>
            <th scope="row"><label for="division_leader_ids"><?php _e( 'Division Leader IDs', 'cc-divisions-textdomain' ); ?></label></th>
            <td>
              <input type="text" id="division_leader_ids" name="division_leader_ids" value="<?php echo esc_attr( $division_leader_ids ); ?>" size="50" />
              <p class="description">ID of each of the division's leaders, seperate by a comma (i.e. forums.ccgaming.com/memberlist.php?mode=viewprofile&u=<span style="font-weight:bold;color:#ff0000;">60</span>)</p>
            </td>
          </tr>
          <tr>
            <th scope="row"><label for="division_info"><?php _e( 'Division Info', 'cc-divisions-textdomain' ); ?></label></th>
            <td>
              <textarea id="division_info" name="division_info" cols="50" rows="5"><?php echo esc_attr( $division_info ); ?></textarea>
              <p class="description">Division information, such as server IPs, etc. Use HTML to format text, add line breaks, etc.</p>
            </td>
          </tr>
        </tbody>
      </table>

    	<?php

    }

    /**
     * Saves division details
     */
    function save_division_details( $post_id ) {

      $steam_store_link = (isset($_POST['steam_store_link']) ? $_POST['steam_store_link'] : '');
      update_post_meta($post_id, '_steam_store_link', $steam_store_link);

      $forum_id = (isset($_POST['forum_id']) ? $_POST['forum_id'] : '');
      update_post_meta($post_id, '_forum_id', $forum_id);

      $division_leader_1 = (isset($_POST['division_leader_ids']) ? $_POST['division_leader_ids'] : '');
      update_post_meta($post_id, '_division_leader_ids', $division_leader_1);

      $division_info = (isset($_POST['division_info']) ? $_POST['division_info'] : '');
      update_post_meta($post_id, '_division_info', $division_info);

    }

    /**
     * Adds CSS to the division post type edit screen
     */
    function division_post_page_css() {

        if ( $_GET['post_type'] == 'divisions' ) { ?>

            <style type="text/css">



            </style>

        <?php }

    }

    /**
     * Lists divisions
     */
    function get_division_list() {

      // Query the divisions post type
			$divisions = new WP_Query( array( 'post_type' => 'divisions', 'orderby' => 'menu_order', 'order' => 'ASC' ) );

      // List the divisions
			while ( $divisions->have_posts() ) : $divisions->the_post(); ?>
				<div class="col-1-4">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'division-thumb' ); ?>
						<span><?php the_title(); ?></span>
					</a>
				</div>
			<?php endwhile;

    }

}
