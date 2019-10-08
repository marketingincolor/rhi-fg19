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
		<div class="small-12 medium-12 cell">
			<?php echo do_shortcode("[flourish title='".$service_headline."' color=gray type=h2]"); ?>
			<h5 class="headline gray"><?php echo $service_text; ?></h5>

		</div>
		<div class="small-12 medium-10 medium-offset-1 cell">
			<?php
			// check if the flexible content field has rows of data
			if( have_rows('salon_services') ):
			     // loop through the rows of data
			    while ( have_rows('salon_services') ) : the_row();

			        if( get_row_layout() == 'lashes' ): ?>
					<div class="service-section grid-x grid-margin-x small-up-2 medium-up-3 align-middle align-stretch">
						<div class="cell circle" style="display:flex; justify-content:center; align-items:center;">
							<div class="circle-content">
					        <h3><?php the_sub_field('title'); ?></h3>
					        <p><?php the_sub_field('description'); ?></p>
					        <a href="<?php the_sub_field('link'); ?>" class="cta-button"><?php the_sub_field('button'); ?></a>
					    	</div>
						</div>
						<div class="cell circle">
							<a href="<?php the_sub_field('link'); ?>"><img src="<?php the_sub_field('photo_1'); ?>" alt=""></a>
						</div>
						<div class="cell circle">
							<a href="<?php the_sub_field('link'); ?>"><img src="<?php the_sub_field('photo_2'); ?>" alt=""></a>
						</div>
					</div>
			        <?php endif;

			        if( get_row_layout() == 'brows' ):?>
					<div class="service-section grid-x grid-margin-x small-up-2 medium-up-3 align-middle align-stretch">
						<div class="cell circle">
							<a href="<?php the_sub_field('link'); ?>"><img src="<?php the_sub_field('photo_1'); ?>" alt=""></a>
						</div>
						<div class="cell circle">
							<a href="<?php the_sub_field('link'); ?>"><img src="<?php the_sub_field('photo_2'); ?>" alt=""></a>
						</div>
						<div class="cell circle" style="display:flex; justify-content:center; align-items:center;">
							<div class="circle-content">
					        <h3><?php the_sub_field('title'); ?></h3>
					        <p><?php the_sub_field('description'); ?></p>
					        <a href="<?php the_sub_field('link'); ?>" class="cta-button"><?php the_sub_field('button'); ?></a>
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