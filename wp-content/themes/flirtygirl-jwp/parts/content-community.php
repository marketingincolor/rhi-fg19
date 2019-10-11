<?php
/**
 * Template part for displaying COMMUNITY section on website
 * 
 */
$community_title = get_field( 'community_title', 'option' );
$community_headline = get_field( 'community_headline', 'option' );
?>

<div class="community">
	<div class="content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
			<div class="small-12 medium-12 cell">
				<?php echo do_shortcode('[flourish title="'.$community_title.'" color="white" type="h2" alt="false"]'); ?>
				<h3><?php echo $community_headline; ?></h3>
				<div id="instagram-carousel" class="owl-carousel">
				<?php
				if( have_rows('community_slider', 'option') ):
				    while ( have_rows('community_slider') ) : the_row(); ?>

					<div class="owl-carousel-container">
						<a href="<?php the_sub_field('slide_link'); ?>" target="_blank"><img src="<?php the_sub_field('slide_photo'); ?>" ></a>
					</div>
				<?php
				    endwhile;
				else :
				    // no rows found
				endif;
				?>
				</div>



				<div class="site-social grid-x grid-margin-x  align-center align-middle">
					<div class="cell shrink"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-social-icon-pre.svg" style="padding-right:3em;"></div>
				<?php if( get_field('corporate_instagram', 'option') ): ?>
				    <div class="cell shrink"><a href="<?php the_field('corporate_instagram', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-social-icon-ig.svg"></a></div>
				<?php endif; ?>

				<?php if( get_field('corporate_facebook', 'option') ): ?>
				    <div class="cell shrink"><a href="<?php the_field('corporate_facebook', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-social-icon-fb.svg"></a></div>
				<?php endif; ?>
				<?php if( get_field('corporate_twitter', 'option') ): ?>
				    <div class="cell shrink"><a href="<?php the_field('corporate_twitter', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-social-icon-tw.svg"></a></div>
				<?php endif; ?>
				<?php if( get_field('corporate_youtube', 'option') ): ?>
				    <div class="cell shrink"><a href="<?php the_field('corporate_youtube', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-social-icon-yt.svg"></a></div>
				<?php endif; ?>
					<div class="cell shrink"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-social-icon-post.svg" style="padding-left:3em;"></div>
				</div>





			</div>
		</div>
	</div>
</div>
