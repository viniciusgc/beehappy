<?php add_action( 'vc_before_init', 'dt_sc_search_form_vc_map' );
function dt_sc_search_form_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Search Form", 'designthemes-core' ),
		"base" => "dt_sc_search_form",
		"icon" => "dt_sc_search_form",
		"category" => DT_VC_CATEGORY,
		"show_settings_on_create" => false,
		"params" => array(
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