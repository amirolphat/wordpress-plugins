<?php
/**
 * Plugin Name: Health & Sport Calculators Full Widgets Pack
 * Plugin URI: https://github.com/amirolphat/wordpress-plugins
 * Description: Body mass index form can be added to your content areas with [cal-bmi] shortcode, basal metabolic rate form with [cal-bmr], waist-to-hip ratio form with [cal-whr], one-repetition maximum form with [cal-orm], Maximum Heart Rate form with [cal-mhr], exercise volume form with [cal-ev], practice load form with [cal-pl]. NOTE: Please install the Elementor plugin on your WordPress if you see a problem with the appearance of the form.
 * Author: Amir Olphat
 * Author URI: https://www.linkedin.com/in/amirolphat
 * Version: 1.0
 */


function bmr_page() {
    ob_start();
    include 'bmr.php';
    return ob_get_clean();
}
function bmr_add_page() {
    add_shortcode('cal-bmr', 'bmr_page');
}
add_action('init', 'bmr_add_page');




function bmi_page() {
    ob_start();
    include 'bmi.php';
    return ob_get_clean();
}
function bmi_add_page() {
    add_shortcode('cal-bmi', 'bmi_page');
}
add_action('init', 'bmi_add_page');




function whr_page() {
    ob_start();
    include 'whr.php';
    return ob_get_clean();
}
function whr_add_page() {
    add_shortcode('cal-whr', 'whr_page');
}
add_action('init', 'whr_add_page');




function orm_page() {
    ob_start();
    include 'orm.php';
    return ob_get_clean();
}
function orm_add_page() {
    add_shortcode('cal-orm', 'orm_page');
}
add_action('init', 'orm_add_page');




function mhr_page() {
    ob_start();
    include 'mhr.php';
    return ob_get_clean();
}
function mhr_add_page() {
    add_shortcode('cal-mhr', 'mhr_page');
}
add_action('init', 'mhr_add_page');




function ev_page() {
    ob_start();
    include 'ev.php';
    return ob_get_clean();
}
function ev_add_page() {
    add_shortcode('cal-ev', 'ev_page');
}
add_action('init', 'ev_add_page');




function pl_page() {
    ob_start();
    include 'pl.php';
    return ob_get_clean();
}
function pl_add_page() {
    add_shortcode('cal-pl', 'pl_page');
}
add_action('init', 'pl_add_page');
?>
