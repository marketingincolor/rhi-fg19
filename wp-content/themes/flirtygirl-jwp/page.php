<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

	<?php get_template_part( 'parts/content', 'slider' ); ?>
	
<?php if (is_front_page()) : ?>

	<?php get_template_part( 'parts/content', 'services' ); ?>
	<?php get_template_part( 'parts/content', 'community' ); ?>

<?php else : ?>

	<div class="content grid-container">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
	
		    <main class="main small-11 medium-12 cell" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if ( is_page('locations') && !wp_is_mobile() ) : ?>
			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    	<?php endif; ?>
			    <?php endwhile; endif; ?>							
			    					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php endif; ?>


<?php if ( !is_page('locations') && !is_page('contact') ) : ?>

<?php if ( wp_is_mobile() ) { ?>
<?php } else { ?>
	<div class="cta notcontent grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <div class="small-11 medium-12 cell">
		    	<div class="book-now" id="booknow">
				<!-- <h1>Book Now!</h1> -->
				<!-- <p style="display:inline-block;"><button class="button" data-open="bookModal">Book Now</button></p>	 -->
				<h1>Book Now!</h1>
				<h3>Enter your zipcode and we'll locate a Flirty Girl Location near you.</h3>
				<?php echo do_shortcode('[wpsl auto_locate="false" template="custom"]'); ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php endif; ?>

<?php if ( is_page('locations') ) : ?>
<div class="info">
	<div class="notcontent grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">

		    <div class="small-11 medium-12 cell">
		    	<div class="info-form">
		    		<h3>Want to know when a Flirty Girl opens near you?</h3>
		    		<p>We're growing and a location might be opening soon near you. Fill out the short form below and we'll give you a shout when a location opens near you.</p>
				<?php echo do_shortcode('[ninja_form id=2]'); ?>
				</div>
			</div>

		</div>
	</div>
</div>
<?php endif; ?>

<?php get_footer(); ?>