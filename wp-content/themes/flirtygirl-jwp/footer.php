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
					
				<footer class="footer gry-bgnd" role="contentinfo">
					<div class="grid-container">
						<div class="inner-footer grid-x grid-margin-x grid-padding-x">
							
							<div class="small-11 medium-12 large-12 text-center cell">
								<nav role="navigation">
		    						<?php joints_footer_links(); ?>
		    					</nav>
		    				</div>
							
							<div class="small-11 medium-12 large-12 text-center cell">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
							</div>
						
						</div> <!-- end #inner-footer -->
					</div>
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->