<?php 
    $argsDestaques = array( 'category_name' => 'noticias', 'posts_per_page' => 6);
    query_posts($argsDestaques);
?>  

<section class="content news">
    <h2 class="content-title">
        Notícias
    </h2>
    <div class="news-left">
        <?php                    
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            // TO DO
            // fazer funcao para imagem mobile destkop
            // fazer funcao para listar categorias
        ?>                
            <a class="new" href="<?php the_permalink(); ?>">
                <div class="new-picture">
                    <?php
                        the_post_thumbnail( 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'is-tablet' ) ); 
                    ?> 
                    <?php if( get_field('image_mobile') ): ?>
                        <img src="<?php the_field('image_mobile'); ?>" class="is-mobile"/>
                    <?php endif; ?>
                </div>
                <div class="new-content">
                    <?php 
                        $categories = get_the_category();
                        foreach( $categories as $category) {
                            $name = $category->name;
                            $slug = $category->slug;                                     
                        if ($slug !== 'noticias') {
                    ?>
                        <span class="tag">
                            <?= esc_attr( $name); ?>
                        </span>                                    
                    <?php
                            }
                        }
                    ?>
                    <h4 class="new-title">
                        <?php the_title(); ?>
                    </h4>
                    <time class="new-datetime">
                        <?= get_the_date('d/m/y'); ?>
                        |
                        <?= the_time('H:i'); ?>
                    </time>
                </div>            
            </a>
        <?php 
            endwhile; 
            endif; 
        ?>
    </div>
    
</section>