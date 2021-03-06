<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/motion-ui@1.2.3/dist/motion-ui.min.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/a4e9168323.css">
		
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles/owl.carousel.min.css" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles/owl.theme.default.min.css" />
		<script>templateURL = '<?php bloginfo("template_directory"); ?>';</script>
		<?php wp_head(); ?>
<script>
let anchorlinks = document.querySelectorAll('a[href^="#"]')
 
for (let item of anchorlinks) { // relitere 
    item.addEventListener('click', (e)=> {
        let hashval = item.getAttribute('href')
        let target = document.querySelector(hashval)
        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        })
        history.pushState(null, null, hashval)
        e.preventDefault()
    })
}

</script>
	</head>
			
	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper">
			
		<?php //if ( wp_is_mobile() ) { ?>
			<!-- Load off-canvas container. Feel free to remove if not using. -->		
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
		<?php //} else { ?>

		<?php //} ?>

			
			<div class="off-canvas-content" data-off-canvas-content>
				
				<header class="header grid-container full" role="banner">
							
					 <!-- This navs will be applied to the topbar, above all content 
						  To see additional nav styles, visit the /parts directory -->
					 <?php //get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
					 <?php get_template_part( 'parts/nav', 'title-bar' ); ?>
	 	
				</header> <!-- end .header -->