<?php
/**
 * Admin View: Quick Edit Product
 *
 * @package ClassicCommerce\Admin\Notices
 */

defined( 'ABSPATH' ) || exit;
?>

<fieldset class="inline-edit-col-left">
	<div id="woocommerce-fields" class="inline-edit-col">

		<h4><?php esc_html_e( 'Product data', 'classic-store'); ?></h4>

		<?php do_action( 'woocommerce_product_quick_edit_start' ); ?>

		<?php if ( wc_product_sku_enabled() ) : ?>

			<label>
				<span class="title"><?php esc_html_e( 'SKU', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<input type="text" name="_sku" class="text sku" value="">
				</span>
			</label>
			<br class="clear" />

		<?php endif; ?>

		<div class="price_fields">
			<label>
				<span class="title"><?php esc_html_e( 'Price', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<input type="text" name="_regular_price" class="text wc_input_price regular_price" placeholder="<?php esc_attr_e( 'Regular price', 'classic-store'); ?>" value="">
				</span>
			</label>
			<br class="clear" />
			<label>
				<span class="title"><?php esc_html_e( 'Sale', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<input type="text" name="_sale_price" class="text wc_input_price sale_price" placeholder="<?php esc_attr_e( 'Sale price', 'classic-store'); ?>" value="">
				</span>
			</label>
			<br class="clear" />
		</div>

		<?php if ( wc_tax_enabled() ) : ?>
			<label class="alignleft">
				<span class="title"><?php esc_html_e( 'Tax status', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<select class="tax_status" name="_tax_status">
						<?php
						$options = array(
							'taxable'  => __( 'Taxable', 'classic-store'),
							'shipping' => __( 'Shipping only', 'classic-store'),
							'none'     => _x( 'None', 'Tax status', 'classic-store'),
						);
						foreach ( $options as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
						}
						?>
					</select>
				</span>
			</label>
			<br class="clear" />
			<label class="alignleft">
				<span class="title"><?php esc_html_e( 'Tax class', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<select class="tax_class" name="_tax_class">
						<?php
						$options = array(
							'' => __( 'Standard', 'classic-store'),
						);

						$tax_classes = WC_Tax::get_tax_classes();

						if ( ! empty( $tax_classes ) ) {
							foreach ( $tax_classes as $class ) {
								$options[ sanitize_title( $class ) ] = esc_html( $class );
							}
						}

						foreach ( $options as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
						}
						?>
					</select>
				</span>
			</label>
			<br class="clear" />
		<?php endif; ?>

		<?php if ( wc_product_weight_enabled() || wc_product_dimensions_enabled() ) : ?>
		<div class="dimension_fields">

			<?php if ( wc_product_weight_enabled() ) : ?>
				<label>
					<span class="title"><?php esc_html_e( 'Weight', 'classic-store'); ?></span>
					<span class="input-text-wrap">
						<input type="text" name="_weight" class="text weight" placeholder="<?php echo esc_attr( wc_format_localized_decimal( 0 ) ); ?>" value="">
					</span>
				</label>
				<br class="clear" />
			<?php endif; ?>

			<?php if ( wc_product_dimensions_enabled() ) : ?>
				<div class="inline-edit-group dimensions">
					<div>
						<span class="title"><?php esc_html_e( 'L/W/H', 'classic-store'); ?></span>
						<span class="input-text-wrap">
							<input type="text" name="_length" class="text wc_input_decimal length" placeholder="<?php esc_attr_e( 'Length', 'classic-store'); ?>" value="">
							<input type="text" name="_width" class="text wc_input_decimal width" placeholder="<?php esc_attr_e( 'Width', 'classic-store'); ?>" value="">
							<input type="text" name="_height" class="text wc_input_decimal height" placeholder="<?php esc_attr_e( 'Height', 'classic-store'); ?>" value="">
						</span>
					</div>
				</div>
			<?php endif; ?>

		</div>
		<?php endif; ?>

		<div class="inline-edit-group">
			<span class="title"><?php esc_html_e( 'Shipping class', 'classic-store'); ?></span>
			<span class="input-text-wrap">
				<select class="shipping_class" name="_shipping_class">
					<option value="_no_shipping_class"><?php esc_html_e( 'No shipping class', 'classic-store'); ?></option>
					<?php
					foreach ( $shipping_class as $key => $value ) {
						echo '<option value="' . esc_attr( $value->slug ) . '">' . esc_html( $value->name ) . '</option>';
					}
					?>
				</select>
			</span>
		</div>

		<div class="inline-edit-group">
			<label class="alignleft">
				<span class="title"><?php esc_html_e( 'Visibility', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<select class="visibility" name="_visibility">
						<?php
						$options = apply_filters(
							'woocommerce_product_visibility_options',
							array(
								'visible' => __( 'Catalog &amp; search', 'classic-store'),
								'catalog' => __( 'Catalog', 'classic-store'),
								'search'  => __( 'Search', 'classic-store'),
								'hidden'  => __( 'Hidden', 'classic-store'),
							)
						);
						foreach ( $options as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
						}
						?>
					</select>
				</span>
			</label>
			<label class="alignleft featured">
				<input type="checkbox" name="_featured" value="1">
				<span class="checkbox-title"><?php esc_html_e( 'Featured', 'classic-store'); ?></span>
			</label>
		</div>

		<?php if ( get_option( 'woocommerce_manage_stock' ) === 'yes' ) : ?>
			<div class="inline-edit-group manage_stock_field">
				<label class="manage_stock">
					<input type="checkbox" name="_manage_stock" value="1">
					<span class="checkbox-title"><?php esc_html_e( 'Manage stock?', 'classic-store'); ?></span>
				</label>
			</div>
		<?php endif; ?>

		<label class="stock_status_field">
			<span class="title"><?php esc_html_e( 'In stock?', 'classic-store'); ?></span>
			<span class="input-text-wrap">
				<select class="stock_status" name="_stock_status">
					<?php
					echo '<option value="" id="stock_status_no_change">' . esc_html__( '— No Change —', 'classic-store') . '</option>';
					foreach ( wc_get_product_stock_status_options() as $key => $value ) {
						echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
					}
					?>
				</select>
				<div class="wc-quick-edit-warning" style="display:none">
					<?php echo esc_html__( 'This will change the stock status of all variations.', 'classic-store'); ?></p>
				</div>
			</span>
		</label>

		<div class="stock_fields">
			<?php if ( get_option( 'woocommerce_manage_stock' ) === 'yes' ) : ?>
				<label class="stock_qty_field">
					<span class="title"><?php esc_html_e( 'Stock qty', 'classic-store'); ?></span>
					<span class="input-text-wrap">
						<input type="number" name="_stock" class="text stock" step="any" value="">
					</span>
				</label>
			<?php endif; ?>
		</div>

		<label class="alignleft backorder_field">
			<span class="title"><?php esc_html_e( 'Backorders?', 'classic-store'); ?></span>
			<span class="input-text-wrap">
				<select class="backorders" name="_backorders">
					<?php
					foreach ( wc_get_product_backorder_options() as $key => $value ) {
						echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
					}
					?>
				</select>
			</span>
		</label>

		<?php do_action( 'woocommerce_product_quick_edit_end' ); ?>

		<input type="hidden" name="woocommerce_quick_edit" value="1" />
		<input type="hidden" name="woocommerce_quick_edit_nonce" value="<?php echo esc_attr( wp_create_nonce( 'woocommerce_quick_edit_nonce' ) ); ?>" />
	</div>
</fieldset>
