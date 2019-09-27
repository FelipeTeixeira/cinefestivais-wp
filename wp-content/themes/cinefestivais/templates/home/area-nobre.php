<?php 
    $argsDestaques = array( 'category_name' => 'area-nobre', 'posts_per_page' => 2);
    query_posts($argsDestaques);	
?>  
<section class="nobleArea-container">

    <?php                    
        if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        $count++;
        $first_name = get_the_author_meta('first_name');
        $last_name = get_the_author_meta('last_name');
    ?>  
        <div class="nobleArea">
            <?php
                the_post_thumbnail( 'full', array('title' => get_the_title(), 'alt' => get_the_title() ) ); 
            ?> 
            <div class="nobleArea-bg">
                <h3 class="nobleArea-categoryName">
                    <?php 
                        $categories = get_the_category();
                        foreach( $categories as $category) 
                        {
                            $name = $category->name;
                            $slug = $category->slug;                                     

                            if (categoryDefault($slug))    
                            {
                                echo esc_attr( $name);                    
                            }
                        }
                    ?>
                </h3>
                <h4 class="nobleArea-title">
                    <?php the_title(); ?>
                </h4>
                
                <a href="<?php the_permalink() ?>" class="nobleArea-bgRed">
                    <span class="nobleArea-bgRed-author">
                        Por
                        <?= $first_name ?>
                        <?= $last_name ?>
                    </span>
                    <p class="nobleArea-bgRed-text">
                        <?= get_the_excerpt(); ?>
                    </p>
                    <strong class="nobleArea-bgRed-readMore">
                        Leia Mais
                    </strong>
                </a>
            </div>
        </div>
    <?php 
        endwhile; 
        endif; 
    ?>    
</section>