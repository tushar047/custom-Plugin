<?php

/**
* Plugin Name: Plugin T47
* Author: Tushar T
* Description: Custom Plugin for user regstration from 
* Version: 1.0.0
*/

if (! defined('ABSPATH')){
    die();
}

function activation(){
    //activtion function
    global $wpdb, $table_prefix;
    add_menu_page( 'Account', 'Account', 'account', 'custom_sc' );

}
register_activation_hook( __FILE__, 'activation' );

function deactivation(){
    //deactiation function
    remove_menu_page( 'account' );
}
register_activation_hook( __FILE__, 'deactivation' );

function custom_registration_function(){
    ob_start();
    include 'public/register.php';
    $var_reg = ob_get_clean();
    return $var_reg;
}

add_shortcode( 'custom_sc', 'custom_registration_function' );

function my_login(){
    if(isset($_POST['user_login'])){
        $username = esc_sql( $_POST['username']);
        $pass = esc_sql( $_POST['password']);
        $credentials=array(
            'user_login' => $username,
            'user_password' => $pass,
        );

        $user = wp_signon( $credentials );

        if(!is_wp_error($user)){
           
            if($user->roles[0] == 'administrator'){
                wp_redirect(admin_url());
                exit;
            }else {
                wp_redirect(site_url());
            }
        } else {
            echo 'Login failed';
        }
    }
}

add_action( 'template_redirect', 'my_login' );