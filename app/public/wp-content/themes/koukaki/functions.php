<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action('wp_enqueue_scripts', 'koukaki_enqueue_scripts');

function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

// Déclarer les fichiers JS et CSS
function koukaki_enqueue_scripts() {
    // Inclure Skrollr
    wp_enqueue_script( 
        'skrollr', 
        'https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js', 
        array(), // Pas de dépendances
        '0.6.30', // Version de Skrollr
        true // Charger dans le footer
    );

    // Inclure le script d'animations
    wp_enqueue_script( 
        'koukaki-oscar', 
        get_stylesheet_directory_uri() . '/js/scripts-animations.js', 
        array( 'jquery', 'skrollr' ), // Dépend de jQuery et Skrollr
        '1.0', 
        true // Charger dans le footer
    );

    // Inclure Swiper avant scripts-animations.js
wp_enqueue_script(
    'swiper', 
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', 
    array(), // Pas de dépendances
    '11.0.0', // Version de Swiper
    true // Charger dans le footer
);

// Inclure le script d'animations qui dépend de Swiper
wp_enqueue_script( 
    'koukaki-oscar', 
    get_stylesheet_directory_uri() . '/js/scripts-animations.js', 
    array( 'jquery', 'swiper' ), // Dépend de jQuery et Swiper
    '1.0', 
    true // Charger dans le footer
);

}

// Get customizer options form parent theme
if ( get_stylesheet() !== get_template() ) {
    add_filter( 'pre_update_option_theme_mods_' . get_stylesheet(), function ( $value, $old_value ) {
        update_option( 'theme_mods_' . get_template(), $value );
        return $old_value; // prevent update to child theme mods
    }, 10, 2 );
    add_filter( 'pre_option_theme_mods_' . get_stylesheet(), function ( $default ) {
        return get_option( 'theme_mods_' . get_template(), $default );
    } );
}
