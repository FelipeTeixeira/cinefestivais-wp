<?php
    require_once('header.php');
    include 'templates/home/slider.php';
    include 'templates/home/destaques.php';
    include 'templates/home/especiais.php';
    include 'templates/home/noticias.php';
    include 'templates/newsletter.php';

    wp_reset_postdata();    
    get_footer(); 
?>