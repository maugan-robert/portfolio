<?php
get_header(); // Affiche l'entête du site

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <div class="project-content">
            <div class="project-head">
            <h1 class="project-title"><?php the_title(); ?></h1>
            <!-- Afficher le contenu principal du projet -->
            <div class="project-description">
                <?php the_content(); ?>
            
                <span class="ligne"></span>
            <!-- Afficher la taxonomie 'technologies' -->
            <div class="project-taxonomies">
                <?php
                    // Afficher les termes associés à la taxonomie 'technologies'
                    $technologies = get_the_terms(get_the_ID(), 'technologies'); // Taxonomie 'technologies'
                    if ($technologies && !is_wp_error($technologies)) :
                        $tech_list = array();
                        foreach ($technologies as $technology) {
                            $tech_list[] = $technology->name; // Ajoute le nom de chaque terme dans un tableau
                        }
                        echo '<p class="taxonomies">' . implode(' | ', $tech_list) . '</p>';
                    endif;
                ?>
            </div>
            </div>
            </div>
            <!-- Afficher les images supplémentaires -->
            <div class="project-images">
                <?php 
                    // Récupérer et afficher les images, si elles existent
                    for ($i = 1; $i <= 5; $i++) { // Par exemple, pour 5 images
                        $image = get_field('image-' . $i); // Utilise ACF pour récupérer le champ 'image-1', 'image-2', etc.
                        if ($image) {
                            // Vérifie si l'image existe
                            echo '<div class="project-image">';
                            echo '<img class="img-project" src="' . esc_url($image['url']) . '" alt="Image ' . $i . '">';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>

    <?php endwhile;
endif;

get_footer(); // Affiche le pied de page du site
?>
