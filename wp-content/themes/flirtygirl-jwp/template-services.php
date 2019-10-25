<?php 
/*
Template Name: Services
*/
$extension_field = get_field_object('eyelash_extensions');
$extension_name = $extension_field['label'];
$enhancement_field = get_field_object('eyelash_enhancements');
$enhancement_name = $enhancement_field['label'];
$services_field = get_field_object('brow_services');
$brow_service_name = $services_field['label'];
$center_mobile = wp_is_mobile() ? 'text-center' : '';
get_header(); ?>

	<?php get_template_part( 'parts/content', 'slider' ); ?>

	<?php if( have_rows('eyelash_extensions') ): ?>
	<div class="service-grid content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x XXXsmall-up-1 XXXmedium-up-3 XXXalign-center text-center">

			<div class="small-11 medium-12 cell">
				<?php echo do_shortcode('[flourish title="'.$extension_name.'" color="gray" type="h2"]'); ?>
			</div>

		<?php while ( have_rows('eyelash_extensions') ) : the_row(); ?>
		    <div class="cell small-11 small-offset-0 medium-6 large-4 circle-text">
		    	<div class="pic-circle">
				    <a href="<?php the_sub_field('service_link'); ?>"><img src="<?php the_sub_field('service_image'); ?>"></a>
		    	</div>
		    	<div class="circle">
					<div class="circle-content">
						<div class="grid-container h-100">
							<div class="grid-x h-100">
								<div class="cell align-self-middle">
									<h4><a href="<?php the_sub_field('service_link'); ?>"><?php the_sub_field('service_title'); ?></a></h4>
									<p class="p3"><?php the_sub_field('service_text'); ?></p>
									<p style="margin-top:1.5em;"><a href="<?php the_sub_field('service_link'); ?>" class="cta-button"><?php the_sub_field('service_button'); ?></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
	</div>
	<?php else : endif; ?>



	<?php if( have_rows('eyelash_enhancements') ): ?>
	<div class="service-grid content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x XXXsmall-up-1 XXXmedium-up-3 XXXalign-center text-center">

			<div class="small-11 medium-12 cell">
				<?php echo do_shortcode('[flourish title="'.$enhancement_name.'" color="gray" type="h2"]'); ?>
			</div>

		<?php while ( have_rows('eyelash_enhancements') ) : the_row(); ?>
		    <div class="cell small-11 small-offset-0 medium-6 large-4 circle-text">
		    	<div class="pic-circle">
				    <a href="<?php the_sub_field('service_link'); ?>"><img src="<?php the_sub_field('service_image'); ?>"></a>
		    	</div>
		    	<div class="circle">
					<div class="circle-content">
						<div class="grid-container h-100">
							<div class="grid-x h-100">
								<div class="cell align-self-middle">
									<h4><a href="<?php the_sub_field('service_link'); ?>"><?php the_sub_field('service_title'); ?></a></h4>
									<p class="p3"><?php the_sub_field('service_text'); ?></p>



<?php if (wp_is_mobile() && get_sub_field('service_button') == 'Book Now' ) { $trigger = 'data-toggle="off-canvas"'; } else { $trigger = 'data-false'; } ?>



									<p style="margin-top:1.5em;"><a <?php echo $trigger; ?> href="<?php the_sub_field('service_link'); ?>" class="cta-button"><?php the_sub_field('service_button'); ?></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    	<?php endwhile; ?>
		</div>
	</div>
    <?php else : endif; ?>



	<?php if( have_rows('brow_services') ): ?>
	<div class="service-grid content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x XXXsmall-up-1 XXXmedium-up-3 XXXalign-center text-center">

			<div class="small-11 medium-12 cell">
				<?php echo do_shortcode('[flourish title="'.$brow_service_name.'" color="gray" type="h2"]'); ?>
			</div>

		<?php while ( have_rows('brow_services') ) : the_row(); ?>
		    <div class="cell small-11 small-offset-0 medium-6 large-4 circle-text">
		    	<div class="pic-circle">
				    <a href="<?php the_sub_field('service_link'); ?>"><img src="<?php the_sub_field('service_image'); ?>"></a>
		    	</div>
		    	<div class="circle">
					<div class="circle-content">
						<div class="grid-container h-100">
							<div class="grid-x h-100">
								<div class="cell align-self-middle">
									<h4><a href="<?php the_sub_field('service_link'); ?>"><?php the_sub_field('service_title'); ?></a></h4>
									<p class="p3"><?php the_sub_field('service_text'); ?></p>
									<p style="margin-top:1.5em;"><a href="<?php the_sub_field('service_link'); ?>" class="cta-button"><?php the_sub_field('service_button'); ?></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    	<?php endwhile; ?>
		</div>
	</div>
    <?php else : endif; ?>

	<div class="content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x <?php echo $center_mobile; ?>">
		    <main class="main small-11 medium-10 medium-offset-1 cell" role="main">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			    	<?php get_template_part( 'parts/loop', 'services' ); ?>
			    <?php endwhile; endif; ?>										
			</main> <!-- end #main -->
		</div> <!-- end #inner-content -->
	</div> <!-- end #content -->

<?php if ( is_page('lashes') ) : ?>
	<?php get_template_part( 'parts/content', 'aftercare' ); ?>
<?php endif; ?>

<?php if ( is_page('lash-lift') ) : ?>
	<?php get_template_part( 'parts/content', 'liftcare' ); ?>
<?php endif; ?>

<?php if ( is_page('brows') ) : ?>
	<?php get_template_part( 'parts/content', 'browcare' ); ?>
<?php endif; ?>

<?php if ( is_page('microblading') ) : ?>
	<?php get_template_part( 'parts/content', 'microcare' ); ?>
<?php endif; ?>

<?php if ( wp_is_mobile() ) { ?>
<?php } else { ?>
	<div class="cta custom-content grid-container">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
		    <div class="small-11 medium-12 cell" id="booknow">
		    	<div class="book-now">
				<!-- <h1>Book Now!</h1>
				<h3>Enter your zipcode and we'll locate a Flirty Girl Location near you.</h3> -->
				<!-- <p style="display:inline-block;"><button class="button" data-open="bookModal">Book Now</button></p>	 -->
				<h1>Book Now!</h1>
				<h3>Enter your zipcode and we'll locate a Flirty Girl Location near you.</h3>
				<?php echo do_shortcode('[wpsl auto_locate="true" template="custom"]'); ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php get_footer(); ?>