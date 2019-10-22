<?php
/**
 * Displays archive pages if a speicifc template is not set. 
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

<?php if ( is_category('blog') ) { 
	$blog_hero_image = get_field('blog_background', 'option');
	$blog_hero_title = get_field('blog_title', 'option');
	$blog_hero_meta = get_field('blog_description', 'option'); ?>
<section class="blog-feed">
	<section class="page-hero grid-container full" style="background-image: url(<?php echo $blog_hero_image; ?>);">
	  <div class="grid-container h-100">
	    <div class="grid-x h-100">
	      <div class="small-10 small-offset-1 medium-6 medium-offset-0 align-self-middle cell">
	      	<img class="top-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
	        <h1 class="indent-rem-22"><?php echo $blog_hero_title; ?></h1>
	        <p class="p1 indent-rem-22"><?php echo $blog_hero_meta; ?></p>
	        <img class="bot-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
	      </div>
	    </div>
	  </div>
	</section>
</section>
<?php } ?>

	<div class="content">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <main class="main small-11 large-10 large-offset-1 cell" role="main">
			    

				<div class="grid-x grid-padding-x">
					<div class="cell medium-6 medium-offset-3 text-center">
						<!-- form here -->
						<label><!-- Indications -->
							<select class="" name="posttags" id="posttags-select">
								<option value="all" selected>Select A Category</option>

								<?php
									$terms = get_terms( array(
									    'taxonomy' => 'post_tag',
									    'hide_empty' => false,
									));
									foreach ($terms as $term) {
								?>
													
								<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
													
							  <?php } ?>
							</select>
						</label>
					</div>
					<div class="small-12 cell text-center">
						<button id="filter-blogs" class="cta-button" type="submit">Filter</button>
					</div>
				</div>
				<div id="archive-grid" class="grid-x grid-margin-x alt-archive-grid" data-equalizer>

		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


						<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>


				<?php endwhile; ?>	
					<?php joints_page_navi(); ?>
				<?php else : ?>			
					<?php get_template_part( 'parts/content', 'missing' ); ?>
				<?php endif; ?>
		
				</div>



			</main> <!-- end #main -->
	    </div> <!-- end #inner-content -->
	</div> <!-- end #content -->

<?php get_footer(); ?>