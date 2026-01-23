<?php
/**
 * Generic mappings
 *
 * @package ClassicCommerce\Admin\Importers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add generic mappings.
 *
 * @since WC-3.1.0
 * @param array $mappings Importer columns mappings.
 * @return array
 */
function wc_importer_generic_mappings( $mappings ) {
	$generic_mappings = array(
		__( 'Title', 'classic-store')         => 'name',
		__( 'Product Title', 'classic-store') => 'name',
		__( 'Price', 'classic-store')         => 'regular_price',
		__( 'Parent SKU', 'classic-store')    => 'parent_id',
		__( 'Quantity', 'classic-store')      => 'stock_quantity',
		__( 'Menu order', 'classic-store')    => 'menu_order',
	);

	return array_merge( $mappings, $generic_mappings );
}
add_filter( 'woocommerce_csv_product_import_mapping_default_columns', 'wc_importer_generic_mappings' );
