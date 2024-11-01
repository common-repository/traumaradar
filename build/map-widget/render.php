<?php
/**
 * Server rendering for the traumaradar/map-widget block
 *
 * @package traumaradar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$flight_url = $attributes['flightUrl'];
$flight_title = $attributes['flightTitle'];
$flight_timestamp = $attributes['flightTimeStamp'];
$flight_image = $attributes['flightImage'];
$show_title = $attributes['showTitle'];
$show_date = $attributes['showDate'];
$show_map = $attributes['showMap'];

$do_render = ! empty($flight_url) && ! empty($flight_title);
?>

<?php if ( $do_render) { ?>
	<div <?php echo wp_kses_data( get_block_wrapper_attributes() ); ?>>
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
<?php } ?>
