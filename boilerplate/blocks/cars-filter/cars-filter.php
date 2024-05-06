<?php

$block_path = str_replace(get_stylesheet_directory() . '/', '', __DIR__);

$args = [
	'post_type' => 'car',
	'post_status' => 'publish',
];

$posts = new WP_Query($args);

$car_taxonomies = get_object_taxonomies('car');
//foreach ($car_taxonomies as $tax) {
//
//}

$terms = get_terms('brand');
?>




<section <?php echo get_block_wrapper_attributes([
    "class" => "cars-filter"
])?>>


    <form action="">
        <?php foreach ($car_taxonomies as $tax) :
            if($tax === 'brand' || $tax === 'color') :
                $terms = get_terms($tax); ?>
                <select id="car__<?php echo esc_attr($tax); ?>-filter" class='cars-filter__brand-filter' name="<?php echo esc_attr($tax)?>">
                    <option disabled selected value></option>
                    <?php foreach ($terms as $term) : ?>
                        <option value="<?php echo esc_attr($term->term_id)?>"><?php echo esc_attr($term->name); ?></option>
                    <?php endforeach;?>
                </select>
        <?php endif;
        endforeach; ?>

        <input class="button" type="button" name="submit" value="Submit">
    </form>


<div class="cars__wrapper container--wrapper">
    <?php if($posts->have_posts()):
        while ($posts->have_posts()): $posts->the_post();
            get_template_part($block_path . '/template-parts/post','card', ['id' => get_the_ID()]);
        endwhile;
    else:
        get_template_part($block_path . '/template-parts/errors/no-posts','found');
    endif;

    wp_reset_postdata(); ?>
</div>

</section>

