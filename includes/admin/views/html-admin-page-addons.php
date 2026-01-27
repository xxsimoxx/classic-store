<?php
/**
 * Admin View: Page - Addons
 *
 * @var string $view
 * @var object $addons
 * @package Classic Commerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="wrap woocommerce">

	<h2><?php esc_html_e( 'Extensions for Classic Commerce', 'classic-store'); ?></h2>

	<hr>

	<h3 id="cc-compat"><?php esc_html_e( 'Important Note:', 'classic-store'); ?></h3>

	<p><?php esc_html_e( 'Although Classic Commerce is a fork of WooCommerce version 9.4, all JetPack and WooCommerce Services integration, and anything related to blocks , FSE and Woocommerce Admin have been removed.', 'classic-store'); ?></p>

	<p><?php esc_html_e( 'Many extensions or plugins designed for WooCommerce will still work with Classic Commerce provided they do not rely on Jetpack or WooCommerce Services, blocks, FSE or Woocommerce Admin.', 'classic-store'); ?></p>

	<hr />
	
	<h3><?php esc_html_e( 'Disclaimer', 'classic-store'); ?></h3>

	<p><?php printf( __( '<strong>The end user is entirely responsible</strong> for choosing, installing, testing and monitoring any extensions or plugins that are needed to provide extra functionality to the Classic Commerce core.', 'classic-store') ); ?></p>

	<p><?php esc_html_e( 'Before installing and using any extensions or plugins we strongly recommend that you first work in a test environment. If you are working on a live site please ensure that you have a recent backup.', 'classic-store'); ?></p>

	<hr />

	<h3><?php esc_html_e( 'Feedback:', 'classic-store'); ?></h3>

	<p><?php printf( __( 'For discussion and help with finding compatible Classic Commerce addons, use the <a href="%s">ClassicPress community forum</a>.', 'classic-store'), 'https://forums.classicpress.net/tags/classic-commerce/' ); ?></p>

	<p><?php printf( __( 'For problems with the Classic Commerce core files please raise an issue via <a href="%s">Github issues</a>.', 'classic-store'), 'https://github.com/ClassicPress-plugins/classic-commerce/issues/' ); ?></p>

	<hr />

	<h3><?php esc_html_e( 'GNU General Public License', 'classic-store'); ?></h3>

	<p><?php esc_html_e( 'This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.', 'classic-store'); ?></p>

	<p><?php esc_html_e( 'This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.', 'classic-store'); ?></p>

	<p><?php printf( __( 'You should have received a copy of the GNU General Public License along with this program. If not, see <a href="%1s">www.gnu.org/licenses</a>.', 'classic-store'), 'https://www.gnu.org/licenses/' ); ?></p>

</div>


