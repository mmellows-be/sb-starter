<?php

function load_template_part($template_name, $part_name = null, $args = [])
{
    //? Start output buffering
    ob_start();
    //? Get template part
    get_template_part($template_name, $part_name, $args);
    //? Store template part in variable
    $var = ob_get_contents();
    //? Stop OB
    ob_end_clean();
    //? Return variable with template inside
    return $var;
}

//? Get array of years $post_type has posts published in
function get_posts_years_array()
{
    global $wpdb;
    $result = [];

    $yearsPosts = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT YEAR(post_date) FROM {$wpdb->posts} WHERE post_status = 'publish' AND post_type = %s GROUP BY YEAR(post_date) DESC",
            'blog'
        ),
        ARRAY_N
    );

    foreach ($yearsPosts as $yearsPost) {
        $result[] = $yearsPost[0];
    }

    return $result;
}
