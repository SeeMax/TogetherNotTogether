<?php

//////////////  SEEMAXWORK  /////////////////
////////// GENERAL WORDPRESS FIXES /////////
///////////////////////////////////////////

// Add basic theme support
function seemax_setup()
{
    add_editor_style();
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'seemax_setup');

/*	ALLOW SVG UPLOAD XMLRPC 	*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

function seemax_add_parent_body_class($classes) {
    // You can modify this check so it will run on every post type
    if (is_page()) {
        global $post;

        // If we *do* have an ancestors list, process it
        // http://codex.wordpress.org/Function_Reference/get_post_ancestors
        if ($parents = get_post_ancestors($post->ID)) {
            foreach ((array)$parents as $parent) {
                // As the array contains IDs only, we need to get each page
                if ($page = get_page($parent)) {
                    // Add the current ancestor to the body class array
                    $classes[] = "{$page->post_name}-{$page->post_type}-style";
                }
            }
        }

        // Add the current page to our body class array
        $classes[] = "{$post->post_type}-{$post->post_name}";
    }

    return $classes;
}
add_filter('body_class', 'seemax_add_parent_body_class');


// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)="d*"s/', "", $html);
    return $html;
}


///////////////  SEEMAXWORK  ////////////////
////////// WP-ADMIN EMOJI STUFF ////////////
///////////////////////////////////////////

/* 	Disable the emoji's 	*/
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/**
* REMOVE EMOJIS
* @param array $plugins
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array( 'wpemoji' ));
    } else {
        return array();
    }
}

/* Remove emoji CDN hostname from DNS prefetching hints.*/
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array( $emoji_svg_url ));
    }
    return $urls;
}

/*	DISABLE XMLRPC 	*/
add_filter('xmlrpc_enabled', '__return_false');


///////////////  WORDPRESS  /////////////////
/////////// JS AND CSS LIBRARIES ///////////
///////////////////////////////////////////

/* Enqueue Scripts */
function theme_header_scripts() {
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    // wp_register_script('ScrollMagic', get_template_directory_uri() . '/js/lib/ScrollMagic.min.js', array(), '2.0.6', true);
    // wp_enqueue_script('ScrollMagic');

    // wp_register_script('ScrollMagicGSAP', get_template_directory_uri() . '/js/lib/animation.gsap.min.js', array(), '2.0.6', true);
    // wp_enqueue_script('ScrollMagicGSAP');

    // wp_register_script('attrGSAP', get_template_directory_uri() . '/js/lib/AttrPlugin.min.js', array(), '0.6.0', true);
    // wp_enqueue_script('attrGSAP');

    // wp_register_script('CSSPlugin', get_template_directory_uri() . '/js/lib/CSSPlugin.min.js', array(), '0.1.3', true);
    // wp_enqueue_script('CSSPlugin');

    // wp_register_script('DrawSVGPlugin', get_template_directory_uri() . '/js/lib/DrawSVGPlugin.min.js', array(), '0.1.3', true);
    // wp_enqueue_script('DrawSVGPlugin');

    wp_register_script('DrawSVGPlugin', get_template_directory_uri() . '/js/lib/SplitText.min.js', array(), '0.1.3', true);
    wp_enqueue_script('DrawSVGPlugin');

    // wp_register_script('imagesLoaded', get_template_directory_uri() . '/js/lib/imagesLoaded.js', array(), '4.1.1', true);
    // wp_enqueue_script('imagesLoaded');

    // wp_register_script('isotope', get_template_directory_uri() . '/js/lib/isotope.js', array(), '3.0.4', true);
    //  wp_enqueue_script('isotope'); // Enqueue it!

    // wp_register_script('lightbox', get_template_directory_uri() . '/js/lib/lity.min.js', array(), '', true);
    // wp_enqueue_script('lightbox'); // Enqueue it!

    // wp_register_script('MorphSVGPlugin', get_template_directory_uri() . '/js/lib/MorphSVGPlugin.min.js', array(), '', true);
    // wp_enqueue_script('MorphSVGPlugin');

    // wp_register_script('slickslider', get_template_directory_uri() . '/js/lib/slick.js', array('jquery'), '1.6.0', true);
    // wp_enqueue_script('slickslider');

    //  wp_register_script('SmoothScroll', get_template_directory_uri() . '/js/lib/smooth-scroll.js', array(), '0.131', true);
    //  wp_enqueue_script('SmoothScroll');

    wp_register_script('gsap', get_template_directory_uri() . '/js/lib/gsap.min.js', array(), '1.19.1', true);
    wp_enqueue_script('gsap');

    // ENQUEUE COMPILED SCRIPTS
    wp_register_script('themescripts', get_template_directory_uri() . '/scripts.js', array('jquery'), '1.0.0');
    wp_enqueue_script('themescripts');
  }
}


/* UPGRADE JQUERY */
function modify_jquery_version()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery',
'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery_version');


/* Enqueue Styles */
function theme_style() {
  wp_enqueue_style( 'google-fonts', "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,300;1,400&display=swap", false );

  wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '5.5', 'all');
  wp_enqueue_style('fontawesome'); // Enqueue it!

  wp_register_style('themefonts', get_template_directory_uri() . '/fonts/fonts.css', array(), '1.0', 'all');
  wp_enqueue_style('themefonts'); // Enqueue it!

  wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '7.0', 'all');
  wp_enqueue_style('normalize'); // Enqueue it!

  wp_register_style('SlickSlider', get_template_directory_uri() . '/css/slick.css', array(), '1.0', 'all');
  wp_enqueue_style('SlickSlider'); // Enqueue it!

  wp_register_style('SlickTheme', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.0', 'all');
  wp_enqueue_style('SlickTheme'); // Enqueue it!

  //wp_register_style('lightbox', get_template_directory_uri() . '/css/lity.min.css', array(), '0.131', 'all');
  //wp_enqueue_style('lightbox'); // Enqueue it!

  wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

}
add_action('wp_enqueue_scripts', 'theme_style');


///////////////  WORDPRESS  /////////////////
////// ACTIONS, FILTERS, & SHORTCODES //////
///////////////////////////////////////////

// Add Actions
add_action('init', 'theme_header_scripts'); // Add Custom Scripts to wp_head
// add_action('wp_enqueue_scripts', 'theme_styles'); // Add Theme Stylesheet
add_action('init', 'html5wp_pagination'); // Add HTML5 Pagination
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


///////////////  SEEMAXWORK  ////////////////
///////// WP-ADMIN CUSTOMIZATION  //////////
///////////////////////////////////////////

/*	CUSTOMIZE ADMIN LOGIN 	*/
function custom_login_logo()
{
  $blog_title = get_bloginfo( 'name' );
  echo
  "<style type='text/css'>
	h1 a {
    background-image: url('.get_template_directory_uri().'/img/logo-admin.png) !important; display:none !important;
  }

  h1::after {
    content:'$blog_title Login';
    position:relative;
    line-height:2;
  }
	</style>";
}
add_action('login_head', 'custom_login_logo');


/*	CUSTOMIZE ADMIN FOOTER 	*/
function remove_footer_admin()
{
  echo '<span id="footer-thankyou"> A Custom Theme By <a target="_blank" href="http://www.seemax.work">SeeMaxWork</a> </span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/* ADMIN AREA CLEANUP AND GLOBAL MODS */
function remove_dashboard_meta()
{
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action('admin_init', 'remove_dashboard_meta');

/* DASHBOARD CLEANUP */
if (!function_exists('disable_default_dashboard_widgets')) {
    function disable_default_dashboard_widgets()
    {
        global $wp_meta_boxes;
        // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);    // Right Now Widget
        unset($wp_meta_boxes['dashboard']['normal']['core']['welcome_panel']);        // Activity Widget
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);    // Quick Press Widget
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //
        // remove plugin dashboard boxes
        // unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);           // Yoast's SEO Plugin Widget
        // unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);        // Gravity Forms Plugin Widget
        // unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);   // bbPress Plugin Widget
    }
    add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets');
}

// Remove Wordpress Main Menu Items
function remove_menus(){

  if ( is_user_logged_in() ) {
    // $current_user = wp_get_current_user();
    // if (!in_array($current_user->ID, array(1))) {

    remove_menu_page( 'edit.php' );                  //Posts
    // remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit.php?post_type=ai1wm_export' );    //Pages
    remove_menu_page( 'index.php' );                  //Dashboard
    // remove_menu_page( 'jetpack' );                    //Jetpack*
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    // remove_menu_page( 'options-general.php' );        //Settings
    // remove_menu_page('edit.php?post_type=acf-field-group');      //ACF
    // }
  }
}
add_action( 'admin_menu', 'remove_menus', 9999);


//////////////  SEEMAXWORK  /////////////////
/////// CUSTOMIZE WORDPRESS FEATURES ///////
///////////////////////////////////////////


//function to call first uploaded image in functions file?
function main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
        $template=get_template_directory();
        $the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='frame' />";
  endif;
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}


// CUSTOM EXCERPT STYLES //
function seemax_custom_excerpt_length( $length ) {
   return 70;
}
add_filter( 'excerpt_length', 'seemax_custom_excerpt_length', 999 );

function seemax_custom_excerpt_more($more) {
   global $post;
   return '<a href="'. get_permalink($post->ID) . '">'. __('...') .'</a>';
}
add_filter('excerpt_more', 'seemax_custom_excerpt_more');

// CHILD CPT MENU PARENT HIGHLIGHT //
function add_current_nav_class($classes, $item) {
	// Getting the current post details
	global $post;
	// Getting the post type of the current post
	$current_post_type = get_post_type_object(get_post_type($post->ID));
	$current_post_type_slug = $current_post_type->rewrite[slug];
	// Getting the URL of the menu item
	$menu_slug = strtolower(trim($item->url));
	// If the menu item URL contains the current post types slug add the current-menu-item class
	if (strpos($menu_slug,$current_post_type_slug) !== false) {
	   $classes[] = 'current-menu-item';
	}
	// Return the corrected set of classes to be added to the menu item
	return $classes;
}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );


// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text'=> 'Previous',
        'next_text'=> 'Next'
    ));
}

/* Modify Main Nav Styles */
function main_theme_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'nav navMenu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}

/* Modify Custom Nav Styles
function extra_theme_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'custom-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'nav navMenu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}  */


/* CUSTOM MENUS

function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'our-foods-footer' => __('Our Foods Footer'),
      'about-us-footer' => __('About Us Footer'),
      'find-us-footer' => __('Find Us Footer')
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );
*/

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'theme'), // Main Navigation
        'footer-menu' => __('Footer Menu', 'theme'), // Sidebar Navigation
        'custom-menu' => __('Custom Menu', 'theme') // Sidebar Navigation
    ));
}


///////////////  SEEMAXWORK  ////////////////
///////// ACFS, CPTS, TAXONOMIES,  /////////
///////////////////////////////////////////

/*	ACF OPTIONS PAGES*/
if (function_exists('acf_add_options_page')) {
    // acf_add_options_page(array(
    //     'page_title'    => 'Contact Info',
    //     'menu_title'    => 'Contact Info',
    //     'menu_slug'    => 'global_options',
    //     'capability'    => 'edit_posts',
    //     'redirect'    => false,
    //     'icon_url' => 'dashicons-media-spreadsheet',
    //     'position' => 6
    // ));

    acf_add_options_page(array(
        'page_title'    => 'Hero Section',
        'menu_title'    => 'Hero Section',
        'menu_slug'    => 'hero_options',
        'capability'    => 'edit_posts',
        'redirect'    => false,
        'icon_url' => 'dashicons-editor-aligncenter',
        'position' => 4
    ));

    acf_add_options_page(array(
        'page_title'    => 'About Section',
        'menu_title'    => 'About Section',
        'menu_slug'    => 'about_options',
        'capability'    => 'edit_posts',
        'redirect'    => false,
        'icon_url' => 'dashicons-editor-alignright',
        'position' => 5
    ));

    acf_add_options_page(array(
        'page_title'    => 'Nominate Section',
        'menu_title'    => 'Nominate Section',
        'menu_slug'    => 'nominate_options',
        'capability'    => 'edit_posts',
        'redirect'    => false,
        'icon_url' => 'dashicons-editor-alignleft',
        'position' => 5
    ));

    acf_add_options_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'menu_slug'    => 'footer_options',
        'capability'    => 'edit_posts',
        'redirect'    => false,
        'icon_url' => 'dashicons-editor-insertmore',
        'position' => 6
    ));

    acf_add_options_page(array(
        'page_title'    => '404 Page Text',
        'menu_title'    => '404 Page Text',
        'menu_slug'    => 'fourohfour_options',
        'capability'    => 'edit_posts',
        'redirect'    => false,
        'icon_url' => 'dashicons-welcome-comments',
        'position' => 6
    ));

}

/*  ACF GLOBAL	*/
function is_post_type($type)
{
    global $wp_query;
    if ($type == get_post_type($wp_query->post->ID)) {
        return true;
    }
    return false;
}


/* CUSTOM POST TYPES  */
function seemax_blocks_create_post_type()
{
   register_post_type('creatives',
   // CPT Options
       array(
           'labels' => array(
               'name' => __('Creatives'),
               'singular_name' => __('Creative')
           ),
           'public' => true,
           'menu_icon' => 'dashicons-id',
           // 'has_archive' => true,
           'show_in_rest' => true,
           'supports' => array('title','editor', 'thumbnail'),
       )
   );
}
add_action('init', 'seemax_blocks_create_post_type');


add_filter('enter_title_here', 'my_title_place_holder' , 20 , 2 );
function my_title_place_holder($title , $post){

    if( $post->post_type == 'creatives' ){
        $my_title = "Creative's Name";
        return $my_title;
    }

    return $title;

}


/* 	CPT TAXONOMIES 	*/
add_action('init', 'add_events_taxonomies');

function add_events_taxonomies()
{
   $labels = array(
       'name'            => 'Locations',
       'singular_name'   => 'Location',
       'search_items'    => 'Search Locations',
       'edit_item'       => 'Edit Location',
       'update_item'     => 'Update Location',
       'add_new_item'     => 'Add New Location',
       'new_item_name'    => 'New Location',
       'menu_name'        => 'Locations',
   );
   $args = array(
       'labels'            => $labels,
       'public'            =>  true,
       'hierarchical'      =>  true,
       'show_in_nav_menus' =>  true,
      	'has_archive'       =>  true,
       'show_ui'           =>  true,
       'show_admin_column' =>  true,
       'rewrite'           =>  array('slug' => 'event-type', 'with_front' => false),
   );
   register_taxonomy('event-type', array('events', 'books'), $args);
}

add_action('init', 'add_books_taxonomies');

function add_books_taxonomies()
{
   $labels = array(
       'name'            => 'Themes',
       'singular_name'   => 'Theme',
       'search_items'    => 'Search Themes',
       'edit_item'       => 'Edit Theme',
       'update_item'     => 'Update Theme',
       'add_new_item'     => 'Add New Theme',
       'new_item_name'    => 'New Theme',
       'menu_name'        => 'Themes',
   );
   $args = array(
       'labels'            => $labels,
       'public'            =>  true,
       'hierarchical'      =>  true,
       'show_in_nav_menus' =>  true,
      	'has_archive'       =>  true,
       'show_ui'           =>  true,
       'show_admin_column' =>  true,
       'rewrite'           =>  array('slug' => 'book-theme', 'with_front' => false),
   );
   register_taxonomy('book-theme', array('themes', 'books'), $args);
}


//////////////  SEEMAXWORK  ///////////////
///// ACF GUTTENBERG CUSTOMIZATION  //////
/////////////////////////////////////////

// Register Guttenberg Blocks for ACF - SeeMaxWork
function register_acf_block_types() {

    acf_register_block_type(array(
        'name'              => 'creatives-section',
        'title'             => __('Creative Details'),
        'description'       => __('Add people to the list'),
        'category'          => 'layout',
        'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M4.7,3.2h1.6v3.8H10V3.2h1.6v8.2H10V8.5H6.3v2.9H4.7V3.2z"/><path d="M13.3,3.2h6v1.4h-4.4v2.1h3.7v1.4h-3.7V10h4.6v1.4h-6.2V3.2z"/><path d="M9.4,20.9l-1.6-2.3H7.6H6.1v2.3H4.5v-8.2h3.3c2.2,0,3.3,1,3.3,2.9c0,1.3-0.6,2.2-1.6,2.6l1.9,2.6H9.4z M9.4,15.7	c0-1-0.5-1.6-1.7-1.6H6.1v3h1.4C8.8,17.2,9.4,16.6,9.4,15.7z"/><path d="M12.1,16.8c0-2.5,1.7-4.3,4.3-4.3c2.6,0,4.4,1.7,4.4,4.3c0,2.5-1.7,4.3-4.4,4.3C13.8,21,12.1,19.4,12.1,16.8z M19.1,16.8	c0-1.6-1-2.7-2.7-2.7c-1.5,0-2.6,1.1-2.6,2.7c0,1.6,1,2.7,2.6,2.7C18,19.5,19.1,18.4,19.1,16.8z"/><path d="M22,2v20H2V2H22 M24,0H0v24h24V0L24,0z"/></svg>',
        'keywords'          => array( 'creatives', 'people' ),
        'mode'               => 'auto',
        'align'             => 'full',
        'render_template'   => get_template_directory() . '/blocks/layout/creatives-block/creatives-block.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/layout/creatives-block/creatives-block.css',
        'enqueue_script'    => get_template_directory_uri() . '/blocks/layout/creatives-block/creatives-block.js',
    ));

    acf_register_block_type(array(
        'name'              => 'hero-section',
        'title'             => __('Hero - Full Width Image'),
        'description'       => __('Add a bold image and text - For the start of The page'),
        'category'          => 'layout',
        'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M4.7,3.2h1.6v3.8H10V3.2h1.6v8.2H10V8.5H6.3v2.9H4.7V3.2z"/><path d="M13.3,3.2h6v1.4h-4.4v2.1h3.7v1.4h-3.7V10h4.6v1.4h-6.2V3.2z"/><path d="M9.4,20.9l-1.6-2.3H7.6H6.1v2.3H4.5v-8.2h3.3c2.2,0,3.3,1,3.3,2.9c0,1.3-0.6,2.2-1.6,2.6l1.9,2.6H9.4z M9.4,15.7	c0-1-0.5-1.6-1.7-1.6H6.1v3h1.4C8.8,17.2,9.4,16.6,9.4,15.7z"/><path d="M12.1,16.8c0-2.5,1.7-4.3,4.3-4.3c2.6,0,4.4,1.7,4.4,4.3c0,2.5-1.7,4.3-4.4,4.3C13.8,21,12.1,19.4,12.1,16.8z M19.1,16.8	c0-1.6-1-2.7-2.7-2.7c-1.5,0-2.6,1.1-2.6,2.7c0,1.6,1,2.7,2.6,2.7C18,19.5,19.1,18.4,19.1,16.8z"/><path d="M22,2v20H2V2H22 M24,0H0v24h24V0L24,0z"/></svg>',
        'keywords'          => array( 'hero', 'image' ),
        'mode'               => 'auto',
        'align'             => 'full',
        'render_template'   => get_template_directory() . '/blocks/layout/hero-section/hero-section.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/layout/hero-section/hero-section.css',
        'enqueue_script'    => get_template_directory_uri() . '/blocks/layout/hero-section/hero-section.js',
    ));

    acf_register_block_type(array(
        'name'              => 'side-by-side-section',
        'title'             => __('Side By Side'),
        'description'       => __('Add Text / CTA  and Images side by side'),
        'category'          => 'layout',
        'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M12,0H0v24h12h12V0H12z M11,22H2V2h9V22z M22,22h-9V2h9V22z"/></svg>',
        'keywords'          => array( 'side', 'image' ),
        'mode'               => 'auto',
        'align'             => 'full',
        'render_template'   => get_template_directory() . '/blocks/layout/side-by-side-section/side-by-side-section.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/layout/side-by-side-section/side-by-side-section.css',
        'enqueue_script'    => get_template_directory_uri() . '/blocks/layout/side-by-side-section/side-by-side-section.js',
    ));

    acf_register_block_type(array(
        'name'              => 'news-preview-section',
        'title'             => __('News Previews'),
        'description'       => __('Choose the Recent News to preview'),
        'category'          => 'layout',
        'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><rect width="6.6" height="4.4"/><rect x="1" y="5.2" width="4.6" height="0.7"/><rect x="1" y="6.9" width="4.6" height="0.7"/><rect x="1" y="8.6" width="4.6" height="0.7"/><rect x="7.7" width="6.6" height="4.4"/><rect x="8.7" y="5.2" width="4.6" height="0.7"/><rect x="8.7" y="6.9" width="4.6" height="0.7"/><rect x="8.7" y="8.6" width="4.6" height="0.7"/><rect x="15.4" width="6.6" height="4.4"/><rect x="16.4" y="5.2" width="4.6" height="0.7"/><rect x="16.4" y="6.9" width="4.6" height="0.7"/><rect x="16.4" y="8.6" width="4.6" height="0.7"/></svg>',
        'keywords'          => array( 'news', 'newsroom', 'card' ),
        'mode'               => 'auto',
        'align'             => 'full',
        'render_template'   => get_template_directory() . '/blocks/layout/news-preview-section/news-preview-section.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/layout/news-preview-section/news-preview-section.css',
        'enqueue_script'    => get_template_directory_uri() . '/blocks/layout/news-preview-section/news-preview-section.js',
    ));

    acf_register_block_type(array(
        'name'              => 'featured-hero-section',
        'title'             => __('Hero - Featured Content'),
        'description'       => __('Choose featured content for the start of the page'),
        'category'          => 'layout',
        'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M23.5,0.5v23h-23v-23H23.5 M24,0H0v24h24V0L24,0z"/><path d="M7.7,6.4h2.1v4.9h4.7V6.4h2.1v10.4h-2.1V13H9.7v3.7H7.7V6.4z"/><polygon points="19.4,15 18.4,14 20.4,12 18.4,10 19.4,9 22.4,12 "/><polygon points="4.8,9 5.8,10 3.8,12 5.8,14 4.8,15 1.8,12 "/></svg>',
        'keywords'          => array( 'hero', 'featured', 'chart'),
        'mode'               => 'auto',
        'align'             => 'full',
        'render_template'   => get_template_directory() . '/blocks/layout/featured-hero-section/featured-hero-section.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/layout/featured-hero-section/featured-hero-section.css',
        'enqueue_script'    => get_template_directory_uri() . '/blocks/layout/featured-hero-section/featured-hero-section.js',
    ));

    acf_register_block_type(array(
        'name'              => 'quote-carousel-section',
        'title'             => __('Quote Carousel'),
        'description'       => __('Choose Quotes to Highlight on the page'),
        'category'          => 'layout',
        'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><rect width="7.1" height="8.3"/><rect x="8.3" y="0.3" width="14.3" height="1.2"/><rect x="8.3" y="3.2" width="14.3" height="1.2"/><rect x="8.3" y="6.1" width="14.3" height="1.2"/><rect x="8.3" y="9.5" width="4.5" height="1.2"/></svg>',
        'keywords'          => array( 'quotes', 'highlights', 'quote'),
        'mode'               => 'auto',
        'align'             => 'full',
        'render_template'   => get_template_directory() . '/blocks/layout/quote-carousel-section/quote-carousel-section.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/layout/quote-carousel-section/quote-carousel-section.css',
        'enqueue_script'    => get_template_directory_uri() . '/blocks/layout/quote-carousel-section/quote-carousel-section.js',
    ));
}

// Check if Guttneberg ACF block function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}

// ADD MAIN STYLE.CSS TO ADMIN AREA FOR PROPER GUTTENBERG STYLING //
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/style.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// RESTRICT GUTTENBERG BLOCK TYPES //
function seemax_allowed_block_types( $allowed_blocks, $post ) {
//   // Only Show Core Blocks for Building Posts
//   $allowed_blocks = array(
// 		'core/image',
// 		'core/heading',
//     'core/paragraph',
//     'core/quote',
// 	);
//   // Only Show Custom ACF Blocks for Building Pages
	if( $post->post_type === 'creatives' ) {
		$allowed_blocks = array(
  		// 'acf/creatives-section',
      // 'acf/side-by-side-section',
      // 'acf/news-preview-section',
      // 'acf/featured-hero-section',
      // 'acf/quote-carousel-section',
  	);
	}
	return $allowed_blocks;
}
add_filter( 'allowed_block_types', 'seemax_allowed_block_types', 10, 2 );

// Remove Jetpack Open Graph //
add_filter( 'jetpack_enable_open_graph', '__return_false' );

//////////////  SEEMAXWORK  ///////////////
//// PROJECT SPECIFIC CUSTOMIZATION  /////
/////////////////////////////////////////
