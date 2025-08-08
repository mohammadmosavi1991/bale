<?php
add_action('admin_menu', 'bale_post_admin_menu');
function bale_post_admin_menu() {
    add_menu_page('تنظیمات بله پست', 'بله پست', 'manage_options', 'bale-post', 'bale_post_settings_page', 'dashicons-share', 80);
}

function bale_post_settings_page() {
?>
<div class="wrap">
  <h1>تنظیمات افزونه بله پست</h1>
  <form method="post" action="options.php">
    <?php
      settings_fields('bale_post_settings');
      do_settings_sections('bale-post');
      submit_button();
    ?>
  </form>
</div>
<?php }

add_action('admin_init', 'bale_post_settings_init');
function bale_post_settings_init() {
    register_setting('bale_post_settings', 'bale_post_token');
    register_setting('bale_post_settings', 'bale_post_chat_id');
    register_setting('bale_post_settings', 'bale_post_auto_send');
    register_setting('bale_post_settings', 'bale_post_template');

    add_settings_section('bale_post_main', '', null, 'bale-post');

    add_settings_field('bale_post_token', 'توکن API بله', function() {
        echo '<input type="text" name="bale_post_token" value="' . esc_attr(get_option('bale_post_token')) . '" class="regular-text">';
    }, 'bale-post', 'bale_post_main');

    add_settings_field('bale_post_chat_id', 'شناسه چت کانال بله', function() {
        echo '<input type="text" name="bale_post_chat_id" value="' . esc_attr(get_option('bale_post_chat_id')) . '" class="regular-text">';
    }, 'bale-post', 'bale_post_main');

    add_settings_field('bale_post_auto_send', 'ارسال خودکار فعال باشد؟', function() {
        echo '<input type="checkbox" name="bale_post_auto_send" value="1" ' . checked(1, get_option('bale_post_auto_send'), false) . '> بله';
    }, 'bale-post', 'bale_post_main');

    add_settings_field('bale_post_template', 'قالب پیام', function() {
        echo '<textarea name="bale_post_template" rows="5" class="large-text">' . esc_textarea(get_option('bale_post_template')) . '</textarea>';
    }, 'bale-post', 'bale_post_main');
}
