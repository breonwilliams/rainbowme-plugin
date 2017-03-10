<?php
/**
 * Created by PhpStorm.
 * User: breon
 * Date: 3/10/17
 * Time: 6:04 PM
 */

function cptui_register_my_taxes() {

    /**
     * Taxonomy: Main Characters.
     */

    $labels = array(
        "name" => __( 'Main Characters', '' ),
        "singular_name" => __( 'Main Character', '' ),
    );

    $args = array(
        "label" => __( 'Main Characters', '' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "Main Characters",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'vtype', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "vtype", array( "videos" ), $args );

    /**
     * Taxonomy: Age Ranges.
     */

    $labels = array(
        "name" => __( 'Age Ranges', '' ),
        "singular_name" => __( 'Age Range', '' ),
    );

    $args = array(
        "label" => __( 'Age Ranges', '' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "Age Ranges",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'vagetype', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "vagetype", array( "videos" ), $args );

    /**
     * Taxonomy: Type of Programs.
     */

    $labels = array(
        "name" => __( 'Type of Programs', '' ),
        "singular_name" => __( 'Type of Program', '' ),
    );

    $args = array(
        "label" => __( 'Type of Programs', '' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "Type of Programs",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'vprogramtype', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "vprogramtype", array( "videos" ), $args );

    /**
     * Taxonomy: Episodes.
     */

    $labels = array(
        "name" => __( 'Episodes', '' ),
        "singular_name" => __( 'Episode', '' ),
    );

    $args = array(
        "label" => __( 'Episodes', '' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "Episodes",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'v_ori_syn_type', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "v_ori_syn_type", array( "videos" ), $args );

    /**
     * Taxonomy: Book Categories.
     */

    $labels = array(
        "name" => __( 'Book Categories', '' ),
        "singular_name" => __( 'Book Category', '' ),
    );

    $args = array(
        "label" => __( 'Book Categories', '' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "Book Categories",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'bookstype', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "bookstype", array( "books" ), $args );

    /**
     * Taxonomy: Game Categories.
     */

    $labels = array(
        "name" => __( 'Game Categories', '' ),
        "singular_name" => __( 'Game Category', '' ),
    );

    $args = array(
        "label" => __( 'Game Categories', '' ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "Game Categories",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'gamestype', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "gamestype", array( "games" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );
