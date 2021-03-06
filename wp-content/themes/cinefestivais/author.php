<?php

	get_header();

    if( have_posts() ) 
    {
        $author_id = get_the_author_meta('ID');
        $user = 'user_'. $author_id;
        $image_user = get_field('user_photo', $user);
        
        // User
        $authorname = get_the_author_meta('display_name');
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
            <?php 
                echo $authorname;
            ?>
        </h1>
        <p class="author-text">
            <?= get_the_author_meta('description') ?>
        </p>
        <div class="author-contact">
            <a href="mailto:<?= $user_email ?>?Subject=Cinefestivais" target="_top">
				<svg class="icon icon-envelope">
					<use xlink:href="#icon-envelope"></use>
				</svg>
				<?= $user_email ?>
			</a>

			<?php
				$facebook = get_field('user_facebook', $user);
				$twitter = get_field('user_twitter', $user);
			?>
			<?php if ($facebook) : ?>
				<a href="https://www.facebook.com/<?= $facebook ?>" target="_blank">
					<svg class="icon icon-facebook">
						<use xlink:href="#icon-facebook"></use>
					</svg>
					/<?= $facebook ?>
				</a>
			<?php endif; ?>

			<?php if ($twitter) : ?>
				<a href="https://www.twitter.com/<?= $twitter ?>" target="_blank">
					<svg class="icon icon-twitter">
						<use xlink:href="#icon-twitter"></use>
					</svg>
					@<?= $twitter ?>
				</a>
			<?php endif; ?>
        </div>
    </div>
</section>

<section class="content p-margin-bottom-24">
    <h2 class="content-title">
        Textos Publicados
    </h2>

    <?php
        $author = get_the_author_meta('ID');
        echo do_shortcode('		[ajax_load_more 
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