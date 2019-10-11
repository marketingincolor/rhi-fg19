<?php
/**
 * Template part for displaying SLIDER images on Home Page
 * slider 
 */
//global $post;
$page_hero_title = get_field('hero_title'); //get_the_title($post->ID);
$page_hero_meta = get_field('hero_description'); //get_the_content($post->ID); 
$page_hero_image = get_the_post_thumbnail_url($post->ID, 'full'); 
//echo "<hr>" . $page_hero_title . "<hr>". $page_hero_image . "<hr>";
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

        <li class="orbit-slide">
          <figure class="orbit-figure">
            <img class="orbit-image" src="<?php the_sub_field('slide_image'); ?>" alt="<?php the_sub_field('slide_title'); ?>">
            <figcaption class="orbit-caption grid-x grid-padding-x">
              <div class="orbit-caption-meta medium-10 medium-offset-1">
              <h2><?php the_sub_field('slide_title'); ?></h2>
              <h4><?php the_sub_field('slide_description'); ?></h4>
              <p><a href="<?php the_sub_field('slide_link'); ?>" class="slide-cta-button"><?php the_sub_field('slide_button'); ?></a></p>
              </div>
            </figcaption>
          </figure>
        </li>

      <?php 
        endwhile; ?>

      </ul>
    </div>
    <nav class="orbit-bullets">
      <?php for($i=1; $i<=$count; $i++){ $j=$i-1; ?>
          <button data-slide="<?php echo $j; ?>"><span class="show-for-sr">Slide details</span></button>
      <?php } ?>
    </nav>


  </div>

</div>

      <?php //else : // no rows found ?>
      <?php elseif($page_hero_image) : // no rows found ?>



<section class="page-hero" style="background-image: url(<?php echo $page_hero_image; ?>);">
  <div class="grid-container h-100">
    <div class="grid-x h-100">
      <div class="small-10 small-offset-1 medium-8 medium-offset-1 align-self-middle cell">

      <?php global $post;     // if outside the loop
      if ( is_page() && $post->post_parent ) { ?>
        <h4><?php echo $page_hero_meta; ?></h4>
        <h2><?php echo $page_hero_title; ?></h2>
      <?php } else { ?>
        <h2><?php echo $page_hero_title; ?></h2>
        <h4><?php echo $page_hero_meta; ?></h4>
      <?php } ?>

      </div>
    </div>
  </div>
</section>

      <?php else : // no rows found ?>
      <?php endif; ?>
