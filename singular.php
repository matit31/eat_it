<?php
/**
 * The template file for displaying single posts and pages
 *Affichage des pages par défaut si pas de contenu précisé ni de mise en forme
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

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>

    <?php endwhile; 
        endif; ?>

</main>

<?php get_sidebar('news'); ?>

<?php get_footer() ?>