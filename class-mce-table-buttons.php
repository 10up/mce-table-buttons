<?php
/**
 * MCE Table Buttons
 *
 * @package           MCETableButtons
 * 
 * @wordpress-plugin
 * Plugin Name:       MCE Table Buttons
 * Plugin URI:        http://10up.com/plugins-modules/wordpress-mce-table-buttons/
 * Description:       Add <strong>controls for table editing</strong> to the visual content editor with this <strong>light weight</strong> plug-in.
 * Version:           3.3.1
 * Requires at least: 4.0
 * Requires PHP:      
 * Author:            Jake Goldman, 10up, Oomph
 * Author URI:        https://10up.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * MCE Table Buttons main class.
 */
class MCE_Table_Buttons {
	/**
	 * Handles initializing this class and returning the singleton instance after it's been cached.
	 *
	 * @return null|MCE_Table_Buttons
	 */
	public static function get_instance() {
		// Store the instance locally to avoid private static replication.
		static $instance = null;

		if ( null === $instance ) {
			$instance = new self();
			self::setup_plugin();
		}

		return $instance;
	}

	/**
	 * An empty constructor
	 */
	public function __construct() {
		/* Purposely do nothing here. */
	}

	/**
	 * Handles registering hooks that initialize this plugin.
	 */
	public static function setup_plugin() {
		add_filter( 'mce_external_plugins', array( __CLASS__, 'mce_external_plugins' ) );
		add_filter( 'mce_buttons_2', array( __CLASS__, 'mce_buttons_2' ) );
		add_filter( 'content_save_pre', array( __CLASS__, 'content_save_pre' ), 20 );
		add_filter( 'tiny_mce_before_init', array( __CLASS__, 'tiny_mce_before_init' ), 10, 2 );
	}

	/**
	 * Initialize TinyMCE table plugin and custom TinyMCE plugin
	 *
	 * @param array $plugin_array Array of TinyMCE plugins.
	 * @return array Array of TinyMCE plugins
	 */
	public static function mce_external_plugins( $plugin_array ) {
		global $tinymce_version;
		$variant = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		if ( version_compare( $tinymce_version, '4700', '<' ) ) {

			$plugin_array['table'] = plugin_dir_url( __FILE__ ) . 'tinymce41-table/plugin' . $variant . '.js';

		} else {

			$plugin_array['table'] = plugin_dir_url( __FILE__ ) . 'tinymce47-table/plugin' . $variant . '.js';

		}

		return $plugin_array;
	}

	/**
	 * Add TinyMCE table control buttons
	 *
	 * @param array $buttons Buttons for the second row.
	 * @return array Buttons for the second row
	 */
	public static function mce_buttons_2( $buttons ) {
		// in case someone is manipulating other buttons, drop table controls at the end of the row.
		$pos = array_search( 'undo', $buttons, true );
		if ( ! $pos ) {
			array_push( $buttons, 'table' );
			return $buttons;
		}

		$buttons = array_merge( array_slice( $buttons, 0, $pos ), array( 'table' ), array_slice( $buttons, $pos ) );

		return $buttons;
	}

	/**
	 * Fixes weirdness resulting from wpautop and formatting clean up not built for tables
	 *
	 * @param string $content Editor content before WordPress massaging.
	 * @return string Editor content before WordPress massaging
	 */
	public static function content_save_pre( $content ) {
		if ( false !== strpos( $content, '<table' ) ) {
			// paragraphed content inside of a td requires first paragraph to have extra line breaks (or else autop breaks).
			$content = preg_replace( "/<td([^>]*)>(.+\r?\n\r?\n)/m", "<td$1>\n\n$2", $content );

			// make sure there's space around the table.
			if ( '</table>' === substr( $content, -8 ) ) {
				$content .= "\n<br />";
			}
		}

		return $content;
	}

	/**
	 * Remove the table toolbar introduced in TinyMCE 4.3.0.
	 *
	 * Its positioning does not work correctly inside WordPress and blocks editing.
	 *
	 * @param array  $mce_init   An array with TinyMCE config.
	 * @param string $editor_id Unique editor identifier, e.g. 'content'.
	 *
	 * @return array TinyMCE config array
	 */
	public static function tiny_mce_before_init( $mce_init, $editor_id ) {
		$mce_init['table_toolbar'] = '';

		return $mce_init;
	}
}

MCE_Table_Buttons::get_instance();
