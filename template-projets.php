<?php
/* Template Name: accueil */

// Inclure l'en-tête WordPress
get_header();

// Vérifier si un filtre est sélectionné
$tax_query = array();
if (!empty($_GET['filtre_technologie'])) {
    $tax_query = array(
        array(
            'taxonomy' => 'technologies', // Remplacez par le nom de votre taxonomie
            'field' => 'slug',
            'terms' => sanitize_text_field($_GET['filtre_technologie']),
        ),
    );
}

// Paramètres de la requête pour récupérer les projets triés par date ACF (champ "date")
$args = array(
    'post_type' => 'projets', // Type de contenu personnalisé
    'orderby' => 'meta_value', // Trier par la valeur d'un champ personnalisé
    'order' => 'DESC', // Trier par ordre décroissant (les plus récents en haut)
    'meta_key' => 'date', // Nom du champ ACF "date"
    'meta_type' => 'DATE', // Spécifie que le champ "date" est de type DATE
    'tax_query' => $tax_query, // Ajout de la requête pour filtrer par taxonomie
);

// Créer une nouvelle instance de WP_Query
$the_query = new WP_Query($args);

// Vérifier s'il y a des résultats
if ($the_query->have_posts()) :
?>
<?php
// Démarrer la session
session_start();

// Vérifier si le formulaire a été envoyé
if (isset($_SESSION['contact_form_sent']) && $_SESSION['contact_form_sent']) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            alert("Votre message a bien été envoyé. Merci de nous avoir contactés !");
        });
    </script>';
    // Réinitialiser la variable pour éviter le pop-up à nouveau
    unset($_SESSION['contact_form_sent']);
}
?>
<div class="intro">
  <p class="intro-text">
    Bienvenue sur mon portfolio ! Moi, c’est Maugan Robert, 
    <span class="underline-violet">designer graphique</span>. Explorez mes projets et découvrez mon univers créatif.
  </p>
</div>

<!-- Formulaire de filtrage -->
<div class="projets-filtre">
  <form method="GET" id="filtre-projets">
    <?php
    // Obtenez toutes les taxonomies de la taxonomie "technologies"
    $terms = get_terms(array(
        'taxonomy' => 'technologies',
        'hide_empty' => true, // N'affiche que les taxonomies utilisées
    ));

    if (!empty($terms) && !is_wp_error($terms)) :
        echo '<select name="filtre_technologie" onchange="this.form.submit()">';
        echo '<option value="">Filtrer</option>';
        foreach ($terms as $term) {
            $selected = '';
            if (isset($_GET['filtre_technologie']) && $_GET['filtre_technologie'] === $term->slug) {
                $selected = 'selected';
            }
            echo '<option value="' . esc_attr($term->slug) . '" ' . $selected . '>' . esc_html($term->name) . '</option>';
        }
        echo '</select>';
    endif;
    ?>
  </form>
</div>

<!-- Ajout des styles -->
<style>
.projets-filtre {
    margin-bottom: 20px;
}
.projets-filtre select {
    padding: 10px;
    font-size: 16px;
}
</style>

<div class="tous-les-projets">
  <div class="projets-container">
    <?php
    // Boucle pour afficher les projets
    while ($the_query->have_posts()) : $the_query->the_post();
    ?>
        <a href="<?php the_permalink(); ?>" class="projet-link">
            <article class="projet-card">
                <?php
                // Affichage de l'image depuis ACF
                $miniature = get_field('miniature');
                if ($miniature) {
                    echo '<div class="projet-image-container">';
                    echo '<img src="' . esc_url($miniature['url']) . '" alt="' . esc_attr($miniature['alt']) . '" class="projet-image">';
                    echo '</div>';
                }
                ?>
                <h1 class="projet-title"><?php the_title(); ?></h1>
            </article>
        </a>
    <?php
    endwhile;
    ?>
  </div>
</div>
<?php
// Réinitialiser la boucle WordPress après WP_Query
wp_reset_postdata();
else :
?>
<p>Aucun projet n'a été trouvé.</p>
<?php
endif;
?>
<div class="mes-services">
  <h2 class="title-services">Mes services : </h2>
  <div class="all-services">
  <div class="services-part">
    <h3 class="title-part">Identité Visuelle</h3>
    <p class="name-services">Logos</p>
    <p class="name-services">Charte graphique</p>
    <p class="name-services">Typographies & couleurs</p>
    <p class="name-services">Supports visuels</p>
  </div>
  <div class="services-part">
    <h3 class="title-part">Print</h3>
    <p class="name-services">Affiches</p>
    <p class="name-services">Magazines</p>
    <p class="name-services">Cartes de visite</p>
    <p class="name-services">Brochures</p>
  </div>
  <div class="services-part">
    <h3 class="title-part">UI/UX Design</h3>
    <p class="name-services">Design d’interfaces</p>
    <p class="name-services">Maquettes web</p>
    <p class="name-services">Sites web</p>
  </div>
  <div class="services-part">
    <h3 class="title-part">Com' & Multimédia</h3>
    <p class="name-services">Illustrations</p>
    <p class="name-services">Animation & motion design</p>
    <p class="name-services">Montage vidéo</p>
    <p class="name-services">Visuels marketing</p>
  </div>
  </div>
  <a href="/portfolio.mauganrobert.fr/contact" class="button-services">TRAVAILLER AVEC MOI</a>
  </div>


<?php
// Inclure le pied de page WordPress
get_footer();
?>
