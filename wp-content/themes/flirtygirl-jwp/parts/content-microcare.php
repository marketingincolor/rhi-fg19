<?php
/**
 * Template part for displaying MICROCARE section on website
 * 
 */
$template_url = get_template_directory_uri();
$microcare_title = get_field( 'microcare_title', 'option' );
$microcare_headline = get_field( 'microcare_headline', 'option' );
$align_mobile = wp_is_mobile() ? 'align-center' : '';
$center_mobile = wp_is_mobile() ? 'text-center' : '';
?>
<div class="aftercare">
	<div class="custom-content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
			<div class="small-11 medium-12 cell">
				<?php echo do_shortcode('[flourish title="'.$microcare_title.'" color="black" type="h2" alt="false"]'); ?>
				<h3 class="text-center"><?php echo $microcare_headline; ?></h3>
				<div id="microcare-carousel" class="owl-carousel">
				<?php
				if( have_rows('microcare_carousel', 'option') ):
				    while ( have_rows('microcare_carousel', 'option') ) : the_row(); ?>

					<div class="owl-carousel-container grid-container" style="padding:2em 0em;">
					<div class="grid-x grid-margin-x grid-padding-x <?php echo $align_mobile; ?>">
						<div class="small-auto medium-shrink">
							<img style="padding:0rem 2rem;" src="<?php the_sub_field('slide_image'); ?>">
						</div>
						<div class="small-11 medium-auto medium-offset-0">
							<div class="grid-x h-100">
								<div class="cell align-self-middle <?php echo $center_mobile; ?>">
									<h3 style="font-weight:500;"><?php the_sub_field('slide_title'); ?></h3>
									<h4 style="font-weight:400;"><?php the_sub_field('slide_content'); ?></h4>
								</div>
							</div>
						</div>
						<div class="small-11">
							<p style="width: auto; text-align: center;">
								<a href="<?php the_sub_field('slide_link'); ?>" class="cta-button">
									<span class="show-for-medium"><?php the_sub_field('slide_button'); ?></span>
									<span class="hide-for-medium">Learn More</span>
								</a>
							</p>
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
