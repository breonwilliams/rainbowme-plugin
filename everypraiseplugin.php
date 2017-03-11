<?php
   /*
   Plugin Name: Rainbow Me Plugin
   Plugin URI: http://breonwilliams.com
   Description: adds shortcodes, custom post types, and taxonomies
   Version: 1.1
   Author: Breon Williams
   Author URI: http://breonwilliams.com
   License: GPL2
   */
$everypraise_shortcodes_path = dirname(__FILE__);
$everypraise_shortcodes_main_file = dirname(__FILE__).'/everypraiseplugin.php';
$everypraise_shortcodes_directory = plugin_dir_url($everypraise_shortcodes_main_file);
$everypraise_shortcodes_name = "Everypraise Plugin";

/* Add shortcodes scripts file */
function everypraise_shortcodes_add_scripts() {
  global $everypraise_shortcodes_directory, $everypraise_shortcodes_path;
  if(!is_admin()) {
    
    /* Includes */
    include($everypraise_shortcodes_path.'/assets/functions.php');

      wp_enqueue_style('everypraise_shortcodes', $everypraise_shortcodes_directory.'assets/css/shortcodes.css');
      wp_enqueue_style('slick-theme-css', $everypraise_shortcodes_directory.'assets/css/slick-theme.css');
      wp_enqueue_style('slick-css', $everypraise_shortcodes_directory.'assets/css/slick.css');
      wp_enqueue_style('bg-theme', $everypraise_shortcodes_directory.'assets/css/background-vid.css');
      wp_enqueue_style('lity-css', $everypraise_shortcodes_directory.'assets/css/lity.css');
      wp_enqueue_style('style-theme', $everypraise_shortcodes_directory.'assets/css/style.css');

  }}
add_filter('init', 'everypraise_shortcodes_add_scripts');



function wpb_adding_scripts() {
  global $everypraise_shortcodes_directory, $everypraise_shortcodes_path;
    wp_register_script( 'slick-resp', $everypraise_shortcodes_directory.'assets/slick/slick-resp.js', 'jquery','1.0',true);
    wp_register_script( 'slickmin-js', $everypraise_shortcodes_directory.'assets/slick/slick.min.js', 'jquery','1.0',true);
    wp_register_script( 'bgvid', $everypraise_shortcodes_directory.'assets/js/background-video.js', 'jquery','1.0',true);
    wp_register_script( 'bgvid-js', $everypraise_shortcodes_directory.'assets/js/jquery.background-video.js', 'jquery','1.0',true);
    wp_register_script( 'lity-js', $everypraise_shortcodes_directory.'assets/js/lity.js', 'jquery','1.0',true);
    wp_register_script( 'magnific-js', $everypraise_shortcodes_directory.'assets/js/jquery.magnific-popup.js', 'jquery','1.0',true);
    wp_register_script( 'magnific', $everypraise_shortcodes_directory.'assets/js/magnificPopup.js', 'jquery','1.0',true);
    wp_register_script( 'imageScroll', $everypraise_shortcodes_directory.'assets/js/jquery.imageScroll.min.js', 'jquery','1.0',true);
    wp_register_script( 'parallax', $everypraise_shortcodes_directory.'assets/js/parallax.js', 'jquery','1.0',true);
    wp_register_script( 'modal', $everypraise_shortcodes_directory.'assets/js/modal.js', 'jquery','1.0',true);


}

add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );


function build_js(){
    if( is_single() && get_post_type()=='videos' ){
        wp_enqueue_script( 'lity-js' );
    }
}
add_action('wp_enqueue_scripts', 'build_js');




/*thumbnails*/

if ( function_exists( 'add_theme_support' ) ) {
    add_image_size( 'small_thumb', 64, 64, true ); // Posts thumnail

}



/*custom post type start*/







// Add Formats Dropdown Menu To MCE
if ( ! function_exists( 'wpex_style_select' ) ) {
  function wpex_style_select( $buttons ) {
    array_push( $buttons, 'styleselect' );
    return $buttons;
  }
}
add_filter( 'mce_buttons', 'wpex_style_select' );



// Hooks your functions into the correct filters
function my_add_mce_button() {
  // check user permissions
  if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
    return;
  }
  // check if WYSIWYG is enabled
  if ( 'true' == get_user_option( 'rich_editing' ) ) {
    add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
    add_filter( 'mce_buttons', 'my_register_mce_button' );
  }
}
add_action('admin_head', 'my_add_mce_button');

// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {

    $plugin_array['my_mce_button'] = plugins_url( '/assets/js/mce-button.js', __FILE__ );

  return $plugin_array;
}

// Register new button in the editor
function my_register_mce_button( $buttons ) {
  array_push( $buttons, 'my_mce_button' );
  return $buttons;
}


// CUSTOM META FIELDS

/**
 * Meta Boxes
 */

add_action( 'add_meta_boxes', 'meta_box_slider' );
function meta_box_slider()
{                                      // --- Parameters: ---
    add_meta_box( 'slider-meta-box-id', // ID attribute of metabox
                  'Slider Shortcode',       // Title of metabox visible to user
                  'meta_box_callback', // Function that prints box in wp-admin
                  'page',              // Show box for posts, pages, custom, etc.
                  'normal',            // Where on the page to show the box
                  'high' );            // Priority of box in display order
}

function meta_box_callback( $post )
{
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['meta_box_slider_embed'] ) ? $values['meta_box_slider_embed'][0] : '';

    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <label for="meta_box_slider_embed"><p>Slider Shortcode</p></label>
        <textarea name="meta_box_slider_embed" id="meta_box_slider_embed" cols="30" rows="1" ><?php echo $selected; ?></textarea>
    </p>
    <p>Leave it Empty if you don't want to use a slider. Works with <strong>Home</strong> template.</p>
    <?php
}

add_action( 'save_post', 'meta_box_slider_save' );
function meta_box_slider_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array() // and those anchords can only have href attribute
        )
    );

    // Probably a good idea to make sure your data is set

    if( isset( $_POST['meta_box_slider_embed'] ) )
        update_post_meta( $post_id, 'meta_box_slider_embed', $_POST['meta_box_slider_embed'] );

}




// Little function to return a custom field value
function wpbooks_get_custom_field( $value ) {
  global $post;

    $custom_field = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field ) )
      return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

    return false;
}

// Register the Metabox
function wpbooks_add_custom_meta_box() {
  add_meta_box( 'wpbooks-meta-box', __( 'Book Author Name', 'textdomain' ), 'wpbooks_meta_box_output', 'books', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'wpbooks_add_custom_meta_box' );

// Output the Metabox
function wpbooks_meta_box_output( $post ) {
  // create a nonce field
  wp_nonce_field( 'my_wpbooks_meta_box_nonce', 'wpbooks_meta_box_nonce' ); ?>

  <p>
    <label for="wpbooks_textfield"><?php _e( 'Title', 'textdomain' ); ?>:</label>
    <input type="text" name="wpbooks_textfield" id="wpbooks_textfield" value="<?php echo wpbooks_get_custom_field( 'wpbooks_textfield' ); ?>" size="50" />
    </p>



  <?php
}

// Save the Metabox values
function wpbooks_meta_box_save( $post_id ) {
  // Stop the script when doing autosave
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

  // Verify the nonce. If insn't there, stop the script
  if( !isset( $_POST['wpbooks_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wpbooks_meta_box_nonce'], 'my_wpbooks_meta_box_nonce' ) ) return;

  // Stop the script if the user does not have edit permissions
  if( !current_user_can( 'edit_post' ) ) return;

    // Save the textfield
  if( isset( $_POST['wpbooks_textfield'] ) )
    update_post_meta( $post_id, 'wpbooks_textfield', esc_attr( $_POST['wpbooks_textfield'] ) );


}
add_action( 'save_post', 'wpbooks_meta_box_save' );

include($everypraise_shortcodes_path.'/inc/post_types.php');
include($everypraise_shortcodes_path.'/inc/taxonomies.php');
//include($everypraise_shortcodes_path.'/inc/custom_fields.php');
