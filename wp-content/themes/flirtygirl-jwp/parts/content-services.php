<?php
/**
 * Template part for displaying SERVICES section on Home Page
 * 
 */
$service_headline = get_field( "services_headline" );
$service_text = get_field( "services_text" );
?>
<div class="services content grid-container">
	<div class="inner-content grid-x grid-margin-x grid-padding-x">
		<div class="small-11 medium-12 cell">
			<?php echo do_shortcode('[flourish title="'.$service_headline.'" color="gray" type="h2" alt="false"]'); ?>
			<h4 class="headline gray"><?php echo $service_text; ?></h4>
		</div>
		<div class="small-11 medium-10 medium-offset-1 cell p-rem-20">
			<?php
			// check if the flexible content field has rows of data
			if( have_rows('salon_services') ):
			     // loop through the rows of data
			    while ( have_rows('salon_services') ) : the_row();

			        if( get_row_layout() == 'lashes' ): ?>
					<div class="service-section grid-x grid-margin-x grid-margin-y small-up-1 medium-up-3 align-middle align-stretch">
						<div class="cell circle-text small-order-1">
							<div class="circle">
								<div class="circle-content"><div class="grid-x h-100"><div class="cell align-self-middle">
						        	<h4><?php the_sub_field('title'); ?></h4>
						        	<p class="p3"><?php the_sub_field('description'); ?></p>
						        	<a href="<?php the_sub_field('link'); ?>" class="cta-button"><?php the_sub_field('button'); ?></a>
						    	</div></div></div>
							</div>
						</div>
						<div class="show-for-medium cell circle-image small-order-2">
							<a href="<?php the_sub_field('link'); ?>"><img class="circle" src="<?php the_sub_field('photo_1'); ?>" alt=""></a>
						</div>
						<div class="show-for-medium cell circle-image small-order-3">
							<a href="<?php the_sub_field('link'); ?>"><img class="circle" src="<?php the_sub_field('photo_2'); ?>" alt=""></a>
						</div>
					</div>
			        <?php endif;

			        if( get_row_layout() == 'brows' ):?>
					<div class="service-section grid-x grid-margin-x grid-margin-y small-up-1 medium-up-3 align-middle align-stretch">
						<div class="show-for-medium cell circle-image small-order-3 medium-order-1">
							<a href="<?php the_sub_field('link'); ?>"><img class="circle" src="<?php the_sub_field('photo_1'); ?>" alt=""></a>
						</div>
						<div class="show-for-medium cell circle-image small-order-2 medium-order-2">
							<a href="<?php the_sub_field('link'); ?>"><img class="circle" src="<?php the_sub_field('photo_2'); ?>" alt=""></a>
						</div>
						<div class="cell circle-text small-order-1 medium-order-3" >
							<div class="circle">
								<div class="circle-content"><div class="grid-x h-100"><div class="cell align-self-middle">
							        <h4><?php the_sub_field('title'); ?></h4>
							        <p class="p3"><?php the_sub_field('description'); ?></p>
							        <a href="<?php the_sub_field('link'); ?>" class="cta-button"><?php the_sub_field('button'); ?></a>
							    </div></div></div>
					    	</div>
						</div>
					</div>
			        <?php endif;

			    endwhile;

			else :
			    // no layouts found
			endif;
			?>

		</div>
	</div>
</div>