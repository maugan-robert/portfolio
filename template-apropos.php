<?php
/* Template Name: apropos */

// Inclure l'en-tête WordPress
get_header();
?> 
<div class="apropos">
<div class="intro-apropos">
<img class="img-pp" src="<?php echo get_template_directory_uri(); ?>/PP_portfolio.jpg" alt="Logo">
<h1 class="name-title">Maugan Robert</h1>
</div>
<p class="presentation">Bonjour ! Je m'appelle Maugan Robert, alias naguaM, et j'ai 19 ans. Je suis actuellement étudiant en BUT Métiers du Multimédia et de l'Internet (MMI) à Montbéliard. Passionné par la créativité et l'esthétique, j'ai décidé de me spécialiser dans le design. Ce que j’aime dans le design numérique, c’est la possibilité de toujours créer de nouvelles choses et de laisser libre cours à ma créativité. Mon plaisir, c'est de concevoir des designs minimalistes, épurés et ergonomiques. J’aime quand les choses sont simples, esthétiques et bien pensées.</p>
<div class="tools-section">
    <div class="tools">
    <img class="logo-tools" src="<?php echo get_template_directory_uri(); ?>/photoshop-logo.jpg" alt="Logo">
    <p class="name-tools">Photoshop</p>
    </div>
    <div class="tools">
    <img class="logo-tools" src="<?php echo get_template_directory_uri(); ?>/blender-logo.jpg" alt="Logo">
    <p class="name-tools">Blender</p>
    </div>
    <div class="tools">
    <img class="logo-tools" src="<?php echo get_template_directory_uri(); ?>/illustrator-logo.jpg" alt="Logo">
    <p class="name-tools">Illustrator</p>
    </div>
    <div class="tools">
    <img class="logo-tools" src="<?php echo get_template_directory_uri(); ?>/figma-logo.jpg" alt="Logo">
    <p class="name-tools">Figma</p>
    </div>
    <div class="tools">
    <img class="logo-tools" src="<?php echo get_template_directory_uri(); ?>/indesign-logo.jpg" alt="Logo">
    <p class="name-tools">InDesign</p>
    </div>
    <div class="tools">
    <img class="logo-tools" src="<?php echo get_template_directory_uri(); ?>/notion-logo.jpg" alt="Logo">
    <p class="name-tools">Notion</p>
    </div>
    <div class="tools">
    <img class="logo-tools" src="<?php echo get_template_directory_uri(); ?>/davinci-logo.jpg" alt="Logo">
    <p class="name-tools">DaVinci</p>
    </div>
</div>
<p class="presentation">En dehors de mes études, je m'intéresse aussi à tout ce qui touche à la 3D, au motion design et à la création de contenus. Mon objectif est de maîtriser un large éventail de compétences, car j’adore apprendre de nouvelles choses et ne pas avoir de limites techniques dans mes projets.</p>
<a href="<?php echo site_url('/wp-content/uploads/CV-Maugan-Robert.pdf'); ?>" 
   class="button-cv" 
   download="CV-Maugan-Robert.pdf">
   TÉLÉCHARGER MON CV
</a>
</div>
<?php
get_footer();
?>