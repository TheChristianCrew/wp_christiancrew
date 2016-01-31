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
        add_action( 'add_meta_boxes', array( $this, 'add_details_meta_box' ) );
        add_action( 'admin_head', array( $this, 'details_meta_box_css' ) );
        add_action( 'cc_list_divisions', array( $this, 'list_divisions' ) );

    }

    /**
     * Create the division post type
     */
    function create_post_type() {

        register_post_type(
            'cc_divisions',
            array(
                'labels' => array(
                    'name'          => __( 'Divisions' ),
                    'singular_name' => __( 'division' ),
                    'add_new_item'  => __( 'Add New Division', 'cc-divisions-textdomain' ),
                    'not_found'     => __( 'No divisions found.', 'cc-divisions-textdomain' ),
                ),
                'public' => true,
                'rewrite' => array('slug' => 'division'),
                'supports' => array('title', 'editor', 'thumbnail'),
            )
        );

    }

    /**
     * Adds meta boxes for division details
     */
    function add_details_meta_box() {

    	add_meta_box(
    		'cc_divisions_details',
    		__( 'Division Details', 'cc-divisions-textdomain' ),
    		array( $this, 'details_meta_box_callback' ),
    		'cc_divisions'
    	);

    }

    /**
     * Prints the meta data for division details
     *
     * @param WP_Post $post The object for the current post/page.
     */
    function details_meta_box_callback( $post ) {

        // Add a nonce field so we can check for it later.
    	wp_nonce_field( 'cc_division_details_data', 'cc_division_details_nonce' );

    	/*
    	 * Retrieve existing data (if any) from database
    	 */
    	$division_leader_1 = get_post_meta( $post->ID, '_division_leader_1', true );
    	$forum_id = get_post_meta( $post->ID, '_forum_id', true );

    	?>

    	<table class="form-table division-details">
        	<tbody>
            	<tr>
                	<th scope="row"><label for="division_leader_1"><?php _e( 'Division Leader', 'cc-divisions-textdomain' ); ?></label></th>
                	<td><input type="text" id="division_leader_1" name="division_leader_1" value="<?php echo esc_attr( $division_leader_1 ); ?>" size="25" /></td>
            	</tr>
            	<tr>
                	<th scope="row"><label for="forum_id"><?php _e( 'Forum ID', 'cc-divisions-textdomain' ); ?></label></th>
                	<td><input type="text" id="forum_id" name="forum_id" value="<?php echo esc_attr( $forum_id ); ?>" size="5" /></td>
            	</tr>
        	</tbody>
    	</table>

    	<?php

    }

    /**
     * Adds CSS to the division post type edit screen
     */
    function details_meta_box_css() {

        if ( $_GET['post_type'] == 'cc_divisions' ) { ?>

            <style type="text/css">



            </style>

        <?php }

    }

    /**
     * Lists divisions
     */
    function list_divisions() {

      // Query the divisions post type
			$divisions = new WP_Query( array( 'post_type' => 'cc_divisions' ) );

      // List the divisions
			while ( $divisions->have_posts() ) : $divisions->the_post(); ?>
				<div class="grid-1-4">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'division-thumb' ); ?>
						<span><?php the_title(); ?></span>
					</a>
				</div>
			<?php endwhile;

    }

}
