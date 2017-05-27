<?php

// show shortcode
add_filter( 'views_edit-logo-carousel-free', function( $view_shortcode )
{
	echo '<p>Shortcode <code>[logo_carousel_free id="01"]</code></p>';

	return $view_shortcode;
} );

// Register Logo Carousel Free Post type
function wpl_logo_carousel_free_post_type() {

	$labels = array(
		'name'                => __( 'Logos', 'logo-carousel-free' ),
		'singular_name'       => __( 'Logo', 'logo-carousel-free' ),
		'add_new'             => _x( 'Add New Logo', 'logo-carousel-free', 'logo-carousel-free' ),
		'add_new_item'        => __( 'Add New Logo', 'logo-carousel-free' ),
		'edit_item'           => __( 'Edit Logo', 'logo-carousel-free' ),
		'new_item'            => __( 'New Logo', 'logo-carousel-free' ),
		'view_item'           => __( 'View Logo', 'logo-carousel-free' ),
		'search_items'        => __( 'Search Logo', 'logo-carousel-free' ),
		'not_found'           => __( 'No Logo found', 'logo-carousel-free' ),
		'not_found_in_trash'  => __( 'No Logo found in Trash', 'logo-carousel-free' ),
		'parent_item_colon'   => __( 'Parent Logo:', 'logo-carousel-free' ),
		'menu_name'           => __( 'Logo Carousel Free', 'logo-carousel-free' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-images-alt2',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'thumbnail'
		)
	);

	register_post_type( 'logo-carousel-free', $args );
}

add_action( 'init', 'wpl_logo_carousel_free_post_type' );




// Carousel custom post image settings
add_theme_support( 'post-thumbnails', array( 'logo-carousel-free' ) );


// logo carousel shortcode
function wpl_logo_carousel_free_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'id'          => '01',
		'bullets'     => 'true',
	), $atts, 'logo_carousel_free' ) );



	$que = new WP_Query(
		array( 'posts_per_page' => '-1', 'post_type' => 'logo-carousel-free' )
	);

	$outline = '';

	$outline .= '
    <script type="text/javascript">
    jQuery(document).ready(function() {
		jQuery("#wpl-logo-carousel' . $id . '").owlCarousel({
			items: 5,
			navigation: false,
			autoHeight: false,
			autoPlay:  true,
			transitionStyle: "fade",
			pagination: ' . $bullets . ',
			stopOnHover: false,
		});

    });
    </script>';


	$outline .='<div id="wpl-logo-carousel'. $id .'" class="wpl-logo-carousel">';
		while ( $que->have_posts() ) : $que->the_post();
			$ids = get_the_ID();
			$lcp_image    = get_the_post_thumbnail_url( $ids, 'large', false );

			$outline .='<div class="wpl-logo"><img src="'. $lcp_image .'" alt="'. get_the_title().'" title="'. get_the_title().'" /></div>';
		endwhile;
	$outline .='</div>';


	wp_reset_query();

	return $outline;


}

add_shortcode( 'logo_carousel_free', 'wpl_logo_carousel_free_shortcode' );


