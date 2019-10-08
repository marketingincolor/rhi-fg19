<?php
/**
 * Template part for displaying page content in page.php
 */
?>
<style>
	.flourish { text-align:center; }
	.flourish .left-leaves { float:left; }
	.flourish .right-leaves { float:right; }
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						
	<header class="article-header">
		<h3 class="page-title"><?php the_title(); ?></h3>
	</header> <!-- end article header -->
					
    <section class="entry-content" itemprop="text">
	    <?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		<h4 class="flourish">
			<span class="left-leaves-white">#</span>
			<span class="line-white">-</span>
			<span class="text">Article Footer Flourish</span>
			<span class="line-white">-</span>
			<span class="right-leaves-white">#</span>
		</h4>



<div class="gray-flourish grid-x align-justify">
  <div class="cell shrink"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flourish-gray-left.png" alt="" width="28" height="23"></div>
  <div class="cell auto"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flourish-gray-line.png" alt="" width="100%" height="23" style="height:23px;"></div>
  <div class="cell shrink"><h4 class="flourish" style="padding:0em .5em;">Alt Article Flourish</h4></div>
  <div class="cell auto"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flourish-gray-line.png" alt="" width="100%" height="23" style="height:23px;"></div>
  <div class="cell shrink"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flourish-gray-right.png" alt="" width="28" height="23"></div>
</div>

<?php echo do_shortcode("[flourish title='Section Title' color=gray]"); ?>



<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: none;">
<defs>
<g id="icon-image">
    <path class="path1" d="M0 4v26h32v-26h-32zM30 28h-28v-22h28v22zM22 11c0-1.657 1.343-3 3-3s3 1.343 3 3c0 1.657-1.343 3-3 3-1.657 0-3-1.343-3-3zM28 26h-24l6-16 8 10 4-3z"></path>
</g>
</defs>
</svg>
<style>
	svg {
	  width: 32px;
	  height: 32px;
	  fill: currentColor;
	  vertical-align: bottom;
	}
</style>
<h1>
  Photo Gallery
  <svg viewBox="0 0 32 32">
    <use xlink:href="#icon-image"></use>
  </svg>
</h1>




		 <?php wp_link_pages(); ?>
	</footer> <!-- end article footer -->
						    
	<?php //comments_template(); ?>
					
</article> <!-- end article -->