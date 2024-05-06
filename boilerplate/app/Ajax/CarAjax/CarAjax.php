<?php

namespace App\Ajax\CarAjax;

class CarAjax
{
    public function __construct()
    {
        add_action('wp_ajax_carsAjaxFunction', [$this, 'carsAjaxFunction']);
        add_action('wp_ajax_nopriv_carsAjaxFunction', [$this, 'carsAjaxFunction']);
        $this->registerAjax();
    }

    public function registerAjax()
    {
        $file = '/blocks/cars-filter/dist/cars-filter-bundle.js';
        wp_enqueue_script('cars-filter', get_stylesheet_directory_uri() . '/blocks/cars-filter/dist/cars-filter-bundle.js', [],
            date("s", filemtime(get_stylesheet_directory() . $file)), true);

        wp_localize_script('cars-filter', 'carsFilterObject', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('ajax-nonce')
        ));
    }

    public function carsAjaxFunction()
    {
        echo 'TTTTT' . $_POST['brand'];

        die();
    }
}
