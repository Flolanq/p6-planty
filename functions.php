<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'font-awesome','simple-line-icons','oceanwp-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

function add_admin_link_to_menu($items, $args) {
    $user=is_user_logged_in();
if ($user=true):
    $admin_url=admin_url(); // Récupère l'url de l'interface d'administration du projet (exemple : "http://planty.local/wp-admin/") à l'aide d'une fonction wordpress et la stoque dans la variable $admin_url
    $admin_link='<li><a href="'.esc_url($admin_url).'">Admin</a> </li>'; // Crée le lien HTML vers l'interface d'administration à partir de l'url récupérée juste avant. // esc_url est une fonction wordpress pour "nettoyer" l'url afin de retirer les caractères spéciaux qui pourraient poser problème
    $items_array=explode('</li>',$items); // Convertit les éléments du menu (qui étaient sous la forme d'une chaine de caractère) en un tableau pour faciliter la manipulation
    array_splice($items_array,1,0,$admin_link); // Insère le lien vers l'interface d'administration que nous avons construit précédemment en deuxième position du tableau
    $items=implode('</li>', $items_array); // Reconvertit le tableau en chaîne de caractères
    return $items; // Permet à la fonction que nous venons de créer de renvoyer le menu modifié (avec le lien que nous avons ajouté)
endif;
}
add_filter('wp_nav_menu_items','add_admin_link_to_menu',10,2); // Ajoute le filtre pour exécuter la fonction "add_admin_link_to_menu" dans le hook "wp_nav_menu_items" // 10 = priorité (par défaut), 2 = nombre d'arguments passés à la fonction (add_admin_link_to_menu)

