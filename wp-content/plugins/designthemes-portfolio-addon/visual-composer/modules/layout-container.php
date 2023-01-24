<?php 
add_action( 'vc_before_init', 'dtportfolio_layout_container_vc_map' );

function dtportfolio_layout_container_vc_map() {

	class WPBakeryShortCode_dtportfolio_layout_container extends WPBakeryShortCodesContainer {
	}

	vc_map( array (
		"name" => esc_html__( 'Layout Container', 'dtportfolio' ),
		"base" => "dtportfolio_layout_container",
		"icon" => "dtportfolio_layout_container",
		"category" => DTPORTFOLIO_ADDON_TITLE,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array ( 'only' => 'dtportfolio_portfolios, dtportfolio_onepage_navigation_title_holder, dtportfolio_comment_form, dtportfolio_comment_list, dtportfolio_custom_details, dtportfolio_feature_image, dtportfolio_feature_video, dtportfolio_gallery_listing, dtportfolio_navigation_links, dtportfolio_related_portfolios, dtportfolio_slider, dtportfolio_terms, dtportfolio_title' ),		
		"params" => array (

			// Enable Fullwidth
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Enable Fullwidth','dtportfolio'),
				'param_name' => 'enable_fullwidth',
				'value' => array( 
							esc_html__('False','dtportfolio') => 'false', 
							esc_html__('True','dtportfolio') => 'true', 
						),
				'description' => esc_html__( 'If you wish you can enable fullwidth for any shortcodes that is placed inside this.', 'dtportfolio' ),				
				'std' => 'false',
			),

			// Padding
			array (
				'type' => 'textfield',
				'heading' => esc_html__( 'Padding', 'dtportfolio' ),
				'param_name' => 'padding',
				'description' => esc_html__( 'If you wish you can add padding here.', 'dtportfolio' ),
			),

			// Class
			array (
				'type' => 'textfield',
				'heading' => esc_html__( 'Class', 'dtportfolio' ),
				'param_name' => 'class',
				'description' => esc_html__( 'If you wish you can add additional class name here.', 'dtportfolio' ),
			),

		)
	) );
}
?>