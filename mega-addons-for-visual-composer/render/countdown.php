<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_countdown extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'id'		=>	'',
			'style'		=>	'YOWDHMS',
			'size'		=>	'',
			'lineheight'	=>	'',
			'textcolor'	=>	'white',
			'bgcolor'	=>	'',
			'periodsize'	=>	'',
			'periodcolor'	=>	'',
			'width'		=>	'100',
			'height'	=>	'100',
			'padding'	=>	'',
			'margin'	=>	'',
			'borderwidth'	=>	'0',
			'radius'	=>	'',
			'borderclr'	=>	'',
			'borderstyle'	=>	'solid',
			'year'		=>	'',
			'month'		=>	'',
			'date'		=>	'',
		), $atts ) );
		$content = wpb_js_remove_wpautop($content, true);
		wp_enqueue_style( 'countdown-css', plugins_url( '../css/jquery.countdown.css' , __FILE__ ), array(), '2.0.0');
		wp_enqueue_script( 'countdown-min-js', plugins_url( '../js/countdown.min.js' , __FILE__ ), array('jquery', 'jquery-ui-core'), '1.0.2', false);
		wp_enqueue_script( 'countdown-js', plugins_url( '../js/jquery.countdown.js' , __FILE__ ), array('jquery', 'jquery-ui-core'), '2.1.0', false);
		wp_enqueue_script( 'custom-countdown-js', plugins_url( '../js/front-js/countdown.js' , __FILE__ ), array('jquery') , VC_MEGA::VERSION, false);
		ob_start(); ?>
		<div
			id="defaultCountdown<?php echo esc_attr($id); ?>"
			style="width: 100%;"
			class="countdownapply"
			data-style="<?php echo esc_attr($style); ?>"
			data-year="<?php echo esc_attr($year); ?>"
			data-month="<?php echo esc_attr($month); ?>"
			data-date="<?php echo esc_attr($date); ?>"
		>

		</div>
		<style>
			#defaultCountdown<?php echo esc_attr($id); ?>  .countdown-section {
				background-color: <?php echo esc_attr($bgcolor); ?>;
				width: <?php echo esc_attr($width); ?>px;
				height: <?php echo esc_attr($height); ?>px;
				margin: 0 <?php echo esc_attr($margin); ?>px;
				border: <?php echo esc_attr($borderwidth); ?>px <?php echo esc_attr($borderstyle); ?> <?php echo esc_attr($borderclr); ?>;
				border-radius: <?php echo esc_attr($radius); ?>;
				line-height: <?php echo esc_attr($lineheight); ?>;
				display: inline-block;
			    float: none !important;
			}
			#defaultCountdown<?php echo esc_attr($id); ?> {
				text-align: center;
			}
			#defaultCountdown<?php echo esc_attr($id); ?>  .countdown-section .countdown-amount {
				font-size: <?php echo esc_attr($size); ?>px;
				color: <?php echo esc_attr($textcolor); ?>;
				padding-top: <?php echo esc_attr($padding); ?>px;
				display: block;
			}
			#defaultCountdown<?php echo esc_attr($id); ?>  .countdown-section .countdown-period {
				font-size: <?php echo esc_attr($periodsize); ?>px;
				color: <?php echo esc_attr($periodcolor); ?>;
			}
		</style>
		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Countdown', 'mega-addons-for-visual-composer' ),
	"base" 			=> "mvc_countdown",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Set Countdown timer', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/countdown.png',
	'params' => array(
		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Unique ID', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"id",
			"description" 	=> 	__( 'Required: It should be different from other countdown time. Enter any name or numbers.', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"width",
			"description" 	=> 	__( 'set width in pixel for each week, hours, minutes and seconds e.g 100', 'mega-addons-for-visual-composer' ),
			"value"			=>	'100',
			"suffix" 		=> 'px',
			"group" 		=> 	'General',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"height",
			"description" 	=> 	__( 'set height in pixel for each week, hours, minutes and seconds e.g 100', 'mega-addons-for-visual-composer' ),
			"value"			=>	'100',
			"suffix" 		=> 'px',
			"group" 		=> 	'General',
        ),

		array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Timer Font size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"size",
			"description" 	=> 	__( 'Timer font size in pixel e.g 18', 'mega-addons-for-visual-composer' ),
			"value"			=>	'18',
			"suffix" 		=> 'px',
			"group" 		=> 	'General',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Period Font size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"periodsize",
			"description" 	=> 	__( 'period font size in pixel e.g 18', 'mega-addons-for-visual-composer' ),
			"value"			=>	'18',
			"suffix" 		=> 'px',
			"group" 		=> 	'General',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Line Height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"lineheight",
			"description" 	=> 	__( 'set line height between  e.g 1', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Padding From Top', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"padding",
			"description" 	=> 	__( 'padding from top help to move time in center default 15', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 	'General',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Margin', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"margin",
			"description" 	=> 	__( 'set margin for each timer space between them from left and right side e.g 10', 'mega-addons-for-visual-composer' ),
			"value"			=>	"10",
			"suffix" 		=> 'px',
			"group" 		=> 	'General',
        ),

        array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'General',
		),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Timer Text Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"textcolor",
			"group" 		=> 	'Color',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Period Text Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"periodcolor",
			"group" 		=> 	'Color',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"bgcolor",
			"description" 	=> 	__( 'count down background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Color',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Border Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"borderwidth",
			"description" 	=> 	__( 'set border width in pixel or leave blank e.g 10', 'mega-addons-for-visual-composer' ),
			"value"			=>	"0",
			"suffix" 		=>  'px',
			"group" 		=> 	'Color',
        ),

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Border Radius', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"radius",
			"description" 	=> 	__( 'border radius in pixel or percentage e.g 5px or 50%', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Color',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Border Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"borderclr",
			"description" 	=> 	__( 'set border color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Color',
        ),

        array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Border Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "borderstyle",
			"description" 	=> __( 'set border style', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Color',
				"value" 		=> array(
					'Solid'	=>	'solid',
					'Dotted'	=>	'dotted',
					'none'	=>	'none',
					'Dashed'	=>	'dashed',
					'Hidden'	=>	'hidden',
					'Double'	=>	'double',
					'Groove'	=>	'groove',
					'Ridge'	=>	'ridge',
					'Outset'	=>	'outset',
					'Initial'	=>	'initial',
				)
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Select Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "style",
			"description" 	=> __( 'Visible countdown style in', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Countdown',
				"value" 		=> array(
					'Year'	=>	'YOWDHMS',
					'Month'	=>	'odHMS',
					'Week'	=>	'wdHMS',
					'Days'	=>	'DHMS',
					'Hours'	=>	'HMS',
				)
		),

		array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Year', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"year",
			"description" 	=> 	__( 'just number start from 0 [ e.g 0 for current year, 1 for next year.. ]', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Countdown',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Month', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"month",
			"description" 	=> 	__( 'just number between 1 to 12 for specific month [ e.g 3 ]', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Countdown',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Date', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"date",
			"description" 	=> 	__( 'just number between 1 to 30 for specific date', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Countdown',
        ),
	),
) );

