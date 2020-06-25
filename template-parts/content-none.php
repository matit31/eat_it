<?php
/**
 * Template part la page d'erreur 404
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

?>

<section class="no-results not-found">

  <div class="container py-5">

    <h1 class="page-title entry-title"><?php _e('Oups! Aucun résultat trouvé!', 'startheme') ?></h1>

    <div class="entry-content">  
      <p><?php _e( 'Il semble que nous ne trouvions pas ce que vous recherchez. Aidez vous de la barre de recherche.', 'startheme' ); ?></p>
      <?php get_search_form(); ?>   
    </div>

  </div><!-- .container -->

</section>