<?php
/**
 * CUSTOM Template part for displaying page content in SERVICES
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						
	<header class="article-header">
		<h3 class="page-title" style="display:none;"><?php the_title(); ?></h3>
	</header> <!-- end article header -->
					
    <section class="entry-content" itemprop="text">
	    <?php the_content(); ?>
	</section> <!-- end article section -->
						

		 <?php //wp_link_pages(); ?>
	</footer> <!-- end article footer -->
						    
	<?php //comments_template(); ?>
					
</article> <!-- end article -->