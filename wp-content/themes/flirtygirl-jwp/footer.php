<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>

<div class="reveal tiny" id="bookModal" data-reveal data-h-offset="0" data-v-offset="0" style="height:100vh;">
	<?php get_template_part( 'parts/modal', 'booking' ); ?>
</div>
					
				<footer class="footer dk-gry-bgnd" role="contentinfo">
					<div class="grid-container">
						<div class="inner-footer grid-x grid-margin-x grid-margin-y align-stretch">
							
							<div class="small-12 medium-4 large-4 cell footbox">
								<div class="inner-footbox">
								<nav role="navigation" style="margin-left:25%; padding-top:25%;">
		    						<?php joints_footer_links(); ?>
		    					</nav>
		    					</div>
		    				</div>

							<div class="small-12 medium-4 large-4 cell footbox footer-cta">
								<div class="inner-footbox grid-container h-100">

									<?php $cta = get_field('giftcard', 'option');
									if($cta) : ?>
									<div class="grid-x h-100">
										<div class="footer-cta-content small-6 align-self-middle">
											<h2><?php echo $cta['title']; ?></h2>
											<h5 style="font-size:18px; font-weight:500;"><?php echo $cta['text']; ?></h5>
											<p><a href="<?php echo $cta['link']; ?>" class="cta-button" target="_blank"><?php echo $cta['button']; ?></a></p>
										</div>
									</div>
									<?php endif; ?>

								</div>
		    				</div>


							<div class="small-12 medium-4 large-4 text-center cell footbox">
								<div class="inner-footbox m-rem-20">

									<p class="m-rem-20"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flirty-footer-logo.png" alt="Flirty Girl Lashes"></a></p>
									<div class="site-social grid-x grid-margin-x align-center align-middle">
									<?php if( get_field('corporate_instagram', 'option') ): ?>
									    <div class="cell shrink"><a href="<?php the_field('corporate_instagram', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-social-icon-ig.svg"></a></div>
									<?php endif; ?>

									<?php if( get_field('corporate_facebook', 'option') ): ?>
									    <div class="cell shrink"><a href="<?php the_field('corporate_facebook', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-social-icon-fb.svg"></a></div>
									<?php endif; ?>
									<?php if( get_field('corporate_twitter', 'option') ): ?>
									    <div class="cell shrink"><a href="<?php the_field('corporate_twitter', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-social-icon-tw.svg"></a></div>
									<?php endif; ?>
									<?php if( get_field('corporate_youtube', 'option') ): ?>
									    <div class="cell shrink"><a href="<?php the_field('corporate_youtube', 'option'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-social-icon-yt.svg"></a></div>
									<?php endif; ?>
									</div>
									
									<p class="m-rem-20"><a href="<?php echo site_url(); ?>/locations" class="cta-button">Find A Location</a></p>
									<p class="m-rem-20"><a href="<?php echo site_url(); ?>/contact-us" class="cta-button">Contact Us</a></p>

								</div>
		    				</div>


							
							<div class="small-12 medium-12 large-12 text-center cell">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved. | <a href="<?php echo site_url(); ?>/terms-conditions">Terms & Conditions</a></p>
							</div>

						</div> <!-- end #inner-footer -->
					</div>
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/owl.carousel.min.js"></script>
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->