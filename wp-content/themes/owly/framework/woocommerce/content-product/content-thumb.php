<?php

/**
 * content-product.php hooks
 *
 * woocommerce_before_shop_loop_item_title
 */


/** Hook: woocommerce_before_shop_loop_item_title. **/

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

if( ! function_exists( 'owly_woo_loop_product_thumbnail' ) ) {
	
	function owly_woo_loop_product_thumbnail() {

		global $product;

		$product_id = $product->get_id();

		// Loop defined variables

		$show_secondary_image_on_hover = wc_get_loop_prop( 'product-thumb-secondary-image-onhover' );
		$show_secondary_image_on_hover = (isset($show_secondary_image_on_hover) && !empty($show_secondary_image_on_hover)) ? true : false;

		$product_thumb_content = wc_get_loop_prop( 'product-thumb-content' );
		$product_thumb_content = (isset($product_thumb_content['enabled']) && !empty($product_thumb_content['enabled'])) ? $product_thumb_content['enabled'] : false;

		$product_overlay_bgcolor = wc_get_loop_prop( 'product_overlay_bgcolor' );
		$product_overlay_bgcolor = (isset($product_overlay_bgcolor) && !empty($product_overlay_bgcolor)) ? 'style="background-color:'.esc_attr($product_overlay_bgcolor).';"' : '';

		$product_hover_styles = wc_get_loop_prop( 'product_hover_styles' );

		$product_thumb_content_overlay_bgcolor = '';
		if($product_hover_styles == 'product-hover-egrpovrcnt') {
			$product_thumb_content_overlay_bgcolor = $product_overlay_bgcolor;
		}

		$product_show_labels = wc_get_loop_prop( 'product_show_labels' );
		$product_show_labels = ($product_show_labels == '' || (isset($product_show_labels) && $product_show_labels == 'true')) ? true : false;


		echo '<div class="product-thumb">';
			
			// Featrued Item
			if($product_show_labels) {

				if( $product->is_featured() ) {
					echo '<div class="featured-tag">
									<div>
										<i class="fas fa-thumbtack"></i>
										<span>'.esc_html__('Featured', 'owly').'</span>
									</div>
								</div>';
				}

			}

			// Images

			echo '<a class="image" href="'.esc_url($product->get_permalink()).'" title="'.esc_attr($product->get_name()).'">';
				
				if($product_hover_styles != 'product-hover-egrpovrcnt') {
					echo '<div class="product-thumb-overlay" '.owly_html_output($product_overlay_bgcolor).'></div>';
				}

				// Product Labels
				if($product_show_labels) {

					echo '<div class="product-labels">';

						if( $product->is_on_sale() && $product->is_in_stock() ) {
							echo '<span class="onsale"><span>'.esc_html__('Sale', 'owly').'</span></span>';
						} else if( !$product->is_in_stock() ) {
							echo '<span class="out-of-stock"><span>'.esc_html__('Sold Out','owly').'</span></span>';
						}

						$settings = get_post_meta( $product_id, '_custom_settings', true );

						if(isset($settings['product-new-label']) && $settings['product-new-label'] == 'true') {
							echo '<span class="new"><span>'.esc_html__('New', 'owly').'</span></span>';
						}

					echo '</div>';

				}

				$product_thumbnail_id = get_post_thumbnail_id($product_id);
				$primary_image_src = wp_get_attachment_image_src($product_thumbnail_id, 'woocommerce_thumbnail', false);
				$primary_image_src = isset($primary_image_src[0]) ? $primary_image_src[0] : wc_placeholder_img_src( 'woocommerce_thumbnail' );

				$secondary_image_src = '';
				if($show_secondary_image_on_hover) {

					$attachment_ids = $product->get_gallery_image_ids();

					if(isset($attachment_ids['0'])) {
						$secondary_image_src = wp_get_attachment_image_src($attachment_ids['0'], 'woocommerce_thumbnail', false);
						$secondary_image_src = isset($secondary_image_src[0]) ? $secondary_image_src[0] : wc_placeholder_img_src( 'woocommerce_thumbnail' );
					}

				}

				echo '<div class="primary-image" style="background-image:url('.esc_url($primary_image_src).')"></div>';
				if($secondary_image_src != '') {
					echo '<div class="secondary-image" style="background-image:url('.esc_url($secondary_image_src).')"></div>';
				}

			echo '</a>';


			// Content

			if($product_thumb_content) {

				owly_woo_loop_product_thumb_content_setup($product_thumb_content);

				echo '<div class="product-thumb-content" '.owly_html_output($product_thumb_content_overlay_bgcolor).'>';
					do_action('dt_woo_loop_product_thumb_content', 'thumb');
					remove_all_actions('dt_woo_loop_product_thumb_content');
				echo '</div>';

			}

		echo "</div>";

	}

	add_action( 'woocommerce_before_shop_loop_item_title', 'owly_woo_loop_product_thumbnail', 10 );

}



?>