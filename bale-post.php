<?php
/**
 * Plugin Name: Bale Post
 * Description: ارسال خودکار پست‌ها و محصولات به پیام‌رسان بله با تنظیمات پیشرفته.
 * Version: 1.0.0
 * Author: شما
 */

if (!defined('ABSPATH')) exit;

// تعریف ثابت‌ها
define('BALE_POST_DIR', plugin_dir_path(__FILE__));
define('BALE_POST_URL', plugin_dir_url(__FILE__));

enqueue_bale_post_assets();
function enqueue_bale_post_assets() {
    wp_enqueue_style('bale-post-material-css', 'https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.2.1/dist/css/materialize.min.css');
    wp_enqueue_script('bale-post-material-js', 'https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.2.1/dist/js/materialize.min.js', array('jquery'), null, true);
}

// بارگذاری فایل‌ها
require_once BALE_POST_DIR . 'includes/api-handler.php';
require_once BALE_POST_DIR . 'includes/post-sender.php';
require_once BALE_POST_DIR . 'admin/settings-page.php';
require_once BALE_POST_DIR . 'admin/meta-boxes.php';
