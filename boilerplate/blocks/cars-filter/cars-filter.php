<h1 class="one">Hi</h1>
<p>FFFFFFFFFF</p>

<?php
$args = [
	'post_type' => 'c1ar',
	'post_status' => 'publish',
];

$posts = new WP_Query($args);

if($posts->have_posts()):
	while ($posts->have_posts()): $posts->the_post();

	endwhile;
else:

//    var_dump(__DIR__);
    get_template_part('template-parts/errors/no-posts','found');
endif;


