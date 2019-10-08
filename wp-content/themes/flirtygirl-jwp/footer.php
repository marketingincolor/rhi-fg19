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
							
							<div class="small-12 medium-4 large-4 text-center cell footbox">
								<div class="inner-footbox">
								<h3>FOOTER NAVIGATION</h3>
								<nav role="navigation">
		    						<?php joints_footer_links(); ?>
		    					</nav>
		    					</div>
		    				</div>

							<div class="small-12 medium-4 large-4 text-center cell footbox">
								<div class="inner-footbox">
								<h3>CENTER FOOTER CTA</h3>
								</div>
		    				</div>


							<div class="small-12 medium-4 large-4 text-center cell footbox">
								<div class="inner-footbox">
								<h3>FOOTER SOCIAL</h3>
								</div>
		    				</div>


							
							<div class="small-12 medium-12 large-12 text-center cell">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved. | <a href="<?php echo site_url(); ?>/privacy-policy">Privacy Policy</a></p>
							</div>
						
						</div> <!-- end #inner-footer -->
					</div>
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->