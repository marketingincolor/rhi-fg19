<?php 
/**
 * Off Canvas Booking content
 *
 */
?>
<div class="grid-container">
	<div class="grid-x align-center grid-margin-x grid-padding-x">
		<div class="small-12">

			<div class="cta notcontent grid-container">

				<div class="inner-content grid-x notgrid-margin-x notgrid-padding-x">

				    <div class="small-12 medium-12 cell">
				    	<div class="book-now" id="modalbooknow">
						<h1>Book Now!</h1>
						<h3>Enter your zipcode and we'll locate a Flirty Girl Location near you.</h3>

					<?php if ( wp_is_mobile() ) { ?>
						<?php echo do_shortcode('[wpsl auto_locate="false" template="custom"]'); ?>
					<?php } else { ?>
						<h4>(mobile form not available for desktop users)</h4>
					<?php } ?>

						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
</div>