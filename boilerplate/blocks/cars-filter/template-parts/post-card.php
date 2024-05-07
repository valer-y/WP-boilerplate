<?php
/** @var $args
 * uses in cars-filter.php
 */

$fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
$id = $args['id'] ?? '';
$price = get_field('car_price', $id) ?? 'Цена не назначена';
$taxonomies = get_post_taxonomies($id);
$placeholder_img_uri =  get_stylesheet_directory_uri() . "/blocks/cars-filter/assets/img/placeholder.png" ?? '';

if(! $id) return;
?>

<div class="post-card">
    <div class="image__wrapper">
        <?php if(get_the_post_thumbnail($id)) {
            echo get_the_post_thumbnail($id, 'full', ['class' => 'car-image', "alt" => 'car image']);
        } else { ?>
            <img class="car-image" src="<?php echo esc_url($placeholder_img_uri); ?>" alt="car image">
        <?php } ?>
    </div>
    <div class="description">
        <h1><?php esc_html_e(get_the_title($id), 'boilerplate'); ?></h1>
        <div class="tags__wrapper">
            <?php
                foreach ($taxonomies as $tax):
                    $term_id = get_the_terms($id, $tax)[0]->term_id ?? '';

                    if($term_id) : ?>
                        <span class="tag"><?php

                            echo get_term($term_id)->name ?></span>
                    <?php endif;
                endforeach; ?>
        </div>
        <p class="price">
            <?php echo sprintf('%1$s', $price); ?>
            <span class="currency-sign">&dollar;</span>
        </p>
    </div>
</div>
