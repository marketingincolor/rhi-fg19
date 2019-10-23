<?php
/**
 * Template part for displaying SLIDER images on Home Page
 * slider 
 */
$page_slug = get_post_field( 'post_name' );
$page_hero_title = get_field('hero_title'); //get_the_title($post->ID);
$page_hero_meta = get_field('hero_description'); //get_the_content($post->ID); 
$page_hero_image = get_the_post_thumbnail_url($post->ID, 'full'); 
//echo "<hr>" . $page_hero_title . "<hr>". $page_hero_image . "<hr>";
$center_mobile = wp_is_mobile() ? 'text-center' : '';
?>
      <?php if( have_rows('slider') ): ?>
<div class="grid-container-fluid home-slider"> 
  <div class="orbit" role="region" aria-label="Main Site Slider" data-orbit>

    <div class="orbit-wrapper">
      <div class="orbit-controls hide-for-medium" style="display:none;">
        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&lsaquo;</button>
        <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&rsaquo;</button>
      </div>
      <ul class="orbit-container">

      <?php $count = 0;
        $rowcount = get_field('slider');
        if (is_array($rowcount)) { $count = count($rowcount); }

        while ( have_rows('slider') ) : the_row(); ?>
<?php $button_target = get_sub_field('slide_link_open') ? 'target="_blank"' : ''; ?>
        <li class="orbit-slide">
          <figure class="orbit-figure">
            <img class="orbit-image" src="<?php the_sub_field('slide_image'); ?>" alt="<?php the_sub_field('slide_title'); ?>">
            <figcaption class="orbit-caption grid-x grid-padding-x">
              <div class="orbit-caption-meta small-11 medium-11 align-self-middle medium-offset-1">
              <img class="top-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
              <h1 class="show-for-medium indent-rem-22"><?php the_sub_field('slide_title'); ?></h1>
              <p class="p1 indent-rem-22"><?php the_sub_field('slide_description'); ?></h4>
            <?php if ( get_sub_field('slide_link') ) : ?>
              <p class="indent-rem-22"><a href="<?php the_sub_field('slide_link'); ?>" class="slide-cta-button" <?php echo $button_target;?> ><?php the_sub_field('slide_button'); ?></a></p>
            <?php endif; ?>
              <img class="bot-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
              </div>
            </figcaption>
          </figure>
        </li>

      <?php 
        endwhile; ?>

      </ul>
    </div>
    <nav class="orbit-bullets show-for-medium">
      <?php for($i=1; $i<=$count; $i++){ $j=$i-1; ?>
          <button data-slide="<?php echo $j; ?>"><span class="show-for-sr">Slide details</span></button>
      <?php } ?>
    </nav>

  </div>
</div>

      <?php //else : // no rows found ?>
      <?php elseif($page_hero_image) : // no rows found ?>

<section class="page-hero grid-container full <?php echo $page_slug; ?>" style="background-image: url(<?php echo $page_hero_image; ?>);">
  <div class="grid-container h-100">
    <div class="grid-x h-100">
      <div class="small-11 medium-6 medium-offset-0 align-self-middle cell <?php echo $center_mobile; ?>">
      <?php global $post;     // if outside the loop
      if ( is_page() && $post->post_parent ) { ?>
<img class="top-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png" style="display:none;">
        <p class="p1 indent-rem-22"><?php echo $page_hero_meta; ?></p>
        <h1 class="indent-rem-22"><?php echo $page_hero_title; ?></h1>
<img class="bot-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png" style="display:none;">
      <?php } else { ?>
<img class="top-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
        <h1 class="indent-rem-22"><?php echo $page_hero_title; ?></h1>
        <p class="p1 indent-rem-22"><?php echo $page_hero_meta; ?></p>
<img class="bot-sep show-for-medium" src="<?php echo get_template_directory_uri(); ?>/assets/images/sep-gray-right.png">
      <?php } ?>
      </div>
    </div>
  </div>
</section>

      <?php else : // no rows found ?>
      <?php endif; ?>
