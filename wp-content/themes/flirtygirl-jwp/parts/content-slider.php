<?php
/**
 * Template part for displaying SLIDER images on Home Page
 * slider 
 */
?>

<div class="grid-container-fluid home-slider"> 

  <div class="orbit" role="region" aria-label="Main Site Slider" data-orbit>

    <div class="orbit-wrapper">
      <div class="orbit-controls hide-for-medium" style="display:none;">
        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&lsaquo;</button>
        <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&rsaquo;</button>
      </div>
      <ul class="orbit-container">

      <?php if( have_rows('slider') ):

        $count = 0;
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

      <?php else : // no rows found
      endif; ?>

  </div>

</div>

