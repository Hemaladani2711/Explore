<?php
/*
Plugin Name: Logo Carousel Free
Plugin URI: https://shapedplugin.com/plugin/logo-carousel-pro/
Description: Logo Carousel Free
Author: WP Limb
Author URI: http://wplimb.com
Version: 1.3
License: GPL2
Text Domain: logo-carousel-free
*/


/*** SetUp plugin url ***/
define( 'WPL_FREE_PLUGIN_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );


/*** Plugin Scripts and CSS ***/
function wpl_logo_carousel_free_scripts(){
	// CSS Files
	wp_enqueue_style('owl-carousel-css', WPL_FREE_PLUGIN_URL . 'assets/css/owl.carousel.css', array(), NULL);
	wp_enqueue_style('owl-theme-css', WPL_FREE_PLUGIN_URL . 'assets/css/owl.theme.css', array(), NULL);
	wp_enqueue_style('owl-transitions-css', WPL_FREE_PLUGIN_URL . 'assets/css/owl.transitions.css', array(), NULL);
	wp_enqueue_style('lcp-style', WPL_FREE_PLUGIN_URL . 'assets/css/style.css');

	//JS Files
	wp_enqueue_script( 'owl-carousel-main-js', WPL_FREE_PLUGIN_URL . 'assets/js/owl.carousel.min.js', array('jquery'), NULL, TRUE );
}
add_action('wp_enqueue_scripts', 'wpl_logo_carousel_free_scripts');



/*** Including all files ***/
require_once("inc/functions.php");



/* Plugin Action Links */
function wpl_logo_carousel_free_action_links( $links ) {
	$links[] = '<a href="https://shapedplugin.com/plugin/logo-carousel-pro/" style="color: red; font-weight: bold;">Go Pro!</a>';

	return $links;
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wpl_logo_carousel_free_action_links' );


// Redirect after active
function wpl_logo_carousel_free_active_redirect( $plugin ) {
	if ( $plugin == plugin_basename( __FILE__ ) ) {
		exit( wp_redirect( admin_url( 'options-general.php' ) ) );
	}
}

add_action( 'activated_plugin', 'wpl_logo_carousel_free_active_redirect' );


// admin menu
function wpl_logo_carousel_free_options_framwrork() {
	add_options_page( 'Logo Carousel Pro Info', '', 'manage_options', 'wpl-lcf-settings', 'wpl_lcf_options_framwrork' );
}

add_action( 'admin_menu', 'wpl_logo_carousel_free_options_framwrork' );


if ( is_admin() ) : // Load only if we are viewing an admin page

	function wpl_logo_carousel_free_register_settings() {
		// Register settings and call sanitation functions
		register_setting( 'wpl_lcf_p_options', 'wpl_lcf_options', 'wpl_lcf_validate_options' );
	}

	add_action( 'admin_init', 'wpl_logo_carousel_free_register_settings' );


// Function to generate options page
	function wpl_lcf_options_framwrork() {

		if ( ! isset( $_REQUEST['updated'] ) ) {
			$_REQUEST['updated'] = false;
		} // This checks whether the form has just been submitted. ?>


		<div class="wrap about-wrap">

			<h1>Welcome to Logo Carousel Free 1.3</h1>

			<div class="about-text">Thank you for using our Logo Carousel Free plugin.</div>


			<hr>

			<h3>Want some cool features of this plugin?</h3>

			<p>We've added many extra features in our <a href="https://shapedplugin.com/plugin/logo-carousel-pro/">premium version</a> of this
				plugin. Let see some amazing features. <a href="https://shapedplugin.com/plugin/logo-carousel-pro/">Buy Premium Version Now.</a></p>


			<div class="feature-section two-col">
				<h2>Pro Version Advanced Features & Benefits</h2>
				<div class="col">
					<ul>
						<li><span class="dashicons dashicons-yes"></span> Advanced easy shortcode Generator</li>
						<li><span class="dashicons dashicons-yes"></span> Unlimited carousel anywhere</li>
						<li><span class="dashicons dashicons-yes"></span> Logo carousel from specific categories</li>
						<li><span class="dashicons dashicons-yes"></span> Set Number of Columns you want to show</li>
						<li><span class="dashicons dashicons-yes"></span> Unlimited Custom color (Brand Color)</li>
						<li><span class="dashicons dashicons-yes"></span> Carousel AutoPlay on/off</li>
						<li><span class="dashicons dashicons-yes"></span> Carousel Stop on Hover</li>

					</ul>
				</div>
				<div class="col">
					<ul>
						<li><span class="dashicons dashicons-yes"></span> External link opening with new tab option</li>
						<li><span class="dashicons dashicons-yes"></span> Stylish navigation arrows</li>
						<li><span class="dashicons dashicons-yes"></span> Carousel slide time option</li>
						<li><span class="dashicons dashicons-yes"></span> Navigation show/hide options</li>
						<li><span class="dashicons dashicons-yes"></span> Pagination show/hide options</li>
						<li><span class="dashicons dashicons-yes"></span> 2 (Two) different styles for pagination
							(number, bullet)</li>
						<li><span class="dashicons dashicons-yes"></span> Premium Priority support (24/7)</li>
					</ul>
				</div>
			</div>

			<h2><a href="https://shapedplugin.com/plugin/logo-carousel-pro/" class="button button-primary button-hero">Buy Premium Version Now.</a>
			</h2>
			<br>
			<br>
			<br>
			<br>

		</div>

		<?php
	}


endif;  // EndIf is_admin()


register_activation_hook( __FILE__, 'wplimb_lcf_activate' );
add_action( 'admin_init', 'wplimb_lcf_redirect' );

function wplimb_lcf_activate() {
	add_option( 'wplimb_lcf_activation_redirect', true );
}

function wplimb_lcf_redirect() {
	if ( get_option( 'wplimb_lcf_activation_redirect', false ) ) {
		delete_option( 'wplimb_lcf_activation_redirect' );
		if ( ! isset( $_GET['activate-multi'] ) ) {
			wp_redirect( "options-general.php?page=wpl-lcf-settings" );
		}
	}
}