<?php
/**
 * The last posts sidebar displayed before footer
 * 
 * @package startheme
 */

$exclude = is_front_page() ? get_option( 'sticky_posts' ) : [get_the_ID()];

$lastnews = get_posts( array(
  'numberposts' => 3,
  'category' => 28,// catégorie id=avis
  'exclude' => $exclude
));

?>

<section class="sidebar-lastnews bg-light py-5">

  <div class="container">

<!-- appel de la classe id=28 référence aux avis -->
    <header class="sidebar-header d-flex flex-wrap justify-content-between align-items-start">
      <h2 class="sidebar-title"><?php _e('Dernières actualités', 'startheme'); ?></h2>
      <a href="<?= esc_url( get_category_link( 28 ) ); ?>" class="btn btn-outline-primary"><?php _e('Toutes les actualités', 'startheme'); ?></a>
    </header>

    <?php if($lastnews) : ?>

<!-- mise en forme de la catégorie en caroussel -->
      <div id="carouselExampleIndicators" class="carousel-news owl-carousel px-sm-4 mt-3 mt-sm-4 carousel slide" data-ride="carousel">

     
        <?php foreach( $lastnews as $post ) : 
          setup_postdata( $post ); ?>
<div class="carousel-inner">
<div class="carousel-item active">
          <article <?php post_class('card border-0'); ?>>

<!-- mise en forme des card dans lesquels il y a les avis individuels avec contenu, image et bouton lire la suite-->
            <figure class="card-figure mb-0">
              <a class="link-image" href="<?php the_permalink(); ?>" title="<?php _e( 'Lire la suite', 'startheme' ) ?>"><?php the_post_thumbnail('thumb-medium', array('class'=>'img-fluid')); ?></a>
            </figure>

            <div class="card-body">

              <h3 class="card-title h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

              <?php the_excerpt(); ?>

            </div>

          </article>
</div>
</div>

        <?php endforeach; 
/* chevrons pour le caroussel */
          wp_reset_postdata(); ?>
 <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
      </div><!-- .carousel-news -->

    <?php endif; ?>

  </div><!-- .container -->

</section><!-- .sidebar-lastspots -->