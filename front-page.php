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

$frontspots = get_posts( array(
  'numberposts' => 5,
  'post_type' => 'spot',
  'orderby' => 'rand',
));

$frontfocus = get_posts( array(
  'posts_per_page' => 1,
  'post__in' => get_option( 'sticky_posts' ),
  'ignore_sticky_posts' => 1
));

get_header();
?>

<main>

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

  <div class="text-center my-5">
    <a href="<?= get_post_type_archive_link('spot'); ?>" class="btn btn-outline-primary"><?php _e('Tous les spots', 'startheme'); ?></a>
  </div>

</section><!-- .front-spots -->

<section class="sticky-post container my-5 py-5">

  <?php 
  if ( $frontfocus ) : 
    foreach ( $frontfocus as $post ) :
      setup_postdata( $post ); ?>	

      <?php get_template_part( 'template-parts/content-focus' ); ?>

      <?php
      endforeach; 
      wp_reset_postdata();
  endif;
  ?>

</section><!-- .sticky-post -->

<?php get_sidebar('news') ?>

<?php get_footer() ?>