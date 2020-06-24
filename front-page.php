<?php
/**
 * The template file for displaying single posts and pages
 *
 * ...
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */


/* affichage des restaurants aléatoirement sur la page d'accueil */
$frontspots = get_posts( array(
  'numberposts' => 3,
  'post_type' => 'restaurant',
  'orderby' => 'rand',
));

/* affichage de la page restaurant unique */
$frontfocus = get_posts( array(
  'restaurant_per_page' => 3,
  'post__in' => get_option( 'sticky_posts' ),
  'ignore_sticky_posts' => 1
));

get_header();
?>

<main>


<!-- affichage menu choix multiples -->
<form action="<?php echo home_url( '/' ); ?>">
  <!-- Ici on affiche le champ « s »
  mais nous aurions pu également en faire 
  un champ de type hidden avec une valeur vide-->

<!-- suite du formulaire… -->
<div id="quartier-wrapper"> 
<?php
if ( $frontspots ) {
  $args = array( 'genre' => $frontspots );
  echo wp_quartiers_dropdown( $args );
} ?>
</div>
  <button type="submit"class="btn btn-outline-primary">Voir la Sélection</button>
</form>
<!-- affichage menu choix multiples -->

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
 
    <?php endwhile; 
        endif; ?>

</main>

<section class="front-spots container">

  <div class="front-spots_grid">

    <?php 
    if ( $frontspots ) : 
      foreach ( $frontspots as $post ) :
        setup_postdata( $post ); ?>	

        <?php get_template_part( 'template-parts/content-archive', get_post_type() ); ?>

        <?php
        endforeach; 
        wp_reset_postdata();
    endif;
    ?>

  </div><!-- .front-spots_grid -->
  
<!-- lien de la page d'acceuil vers la page restaurant pour afficher toute la liste des restaurants -->
  <div class="text-center my-5">
    <a href="<?= get_post_type_archive_link('restaurant'); ?>" class="btn btn-outline-primary"><?php _e('Tous les restaurants', 'startheme'); ?></a>
  </div>

</section><!-- .front-spots -->



<?php get_sidebar('news'); ?>

<?php get_footer() ?>