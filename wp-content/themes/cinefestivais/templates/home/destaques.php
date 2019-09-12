<?php 
    $argsDestaques = array( 'category_name' => 'destaques', 'posts_per_page' => 6);
    query_posts($argsDestaques);
?>  

<section class="content">
    <h2 class="content-title">
        Destaques
    </h2>
    
    <ul class="container-card">
        <?php                    
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        ?>                
            <li class="card">
                <a href="<?php the_permalink(); ?>">
                    <?php
                        the_post_thumbnail( 'full', array('title' => get_the_title(), 'alt' => get_the_title() ) ); 
                    ?> 
                    <div class="card-label">
                        <?php 
                            $categories = get_the_category();
                            foreach( $categories as $category) {
                                $name = $category->name;
                                $slug = $category->slug;                                     
                            if ($slug !== 'destaques') {
                        ?>
                            <span class="card-label__text">
                                <?= esc_attr( $name); ?>
                            </span>                                    
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <p class="card-text">
                        <?= mb_strimwidth(get_the_title(), 0, 58, '...'); ?>
                    </p>
                </a>
            </li>
        <?php 
            endwhile; 
            endif; 
        ?>       
    </ul>         
    
</section>