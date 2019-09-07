<?php
	
	$body 	 	 = "header-active-main";
	$header  	 = "header-active";
	$quem_somos	 = "quem-somos";

	require_once('header.php');

    if( have_posts() ) 
    {

    $author_id = get_the_author_meta('ID');
	$user = 'user_'. $author_id;
    $image_user = get_field('user_photo', $user);
    
    // User
    $first_name = get_the_author_meta('first_name');
	$last_name = get_the_author_meta('last_name');
	$user_email = get_the_author_meta('user_email');
?>


<section class="author author-info">
    <?php 
        if( $image_user ) 
        {
            echo wp_get_attachment_image( $image_user, $size, "", ["class" => "profile-photo"] );
        }
    ?>
    
    <div class="author-info--column">
        <h1 class="author-title">
            <?= $first_name ?>
			<?= $last_name ?>
        </h1>
        <p class="author-text">
            <?= get_the_author_meta('description') ?>
        </p>
        

        <div class="author-contact">
            <span>
                <svg class="icon icon-envelope">
                    <use xlink:href="#icon-envelope"></use>
                </svg>
                <?= $user_email ?>
            </span>
            <?php
				$facebook = get_field('user_facebook', $user);
				$twitter = get_field('user_twitter', $user);
			?>
			<?php if( $facebook ): ?>
				<span>
					<svg class="icon icon-facebook">
						<use xlink:href="#icon-facebook"></use>
					</svg>
					/<?= $facebook ?>
				</span>
			<?php endif; ?>	

			<?php if( $twitter ): ?>
				<span>
					<svg class="icon icon-twitter">
						<use xlink:href="#icon-twitter"></use>
					</svg>
					@<?= $twitter ?>
				</span>
			<?php endif; ?>
        </div>
    </div>
</section>


<section class="content">
    <h2 class="content-title">
        Textos Publicados
    </h2>

    <ul class="container-card">
        <?php
            while (have_posts()) : the_post();
        ?>

        <li class="card">
            <a href="<?php the_permalink() ?>">

                <?php
                    the_post_thumbnail('', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'is-tablet' ) ); 
                ?> 
                <?php if( get_field('image_mobile') ): ?>
                    <img src="<?php the_field('image_mobile'); ?>" class="is-mobile"/>
                <?php endif; ?>

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
            endwhile;
        ?>
    </ul>
</section>

<?php 
	}
	require_once('footer.php');
?>