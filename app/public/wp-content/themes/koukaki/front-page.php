<?php

get_header();
?>

    <main id="primary" class="site-main">
        <section class="banner">
            <video width="1440px" height="806px" preload="auto" loop class="videocats" autoplay muted poster="<?php echo get_template_directory_uri(); ?>/assets/images/banner.png">
                <source type="video/mp4" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/studio-koukaki.mp4"> 
                Votre navigateur ne supporte pas la vidéo MP4 
            </video>
            <img data-0="bottom: 0% ; scale:1; left:55%;" data-400="bottom: -25%; scale:0.5; left:40%;" src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>" alt="logo Fleurs d'oranger & chats errants">
        </section>

        <section id="story" class="story">
            <h2>L'histoire</h2>
            <article id="" class="story__article">
                <p><?php echo get_theme_mod('story'); ?></p>
            </article>

            <?php get_template_part( 'template-parts/carrousel' ); ?>

            <article id="place">
                <div>
                    <h3>Le Lieu</h3>
                    <img class="petit_nuage" alt="petit nuage" data-1700="transform:translateX(0px);" data-2300="transform:translateX(-380px);">
                    <img class="gros_nuage" alt="gros nuage" data-1700="transform:translateX(0px);" data-2300="transform:translateX(-680px);">
                    <p><?php echo get_theme_mod('place'); ?></p>
                </div>

            </article>
        </section>


        <section id="studio">
            <h2>Studio Koukaki</h2>
            <div>
                <p>Acteur majeur de l’animation, Koukaki est un studio intégré fondé en 2012 qui créé, produit et distribue des programmes originaux dans plus de 190 pays pour les enfants et les adultes. Nous avons deux sections en activité : le long métrage et le court métrage. Nous développons des films fantastiques, principalement autour de la culture de notre pays natal, le Japon.</p>
                <p>Avec une créativité et une capacité d’innovation mondialement reconnues, une expertise éditoriale et commerciale à la pointe de son industrie, le Studio Koukaki se positionne comme un acteur incontournable dans un marché en forte croissance. Koukaki construit chaque année de véritables succès et capitalise sur de puissantes marques historiques. Cette année, il vous présente “Fleurs d’oranger et chats errants”.</p>
            </div>
            </section>

            <?php get_template_part( 'template-parts/oscar' ); ?>

    </main><!-- #main -->


<?php
get_footer();
