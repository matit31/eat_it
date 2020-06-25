<?php
/**
 * The template for displaying archive pages
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */

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

  <?php if (have_posts()) : ?>

    <section class="archive-section">

      <header class="entry-header main-header py-5">

        <div class="container">

<!-- affichage du titre des archives -->
          <h1 class="page-title"><?php the_archive_title(); ?></h1>

        </div>

      </header>

      <div class="container py-5">

        <div class="row no-gutters mb-4">

<!-- affichage des contenus pour créer des posts -->
          <?php while (have_posts()) : the_post(); ?>

            <div class="col-md-6 col-lg-4">

<!-- appel des éléménts dans le template part 'content-archive-restaurant' et 'content' -->
              <?php get_template_part( 'template-parts/content-archive-restaurant', get_post_type() ); ?>

            </div>

          <?php endwhile; ?>

        </div><!-- .row -->

        <?php the_posts_pagination(); ?>

      </div><!-- .container -->

    </section>

  <?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>
    
  <?php endif; ?>

</main>

<?php get_footer() ?>