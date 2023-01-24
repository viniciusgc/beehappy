<?php

/** Product ul tag classes **/

if ( ! function_exists( 'dt_sc_woo_shop_product_style_template' ) ) {

	function dt_sc_woo_shop_product_style_template() {

		$product_style_template = '';

		$is_shortcode = wc_get_loop_prop('is_shortcode');

		if($is_shortcode) {

			$product_style_template = wc_get_loop_prop( 'product_style_template', 0 );

		} else {

			if( is_shop() ) {
				$product_style_template = cs_get_option( 'shop-page-product-style-template' );
			} elseif( is_product_category() ) {
				$product_style_template = cs_get_option( 'dt-woo-category-product-style-template' );
			} elseif( is_product_tag() ) {
				$product_style_template = cs_get_option( 'dt-woo-tag-product-style-template' );
			} else {
				global $woocommerce_loop;
				if($woocommerce_loop['name'] == 'up-sells') {
					$product_style_template = cs_get_option( 'dt-woo-single-product-upsell-style-template' );
				} else if($woocommerce_loop['name'] == 'related') {
					$product_style_template = cs_get_option( 'dt-woo-single-product-related-style-template' );
				} else {
					$product_style_template = cs_get_option( 'shop-page-product-style-template' );
				}
			}

		}

		return $product_style_template;

	}

}

/** Default Product Settings **/

if ( ! function_exists( 'dt_sc_woo_default_product_settings' ) ) {

	function dt_sc_woo_default_product_settings() {

		$settings = array();
		$settings["template-title"] = esc_html__('Default Template', 'owly' );
		$settings["product-style"]="product-style-igrp-over-pc";
		$settings["product-hover-styles"]="";
		$settings["product-overlay-bgcolor"]="rgba(0,0,0,0.07)";
		$settings["product-overlay-dark-bgcolor"]="1";
		$settings["product-overlay-effects"]="";
		$settings["product-hover-image-effects"]="";
		$settings["product-hover-secondary-image-effects"]="product-hover-secimage-fade";
		$settings["product-content-hover-effects"]="";
		$settings["product-icongroup-hover-effects"]="";
		$settings["product-borderorshadow"]="";
		$settings["product-border-type"]="product-border-type-default";
		$settings["product-border-position"]="product-border-position-default";
		$settings["product-shadow-type"]="product-shadow-type-default";
		$settings["product-shadow-position"]="product-shadow-position-default";
		$settings["product-bordershadow-highlight"]="";
		$settings["product-background-bgcolor"]="";
		$settings["product-padding"]="product-padding-content";
		$settings["product-space"]="product-with-space";
		$settings["product-display-type"]="grid";
		$settings["product-display-type-list-options"]="left-thumb";
		$settings["product-show-labels"]="true";
		$settings["product-label-design"]="product-label-boxed";
		$settings["product-custom-class"]="dt-chronodial-layout";
		$settings["product-thumb-secondary-image-onhover"]="1";
		$settings["product-thumb-content"]= array (
			'enabled'      => array(
				'category'       => esc_html__('Category', 'owly'),
				'excerpt'       => esc_html__('Excerpt', 'owly'),
			),
			'disabled'     => array(
				'title'          => esc_html__('Title', 'owly'),
				'rating'        => esc_html__('Rating', 'owly'),
				'price'          => esc_html__('Price', 'owly'),
				'button_element' => esc_html__('Button Element', 'owly'),
				'icons_group'    => esc_html__('Icons Group', 'owly'),
				'countdown'     => esc_html__('Count Down', 'owly'),
				'separator'     => esc_html__('Separator', 'owly'),
				'element_group' => esc_html__('Element Group', 'owly'),
				'swatches'      => esc_html__('Swatches', 'owly'),
			),
		);
		$settings["product-thumb-alignment"]="product-thumb-alignment-middle";
		$settings["product-thumb-iconsgroup-style"]="product-thumb-iconsgroup-style-simple";
		$settings["product-thumb-iconsgroup-position"]="";
		$settings["product-thumb-buttonelement-button"]="";
		$settings["product-thumb-buttonelement-secondary-button"]="";
		$settings["product-thumb-buttonelement-style"]="product-thumb-buttonelement-style-simple";
		$settings["product-thumb-buttonelement-stretch"]="";
		$settings["product-thumb-element-group"]= array( 
			'disabled' => array(
				'title'          => esc_html__('Title', 'owly'),
				'price'          => esc_html__('Price', 'owly'),																
				'cart'           => esc_html__('Cart', 'owly'),
				'wishlist'       => esc_html__('Wishlist', 'owly'),
				'compare'        => esc_html__('Compare', 'owly'),
				'quickview'      => esc_html__('Quick View', 'owly'),
				'category'       => esc_html__('Category', 'owly'),
				'button_element' => esc_html__('Button Element', 'owly'),
				'icons_group'    => esc_html__('Icons Group', 'owly'),
				'excerpt'        => esc_html__('Excerpt', 'owly'),
				'rating'         => esc_html__('Rating', 'owly'),
				'separator'      => esc_html__('Separator', 'owly'),
				'swatches'       => esc_html__('Swatches', 'owly')
			)
		);
		$settings["product-content-enable"]="1";
		$settings["product-content-content"]= array(
			'enabled'      => array(
				'title'          => esc_html__('Title', 'owly'),
				'price'          => esc_html__('Price', 'owly'),
				'icons_group'    => esc_html__('Icons Group', 'owly'),
			),
			'disabled'     => array(
				'element_group' => esc_html__('Element Group', 'owly'),
				'rating'        => esc_html__('Rating', 'owly'),
				'category'       => esc_html__('Category', 'owly'),
				'button_element' => esc_html__('Button Element', 'owly'),
				'excerpt'       => esc_html__('Excerpt', 'owly'),
				'countdown'     => esc_html__('Count Down', 'owly'),
				'separator'     => esc_html__('Separator', 'owly'),
				'swatches'      => esc_html__('Swatches', 'owly'),
			),
		);
		$settings["product-content-alignment"]="product-content-alignment-center";
		$settings["product-content-iconsgroup-icons"]= array( "cart", "wishlist", "compare", "quickview" );
		$settings["product-content-iconsgroup-style"]="product-content-iconsgroup-style-simple";
		$settings["product-content-buttonelement-button"]="";
		$settings["product-content-buttonelement-secondary-button"]="";
		$settings["product-content-buttonelement-style"]="product-content-buttonelement-style-simple";
		$settings["product-content-buttonelement-stretch"]="";
		$settings["product-content-element-group"] = array(
			'enabled'      => array(
				'price'          => esc_html__('Price', 'owly'),
				'title'          => esc_html__('Title', 'owly'),
			),
			'disabled'     => array(
				'cart'           => esc_html__('Cart', 'owly'),
				'rating'         => esc_html__('Rating', 'owly'),
				'icons_group'    => esc_html__('Icons Group', 'owly'),
				'wishlist'       => esc_html__('Wishlist', 'owly'),
				'compare'        => esc_html__('Compare', 'owly'),
				'quickview'      => esc_html__('Quick View', 'owly'),
				'category'       => esc_html__('Category', 'owly'),
				'button_element' => esc_html__('Button Element', 'owly'),
				'excerpt'        => esc_html__('Excerpt', 'owly'),
				'separator'      => esc_html__('Separator', 'owly'),
				'swatches'       => esc_html__('Swatches', 'owly')
			),
		);

		return $settings;
	}
}

/** Product ul tag classes **/
if ( ! function_exists( 'dt_sc_woo_shop_products_class' ) ) {

	function dt_sc_woo_shop_products_class() {

		$classes = array ();

		$woo_product_style_template = dt_sc_woo_shop_product_style_template();

		if(isset($woo_product_style_template) && (int)$woo_product_style_template > 0) {
			$woo_product_style_templates = cs_get_option( 'dt-woo-product-style-templates' );
			$product_style_templates = (isset($woo_product_style_templates[$woo_product_style_template]) && !empty($woo_product_style_templates[$woo_product_style_template])) ? $woo_product_style_templates[$woo_product_style_template] : false;

		} else {
			$woo_product_style_templates = cs_get_option( 'dt-woo-product-style-templates' );
			$default = dt_sc_woo_default_product_settings();
			$product_style_templates = (isset($woo_product_style_templates[0]) && !empty($woo_product_style_templates[0])) ? $woo_product_style_templates[0] : $default;

		}


		if($product_style_templates) {

			/* "Product Style" */

				// Product Style
				array_push($classes, $product_style_templates['product-style']);

				// Product Custom Class
				if($product_style_templates['product-custom-class'] != '') {

					array_push($classes, $product_style_templates['product-custom-class']);
				}



			/* "Product Style" Hover Options */

				// Hover Style
				array_push($classes, $product_style_templates['product-hover-styles']);	

				// Overlay Dark Bg Color
				if(isset($product_style_templates['product-overlay-dark-bgcolor']) && !empty($product_style_templates['product-overlay-dark-bgcolor'])) {
					array_push($classes, 'product-overlay-dark-bgcolor');
				}

				// Overlay Effects
				if(isset($product_style_templates['product-overlay-effects']) && $product_style_templates['product-overlay-effects'] != '') {
					array_push($classes, $product_style_templates['product-overlay-effects']);
				}

				// Hover Image Effects
				if(isset($product_style_templates['product-hover-image-effects']) && $product_style_templates['product-hover-image-effects'] != '') {
					array_push($classes, $product_style_templates['product-hover-image-effects']);
				}

				// Hover Secondary Image Effects
				$product_style_templates['product-hover-secondary-image-effects'] = (isset($product_style_templates['product-hover-secondary-image-effects']) && $product_style_templates['product-hover-secondary-image-effects'] != '') ? $product_style_templates['product-hover-secondary-image-effects'] : 'product-hover-secondary-image-fade-effect';
				if(isset($product_style_templates['product-hover-secondary-image-effects']) && $product_style_templates['product-hover-secondary-image-effects'] != '') {
					array_push($classes, $product_style_templates['product-hover-secondary-image-effects']);
				}

				// Content Hover Effects
				if(isset($product_style_templates['product-content-hover-effects']) && $product_style_templates['product-content-hover-effects'] != '') {
					array_push($classes, $product_style_templates['product-content-hover-effects']);
				}

				// Icon Group Hover Effects
				if(isset($product_style_templates['product-icongroup-hover-effects']) && $product_style_templates['product-icongroup-hover-effects'] != '') {
					array_push($classes, $product_style_templates['product-icongroup-hover-effects']);
				}


			/* "Product Style" Common Options */

				// Product Style - Bordered
				if($product_style_templates['product-borderorshadow'] == 'product-borderorshadow-shadow') {

					// Shadow Type
					array_push($classes, $product_style_templates['product-shadow-type']);

					// Shadow Position
					array_push($classes, $product_style_templates['product-shadow-position']);

					// Border Highlight
					array_push($classes, $product_style_templates['product-bordershadow-highlight']);					

				} else if($product_style_templates['product-borderorshadow'] == 'product-borderorshadow-border') {

					// Border Type
					array_push($classes, $product_style_templates['product-border-type']);

					// Border Position
					array_push($classes, $product_style_templates['product-border-position']);

					// Border Highlight
					array_push($classes, $product_style_templates['product-bordershadow-highlight']);					

				}

				// Background - Overlay Dark Bg Color
				if(isset($product_style_templates['product-background-dark-bgcolor']) && !empty($product_style_templates['product-background-dark-bgcolor'])) {
					array_push($classes, 'product-background-dark-bgcolor');
				}

				// Padding
				array_push($classes, $product_style_templates['product-padding']);

				// Space
				array_push($classes, $product_style_templates['product-space']);

				// Label Design
				array_push($classes, $product_style_templates['product-label-design']);	


			/* "Product Style - Thumb" Options */

				// Alignment
				array_push($classes, $product_style_templates['product-thumb-alignment']);			

				// Icons Group - Style
				array_push($classes, $product_style_templates['product-thumb-iconsgroup-style']);		

				// Icons Group - Position
				if($product_style_templates['product-thumb-iconsgroup-position'] != '') {
					array_push($classes, $product_style_templates['product-thumb-iconsgroup-position']);	
				}

				// Button Element - Style
				array_push($classes, $product_style_templates['product-thumb-buttonelement-style']);	

				// Button Element - Stretch
				array_push($classes, $product_style_templates['product-thumb-buttonelement-stretch']);	


			/* "Product Style - Content" Options */

				if(isset($product_style_templates['product-content-enable']) && !empty($product_style_templates['product-content-enable'])) {

					// Alignment
					array_push($classes, $product_style_templates['product-content-alignment']);			

					// Icons Group - Style
					array_push($classes, $product_style_templates['product-content-iconsgroup-style']);		

					// Button Element - Style
					array_push($classes, $product_style_templates['product-content-buttonelement-style']);	

					// Button Element - Stretch
					array_push($classes, $product_style_templates['product-content-buttonelement-stretch']);	

				}

		}


		$classes = implode(' ', $classes);


		return $classes;

	}

}

/** Product Style Variables Setup **/

if ( ! function_exists( 'owly_product_style_setup_template_prop' ) ) {

	function owly_product_style_setup_template_prop($woo_product_style_template) {


		// Template Style Datas

		if(isset($woo_product_style_template) && (int)$woo_product_style_template > 0) {

			$woo_product_style_templates = cs_get_option( 'dt-woo-product-style-templates' );
			$product_style_templates = (isset($woo_product_style_templates[$woo_product_style_template]) && !empty($woo_product_style_templates[$woo_product_style_template])) ? $woo_product_style_templates[$woo_product_style_template] : false;

		} else {

			$woo_product_style_templates = cs_get_option( 'dt-woo-product-style-templates' );
			$default = dt_sc_woo_default_product_settings();
			$product_style_templates = (isset($woo_product_style_templates[0]) && !empty($woo_product_style_templates[0])) ? $woo_product_style_templates[0] : $default;

		}

		if($product_style_templates) {

			$is_shortcode = wc_get_loop_prop('is_shortcode');
			

			/* "Product Style "Common Options */

				// Overlay Background Color
				if(isset($product_style_templates['product-background-bgcolor']) && !empty($product_style_templates['product-background-bgcolor'])) {
					wc_set_loop_prop('product_background_bgcolor', $product_style_templates['product-background-bgcolor']);
				}

				// Hover Style
				if(isset($product_style_templates['product-hover-styles']) && !empty($product_style_templates['product-hover-styles'])) {
					wc_set_loop_prop('product_hover_styles', $product_style_templates['product-hover-styles']);
				}

				// Overlay Background Color
				if(isset($product_style_templates['product-overlay-bgcolor']) && !empty($product_style_templates['product-overlay-bgcolor'])) {
					wc_set_loop_prop('product_overlay_bgcolor', $product_style_templates['product-overlay-bgcolor']);
				}

				// Display Mode
				if(!$is_shortcode) {
					if(isset($product_style_templates['product-display-type']) && !empty($product_style_templates['product-display-type'])) {
						wc_set_loop_prop('display_mode', $product_style_templates['product-display-type']);
					}
				}

				// Display Mode - List Options
				if(!$is_shortcode) {
					if(isset($product_style_templates['product-display-type-list-options']) && !empty($product_style_templates['product-display-type-list-options'])) {
						wc_set_loop_prop('display_mode_list_options', $product_style_templates['product-display-type-list-options']);
					}
				}

				// Show Label
				if(isset($product_style_templates['product-show-labels']) && !empty($product_style_templates['product-show-labels'])) {
					wc_set_loop_prop('product_show_labels', $product_style_templates['product-show-labels']);
				}

			/* "Product Style - Thumb" Options */

				// Show Secondary Image On Hover
				if(isset($product_style_templates['product-thumb-secondary-image-onhover']) && !empty($product_style_templates['product-thumb-secondary-image-onhover'])) {
					wc_set_loop_prop('product-thumb-secondary-image-onhover', $product_style_templates['product-thumb-secondary-image-onhover']);
				}

				// Content
				if(isset($product_style_templates['product-thumb-content']) && !empty($product_style_templates['product-thumb-content'])) {
					wc_set_loop_prop('product-thumb-content', $product_style_templates['product-thumb-content']);
				}

				// Button Element - Button
				if(isset($product_style_templates['product-thumb-buttonelement-button']) && !empty($product_style_templates['product-thumb-buttonelement-button'])) {
					wc_set_loop_prop('product-thumb-buttonelement-button', $product_style_templates['product-thumb-buttonelement-button']);
				}

				// Button Element - Secondary Button
				if(isset($product_style_templates['product-thumb-buttonelement-secondary-button']) && !empty($product_style_templates['product-thumb-buttonelement-secondary-button'])) {
					wc_set_loop_prop('product-thumb-buttonelement-secondary-button', $product_style_templates['product-thumb-buttonelement-secondary-button']);
				}				

				// Icons Group - Icons
				if(isset($product_style_templates['product-thumb-iconsgroup-icons']) && !empty($product_style_templates['product-thumb-iconsgroup-icons'])) {
					wc_set_loop_prop('product-thumb-iconsgroup-icons', $product_style_templates['product-thumb-iconsgroup-icons']);
				}

				// Element Group Content
				if(isset($product_style_templates['product-thumb-element-group']) && !empty($product_style_templates['product-thumb-element-group'])) {
					wc_set_loop_prop('product-thumb-element-group', $product_style_templates['product-thumb-element-group']);
				}	
				
			/* "Product Style - Content" Options */

				if(isset($product_style_templates['product-content-enable']) && !empty($product_style_templates['product-content-enable'])) {

					wc_set_loop_prop('product-content-enable', true);

					// Content
					if(isset($product_style_templates['product-content-content']) && !empty($product_style_templates['product-content-content'])) {
						wc_set_loop_prop('product-content-content', $product_style_templates['product-content-content']);
					}

					// Button Element - Button
					if(isset($product_style_templates['product-content-buttonelement-button']) && !empty($product_style_templates['product-content-buttonelement-button'])) {
						wc_set_loop_prop('product-content-buttonelement-button', $product_style_templates['product-content-buttonelement-button']);
					}

					// Button Element - Secondary Button
					if(isset($product_style_templates['product-content-buttonelement-secondary-button']) && !empty($product_style_templates['product-content-buttonelement-secondary-button'])) {
						wc_set_loop_prop('product-content-buttonelement-secondary-button', $product_style_templates['product-content-buttonelement-secondary-button']);
					}				

					// Icons Group - Icons
					if(isset($product_style_templates['product-content-iconsgroup-icons']) && !empty($product_style_templates['product-content-iconsgroup-icons'])) {
						wc_set_loop_prop('product-content-iconsgroup-icons', $product_style_templates['product-content-iconsgroup-icons']);
					}

					// Element Group Content
					if(isset($product_style_templates['product-content-element-group']) && !empty($product_style_templates['product-content-element-group'])) {
						wc_set_loop_prop('product-content-element-group', $product_style_templates['product-content-element-group']);
					}

				}

		}	


		if(!wc_get_loop_prop('is_shortcode')) {

			if( is_shop() ) {
				$columns = cs_get_option( 'shop-page-product-layout' );
			} elseif( is_product_category() ) {
				$columns = cs_get_option( 'dt-woo-category-archive-product-column' );
			} elseif( is_product_tag() ) {
				$columns = cs_get_option( 'dt-woo-tag-archive-product-column' );
			} else {
				$columns = cs_get_option( 'shop-page-product-layout' );
			}

			if(isset($product_style_templates['product-display-type']) && $product_style_templates['product-display-type'] == 'list') {
				$columns = 1;
			}

			wc_set_loop_prop('columns', $columns);	

		}
	
	}

}

/** Product Style Variables Reset Prop **/

if ( ! function_exists( 'owly_product_style_reset_template_prop' ) ) {

	function owly_product_style_reset_template_prop() {

		unset($GLOBALS['woocommerce_loop']['display_mode']);
		unset($GLOBALS['woocommerce_loop']['product-thumb-secondary-image-onhover']);
		unset($GLOBALS['woocommerce_loop']['product-thumb-content']);
		unset($GLOBALS['woocommerce_loop']['product-thumb-buttonelement-button']);
		unset($GLOBALS['woocommerce_loop']['product-thumb-buttonelement-secondary-button']);
		unset($GLOBALS['woocommerce_loop']['product-thumb-iconsgroup-icons']);
		unset($GLOBALS['woocommerce_loop']['product-thumb-element-group']);
		unset($GLOBALS['woocommerce_loop']['product-content-enable']);
		unset($GLOBALS['woocommerce_loop']['product-content-content']);
		unset($GLOBALS['woocommerce_loop']['product-content-buttonelement-button']);
		unset($GLOBALS['woocommerce_loop']['product-content-buttonelement-secondary-button']);
		unset($GLOBALS['woocommerce_loop']['product-content-iconsgroup-icons']);
		unset($GLOBALS['woocommerce_loop']['product-content-element-group']);
		unset($GLOBALS['woocommerce_loop']['columns']);
	
	}

}

/** Display Mode - From Location **/

if ( ! function_exists( 'owly_woo_post_display_mode_from_location' ) ) {

	function owly_woo_post_display_mode_from_location($woo_product_style_template) {

		if(isset($woo_product_style_template) && (int)$woo_product_style_template > 0) {

			$woo_product_style_templates = cs_get_option( 'dt-woo-product-style-templates' );
			$product_style_templates = (isset($woo_product_style_templates[$woo_product_style_template]) && !empty($woo_product_style_templates[$woo_product_style_template])) ? $woo_product_style_templates[$woo_product_style_template] : false;

		} else {

			$woo_product_style_templates = cs_get_option( 'dt-woo-product-style-templates' );
			$product_style_templates = (isset($woo_product_style_templates[0]) && !empty($woo_product_style_templates[0])) ? $woo_product_style_templates[0] : false;

		}

		$display_mode = isset($product_style_templates['product-display-type']) ? $product_style_templates['product-display-type'] : 'grid';

	 	return $display_mode;

	 }

}


/** Updating Product Loop Class **/

if ( ! function_exists( 'owly_woo_post_class' ) ) {

	function owly_woo_post_class($classes, $class = '', $post_id = '') {

		if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ), true ) ) {
			return $classes;
		}

		// Unset first class

		if(in_array('first', $classes)) {
			unset($classes[array_search('first', $classes)]);
		}


		// Display mode
		
		$display_mode = wc_get_loop_prop( 'display_mode', 'grid' );
		$display_mode = (isset($display_mode) && !empty($display_mode)) ? $display_mode : 'grid';		

        if($display_mode == 'list') {

			$display_class = 'product-list-view'; 

			$display_mode_list_options = wc_get_loop_prop( 'display_mode_list_options', 'left-thumb' );
			$display_mode_list_options = (isset($display_mode_list_options) && !empty($display_mode_list_options)) ? $display_mode_list_options : 'left-thumb';	

			$display_class .= ' product-list-'.$display_mode_list_options; 

        } else {
            $display_class = 'product-grid-view'; 
        }

		array_push($classes, $display_class);


		// Item class for Shortcode Carousel

		if($item_class = wc_get_loop_prop( 'item_class' )) {
			array_push($classes, $item_class);
		}


		// Secondary image class

		$show_secondary_image_on_hover = wc_get_loop_prop( 'product-thumb-secondary-image-onhover' );
		$show_secondary_image_on_hover = (isset($show_secondary_image_on_hover) && !empty($show_secondary_image_on_hover)) ? true : false;

		if($show_secondary_image_on_hover) {

			global $product;

			$attachment_ids = $product->get_gallery_image_ids();

			if(isset($attachment_ids['0'])) {
				array_push($classes, 'product-with-secondary-image');
			}

		}


		if(!in_array('product', $classes)) {
			array_push($classes, 'product');
		}

	 	return $classes;

	 }

	 add_filter('post_class', 'owly_woo_post_class', 21, 3 );

}

/** Updating Product Category Loop Class **/

if ( ! function_exists( 'owly_woo_product_cat_class' ) ) {

	function owly_woo_product_cat_class($classes, $class = '', $category) {

		// Unset first class

		if(in_array('first', $classes)) {
			unset($classes[array_search('first', $classes)]);
		}


		// Display mode
		
		$display_mode = wc_get_loop_prop( 'display_mode', 'grid' );
		$display_mode = (isset($display_mode) && !empty($display_mode)) ? $display_mode : 'grid';		

        if($display_mode == 'list') {
            $display_class = 'product-grid-view'; 
            array_push($classes, $display_class);
        }


		// Item class for Shortcode Carousel

		if($item_class = wc_get_loop_prop( 'item_class' )) {
			array_push($classes, $item_class);
		}

	 	return $classes;

	}

	add_filter('product_cat_class', 'owly_woo_product_cat_class', 21, 3 );

}


/** Button Elements **/

// Cart

if ( ! function_exists( 'owly_woo_loop_product_button_elements_cart' ) ) {

	function owly_woo_loop_product_button_elements_cart() {

		ob_start();
		woocommerce_template_loop_add_to_cart();
		$add_to_cart = ob_get_clean();

		// Add to Cart
		if( !empty($add_to_cart) ) {

			$add_to_cart = str_replace(' class="',' class="dt-sc-button too-small ',$add_to_cart);
			echo '<div class="wcct_btn_wrapper wc_btn_inline" data-tooltip="'.esc_attr__('Add To Cart', 'owly' ).'">'.owly_html_output($add_to_cart).'</div>';

		}

	}

	add_action( 'dt_woo_loop_product_button_elements_cart', 'owly_woo_loop_product_button_elements_cart' );

}

// Wishlist

if ( ! function_exists( 'owly_woo_loop_product_button_elements_wishlist' ) ) {

	function owly_woo_loop_product_button_elements_wishlist() {

		// YITH Wishlist 
		if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {

			global $product;
			$product_id = $product->get_id();

			echo '<div class="wcwl_btn_wrapper wc_btn_inline" data-tooltip="'.esc_attr__('Wishlist', 'owly' ).'">'.do_shortcode('[yith_wcwl_add_to_wishlist product_id="' . $product_id . '"]').'</div>';

		}

	}

	add_action( 'dt_woo_loop_product_button_elements_wishlist', 'owly_woo_loop_product_button_elements_wishlist' );

}

// Quick View

if ( ! function_exists( 'owly_woo_loop_product_button_elements_quickview' ) ) {

	function owly_woo_loop_product_button_elements_quickview() {

		// YITH Quick View 
		if ( shortcode_exists( 'yith_quick_view' ) ) {

			global $product;
			$product_id = $product->get_id();

			echo '<div class="wcqv_btn_wrapper wc_btn_inline" data-tooltip="'.esc_attr__('Quick View', 'owly' ).'">'.do_shortcode('[yith_quick_view product_id="' . $product_id . '"]').'</div>';
		
		}

	}

	add_action( 'dt_woo_loop_product_button_elements_quickview', 'owly_woo_loop_product_button_elements_quickview' );

}

// Compare

if ( ! function_exists( 'owly_woo_loop_product_button_elements_compare' ) ) {

	function owly_woo_loop_product_button_elements_compare() {

		// YITH Compare
		if( class_exists( 'YITH_Woocompare' ) ) {

			global $product;

			$is_button = get_option( 'yith_woocompare_is_button' );
			$button_text = get_option( 'yith_woocompare_button_text', esc_html__( 'Compare', 'owly' ) );
			$class = $is_button == 'button' ? 'button compare yith-woocompare-button' : 'compare yith-woocompare-button';
			$url = array('action' => 'yith-woocompare-add-product', 'id' => $product->get_id() );
			$lang = defined( 'ICL_LANGUAGE_CODE' ) ? ICL_LANGUAGE_CODE : false;
			if( $lang ) {
				$url['lang'] = $lang;
			}

			echo '<div class="wccm_btn_wrapper wc_btn_inline" data-tooltip="'.esc_attr__('Compare', 'owly' ).'"><a href="'.esc_url_raw( add_query_arg( $url ) ).'" class="'.esc_attr($class).'" data-product_id="'.esc_attr($product->get_id()).'" rel="nofollow">'.owly_html_output($button_text).'</a></div>';

		}

	}

	add_action( 'dt_woo_loop_product_button_elements_compare', 'owly_woo_loop_product_button_elements_compare' );

}

// Swatches

if ( ! function_exists( 'owly_woo_loop_product_button_elements_swatches' ) ) {

	function owly_woo_loop_product_button_elements_swatches() {

		// Swatches
		owly_woo_loop_product_content_swatches();

	}

	add_action( 'dt_woo_loop_product_button_elements_swatches', 'owly_woo_loop_product_button_elements_swatches' );

}

// Size Guide

if ( ! function_exists( 'owly_woo_loop_product_button_elements_sizeguide' ) ) {

	function owly_woo_loop_product_button_elements_sizeguide() {

		global $product;
		$product_id = $product->get_id();

		$settings = get_post_meta( $product_id, '_custom_settings', true );
		$single_product_size_guides = (isset($settings['dt-single-product-size-guides']) && $settings['dt-single-product-size-guides'] != '') ? $settings['dt-single-product-size-guides'] : false;

		if($single_product_size_guides) {

			echo '<div class="wcsg_btn_wrapper wc_btn_inline" data-tooltip="'.esc_attr__('Size Guide', 'owly' ).'"><a href="#" class="button dt-wcsg-button" data-product_id="'.esc_attr($product->get_id()).'">'.esc_html__('Size Guide', 'owly' ).'</a></div>';

		}

	}

	add_action( 'dt_woo_loop_product_button_elements_sizeguide', 'owly_woo_loop_product_button_elements_sizeguide' );

}

?>