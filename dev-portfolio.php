<?php
/*
* Plugin Name: Dev Portfolio
* Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
* Description: Basic  portfolio page plugin
* Version:     20160911
* Author:      WordPress.org
* Author URI:  https://developer.wordpress.org/
* License:     GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: dev-portfolio
*/



// Exit if access directy
if(!defined('ABSPATH')) exit;

// Registers portfolio post type
function dp_register_post_type(){
    
    $labels = array(
		'name'               => _x( 'Portfolio', 'post type general name', 'dev-portfolio' ),
		'singular_name'      => _x( 'Portfolio Item', 'post type singular name', 'dev-portfolio' ),
		'menu_name'          => _x( 'Portfolio Items', 'admin menu', 'dev-portfolio' ),
		'name_admin_bar'     => _x( 'Portfolio Items', 'add new on admin bar', 'dev-portfolio' ),
        'add_new_item'       => __( 'Add New Portfolio Item', 'dev-portfolio' )

	);

    $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'menu_icon'          => 'dashicons-screenoptions'
	);

    register_post_type( 'dp_portfolio', args );
}

add_action( 'init', 'dp_register_post_type' );


// registes item type taxonomy

function dp_create_taxonomy(){

    $labels = array(
		'name'                       => _x( 'Item Types', 'taxonomy general name', 'dev-portfolio' ),
		'singular_name'              => _x( 'Item Type', 'taxonomy singular name', 'dev-portfolio' )
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'item-type' ),
	);

    register_taxonomy( 'dp_item_type', 'dp_portfolio', $args );
}

add_action( 'inti', 'dp_create_taxonomy' );









 





