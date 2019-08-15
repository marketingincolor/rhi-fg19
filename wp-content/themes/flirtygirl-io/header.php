<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FlirtyGirl
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site grid-container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fg' ); ?></a>

	<header id="masthead" class="site-header grid-x grid-padding-x">
		<div class="site-branding large-3 medium-5 small-12 cell">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$fg_description = get_bloginfo( 'description', 'display' );
			if ( $fg_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $fg_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation large-9 medium-7 small-12 cell"><div class="io-menu io-menu-desktop">
			
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</div><!-- .io-menu --></nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content grid-x grid-padding-x">
