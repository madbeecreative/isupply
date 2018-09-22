<?php 
  add_action( 'wp_enqueue_scripts', 'isupply_enqueue_styles' );
  function isupply_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );

 	wp_enqueue_script( 'ajax_js', get_stylesheet_directory_uri() . '/js/ajax33.js', array(), 1.1 , true ); 
  } 


/*    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css'); */



 
add_shortcode( 'clickforcontactdetails', 'clickforcontactdetails_shortcode' );
function clickforcontactdetails_shortcode($atts) {

  $post_ID = $atts['postid'];
  if (empty($post_ID)) {
    $post_ID = get_the_ID();
  }

  $return = "<span style='cursor:pointer;' onclick=\"ajaxClickForContactDetails($post_ID)\" return false>Click here for contact details</span>";  
  return $return;
}


add_shortcode( 'showcustomcounters', 'showcustomcounters_shortcode' );
function showcustomcounters_shortcode($atts) {
   global $wpdb;
   
  $post_ID = $atts['postid'];
  if (empty($post_ID)) {
    $post_ID = get_the_ID();
  }

  // Grab the count for the Post vs the Fieldname passed in
  $count = get_post_meta($post_ID, $atts['fieldname'], true); 
  if($count == ''){$count = 0;}       
        
  return $count;
}


add_shortcode( 'showAdminDetails', 'showAdminDetails_shortcode' );
function showAdminDetails_shortcode($atts) {

  $post_ID = $atts['postid'];
  if (empty($post_ID)) {
    $post_ID = get_the_ID();
  }

  $return = '';
  $return .= 'Page Views: ';
  $return .= showcustomcounters_shortcode(array('postid' => $post_ID, 'fieldname' => 'post_views_count'));
  $return .= '<br />Contact Detail Views: ';
  $return .= showcustomcounters_shortcode(array('postid' => $post_ID, 'fieldname' => 'contact_details_clicked'));
 
  return $return;
}


add_shortcode( 'countpostviews', 'countpostviews_shortcode' );
function countpostviews_shortcode($atts) {
   global $wpdb;
   
        $post_ID = $atts['postid'];
        if (empty($post_ID)) {
                   $post_ID = get_the_ID();
           }
    
  $count_key = 'post_views_count';      
  $count = get_post_meta($post_ID, 'post_views_count', true); 

  if (($count == 0) or ($count == '')) {
    $count = 1;
  } else {
    $count++; 
  }

  update_post_meta($post_ID, $count_key, $count);         
}



 ?>
