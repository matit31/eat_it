
<?php
/**
 * The spot posts sidebar displayed before single spot footer
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */

$lastposts = get_posts( array(
  'numberposts' => 3,
  'post_type' => 'restaurant',
  'orderby' => 'rand',
  'post__not_in' => array( get_the_ID() )
));

?>
<!-- boucle de 3 restaurants affichés aléatoirement -->
<section class="sidebar-lastspots bg-light py-5">

  <div class="container">
<!-- récuparation des contenu des restaurants de la page archive pour affichage de 3 resto aléatoirement avec bouton voir tous -->
    <header class="sidebar-header d-flex flex-wrap justify-content-between align-items-start">
      <h2 class="sidebar-title"><?php _e('Autres restaurants', 'startheme'); ?></h2> 
      <a href="<?= get_post_type_archive_link('spot'); ?>" class="btn btn-outline-primary"><?php _e('Tous les restaurants', 'startheme'); ?></a>
    </header>

    <div class="row no-gutters"> 

      <?php 
      if ( $lastposts ) : 
        foreach ( $lastposts as $post ) :
          setup_postdata( $post ); ?>	

          <div class="col-md-6 col-lg-4">

            <?php get_template_part( 'template-parts/content-archive', get_post_type() ); ?>

          </div>

          <?php
          endforeach; 
          wp_reset_postdata();
      endif;
      ?>

    </div><!-- .row -->

  </div><!-- .container -->

</section>
./sidebar-spots.php