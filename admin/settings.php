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
                  $settings['snc_bookinglink']	  = $_POST['snc_bookinglink'];
                  $settings['snc_hotelid']	  = $_POST['snc_hotelid'];
                  $settings['snc_hotelname']	  = $_POST['snc_hotelname'];
				  $settings['snc_ibe_booking']	  = $_POST['snc_ibe_booking'];
    			        break;
    	        case 'location' :
    				      $settings['snc_add1']  = $_POST['snc_add1'];
    				      $settings['snc_add2']  = $_POST['snc_add2'];
    				      $settings['snc_city']  = $_POST['snc_city'];
    				      $settings['snc_state']  = $_POST['snc_state'];
    				      $settings['snc_pcode']  = $_POST['snc_pcode'];
    				      $settings['snc_country']  = $_POST['snc_country'];
    				      $settings['snc_phone']  = $_POST['snc_phone'];
    				      $settings['snc_fax']  = $_POST['snc_fax'];
    				      $settings['snc_email']  = $_POST['snc_email'];
    				      $settings['snc_lat']  = $_POST['snc_lat'];
    				      $settings['snc_long']  = $_POST['snc_long'];
    			        break;
    			    case 'social' :
						  $settings['snc_facebook']  = $_POST['snc_facebook'];
						  $settings['snc_instagram']  = $_POST['snc_instagram'];
						  $settings['snc_pinterest']  = $_POST['snc_pinterest'];
						  $settings['snc_youtube']  = $_POST['snc_youtube'];
						  $settings['snc_sinaweibo']  = $_POST['snc_sinaweibo'];
						  $settings['snc_tumblr']  = $_POST['snc_tumblr'];
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

              
              switch ( $tab ){
                case 'general' :
				echo '<table class="form-table">';
                  ?>
				  
                  <tr>
                    <th><label for="snc_bookinglink">Booking Link:</label></th>
                    <td>
                      <input id="snc_bookinglink" name="snc_bookinglink" placeholder="Enter Booking Link" value="<?php echo esc_html( stripslashes( $settings["snc_bookinglink"] ) ); ?>"><br/>
                    </td>
                  </tr>
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
				   <tr>
                    <th><label for="snc_hotelname">Enable IBE Booking Form:</label></th>
                    <td>
                      <input id="snc_ibe_booking" name="snc_ibe_booking" type="checkbox" value="1" <?php if(esc_html( stripslashes( $settings["snc_ibe_booking"] ) )==1){echo 'checked';}?>><br/>
                    </td>
                  </tr>
                  <?php
				echo '<table>';
                break;
                case 'location' :
				echo '<table class="form-table">';
                  ?>
                  <tr>
                    <th><label for="snc_add1">Address1:</label></th>
                    <td>
                      <input id="snc_add1" name="snc_add1" placeholder="Enter Address1" onkeyup="functionSearch()" value="<?php echo esc_html( stripslashes( $settings["snc_add1"] ) ); ?>"><br/>
                    </td>
                  </tr> 
				  <tr>
                    <th><label for="snc_add2">Address2:</label></th>
                    <td>
                      <input id="snc_add2" name="snc_add2" placeholder="Enter Address2" onkeyup="functionSearch()" value="<?php echo esc_html( stripslashes( $settings["snc_add2"] ) ); ?>"><br/>
                    </td>
                  </tr>
				  <tr>
                    <th><label for="snc_city">City:</label></th>
                    <td>
                      <input id="snc_city" name="snc_city" placeholder="Enter City" onkeyup="functionSearch()" value="<?php echo esc_html( stripslashes( $settings["snc_city"] ) ); ?>"><br/>
                    </td>
                  </tr> 
				  <tr>
                    <th><label for="snc_state">State:</label></th>
                    <td>
                      <input id="snc_state" name="snc_state" placeholder="Enter State" onkeyup="functionSearch()" value="<?php echo esc_html( stripslashes( $settings["snc_state"] ) ); ?>"><br/>
                    </td>
                  </tr>
				  <tr>
                    <th><label for="snc_pcode">Postal Code:</label></th>
                    <td>
                      <input id="snc_pcode" name="snc_pcode" placeholder="Enter Postal Code" onkeyup="functionSearch()" value="<?php echo esc_html( stripslashes( $settings["snc_pcode"] ) ); ?>"><br/>
                    </td>
                  </tr>
				  <tr>
                    <th><label for="snc_country">Country:</label></th>
                    <td>
                      <input id="snc_country" name="snc_country" placeholder="Enter Country" onkeyup="functionSearch()" value="<?php echo esc_html( stripslashes( $settings["snc_country"] ) ); ?>"><br/>
                    </td>
                  </tr>
				  <tr>
                    <th><label for="snc_phone">Phone:</label></th>
                    <td>
                      <input id="snc_phone" name="snc_phone" placeholder="Enter Phone Number"  value="<?php echo esc_html( stripslashes( $settings["snc_phone"] ) ); ?>"><br/>
                    </td>
                  </tr>
				  <tr>
                    <th><label for="snc_fax">Fax:</label></th>
                    <td>
                      <input id="snc_fax" name="snc_fax" placeholder="Enter Fax"  value="<?php echo esc_html( stripslashes( $settings["snc_fax"] ) ); ?>"><br/>
                    </td>
                  </tr>
				  <tr>
                    <th><label for="snc_email">Email:</label></th>
                    <td>
                      <input id="snc_email" name="snc_email" placeholder="Enter Email Address"  value="<?php echo esc_html( stripslashes( $settings["snc_email"] ) ); ?>"><br/>
                    </td>
                  </tr>
					<?php 
					echo '<table>';
						$add1 = esc_html( stripslashes( $settings["snc_add1"] ) );
						$add2 = esc_html( stripslashes( $settings["snc_add2"] ) );
						$city = esc_html( stripslashes( $settings["snc_city"] ) );
						$state = esc_html( stripslashes( $settings["snc_state"] ) );
						$pcode = esc_html( stripslashes( $settings["snc_pcode"] ) );
						$country = esc_html( stripslashes( $settings["snc_pcode"] ) );
						 
					?>
						
						<fieldset class="gllpLatlonPicker">
							<input type="text" id="gllpSearchField" class="gllpSearchField" value="<?php echo $add1.' '.$add2.' '.$city.' '.$state.' '.$pcode.' '.$country; ?>">
							<input type="button" id="gllpSearchButton" class="gllpSearchButton" value="search">
							<br/><br/>
							<div class="gllpMap">Google Maps</div>
							<br/>
								<input type="hidden" id="snc_lat1" name="snc_lat1" class="gllpLatitude" value="<?php echo esc_html( stripslashes( $settings["snc_lat"] ) ); ?>"/>
							
								<input type="hidden" id="snc_long1" name="snc_long1" class="gllpLongitude" value="<?php echo esc_html( stripslashes( $settings["snc_long"] ) ); ?>"/>
							 <input type="hidden" class="gllpZoom" value="11"/>
							<!--<input type="button" class="gllpUpdateButton" value="update map">
							<br/>-->
							
						</fieldset>
					<?php 
						echo '<table class="form-table">';
					?>
					
					<tr>
						<th><label for="snc_lat">Latitude:</label></th>
						<td>
						  <input type="text" id="snc_lat" name="snc_lat" class="gllpLatitude" placeholder="Enter Latitude" value="<?php echo esc_html( stripslashes( $settings["snc_lat"] ) ); ?>"><br/>
						</td>
					  </tr>
					  <tr>
						<th><label for="snc_long">Longitude:</label></th>
						<td>
						  <input type="text" id="snc_long" name="snc_long" class="gllpLongitude" placeholder="Enter Longitude" value="<?php echo esc_html( stripslashes( $settings["snc_long"] ) ); ?>"><br/>
						</td>
					</tr>
                  <?php
					echo '<table>';
                break;
                case 'social' :
					echo '<table class="form-table">';
                  ?>
					<tr>
						<th><label for="snc_facebook">Facebook:</label></th>
						<td>
						  <input type="text" id="snc_facebook" name="snc_facebook" class="snc_facebook" placeholder="Enter Facebook Url" value="<?php echo esc_html( stripslashes( $settings["snc_facebook"] ) ); ?>"><br/>
						</td>
					</tr>
					<tr>
						<th><label for="snc_instagram">Instagram:</label></th>
						<td>
						  <input type="text" id="snc_instagram" name="snc_instagram" class="snc_instagram" placeholder="Enter Instagram Url" value="<?php echo esc_html( stripslashes( $settings["snc_instagram"] ) ); ?>"><br/>
						</td>
					</tr>
					<tr>
						<th><label for="snc_pinterest">Pinterest:</label></th>
						<td>
						  <input type="text" id="snc_pinterest" name="snc_pinterest" class="snc_pinterest" placeholder="Enter Pinterest Url" value="<?php echo esc_html( stripslashes( $settings["snc_pinterest"] ) ); ?>"><br/>
						</td>
					</tr>
					<tr>
						<th><label for="snc_youtube">Youtube:</label></th>
						<td>
						  <input type="text" id="snc_youtube" name="snc_youtube" class="snc_youtube" placeholder="Enter Youtube Url" value="<?php echo esc_html( stripslashes( $settings["snc_youtube"] ) ); ?>"><br/>
						</td>
					</tr>
					<tr>
						<th><label for="snc_sinaweibo">Sina Weibo:</label></th>
						<td>
						  <input type="text" id="snc_sinaweibo" name="snc_sinaweibo" class="snc_sinaweibo" placeholder="Enter Sina Weibo Url" value="<?php echo esc_html( stripslashes( $settings["snc_sinaweibo"] ) ); ?>"><br/>
						</td>
					</tr>
					<tr>
						<th><label for="snc_tumblr">Tumblr:</label></th>
						<td>
						  <input type="text" id="snc_tumblr" name="snc_tumblr" class="snc_tumblr" placeholder="Enter Tumblr Url" value="<?php echo esc_html( stripslashes( $settings["snc_tumblr"] ) ); ?>"><br/>
						</td>
					</tr>
					<tr>
						<th><label for="snc_ga">Insert tracking code:</label></th>
						<td>
						  <textarea id="snc_ga" name="snc_ga" cols="60" rows="5"><?php echo esc_html( stripslashes( $settings["snc_ga"] ) ); ?></textarea><br/>
						  <span class="description">Enter your Google Analytics tracking code:</span>
						</td>
					</tr>
                  <?php
				   echo '</table>';
                break;
              }
             
            }
            ?>
            <p class="submit" style="clear: both;">
              <input type="submit" name="Submit"  class="button-primary" value="Update Settings" />
              <input type="hidden" name="snc-settings-submit" value="Y" />
            </p>
          </form>

          
        </div>

      </div>
    <?php
    }
}

new Sn_Hotel_Settings();
