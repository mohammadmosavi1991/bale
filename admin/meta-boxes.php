<?php
add_action('add_meta_boxes', function() {
    add_meta_box('bale_post_manual_box', 'ارسال به بله', 'bale_post_meta_box_html', ['post', 'product'], 'side');
});

function bale_post_meta_box_html($post) {
    echo '<p><a href="#" class="button">ارسال دستی به بله</a></p>';
}
