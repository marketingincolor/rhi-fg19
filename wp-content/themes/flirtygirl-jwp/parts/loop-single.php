<?php
/**
 * Template part for displaying a single post
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="article-header">	
		<h2 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h2>
		<?php //get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->
					
    <section class="entry-content" itemprop="text">
		<?php //the_post_thumbnail('full'); ?>
		<?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer" style="text-align:center;">
		<h4>Love this post? Spread the word!</h4>
		<a href="https://www.facebook.com/sharer/sharer.php?<?php the_permalink(); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-share-icon-fb.svg"></a>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-share-icon-tw.svg"></a>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="mailto:?body=<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fg-share-icon-em.svg"></a>
		<p class="tags"><?php //the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>	
	</footer> <!-- end article footer -->
						
	<?php //comments_template(); ?>	
													
</article> <!-- end article -->