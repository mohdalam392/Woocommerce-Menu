<?php
/**
 * Plugin Name: Login And Register Menu
 * Plugin URI: http://facebook.com/Alamdeveloper
 * Description: Login And Register Menu for User Registeration and Login
 * Version: 1.0.0
 * Author: Mohd Alam
 * Author URI: http://facebook.com/Alamdeveloper
 * License: IPL
 */

function add_last_nav_item($items) {
    if ( is_user_logged_in() ) {
        global $current_user;
        get_currentuserinfo();

        //$items .= '<li><a href="'.get_bloginfo( 'url' ).'/edit-profile" role="button" data-toggle="modal">Edit Profile</a></li>';

        $items .= '<li><a href="javascript:void(0)" role="button" data-toggle="modal">'.$current_user->display_name.'</a>';
        $items .= '<ul>';
        $items .= '<li><a href="'.get_site_url().'/my-account/edit-account" role="button" data-toggle="modal">Edit Profile</a></li>';
        $items .= '<li><a href="'.get_site_url( 'url' ).'/my-account" role="button" data-toggle="modal">My Account</a></li>';
        $items .= '<li><a href="'. wp_logout_url(get_bloginfo( 'url' )).'" role="button" data-toggle="modal"> logout</a>';
        $items.='</ul></li>';
        return $items;
    } else {
       $items .= '<li><a href="'.get_site_url( ).'/my-account/" role="button" data-toggle="modal">Login</a></li>';
       return $items .= '<li><a href="'.get_site_url( ).'/my-account/" role="button" data-toggle="modal">Register</a></li>';
    }

}


add_filter('wp_nav_menu_items','add_last_nav_item');

?>