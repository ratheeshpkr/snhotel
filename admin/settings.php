<?php

class Sn_Hotel_Settings {

    function __construct() {
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_menu() {
        $menu_position = apply_filters( 'snhotel_menu_position', 16 );
       $capability = apply_filters( 'snhotel_menu_capability', 'activate_plugins' );
		

        add_menu_page( __( 'snhotel', 'wpuf' ), __( 'SNHotels', 'wpuf' ), 'edit_posts', 'snhotel', array($this, 'plugin_settings'), null, $menu_position );
       		
        /* add_submenu_page( 'snhotel', __( 'Offers', 'snhotel' ), __( 'Offers', 'snhotel' ),'edit_posts', 'edit.php?post_type=snhotel_offer' );

        add_submenu_page( 'snhotel', __( 'Accommodations', 'snhotel' ), __( 'Accommodations', 'snhotel' ), 'edit_posts', 'edit.php?post_type=snhotel_room' );  
		
		add_submenu_page( 'snhotel', __( 'Events', 'snhotel' ), __( 'Events', 'snhotel' ), 'edit_posts', 'edit.php?post_type=snhotel_event' );
		
		 add_submenu_page( 'snhotel', __( 'Facilities', 'snhotel' ), __( 'Facilities', 'snhotel' ), 'edit_posts', 'edit.php?post_type=snhotel_facility' ); */
    }
    function plugin_settings() {
        echo '<div class="wrap">';
            echo '<h2>SNHotels Services</h2';
        echo '</div>';
    }
}

new Sn_Hotel_Settings();
