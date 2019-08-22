<?php
    require_once('header.php');

    $posts = get_posts(array(
        'posts_per_page'	=> -1,
        'post_type'			=> 'post',
        'meta_key'		=> 'tipo_de_visualizacao',
        'meta_value'	=> 'slider'
    ));

    if( $posts ): ?>
        <div class="slider-container">
            <ul class="controls" id="customize-controls" aria-label="Carousel Navigation" tabindex="0">
                <li class="prev" data-controls="prev" aria-controls="customize" tabindex="-1">
                    <svg class="icon icon-left">
                        <use xlink:href="#icon-left"></use>
                    </svg>
                </li>
                <li class="next" data-controls="next" aria-controls="customize" tabindex="-1">
                    <svg class="icon icon-right">
                        <use xlink:href="#icon-right"></use>
                    </svg>
                </li>
            </ul>

            <ul class="carousel">
                <?php 
                    foreach( $posts as $post ): 
                    setup_postdata( $post );
                ?>
                    <li>           
                        <div class="teste" href="<?php the_permalink(); ?>">
                            <?php
                                the_post_thumbnail( 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'is-tablet' ) ); 
                            ?> 
                            <?php if( get_field('image_mobile') ): ?>
                                <img src="<?php the_field('image_mobile'); ?>" class="is-mobile"/>
                            <?php endif; ?>

                            <?php //the_title(); ?>           
                        </div>
                    </li>
                <?php 
                    endforeach; 
                ?>
            </ul>    
        </div>
    <?php 
            wp_reset_postdata(); 
    endif;
    get_footer(); 
?>