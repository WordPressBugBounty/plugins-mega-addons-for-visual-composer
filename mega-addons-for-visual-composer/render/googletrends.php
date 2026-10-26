<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_google_trends extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		$atts = is_array( $atts ) ? $atts : array();
		extract( shortcode_atts( array(
			'css'		=>		'',
		), $atts ) );
		$css = is_string( $css ) ? $css : '';
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		ob_start(); ?>
		<div class="mega-google-trends <?php echo esc_attr($css_class); ?>">
			<p class="mega-google-trends__fallback" role="status"><?php echo esc_html__( 'The embedded chart is currently unavailable.', 'mega-addons-for-visual-composer' ); ?></p>
		</div>
		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Google Trends', 'mega-addons-for-visual-composer' ),
	"base" 			=> "google_trends",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('show google trends', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/trend.png',
	'params' => array(
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Google Trend Embed Code', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"content",
			"description" 	=> __( 'Google Trends chart rendering is currently unavailable. Existing saved content is retained but not executed or displayed.', 'mega-addons-for-visual-composer' ),
			"value"			=> '',
			"group" 		=> 	'Embed Code',
		),
		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'Embed Code',
		),
		array(
			"type" 			=> "css_editor",
			"heading" 		=> __( 'Display Design', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "css",
			"group" 		=> "Design Options",
		),
	),
) );

