<?php

class phpBB {

  public static function init() {
    add_shortcode( 'phpbb-list-members', array( 'phpBB', 'phpbb_list_members_shortcode' ) );
  }

  public static function phpbb_list_members_shortcode($atts) {

    extract(shortcode_atts(array(
  		'groups' => '',
      'users' => '',
  		'class' => '',
  		'display_avatar' => true,
  		'display_rank' => true,
  	), $atts));

    $phpbb_options = get_option('phpbb_options');
    $phpbb_path = $phpbb_options['phpbb_phpbb_path'];
    $phpbb_url = $phpbb_options['phpbb_phpbb_url'];
    $phpbb_config = $phpbb_path .'/config.php';

    if ( file_exists( $phpbb_config ) ) {
      require_once( $phpbb_config );
    } else {
      return 'phpBB configuration could not be found under '. $phpbb_path;
      exit;
    }

    // Connect to phpBB's database
  	$dbconnect = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);

  	// Test our database connection
  	if ($dbconnect->connect_errno) {

  		echo 'phpBB database connection failed';

  	} else {

  		// Construct our SQL query
  		$sql = 'SELECT U.user_id, U.username, U.user_avatar, R.rank_title
  		FROM phpbb_users U

      INNER JOIN phpbb_groups G ON G.group_id = U.group_id
      INNER JOIN phpbb_ranks R ON R.rank_id = G.group_rank ';

      if (!empty($users)) {
        $sql .= 'WHERE U.user_id IN ('. $users .') ';
      } else {
        $sql .= 'WHERE U.group_id IN ('. $groups .') ';
      }

  		$sql .= 'ORDER BY LOWER(U.username)';

  		// Execute the SQL query
  		$query = $dbconnect->query($sql);

      // Get the results if the query was successful
      if ($query) {

        $result = $query->fetch_all(MYSQLI_ASSOC);

    		$output = '<ul class="phpbb-list-members '. $class .'">';

    		foreach ($result as $user) {
          $output .= "\n" . '<li>
            <a href="'. $phpbb_url .'/memberlist.php?mode=viewprofile&amp;u='. $user['user_id'] .'">';

              if ($display_avatar) {
                if ($user['user_avatar'] == '') {
                  $avatar = '<img src="https://ccgaming.com/images/ccgaming_avatar.jpg" alt="" />';
                } else if (substr($user['user_avatar'], 0, 4) == 'http') {
                  $avatar = '<img src="'. $user['user_avatar'] .'" alt="" />';
                } else {
                  $avatar = '<img src="https://forums.ccgaming.com/download/file.php?avatar='. $user['user_avatar'] .'" alt="" />';
                }
              }

              $output .= '<p>
                <span class="username">'. $user['username'] .'</span>';
                if ($display_rank) {
                  $output .= '<span class="rank">'. $user['rank_title'] .'</span>';
                }
              $output .= '</p>
            </a>
          </li>';
    		}

    		$output .= '</ul>';

    	} else {
        $output = $dbconnect->error;
      }

    }

  	return $output;

  }

}
