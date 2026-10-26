<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_timeline_father extends WPBakeryShortCodesContainer {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title'	=>	'',
			'size'	=>	'',
			'clr'	=>	'',
			'bgclr'	=>	'',
			'width'	=>	'',
			'linebg'	=>	'',
		), $atts ) );
		$content = wpb_js_remove_wpautop($content, true);
		wp_enqueue_style( 'timeline-css', plugins_url( '../css/timeline.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		wp_enqueue_script( 'animtimeline-js', plugins_url( '../js/animtimeline.js' , __FILE__ ), array('jquery', 'jquery-ui-core'), VC_MEGA::VERSION, false);
		ob_start(); ?>
		
			<div class="mega-timeline-title"><span style="font-size: <?php echo esc_attr($size); ?>px; color: <?php echo esc_attr($clr); ?>;background:<?php echo esc_attr($bgclr); ?>;">
				<?php echo esc_attr($title) ?>
			</span></div>
			<div id="cd-timeline" class="cd-container">
				<span class="timeline-line" style="width: <?php echo esc_attr($width); ?>px; background: <?php echo esc_attr($linebg); ?>;"></span>
				<span></span>
				<?php echo wp_kses_post($content); ?>
			</div>

		<?php return ob_get_clean();
	}
}


vc_map( array(
	"base" 			=> "mvc_timeline_father",
	"name" 			=> __( 'Timeline', 'mega-addons-for-visual-composer' ),
	"as_parent" 	=> array('only' => 'mvc_timeline_son'),
	"content_element" => true,
	"js_view" 		=> 'VcColumnView',
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Add multiple images and text', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/timeline.png',
	'params' => array(
			array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"title",
			"description" 	=> 	__( 'main title of timeline', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Font Size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"size",
			"description" 	=> 	__( 'title font size in pixel e.g 17', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 	'General',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Title Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"clr",
			"description" 	=> 	__( 'title color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"bgclr",
			"description" 	=> 	__( 'title background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Line Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"width",
			"description" 	=> 	__( 'set timeline central line width in pixel default 4', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 	'General',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"linebg",
			"description" 	=> 	__( 'central line background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
        ),
		)
) );
