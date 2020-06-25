<?php
/**
 * The template pour l'affichage de la page d'erreur 404
 *
 * ...
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */

get_header();
?>

<main>
<!-- affiche le contenu de la page content -->
  <?php get_template_part( 'template-parts/content', 'none' ); ?>

</main>

<?php get_footer() ?>