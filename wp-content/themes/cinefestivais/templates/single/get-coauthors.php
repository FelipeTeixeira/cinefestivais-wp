<section class="postpage-body--contact content singlePg-container">
    <h2 class="content-title">Entre em contato</h2>
    <?php
        if (function_exists('get_coauthors')) {
            $coauthors = get_coauthors();
            foreach ($coauthors as $coauthor) 
            {
                $user = 'user_' . $coauthor->ID;
                $image_user = get_field('user_photo', $user);
    ?>
        <div class="contact-author">
            <a href="<?= get_author_posts_url($coauthor->ID) ?>">
                <?php if ($image_user) echo wp_get_attachment_image($image_user, $size, "", ["class" => "profile-photo"]); ?>
            </a>
            <div class="contact-author--info">
                <h3>
                    <a href="<?= get_author_posts_url($coauthor->ID) ?>" class="author-name">
                        <?= $coauthor->display_name; ?>
                    </a>
                </h3>

                <a href="mailto:<?= $coauthor->user_email; ?>?Subject=Cinefestivais" target="_top">
                    <svg class="icon icon-envelope">
                        <use xlink:href="#icon-envelope"></use>
                    </svg>
                    <?= $coauthor->user_email; ?>
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
    <?php
            }
        }
    ?>
</section>