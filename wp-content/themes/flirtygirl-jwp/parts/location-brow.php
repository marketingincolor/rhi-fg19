<?php 
/**
 * Custom component for Location page to show Brow serices
 */
global $post;
$queried_object = get_queried_object();
?>
<style>
.round-button {
	border: 4px solid rgb(100, 100, 100);
    background: transparent;
    border-radius: 100%;
    color: rgb(100, 100, 100);
    height: 128px;
    width: 128px;
    font-size:20px;
    font-weight:500;
}
.dropdown-pane {
	padding:2rem;
	border-radius:25px;
	background-color:rgba(171, 171, 171, 0.9);
	border: 4px solid rgba(100, 100, 100, 0.9);
	font-size:18px;
	line-height:1.2;
}
.brow-details { min-height:850px; }
</style>
<div class="brow-details">
	<div class="content grid-container wpsl">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
			<div class="main small-12 large-6 text-center cell">
				<h2>Eyebrow Product Section</h2>
				<h4 style="font-style:italic;"><span class="show-for-large">Hover over</span><span class="hide-for-large">Click on</span> any of our lash set and services for more details</h4>
				<div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y text-center align-center small-up-2 medium-up-3">

				<?php if( have_rows('brow_details', 'option') ): $counter = 0; while ( have_rows('brow_details', 'option') ) : the_row(); ?>
					<div class="cell round">
						<button class="round-button" type="button" data-toggle="brow-dropdown-<?php echo $counter;?>"><?php the_sub_field('detail_title');?></button>
					</div>
				<?php $counter++; endwhile; endif; ?>
				
				</div>

				<?php
				$appointment_url = get_post_meta( $queried_object->ID, 'wpsl_appointment_url', true );
				if ( $appointment_url ) {
				  echo '<p class="m-rem-20"><a href="' . esc_url( $appointment_url ) . '" class="cta-button" target="_blank">' . __( 'BOOK AN APPOINTMENT!', 'wpsl' ) . '</a></p>';
				}
				?>

				<?php if( have_rows('brow_details', 'option') ): $counter = 0; while ( have_rows('brow_details', 'option') ) : the_row(); ?>
					<div class="brow dropdown-pane" id="brow-dropdown-<?php echo $counter;?>" data-dropdown data-hover="true" data-hover-pane="true">
						<?php the_sub_field('detail_text');?>
					</div>
				<?php $counter++; endwhile; endif; ?>

			</div>
			<div class="show-for-large large-6 cell"> 
				&nbsp; 
			</div>
		</div>
	</div>
</div>