<?php
add_theme_support('post-thumbnails');
// REMOVER VERSÃO DO WORDPRESS
function change_footer_version()
{
  return '';
}
add_filter('update_footer', 'change_footer_version', 9999);


// ALTERAR TEXTO "OBG POR CRIAR WORDPRESS"
function remove_footer_admin()
{
  echo 'Administrador - Artigo19';
}
add_filter('admin_footer_text', 'remove_footer_admin');


// REMOVE TOOLBAR
add_filter('show_admin_bar', '__return_false');


// REMOVE METATAG GENERETOR
remove_action('wp_head', 'wp_generator');

// REMOVE OPÇÕES DE TELA
function wpmidia_remove_screen_options()
{
  return false;
}

add_filter('screen_options_show_screen', 'wpmidia_remove_screen_options');


add_filter('sanitize_file_name', 'sa_sanitize_spanish_chars', 10);
function sa_sanitize_spanish_chars($filename)
{
  return remove_accents($filename);
}
