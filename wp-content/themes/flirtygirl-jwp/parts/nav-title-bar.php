<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; ?>
<div class="grid-container">
	<div class="grid-x Xalign-center Xgrid-margin-x Xgrid-padding-x">
		<div class="small-11">

			<div class="title-bar" data-responsive-toggle="top-bar-menu" data-hide-for="<?php echo $breakpoint ?>">
				<span class="img"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flirty-header-logo.png" style="clear:both; display:inherit; margin:auto;" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/flirty-header-logo-retina.png 2x"></a></span><br>
				<span class="txt"><div class="title-bar-title"><?php _e( 'Menu', 'jointswp' ); ?></div>
				<button class="menu-icon" type="button" data-toggle></button></span>
			</div>


			<div class="top-bar" id="top-bar-menu">
				<div class="top-bar-left show-for-<?php echo $breakpoint ?>">
					<ul class="menu">
						<!-- <li><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li> -->
						<li><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flirty-header-logo.png" style="clear:both; display:inherit; margin:auto;" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/flirty-header-logo-retina.png 2x"></a></li>
					</ul>
				</div>
				<div class="top-bar-right">
					<?php joints_top_nav(); ?>
				</div>

				<!-- nav cta was here -->
				<div class="top-bar-alt nav-cta show-for-<?php echo $breakpoint ?>" id="top-bar-menu2" style="position:absolute; top:0px; height:115px; width:24em; right:-12em; padding:1em;">
					<ul class="menu"><li class="menu-item book-icon"><a href="#booknow" class="nav-cta-link">BOOK NOW!</a></li></ul>
				</div>

			</div>

		</div>

		<div class="main-booking-cta small-1 show-for-small-only pnk-bgnd" style="height:100vh; position:fixed; right:0; top:0; z-index:20;">
			<div style="transform:rotate(-90deg); width:100vh; height:100%;">
				<h3 data-toggle="off-canvas" style="text-align:center; color:#fff;">BOOK NOW</h3>
			</div>
		</div>

	</div>
</div>

				<div class="top-bar-alt nav-cta2 show-for-medium" id="top-bar-menu2" style="display:none; background-color:red; width:10em; height:105px; position:absolute; top:0; right:0;">
					<ul class="menu"><li class="menu-item book-icon"><a href="#booknow" class="nav-cta-link">BOOK NOW!</a></li></ul>
				</div>