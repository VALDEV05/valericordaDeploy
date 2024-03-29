<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $messages ) {
	return;
}

?>
<div class="woocommerce-error" role="alert">
	<?php konte_svg_icon( 'icon=error&class=message-icon' ) ?>
	<ul class="error-message">
		<?php foreach ( $messages as $message ) : ?>
			<li><?php echo wc_kses_notice( $message ); ?></li>
		<?php endforeach; ?>
	</ul>
	<?php konte_svg_icon( 'icon=close&class=close-message' ) ?>
</div>
