<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action('wp_enqueue_scripts', 'koukaki_enqueue_script');

function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

// Déclarer un fichier JS
function koukaki_enqueue_script() {
    wp_enqueue_script( 
        'koukaki-oscar', 
        get_stylesheet_directory_uri() . '/js/scripts-animations.js', 
        array( 'jquery' ), 
        '1.0', 
        true 
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