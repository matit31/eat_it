<?php

/**
 * Template pour afficher le contenu des restaurants dans la page unique resto
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

/* aller chercher tout ce qu'il y a dans le champs informations */
$menu1 = get_field_object('menu_1');
$menu2 = get_field_object('menu_2');
$quartier = get_field_object('quartier');
$niveau = get_field_object('niveau');
$type = get_field_object('type_de_restaurant');
$adresse = get_field_object('adresse');
$localisation = get_field_object('localisation');


?>

<article <?php post_class(); ?>>

<header class="entry-header main-header py-5" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">

    <div class="container">
      
      <h1 class="page-title entry-title"><?php the_title(); ?></h1>

    </div>

  </header>
<!-- fabrication du fond -->
  <div class="spot-content bg-light py-5">
   <!--  recadrage -->
    <div class="container">
    <div class="row">
   
<div class="entry-content col-md-8 col-lg-10">
  <?php the_content(); ?>
</div>


 <!-- appelle les informations de la note du restaurant -->
 <div class="spot-niveau col">

          <div class="bg-white p-4 text-center">

            <h3><?= $niveau['label'] ?></h3>

            <?php foreach( $niveau['choices'] as $key => $choice ) : ?>

              <?php 
              if($key <= $niveau['value']) $img_class = 'level'; 
              else $img_class = 'over-level'; 
              ?>

              <img src="<?= get_template_directory_uri(); ?>/dist/images/planche-1.svg" alt="<?= $choice ?>" title="<?= $choice ?>" class="planche <?= $img_class ?>">

            <?php endforeach; ?>

          </div>

  </div>

</div><!-- .row -->

</div><!-- .container -->

</div><!-- .restaurant-content -->


<div class="spot-acf container">

<div class="spot-infos my-5">
  <!-- appelle  le type de cuisine du restaurant-->
  <h2><?= $type['label']; ?></h2>
      <?= $type['value']; ?>
    </div>

    
<div class="spot-infos my-5 ">
 
 <!-- appelle les menus du restaurant -->
  <h2>Menu</h2>


  <div class="row">
    <div class="col-6"><?= $menu1['value']; ?><button type="button" class="btn btn-outline-primary waves-effect">Commander</button>
</div>
    
    <div class="col-6"><?= $menu2['value']; ?><button type="button" class="btn btn-outline-primary waves-effect">Commander</button>
</div>
  </div>

      
      
    
    </div>
    



    <div class="spot-acces my-5">

      <h2><?= $acces['label'] ?></h2>

      <div class="row no-gutters">

        <div class="col-lg-6">
        <?= $localisation['value']; ?>
          <!-- affiche la carte et en appelant la variable en haut du formulaire -->
         <!--  <?php if( $carte ) : ?>
            <img src="<?php echo esc_url($carte['sizes']['thumb-medium']); ?>" alt="<?php echo esc_attr($carte['alt']); ?>" class="img-fluid" />
          <?php endif; ?> -->
        </div>

        <div class="col-lg-6 bg-light p-4">

        <div class="spot-infos my-5">
  <!-- appelle la localisation du restaurant-->
  <h2><?= $adresse['label']; ?></h2>
      <?= $adresse['value']; ?>
    </div>
    <div class="spot-infos my-5">
  <!-- appelle le quartier du restaurant-->
  <h2><?= $quartier['label']; ?></h2>
      <?= $quartier['value']; ?>
    </div>

        </div>

      </div>

    </div>

  </div><!-- .restaurant-acf -->

</article>

