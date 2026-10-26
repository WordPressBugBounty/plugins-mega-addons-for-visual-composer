<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class VC_MEGA
{
	const VERSION = '4.4.0';
	public static function next_instance_id() {
		static $instance_id = 0;
		$instance_id++;
		return $instance_id;
	}

	private $file;

	function __construct($file)
	{
		$this->file = $file;
		add_action( 'vc_before_init', array($this, 'vc_mega_addons' ));
		add_action('admin_menu', array($this, 'vc_register_admin_menu'));
		add_action('wp_ajax_vc_save_data', array($this, 'vc_saving_data' ));
		add_action( 'wp_enqueue_scripts', array($this, 'adding_front_scripts') );
		add_action('admin_enqueue_scripts', array($this, 'vc_admin_script'));
		add_action( 'init', array( $this, 'check_if_vc_is_install' ) );
		add_filter( 'plugin_action_links', array($this, 'action_links'), 10, 5 );
		// register_activation_hook( __FILE__, array( $this, 'activation' ) );
		// remove_filter( 'the_content', 'wpautop' );
	}

	/**
	 * init function.
	 *
	 * @access public
	 * @return void
	 */
	public function init () {
		// Run this on activation.
		register_activation_hook( $this->file, array( $this, 'activation' ) );
	} // End init()

	function adding_front_scripts () {
		$saved_options = get_option('vc_save_data');
		wp_enqueue_style( 'image-hover-effects-css', plugins_url( 'css/ihover.css' , __FILE__ ), array(), '3.1.1');
		wp_enqueue_style( 'style-css', plugins_url( 'css/style.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		wp_enqueue_style( 'font-awesome-latest', plugins_url( 'css/font-awesome/css/all.css' , __FILE__ ), array(), '5.12.0');
	}

	function vc_admin_script($slug) {
		wp_enqueue_style( 'vc_admin_css', plugin_dir_url( __FILE__ ) . 'lib/style.css' , array(), VC_MEGA::VERSION);
		if ($slug == 'toplevel_page_mega-addons') {
			wp_enqueue_style( 'vc_admin_style', plugin_dir_url( __FILE__ ) . 'lib/admin.css' , array(), VC_MEGA::VERSION);
			wp_enqueue_script( 'vc_admin_js', plugin_dir_url( __FILE__ ) . 'lib/admin.js', array('jquery', 'jquery-ui-core'), VC_MEGA::VERSION, false);
		}
	}


		
	function vc_mega_addons() {
		$saved_options = get_option('vc_save_data');
		// Malformed legacy options must not break builder initialization.
		if ( ! is_array( $saved_options ) ) {
			$saved_options = array();
		}
		if (isset($saved_options['banner'])) {include 'render/infobanners.php';}
		if (isset($saved_options['ihe'])) {include 'render/hover.php';}
		if (isset($saved_options['price_table'])) {include 'render/price.php';}
		if (isset($saved_options['advance_price'])) {include 'render/advanceprice.php';}
		if (isset($saved_options['info_box'])) {include 'render/infobox.php';}
		if (isset($saved_options['advance_btn'])) {include 'render/advanced_btn.php'; include 'render/hoverbutton.php';}
		if (isset($saved_options['team_prof'])) {include 'render/teamprofile.php';}
		if (isset($saved_options['adv_carousel'])) {include 'render/tm_carousel_father.php';}
		if (isset($saved_options['adv_carousel'])) {include 'render/tm_carousel_son.php';}
		if (isset($saved_options['counter'])) {include 'render/statcounter.php';}
		if (isset($saved_options['flip_box'])) {include 'render/flipbox.php';}
		if (isset($saved_options['timeline'])) {include 'render/timeline_father.php';}
		if (isset($saved_options['timeline'])) {include 'render/timeline_son.php';}
		if (isset($saved_options['countdown'])) {include 'render/countdown.php';}
		if (isset($saved_options['creative_link'])) {include 'render/creativelink.php';}
		if (isset($saved_options['text_typer'])) {include 'render/texttyper.php';}
		if (isset($saved_options['social_icon'])) {include 'render/social_father.php';}
		if (isset($saved_options['social_icon'])) {include 'render/social_son.php';}
		if (isset($saved_options['popup'])) {include 'render/modalPopup.php';}
		if (isset($saved_options['interactive_banner'])) {include 'render/interactivebanner.php';}
		if (isset($saved_options['info_list'])) {include 'render/info_list_father.php';}
		if (isset($saved_options['info_list'])) {include 'render/info_list_son.php';}
		if (isset($saved_options['google_trend'])) {include 'render/googletrends.php';}
		if (isset($saved_options['tooltip'])) {include 'render/tooltip_icons.php';}
		if (isset($saved_options['testimonial'])) {include 'render/testimonial.php';}
		if (isset($saved_options['heading'])) {include 'render/headings.php';}
		if (isset($saved_options['highlight_box'])) {include 'render/highlight_box.php';}
		if (isset($saved_options['img_swap'])) {include 'render/image_swap.php';}
		if (isset($saved_options['accordion'])) {include 'render/accordion_father.php';}
		if (isset($saved_options['accordion'])) {include 'render/accordion_son.php';}
		if (isset($saved_options['info_circle'])) {include 'render/info_circle.php';}
		if (isset($saved_options['filter_gallery'])) {include 'render/filterablegallery_wrap.php';}
		if (isset($saved_options['filter_gallery'])) {include 'render/filtergallery.php';}
		include 'includes/class-vc-number-param.php';
	}

	function vc_saving_data() {
		if ( ! current_user_can( 'manage_options' ) ) {
			status_header( 403 );
			wp_send_json_error(
				array(
					'code'    => 'forbidden',
					'message' => __( 'You cannot change these settings.', 'mega-addons-for-visual-composer' ),
				)
			);
		}
		if ( ! isset( $_SERVER['REQUEST_METHOD'] ) || 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
			status_header( 405 );
			wp_send_json_error(
				array(
					'code'    => 'method_not_allowed',
					'message' => __( 'Settings must be submitted using POST.', 'mega-addons-for-visual-composer' ),
				)
			);
		}
		if ( ! is_array( $_POST ) ) {
			status_header( 400 );
			wp_send_json_error(
				array(
					'code'    => 'invalid_request',
					'message' => __( 'Invalid settings request.', 'mega-addons-for-visual-composer' ),
				)
			);
		}
		// Core reads the nonce from REQUEST: require the very same token in POST.
		if ( ! isset( $_POST['_ajax_nonce'], $_REQUEST['_ajax_nonce'] ) || ! is_string( $_POST['_ajax_nonce'] ) || ! is_string( $_REQUEST['_ajax_nonce'] ) || $_POST['_ajax_nonce'] !== $_REQUEST['_ajax_nonce'] || false === check_ajax_referer( 'mega_addons_vc_save_data', '_ajax_nonce', false ) ) {
			status_header( 403 );
			wp_send_json_error(
				array(
					'code'    => 'invalid_nonce',
					'message' => __( 'Refresh this page and try saving again.', 'mega-addons-for-visual-composer' ),
				)
			);
		}

		// Exact ASCII action allowlist: neither slash removal nor permissive sanitization is needed.
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- Validated against one fixed literal, not persisted as supplied.
		if ( ! isset( $_POST['action'] ) || ! is_string( $_POST['action'] ) || 'vc_save_data' !== $_POST['action'] ) {
			status_header( 400 );
			wp_send_json_error(
				array(
					'code'    => 'invalid_request',
					'message' => __( 'Invalid settings request.', 'mega-addons-for-visual-composer' ),
				)
			);
		}

		$toggle_keys  = array(
			'banner',
			'ihe',
			'price_table',
			'advance_price',
			'info_box',
			'advance_btn',
			'team_prof',
			'info_circle',
			'counter',
			'flip_box',
			'timeline',
			'countdown',
			'creative_link',
			'text_typer',
			'social_icon',
			'popup',
			'interactive_banner',
			'highlight_box',
			'info_list',
			'google_trend',
			'tooltip',
			'testimonial',
			'adv_carousel',
			'heading',
			'img_swap',
			'accordion',
			'filter_gallery',
		);
		$allowed_keys = array_merge( $toggle_keys, array( 'action', '_ajax_nonce' ) );
		$checked_keys = array();
		foreach ( $_POST as $key => $value ) {
			if ( ! in_array( $key, $allowed_keys, true ) || ! is_string( $value ) ) {
				status_header( 400 );
				wp_send_json_error(
					array(
						'code'    => 'invalid_settings',
						'message' => __( 'Invalid settings fields or values.', 'mega-addons-for-visual-composer' ),
					)
				);
			}
			if ( in_array( $key, $toggle_keys, true ) ) {
				$value = function_exists( 'wp_unslash' ) ? wp_unslash( $value ) : stripslashes_deep( $value );
				if ( 'on' !== $value ) {
					status_header( 400 );
					wp_send_json_error(
						array(
							'code'    => 'invalid_settings',
							'message' => __( 'Invalid settings fields or values.', 'mega-addons-for-visual-composer' ),
						)
					);
				}
				$checked_keys[] = $key;
			}
		}

		$old_options = get_option( 'vc_save_data' );
		if ( ! is_array( $old_options ) && $old_options ) {
			status_header( 409 );
			wp_send_json_error(
				array(
					'code'    => 'invalid_saved_settings',
					'message' => __( 'Existing settings need administrator review before saving.', 'mega-addons-for-visual-composer' ),
				)
			);
		}
		$vc_save_data = is_array( $old_options ) ? $old_options : array();
		foreach ( $toggle_keys as $key ) {
			if ( isset( $vc_save_data[ $key ] ) && ( is_array( $vc_save_data[ $key ] ) || is_object( $vc_save_data[ $key ] ) ) ) {
				status_header( 409 );
				wp_send_json_error(
					array(
						'code'    => 'invalid_saved_settings',
						'message' => __( 'Existing settings need administrator review before saving.', 'mega-addons-for-visual-composer' ),
					)
				);
			}
			unset( $vc_save_data[ $key ] );
		}
		foreach ( $checked_keys as $key ) {
			$vc_save_data[ $key ] = 'on';
		}
		// Keep the legacy non-empty marker, including when every toggle is off.
		$vc_save_data['action'] = 'vc_save_data';
		if ( $old_options === $vc_save_data ) {
			wp_send_json_success( array( 'changed' => false ) );
		}
		$changed = update_option( 'vc_save_data', $vc_save_data );
		if ( ! $changed && get_option( 'vc_save_data' ) !== $vc_save_data ) {
			status_header( 500 );
			wp_send_json_error(
				array(
					'code'    => 'save_failed',
					'message' => __( 'Settings were not saved. Please try again.', 'mega-addons-for-visual-composer' ),
				)
			);
		}
		wp_send_json_success( array( 'changed' => (bool) $changed ) );
	}


	function vc_register_admin_menu() {
		add_menu_page( 'Mega Addons', 'Mega Addons', 'manage_options', 'mega-addons', array($this, 'vc_addons'), 'dashicons-shield');
	}

	function vc_addons() {
		$saved_options = get_option('vc_save_data');
	?>
		
	<div class="addons-admin-wrap">
		<h1>Mega Addons For WPBakery Page Builder</h1>
		<h3>Welcome! You are about to begin with the most powerful addon for WPBakery Page Builder that add in many advanced features developed with love.</h3>
		<br>
		<h3 style="font-weight: 100;">Enable/Disable Element</h3>
		<div class="mega-addons-version">
			<div class="dashicons-before dashicons-shield"></div>
			<p>Version 4.4.0</p>
		</div>
		<?php include 'includes/settings.php'; ?>
	</div>


	<?php }

	function check_if_vc_is_install(){
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }			
	}

	/**
	 * activation function.
	 *
	 * @access public
	 * @return void
	 */
	public function activation () {

		if ( !get_option( 'vc_save_data' ) ) {
		$vc_default_options =  array(
			 'banner' 			=> 'on',
			 'ihe' 				=> 'on',
			 'price_table' 		=> 'on',
			 'advance_price'	=> 'on',
			 'info_box' 		=> 'on',
			 'advance_btn' 		=> 'on',
			 'team_prof' 		=> 'on',
			 'adv_carousel' 	=> 'on',
			 'counter' 			=> 'on',
			 'flip_box' 		=> 'on',
			 'timeline' 		=> 'on',
			 'countdown' 		=> 'on',
			 'creative_link' 	=> 'on',
			 'text_typer' 		=> 'on',
			 'social_icon' 		=> 'on',
			 'popup' 			=> 'on',
			 'interactive_banner' => 'on',
			 'info_list' 		=> 'on',
			 'google_trend' 	=> 'on',
			 'tooltip' 			=> 'on',
			 'testimonial' 		=> 'on',
			 'heading' 			=> 'on',
			 'highlight_box' 	=> 'on',
			 'img_swap' 		=> 'on',
			 'accordion' 		=> 'on',
			 'info_circle' 		=> 'on',
			 // 'filter_gallery' 	=> 'on',
			);

		update_option( 'vc_save_data', $vc_default_options);
		}
		
	} // End activation()

	function showVcVersionNotice(){
	    ?>
	    <div class="notice notice-warning is-dismissible">
	        <p>Please install <a href="https://1.envato.market/A1QAx">WPBakery Page Builder</a> to use Mega Addons.</p>
	    </div>
	    <?php
	}

	function action_links($actions, $plugin_file){
		static $plugin;

		if (!isset($plugin))
			$plugin = plugin_basename(__FILE__);
		if ('mega-addons-for-visual-composer/index.php' == $plugin_file && defined('WPB_VC_VERSION')) {

				$site_link = array('upgrade' => '<a href="https://1.envato.market/02aNL" style="font-size: 14px;color: #11967A;" target="_blank"><b>Upgrade To Premium</b></a>');
			
					$actions = array_merge($site_link, $actions);
				
			}
			
			return $actions;
    }

}

?>