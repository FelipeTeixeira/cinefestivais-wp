<?php
    $tags = wp_get_post_tags($post->ID);
    if ($tags) 
    {
        $tag_ids = array();
        foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
        $args = array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'showposts' => 4,
            'caller_get_posts' => 1
        );
        $my_query = new wp_query($args);
        if ($my_query->have_posts()) 
        {

?>

        <section class="content">
            
            <h2 class="content-title">
                Siga no Cine Festivais
            </h2>
            <ul class="container-card">
<?php 
            while ($my_query->have_posts()) 
            {
                $my_query->the_post();
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

                                    if (!categoryDefault($slug, true))
                                    {  
                                        echo '<span class="card-label__text">'. esc_attr( $name) .'</span>';
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
<?php       
            } 
?>          </ul>
        </section>
<?php 
        }
    }
?>