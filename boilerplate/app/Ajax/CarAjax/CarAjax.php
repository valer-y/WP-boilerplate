<?php

namespace App\Ajax;

class CarAjax
{
    public function __construct()
    {
        $this->registerAjax();
        add_action('wp_ajax_show_more_posts', [$this, 'ajaxFunction']);
        add_action('wp_ajax_nopriv_show_more_posts', [$this, 'ajaxFunction']);
    }

    public function registerAjax()
    {
        wp_localize_script('bundle.js', 'carsFilterObject', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('ajax-nonce')
        ));
    }

    public function ajaxFunction()
    {

    }
}
