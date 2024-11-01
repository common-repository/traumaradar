<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Fetch data from TraumaRadar or get it from transient
 * @param string $traumaradar_detail_url The detail url to a flight on TraumaRadar.nl
 */
function traumardr_get_flight_data($traumaradar_detail_url) {
    $transient_key = 'traumardr_flight_data';
    $flight_data = get_transient($transient_key);

    if ($flight_data) {
        return $flight_data;
    }

    $flight_data = traumardr_fetch_data_internal($traumaradar_detail_url);
    set_transient( $transient_key, $flight_data, 12 * HOUR_IN_SECONDS); // Store for 12 hours
}

function traumardr_render_map_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'url' => '',
            'show_title' => true,
            'show_date' => true,
            'show_map' => true,
        ),
        $atts,
        'traumaradar_map'
    );

    $url = $atts['url'];
    $show_title = $atts['show_title'];
    $show_date = $atts['show_date'];
    $show_map = $atts['show_map'];

    $do_render = ! empty($url);

    ob_start();
    if (!$do_render) {
        return ob_get_clean();
    }

    $flight_data = traumardr_get_flight_data($url);
    ?>

    <?php
    $flight_url = $flight_data['url'];
    $flight_title = $flight_data['title'];
    $flight_timestamp = $flight_data['fullDate'];
    $flight_image = $flight_data['image'];
    ?>    

    <div class="wp-block-traumardr-map-block">
		<?php if( $show_title ) { ?> 
			<p style="margin-block-start: 0.7em; margin-block-end: 0.1em"><a href="<?php echo esc_url($flight_url); ?>"><?php echo esc_html($flight_title); ?></a></p>
		<?php } ?>
		<?php if( $show_date ) { ?> 
			<p style="font-size: 0.7em; margin-block-start: 0.1em; margin-block-end: 1em"><?php echo esc_html($flight_timestamp); ?></p>
		<?php } ?>
		<?php if( $show_map ) { ?> 			
			<a href="<?php echo esc_url($flight_url); ?>"><img src="<?php echo esc_url($flight_image); ?>" alt="<?php echo esc_html($flight_title); ?>" style="width: 100%; height: auto"/></a>
		<?php } ?>
	</div>
    
    <?php
    return ob_get_clean();
}

add_shortcode('traumaradar_map', 'traumardr_render_map_shortcode');