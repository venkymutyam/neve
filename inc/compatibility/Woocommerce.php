<?php
/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      04/09/2018
 * @package woocommerce.php
 */

namespace Neve\Compatibility;

class Woocommerce {
	public function init() {
		if ( ! class_exists( 'WooCommerce' ) ) {
			return;
		}
		add_action( 'woocommerce_before_main_content', array( $this, 'wrap_pages_start' ), 15 );
		add_action( 'woocommerce_after_main_content', array( $this, 'close_div' ), 15 );

		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

	}

	public function wrap_pages_start() {
		?>
		<div class="nv-index-posts col">
		<?php
	}

	public function close_div() {
		?>
		</div>
		<?php
	}
}