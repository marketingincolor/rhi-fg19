<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; ?>


<div class="grid-container full">
	<div class="grid-x Xalign-center Xgrid-margin-x Xgrid-padding-x">
		<div class="small-11 medium-12">

			<div class="title-bar" data-responsive-toggle="top-bar-menu" data-hide-for="<?php echo $breakpoint ?>">
				<img src="http://satyr.io/240x80/f0f" style="clear:both; display:inherit; margin:auto;">
				<div class="title-bar-title"><?php _e( 'Menu', 'jointswp' ); ?></div>
				<button class="menu-icon" type="button" data-toggle></button>
			</div>

			<div class="top-bar" id="top-bar-menu">
				<div class="top-bar-left show-for-<?php echo $breakpoint ?>">
					<ul class="menu">
						<!-- <li><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li> -->
						<li><a href="<?php echo home_url(); ?>"><img src="http://satyr.io/240x80/f0f" style="clear:both; display:inherit; margin:auto;"></a></li>
					</ul>
				</div>
				<div class="top-bar-right">
					<?php joints_top_nav(); ?>
				</div>
			</div>

		</div>

		<div class="main-booking-cta small-1 show-for-small-only pnk-bgnd" style="height:100vh; position:fixed; right:0; top:0;">
			<div style="transform:rotate(-90deg); width:100vh; height:100%;">
				<h3 data-toggle="off-canvas" style="text-align:center;">BOOK NOW</h3>
			</div>
		</div>

	</div>
</div>

