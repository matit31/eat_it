<?php

/**
 * Template pour afficher le contenu des restaurants dans la page unique resto
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

/* déclaration des variables pour l'affichage des champs informations */
$menu = get_field_object('menu');
$prix = get_field_object('prix');
$quartier = get_field_object('quartier');
$niveau = get_field_object('niveau');
$type = get_field_object('type_de_restaurant');
$adresse = get_field_object('adresse');
$localisation = get_field_object('localisation');


?>

<article <?php post_class(); ?>>
<!-- affichage de l'image commune dans le header avec le lien url de l'image -->
<header class="entry-header main-header py-5" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">

    <div class="container">
<!-- affichage du titre de la section par dessus l'image -->
      <h1 class="page-title entry-title"><?php the_title(); ?></h1>

    </div>

  </header>

<!-- fabrication du fond de la section-->
  <div class="spot-content bg-light py-5">

<!--  recadrage de la section-->
    <div class="container">
    <div class="row">

<!-- affichage du contenu pour la section nommée -->
<div class="entry-content col-md-8 col-lg-10">
  <?php the_content(); ?>
</div>

<!-- appelle les informations de la note du restaurant -->
 <div class="spot-niveau col">

          <div class="bg-white p-4 text-center">
<!-- affichage du nom de la section -->
            <h3><?= $niveau['label'] ?></h3>

<!-- et appel des étoiles pour afficher le niveau de notation du restaurant -->
            <?php foreach( $niveau['choices'] as $key => $choice ) : ?>
              
<!-- affichage des étoiles grisées pour indiquer le niveau de notation du restaurant sur 6 étoiles -->
              <?php 
              if($key <= $niveau['value']) $img_class = 'level'; 
              else $img_class = 'over-level'; 
              ?>
<!-- lien des images servant à la notation du restaurant -->
              <img src="<?= get_template_directory_uri(); ?>/dist/images/planche-1.svg" alt="<?= $choice ?>" title="<?= $choice ?>" class="planche <?= $img_class ?>">

            <?php endforeach; ?> <!-- fin de la boucle -->

          </div>

  </div>

</div><!-- .row -->

</div><!-- .container -->

</div><!-- .restaurant-content -->


<!-- début de l'affichage des contenus Restaurants ACF -->
<div class="spot-acf container">
<div>
				<article>
        
        <div class="entry-content">
          <!-- titre de la section affichée -->
        <h2>Menus</h2>

						<?php 
						/*
						*  Query posts for a relationship value.
						*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
            */

/* Boucle des menus à afficher correspondant à chaque catégorie de restaurant */
						$plats = get_posts(array(
							'post_type' => 'plat', // Nom du poste à afficher
							'post_per_page' => -1, // affiche plusieurs plats
							'meta_query' => array(
								array(
									'key' => 'restaurant', // nom du contenu ACF
									'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                  'compare' => 'LIKE'
                  
                ),
							),
						));
            ?>
            
            <?php 
						/*
						*  Query posts for a relationship value.
						*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
						*/

						$prix = get_posts(array(
							'post_type' => 'prix',
							'post_per_page' => -1,/* affiche tous les prix */
							'meta_query' => array(
								array(
									'key' => 'prix', // nom du champs ACF
									'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                  'compare' => 'LIKE'
                  
                ),
							),
						));

						?>
          
         

<!-- caroussel des menus -->
<section class="sidebar-lastnews py-5">
            <div id="carouselExampleIndicators2" class="carousel-news owl-carousel px-sm-4 mt-4 mt-sm-4 carousel slide" data-ride="carousel">
  <?php if( $plats ): ?>

<!-- contenu du caroussel pour les menus à afficher dans les restaurants dédiés -->
    <?php foreach( $plats as $plat ): ?>
      <div class="carousel-inner">
         <div class="carousel-item active">
           <div class="card bg-light border-primary " >
            <div class="card-header">          
              <h3 class="entry-title"> <?php echo get_the_title( $plat->ID ); ?></h3>
            </div>
          
          <div class="card-body">
<!-- contenu du menu -->                                                     
               <?php echo get_the_content( null,false,$plat->ID ); ?>     
               
<!-- si image chargement de l'image-->     
             <?php echo get_the_post_thumbnail($plat); ?>            
           </div>

<!-- affichage du bouton commander et boucle pour affichage sur toutes les fins de menu -->
           <div class="card-footer text-muted text-center">    
            <a href="#" class="btn btn-outline-primary"><?php _e('Commander', 'startheme'); ?></a>
           </div>                               
        </div>
    </div>
  </div>
                      
     <?php endforeach; ?>
     </ul>
   <?php endif; ?>
   

   </div>
                          
</div>

</section>
              

  <div class="spot-acces my-5">

   <h2><?= $acces['label'] ?></h2>

   <div class="row no-gutters">

<!-- affichage de l'image carte et de la valeur du champs -->
    <div class="col-lg-6">
        <?= $localisation['value']; ?>
         <?php if( $carte ) : ?>
            <img src="<?php echo esc_url($carte['sizes']['thumb-medium']); ?>" alt="<?php echo esc_attr($carte['alt']); ?>" class="img-fluid" />
          <?php endif; ?>
    </div>

<div class="col-lg-6 bg-light p-4">

<!-- appelle la localisation du restaurant avec le nom et la valeur correspondante-->
        <div class="spot-infos my-5">
         <h2><?= $adresse['label']; ?></h2>
          <?= $adresse['value']; ?>
         </div>

<!-- appelle le quartier du restaurant avec le nom et la valeur correspondante-->
    <div class="spot-infos my-5">
      <h2><?= $quartier['label']; ?></h2>
      <?= $quartier['value']; ?>
    </div>
</div>


  </div>

  </div>

  </div><!-- .restaurant-acf -->

</article>

