<div class="dt-no-header-builder-content dt-no-header-owly">

    <div class="no-header">
        <div class="no-header-logo-wrapper"><?php
            if( owly_plugin_is_active('kirki/kirki.php') ):
                $use_logo = (int) get_theme_mod( 'use-custom-logo', owly_defaults('use-custom-logo') );
                $url= get_theme_mod( 'custom-logo', owly_defaults('custom-logo') );
                if( !empty( $use_logo ) && !empty( $url ) ): ?>
                    <a href="<?php echo esc_url(home_url('/'));?>" title="<?php bloginfo('title'); ?>">
                        <img class="normal_logo" src="<?php echo esc_url($url);?>" alt="<?php bloginfo('title'); ?>" title="<?php bloginfo('title'); ?>" />
                    </a><?php
                endif;
                if( empty( $use_logo )): ?>
                    <div class="logo-title">
                        <h1 id="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('title'); ?>"><?php bloginfo('title'); ?></a></h1>
                    </div><?php
                endif;
            else: ?>
                <a href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
                    <img src="<?php echo OWLY_THEME_URI.'/images/logo.png'; ?>" alt="<?php echo esc_attr__('Logo', 'owly'); ?>" title="<?php echo esc_attr__('Logo', 'owly'); ?>"></a><?php
            endif; ?>
        </div>

        <div class="no-header-menu-wrapper">
            <div class="no-header-menu dt-header-menu" data-menu="dummy-menu">
                <?php
                    $args = array(
                        'theme_location' => 'main-menu',
                        'container_class' => 'menu-container',
                        'items_wrap' => '<ul id="%1$s" class="%2$s" data-menu="dummy-menu"> <li class="close-nav"></li> %3$s </ul> <div class="sub-menu-overlay"></div>',
                        'menu_class' => 'dt-primary-nav',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'fallback_cb' => 'owly_new_wp_page_menu',
                        'walker' => new DTWPHeaderMenuWalker                    
                    );
    
                    if( owly_plugin_is_active('designthemes-core-features/designthemes-core-features.php')  ) {
                        $args['walker'] = new DTHeaderMenuWalker;
                    }
    
                    wp_nav_menu( $args );
                ?>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="dummy-menu">
            <div class="menu-trigger menu-trigger-icon" data-menu="dummy-menu"><i></i><span><?php esc_html_e('Menu', 'owly'); ?></span></div>
            <div class="mobile-menu" data-menu="dummy-menu"></div>
            <div class="overlay"></div>
        </div>
        <!-- Mobile Menu -->

    </div>
</div>