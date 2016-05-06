<?php

class phpBB {

  public static $url;
  public static $path;
  private static $dbconnect;

  public static function init() {

    // Add shortcodes
    add_shortcode( 'phpbb-list-members', array( 'phpBB', 'phpbb_list_members_shortcode' ) );
    add_shortcode( 'phpbb-list-topics', array( 'phpBB', 'phpbb_list_topics_shortcode' ) );

    // Get phpBB options set in the admin panel
    $phpbb_options = get_option('phpbb_options');

    // Define each of our options
    self::$url = rtrim($phpbb_options['phpbb_phpbb_url'], '/');
    self::$path = $phpbb_options['phpbb_phpbb_path'];

    // Connect to phpBB's database
    self::connect_to_database();

  }

  private static function connect_to_database() {

    $phpbb_config = self::$path .'/config.php';

    if ( file_exists( $phpbb_config ) ) {

      require_once( $phpbb_config );

      try {
        $dbconnect = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
        if ($dbconnect) {
          self::$dbconnect = $dbconnect;
        }
      } catch (mysqli_sql_exception $e) {
        throw $e;
      }

    } else {

      return 'phpBB configuration could not be found under '. self::$path;
      exit;

    }

  }

  public static function phpbb_list_members_shortcode($atts) {

    extract(shortcode_atts(array(
  		'groups' => '',
      'users' => '',
  		'class' => '',
  		'display_avatar' => true,
  		'display_rank' => true
  	), $atts));

    // Was a class defined?
    $class = (!empty($class) ? ' '. $class : '');

		// Construct our SQL query
		$sql = 'SELECT U.user_id, U.username, U.user_avatar, R.rank_title, G.group_colour
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
		$query = self::$dbconnect->query($sql);

    // Get the results if the query was successful
    if ($query) {

      $result = $query->fetch_all(MYSQLI_ASSOC);

  		$output = '<ul class="phpbb-list-members'. $class .'">';

  		foreach ($result as $user) {
        $output .= "\n" . '<li>
          <a href="'. self::$url .'/memberlist.php?mode=viewprofile&amp;u='. $user['user_id'] .'" style="border-right: 10px solid #'. $user['group_colour'] .'">';

            if ($display_avatar) {
              if ($user['user_avatar'] == '') {
                $avatar = '<img src="https://ccgaming.com/images/ccgaming_avatar.jpg" alt="" width="50px" height="50px" />';
              } else if (substr($user['user_avatar'], 0, 4) == 'http') {
                $avatar = '<img src="'. $user['user_avatar'] .'" alt="" width="50px" height="50px" />';
              } else {
                $avatar = '<img src="'. self::$url .'/download/file.php?avatar='. $user['user_avatar'] .'" alt="" width="50px" height="50px" />';
              }
            }

            $output .= '
              '. $avatar .'
              <span class="username">'. $user['username'] .'</span>';
              if ($display_rank) {
                $output .= '<span class="rank">'. $user['rank_title'] .'</span>';
              }

          $output .= '</a>
        </li>';
  		}

  		$output .= '</ul>';

  	} else {
      $output = self::$dbconnect->error;
    }

  	return $output;

  }

  /**
   * Lists topics from phpBB from a defined section
   */
  function phpbb_list_topics_shortcode( $atts ) {

    // Setup the shortcode's attributes
    extract(shortcode_atts(array(
      'limit' => '3',
      'forum_id' => '',
    ), $atts));

    $sql = 'SELECT T.topic_id, T.forum_id, T.topic_title, T.topic_poster, T.topic_time, T.topic_first_post_id, F.forum_id, U.user_id, U.username, P.post_id, P.post_text
      FROM phpbb_topics T, phpbb_forums F, phpbb_users U, phpbb_posts P
      WHERE T.forum_id = F.forum_id
      AND T.topic_poster = U.user_id
      AND T.topic_first_post_id = P.post_id
      AND F.forum_id IN ('. $forum_id .')
      ORDER BY P.topic_id DESC
      LIMIT '. $limit;

    // Execute the SQL query
    $query = self::$dbconnect->query($sql);

    if ($query) {

      // Get the results
      $result = $query->fetch_all(MYSQLI_ASSOC);

      $output = '<div class="phpbb_list_topics">';

      // Output the results
      foreach ($result as $topic) {

        $output .= '<div class="grid-1-4">
          <a href="'. self::$url .'/viewtopic.php?f='. $topic['forum_id'] .'&t='. $topic['topic_id'] .'">
            <span class="topic_title">'. $topic['topic_title'] .'</span>
            <span class="topic_user">by '. $topic['username'] .'</span>
            <span class="topic_date">on '. date('F jS, Y', $topic['topic_time']) .'</span>
          </a>
        </div>';

      }

      $output .= '</div>';

    } else {

      $output = self::$dbconnect->error;

    }

    return $output;

  }

}
