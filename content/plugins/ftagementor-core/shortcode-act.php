<?php

// Elementor Custom Addonss
if ( in_array('elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
    
    //Elementor Addons File
    function ftagementor_addons_required(){
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_section_title.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_slider_addons.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_contact_info.php';
         require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_latest_blog.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_testimonial.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_about-video.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_counter.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_trailer.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_services.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_gallery.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_team.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_about_content.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_contact_us.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_banner.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_actor_work.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_brand.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_portfolio_addons.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_video_popup_addons.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_trailer_poster.php';
        require_once FTAGEMENTOR_ADDONS_EL_PATH.'include/elementor/ftagementor_addons_pricing.php';

    }
    add_action('elementor/widgets/widgets_registered','ftagementor_addons_required');
}