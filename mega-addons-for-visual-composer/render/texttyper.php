<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_text_type_vc extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'align'	 		=> 'left',
			'typespeed' 	=> '70',
			'backspeed' 	=> '500',
			'loop' 			=> '',
			'verticalclr' 	=> '#000',
			'checked' 		=> '',
			'before'		=>	'',
			'after'			=>	'',
			'size'			=>	'18',
			'textmblsize'	=>	'18',
			'typersize'		=>	'18',
			'typermblsize'	=>	'18',
			'clr'			=>	'',
		), $atts ) );
		$some_id = VC_MEGA::next_instance_id();
		$content = wpb_js_remove_wpautop($content, true);
		wp_enqueue_script( 'typed-js', plugins_url( '../js/typed.js' , __FILE__ ), array('jquery', 'jquery-ui-core'), VC_MEGA::VERSION, false);
		wp_enqueue_script( 'typer-js', plugins_url( '../js/customTyper.js' , __FILE__ ), array('jquery', 'jquery-ui-core'), VC_MEGA::VERSION, false);
		wp_localize_script( 'typer-js', 'mega_text', array(
			'typespeed' => $typespeed,
			'backspeed' => $backspeed,
		) );
		ob_start(); ?>
		<!-- HTML DESIGN HERE -->

		<div class="type-wrap type-wrap-<?php echo esc_attr($some_id); ?>"
			data-typespeed="<?php echo esc_attr($typespeed); ?>"
			data-backspeed="<?php echo esc_attr($backspeed); ?>"
			data-loop="<?php echo esc_attr($loop); ?>"
			style="height: 50px; text-align: <?php echo esc_attr($align); ?>;">
			<span class="mega-prefix" style="font-size: <?php echo esc_attr($size); ?>px; color: <?php echo esc_attr($clr); ?>;"> <?php echo esc_attr($before); ?></span>
	            <div class="typed-strings">
	                <?php echo wp_kses_post($content); ?>
	            </div>
	            <span class="typed" style="white-space:pre;"></span>
	            <span class="texttyper-accessible-text"></span>
	            <?php if (!empty($checked)) { ?>
	            	<span class="blink_me" style="font-size: <?php echo esc_attr($size); ?>px; color: <?php echo esc_attr($verticalclr); ?>;">|</span>	            	
	            <?php } ?>
	        <span class="mega-suffix" style="font-size: <?php echo esc_attr($size); ?>px;color: <?php echo esc_attr($clr); ?>;"> <?php echo esc_attr($after); ?></span>
        </div>

		<style>
			.texttyper-accessible-text {
				border: 0 !important;
				clip: rect(0, 0, 0, 0) !important;
				clip-path: inset(50%) !important;
				height: 1px !important;
				margin: -1px !important;
				overflow: hidden !important;
				padding: 0 !important;
				position: absolute !important;
				white-space: nowrap !important;
				width: 1px !important;
			}
			.type-wrap.texttyper-reduced-motion .typed-strings {
				display: block !important;
			}
			.type-wrap.texttyper-reduced-motion {
				height: auto !important;
				min-height: 50px;
			}
			.type-wrap.texttyper-reduced-motion .typed {
				display: none !important;
			}
			.type-wrap.texttyper-reduced-motion .blink_me {
				display: none !important;
			}
			.type-wrap-<?php echo esc_attr($some_id); ?> .typed{
				font-size: <?php echo esc_attr($typersize); ?>px;
			}
			.type-wrap-<?php echo esc_attr($some_id); ?>.texttyper-reduced-motion .typed-strings {
				font-size: <?php echo esc_attr($typersize); ?>px;
			}
			.type-wrap span {
				display: inline-block;
			}
			@media only screen and (max-width: 768px) {
				.type-wrap-<?php echo esc_attr($some_id); ?> .typed,
				.type-wrap-<?php echo esc_attr($some_id); ?> .blink_me {
					font-size: <?php echo esc_attr($typermblsize); ?>px !important;
				}

				.type-wrap-<?php echo esc_attr($some_id); ?> .mega-prefix,
				.type-wrap-<?php echo esc_attr($some_id); ?> .mega-suffix {
					font-size: <?php echo esc_attr($typermblsize); ?>px !important;
				}
				.type-wrap-<?php echo esc_attr($some_id); ?>.texttyper-reduced-motion .typed-strings {
					font-size: <?php echo esc_attr($typermblsize); ?>px !important;
				}
			}
			@media (prefers-reduced-motion: reduce) {
				.type-wrap .typed-strings {
					display: block !important;
				}
				.type-wrap {
					height: auto !important;
					min-height: 50px;
				}
				.type-wrap .typed {
					display: none !important;
				}
				.type-wrap .blink_me {
					animation: none !important;
					display: none !important;
				}
				.type-wrap-<?php echo esc_attr($some_id); ?> .typed-strings {
					font-size: <?php echo esc_attr($typersize); ?>px;
				}
			}
			@media only screen and (max-width: 768px) and (prefers-reduced-motion: reduce) {
				.type-wrap-<?php echo esc_attr($some_id); ?> .typed-strings {
					font-size: <?php echo esc_attr($typermblsize); ?>px !important;
				}
			}
        </style>

        <!-- HTML END DESIGN HERE -->
		<?php 
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Text Type', 'mega-addons-for-visual-composer' ),
	"base" 			=> "text_type_vc",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Fancy line with animation effects', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/texttype.png',
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Text Align', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"align",
			"description" 	=> 	__( 'set text align', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
			"value"			=>	array(
				"Left" 			=> 	"left",
				"Center" 		=> 	"center",
				"Right" 		=> 	"right",
			)
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Prefix', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"before",
			"description" 	=> 	__( 'write text that will show before typer text or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Suffix', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"after",
			"description" 	=> 	__( 'write text that will show after typer text or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
		),
		array(
			"type"             => "text",
			"param_name"       => "wdo_title_text_typography",
			"heading"          => "<b>" . __( "Prefix/Suffix Text Font Size", "mega-addons-for-visual-composer" ) . "</b>",
			"value"            => "",
			"edit_field_class" => "vc_col-sm-12 wdo_margin_top",
			"group"            => "General"
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'On Desktop', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> 	"size",
			"suffix" 		=> 'px',
			'value' 		=> __( "18", 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'On Mobile', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> 	"textmblsize",
			"suffix" 		=> 'px',
			"value"			=>	"18",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Text Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"clr",
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
			"type" 			=> 	"checkbox",
			"heading" 		=> 	__( 'Show Vertical line|', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"checked",
			"description" 	=> 	__( 'with and after typer text', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Typer Text',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Vertical line Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"verticalclr",
			"group" 		=> 	'Typer Text',
		),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Provide text to display (each per line) [ Text must be wrapped in html markup ]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"content",
			"description" 	=> 	__( 'Text must be wrapped in html markup.', 'mega-addons-for-visual-composer' ),
			'value' 		=> __( "I'm hello world", 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Typer Text',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Text type speed', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"typespeed",
			"description" 	=> 	__( 'in milli second, default 70 [1s = 1000]', 'mega-addons-for-visual-composer' ),
			"max"			=>	"",
			'value' 		=> __( "70", 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Setting',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Back delay speed', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"backspeed",
			"description" 	=> 	__( 'in milli second, default 500 [1s = 1000]', 'mega-addons-for-visual-composer' ),
			"max"			=>	"",
			'value' 		=> __( "500", 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Setting',
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Loop', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"loop",
			"description" 	=> 	__( 'Repeat text', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Setting',
			'value' 		=> 	 array( 'true', 'false' ),
		),
		array(
			"type"             => "text",
			"param_name"       => "wdo_title_text_typography",
			"heading"          => "<b>" . __( "TextTyper Font Size", "mega-addons-for-visual-composer" ) . "</b>",
			"value"            => "",
			"edit_field_class" => "vc_col-sm-12 wdo_margin_top",
			"group"            => "Setting"
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'On Desktop', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> 	"typersize",
			"suffix" 		=> 'px',
			'value' 		=> __( "18", 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Setting',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'On Mobile', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> 	"typermblsize",
			"suffix" 		=> 'px',
			"value"			=>	"18",
			"group" 		=> 'Setting',
		),
	),
) );
