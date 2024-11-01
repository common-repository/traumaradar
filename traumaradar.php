<?php
/**
 * Plugin Name:       TraumaRadar
 * Description:       Ga naar je Pagina of Post > Voeg blok toe > Zoek naar "TraumaRadar Map" (vanaf Wordpress 6.6) of voeg de ShortCode toe. Widget waarmee je een vlucht van een trauma-, ambulance-, politie of kustwachtheli kunt tonen. 
 * Requires at least: 5.0
 * Requires PHP:      5.6
 * Version:           1.0.5
 * Author:            <a href="traumaradar.nl">TraumaRadar.nl</a>
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       traumaradar
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * notices
 */
require_once plugin_dir_path(__FILE__) . '/build/notices/render.php';

/**
 * settings-page
 */
require_once plugin_dir_path(__FILE__) . '/build/settings-page/render.php';

/**
 * map-shortcode 
 */
require_once plugin_dir_path(__FILE__) . '/build/map-shortcode/render.php';

/**
 * map-widget
 */
function traumardr_create_block_init() {
	register_block_type( __DIR__ . '/build/map-widget' );
}
add_action( 'init', 'traumardr_create_block_init' );

function traumardr_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'traumardr-block-js',
        plugins_url( '/build/map-widget/block.json', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n', 'wp-api', 'jquery' ),
        filemtime( plugin_dir_path( __FILE__ ) . '/build/map-widget/block.json' )
    );

    wp_localize_script( 'traumardr-block-js', 'traumardr_ajax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'traumardr_nonce' ), // Optional security
		'mapPlaceHolderUrl' => plugins_url( 'assets/map-placeholder.jpg', __FILE__ ),
    ) );
}
add_action( 'enqueue_block_editor_assets', 'traumardr_enqueue_block_editor_assets' );

/**
 * Fetch data from TraumaRadar
 * @param string $traumaradar_url The detail url to a flight on TraumaRadar.nl
 */
function traumardr_fetch_data_internal($traumaradar_url) {
    $response = wp_remote_get( "https://traumaradar.nl/wordpressapi/getdatafromflighturl?url=" . $traumaradar_url );
    if ( is_wp_error( $response ) ) {
        wp_send_json_error( 'Error fetching data' );
    }
    $body = wp_remote_retrieve_body( $response );
    $data = json_decode( $body, true );
    return $data;
}

/**
 * Ajax call
 */
function traumardr_fetch_data() {
    if (! isset($_POST['_nonce'])) {
        wp_send_json_error( 'Nonce missing' );
    }

    $nonce = sanitize_key( $_POST['_nonce'] );

    if ( !wp_verify_nonce($nonce, 'traumardr_nonce')) {
        wp_send_json_error( 'Nonce invalid' );
    }

	if (! isset($_POST['inputValue'])) {
		wp_send_json_error( 'No input value given' );
	}

	$input_value = esc_url_raw(wp_unslash($_POST['inputValue']));

	if ( empty($input_value) ) {
		wp_send_json_error( 'No input value given' );
	}
    
    $data = traumardr_fetch_data_internal($input_value);
    
    // Send the data back to JavaScript
    wp_send_json_success( $data );
}

add_action('wp_ajax_traumardr_fetch_data', 'traumardr_fetch_data');

