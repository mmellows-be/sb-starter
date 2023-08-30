<?php

/* ----------- Custom Login Page ----------- */

function custom_login_stylesheet()
{
    wp_enqueue_style('login-css', get_template_directory_uri() . '/css/login.css');
    //    wp_enqueue_script( 'login-js', get_template_directory_uri() . '/js/login.js' );
}
add_action('login_enqueue_scripts', 'custom_login_stylesheet');

function my_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
    return get_bloginfo('name');
}
add_filter('login_headertext', 'my_login_logo_url_title');

add_filter('login_headerurl', 'custom_logo_url');
function custom_logo_url($url)
{
    return '/';
}
