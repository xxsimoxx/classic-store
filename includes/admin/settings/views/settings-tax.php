<?php
/**
 * Tax settings.
 *
 * @package ClassicCommerce\Admin\Settings.
 */

defined( 'ABSPATH' ) || exit;

$settings = array(

	array(
		'title' => __( 'Tax options', 'classic-store'),
		'type'  => 'title',
		'desc'  => '',
		'id'    => 'tax_options',
	),

	array(
		'title'    => __( 'Prices entered with tax', 'classic-store'),
		'id'       => 'woocommerce_prices_include_tax',
		'default'  => 'no',
		'type'     => 'radio',
		'desc_tip' => __( 'This option is important as it will affect how you input prices. Changing it will not update existing products.', 'classic-store'),
		'options'  => array(
			'yes' => __( 'Yes, I will enter prices inclusive of tax', 'classic-store'),
			'no'  => __( 'No, I will enter prices exclusive of tax', 'classic-store'),
		),
	),

	array(
		'title'    => __( 'Calculate tax based on', 'classic-store'),
		'id'       => 'woocommerce_tax_based_on',
		'desc_tip' => __( 'This option determines which address is used to calculate tax.', 'classic-store'),
		'default'  => 'shipping',
		'type'     => 'select',
		'class'    => 'wc-enhanced-select',
		'options'  => array(
			'shipping' => __( 'Customer shipping address', 'classic-store'),
			'billing'  => __( 'Customer billing address', 'classic-store'),
			'base'     => __( 'Shop base address', 'classic-store'),
		),
	),

	'shipping-tax-class' => array(
		'title'    => __( 'Shipping tax class', 'classic-store'),
		'desc'     => __( 'Optionally control which tax class shipping gets, or leave it so shipping tax is based on the cart items themselves.', 'classic-store'),
		'id'       => 'woocommerce_shipping_tax_class',
		'css'      => 'min-width:150px;',
		'default'  => 'inherit',
		'type'     => 'select',
		'class'    => 'wc-enhanced-select',
		'options'  => array( 'inherit' => __( 'Shipping tax class based on cart items', 'classic-store') ) + wc_get_product_tax_class_options(),
		'desc_tip' => true,
	),

	array(
		'title'   => __( 'Rounding', 'classic-store'),
		'desc'    => __( 'Round tax at subtotal level, instead of rounding per line', 'classic-store'),
		'id'      => 'woocommerce_tax_round_at_subtotal',
		'default' => 'no',
		'type'    => 'checkbox',
	),

	array(
		'title'     => __( 'Additional tax classes', 'classic-store'),
		'desc_tip'  => __( 'List additional tax classes you need below (1 per line, e.g. Reduced Rates). These are in addition to "Standard rate" which exists by default.', 'classic-store' ),
		'id'        => 'woocommerce_tax_classes',
		'css'       => 'height: 65px;',
		'type'      => 'textarea',
		'default'   => '',
		'is_option' => false,
		'value'     => implode( "\n", WC_Tax::get_tax_classes() ),
	),

	array(
		'title'   => __( 'Display prices in the shop', 'classic-store'),
		'id'      => 'woocommerce_tax_display_shop',
		'default' => 'excl',
		'type'    => 'select',
		'class'   => 'wc-enhanced-select',
		'options' => array(
			'incl' => __( 'Including tax', 'classic-store'),
			'excl' => __( 'Excluding tax', 'classic-store'),
		),
	),

	array(
		'title'   => __( 'Display prices during cart and checkout', 'classic-store'),
		'id'      => 'woocommerce_tax_display_cart',
		'default' => 'excl',
		'type'    => 'select',
		'class'   => 'wc-enhanced-select',
		'options' => array(
			'incl' => __( 'Including tax', 'classic-store'),
			'excl' => __( 'Excluding tax', 'classic-store'),
		),
	),

	array(
		'title'       => __( 'Price display suffix', 'classic-store'),
		'id'          => 'woocommerce_price_display_suffix',
		'default'     => '',
		'placeholder' => __( 'N/A', 'classic-store'),
		'type'        => 'text',
		'desc_tip'    => __( 'Define text to show after your product prices. This could be, for example, "inc. Vat" to explain your pricing. You can also have prices substituted here using one of the following: {price_including_tax}, {price_excluding_tax}.', 'classic-store'),
	),

	array(
		'title'    => __( 'Display tax totals', 'classic-store'),
		'id'       => 'woocommerce_tax_total_display',
		'default'  => 'itemized',
		'type'     => 'select',
		'class'    => 'wc-enhanced-select',
		'options'  => array(
			'single'   => __( 'As a single total', 'classic-store'),
			'itemized' => __( 'Itemized', 'classic-store'),
		),
		'autoload' => false,
	),

	array(
		'type' => 'sectionend',
		'id'   => 'tax_options',
	),

);

if ( ! wc_shipping_enabled() ) {
	unset( $settings['shipping-tax-class'] );
}

return apply_filters( 'woocommerce_tax_settings', $settings );
