<?php
    require_once('header.php');
    
    $count_article = (!isset($count_article)) ? '4' : $count_article;

	$args = array(
		'posts_per_page' => $count_article,
        'meta_key'	=> 'tipo_de_visualizacao',
		'meta_value'		=> 'slider'
	);

	$loop = new WP_Query( $args );
	if( $loop->have_posts() ) {
		while( $loop->have_posts() ) {
		$loop->the_post();
?>
<div class="slider-container">
    <ul class="controls" id="customize-controls" aria-label="Carousel Navigation" tabindex="0">
        <li class="prev" data-controls="prev" aria-controls="customize" tabindex="-1">
			<svg class="icon icon-left">
                <use xlink:href="#icon-left"></use>
            </svg>
        </li>
        <li class="next" data-controls="next" aria-controls="customize" tabindex="-1">
			<svg class="icon icon-right">
                <use xlink:href="#icon-right"></use>
            </svg>
        </li>
    </ul>
    <ul class="carousel">
        <li>           
			<div class="teste">
				<img src="<?= $url ?>/assets/img/teste.png" alt="">
			</div>
        </li>
        <li>           
			<div class="teste">
				<img src="<?= $url ?>/assets/img/teste.png" alt="">
			</div>
        </li>
    </ul>    
</div>
<?php
        }
    }
    wp_reset_query();
    get_footer(); 
?>