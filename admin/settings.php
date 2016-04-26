<?php

class Sn_Hotel_Settings {

    function __construct() {
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function snc_load_settings_page() {
    	if ( $_POST["snc-settings-submit"] == 'Y' ) {
    		check_admin_referer( "snc-settings-page" );
    		$this->snc_save_theme_settings();
    		$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
    		wp_redirect(admin_url('admin.php?page=snhotel&'.$url_parameters));
    		exit;
    	}
    }

    function snc_save_theme_settings() {
    	global $pagenow;
    	$settings = get_option( "snc_theme_settings" );

    	if ( $pagenow == 'admin.php' && $_GET['page'] == 'snhotel' ){
    		if ( isset ( $_GET['tab'] ) )
    	        $tab = $_GET['tab'];
    	    else
    	        $tab = 'general';

    	    switch ( $tab ){
    	        case 'general' :
                  $settings['snc_hotelid']	  = $_POST['snc_hotelid'];
                  $settings['snc_hotelname']	  = $_POST['snc_hotelname'];
    			        break;
    	        case 'location' :
    				      $settings['snc_ga']  = $_POST['snc_ga'];
    			        break;
    			    case 'social' :
                  $settings['snc_ga']  = $_POST['snc_ga'];
    			        break;
    	    }
    	}

    	if( !current_user_can( 'unfiltered_html' ) ){
    		if ( $settings['snc_ga']  )
    			$settings['snc_ga'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['snc_ga'] ) ) );
    	}

    	$updated = update_option( "snc_theme_settings", $settings );
    }

    function admin_menu() {
        $menu_position = apply_filters( 'snhotel_menu_position', 16 );
       $capability = apply_filters( 'snhotel_menu_capability', 'activate_plugins' );

      	$settings_page = add_menu_page( __( 'snhotel', 'wpuf' ), __( 'SNHotels', 'wpuf' ), 'edit_posts', 'snhotel', array($this, 'plugin_settings'), null, $menu_position );
        add_action( "load-{$settings_page}", array($this, 'snc_load_settings_page') );
        /* add_submenu_page( 'snhotel', __( 'Offers', 'snhotel' ), __( 'Offers', 'snhotel' ),'edit_posts', 'edit.php?post_type=snhotel_offer' );

        add_submenu_page( 'snhotel', __( 'Accommodations', 'snhotel' ), __( 'Accommodations', 'snhotel' ), 'edit_posts', 'edit.php?post_type=snhotel_room' );

		    add_submenu_page( 'snhotel', __( 'Events', 'snhotel' ), __( 'Events', 'snhotel' ), 'edit_posts', 'edit.php?post_type=snhotel_event' );

		    add_submenu_page( 'snhotel', __( 'Facilities', 'snhotel' ), __( 'Facilities', 'snhotel' ), 'edit_posts', 'edit.php?post_type=snhotel_facility' ); */
    }

    function snc_admin_tabs( $current = 'general' ) {
        $tabs = array( 'general' => 'General', 'location' => 'Location', 'social' => 'Social' );
        $links = array();
        echo '<div id="icon-themes" class="icon32"><br></div>';
        echo '<h2 class="nav-tab-wrapper">';
        foreach( $tabs as $tab => $name ){
            $class = ( $tab == $current ) ? ' nav-tab-active' : '';
            echo "<a class='nav-tab$class' href='?page=snhotel&tab=$tab'>$name</a>";
        }
        echo '</h2>';
    }

    function plugin_settings() {
      global $pagenow;
      $settings = get_option( "snc_theme_settings" );
      $theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
      ?>

      <div class="wrap">
        <h2><?php echo $theme_data['Name']; ?> Settings</h2>

        <?php
          if ( 'true' == esc_attr( $_GET['updated'] ) ) echo '<div class="updated" ><p>Theme Settings updated.</p></div>';

          if ( isset ( $_GET['tab'] ) ) $this->snc_admin_tabs($_GET['tab']); else $this->snc_admin_tabs('general');
        ?>

        <div id="poststuff">
          <form method="post" action="<?php admin_url( 'admin.php?page=snhotel' ); ?>">
            <?php
            wp_nonce_field( "snc-settings-page" );

            if ( $pagenow == 'admin.php' && $_GET['page'] == 'snhotel' ){

              if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab'];
              else $tab = 'general';

              echo '<table class="form-table">';
              switch ( $tab ){
                case 'general' :
                  ?>
                  <tr>
                    <th><label for="snc_hotelid">Hotel ID:</label></th>
                    <td>
                      <input id="snc_hotelid" name="snc_hotelid" placeholder="Enter Hotel ID" value="<?php echo esc_html( stripslashes( $settings["snc_hotelid"] ) ); ?>"><br/>
                    </td>
                  </tr>
                  <tr>
                    <th><label for="snc_hotelname">Hotel Name:</label></th>
                    <td>
                      <input id="snc_hotelname" name="snc_hotelname" placeholder="Enter Hotel Name" value="<?php echo esc_html( stripslashes( $settings["snc_hotelname"] ) ); ?>"><br/>
                    </td>
                  </tr>
                  <?php
                break;
                case 'location' :
                  ?>
                  <tr>
                    <th><label for="snc_ga">Insert tracking code:</label></th>
                    <td>
                      <textarea id="snc_ga" name="snc_ga" cols="60" rows="5"><?php echo esc_html( stripslashes( $settings["snc_ga"] ) ); ?></textarea><br/>
                      <span class="description">Enter your Google Analytics tracking code:</span>
                    </td>
                  </tr>
                  <?php
                break;
                case 'social' :
                  ?>
                  <tr>
                    <th><label for="snc_ga">Insert tracking code:</label></th>
                    <td>
                      <textarea id="snc_ga" name="snc_ga" cols="60" rows="5"><?php echo esc_html( stripslashes( $settings["snc_ga"] ) ); ?></textarea><br/>
                      <span class="description">Enter your Google Analytics tracking code:</span>
                    </td>
                  </tr>
                  <?php
                break;
              }
              echo '</table>';
            }
            ?>
            <p class="submit" style="clear: both;">
              <input type="submit" name="Submit"  class="button-primary" value="Update Settings" />
              <input type="hidden" name="snc-settings-submit" value="Y" />
            </p>
          </form>

          <p><?php echo $theme_data['Name'] ?> by <a href="http://sakhatech.com/" target="_blank">Sakhatech.com</a></p>
        </div>

      </div>
    <?php
    }
}

new Sn_Hotel_Settings();
