<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div class="content grid-container">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
	
		    <main class="main small-11 large-10 large-offset-1 cell" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; ?>							
			    					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php if (is_front_page()) : ?>
	<div class="cta content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <div class="small-11 large-10 large-offset-1 cell" >
				<h1>Insert HomePage CTA Here</h1>
				<!-- <p style="display:inline-block;"><button class="button" data-open="bookModal">Book Now</button></p>	 -->
				<?php echo do_shortcode('[wpsl auto_locate="true" template="custom"]'); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>