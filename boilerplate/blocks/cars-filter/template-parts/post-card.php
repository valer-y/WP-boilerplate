<?php
/** @var $args
 * uses in cars-filter.php
 */

$fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
$id = $args['id'] ?? '';
$price = get_field('car_price', $id) ?? 'Цена не назначена';
$taxonomies = get_post_taxonomies($id);

if(! $id) return;
?>

<div class="post-card">
    <div class="image__wrapper">
        <?php echo get_the_post_thumbnail($id, 'full', ['class' => 'car-image'])?>
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
