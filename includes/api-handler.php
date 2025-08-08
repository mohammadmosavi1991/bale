<?php
function bale_post_send_message($data) {
    $token = get_option('bale_post_token');
    $url = "https://tapi.bale.ai/bot" . $token . "/sendMessage";

    $args = [
        'body' => json_encode($data),
        'headers' => ['Content-Type' => 'application/json'],
        'timeout' => 15,
    ];

    $response = wp_remote_post($url, $args);
    return $response;
}
