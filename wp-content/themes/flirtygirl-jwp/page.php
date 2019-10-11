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
	
		    <main class="main small-12 medium-12 cell" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; ?>							
			    					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php endif; ?>


<?php if (!is_page('locations')) : ?>
	<div class="cta content grid-container">

		<div class="inner-content grid-x grid-margin-x grid-padding-x">

		    <div class="small-12 medium-12 cell">
		    	<div id="book-now">
				<h1>Book Now!</h1>
				<!-- <p style="display:inline-block;"><button class="button" data-open="bookModal">Book Now</button></p>	 -->
				<?php echo do_shortcode('[wpsl template="custom"]'); ?>
				</div>
			</div>

		</div>

	</div>
<?php endif; ?>

<?php get_footer(); ?>