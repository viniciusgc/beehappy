<?php
	//Global Options...
	$postlayout = cs_get_option( 'blog-post-layout' );
	$postglstyle = cs_get_option( 'blog-post-grid-list-style' );
	$postcostyle = cs_get_option( 'blog-post-cover-style' );
	$postlistthumb = cs_get_option( 'blog-list-thumb' );
	$postalignment = cs_get_option( 'blog-alignment' );
	$postequalheight = cs_get_option( 'enable-equal-height' );
	$postgalslider = cs_get_option( 'enable-gallery-slider' );
	$elementspos = cs_get_option( 'blog-elements-position' );
	$elementspos = is_array( $elementspos ) ? implode( ',', array_keys( $elementspos['enabled'] ) ) : '';
	$metaspos = cs_get_option( 'blog-meta-position' );
	$metaspos = is_array( $metaspos ) ? implode( ',', array_keys( $metaspos['enabled'] ) ) : '';
	$enablepostformat = cs_get_option( 'enable-post-format' );
	$enablevideoaudio = cs_get_option( 'enable-video-audio' );
	$readmoretext = cs_get_option( 'blog-readmore-text' );
	$img_hover_style = cs_get_option( 'blog-image-hover-style' );
	$img_overlay_style = cs_get_option( 'blog-image-overlay-style' );

	$title_opt = owly_cs_get_option( 'post-related-title', esc_html__('Related Posts', 'owly') );
	$title = isset( $related_Title ) ? $related_Title : $title_opt;

	$column_opt = cs_get_option( 'post-related-columns' );
	$column = isset( $related_Column ) ? $related_Column : $column_opt;
	$column = ( $postlayout == 'entry-list' ) ? 'one-column' : $column;

	$count_opt = cs_get_option( 'post-related-count' );
	$count = isset( $related_Count ) ? $related_Count : $count_opt;

	$enable_except_opt = cs_get_option( 'enable-related-excerpt' );
	$enable_except = isset( $related_Excerpt ) ? $related_Excerpt : $enable_except_opt;

	$except_length_opt = cs_get_option( 'post-related-excerpt' );
	$except_length = isset( $related_Excerpt_Length ) ? $related_Excerpt_Length : $except_length_opt;

	$enable_carousel_opt = cs_get_option( 'enable-related-carousel' );
	$enable_carousel = isset( $related_Carousel ) ? $related_Carousel : $enable_carousel_opt;

	$enable_carousel = !empty( $enable_carousel ) ? 'dt-related-carousel' : '';
	$postequalheight = !empty( $enable_carousel ) ? true : $postequalheight;

	$navs_style_opt = cs_get_option( 'related-carousel-nav' );
	$navs_style = isset( $related_Nav_Style ) ? $related_Nav_Style : $navs_style_opt;

	$col_arr = array( 'one-column' => 1, 'one-half-column' => 2, 'one-third-column' => 3, 'one-fourth-column' => 4 );
	$data_items = ( $postlayout != 'entry-list' ) ? $col_arr[$column] : 1;

    $post_cats = wp_get_post_categories( $post_ID );
	if( !empty( $post_cats ) ): ?>
    	<h4><?php echo esc_html($title); ?></h4>

        <div class="dt-sc-related-posts <?php echo esc_attr($enable_carousel); ?>" data-items="<?php echo esc_attr($data_items); ?>"><?php

			$sc = '[dt_sc_blog_post count="'.$count.'" blog_post_layout="'.$postlayout.'" blog_post_grid_list_style="'.$postglstyle.'" blog_post_cover_style="'.$postcostyle.'" blog_post_columns="'.$column.'" blog_list_thumb="'.$postlistthumb.'" blog_alignment="'.$postalignment.'" enable_equal_height="'.$postequalheight.'" enable_gallery_slider="'.$postgalslider.'" blog_elements_position="'.$elementspos.'" blog_meta_position="'.$metaspos.'" enable_post_format="'.$enablepostformat.'" enable_video_audio="'.$enablevideoaudio.'" enable_excerpt_text="'.$enable_except.'" blog_excerpt_length="'.$except_length.'" blog_readmore_text="'.$readmoretext.'" blog_image_hover_style="'.$img_hover_style.'" blog_image_overlay_style="'.$img_overlay_style.'" _post_not_in="'.$post_ID.'" _post_categories="'.implode( ',', $post_cats ).'" /]';

			if( shortcode_exists( 'dt_sc_blog_post' ) )
				echo do_shortcode( $sc );

			if( $enable_carousel != '' && $navs_style == 'navigation' ): ?>
                <div class="carousel-navigation">
                    <div class="prev-arrow"><i class="fas fa-angle-left"></i></div>
                    <div class="next-arrow"><i class="fas fa-angle-right"></i></div>
                </div><?php
			elseif( $enable_carousel != '' && $navs_style == 'pager' ): ?>
            	<div class="carousel-pager"></div><?php
			endif; ?>
        </div><?php
	endif; ?>