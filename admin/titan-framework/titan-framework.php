<?php

if ( ! defined( 'ABSPATH' ) ) { exit;  
}


defined( 'TF_VERSION' ) or define( 'TF_VERSION', '2.9' );
defined( 'TF' ) or define( 'TF', 'titan-framework' );
defined( 'TF_NAME' ) or define( 'TF_NAME', 'Titan Framework' );
defined( 'TF_PATH' ) or define( 'TF_PATH', trailingslashit( dirname( __FILE__ ) ) );
defined( 'TF_PLUGIN_BASENAME' ) or define( 'TF_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

require_once( TF_PATH . 'lib/class-admin-notification.php' );
require_once( TF_PATH . 'lib/class-admin-page.php' );
require_once( TF_PATH . 'lib/class-admin-tab.php' );
require_once( TF_PATH . 'lib/class-customizer.php' );
require_once( TF_PATH . 'lib/class-option.php' );
require_once( TF_PATH . 'lib/class-option-checkbox.php' );
require_once( TF_PATH . 'lib/class-option-color.php' );
require_once( TF_PATH . 'lib/class-option-enable.php' );
require_once( TF_PATH . 'lib/class-option-editor.php' );
require_once( TF_PATH . 'lib/class-option-gallery.php' );
require_once( TF_PATH . 'lib/class-option-heading.php' );
require_once( TF_PATH . 'lib/class-option-multicheck.php' );
require_once( TF_PATH . 'lib/class-option-multicheck-categories.php' );
require_once( TF_PATH . 'lib/class-option-multicheck-pages.php' );
require_once( TF_PATH . 'lib/class-option-multicheck-posts.php' );
require_once( TF_PATH . 'lib/class-option-multicheck-post-types.php' );
require_once( TF_PATH . 'lib/class-option-note.php' );
require_once( TF_PATH . 'lib/class-option-number.php' );
require_once( TF_PATH . 'lib/class-option-radio.php' );
require_once( TF_PATH . 'lib/class-option-save.php' );
require_once( TF_PATH . 'lib/class-option-select.php' );
require_once( TF_PATH . 'lib/class-option-select-categories.php' );
require_once( TF_PATH . 'lib/class-option-select-pages.php' );
require_once( TF_PATH . 'lib/class-option-select-posts.php' );
require_once( TF_PATH . 'lib/class-option-select-post-types.php' );
require_once( TF_PATH . 'lib/class-option-sortable.php' );
require_once( TF_PATH . 'lib/class-option-text.php' );
require_once( TF_PATH . 'lib/class-option-textarea.php' );
require_once( TF_PATH . 'lib/class-option-upload.php' );
require_once( TF_PATH . 'lib/class-titan-framework.php' );
require_once( TF_PATH . 'lib/functions-add-pluc.php' );
require_once( TF_PATH . 'lib/functions-utils.php' );

/**
 * Titan Framework Plugin Class
 *
 * @since 1.0
 */
class TitanFrameworkPlugin {


	/**
	 * Constructor, add hooks
	 *
	 * @since 1.0
	 */
	function __construct() {
		add_action( 'plugins_loaded', array( $this, 'load_text_domain' ) );
		add_action( 'plugins_loaded', array( $this, 'force_load_first' ), 10, 1 );
		//add_filter( 'plugin_row_meta', array( $this, 'plugin_links' ), 10, 2 );

		// Create the options.
		add_action( 'init', array( $this, 'trigger_option_creation' ), 1 );
	}


	/**
	 * Trigger the creation of the options
	 *
	 * @since 1.9
	 * @access public
	 *
	 * @return void
	 */
	public function trigger_option_creation() {

		/**
		 * Triggers the creation of options. Hook into this action and use the various create methods.
		 *
		 * @since 1.0
		 */
		do_action( 'tf_create_options' );

		/**
		 * Fires immediately after options are created.
		 *
		 * @since 1.8
		 */
		do_action( 'tf_done' );
	}
}

new TitanFrameworkPlugin();
