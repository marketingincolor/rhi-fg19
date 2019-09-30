<?php 
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
			
<div class="content grid-container wpsl">

	<div class="inner-content grid-x grid-margin-x grid-padding-x">

		<main class="main small-12 large-10 large-offset-1 cell" role="main">
		
		    <?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
		    	<?php //get_template_part( 'parts/loop', 'single' ); ?>
		    <?php //endwhile; else : ?>
		   		<?php //get_template_part( 'parts/content', 'missing' ); ?>
		    <?php //endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
									
				<header class="article-header">	
					<h1 class="entry-title single-title" itemprop="headline"><?php single_post_title(); ?> - Custom Template</h1>
					<?php //get_template_part( 'parts/content', 'byline' ); ?>
			    </header> <!-- end article header -->
								
			    <section class="entry-content grid-container" itemprop="text">

					<div class="grid-x grid-margin-x">
						<div class="small-12 medium-6 cell">
		                <?php
		                    global $post;
		                    $queried_object = get_queried_object();
		                    
		                    // Add the map shortcode
		                    //echo do_shortcode( '[wpsl_map]' );
		                    
		                    // Add the content
		                    $post = get_post( $queried_object->ID );
		                    setup_postdata( $post );
		                    the_content();
		                    wp_reset_postdata( $post );
		                    
		                    // Add the address shortcode
		                    echo do_shortcode( '[wpsl_address name="false"]' );

		                    // Add the hours shortcode
		                    echo do_shortcode( '[wpsl_hours]' );
		                ?>

						</div>
						<div class="small-12 medium-6 cell">
							<?php echo do_shortcode( '[wpsl_map zoom="15"]' ); ?>
						</div>
						<div class="small-12 medium-12 cell">
							<a href="#" class="button" data-toggle="booking-callout">Book Now</a>
							<div class="secondary callout is-hidden" id="booking-callout" data-toggler="is-hidden">
								<p>This is only visible when the above button has been clicked.</p>
								<iframe src="https://go.booker.com/location/flirtygirllashstudiodallas/service-menu"></iframe>
							</div>
						</div>
					</div>



				</section> <!-- end article section -->
									
				<footer class="article-footer">
					<?php //wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
					<p class="tags"><?php //the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>	
				</footer> <!-- end article footer -->
																
			</article> <!-- end article -->





		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>