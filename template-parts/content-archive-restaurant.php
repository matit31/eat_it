<?php
/**
 * Template part for displaying posts
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */
$quartier = get_field_object('quartier');
?>

<article <?php post_class('mb-4 pb-4 border-bottom border-light'); ?>>

  <div class="row">

    <?php if(has_post_thumbnail()) : ?>
      <div class="col">
          <a class="link-image" href="<?php the_permalink(); ?>" title="<?php _e( 'Lire la suite', 'startheme' ) ?>"><?php the_post_thumbnail('thumb-medium', array('class'=>'img-fluid')); ?></a>
      </div>
    <?php endif; ?>

    <div class="entry-archive-content col-lg-7">

      <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e( 'Lire la suite', 'startheme' ) ?>"><?php the_title(); ?></a></h2>
      <span class="badge badge-pill badge-primary" title="Catégorie">
                            <i class="fa fa-tag"></i>
                            <?= $category["name"]; ?>
                        </span>
                   
                    <span class="badge badge-pill badge-secondary" title="Ville">
                        <i class="fa fa-map-marker"></i>
                        <?= $quartier["value"]; ?>
                    </span>

      <?php the_excerpt(); ?>

    </div>

  </div><!-- .row -->

</article>