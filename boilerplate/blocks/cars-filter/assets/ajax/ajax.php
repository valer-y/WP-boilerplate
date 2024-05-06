<?php

/**
 * AJAX for 'cars-filter' block
 * *.js registers in ./app/BlocksRegister.php
 * AJAX script in /home/valery/Local Sites/big/app/public/wp-content/themes/boilerplate/blocks/cars-filter/assets/js/ajax.js
*/

add_action('wp_ajax_carsAjaxFunction', 'carsAjaxFunction');
add_action('wp_ajax_nopriv_carsAjaxFunction', 'carsAjaxFunction');
add_action('wp_enqueue_scripts', 'register_cars_filter_ajax');


function register_cars_filter_ajax()
{
    $file = '/blocks/cars-filter/dist/cars-filter-bundle.js';
    wp_enqueue_script('cars-filter', get_stylesheet_directory_uri() . '/blocks/cars-filter/dist/cars-filter-bundle.js', [],
        date("s", filemtime(get_stylesheet_directory() . $file)), true);

    wp_localize_script('cars-filter', 'carsFilterObject', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('ajax-nonce')
    ));
}

function carsAjaxFunction()
{
    $nonce = $_POST['nonce'] ?? '';

    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
        wp_send_json_error('Invalid nonce');
    }

    $filters = [
        'color' => $_POST['color'] ?? '',
        'brand' => $_POST['brand'] ?? '',
        'model' => $_POST['model'] ?? '',
        'year' => $_POST['year'] ?? '',
//        'price' => $_POST['price']
    ];

//    var_dump($filters['price']);

    $args = array(
        'post_type' => 'car',
        'tax_query' => [
            'relation' => 'AND',
        ],
        'posts_per_page' => 4

    );

    foreach ($filters as $filter => $value) {
        if(! empty($value)) {
            $args['tax_query'][] = [
                'taxonomy' => $filter,
                'field'    => 'term_id',
                'terms'    => $value,
            ];
        }
    }

    $query = new WP_Query( $args );

    if($query->have_posts()) :
        ob_start();

        while($query->have_posts()) : $query->the_post();
            get_template_part('blocks/cars-filter/template-parts/post','card', ['id' => get_the_ID()]);
        endwhile;

        $response = ob_get_clean();
    endif;

    if(!$response) {
        ob_start();
        get_template_part('blocks/cars-filter/template-parts/errors/no-posts','found');
        $response = ob_get_clean();
    }

    wp_reset_postdata();

    wp_send_json( $response );

    die();
}
