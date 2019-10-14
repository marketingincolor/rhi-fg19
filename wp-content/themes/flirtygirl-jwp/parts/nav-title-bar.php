<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; ?>
<style>
.home-icon, .lash-icon, .brow-icon, .loc-icon, .blog-icon { background-repeat: no-repeat; background-position: top center; /*padding-top: 1em;*/ height:50px; }
.book-icon { background-repeat: no-repeat; padding-left:2rem; background-position: left; height:44px; font-weight:500; display:table; max-width:6em; margin-top:.75em; }
.book-icon a { color:#fff; font-size:1.375em; }
.home-icon { background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fg-sitenav-icon-home.svg'); }
.lash-icon { background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fg-sitenav-icon-lashes.svg'); }
.brow-icon { background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fg-sitenav-icon-brows.svg'); }
.blog-icon { background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fg-sitenav-icon-blog.svg'); }
.loc-icon { background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fg-sitenav-icon-locations.svg'); }
.book-icon { background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/fg-book-now-icon.svg'); }

.home-icon.current-page-ancestor, .lash-icon.current-page-ancestor, .brow-icon.current-page-ancestor, .blog-icon.current-page-ancestor, .loc-icon.current-page-ancestor, .home-icon.active, .lash-icon.active, .brow-icon.active, .blog-icon.active, .loc-icon.active, .home-icon:hover, .lash-icon:hover, .brow-icon:hover, .blog-icon:hover, .loc-icon:hover, #footer-links .link:hover { filter: invert(0.3) sepia(1) saturate(55) hue-rotate(309.6deg) brightness(0.88); }

.nav-cta { background-color:#ec008c; float:right; height:100%; }
.nav-cta-link { padding-top:0 !important; }

.menu-item.current-page-item {  }
.menu-item.current-page-ancestor {  }
.menu-item.current-page-ancestor a { color:#ec008c; }
</style>
<div class="grid-container">
	<div class="grid-x Xalign-center Xgrid-margin-x Xgrid-padding-x">
		<div class="small-12">

			<div class="title-bar" data-responsive-toggle="top-bar-menu" data-hide-for="<?php echo $breakpoint ?>">
				<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flirty-header-logo.png" style="clear:both; display:inherit; margin:auto;"></a><br>
				<div class="title-bar-title"><?php _e( 'Menu', 'jointswp' ); ?></div>
				<button class="menu-icon" type="button" data-toggle></button>
			</div>


			<div class="top-bar" id="top-bar-menu">
				<div class="top-bar-left show-for-<?php echo $breakpoint ?>">
					<ul class="menu">
						<!-- <li><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li> -->
						<li><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flirty-header-logo.png" style="clear:both; display:inherit; margin:auto;"></a></li>
					</ul>
				</div>
				<div class="top-bar-right" style="padding-right:200px;">
					<?php joints_top_nav(); ?>
				</div>

				<!-- nav cta was here -->
				<div class="top-bar-alt nav-cta show-for-<?php echo $breakpoint ?>" id="top-bar-menu2" style="position:absolute; top:0px; height:107px; width:24em; right:-12em; padding:1em;">
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