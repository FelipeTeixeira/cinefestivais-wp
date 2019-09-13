<ul class="coberturas">
    <?php
        $categories = get_categories(array(
            'taxonomy'   => 'category',
            'orderby'    => 'name',
            'parent'     => 0,
            'exclude'    => ignoreCategories(),
            'hide_empty' => 0, // change to 1 to hide categores not having a single post
        ));

        foreach  ($categories as $category) {
        $category_link = get_category_link($category->cat_ID);
    ?>
        <li class="cobertura">
            <a href="<?= esc_url($category_link) ?>" class="cobertura-legend">
                <?php if( get_field('image_poster', $category) ): ?>
                    <img src="<?php the_field('image_poster', $category); ?>" alt="<?= $category->name ?>"/>
                <?php endif; ?>
                <strong class="cobertura-name">
                    <?= $category->name ?>  
                </strong>
            </a>
        </li>
    <?php	
        }
    ?>
</ul>