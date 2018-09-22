<?php

  require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );
  global $wpdb, $post, $user_ID;

  //Get the passed in PostID   
  $post_ID = $_REQUEST['postid'];
   
  //Set the name of the Posts Custom Field.
  $customfieldname = 'contact_details_clicked'; 

  //Find out how many times this has been pressed for the post
  $count = get_post_meta($post_ID, $customfieldname, true); 

  if (($count == 0) or ($count == '')) {
    $count = 1;
  } else {
    $count++; 
  }

  // Save the new click count
  update_post_meta($post_ID, $customfieldname, $count);         

  // Put the contact details into a string and output it
  $return = ""; 
  $return .= "Website link: ".get_post_meta($post_ID, 'wpcf-contactwebsite', true)."<br />"; 
  $return .= "Contact details: ".get_post_meta($post_ID, 'wpcf-contactname', true);
  $return .= " (".get_post_meta($post_ID, 'wpcf-contactphone', true).")<br />"; 
  echo $return;

?>