<?php
add_action('publish_post', 'bale_post_auto_send', 10, 2);
add_action('publish_product', 'bale_post_auto_send', 10, 2);

function bale_post_auto_send($ID, $post) {
    if (!get_option('bale_post_auto_send')) return;

    $chat_id = get_option('bale_post_chat_id');
    $template = get_option('bale_post_template');
    $msg = bale_post_format_message($template, $post);

    $data = [
        'chat_id' => $chat_id,
        'text' => $msg
    ];

    bale_post_send_message($data);
}

function bale_post_format_message($template, $post) {
    return str_replace(
        ['{post_title}', '{post_excerpt}', '{post_date}', '{site_url}', '{post_short_url}'],
        [$post->post_title, get_the_excerpt($post), get_the_date('', $post), get_site_url(), get_permalink($post)],
        $template
    );
}
