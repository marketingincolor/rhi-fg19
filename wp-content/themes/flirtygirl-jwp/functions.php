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


// get_id_by_slug('any-page-slug');
function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// ACF FUNCTIONS = Add Options Page to site (ACF PLUGIN MUST BE INSTALLED!)
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Community',
		'menu_title'	=> 'Community',
		'parent_slug'	=> 'site-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Aftercare',
		'menu_title'	=> 'Aftercare',
		'parent_slug'	=> 'site-settings',
	));
}

// Heading Flourish Shortcode - [flourish title="Section Title" type="h3" color="gray"]
function heading_display_flourish($params = array()) {
$template_url = get_template_directory_uri();
  // default parameters
  extract(shortcode_atts(array(
    'title' => 'Lorem Ipsum Sit Dolor', // the title is basically required!
    'color' => 'gray', // or black or white
    'type' => 'h2', // any from h1 thru h6
    'alt' => 'true' // true to display mobile verion, false to ONLY display desktop
  ), $params));

$flourish = '<div class="'.$color.'-flourish grid-x align-justify align-middle">';
$flourish .= '<div class="cell shrink show-for-medium"><img src="'.$template_url.'/assets/images/flourish-'.$color.'-left.png" alt="" width="28" height="23"></div>';
$flourish .= '<div class="cell auto show-for-medium"><img src="'.$template_url.'/assets/images/flourish-'.$color.'-line.png" alt="" width="100%" height="23" style="height:23px;"></div>';
$flourish .= '<div class="cell small-auto medium-shrink"><'.$type.' class="'.$color.' flourish-text">'.$title.'</'.$type.'></div>';
$flourish .= '<div class="cell auto show-for-medium"><img src="'.$template_url.'/assets/images/flourish-'.$color.'-line.png" alt="" width="100%" height="23" style="height:23px;"></div>';
$flourish .= '<div class="cell shrink show-for-medium"><img src="'.$template_url.'/assets/images/flourish-'.$color.'-right.png" alt="" width="28" height="23"></div>';
if ($alt == 'true') {
$flourish .= '<div class="cell small-auto hide-for-medium text-center"><img src="'.$template_url.'/assets/images/flourish-mobile.png" alt=""></div>';	
}

$flourish .= '</div>';
  return $flourish;
}
add_shortcode('flourish', 'heading_display_flourish');

