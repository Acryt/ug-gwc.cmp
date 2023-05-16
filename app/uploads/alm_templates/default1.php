<a class="shadow" href="<?php the_permalink(); ?>">
<div class="blog__item <?php if (! has_post_thumbnail() ) { echo 'no-img'; } ?>">
   <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail('full');
   }?>
   <p class="blog__date">
       <?php the_time("F d, Y"); ?>
   </p>
   <h3 class="blog__title"><?php the_title(); ?></h3>
   <!-- // <?php the_excerpt(); ?> -->
</div>
</a>