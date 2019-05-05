<?php

function amulet_resources() {

	wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'amulet_resources');




//Get top ancestor
function get_top_ancestor_id() {

	global $post;

	if ($post->post_parent) {

		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}
	return $post->ID;

}

//Does page nas children?
function has_children() {

	global $post;

	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);

}

// Customize excerpt words count length
function custom_excerpt_length() {
	return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

// Theme setup
function AmuletShop_setup() {

	// Navigation Menu
	register_nav_menus(array(
		'primary' => __( 'Primary Menu'),
		'footer' => __( 'Footer Menu'),
	));

	// Add featured image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('banner-image', 920, 210, true);
	// Если нажо обрезать верх
	// add_image_size('banner-image', 920, 210, array('left', 'top'));

	// Делаем поддержку различных форматов постов
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link') );
}

add_action('after_setup_theme', 'AmuletShop_setup');

// Add Our Widjet Locations
function ourWidgetsInit() {

	register_sidebar( array(

		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="my-special-class">',
		'after_title' => '</h4>'
		));

	register_sidebar( array(

		'name' => 'Footer Area 1',
		'id' => 'footer1'
		));

	register_sidebar( array(

		'name' => 'Footer Area 2',
		'id' => 'footer2'
		));

	register_sidebar( array(

		'name' => 'Footer Area 3',
		'id' => 'footer3'
		));

	register_sidebar( array(

		'name' => 'Footer Area 4',
		'id' => 'footer4'
		));

}

add_action('widgets_init', 'ourWidgetsInit');

// Customize Appearance Options
function amuletShop_customize_register( $wp_customize ) {
	
	$wp_customize->add_setting('as_link_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh'
	));

	$wp_customize->add_setting('as_btn_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh'
	));

	$wp_customize->add_setting('as_btn_hover_color', array(
		'default' => '#2b00ef',
		'transport' => 'refresh'
	));

	$wp_customize->add_section('as_standard_colors', array(
		'title' => __('Standard Colors', 'AmuletShop'),
		'priority' => 30
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'as_link_color_control', array(
		'label' => __('Link Color', 'AmuletShop'),
		'section' => 'as_standard_colors',
		'settings' => 'as_link_color'
	)));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'as_btn_color_control', array(
		'label' => __('Button Color', 'AmuletShop'),
		'section' => 'as_standard_colors',
		'settings' => 'as_btn_color'
	)));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'as_btn_hover_color_control', array(
		'label' => __('Button Color', 'AmuletShop'),
		'section' => 'as_standard_colors',
		'settings' => 'as_btn_hover_color'
	)));
}

add_action('customize_register', 'amuletShop_customize_register');

// Output Customize CSS
function AmuletShop_customize_css() { ?>

	<style type="text/css">
		
		a:link,
		a:visited {
			color: <?php echo get_theme_mod('as_link_color'); ?>;
		}

		.site-header nav ul li.current-menu-item a:link,
		.site-header nav ul li.current-menu-item a:visited,
		.site-header nav ul li.current-page-ancestor a:link,
		.site-header nav ul li.current-page-ancestor a:visited {
			background-color: <?php echo get_theme_mod('as_link_color'); ?>;
		}

		div.header-search #searchsubmit {
			background-color: <?php echo get_theme_mod('as_btn_color'); ?>;
		}

		div.header-search #searchsubmit:hover {
			background-color: <?php echo get_theme_mod('as_btn_hover_color'); ?>;
		}

	</style>

<?php }

add_action('wp_head', 'AmuletShop_customize_css');

// Add Footer callout section to the admin appearance customize screen
function as_footer_callout( $wp_customize ) {
	$wp_customize->add_section('as-footer-callout-section', array(
		'title' => 'Footer Callout'
	));

	// it's displayed-or-not toggle
	$wp_customize->add_setting('as-footer-callout-display', array(
		'default' => 'No'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'as-footer-callout-display-control', array(
		'label' => 'Display this section?',
		'section' => 'as-footer-callout-section',
		'settings' => 'as-footer-callout-display',
		'type' => 'select',
		'choices' => array('No' => 'No', 'Yes' => 'Yes')
	)));

	// header
	$wp_customize->add_setting('as-footer-callout-headline', array(
		'default' => 'Example Headline Text!'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'as-footer-callout-headline-control', array(
		'label' => 'Headline',
		'section' => 'as-footer-callout-section',
		'settings' => 'as-footer-callout-headline'
	)));

	// text area
	$wp_customize->add_setting('as-footer-callout-text', array(
		'default' => 'Example paragraph text!'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'as-footer-callout-text-control', array(
		'label' => 'Text',
		'section' => 'as-footer-callout-section',
		'settings' => 'as-footer-callout-text',
		'type' => 'textarea'
	)));

	// link
	$wp_customize->add_setting('as-footer-callout-link');

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'as-footer-callout-link-control', array(
		'label' => 'Link',
		'section' => 'as-footer-callout-section',
		'settings' => 'as-footer-callout-link',
		'type' => 'dropdown-pages'
	)));

		// an image
	$wp_customize->add_setting('as-footer-callout-image');

	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'as-footer-callout-image-control', array(
		'label' => 'Image',
		'section' => 'as-footer-callout-section',
		'settings' => 'as-footer-callout-image',
		'width' => 750,
		'height' => 500
	)));
}

add_action('customize_register', 'as_footer_callout');