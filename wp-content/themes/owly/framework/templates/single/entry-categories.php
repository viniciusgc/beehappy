<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php
	if( $post_Style == 'breadcrumb-parallax' || $post_Style == 'overlay' ):
		the_category(' ');
	elseif( $post_Style == 'breadcrumb-fixed' ): ?>
    	<div class="category-wrap"><?php
			the_category(' '); ?>
        </div><?php
	elseif( $post_Style == 'overlap' ): ?>
    	<div class="category-wrap">
            <i class="fas fa-folder"> </i>
            <?php the_category(', '); ?>
        </div><?php
	else: ?>
		<i class="fas fa-folder"> </i>
		<?php the_category(' ');
	endif; ?>