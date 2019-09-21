<?php

	get_header();

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

    <?php
        $author = get_the_author_meta('ID');
        echo do_shortcode('		[ajax_load_more 
                                seo="true"
                                transition_container="false" 
                                posts_per_page="4" 
                                transition="fade" 
                                scroll="false" 
                                button_label="Ver mais" 
                                author="'.$author.'"]' ); 
    ?>
</section>

<?php 
	}
	get_footer(); 
?>