<?php

  require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );
  global $wpdb, $post, $user_ID;

  $post_ID = $_REQUEST['postid'];
   
  $title = get_the_title($post_ID);

  $emailAdmin = get_bloginfo('admin_email');
  $emailAuthor = get_the_author_meta('user_email', get_post_field( 'post_author', $post_ID ));

  $toemail = $emailAdmin.",".$emailAuthor;




  $content .= $_REQUEST['message'];
  $content .= "\n\n".get_post_permalink($post_ID);
  
  
  
  
//  $status = wp_mail($toemail, "Reject", $content);
  $status = wp_mail("astrobboy@gmail.com,shermanbicarb@gmail.com", "ISCA Rejection of ".$title, $content);

  
  $return = "The following email was sent to: ".$toemail."\n\n";   
  $return .= $content;
  
  echo $return;

?>