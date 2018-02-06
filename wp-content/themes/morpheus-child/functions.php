<?php
function theme_js() {
global $coll_is_mobile;
		// script
		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js', '', null, false );
		wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', '', null, false );
		wp_register_script( 'jqueryui', get_template_directory_uri() . '/js/jquery-ui.min.js', '', null, true );
		wp_register_script( 'retina', get_template_directory_uri() . '/js/retina.min.js', '', null, true );
		wp_register_script( 'vimeo', get_template_directory_uri() . '/js/froogaloop2.min.js', '', null, true );


		wp_register_script( 'sresize', get_template_directory_uri() . '/js/jquery.smartresize.js', '', null, true );
		wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', '', null, true );
		wp_register_script( 'swipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', '', null, true );
		wp_register_script( 'fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', '', null, true );
		wp_register_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.js', '', null, true );
		wp_register_script( 'popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', '', null, true );
		wp_register_script( 'lasyload', get_template_directory_uri() . '/js/jquery.lazyload.js', '', null, true );
		wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', '', null, true );
		wp_register_script( 'knob', get_template_directory_uri() . '/js/jquery.knob.js', '', null, true );
		wp_register_script( 'parallax', get_template_directory_uri() . '/js/skrollr.min.js', '', null, true );
		wp_register_script( 'scrollbar', get_template_directory_uri() . '/js/perfect-scrollbar.js', '', null, true );
		wp_register_script( 'mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js', '', null, true );
		wp_register_script( 'mousewheel.s', get_template_directory_uri() . '/js/jquery.mousewheel.s.js', '', null, true );
		wp_register_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.js', '', null, true );


		wp_register_script( 'shortcodes', get_template_directory_uri() . '/js/shortcodes.js', '', null, true );
		wp_register_script( 'commons', get_template_directory_uri() . '/js/common.js', '', null, true );
		wp_register_script( 'page.sections', get_template_directory_uri() . '/js/page.sections.js', '', null, true );
		wp_register_script( 'page.single', get_template_directory_uri() . '/js/page.single.js', '', null, true );
		wp_register_script( 'custom.structure', get_template_directory_uri() . '/js/custom.structure.js', '', null, true );
		wp_register_script( 'custom.structure.s', get_template_directory_uri() . '/js/custom.structure.s.js', '', null, true );


		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jqueryui' );
		wp_enqueue_script( 'retina' );
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'vimeo' );
		wp_enqueue_script( 'foundation' );
		wp_enqueue_script( 'scrollbar' );
		wp_enqueue_script( 'sresize' );

		if ( ! $coll_is_mobile ) {
            if (is_safari()) {
                wp_enqueue_script( 'mousewheel.s' );
            }
			 else {
                 wp_enqueue_script( 'mousewheel' );
             }
		}


		if ( is_singular( 'post' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}


		wp_enqueue_script( 'swipe' );
		wp_enqueue_script( 'sresize' );
		wp_enqueue_script( 'superfish' );
		wp_enqueue_script( 'fitvid' );
		wp_enqueue_script( 'isotope' );
		wp_enqueue_script( 'popup' );
		wp_enqueue_script( 'lasyload' );
		wp_enqueue_script( 'flexslider' );
		wp_enqueue_script( 'knob' );
		wp_enqueue_script( 'parallax' );
		wp_enqueue_script( 'countdown' );
		wp_enqueue_script( 'shortcodes' );
		wp_enqueue_script( 'commons' );

		if ( is_page_template( 'template-sectioned.php' ) ) {
			wp_enqueue_script( 'page.sections' );
		}
		if ( is_singular( 'coll-portfolio' ) ) {
			wp_enqueue_script( 'page.single' );
		}
		if ( is_singular( 'post' ) && has_post_thumbnail() ) {
			wp_enqueue_script( 'page.single' );
		}
		if ( is_page() && has_post_thumbnail() ) {
			wp_enqueue_script( 'page.single' );
		}
		if ( is_404() ) {
			wp_enqueue_script( 'page.single' );
		}

		// blog
		if ( ( is_home() || is_archive() || is_search() ) && has_post_thumbnail( get_option( 'page_for_posts' ) ) ) {
			wp_enqueue_script( 'page.single' );
		}


        if ( ! $coll_is_mobile && is_safari() ) {
            wp_enqueue_script( 'custom.structure.s' );
        } else {
            wp_enqueue_script( 'custom.structure' );
        }

    wp_enqueue_script( 'theme_js', get_stylesheet_directory_uri() . '/js/custom.structure.s.js', array( 'jquery' ), '1.1', true );
    wp_enqueue_script( 'theme_js_menu', get_stylesheet_directory_uri() . '/js/menuState.js', array( 'jquery' ), '1.2', true );
    }

function my_theme_enqueue_styles() {

    $parent_style = 'morpheus';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_action('wp_enqueue_scripts', 'theme_js');

?>