<?php 
    $argsDestaques = array( 'category_name' => 'destaques', 'posts_per_page' => 5);
    query_posts($argsDestaques);
?>  

<section class="content">
    <h2 class="content-title">
        Destaques
    </h2>
    
    <?php                    
        if ( have_posts() ) : while ( have_posts() ) : the_post(); 
    ?>                
        <div class="card" href="<?php the_permalink(); ?>">
            <?php
                the_post_thumbnail( 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'is-tablet' ) ); 
            ?> 
            <?php if( get_field('image_mobile') ): ?>
                <img src="<?php the_field('image_mobile'); ?>" class="is-mobile"/>
            <?php endif; ?>
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
                <?php the_title(); ?>
            </p>
        </div>
    <?php 
        endwhile; 
        endif; 
    ?>                
    
</section>