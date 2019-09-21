<?php
    global $pageClass;
    $pageClass = "searchPg";
    get_header();

    if (have_posts()) :
?>
  
    <section class="content">
        <h1 class="content-title p-margin-bottom-24">
            <?php single_tag_title(); ?>
        </h1>

        <?php
            $tag = get_query_var('tag'); 

            echo do_shortcode('		[ajax_load_more 
                                    seo="true"
									transition_container="false"
									posts_per_page="4" 
									transition="fade" 
									scroll="false" 
                                    button_label="Ver mais" 
                                    tag="'.$tag.'"]' ); 
		?>

    </section>    
  
<?php
    else :
        // TEMPLATE ERROR
        require_once('templates/error.php');

    endif;

    get_footer(); 
?>
