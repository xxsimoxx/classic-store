<?php
/**
 * Admin View: Bulk Edit Products
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<fieldset class="inline-edit-col-right">
	<div id="woocommerce-fields-bulk" class="inline-edit-col">

		<h4><?php _e( 'Product data', 'classic-store'); ?></h4>

		<?php do_action( 'woocommerce_product_bulk_edit_start' ); ?>

		<div class="inline-edit-group">
			<label class="alignleft">
				<span class="title"><?php _e( 'Price', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<select class="change_regular_price change_to" name="change_regular_price">
						<?php
						$options = array(
							''  => __( '— No change —', 'classic-store'),
							'1' => __( 'Change to:', 'classic-store'),
							'2' => __( 'Increase existing price by (fixed amount or %):', 'classic-store' ),
							'3' => __( 'Decrease existing price by (fixed amount or %):', 'classic-store' ),
						);
						foreach ( $options as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
						}
						?>
					</select>
				</span>
			</label>
			<label class="change-input">
				<input type="text" name="_regular_price" class="text regular_price" placeholder="<?php printf( esc_attr__( 'Enter price (%s)', 'classic-store' ), get_woocommerce_currency_symbol() ); ?>" value="" />
			</label>
		</div>

		<div class="inline-edit-group">
			<label class="alignleft">
				<span class="title"><?php _e( 'Sale', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<select class="change_sale_price change_to" name="change_sale_price">
						<?php
						$options = array(
							''  => __( '— No change —', 'classic-store'),
							'1' => __( 'Change to:', 'classic-store'),
							'2' => __( 'Increase existing sale price by (fixed amount or %):', 'classic-store' ),
							'3' => __( 'Decrease existing sale price by (fixed amount or %):', 'classic-store' ),
							'4' => __( 'Set to regular price decreased by (fixed amount or %):', 'classic-store' ),
						);
						foreach ( $options as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
						}
						?>
					</select>
				</span>
			</label>
			<label class="change-input">
				<input type="text" name="_sale_price" class="text sale_price" placeholder="<?php printf( esc_attr__( 'Enter sale price (%s)', 'classic-store' ), get_woocommerce_currency_symbol() ); ?>" value="" />
			</label>
		</div>

		<?php if ( wc_tax_enabled() ) : ?>
			<label>
				<span class="title"><?php _e( 'Tax status', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<select class="tax_status" name="_tax_status">
						<?php
						$options = array(
							''         => __( '— No change —', 'classic-store'),
							'taxable'  => __( 'Taxable', 'classic-store'),
							'shipping' => __( 'Shipping only', 'classic-store'),
							'none'     => _x( 'None', 'Tax status', 'classic-store'),
						);
						foreach ( $options as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
						}
						?>
					</select>
				</span>
			</label>

			<label>
				<span class="title"><?php _e( 'Tax class', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<select class="tax_class" name="_tax_class">
						<?php
						$options = array(
							''         => __( '— No change —', 'classic-store'),
							'standard' => __( 'Standard', 'classic-store'),
						);

						$tax_classes = WC_Tax::get_tax_classes();

						if ( ! empty( $tax_classes ) ) {
							foreach ( $tax_classes as $class ) {
								$options[ sanitize_title( $class ) ] = esc_html( $class );
							}
						}

						foreach ( $options as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
						}
						?>
					</select>
				</span>
			</label>
		<?php endif; ?>

		<?php if ( wc_product_weight_enabled() ) : ?>
			<div class="inline-edit-group">
				<label class="alignleft">
					<span class="title"><?php _e( 'Weight', 'classic-store'); ?></span>
					<span class="input-text-wrap">
						<select class="change_weight change_to" name="change_weight">
							<?php
								$options = array(
									''  => __( '— No change —', 'classic-store'),
									'1' => __( 'Change to:', 'classic-store'),
								);
							foreach ( $options as $key => $value ) {
								echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
							}
							?>
						</select>
					</span>
				</label>
				<label class="change-input">
					<input type="text" name="_weight" class="text weight" placeholder="<?php printf( esc_attr__( '%1$s (%2$s)', 'classic-store' ), wc_format_localized_decimal( 0 ), get_option( 'woocommerce_weight_unit' ) ); ?>" value="">
				</label>
			</div>
		<?php endif; ?>

		<?php if ( wc_product_dimensions_enabled() ) : ?>
			<div class="inline-edit-group dimensions">
				<label class="alignleft">
					<span class="title"><?php _e( 'L/W/H', 'classic-store'); ?></span>
					<span class="input-text-wrap">
						<select class="change_dimensions change_to" name="change_dimensions">
							<?php
							$options = array(
								''  => __( '— No change —', 'classic-store'),
								'1' => __( 'Change to:', 'classic-store'),
							);
							foreach ( $options as $key => $value ) {
								echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
							}
							?>
						</select>
					</span>
				</label>
				<label class="change-input">
					<input type="text" name="_length" class="text length" placeholder="<?php printf( esc_attr__( 'Length (%s)', 'classic-store' ), get_option( 'woocommerce_dimension_unit' ) ); ?>" value="">
					<input type="text" name="_width" class="text width" placeholder="<?php printf( esc_attr__( 'Width (%s)', 'classic-store' ), get_option( 'woocommerce_dimension_unit' ) ); ?>" value="">
					<input type="text" name="_height" class="text height" placeholder="<?php printf( esc_attr__( 'Height (%s)', 'classic-store' ), get_option( 'woocommerce_dimension_unit' ) ); ?>" value="">
				</label>
			</div>
		<?php endif; ?>

		<label>
			<span class="title"><?php _e( 'Shipping class', 'classic-store'); ?></span>
			<span class="input-text-wrap">
				<select class="shipping_class" name="_shipping_class">
					<option value=""><?php _e( '— No change —', 'classic-store'); ?></option>
					<option value="_no_shipping_class"><?php _e( 'No shipping class', 'classic-store'); ?></option>
					<?php
					foreach ( $shipping_class as $key => $value ) {
						echo '<option value="' . esc_attr( $value->slug ) . '">' . esc_html( $value->name )  . '</option>';
					}
					?>
				</select>
			</span>
		</label>

		<label>
			<span class="title"><?php _e( 'Visibility', 'classic-store'); ?></span>
			<span class="input-text-wrap">
				<select class="visibility" name="_visibility">
					<?php
					$options = array(
						''        => __( '— No change —', 'classic-store'),
						'visible' => __( 'Catalog &amp; search', 'classic-store'),
						'catalog' => __( 'Catalog', 'classic-store'),
						'search'  => __( 'Search', 'classic-store'),
						'hidden'  => __( 'Hidden', 'classic-store'),
					);
					foreach ( $options as $key => $value ) {
						echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
					}
					?>
				</select>
			</span>
		</label>
		<label>
			<span class="title"><?php _e( 'Featured', 'classic-store'); ?></span>
			<span class="input-text-wrap">
				<select class="featured" name="_featured">
					<?php
					$options = array(
						''    => __( '— No change —', 'classic-store'),
						'yes' => __( 'Yes', 'classic-store'),
						'no'  => __( 'No', 'classic-store'),
					);
					foreach ( $options as $key => $value ) {
						echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
					}
					?>
				</select>
			</span>
		</label>

		<label>
			<span class="title"><?php _e( 'In stock?', 'classic-store'); ?></span>
			<span class="input-text-wrap">
				<select class="stock_status" name="_stock_status">
					<?php
					echo '<option value="">' . esc_html__( '— No Change —', 'classic-store') . '</option>';

					foreach ( wc_get_product_stock_status_options() as $key => $value ) {
						echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
					}
					?>
				</select>
			</span>
		</label>
		<?php if ( 'yes' == get_option( 'woocommerce_manage_stock' ) ) : ?>

			<label>
				<span class="title"><?php _e( 'Manage stock?', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<select class="manage_stock" name="_manage_stock">
						<?php
						$options = array(
							''    => __( '— No change —', 'classic-store'),
							'yes' => __( 'Yes', 'classic-store'),
							'no'  => __( 'No', 'classic-store'),
						);
						foreach ( $options as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
						}
						?>
					</select>
				</span>
			</label>

			<div class="inline-edit-group">
				<label class="alignleft stock_qty_field">
					<span class="title"><?php _e( 'Stock qty', 'classic-store'); ?></span>
					<span class="input-text-wrap">
						<select class="change_stock change_to" name="change_stock">
							<?php
							$options = array(
								''  => __( '— No change —', 'classic-store'),
								'1' => __( 'Change to:', 'classic-store'),
                                '2' => __( 'Increase existing stock by:', 'classic-store'),
								'3' => __( 'Decrease existing stock by:', 'classic-store'),
							);
							foreach ( $options as $key => $value ) {
								echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
							}
							?>
						</select>
					</span>
				</label>
				<label class="change-input">
					<input type="text" name="_stock" class="text stock" placeholder="<?php esc_attr_e( 'Stock qty', 'classic-store'); ?>" step="any" value="">
				</label>
			</div>

			<label>
				<span class="title"><?php _e( 'Backorders?', 'classic-store'); ?></span>
				<span class="input-text-wrap">
					<select class="backorders" name="_backorders">
						<?php
						echo '<option value="">' . esc_html__( '— No Change —', 'classic-store') . '</option>';

						foreach ( wc_get_product_backorder_options() as $key => $value ) {
							echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value )  . '</option>';
						}
						?>
					</select>
				</span>
			</label>

		<?php endif; ?>

		<label>
			<span class="title"><?php esc_html_e( 'Sold individually?', 'classic-store'); ?></span>
			<span class="input-text-wrap">
				<select class="sold_individually" name="_sold_individually">
					<?php
					$options = array(
						''    => __( '— No change —', 'classic-store'),
						'yes' => __( 'Yes', 'classic-store'),
						'no'  => __( 'No', 'classic-store'),
					);
					foreach ( $options as $key => $value ) {
						echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
					}
					?>
				</select>
			</span>
		</label>

		<?php do_action( 'woocommerce_product_bulk_edit_end' ); ?>

		<input type="hidden" name="woocommerce_bulk_edit" value="1" />
		<input type="hidden" name="woocommerce_quick_edit_nonce" value="<?php echo wp_create_nonce( 'woocommerce_quick_edit_nonce' ); ?>" />
	</div>
</fieldset>
