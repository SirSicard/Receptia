<?php
/**
 * Bootscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bootscore
 */


// WooCommerce
//require get_template_directory() . '/woocommerce/woocommerce-functions.php';
// WooCommerce End


// Register Nav Walker class_alias
if ( ! function_exists( 'register_navwalker' ) ) :
    function register_navwalker(){
        require_once('inc/class-wp-bootstrap-navwalker.php');
    }
endif;
add_action( 'after_setup_theme', 'register_navwalker' );

// Register Comment List
require_once('inc/comment-list.php');


if ( ! function_exists( 'bootscore_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bootscore_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bootscore, use a find and replace
		 * to change 'bootscore' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bootscore', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Main Menu', 'bootscore' ),
			'secondary' => esc_html__( 'Footer Menu', 'bootscore' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'bootscore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bootscore_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bootscore_content_width', 640 );
}
add_action( 'after_setup_theme', 'bootscore_content_width', 0 );





/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// Widgets
if ( ! function_exists( 'bootscore_widgets_init' ) ) :

    function bootscore_widgets_init() {

        // Top Nav
        register_sidebar(array(
            'name' => esc_html__('Top Nav', 'bootscore' ),
            'id' => 'top-nav',
            'description' => esc_html__('Add widgets here.', 'bootscore' ),
            'before_widget' => '<div class="ms-3">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title d-none">',
            'after_title' => '</div>'
        ));
        // Top Nav End

        // Top Nav Search
        register_sidebar(array(
            'name' => esc_html__('Top Nav Search', 'bootscore' ),
            'id' => 'top-nav-search',
            'description' => esc_html__('Add widgets here.', 'bootscore' ),
            'before_widget' => '<div class="top-nav-search">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title d-none">',
            'after_title' => '</div>'
        ));
        // Top Nav Search End

        // Sidebar
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'bootscore' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 bg-light border-0">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title card-title border-bottom py-2">',
            'after_title'   => '</h2>',
        ) );
        // Sidebar End

        // Top Footer
        register_sidebar(array(
            'name' => esc_html__('Top Footer', 'bootscore' ),
            'id' => 'top-footer',
            'description' => esc_html__('Add widgets here.', 'bootscore' ),
            'before_widget' => '<div class="footer_widget mb-5">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        ));
        // Top Footer End

        // Footer 1
        register_sidebar(array(
            'name' => esc_html__('Footer 1', 'bootscore' ),
            'id' => 'footer-1',
            'description' => esc_html__('Add widgets here.', 'bootscore' ),
            'before_widget' => '<div class="footer_widget mb-4">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title h4">',
            'after_title' => '</h2>'
        ));
        // Footer 1 End

        // Footer 2
        register_sidebar(array(
            'name' => esc_html__('Footer 2', 'bootscore' ),
            'id' => 'footer-2',
            'description' => esc_html__('Add widgets here.', 'bootscore'),
            'before_widget' => '<div class="footer_widget mb-4">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title h4">',
            'after_title' => '</h2>'
        ));
        // Footer 2 End

        // Footer 3
        register_sidebar(array(
            'name' => esc_html__('Footer 3', 'bootscore' ),
            'id' => 'footer-3',
            'description' => esc_html__('Add widgets here.', 'bootscore'),
            'before_widget' => '<div class="footer_widget mb-4">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title h4">',
            'after_title' => '</h2>'
        ));
        // Footer 3 End

        // Footer 4
        register_sidebar(array(
            'name' => esc_html__('Footer 4', 'bootscore' ),
            'id' => 'footer-4',
            'description' => esc_html__('Add widgets here.', 'bootscore'),
            'before_widget' => '<div class="footer_widget mb-4">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title h4">',
            'after_title' => '</h2>'
        ));
        // Footer 4 End

        // 404 Page
        register_sidebar(array(
            'name' => esc_html__('404 Page', 'bootscore' ),
            'id' => '404-page',
            'description' => esc_html__('Add widgets here.', 'bootscore'),
            'before_widget' => '<div class="mb-4">',
            'after_widget' => '</div>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>'
        ));
        // 404 Page End

    }
    add_action( 'widgets_init', 'bootscore_widgets_init' );


endif;
// Widgets End



// Shortcode in HTML-Widget
add_filter( 'widget_text', 'do_shortcode' );
// Shortcode in HTML-Widget End


/**
 * Enqueue scripts and styles.
 */
function bootscore_scripts() {

    // Style CSS
	wp_enqueue_style( 'bootscore-style', get_template_directory_uri() . '/css/theme.css' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/lib/fontawesome.min.css');

	// Bootstrap JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.bundle.min.js', array(), '20151215', true );

    // Theme JS
	wp_enqueue_script( 'bootscore-script', get_template_directory_uri() . '/js/theme.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootscore_scripts' );


// Add <link rel=preload> to Fontawesome
add_filter('style_loader_tag', 'wpse_231597_style_loader_tag');

function wpse_231597_style_loader_tag($tag){

    $tag = preg_replace("/id='font-awesome-css'/", "id='font-awesome-css' online=\"if(media!='all')media='all'\"", $tag);

    return $tag;
}
// Add <link rel=preload> to Fontawesome End


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Amount of posts/products in category
if ( ! function_exists( 'wpsites_query' ) ) :

    function wpsites_query( $query ) {
    if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
            $query->set( 'posts_per_page', 24 );
        }
    }
    add_action( 'pre_get_posts', 'wpsites_query' );

endif;
// Amount of posts/products in category End


// Pagination Categories
function bootscore_pagination($pages = '', $range = 2)
{
	$showitems = ($range * 2) + 1;
	global $paged;
	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;

		if(!$pages)
			$pages = 1;
	}

	if(1 != $pages)
	{
	    echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs mb-4">';


	 	if($paged > 2 && $paged > $range+1 && $showitems < $pages)
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page">&laquo;</a></li>';

	 	if($paged > 1 && $showitems < $pages)
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo;</a></li>';

		for ($i=1; $i <= $pages; $i++)
		{
		    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
		}

		if ($paged < $pages && $showitems < $pages)
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page">&rsaquo;</a></li>';

	 	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page">&raquo;</a></li>';

	 	echo '</ul>';
        echo '</nav>';
        // echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';
	}
}
//Pagination Categories End


// Pagination Buttons Single Posts
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
    $code = 'class="page-link"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}
// Pagination Buttons Single Posts End



// Excerpt to pages
add_post_type_support( 'page', 'excerpt' );
// Excerpt to pages End


// Breadcrumb
if ( ! function_exists( 'the_breadcrumb' ) ) :
    function the_breadcrumb() {
        if(!is_home()) {
            echo '<nav class="breadcrumb mb-4 mt-2 bg-light py-1 px-2 rounded">';
            echo '<a href="'.home_url('/').'">'.('<i class="fas fa-home"></i>').'</a><span class="divider">&nbsp;/&nbsp;</span>';
            if (is_category() || is_single()) {
                the_category(' <span class="divider">&nbsp;/&nbsp;</span> ');
                if (is_single()) {
                    echo ' <span class="divider">&nbsp;/&nbsp;</span> ';
                    the_title();
                }
            } elseif (is_page()) {
                echo the_title();
            }
            echo '</nav>';
        }
    }
    add_filter( 'breadcrumbs', 'breadcrumbs' );
endif;
// Breadcrumb End


// Comment Button
function bootscore_comment_form( $args ) {
    $args['class_submit'] = 'btn btn-outline-primary'; // since WP 4.1
    return $args;
}
add_filter( 'comment_form_defaults', 'bootscore_comment_form' );
// Comment Button End


// Password protected form
function bootscore_pw_form () {
	$output = '
		  <form action="'.get_option('siteurl').'/wp-login.php?action=postpass" method="post" class="form-inline">'."\n"
		.'<input name="post_password" type="password" size="" class="form-control me-2 my-1" placeholder="' . __('Password', 'bootscore') . '"/>'."\n"
		.'<input type="submit" class="btn btn-outline-primary my-1" name="Submit" value="' . __('Submit', 'bootscore') . '" />'."\n"
		.'</p>'."\n"
		.'</form>'."\n";
	return $output;
}
add_filter("the_password_form","bootscore_pw_form");
// Password protected form End


// Allow HTML in term (category, tag) descriptions
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		add_filter( $filter, 'wp_filter_post_kses' );
	}
}

foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}
// Allow HTML in term (category, tag) descriptions End


// Allow HTML in author bio
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter( 'pre_user_description', 'wp_filter_post_kses');
// Allow HTML in author bio End


// Hook after #primary
function bs_after_primary() {
    do_action('bs_after_primary');
}
// Hook after #primary End


// Open links in comments in new tab
if ( ! function_exists( 'bs_comment_links_in_new_tab' ) ) :
    function bs_comment_links_in_new_tab($text)
    {
        return str_replace('<a', '<a target="_blank" rel=”nofollow”', $text);
    }
    add_filter('comment_text', 'bs_comment_links_in_new_tab');
endif;
// Open links in comments in new tab


// disable gutenberg
add_filter('use_block_editor_for_post', '__return_false', 100);
add_filter('use_block_editor_for_post_type', '__return_false', 100);
function example_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );

add_action('pre_get_posts', 'query_post_type');
function query_post_type($query) {
   //Limit to main query, tag queries and frontend
   if($query->is_main_query() && !is_admin() && $query->is_tag ) {

        $query->set( 'post_type', 'bs_recipie' );

   }

}

// acf-pro
//require get_template_directory_uri() . '/inc/acf-loader.php';
require dirname( __FILE__ ) . '/inc/acf-loader.php';

// ACF field groups

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_7209e0c68990d',
        'title' => 'Add your recipe!',
        'fields' => array(
            array(
                'key' => 'field_6209e111c666f',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'text',
                'instructions' => 'Small description of your dish',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => 120,
            ),
            array(
                'key' => 'field_6209e174c6671',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'instructions' => 'Add a image of the dish',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'large',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_6209e196c6672',
                'label' => 'Servings',
                'name' => 'servings',
                'type' => 'number',
                'instructions' => 'How many servings is the dish for (Ex 1,2,4,8)',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_6209e196c6673',
                'label' => 'Prep Time',
                'name' => 'prep',
                'type' => 'text',
                'instructions' => 'How long is the prep time?(Ex 10 min)',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_6209e196c6674',
                'label' => 'Cook Time',
                'name' => 'cook',
                'type' => 'text',
                'instructions' => 'How long is the cooking time?(Ex 15 min)',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_6209e196c6675',
                'label' => 'Total Time',
                'name' => 'total',
                'type' => 'text',
                'instructions' => 'How long is the total time for the dish?(Ex 25 min)',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_6209e1a6c6676',
                'label' => 'Ingredients',
                'name' => 'ingredients',
                'type' => 'repeater',
                'instructions' => 'List the ingredients needed to make the dish(Ex 1 egg)',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_6209e1c0c6676',
                'min' => 1,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Add ingredients',
                'sub_fields' => array(
                    array(
                        'key' => 'field_6209e1c0c6676',
                        'label' => 'Ingredients',
                        'name' => 'ingredients',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_6209e1f2c6677',
                'label' => 'Directions',
                'name' => 'directions',
                'type' => 'wysiwyg',
                'instructions' => 'Make a description how to make the dish like the example 
    EX:
    
    Step 1
    Place eggs in a medium saucepan and cover with cold water. Bring water to a boil and immediately remove from heat. Cover and let eggs stand in hot water for 10 to 12 minutes. Remove from hot water, cool and peel.
   
    ',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'text',
                'media_upload' => 0,
                'toolbar' => 'full',
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'bs_recipie',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'permalink',
            1 => 'the_content',
            2 => 'excerpt',
            3 => 'discussion',
            4 => 'comments',
            5 => 'revisions',
            6 => 'slug',
            7 => 'author',
            8 => 'format',
            9 => 'page_attributes',
            10 => 'featured_image',
            11 => 'categories',
            12 => 'send-trackbacks',
        ),
        'active' => true,
        'description' => '',
    ));
    
    endif;

// CPT
function cptui_register_my_cpts_bs_recipie() {

	/**
	 * Post Type: Recipes.
	 */

	$labels = [
		"name" => __( "Recipes", "bootscore" ),
		"singular_name" => __( "Recipe", "bootscore" ),
	];

	$args = [
		"label" => __( "Recipes", "bootscore" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "bs_recipie", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "post_tag", "recipe_category" ],
		"show_in_graphql" => false,
	];

	register_post_type( "bs_recipie", $args );
}

add_action( 'init', 'cptui_register_my_cpts_bs_recipie' );

function cptui_register_my_taxes_recipe_category() {

	/**
	 * Taxonomy: Recipe Category.
	 */

	$labels = [
		"name" => __( "Recipe Category", "bootscore" ),
		"singular_name" => __( "Recipe Category", "bootscore" ),
		"menu_name" => __( "Recipe categories", "bootscore" ),
		"all_items" => __( "All recipe categories", "bootscore" ),
		"edit_item" => __( "Edit recipe category", "bootscore" ),
		"view_item" => __( "View recipe category", "bootscore" ),
		"update_item" => __( "Update recipe category", "bootscore" ),
		"add_new_item" => __( "Add new recipe category", "bootscore" ),
		"new_item_name" => __( "Add new recipe category name", "bootscore" ),
		"parent_item" => __( "Parent recipe category", "bootscore" ),
		"parent_item_colon" => __( "Parent recipe categories", "bootscore" ),
		"search_items" => __( "Search recipe categories", "bootscore" ),
		"popular_items" => __( "Popular recipe categories", "bootscore" ),
		"separate_items_with_commas" => __( "Separate recipe categories", "bootscore" ),
		"add_or_remove_items" => __( "Add or remove recipe categories", "bootscore" ),
		"choose_from_most_used" => __( "Choose from the most used recipe categories", "bootscore" ),
		"not_found" => __( "No recipe categories found", "bootscore" ),
		"no_terms" => __( "No recipe categories", "bootscore" ),
		"items_list_navigation" => __( "Recipe category list nagivation", "bootscore" ),
		"items_list" => __( "Recipe category list", "bootscore" ),
		"back_to_items" => __( "Back to recipe categories", "bootscore" ),
	];

	
	$args = [
		"label" => __( "Recipe Category", "bootscore" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'recipe_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => true,
		"rest_base" => "recipe_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "recipe_category", [ "bs_recipie" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_recipe_category' );


// adding translation support for bootscore
function bootscore_textdomain() {
    load_theme_textdomain( 'bootscore', get_template_directory() . '/languages' );
    
}
add_action( 'init', 'bootscore_textdomain' );