<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fleurs_d\'oranger_&_Chats_errants
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'foce' ); ?></a>

	<header id="masthead" class="site-header">

        <nav class="navMenu">

            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

            <div class="burgerMenu">
                <i class="fa-solid fa-bars"></i>
            </div>

        </nav>

		<div class="burger-menu">

        <img class="logo-menu" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-koukaki.png" alt="Logo koukaki">

        <div class="decor">
            <img class="orchid-menu" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/orchid.png" alt="Orchidée">
            <img class="sunflower-menu" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Sunflower.png" alt="Sunflower">
            <img class="flower-menu" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/flower.png" alt="flower">
            <img class="hibiscus-menu" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Hibiscus.png" alt="Hibiscus">
            <img class="randomflower-menu" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/randomflower.png" alt="Random flower">
            <img class="orenjiiro-menu" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Orenjiiro.png" alt="Orenjiiro">
            <img class="kawaneko-menu" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Kawaneko.png" alt="Kawaneko">
            <img class="jaakuna-menu" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Jaakuna.png" alt="Jaakuna">
        </div>
            
            <ul>
                <li><a href="#story">Histoire</a></li>
                <li><a href="#characters">Personnages</a></li>
                <li><a href="#place">Lieu</a></li>
                <li><a href="#studio">Studio Koukaki</a></li>
            </ul>

            <a href="#">STUDIO KOUKAKI</a>
            

		</div><!-- #site-navigation -->

        

	</header><!-- #masthead -->
