<?php

$block_path = str_replace(get_stylesheet_directory() . '/', '', __DIR__);

$args = [
	'post_type' => 'car',
	'post_status' => 'publish',
    'posts_per_page' => -1
];

$posts = new WP_Query($args);

$car_taxonomies = get_object_taxonomies('car') ?? '';

?>

<section <?php echo get_block_wrapper_attributes([
    "class" => "cars-filter"
])?>>

    <form class="container--wrapper" action="">
        <input class="show-all-cars button" type="button" name="submit" value="<?php esc_html_e('Все авто', 'boilerplate');?>">
        <?php
            if($car_taxonomies) :

            foreach ($car_taxonomies as $tax) :
            $i = 0;

            if( $tax !== 'price') : $terms = get_terms($tax);
            ?>

                <div class="filter__wrapper">
                    <label for="<?php echo esc_attr($tax)?>"><?php esc_html_e( get_taxonomy($tax)->label, 'boilerplate');?></label>
                    <select id="car__<?php echo esc_attr($tax); ?>-filter" class='filter cars-filter__brand-filter' name="<?php echo esc_attr($tax)?>">
                        <option class="blank-option" disabled selected value></option>
                        <?php foreach ($terms as $term) : ?>
                            <option value="<?php echo esc_attr($term->term_id)?>"><?php echo esc_attr($term->name); ?></option>
                        <?php endforeach;?>
                    </select>
                </div>

            <?php endif;
        endforeach;
            get_template_part($block_path . '/template-parts/price', 'slider');
        endif; ?>

        <input class="find-cars button" type="button" name="submit" value="<?php esc_html_e('Найти', 'boilerplate');?>">
    </form>


    <div class="cars__wrapper container--wrapper">
        <?php if($posts->have_posts()):
            while ($posts->have_posts()): $posts->the_post();

                get_template_part($block_path . '/template-parts/post','card', ['id' => get_the_ID()]);
            endwhile;
        else:
            get_template_part($block_path . '/template-parts/errors/init','error');
        endif;

        wp_reset_postdata(); ?>
    </div>

</section>

