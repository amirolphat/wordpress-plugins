/** تابع دریافت و نمایش قیمت لحظه ای دلار (به تومان) */
function get_live_dollar_price_toman() {
    $cache_key = 'live_dollar_price_cache_toman';
    $price = get_transient($cache_key);

    if (false === $price) {
        $api_url = 'https://api.nobitex.ir/v2/orderbook/USDTIRT';
        $response = wp_remote_get($api_url);

        if (!is_wp_error($response) && 200 === wp_remote_retrieve_response_code($response)) {
            $body = json_decode(wp_remote_retrieve_body($response), true);
            
            if (isset($body['lastTradePrice'])) {
                $price = intval($body['lastTradePrice']) / 10;
                set_transient($cache_key, $price, 30 * MINUTE_IN_SECONDS);
            }
        }
    }

    if (false === $price) {
        $price = '---';
    } else {
        $price = number_format($price) . ' تومان';
    }

    $output = $price;

    return $output;
}

add_shortcode('show_dollar_price_toman', 'get_live_dollar_price_toman');