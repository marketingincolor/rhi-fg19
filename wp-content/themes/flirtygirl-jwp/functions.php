<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 





// Flourish Shortcode - [flourish title='Section Title' color=gray]
function shortcode_DisplayFlourish($params = array()) {
$template_url = get_template_directory_uri();
  // default parameters
  extract(shortcode_atts(array(
    'title' => 'Defatult Title',
    'color' => 'gray' // or black or white
  ), $params));

$flourish = '<div class="'.$color.'-flourish grid-x align-justify">';
$flourish .= '<div class="cell shrink"><img src="'.$template_url.'/assets/images/flourish-'.$color.'-left.png" alt="" width="28" height="23"></div>';
$flourish .= '<div class="cell auto"><img src="'.$template_url.'/assets/images/flourish-'.$color.'-line.png" alt="" width="100%" height="23" style="height:23px;"></div>';
$flourish .= '<div class="cell shrink"><h4 class="flourish" style="padding:0em .5em;">'.$title.'</h4></div>';
$flourish .= '<div class="cell auto"><img src="'.$template_url.'/assets/images/flourish-'.$color.'-line.png" alt="" width="100%" height="23" style="height:23px;"></div>';
$flourish .= '<div class="cell shrink"><img src="'.$template_url.'/assets/images/flourish-'.$color.'-right.png" alt="" width="28" height="23"></div>';
$flourish .= '</div>';
  return $flourish;
}
add_shortcode('flourish', 'shortcode_DisplayFlourish');

