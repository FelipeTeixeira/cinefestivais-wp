<?php
    $size = 'thumbnail';
    $coauthors = get_coauthors();
?>

<section class="postpage-body--author singlePg-container singlePg-coauthors">
    <?php
        foreach ($coauthors as $coauthor) 
        {
            $user = 'user_' . $coauthor->ID;
            $image_user = get_field('user_photo', $user);
    ?>
        <figure class="author-picture">
            <?php if ($image_user) echo wp_get_attachment_image($image_user, $size, "", ["class" => "profile-photo"]); ?>       
        </figure>
    <?php
        }
    ?>

    <div class="containerInfoHeader">
        <div class="author-names">
            <?php
                foreach ($coauthors as $coauthor) 
                {
                    $user = 'user_' . $coauthor->ID;
                    $image_user = get_field('user_photo', $user);
            ?>
                <a href="<?= get_author_posts_url($coauthor->ID) ?>" class="author-name">
                    <?= $coauthor->display_name; ?>
                </a>
            <?php
                }
            ?>
        </div>
    
        <div class="singlePg-date">
            <span class="postpage-body--timehour">
                <?= get_the_date('d/m/y'); ?>
                às
                <?= the_time('H:i'); ?>
            </span>
            <?php
                if (get_the_time('H:i') !== get_the_modified_time('H:i')) 
                {
            ?>
                <span class="postpage-body--updated">
                    Atualizado em
                    <?= get_the_modified_date('d/m/y') ?>
                    as
                    <?= get_the_modified_time('H:i') ?>
                </span>
            <?php
                }
            ?>
        </div>
    </div>
</section>