<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; ?>

<div class="grid-container">
	<div class="grid-x Xalign-center Xgrid-margin-x Xgrid-padding-x">
		<div class="small-12">

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
				<div class="top-bar-right nav-cta">
					<ul class="menu"><li class="menu-item"><a href="#book-now" class="nav-cta-link">BOOK NOW!</a></li></ul>
				</div>
			</div>

		</div>

	</div>
</div>

