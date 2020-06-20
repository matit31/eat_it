<?php

/**
 * Template part for displaying page content
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?>>

  <header class="entry-header main-header py-5">

    <div class="container">
       
      <h1 class="page-title entry-title"><?php the_title(); ?></h1>

      <?php if(is_front_page()) : ?>
        <a href="<?= get_post_type_archive_link('spot'); ?>" class="btn btn-outline-light mt-4"><?php _e('Tous les spots', 'startheme'); ?></a>
      <?php endif; ?>

    </div>

  </header>

  <div class="container py-5">

    <div class="row justify-content-center">

      <div class="col-md-8">
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>

      <?php if (is_active_sidebar('sidebar-right')) : ?>
        <div class="col">
          <?php dynamic_sidebar('sidebar-right') ?>
        </div>
      <?php endif; ?>

    </div><!-- .row -->

  </div><!-- .container -->

</article>