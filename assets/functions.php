<?php


function clean_shortcodes($content) {   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']',
        '<p><span>[' => '[', 
        ']</span></p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'clean_shortcodes');



/* Full Width Color Section */

function color_section( $atts, $content = null ) {

    $atts = shortcode_atts(
        array(
            'bgcolor' => '',
            'class' => '',
        ), $atts, 'color_section' );


    $bgcolor = $atts['bgcolor'];
    $class = $atts['class'];

    return '<section class="'.$class.'" style="background-color: '.$bgcolor.';"><div class="container">' . do_shortcode($content) . '</div></section>';

}

add_shortcode('color_section', 'color_section');

/* Full Width Image Section */
function img_section( $atts, $content = null ) {

    $atts = shortcode_atts(
        array(
            'bgimg' => '',
            'overlay' => '',
            'class' => '',
        ), $atts, 'img_section' );


    $bgimg = $atts['bgimg'];
    $overlay = $atts['overlay'];
    $class = $atts['class'];

    return '

   <section class="bg-img" style="background-image: url('.$bgimg.');">
        <div class="'.$class.'" style="background:'.$overlay.';">
            <div class="container">
                ' . do_shortcode($content) . '
            </div>
        </div>
    </section>

    ';

}

add_shortcode('img_section', 'img_section');


/* Full Width Parallax Section */
function parallax_section( $atts, $content = null ) {
    wp_enqueue_script( 'parallax' );
    $atts = shortcode_atts(
        array(
            'bgimg' => '',
            'overlay' => '',
            'class' => '',
        ), $atts, 'img_section' );


    $bgimg = $atts['bgimg'];
    $overlay = $atts['overlay'];
    $class = $atts['class'];

    return '

   <section class="parallax" style="background-image:url('.$bgimg.');">
        <div class="'.$class.'" style="background:'.$overlay.';">
            <div class="container">
                ' . do_shortcode($content) . '
            </div>
        </div>
    </section>

    ';

}

add_shortcode('parallax_section', 'parallax_section');


/* Custom Div */

function custom_div( $atts, $content = null ) {

    $atts = shortcode_atts(
        array(
            'class' => '',
        ), $atts, 'custom_div' );

    $class = $atts['class'];

    return '<div class="'.$class.'" >' . do_shortcode($content) . '</div>';

}

add_shortcode('custom_div', 'custom_div');

/*full width background color end*/



/* Background Video */

function background_vid( $atts, $content = null ) {
    wp_enqueue_script( 'bgvid' );
    wp_enqueue_script( 'bgvid-js' );

    $atts = shortcode_atts(
        array(
            'poster' => '',
            'mp4' => '',
            'padding' => '',
        ), $atts, 'background_vid' );


    $poster = $atts['poster'];
    $mp4 = $atts['mp4'];
    $padding = $atts['padding'];
    return '

<div class="video-hero jquery-background-video-wrapper demo-video-wrapper">
        <video class="jquery-background-video" autoplay muted loop poster="'.$poster.'">
            <source src="'.$mp4.'" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        <div class="'.$padding.'">
            <div class="video-hero--content">
                ' . do_shortcode($content) . '
            </div>
        </div>
    </div>'



        ;

}

add_shortcode('background_vid', 'background_vid');

/* Modal */

function boot_modal( $atts, $content = null ) {

    $atts = shortcode_atts(
        array(
            'button' => '',
            'title' => '',
            'class' => '',
            'target' => '',
            'closeclass' => '',
            'modalsize' => '',
        ), $atts, 'boot_modal' );


    $button = $atts['button'];
    $title = $atts['title'];
    $class = $atts['class'];
    $target = $atts['target'];
    $closeclass = $atts['closeclass'];
    $modalsize = $atts['modalsize'];

    return '

        <a href="#" class="'.$class.'" data-toggle="modal" data-target="#'.$target.'">'.$button.'</a>

        <div class="modal fade" id="'.$target.'" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true" style="display: none;">
            <div class="modal-dialog '.$modalsize.'">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="modal-label-3">'.$title.'</h4>
                    </div>
                    <div class="modal-body">
                        ' . do_shortcode($content) . '
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="'.$closeclass.'" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>'

        ;

}

add_shortcode('boot_modal', 'boot_modal');

/* Popup Video */

function popup_video( $atts, $content = null ) {
    wp_enqueue_script( 'popupvid-min' );
    wp_enqueue_script( 'popupvid-js' );

    $atts = shortcode_atts(
        array(
            'class' => '',
            'url' => '',
        ), $atts, 'popup_video' );

    $class = $atts['class'];
    $url = $atts['url'];

    return '

        <a href="'.$url.'" class="'.$class.' popup-video">' . do_shortcode($content) . '</a>
        '

        ;

}

add_shortcode('popup_video', 'popup_video');




/*get avatar*/

function slider_avatar() {
    ob_start();
 ?>
        <?php if ( is_user_logged_in() ) : ?>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
                    <?php bp_loggedin_user_avatar( 'type=thumb&width=50&height=50' ); ?>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-6">

                    <p class="lead">Hello <?php echo bp_core_get_userlink( bp_loggedin_user_id() ); ?>, we have some new episodes! Make sure you go to your profile and <a href="<?php echo bp_loggedin_user_domain() ?>profile/change-avatar/">create your avatar!</a></p>

    </div>
</div>


        <?php else : ?>


<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/placeholder.png'; ?>">
    </div>

    <div class="col-md-6 col-sm-6 col-xs-6">

            <p class="lead">Welcome to RainbowMe. Please login or join to enjoy the newest entertainment destination for every child.</p>

    </div>
</div>

        <?php endif; ?>
  <?php
$myvariable = ob_get_clean();
    return $myvariable;
    }
add_shortcode( 'avatar_shortcode', 'slider_avatar' );

/*get avatar end*/




/*recent videos start*/

add_shortcode( 'recent_videos', 'recent_videos' );

function recent_videos( $atts ) {
    wp_enqueue_script( 'slick-resp' );
    wp_enqueue_script( 'slickmin-js' );

    ob_start();
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'posts' => 8,
        'ptype' => videos,
    ), $atts ) );

    // define query parameters based on attributes
    $options = array(
        'posts_per_page' => $posts,
        'post_type' => $ptype,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query

    if ( $query->have_posts() ) { ?>





<div class="responsive grid cs-style-3">

<?php while ( $query->have_posts() ) : $query->the_post(); ?>

<div class="item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



                    <figure>

<?php
    if(has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'videos-thumb' ); ?></a>
    <?php } else { ?>
    <div class="staff-img">
<a href="<?php the_permalink(); ?>"><?php echo '<img src="' . get_stylesheet_directory_uri() . '/img/nophoto.jpg" />'; ?></a>


</div>
    <?php } ?>

                        <figcaption>
                            <h6><?php the_title(); ?></h6>
                            <a href="<?php the_permalink(); ?>">Take a look</a>
                        </figcaption>
                    </figure>


</div><!-- #post-## -->

            <?php endwhile;
            wp_reset_postdata(); ?>



          </div>

<?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}


/*recent videos end*/

/*Newsletter*/

function rm_newsletter( $atts, $content = null ) {


    return '

	<script type="text/javascript">
//<![CDATA[
if (typeof newsletter_check !== "function") {
window.newsletter_check = function (f) {
    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
    if (!re.test(f.elements["ne"].value)) {
        alert("The email is not correct");
        return false;
    }
    for (var i=1; i<20; i++) {
    if (f.elements["np" + i] && f.elements["np" + i].value == "") {
        alert("");
        return false;
    }
    }
    if (f.elements["ny"] && !f.elements["ny"].checked) {
        alert("You must accept the privacy statement");
        return false;
    }
    return true;
}
}
//]]>
</script>

<form method="post" action="http://rainbowmekids.com/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">

	<div class="newsletter-inputgroup">

<div class="row">
<div class="col-md-6 col-sm-6">
    	<input class="newsletter-firstname form-control" placeholder="First Name"  type="text" name="nn" size="30"></div>
<div class="col-md-6 col-sm-6">
    	<input class="newsletter-lastname form-control" placeholder="Last Name" type="text" name="ns" size="30">
</div>
</div>

    </div>
    <div class="input-group">

<input class="newsletter-email form-control" placeholder="Email" type="email" name="ne" size="30" required>

		<span class="input-group-btn">
            <button type="submit" class="btn btn-primary" value="Subscribe"> Subscribe</button>
		</span>
	</div>
</form>
'



        ;

}

add_shortcode('rm_newsletter', 'rm_newsletter');

/*Newsletter End*/





/*container start*/

function rm_container( $atts, $content = null ) {



   return '<div class="container">' . do_shortcode($content) . '</div>';

}

add_shortcode('rm_container', 'rm_container');

/*container end*/


