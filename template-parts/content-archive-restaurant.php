<?php
/**
 * Template part pour la page d'accueil
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

 /* annonce variables pour les informations quartier et type des restaurants */
$quartier = get_field_object('quartier');
$category = get_field_object('type_de_restaurant');
?>

<!-- fond de la card des restaurants de la page d'accueil -->
<article class='mb-4 pb-4 border-bottom border-light bg-light'>

  <div class="row">
<!-- liens photos restaurants page d'accueil  et bouton lire la suite, redirection vers la page restaurant-->
    <?php if(has_post_thumbnail()) : ?>
      <div class="col">
          <a class="link-image" href="<?php the_permalink(); ?>" title="<?php _e( 'Lire la suite', 'startheme' ) ?>"><?php the_post_thumbnail('thumb-medium', array('class'=>'img-fluid')); ?></a>
      </div>
    <?php endif; ?>
<!-- fin liens photos restaurants page d'accueil -->

    <div class="entry-archive-content col-lg-7">

<!-- Rends clicable le nom du restaurant pour rediriger vers la page du restaurant -->
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e( 'Lire la suite', 'startheme' ) ?>"><?php the_title(); ?></a></h2>

<!-- tag catégorie et ville de chaque restaurant sur la page d'acceuil -->
      <span class="badge badge-pill badge-primary rounded" title="Catégorie">
           <i class="fa fa-tag"></i>
           <?= $category["value"]; ?>
      </span>
                   
      <span class="badge badge-pill badge-primary rounded" title="Ville">
          <i class="fa fa-map-marker"></i>
          <?= $quartier["value"]; ?>
      </span>


      
      <?php the_excerpt(); ?>

    </div>

  </div><!-- .row -->

</article>