<?php
/*
Plugin Name: SNHotels
Plugin URI: http://www.sakhatech.com/
Description: Custom posttypes for Responsive hotel websites
Version: v1.7
Github Plugin URI: https://github.com/ratheeshpkr/snhotel
Author: Sakhatech
Author URI: http://www.sakhatech.com/
License: GPL2
GitHub Branch:     master
*/


// don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Sn_hotel class
 *
 * @class Sn_hotel The class that holds the entire Sn_hotel plugin
 */

require 'plugin-update-checker/plugin-update-checker.php';
 $MyUpdateChecker = PucFactory::buildUpdateChecker(
    'http://snc.staging.snhotels.com/metadata.json',
  __FILE__,
  'snhotel'
 );

  //   require 'plugin-update-checker/plugin-update-checker.php';
  // $className = PucFactory::getLatestClassVersion('PucGitHubChecker');
  // $myUpdateChecker = new $className(
  //     'https://github.com/ratheeshpkr/snhotel',
  //     FILE,
  //     'master'
  // );
echo '<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>';
echo '<script src="'. plugins_url( 'js/jquery-2.1.1.min.js' , __FILE__ ) . '"></script>';
echo '<script src="'. plugins_url( 'js/jquery-gmaps-latlon-picker.js' , __FILE__ ) . '"></script>';
echo '<link href="'. plugins_url( 'css/jquery-gmaps-latlon-picker.css' , __FILE__ ) . '" rel="stylesheet" type="text/css" />';

class Sn_hotel {

    public $plugin_url;
    public $plugin_path;
    public $theme_dir_path;

    /**
     * Constructor for the Sn_hotel class
     *
     * Sets up all the appropriate hooks and actions
     * within our plugin.
     *
     * @uses register_activation_hook()
     * @uses register_deactivation_hook()
     * @uses is_admin()
     * @uses add_action()
     */
    public function __construct() {

        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        $this->file_includes();

        // Localize our plugin
        add_action( 'init', array( $this, 'localization_setup' ) );
        add_action( 'init', array( $this, 'init_post_types' ) );
        add_action( 'init', array( $this, 'init' ) );
        add_action( 'admin_notices', array( $this, 'required_plugin_notice' ) );

        add_filter( 'template_include', array( $this, 'template_loader' ), 20 );

        // Loads frontend scripts and styles
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

        add_filter( 'body_class', array($this, 'body_class') );

        add_filter( 'parent_file', array($this, 'fix_parent_menu' ) );
    }

    /**
     * Initializes the Sn_hotel() class
     *
     * Checks for an existing Sn_hotel() instance
     * and if it doesn't find one, creates it.
     */
    public static function get_instance() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new Sn_hotel();
        }

        return $instance;
    }

    function init() {
        $this->theme_dir_path = apply_filters( 'snhotel_theme_dir_path', 'snhotel/' );
    }
	// register jquery and style on initialization
	
    function file_includes() {

        if ( is_admin() ) {
            require_once dirname( __FILE__ ) . '/includes/metadata.php';
            require_once dirname( __FILE__ ) . '/admin/settings.php';
            
        } else {
            require_once dirname( __FILE__ ) . '/includes/core-functions.php';
            require_once dirname( __FILE__ ) . '/includes/template-functions.php';
			/* wp_enqueue_style('latlon-picker-css', plugins_url('jquery-gmaps-latlon-picker.css',__FILE__ ));
			wp_enqueue_script( 'latlon-picker-js', plugins_url('jquery-gmaps-latlon-picker.js',__FILE__ )); */
			
        }

        require_once dirname( __FILE__ ) . '/includes/posts-to-posts.php';
		
		
    }

    /**
     * Placeholder for activation function
     *
     * Nothing being called here yet.
     */
    public function activate() {

    }

    /**
     * Placeholder for deactivation function
     *
     * Nothing being called here yet.
     */
    public function deactivate() {

    }

    /**
     * Initialize plugin for localization
     *
     * @uses load_plugin_textdomain()
     */
    public function localization_setup() {
        load_plugin_textdomain( 'snhotel', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    /**
     * Enqueue admin scripts
     *
     * Allows plugin assets to be loaded.
     *
     * @uses wp_enqueue_script()
     * @uses wp_localize_script()
     * @uses wp_enqueue_style
     */
    public function enqueue_scripts() {

        /**
         * All styles goes here
         */
       /*  wp_enqueue_style( 'snhotel-styles', plugins_url( 'assets/css/style.css', __FILE__ ), false, date( 'Ymd' ) );
        wp_enqueue_style( 'ui-styles', plugins_url( 'assets/css/ui.css', __FILE__ ), false, date( 'Ymd' ) );
        wp_enqueue_style( 'flexslider', plugins_url( 'assets/css/flexslider.css', __FILE__ ), false, date( 'Ymd' ) ); */

        /**
         * All scripts goes here
         */
       /*  wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script( 'jquery-ui-accordion' );
        wp_enqueue_script( 'jquery-ui-tabs' );
        wp_enqueue_script( 'flexslider', plugins_url( 'assets/js/jquery.flexslider.js', __FILE__ ), array( 'jquery' ), false, true );
        wp_enqueue_script( 'snhotel-scripts', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), false, true ); */


        /**
         * Example for setting up text strings from Javascript files for localization
         *
         * Uncomment line below and replace with proper localization variables.
         */
        // $translation_array = array( 'some_string' => __( 'Some string to translate', 'snhotel' ), 'a_value' => '10' );
        // wp_localize_script( 'base-plugin-scripts', 'snhotel', $translation_array ) );

    }

    /**
     * Register necessary post types and custom taxonomies
     *
     * @return void
     */
    function init_post_types() {

        $show_in_menu = true;
		$menu_position = 2;

        register_post_type( 'snhotel_offer', array(
            'label'           => __( 'Offers', 'snhotel' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
			'menu_position'	  => $menu_position,
			'show_in_admin_bar'=> true,
            'capability_type' => 'post',
			'map_meta_cap'	  => true,
            'hierarchical'    => false,
            'rewrite'         => false,
            'rewrite'         => array('slug' => 'deal','with_front' => FALSE),
            'query_var'       => true,
            'has_archive'     => 'deals',
            'supports'        => array('title', 'editor', 'thumbnail','excerpt'),
            'labels'          => array(
                'name'               => __( 'Offers', 'snhotel' ),
                'singular_name'      => __( 'Offer', 'snhotel' ),
                'menu_name'          => __( 'Offers', 'snhotel' ),
                'all_items'          => __( 'All Offers', 'snhotel' ),
                'add_new'            => __( 'Add New', 'snhotel' ),
                'add_new_item'       => __( 'Add New Offer', 'snhotel' ),
                'edit'               => __( 'Edit', 'snhotel' ),
                'edit_item'          => __( 'Edit Offer', 'snhotel' ),
                'new_item'           => __( 'New Offer', 'snhotel' ),
                'view'               => __( 'View Offer', 'snhotel' ),
                'view_item'          => __( 'View Offer', 'snhotel' ),
                'search_items'       => __( 'Search Offers', 'snhotel' ),
                'not_found'          => __( 'No Offers Found', 'snhotel' ),
                'not_found_in_trash' => __( 'No Offers Found in Trash', 'snhotel' ),
                'parent'             => __( 'Parent Offer', 'snhotel' ),
            ),
        ) );

		register_post_type( 'snhotel_event', array(
            'label'           => __( 'Events', 'snhotel' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
			'menu_position'	  => $menu_position,
			'show_in_admin_bar'=> true,
            'capability_type' => 'post',
			'map_meta_cap'	  => true,
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'event', 'with_front' => FALSE),
            'query_var'       => true,
            'has_archive'     => 'events',
            'supports'        => array('title', 'editor', 'thumbnail','excerpt'),
            'labels'          => array(
                'name'               => __( 'Events', 'snhotel' ),
                'singular_name'      => __( 'Event', 'snhotel' ),
                'menu_name'          => __( 'Events', 'snhotel' ),
				'all_items'          => __( 'All Events', 'snhotel' ),
                'add_new'            => __( 'Add New', 'snhotel' ),
                'add_new_item'       => __( 'Add New Event', 'snhotel' ),
                'edit'               => __( 'Edit', 'snhotel' ),
                'edit_item'          => __( 'Edit Event', 'snhotel' ),
                'new_item'           => __( 'New Event', 'snhotel' ),
                'view'               => __( 'View Event', 'snhotel' ),
                'view_item'          => __( 'View Event', 'snhotel' ),
                'search_items'       => __( 'Search Events', 'snhotel' ),
                'not_found'          => __( 'No Events Found', 'snhotel' ),
                'not_found_in_trash' => __( 'No Events Found in Trash', 'snhotel' ),
                'parent'             => __( 'Parent Event', 'snhotel' ),
            ),
        ) );

        register_post_type( 'snhotel_room', array(
            'label'           => __( 'Accommodation', 'snhotel' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
			'menu_position'	  => $menu_position,
			'show_in_admin_bar'=> true,
            'capability_type' => 'post',
			'map_meta_cap'	  => true,
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'accommodation', 'with_front' => FALSE),
            'query_var'       => true,
            'has_archive'     => 'accommodations',
            'supports'        => array('title', 'editor', 'thumbnail','excerpt'),
            'labels'          => array(
                'name'               => __( 'Accommodations', 'snhotel' ),
                'singular_name'      => __( 'Accommodation', 'snhotel' ),
                'menu_name'          => __( 'Accommodations', 'snhotel' ),
				'all_items'          => __( 'All Accommodations', 'snhotel' ),
                'add_new'            => __( 'Add New', 'snhotel' ),
                'add_new_item'       => __( 'Add New Accommodation', 'snhotel' ),
                'edit'               => __( 'Edit', 'snhotel' ),
                'edit_item'          => __( 'Edit Accommodation', 'snhotel' ),
                'new_item'           => __( 'New Accommodation', 'snhotel' ),
                'view'               => __( 'View Accommodation', 'snhotel' ),
                'view_item'          => __( 'View Accommodation', 'snhotel' ),
                'search_items'       => __( 'Search Accommodations', 'snhotel' ),
                'not_found'          => __( 'No Accommodations Found', 'snhotel' ),
                'not_found_in_trash' => __( 'No Accommodations Found in Trash', 'snhotel' ),
                'parent'             => __( 'Parent Accommodation', 'snhotel' ),
            ),
        ) );
        register_post_type( 'snhotel_facility', array(
            'label'           => __( 'Facilities', 'snhotel' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
			'menu_position'	  => $menu_position,
			'show_in_admin_bar'=> true,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'facility', 'with_front' => FALSE),
            'query_var'       => true,
            'has_archive'     => 'facilities',
            'supports'        => array('title', 'editor', 'thumbnail','excerpt'),
            'labels'          => array(
                'name'               => __( 'Facilities', 'snhotel' ),
                'singular_name'      => __( 'Facility', 'snhotel' ),
                'menu_name'          => __( 'Facilities', 'snhotel' ),
				'all_items'          => __( 'All Facilities', 'snhotel' ),
                'add_new'            => __( 'Add New', 'snhotel' ),
                'add_new_item'       => __( 'Add New Facility', 'snhotel' ),
                'edit'               => __( 'Edit', 'snhotel' ),
                'edit_item'          => __( 'Edit Facility', 'snhotel' ),
                'new_item'           => __( 'New Facility', 'snhotel' ),
                'view'               => __( 'View Facility', 'snhotel' ),
                'view_item'          => __( 'View Facility', 'snhotel' ),
                'search_items'       => __( 'Search Facilities', 'snhotel' ),
                'not_found'          => __( 'No Facilities Found', 'snhotel' ),
                'not_found_in_trash' => __( 'No Facilities Found in Trash', 'snhotel' ),
                'parent'             => __( 'Parent Facility', 'snhotel' ),
            ),
        ) );
		register_post_type( 'snhotel_destination', array(
            'label'           => __( 'Destinations', 'snhotel' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
			'menu_position'	  => $menu_position,
			'show_in_admin_bar'=> true,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'destination', 'with_front' => FALSE),
            'query_var'       => true,
            'has_archive'     => 'destinations',
            'supports'        => array('title', 'editor', 'thumbnail','excerpt'),
            'labels'          => array(
                'name'               => __( 'Destinations', 'snhotel' ),
                'singular_name'      => __( 'Destination', 'snhotel' ),
                'menu_name'          => __( 'Destinations', 'snhotel' ),
				'all_items'          => __( 'All Destinations', 'snhotel' ),
                'add_new'            => __( 'Add New', 'snhotel' ),
                'add_new_item'       => __( 'Add New Destination', 'snhotel' ),
                'edit'               => __( 'Edit', 'snhotel' ),
                'edit_item'          => __( 'Edit Destination', 'snhotel' ),
                'new_item'           => __( 'New Destination', 'snhotel' ),
                'view'               => __( 'View Destination', 'snhotel' ),
                'view_item'          => __( 'View Destination', 'snhotel' ),
                'search_items'       => __( 'Search Destinations', 'snhotel' ),
                'not_found'          => __( 'No Destinations Found', 'snhotel' ),
                'not_found_in_trash' => __( 'No Destinations Found in Trash', 'snhotel' ),
                'parent'             => __( 'Parent Destination', 'snhotel' ),
            ),
        ) );

		register_post_type( 'snhotel_archive', array(
            'label'           => __( 'Archive', 'snhotel' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
			'show_in_admin_bar'=> true,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => true,
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail','excerpt'),
            'labels'          => array(
                'name'               => __( 'Archive', 'snhotel' ),
                'singular_name'      => __( 'Archive', 'snhotel' ),
                'menu_name'          => __( 'Archive', 'snhotel' ),
                'add_new'            => __( 'Add Archive', 'snhotel' ),
                'add_new_item'       => __( 'Add New Archive', 'snhotel' ),
                'edit'               => __( 'Edit', 'snhotel' ),
                'edit_item'          => __( 'Edit Archive', 'snhotel' ),
                'new_item'           => __( 'New Archive', 'snhotel' ),
                'view'               => __( 'View Archive', 'snhotel' ),
                'view_item'          => __( 'View Archive', 'snhotel' ),
                'search_items'       => __( 'Search Archive', 'snhotel' ),
                'not_found'          => __( 'No Archive Found', 'snhotel' ),
                'not_found_in_trash' => __( 'No Archive Found in Trash', 'snhotel' ),
                'parent'             => __( 'Parent Archive', 'snhotel' ),
            ),
        ) );

		 /* register_post_type( 'snhotel_roomtype', array(
            'label'           => __( 'Room Type', 'snhotel' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
			'show_in_admin_bar'=> true,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'roomtype', 'with_front' => FALSE),
            'query_var'       => true,
            'has_archive'     => 'roomtype',
            'supports'        => array('title', 'editor', 'thumbnail','excerpt'),
            'labels'          => array(
                'name'               => __( 'Room Type', 'snhotel' ),
                'singular_name'      => __( 'Room Type', 'snhotel' ),
                'menu_name'          => __( 'Room Type', 'snhotel' ),
                'add_new'            => __( 'Add Room Type', 'snhotel' ),
                'add_new_item'       => __( 'Add New Room Type', 'snhotel' ),
                'edit'               => __( 'Edit', 'snhotel' ),
                'edit_item'          => __( 'Edit Room Type', 'snhotel' ),
                'new_item'           => __( 'New Room Type', 'snhotel' ),
                'view'               => __( 'View Room Type', 'snhotel' ),
                'view_item'          => __( 'View Room Type', 'snhotel' ),
                'search_items'       => __( 'Search Room Type', 'snhotel' ),
                'not_found'          => __( 'No Room Type Found', 'snhotel' ),
                'not_found_in_trash' => __( 'No Room Type Found in Trash', 'snhotel' ),
                'parent'             => __( 'Parent Room Type', 'snhotel' ),
            ),
        ) ); */

        //taxonomies

        register_taxonomy( 'snhotel_hotel_offers', array( 'snhotel_offer' ),
          array(
              'hierarchical'   => false,
              'label'          => __( 'Offer Type', 'snhotel' ),
              'show_ui'        => true,
              'query_var'      => true,
              'rewrite'        => array('slug' => 'deals', 'with_front' => FALSE),
			  /* 'taxonomies' => array('post_tag'),
			  'type' => 'taxonomy_select', */
              'singular_label' => __( 'Offers Type', 'snhotel' ),
			  //'capabilities' => array('assign_terms'=>'edit_cards')
          )
        );

        register_taxonomy( 'snhotel_hotel_event', array( 'snhotel_event' ),
          array(
              'hierarchical'   => false,
              'label'          => __( 'Events Type', 'snhotel' ),
              'show_ui'        => true,
              'query_var'      => true,
              'rewrite'        => array('slug' => 'snhotel-events', 'with_front' => FALSE),
              'singular_label' => __( 'Events Type', 'snhotel' )
          )
        );

        register_taxonomy( 'snhotel_hotel_room', array( 'snhotel_room' ),
            array(
                'hierarchical'   => false,
                'label'          => __( 'Accommodation Type', 'snhotel' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => 'accommodations', 'with_front' => FALSE),
                'singular_label' => __( 'Accommodation Type', 'snhotel' )
            )
        );
        
        /* register_taxonomy( 'snhotel_hotel_facility', array( 'snhotel_facility' ),
            array(
                'hierarchical'   => false,
                'label'          => __( 'Facilities Type', 'snhotel' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => 'facilities', 'with_front' => FALSE),
                'singular_label' => __( 'Facility Type', 'snhotel' )
            )
        ); */
		register_taxonomy( 'snhotel_hotel_destination', array( 'snhotel_destination' ),
            array(
                'hierarchical'   => false,
                'label'          => __( 'Destinations Type', 'snhotel' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => 'destinations', 'with_front' => FALSE),
                'singular_label' => __( 'Destination Type', 'snhotel' )
            )
        );
		/* register_taxonomy( 'snhotel_roomtype', array( 'snhotel_roomtype' ),
          array(
              'hierarchical'   => false,
              'label'          => __( 'Room Type', 'snhotel' ),
              'show_ui'        => true,
              'query_var'      => true,
              'rewrite'        => array('slug' => 'snhotel-roomtype', 'with_front' => FALSE),
              'singular_label' => __( 'Room Type', 'snhotel' )
          )
        ); */
    flush_rewrite_rules();
}
    /**
     * Show error nag in admin area if required plugins are not
     * installed
     *
     * @return void
     */
    function required_plugin_notice() {

        if ( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }

        $required_plugins = array(
            array(
                'function' => 'cmb_init',
                'name'     => 'Custom Meta Boxes',
                'url'      => 'https://github.com/humanmade/Custom-Meta-Boxes'
            ),
            array(
                'function' => 'custom_post_type_onomies_load_textdomain',
                'name'     => 'CPT-onomies',
                'url'      => 'https://wordpress.org/plugins/cpt-onomies/'
            )
        );

        $not_installed = array();
        foreach ($required_plugins as $plugin) {
            if ( !function_exists( $plugin['function'] ) ) {
                $not_installed[] = sprintf( '<a href="%s" target="_blank">%s</a>', esc_url( $plugin['url'] ), $plugin['name'] );
            }
        }

        if ( $not_installed ) {
            ?>
            <div class="error">
                <p>
                    <?php printf( __( 'Please install %s plugin(s) for <strong>SNHotels</strong> to work properly', 'snhotel' ), implode( ', ', $not_installed ) ); ?>
                </p>
            </div>
            <?php
        }
    }

    /**
     * Get the plugin url.
     *
     * @access public
     * @return string
     */
    public function plugin_url() {
        if ( $this->plugin_url ) {
            return $this->plugin_url;
        }

        return $this->plugin_url = untrailingslashit( plugins_url( '/', __FILE__ ) );
    }


    /**
     * Get the plugin path.
     *
     * @access public
     * @return string
     */
    public function plugin_path() {
        if ( $this->plugin_path ) {
            return $this->plugin_path;
        }

        return $this->plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
    }

    /**
     * Get the template path.
     *
     * @access public
     * @return string
     */
    public function template_path() {
        return $this->plugin_path() . '/templates/';
    }


    /**
     * Get Ajax URL.
     *
     * @access public
     * @return string
     */
    public function ajax_url() {
        return admin_url( 'admin-ajax.php', 'relative' );
    }

    function template_loader( $template ) {
        $find = array( 'snhotel.php' );
        $file = '';

         if ( is_single() && get_post_type() == 'snhotel_offer' ) {
            $file   = 'single-snhotel_offer.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        }

        else if ( is_post_type_archive('snhotel_offer')) {
            $file   = 'archive-snhotel_offer.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        }

		if ( is_single() && get_post_type() == 'snhotel_event' ) {
            $file   = 'single-snhotel_event.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        }

        else if ( is_post_type_archive('snhotel_event')) {
            $file   = 'archive-snhotel_event.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        }
        if ( is_single() && get_post_type() == 'snhotel_facility' ) {
            $file   = 'single-snhotel_facility.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        }

        else if ( is_post_type_archive('snhotel_facility')) {
            $file   = 'archive-snhotel_facility.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        }
        if ( is_single() && get_post_type() == 'snhotel_room' ) {
            $file   = 'single-snhotel_room.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        }

        else if ( is_post_type_archive('snhotel_room')) {
            $file   = 'archive-snhotel_room.php';
            $find[] = $file;
            $find[] = $this->theme_dir_path. $file;

        }

        if ( $file ) {
            $template = locate_template( $find );

            if ( ! $template ) {
                $template = $this->template_path() . $file;
            }
        }

        return $template;
    }

    function body_class( $classes ) {
        $current_theme = wp_get_theme();
        $classes[] = $current_theme->template;

        return $classes;
    }

    /**
     * highlight the proper top level menu
     *
     * @link http://wordpress.org/support/topic/moving-taxonomy-ui-to-another-main-menu?replies=5#post-2432769
     * @global obj $current_screen
     * @param string $parent_file
     * @return string
     */
    function fix_parent_menu( $parent_file ) {
        global $current_screen;

        $post_types = array(
            'snhotel_room', 'snhotel_offer','snhotel_event','snhotel_facility'
        );

        if ( in_array( $current_screen->post_type, $post_types ) ) {
            $parent_file = 'snhotel';
        }

        return $parent_file;
    }

} // Sn_hotel
/****
			Show Listings Offer in admin Page

	*/

	add_action("manage_snhotel_offer_posts_custom_column",  "offer_custom_columns");
	add_filter("manage_snhotel_offer_posts_columns", "offer_edit_columns");

	function offer_edit_columns($columns){
	  $columns = array(
		"cb" => "<input type='checkbox' />",
		"title" => "Offer Title",
		"availability" => "Availability",
		"taxonomy" => "Taxonomy",
		"currency" => "Currency",
		"date" => "Date",
	  );

	  return $columns;
	}
	function offer_custom_columns($column){
	  global $post;

	  switch ($column) {
		case "availability":
		  $custom = get_post_custom( $post_id, 'availability', true );
		  //foreach ($custom as $val){
			echo  $custom['availability'][0];
			//print_r($val['rating']);
		  //}

		  break;
		case "currency":
		  $custom = get_post_custom($post_id, 'currency', true);
		  echo $custom["currency"][0];
		  break;
		case "taxonomy":
		  echo get_the_term_list($post->ID, 'snhotel_hotel_offers', '', ', ','');
		  /* $custom = get_post_custom();
		  echo $custom["triptype"][0]; */
		  break;
		case "date":
		  $custom = get_post_custom($post_id, 'date', true);
		  echo $custom["date"][0];
		  break;
		/* case "":
		  //echo get_the_term_list($post->ID, 'Skills', '', ', ','');
		  $custom = get_post_custom();
		  echo $custom["triptype"][0];
		  break; */
	  }
	}

	/****
			Show Listings Events in admin Page

	*/

	add_action("manage_snhotel_event_posts_custom_column",  "event_custom_columns");
	add_filter("manage_snhotel_event_posts_columns", "event_edit_columns");

	function event_edit_columns($columns){
	  $columns = array(
		"cb" => "<input type='checkbox' />",
		"title" => "Event Title",
		"url" => "Location",
		"duration" => "Duration",
		"date" => "Date",
	  );

	  return $columns;
	}
	function event_custom_columns($column){
	  global $post;

	  switch ($column) {
		case "url":
		  $custom = get_post_custom( $post_id, 'url', true );
		  //foreach ($custom as $val){
			echo  $custom['url'][0];
			//print_r($val['rating']);
		  //}

		  break;
		case "duration":
		  $custom = get_post_custom($post_id, 'duration', true);
		  echo $custom["duration"][0];
		  break;
		case "date":
		  $custom = get_post_custom($post_id, 'date', true);
		  echo $custom["date"][0];
		  break;
		/* case "":
		  //echo get_the_term_list($post->ID, 'Skills', '', ', ','');
		  $custom = get_post_custom();
		  echo $custom["triptype"][0];
		  break; */
	  }

	}

    /****
			Show Listings Facility in admin Page

	*/

	add_action("manage_snhotel_facility_posts_custom_column",  "facility_custom_columns");
	add_filter("manage_snhotel_facility_posts_columns", "facility_edit_columns");

	function facility_edit_columns($columns){
	  $columns = array(
		"cb" => "<input type='checkbox' />",
		"title" => "Facility Title",
		"amenitiesdisplayname" => "Amenity Name",
		"entertainmenttitlename" => "entertainment Name",
		"communicationdisplayname" => "Communication Name",
		"date" => "Date",
	  );

	  return $columns;
	}
	function facility_custom_columns($column){
	  global $post;

	  switch ($column) {
		case "amenitiesdisplayname":
		  $custom = get_post_custom( $post_id, 'amenitiesdisplayname', true );
		  //foreach ($custom as $val){
			echo  $custom['amenitiesdisplayname'][0];
			//print_r($val['rating']);
		  //}

		  break;
		case "communicationdisplayname":
		  $custom = get_post_custom($post_id, 'communicationdisplayname', true);
		  echo $custom["communicationdisplayname"][0];
		  break;

		case "entertainmenttitlename":
            $custom = get_post_custom($post_id, 'entertainmenttitlename', true);
		  echo $custom["entertainmenttitlename"][0];
		 // echo get_the_term_list($post->ID, 'entertainmenttitlename', '', ', ','');
		  /* $custom = get_post_custom();
		  echo $custom["triptype"][0]; */
		  break;
		case "date":
		  $custom = get_post_custom($post_id, 'date', true);
		  echo $custom["date"][0];
		  break;
		/* case "":
		  //echo get_the_term_list($post->ID, 'Skills', '', ', ','');
		  $custom = get_post_custom();
		  echo $custom["triptype"][0];
		  break; */
	  }


	}
     /****
			Show Listings Accommodation in admin Page

	*/

	add_action("manage_snhotel_room_posts_custom_column",  "accommodation_custom_columns");
	add_filter("manage_snhotel_room_posts_columns", "accommodation_edit_columns");

	function accommodation_edit_columns($columns){
	  $columns = array(
		"cb" => "<input type='checkbox' />",
		"title" => "Accommodation Title",
		"amenitiesdisplayname" => "Amenity Name",
		"entertainmenttitlename" => "Entertainment Name",
		"communicationdisplayname" => "Communication Name",
		"date" => "Date",
	  );

	  return $columns;
	}
	function accommodation_custom_columns($column){
	  global $post;

	  switch ($column) {
		case "amenitiesdisplayname":
		  $custom = get_post_custom( $post_id, 'amenitiesdisplayname', true );
		  //foreach ($custom as $val){
			echo  $custom['amenitiesdisplayname'][0];
			//print_r($val['rating']);
		  //}

		  break;
		case "communicationdisplayname":
		  $custom = get_post_custom($post_id, 'communicationdisplayname', true);
		  echo $custom["communicationdisplayname"][0];
		  break;

		case "entertainmenttitlename":
            $custom = get_post_custom($post_id, 'entertainmenttitlename', true);
		  echo $custom["entertainmenttitlename"][0];
		 // echo get_the_term_list($post->ID, 'entertainmenttitlename', '', ', ','');
		  /* $custom = get_post_custom();
		  echo $custom["triptype"][0]; */
		  break;
		case "date":
		  $custom = get_post_custom($post_id, 'date', true);
		  echo $custom["date"][0];
		  break;
		/* case "":
		  //echo get_the_term_list($post->ID, 'Skills', '', ', ','');
		  $custom = get_post_custom();
		  echo $custom["triptype"][0];
		  break; */
	  }
	}
global $snhotel;
$snhotel = Sn_hotel::get_instance();
