<?php add_action( 'vc_before_init', 'dt_sc_latest_news_vc_map' );
function dt_sc_latest_news_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Latest News", 'designthemes-core' ),
		"base" => "dt_sc_latest_news",
		"icon" => "dt_sc_latest_news",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Post limit
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'News Limit', 'designthemes-core' ),
				'param_name' => 'limit',
				'description' => esc_html__( 'Enter post limit', 'designthemes-core' ),
				'value' => '3',
				'admin_label' => true
			),

			vc_map_add_css_animation(),

			array(
				"type" => "textfield",
				"heading" => __("Animation delay ( optional )", 'designthemes-core'),
				"edit_field_class" => 'vc_col-sm-6 vc_column',
				"param_name" => "delay",
				"value" => "0",
				"description" => __("Set the animation delay ( e.g 200 )", 'designthemes-core')
			),			
		)
	) );
}?>