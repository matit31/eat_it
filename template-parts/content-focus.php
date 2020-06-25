<?php
/**
 * affichage d'une section avant le caroussel si besoin section deja prete
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

?>

<article <?php post_class('sticky-post_article row'); ?>>
<!-- une card avec du texte, une image et un bouton lire la suite -->
  <?php if(has_post_thumbnail()) : ?>
    <figure class="card-figure mb-0 col-sm-10 col-md-6 offset-sm-1">
      <a class="link-image" href="<?php the_permalink(); ?>" title="<?php _e( 'Lire la suite', 'startheme' ) ?>"><?php the_post_thumbnail('thumb-medium', array('class'=>'img-fluid')); ?></a>
    </figure>
  <?php endif; ?>

  <div class="sticky-post_content py-4 col-sm-10 offset-sm-1 col-md-4 offset-md-0">

    <h2><?php _e('lire la suite', 'startheme'); ?></h2>  

    <h3 class="h4"><a href="<?php the_permalink(); ?>" title="<?php _e( 'Lire la suite', 'startheme' ) ?>"><?php the_title(); ?></a></h3>
    
    <?php the_excerpt(); ?>
    
  </div>

</article>