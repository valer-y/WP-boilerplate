<?php $admin_email = get_bloginfo('admin_email') ?? '';?>

<p><?php esc_html_e('Произошла ошибка, свяжитесь с администратором, ');?>
    <br />
    <a href="<?php echo "mailto: " . esc_url($admin_email)?>">
        <?php echo sprintf('%1$s', $admin_email)?>
    </a>
</p>
