<?php 
/**
 * The template for displaying all single posts and attachments
 */
$page_hero_image = get_the_post_thumbnail_url($post->ID, 'full'); 
get_header(); ?>

<section class="page-hero single-shop" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/fg-location-header.jpg); background-position:center; background-repeat:no-repeat; background-size:cover;">
<!-- <img class="top-sep" src="<?php echo get_template_directory_uri(); ?>/assets/images/sub-page-separator.png" style="display:none;"> -->
  <div class="image-box show-for-medium" style="position:absolute; max-width:calc(50vw - .5em); right:0;">
  	<img src="<?php echo $page_hero_image; ?>" style="height:max-content;">
  </div>
  <div class="grid-container h-100">
    <div class="grid-x h-100">

      <div class="small-10 small-offset-1 medium-5 medium-offset-0 align-self-middle cell">
      	<img class="top-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
        <h2><?php single_post_title(); ?></h2>
		<h4><?php global $post;
      	$queried_object = get_queried_object();
		$post = get_post( $queried_object->ID );
		setup_postdata( $post );
		the_content();
		wp_reset_postdata( $post );?></h4>
		<img class="bot-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
      </div>

    </div>
  </div>
</section>

<div class="content grid-container wpsl">
	<div class="inner-content grid-x Xgrid-margin-x Xgrid-padding-x">
		<div class="main small-12 cell">
		    <section class="entry-content Xgrid-container">

				<div class="grid-x grid-margin-x">
					<div class="location-info small-12 medium-6 cell">
	                <?php
	                    global $post;
	                    $queried_object = get_queried_object();
	                    
	                    // Add the content
	                    $post = get_post( $queried_object->ID );
	                    setup_postdata( $post );
	                    //the_content();
	                    wp_reset_postdata( $post );
	                    $location_name = get_post_meta( $queried_object->ID, 'wpsl_location_name', true ); ?>

						<div class="grid-x">
							<div class="small-3">
								<span class="wpsl-icon"><i class="fa fa-map-marker"></i></span><br>
								<span class="wpsl-icon"><i class="fa fa-phone"></i></span>
							</div>
							<div class="small-9">
	                    <?php if ( $location_name ) {
							echo '<p>' .  $location_name . '</p>';
						} ?>	
	                    <?php // Add the address shortcode
	                    echo do_shortcode( '[wpsl_address name="false" country="false"]' ); ?>
								
							</div>
							<div class="small-3">
								<span class="wpsl-icon"><i class="fa fa-clock-o"></i></span>
							</div>
							<div class="small-9">
	                    <?php // Add the hours shortcode
	                    echo do_shortcode( '[wpsl_hours]' ); ?>
								
							</div>

							<div class="small-12">
								<ul class="location-social-links grid-x align-justify">
								<?php 
								$location_ig = get_post_meta( $queried_object->ID, 'wpsl_location_ig', true );
								$location_fb = get_post_meta( $queried_object->ID, 'wpsl_location_fb', true );
								$location_tw = get_post_meta( $queried_object->ID, 'wpsl_location_tw', true );
								$location_yt = get_post_meta( $queried_object->ID, 'wpsl_location_yt', true );
								if ( $location_ig ) {
									echo '<li><a href="' . esc_url( $location_ig ) . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/fg-social-icon-ig-dark.svg"></a></li>';
								}
								if ( $location_fb ) {
									echo '<li><a href="' . esc_url( $location_fb ) . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/fg-social-icon-fb-dark.svg"></a></li>';
								}
								if ( $location_tw ) {
									echo '<li><a href="' . esc_url( $location_tw ) . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/fg-social-icon-tw-dark.svg"></a></li>';
								}
								if ( $location_yt ) {
									echo '<li><a href="' . esc_url( $location_yt ) . '" target="_blank"><img src="' . get_template_directory_uri() . '/assets/images/fg-social-icon-yt-dark.svg"></a></li>';
								} ?>
								</ul>
							</div>

						</div>

					<?php $location_name = get_post_meta( $queried_object->ID, 'wpsl_location_name', true );
					if ( $location_name ) {
						//echo '<p>' .  $location_name . '</p>';
					} ?>

					<?php // this will output the "category" assigned to a location, like "Salon" or "Coming Soon"
						$term_obj_list = get_the_terms( $queried_object->ID, 'wpsl_store_category' );
						$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
						//echo $terms_string;
					?>

					</div>
					<div class="location-map small-12 medium-6 cell">
						<?php echo do_shortcode( '[wpsl_map zoom="15"]' ); ?>
					</div>

				</div>
			</section> <!-- end section -->
		</div> <!-- end #main -->
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php $appointment_url = get_post_meta( $queried_object->ID, 'wpsl_appointment_url', true );
if ( $appointment_url ) { ?>
<div class="location-book">
	<div class="location-content grid-container wpsl book-cta">
		<?php echo '<h3><a href="' . esc_url( $appointment_url ) . '" class="NOTcta-button" target="_blank"><img src="'. get_template_directory_uri() .'/assets/images/fg-book-now-icon.svg">&nbsp;' . __( 'BOOK NOW', 'wpsl' ) . '</a></h3>'; ?>
	</div>
</div>
<?php } ?>


<?php get_template_part( 'parts/location', 'eyelash' ); ?>

<?php get_template_part( 'parts/location', 'brow' ); ?>

<div class="location-book" style="min-height:350px;">
	<div class="REMOVEbook-layer show-for-medium">&nbsp;</div>
	<div class="book-content grid-container wpsl" class="book-now" id="booknow">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
			<div class="main small-12 medium-8 medium-offset-4 large-8 large-offset-2 cell">
				<h4 class="p-rem-22">Set up your next lash or brow appointment at our Flirty Girl location using Booker.</h4>
				<?php
				$appointment_url = get_post_meta( $queried_object->ID, 'wpsl_appointment_url', true );
				if ( $appointment_url ) {
				  echo '<p><a href="' . esc_url( $appointment_url ) . '" class="slide-cta-button" target="_blank">' . __( 'START MY BOOKING!', 'wpsl' ) . '</a></p>';
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>