<?php

function dtportfolio_generate_skin_colors() {

	$primary_color = dtportfolio_cs_get_option( 'portfolio-primary-color', 'red' );
	$secondary_color = dtportfolio_cs_get_option( 'portfolio-secondary-color', '' );
	$tertiary_color = dtportfolio_cs_get_option( 'portfolio-tertiary-color', '' );

	$primary_alternate_color = dtportfolio_cs_get_option( 'portfolio-primary-alternate-color', '' );
	$secondary_alternate_color = dtportfolio_cs_get_option( 'portfolio-secondary-alternate-color', '' );
	$tertiary_alternate_color = dtportfolio_cs_get_option( 'portfolio-tertiary-alternate-color', '' );	
	

	$output = '';

	$output .= '.dtportfolio-item .dtportfolio-image-overlay .links a:hover, .dtportfolio-item .dtportfolio-image-overlay a:hover, .dtportfolio-fullpage-carousel .dtportfolio-fullpage-carousel-content a:hover, .dtportfolio-item.dtportfolio-hover-modern-title .dtportfolio-image-overlay .links a:hover, .dtportfolio-swiper-pagination-holder .dtportfolio-swiper-playpause:hover, .dtportfolio-item.dtportfolio-hover-grayscale .dtportfolio-image-overlay-details h2 a:hover { color:'.$primary_color.'}';	

	$output .= '.dtportfolio-swiper-pagination-holder .swiper-pagination-bullet-active { background:'.$primary_color.'}';	


	return $output;

}

?>