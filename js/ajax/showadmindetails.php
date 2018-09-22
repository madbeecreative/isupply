<?php
  require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );

  global $wpdb, $post, $user_ID;

  $post_ID = $_REQUEST['postid'];

  // Create a chunk of text to return with the current Page Views and Contact Details Clicks   
  echo showAdminDetails_shortcode(array('postid' => $post_ID));
?>