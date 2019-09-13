<ul class="container-card">
    <?php
        while (have_posts()) : the_post();
    ?>
    <li class="card">
        <a href="<?php the_permalink() ?>">

            <?php
                the_post_thumbnail('medium', array('title' => get_the_title(), 'alt' => get_the_title() ) ); 
            ?> 

            <div class="card-label">
                <?php
                    $categories = get_the_category();
                    foreach( $categories as $category) 
                    {
                        $name = $category->name;
                        $slug = $category->slug;
                        $category_link = get_category_link( $category->term_id );
                        if (!categoryDefault($slug)) 
                        {
                ?>
                    <span class="card-label__text">
                        <?= esc_attr( $name); ?>
                    </span>
                <?php
                        }
                    }
                ?>
            </div>
            
            <h2 class="card-title">
                <?= mb_strimwidth(get_the_title(), 0, 58, '...'); ?>
            </h2>

            <time class="card-time">
                <?= get_the_date('d/m/y'); ?>
                |
                <?= the_time('H:i'); ?>
            </time>
        </a>
    </li>
    <?php 
        endwhile;
    ?>
</ul>
