<?php 

vc_map( array(
	"name" => esc_html__( 'Product Single - Images Default', 'designthemes-core' ),
	"base" => "dt_sc_product_images_default",
	"icon" => "dt_sc_product_images_default",
	"category" => DT_VC_SHOP,
	"params" => array(

		// Product Id
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Product Id', 'designthemes-core'),
			'param_name' => 'product_id',
			'description' => esc_html__('Provide product id for which you have to display woocommerce default product images gallery. No need to provide ID if it is used in Product single page.', 'designthemes-core'),
			'edit_field_class' => 'vc_column vc_col-sm-6',
			'admin_label' => true
		)
		
	)
) );

?>