<?php 
/**
 * The template for displaying the BLOG page.
 * 
 */
$id_for_image = get_id_by_slug('blog'); 
$page_hero_title = get_field('hero_title', $id_for_image); //get_the_title($post->ID);
$page_hero_meta = get_field('hero_description', $id_for_image); //get_the_content($post->ID); 
$alt_page_hero_image = get_the_post_thumbnail_url($id_for_image, 'full'); 
get_header(); ?>

<section class="blog-feed">

	<section class="page-hero grid-container full" style="background-image: url(<?php echo $alt_page_hero_image; ?>);">
	  <div class="grid-container h-100">
	    <div class="grid-x h-100">
	      <div class="small-10 small-offset-1 medium-6 medium-offset-0 align-self-middle cell">
	      	<img class="top-sep" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
	        <h1 class="indent-rem-22"><?php echo $page_hero_title; ?></h1>
	        <p class="p1 indent-rem-22"><?php echo $page_hero_meta; ?></p>
	        <img class="bot-sep" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
	      </div>
	    </div>
	  </div>
	</section>

</section>

<div class="content grid-container">

	<div class="inner-content grid-x grid-margin-x grid-padding-x" style="padding-bottom:2rem;">

	    <main class="main small-12 medium-12 cell" role="main">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'blog-grid' ); ?>
			
			<?php endwhile; ?>	

				<?php joints_page_navi(); ?>
		    
		    <?php endif; ?>							
		    					
		</main> <!-- end #main -->
	    
	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>