<?php
    require_once('header.php');    
    $args = array( 'category_name' => 'slider', 'posts_per_page' => 5);
    query_posts($args);
?>
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
                    if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                ?>
                    <li>           
                        <div class="teste" href="<?php the_permalink(); ?>">
                            <?php
                                the_post_thumbnail( 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'is-tablet' ) ); 
                            ?> 
                            <?php if( get_field('image_mobile') ): ?>
                                <img src="<?php the_field('image_mobile'); ?>" class="is-mobile"/>
                            <?php endif; ?>

                            <div class="slider-legend">
                                <?php 
                                    $categories = get_the_category();
                                    foreach( $categories as $category) {
                                        $name = $category->name;
                                        $slug = $category->slug;                                     
                                    if ($slug !== 'slider') {
                                ?>
                                    <span class="tag is-active">
                                        <?= esc_attr( $name); ?>
                                    </span>                                    
                                <?php
                                        }
                                    }
                                ?>


                                <h2 class="slider-legend-title">
                                    <?php the_title(); ?>
                                </h2>                                
                                <svg class="icon icon-arrow-down">
                                    <use xlink:href="#icon-arrow-down"></use>
                                </svg>
                            </div>
                            
                        </div>
                    </li>
                    <?php 
                        endwhile; 
                        endif; 
                    ?>                
            </ul>    
        </div>
<?php 
    wp_reset_postdata();    
    get_footer(); 
?>