<?php
/**
 * Units
 *
 * Returns a multidimensional array of measurement units and their labels.
 * Unit labels should be defined in English and translated native through localization files.
 *
 * @package WooCommerce\i18n
 * @version
 */

defined( 'ABSPATH' ) || exit;

return array(
	'weight'     => array(
		'kg'  => __( 'kg', 'classic-store'),
		'g'   => __( 'g', 'classic-store'),
		'lbs' => __( 'lbs', 'classic-store'),
		'oz'  => __( 'oz', 'classic-store'),
	),
	'dimensions' => array(
		'm'  => __( 'm', 'classic-store'),
		'cm' => __( 'cm', 'classic-store'),
		'mm' => __( 'mm', 'classic-store'),
		'in' => __( 'in', 'classic-store'),
		'yd' => __( 'yd', 'classic-store'),
	),
);
