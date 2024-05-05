<?php

$block_path = str_replace(get_stylesheet_directory() . '/', '', __DIR__);

$args = [
	'post_type' => 'car',
	'post_status' => 'publish',
];

$posts = new WP_Query($args);
?>

<section <?php echo get_block_wrapper_attributes([
    "class" => "cars-filter"
])?>>

<div class="cars__wrapper container--wrapper">
    <?php if($posts->have_posts()):
        while ($posts->have_posts()): $posts->the_post();
//            echo get_the_post_thumbnail();
            get_template_part($block_path . '/template-parts/post','card', ['id' => get_the_ID()]);
        endwhile;
    else:
        get_template_part($block_path . '/template-parts/errors/no-posts','found');
    endif;

    wp_reset_postdata(); ?>
</div>

</section>

