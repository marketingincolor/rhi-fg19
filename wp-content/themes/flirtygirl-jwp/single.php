<?php 
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

<section class="blog-post">
<?php get_template_part( 'parts/content', 'slider' ); ?>
</section>
			
<div class="content grid-container">

	<div class="inner-content grid-x grid-margin-x grid-padding-x">

		<main class="main small-12 large-10 large-offset-1 cell" role="main">
		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		    	<?php get_template_part( 'parts/loop', 'single' ); ?>
		    	
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<section class="related-content grid-container p-rem-20">
	<div class="inner-content grid-x grid-margin-x grid-padding-x">

		<div class="small-12 medium-12 cell">
			<?php echo do_shortcode('[flourish title="Check Out These Related Posts" color="gray" type="h2"]'); ?>
		</div>

		<div class="small-12 medium-12 cell">
		    <div class="grid-x grid-margin-x grid-padding-x grid-padding-y grid-margin-y archive-grid" data-equalizer>
		<?php
		$args = array( 'posts_per_page' => 3, 'post__not_in' => array( get_the_ID() ), 'category_name' => 'blog',  );
		$show_posts = get_posts( $args );
		foreach ( $show_posts as $post ) : setup_postdata( $post ); ?>
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
		<?php endforeach;
		wp_reset_postdata();?>
			</div>
		</div>

	</div>
</section>

<?php get_footer(); ?>