<?php
/**
 * Created by PhpStorm.
 * User: breon
 * Date: 3/10/17
 * Time: 6:03 PM
 */

function cptui_register_my_cpts() {

    /**
     * Post Type: Videos.
     */

    $labels = array(
        "name" => __( 'Videos', '' ),
        "singular_name" => __( 'Video', '' ),
    );

    $args = array(
        "label" => __( 'Videos', '' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "videos", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail", "excerpt", "page-attributes" ),
        "taxonomies" => array( "category" ),
    );

    register_post_type( "videos", $args );

    /**
     * Post Type: Books.
     */

    $labels = array(
        "name" => __( 'Books', '' ),
        "singular_name" => __( 'Book', '' ),
    );

    $args = array(
        "label" => __( 'Books', '' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "books", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail", "excerpt" ),
        "taxonomies" => array( "category" ),
    );

    register_post_type( "books", $args );

    /**
     * Post Type: Games.
     */

    $labels = array(
        "name" => __( 'Games', '' ),
        "singular_name" => __( 'Game', '' ),
    );

    $args = array(
        "label" => __( 'Games', '' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "games", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail", "excerpt" ),
        "taxonomies" => array( "category" ),
    );

    register_post_type( "games", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
