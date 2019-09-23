<?php 
    $argsNews = array( 'category_name' => 'noticias', 'posts_per_page' => 4 );
    query_posts($argsNews);
    $page_news	= esc_url( home_url( '/' ) )."noticias";
?>  

<section class="content">
    <h2 class="content-title">
        Notícias
    </h2>

    <?php
		$ignoreCategory = 'noticias';
    ?>    
    
    <ul class="container-card newsPg">
        <?php
            while (have_posts()) : the_post();
            $indexNoticies++;
        ?>

        <?php 
            if ($indexNoticies === 1 || $indexNoticies === 2) 
            {
        ?>
            <li class="card list-<?= $indexNoticies ?>">
                <a href="<?php the_permalink() ?>">
                    <?php 
                        the_post_thumbnail('medium', array('title' => get_the_title(), 'alt' => get_the_title() ) ); 
                    ?> 

                    <div class="card-info">
                        <div class="card-label">
                            <?php
                                $categories = get_the_category();
                                foreach( $categories as $category) 
                                {
                                    $name = $category->name;
                                    $slug = $category->slug;
                                    $category_link = get_category_link( $category->term_id );

                                    if (categoryDefault($slug))    
                                    {
                                        echo '<span class="card-label__text white">'. esc_attr( $name) .'</span>';
                                    }
                                }
                            ?>
                        </div>
                    
                        <h2 class="card-title">
                            <?php the_title(); ?>
                        </h2>

                        <time class="card-time">
                            <?= get_the_date('d/m/y'); ?>
                            |
                            <?= the_time('H:i'); ?>
                        </time>
                    </div>
                </a>
            </li>
        <?php 
            } 
            else 
            {
        ?>
            <ul class="noticesSmallContainer">
                <li class="card card-noticesSmall">
                    <a href="<?php the_permalink() ?>">
                        <div class="card-info">
                            <div class="card-label">
                                <?php
                                    $categories = get_the_category();
                                    foreach( $categories as $category) 
                                    {
                                        $name = $category->name;
                                        $slug = $category->slug;
                                        $category_link = get_category_link( $category->term_id );

                                        if (categoryDefault($slug))    
                                        {
                                            echo '<span class="card-label__text white">'. esc_attr( $name) .'</span>';
                                        }
                                    }
                                ?>
                            </div>
                        
                            <h2 class="card-title">
                                <?php the_title(); ?>
                            </h2>

                            <time class="card-time">
                                <?= get_the_date('d/m/y'); ?>
                                |
                                <?= the_time('H:i'); ?>
                            </time>
                        </div>
                    </a>
                </li>
            </ul>
        <?php 
            }
            endwhile;   
        ?>
    </ul>

    <a href="<?= $page_news ?>" class="btn btn-primary btn-centerPage p-margin-bottom-32">
        Ver Todas
    </a>

</section>