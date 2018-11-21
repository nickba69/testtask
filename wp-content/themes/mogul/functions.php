<?php
/**
 * Mogul functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mogul
 */

if ( ! function_exists( 'mogul_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mogul_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Mogul, use a find and replace
		 * to change 'mogul' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mogul', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mogul' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mogul_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mogul_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mogul_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mogul_content_width', 640 );
}
add_action( 'after_setup_theme', 'mogul_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mogul_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mogul' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mogul' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mogul_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mogul_scripts() {
	wp_enqueue_style( 'mogul-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mogul-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mogul-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// DEVELOPMENT STYLES AND SCRIPTS

    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/style/bootstrap.min.css');

    wp_enqueue_style('style-css', get_template_directory_uri().'/style/main.css');

    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js');

    wp_enqueue_script('main-js', get_template_directory_uri().'/js/main.js');

}

/*
 * AJAX SECTION
 * */
	/*Portfolio sorting*/
	add_action( 'wp_ajax_portfolio', 'portfolio_sorting_function' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
	add_action( 'wp_ajax_nopriv_portfolio', 'portfolio_sorting_function' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
	// First hook used for non authenticated users and the second is for authenticated

	function portfolio_sorting_function(){ //returning the data, that was asked by AJAX Query

	    $resulted_portfolio =  get_template_part( 'template-parts/content', 'portfolio');

	    echo $resulted_portfolio;

	    die; // Show that the task is finished
	}

	/*Getting the review logo description*/
	add_action( 'wp_ajax_review_logo', 'get_logo_description_function' ); 
	add_action( 'wp_ajax_nopriv_review_logo', 'get_logo_description_function' ); 
	// First hook used for non authenticated users and the second is for authenticated

	function get_logo_description_function(){ //returning the data, that was asked by AJAX Query

		$logos = get_field('additional_reviews_logos', 'option');
	    $logo_description = $logos[$_POST['review_logo_id']]['logo_description'] ;

	    echo $logo_description;

	    die; 
	}

/*
 * Options PAGE
 * */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}
/*
 *Connecting
 * */

add_action( 'wp_enqueue_scripts', 'mogul_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
* Shortcodes
*/
add_shortcode( 'leave_review', 'input_fields' ); 
function input_fields( $atts ) {
    if ( isset( $_POST['leave_review'] ) ) {
        $post = array(
            'post_content' => $_POST['cont'], 
            'post_type'    => 'reviews',
            'post_status'  => 'publish',

        );
        $the_post_id = wp_insert_post( $post);
        add_post_meta($the_post_id, 'review_author_name', $_POST['namee'], true);
        add_post_meta($the_post_id, 'review_author_email', $_POST['email'], true);
        add_post_meta($the_post_id, 'review_author_number', $_POST['number'], true);

    }
    ?> 
    <?php 
    	$inserted_post_type = 'leave_review';  
		require get_template_directory() . '/form-standart.php';
	?>

    <?php
}

/*
* Load more codes
*/

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback() {
    // check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'reviews',
        'post_status' => 'publish',
        'posts_per_page' => '4',
        'paged' => $paged,
    );

    $my_posts = new WP_Query( $args );

    if ( $my_posts->have_posts() ) :
        ?>
        <div class="row">
	        <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
		    	<div class="col-md-6">
					<article class="review">
						<p class="review-text "><?php the_content();?></p>
						<p class="review-author">- <?= $review_author_name ?></p>
					</article>
				</div>

	        <?php endwhile ?>
        </div> <!-- .row -->

	    <!--**Load more button-->
        
        <?php
    endif;
 
    wp_die();
}

