<?php 
  require('../../../wp-blog-header.php');
  header("HTTP/1.1 200 OK");
  $tags = array();
  $posttags = $_POST['posttags'];
  array_push($tags, $posttags);
  
  $category = $_POST['category'];
  $all_tags = array();

  // If user selected all tags
  if ($tags === 'all' || in_array('all', $tags)) {
  	$terms = get_terms( array(
		  'taxonomy' => 'post_tag',
		  'hide_empty' => false,
		));
		foreach ($terms as $term) {
			array_push($all_tags, $term->slug);
		}
		$tags = $all_tags;
  }

  $query = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'category_name'  => $category,
    'tax_query' => array(
  		array(
  			'taxonomy' => 'post_tag',
  			'field'    => 'slug',
        'terms'    => $tags
  		),
  	),
	));
	if($query->have_posts()) : 
	  while($query->have_posts()) : 
	    $query->the_post();
?>

      <?php get_template_part( 'parts/loop', 'archive-grid' ); ?>

<?php
	  endwhile;
  else: 
?>

  <h3>Sorry, no blogs match your filter. Please try again.</p>

<?php endif;wp_reset_postdata(); ?>
