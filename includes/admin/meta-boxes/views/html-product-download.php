<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<tr>
	<td class="sort"></td>
	<td class="file_name">
		<input type="text" class="input_text" placeholder="<?php esc_attr_e( 'File name', 'classic-store'); ?>" name="_wc_file_names[]" value="<?php echo esc_attr( $file['name'] ); ?>" />
		<input type="hidden" name="_wc_file_hashes[]" value="<?php echo esc_attr( $key ); ?>" />
	</td>
	<td class="file_url"><input type="text" class="input_text" placeholder="<?php esc_attr_e( 'http://', 'classic-store'); ?>" name="_wc_file_urls[]" value="<?php echo esc_attr( $file['file'] ); ?>" /></td>
	<td class="file_url_choose" width="1%"><a href="#" class="button upload_file_button" data-choose="<?php esc_attr_e( 'Choose file', 'classic-store'); ?>" data-update="<?php esc_attr_e( 'Insert file URL', 'classic-store'); ?>"><?php echo esc_html__( 'Choose file', 'classic-store'); ?></a></td>
	<td width="1%"><a href="#" class="delete"><?php esc_html_e( 'Delete', 'classic-store'); ?></a></td>
</tr>
