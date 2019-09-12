<?php 
    $argsDestaques = array( 'category_name' => 'especiais', 'posts_per_page' => 2);
    query_posts($argsDestaques);	
?>  
<section class="content full articles">

    <?php                    
        if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        $count++;
        $first_name = get_the_author_meta('first_name');
	    $last_name = get_the_author_meta('last_name');
    ?>  

        <a href="<?php the_permalink(); ?>" class="article <?php echo ($count === 1) ? "bg-grey" : "bg-blue"; ?>">
            <?php
                the_post_thumbnail( 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'is-tablet' ) ); 
            ?> 
            <?php if( get_field('image_mobile') ): ?>
                <img src="<?php the_field('image_mobile'); ?>" class="is-mobile"/>
            <?php endif; ?>
            <div class="article-body">
                <h3 class="article-body__title">
                    <?php 
                        $categories = get_the_category();
                        foreach( $categories as $category) 
                        {
                            $name = $category->name;
                            $slug = $category->slug;                                     

                            if ($slug !== 'especiais') 
                            {
                                echo esc_attr( $name);                    
                            }
                        }
                    ?>
                </h3>
                <h4 class="article-body__subtitle">
                    <?php the_title(); ?>
                </h4>

                <p class="article-body__text">
                    <?php 
                        the_excerpt(); 
                    ?>
                </p>
                <p class="article-body__author">
                    Por
                    <?= $first_name ?>
				<?= $last_name ?>
                </p>
            </div>
        </a>
    <?php 
        endwhile; 
        endif; 
    ?>    
</section>