<?php 
/**
 * The template for displaying the BLOG page.
 * Template Name: FG Blog
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
	      	<img class="top-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
	        <h1 class="indent-rem-22"><?php echo $page_hero_title; ?></h1>
	        <p class="p1 indent-rem-22"><?php echo $page_hero_meta; ?></p>
	        <img class="bot-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
	      </div>
	    </div>
	  </div>
	</section>
</section>

<div class="content grid-container">
	<div class="inner-content grid-x grid-margin-x grid-padding-x" style="padding-bottom:2rem;">
	    <main class="main small-12 medium-12 cell" role="main">
			<?php $args = array('post_type' => 'post');
			$post_query = new WP_Query($args); ?>

			<?php if ($post_query->have_posts()) : while ($post_query->have_posts()) : $post_query->the_post(); ?>

				<?php $grid_columns = 3; ?>
				<?php if( 0 === ( $post_query->current_post  )  % $grid_columns ): ?>
			    <div class="grid-x grid-margin-x grid-padding-x grid-padding-y grid-margin-y archive-grid" data-equalizer> <!--Begin Grid--> 
				<?php endif; ?> 

					<!--Item: -->
					<div class="small-12 medium-4 large-4 cell panel" data-equalizer-watch>
						<article id="post-<?php the_ID(); ?>" <?php post_class('text-center'); ?> role="article">
							<section class="featured-image" itemprop="text">
								<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('full'); ?></a>
							</section> 
							<header class="article-header">
								<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							</header>
							<section class="entry-content" itemprop="text">
								<?php the_excerpt(); ?> 
							</section>
						</article> 
					</div>

				<?php if( 0 === ( $post_query->current_post + 1 )  % $grid_columns ||  ( $post_query->current_post + 1 ) ===  $post_query->post_count ): ?>
			   </div>  <!--End Grid --> 
				<?php endif; ?>

			<?php endwhile; ?>	

				<?php joints_page_navi(); ?>
			
			<?php wp_reset_query(); ?>
		    
		    <?php endif; ?>							
		    					
		</main> <!-- end #main -->
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>