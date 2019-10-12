<li class="card">
    <a href="<?php the_permalink() ?>">

        <?php
            the_post_thumbnail('medium_large', array('title' => get_the_title(), 'alt' => get_the_title() ) ); 
        ?> 

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
            echo '<span class="card-label__text label--coberturas">'. esc_attr( $name) .'</span>';
                    } 
                
                if (!categoryDefault($slug, true))    
                    {  
            echo '<span class="card-label__text label--category">'. esc_attr( $name) .'</span>';
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
    </a>
</li>