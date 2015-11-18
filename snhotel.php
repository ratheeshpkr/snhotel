<?php
/*
Plugin Name: snHotel
Plugin URI: http://www.sakhatech.com/
Description:
Version: 0.1
Author: Sakha
Author URI: http://www.sakhatech.com/
License: GPL2
*/


// don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Sn_hotel class
 *
 * @class Sn_hotel The class that holds the entire Sn_hotel plugin
 */
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

    function file_includes() {

        if ( is_admin() ) {
            require_once dirname( __FILE__ ) . '/includes/metadata.php';
            require_once dirname( __FILE__ ) . '/admin/settings.php';
        } else {
            require_once dirname( __FILE__ ) . '/includes/core-functions.php';
            require_once dirname( __FILE__ ) . '/includes/template-functions.php';
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
        wp_enqueue_style( 'snhotel-styles', plugins_url( 'assets/css/style.css', __FILE__ ), false, date( 'Ymd' ) );
        wp_enqueue_style( 'ui-styles', plugins_url( 'assets/css/ui.css', __FILE__ ), false, date( 'Ymd' ) );
        wp_enqueue_style( 'flexslider', plugins_url( 'assets/css/flexslider.css', __FILE__ ), false, date( 'Ymd' ) );

        /**
         * All scripts goes here
         */
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script( 'jquery-ui-accordion' );
        wp_enqueue_script( 'jquery-ui-tabs' );
        wp_enqueue_script( 'flexslider', plugins_url( 'assets/js/jquery.flexslider.js', __FILE__ ), array( 'jquery' ), false, true );
        wp_enqueue_script( 'snhotel-scripts', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), false, true );


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

        $show_in_menu = false;


        register_post_type( 'snhotel_offer', array(
            'label'           => __( 'Offers', 'snhotel' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'offers'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'labels'          => array(
                'name'               => __( 'Offers', 'snhotel' ),
                'singular_name'      => __( 'Offer', 'snhotel' ),
                'menu_name'          => __( 'Offer', 'snhotel' ),
                'add_new'            => __( 'Add Offer', 'snhotel' ),
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

        register_post_type( 'snhotel_room', array(
            'label'           => __( 'Accommodation', 'snhotel' ),
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => $show_in_menu,
            'capability_type' => 'post',
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'Accommodation'),
            'query_var'       => true,
            'has_archive'     => true,
            'supports'        => array('title', 'editor', 'thumbnail'),
            'labels'          => array(
                'name'               => __( 'Accommodations', 'snhotel' ),
                'singular_name'      => __( 'Accommodation', 'snhotel' ),
                'menu_name'          => __( 'Accommodation', 'snhotel' ),
                'add_new'            => __( 'Add Accommodation', 'snhotel' ),
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

        //taxonomies
        register_taxonomy( 'snhotel_hotel_offers', array( 'snhotel_offer' ),
            array(
                'hierarchical'   => false,
                'label'          => __( 'Hotel Offers', 'snhotel' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => 'hotel-offers'),
                'singular_label' => __( 'Offers', 'snhotel' )
            )
        );

        register_taxonomy( 'snhotel_room', array( 'snhotel_room' ),
            array(
                'hierarchical'   => false,
                'label'          => __( 'Accommodation Taxonomy', 'snhotel' ),
                'show_ui'        => true,
                'query_var'      => true,
                'rewrite'        => array('slug' => 'Accommodation'),
                'singular_label' => __( 'Accommodation', 'snhotel' )
            )
        ); 
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
                    <?php printf( __( 'Please install %s plugin(s) for <strong>Sn Hotel</strong> to work properly', 'snhotel' ), implode( ', ', $not_installed ) ); ?>
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
            'snhotel_room', 'snhotel_offer'
        );

        if ( in_array( $current_screen->post_type, $post_types ) ) {
            $parent_file = 'snhotel';
        }

        return $parent_file;
    }

} // Sn_hotel

global $snhotel;
$snhotel = Sn_hotel::get_instance();
