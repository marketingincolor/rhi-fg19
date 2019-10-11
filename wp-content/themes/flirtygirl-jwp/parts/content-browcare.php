<?php
/**
 * Template part for displaying AFTERCARE section on website
 * 
 */
$template_url = get_template_directory_uri();
$browcare_title = get_field( 'browcare_title', 'option' );
$browcare_headline = get_field( 'browcare_headline', 'option' );
?>

<div class="aftercare">
	<div class="custom-content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
			<div class="small-12 medium-12 cell">
				<?php echo do_shortcode('[flourish title="'.$browcare_title.'" color="black" type="h2" alt="false"]'); ?>
				<h3 class="text-center"><?php echo $browcare_headline; ?></h3>
				<div id="browcare-carousel" class="owl-carousel">
				<?php
				if( have_rows('browcare_carousel', 'option') ):
				    while ( have_rows('browcare_carousel', 'option') ) : the_row(); ?>


					
					<div class="owl-carousel-container grid-container" style="padding:2em 0em;">
					<div class="grid-x grid-margin-x grid-padding-x">
						<div class="small-auto medium-shrink">
							<img style="padding:2rem;" src="<?php the_sub_field('slide_image'); ?>">
						</div>
						<div class="small-10 small-offset-1 medium-6 medium-offset-0">
							<h4><?php the_sub_field('slide_title'); ?></h4>
							<p><?php the_sub_field('slide_content'); ?></p>
							<p><a href="<?php the_sub_field('slide_link'); ?>" class="cta-button"><?php the_sub_field('slide_button'); ?></a></p>
						</div>
					</div>
					</div>


				<?php
				    endwhile;
				else :
				    // no rows found
				endif;
				?>
				</div>


			</div>
		</div>
	</div>
</div>
