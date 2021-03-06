<?php 
/**
 * Custom component for Location page to show Eyelash serices
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
.eyelash-details { min-height:850px; color:#fff; }
</style>
<div class="eyelash-details">
	<div class="content grid-container wpsl">
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
			<div class="show-for-large large-6 cell"> 
				&nbsp; 
			</div>
			<div class="main small-11 large-6 text-center cell">
				<h2>Eyelash Services</h2>
				<h4 style="font-style:italic;"><span class="show-for-large">Hover over</span><span class="hide-for-large">Click on</span> any of our lash set and services for more details</h4>
				<div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y text-center align-center small-up-2 medium-up-3">

				<?php if( have_rows('lash_details', 'option') ): $counter = 0; while ( have_rows('lash_details', 'option') ) : the_row(); ?>
					<div class="cell round">
						<button style="color:#fff;" class="round-button" type="button" data-toggle="example-dropdown-<?php echo $counter;?>"><?php the_sub_field('detail_title');?></button>
					</div>
				<?php $counter++; endwhile; endif; ?>
				
				</div>

				<?php
				$appointment_url = get_post_meta( $queried_object->ID, 'wpsl_appointment_url', true );
				if ( $appointment_url ) {
				  echo '<p class="m-rem-20" style="padding-top:1rem;"><a href="' . esc_url( $appointment_url ) . '" class="slide-cta-button" target="_blank">' . __( 'BOOK AN APPOINTMENT!', 'wpsl' ) . '</a></p>';
				}
				?>

				<?php if( have_rows('lash_details', 'option') ): $counter = 0; while ( have_rows('lash_details', 'option') ) : the_row(); ?>
					<div class="dropdown-pane" id="example-dropdown-<?php echo $counter;?>" data-dropdown data-hover="true" data-hover-pane="true" style="color:#fff;">
						<?php the_sub_field('detail_text');?>
					</div>
				<?php $counter++; endwhile; endif; ?>

			</div>
		</div>
	</div>
</div>