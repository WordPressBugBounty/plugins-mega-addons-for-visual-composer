<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_tm_carousel_father extends WPBakeryShortCodesContainer {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'theme'				=>		'default-tdt',
			'mbl_height'		=>		'',
			'effect'			=>		'false',
			'arrows'			=>		'true',
			'dot'				=>		'true',
			'autoplay'			=>		'true',
			'speed'				=>		'2500',
			'animation_speed'	=>		'500',
			'spaces'			=>		'0',
			'slide_visible'		=>		'1',
			'slide_visible_mbl'	=>		'1',
			'tabs'				=>		'1',
			'slide_scroll'		=>		'1',
			'borderclr'			=>		'transparent',
			'arrowclr'			=>		'#000',
			'arrowbg'			=>		'',
			'arrowsize'			=>		'30',
			'dotclr'			=>		'#000',
			'dotsize'			=>		'30',
			'class'				=>		'',
		), $atts ) );
		$some_id = VC_MEGA::next_instance_id();
		$content = wpb_js_remove_wpautop($content);
		wp_enqueue_style( 'slick-core-css', plugins_url( '../css/slick.css' , __FILE__ ), array(), '1.8.1');
		wp_enqueue_style( 'slick-theme-css', plugins_url( '../css/slick-theme.css' , __FILE__ ), array('slick-core-css'), '1.8.1');
		wp_enqueue_style( 'slick-carousel-css', plugins_url( '../css/slick-carousal.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		wp_enqueue_script( 'slick-js', plugins_url( '../js/slick.js' , __FILE__ ), array('jquery'), '1.8.1', false);
		wp_enqueue_script( 'custom-js', plugins_url( '../js/custom-tm.js' , __FILE__ ), array('jquery', 'slick-js'), VC_MEGA::VERSION, false);
		ob_start(); ?>
		<section class="tm-slider slider <?php echo esc_attr($class); ?> <?php echo esc_attr($theme); ?>" id="tdt-slider-<?php echo esc_attr($some_id) ?>" data-mobiles="<?php echo esc_attr($slide_visible_mbl) ?>" data-tabs="<?php echo esc_attr($tabs) ?>" data-slick='{"arrows": <?php echo esc_attr($arrows); ?>, "autoplaySpeed": <?php echo esc_attr($speed); ?>, "speed": <?php echo esc_attr($animation_speed); ?>, "dots": <?php echo esc_attr($dot); ?>, "autoplay": true, "slidesToShow": <?php echo esc_attr($slide_visible); ?>, "slidesToScroll": <?php echo esc_attr($slide_scroll); ?>, "fade": <?php echo esc_attr($effect); ?>}'>
		    <?php echo wp_kses_post($content); ?>
		</section>

		<style>
			#tdt-slider-<?php echo esc_attr($some_id) ?> .slick-slide {
				padding: 0 <?php echo esc_attr($spaces) ?>px !important;
			}
			<?php if ($dot == 'true') { ?>
				#tdt-slider-<?php echo esc_attr($some_id) ?> .slick-dots li button:before{
					color: <?php echo esc_attr($dotclr) ?>;
					font-size: <?php echo esc_attr($dotsize); ?>px !important;
					border: 2px solid <?php echo esc_attr($borderclr) ?>;
				}
			<?php } ?>
			<?php if ($arrows == 'true') { ?>
				#tdt-slider-<?php echo esc_attr($some_id) ?> .slick-next:before, #tdt-slider-<?php echo esc_attr($some_id) ?> .slick-prev:before {
					color: <?php echo esc_attr($arrowclr) ?> !important;
					background: <?php echo esc_attr($arrowbg); ?> !important;
					font-size: <?php echo esc_attr($arrowsize); ?>px !important;
				}
			<?php } ?>
			<?php if ($theme == 'content-over-slider') { ?>
				@media only screen and (max-width: 480px) {
					#tdt-slider-<?php echo esc_attr($some_id) ?>.content-over-slider .slick-slide .content-section {
						top: 35px !important;
					}
					#tdt-slider-<?php echo esc_attr($some_id) ?>.content-over-slider .ultimate-slide-img {
						height: <?php echo esc_attr($mbl_height); ?>px !important;
						object-fit: cover;
					}
				}
			<?php } ?>
		</style>
		<?php return ob_get_clean();
	}
}


vc_map( array(
	"base" 			=> "tm_carousel_father",
	"name" 			=> __( 'Advanced Carousel', 'mega-addons-for-visual-composer' ),
	"as_parent" 	=> array('only' => 'tm_carousel_son'),
	"content_element" => true,
	"js_view" 		=> 'VcColumnView',
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('show as slider', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/carousal-slider.png',
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Select Theme', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"theme",
			"description"	=>	__('Use as carousel with image above content or as a slider with image over content', 'mega-addons-for-visual-composer'),
			"group" 		=> 'Settings',
				"value" 		=> 	array(
					"Top Image Bottom Content" 		=> 		"default-tdt",
					"Content Over Image" 			=> 		"content-over-slider",
				)
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Slide Effect', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"effect",
			"description"	=>	__('choose slider effect', 'mega-addons-for-visual-composer'),
			"group" 		=> 'Settings',
				"value" 		=> 	array(
					"Slide [Right To Left]" 		=> 		"false",
					"Fade" 			=> 		"true",
				)
		),
		
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Autoplay', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"autoplay",
			"description"	=>	__('move auto or slide on click', 'mega-addons-for-visual-composer'),
			"group" 		=> 'Settings',
			"value" 		=> 	array(
				"True" 		=> 		"true",
				"False (available in pro)" 	=> 		"false",
			)
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Adaptive Height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"adaptiveheight",
			"description"	=>	__('resize height automatically to fill the gap If each slide has different height', 'mega-addons-for-visual-composer'),
			"group" 		=> 'Settings',
			"value" 		=> 	array(
				"False" 						=> 		"false",
				"True (available in pro)" 		=> 		"true",
			)
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Slider Speed', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"speed",
			"edit_field_class" => "vc_col-sm-6",
			"description"	=>	__('Required: write in ms eg, 2000 [1s = 1000]', 'mega-addons-for-visual-composer'),
			"value"			=>	"2500",
			"group" 		=> 'Settings',
		),

		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Animation Speed', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"animation_speed",
			"edit_field_class" => "vc_col-sm-6",
			"description"	=>	__('Required: Slide/Fade animation speed in ms', 'mega-addons-for-visual-composer'),
			"value"			=>	"500",
			"group" 		=> 'Settings',
		),

		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Spaces between two items [px]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"spaces",
			"value"			=>	"0",
			"group" 		=> 'Settings',
		),
		array(
			"type"             => "text",
			"param_name"       => "wdo_title_text_typography",
			"heading"          => "<b>" . __( "Slides to Show‏", "mega-addons-for-visual-composer" ) . "</b>",
			"value"            => "",
			"edit_field_class" => "vc_col-sm-12 wdo_margin_top",
			"group"            => "Settings"
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'On Desktop', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> 	"slide_visible",
			"description"	=>	__('set visible number of slides. default is 1', 'mega-addons-for-visual-composer'),
			"value"			=>	"1",
			"group" 		=> 'Settings',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'On Tabs', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> 	"tabs",
			"value"			=>	"1",
			"group" 		=> 'Settings',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'On Mobile', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> 	"slide_visible_mbl",
			"value"			=>	"1",
			"group" 		=> 'Settings',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Slide To Scroll', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"slide_scroll",
			"description"	=>	__('allow user to multiple slide on click or drag. default is 1', 'mega-addons-for-visual-composer'),
			"value"			=>	"1",
			"group" 		=> 'Settings',
		),
		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Extra Class', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"class",
			"description" 	=> 	__( 'Add extra class name that will be applied to the icon process, and you can use this class for your customizations.', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	"Settings",
        ),
        array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'Settings',
		),

		// Arrow Section Setting

        array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Arrows', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"arrows",
			"description"	=>	__('Show/Hide on left & right', 'mega-addons-for-visual-composer'),
			"group" 		=> 'Navigation',
				"value" 		=> 	array(
					"Show" 			=> 		"true",
					"Hide" 			=> 		"false",
				)
		),
		
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Arrow Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"arrowclr",
			"dependency" 	=> array('element' => "arrows", 'value' => 'true'),
			"value"			=>	"#000",
			"group" 		=> 'Navigation',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Arrow background', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"arrowbg",
			"dependency" 	=> array('element' => "arrows", 'value' => 'true'),
			"group" 		=> 'Navigation',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Arrow Font Size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"arrowsize",
			"description"	=>	"set in pixel eg, 20",
			"dependency" 	=> array('element' => "arrows", 'value' => 'true'),
			"suffix" 		=> 	'px',
			"value"			=>	"30",
			"group" 		=> 'Navigation',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Position [Pro Option]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"arrowposition",
			"description"	=>	"change the position of arrows on slider, with minus sign arrows move away from slider",
			"value"			=>	"",
			"dependency" 	=> array('element' => "arrows", 'value' => 'true'),
			"group" 		=> 'Navigation',
		),

		// Dot Section Setting 
		
		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Dot Settings', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Navigation',
		),

		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Dots', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"dot",
			"description"	=>	__('Show/Hide show at bottom', 'mega-addons-for-visual-composer'),
			"group" 		=> 'Navigation',
				"value" 		=> 	array(
					"Show" 			=> 		"true",
					"Hide" 			=> 		"false",
				)
		),
		
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Dot/Border', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"style",
			"group" 		=> 'Navigation',
			"dependency" => array('element' => "dot", 'value' => 'true'),
			"value"			=>	array(
				"Dot"		=>		"dot",
				"Border"	=>		"border",
			)
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Dot Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"dotclr",
			"dependency" => array('element' => "style", 'value' => 'dot'),
			"value"			=>	"#000",
			"group" 		=> 'Navigation',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Dot Size [px]', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "style", 'value' => 'dot'),
			"param_name" 	=> 	"dotsize",
			"value"			=>	"30",
			"group" 		=> 'Navigation',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Border Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"borderclr",
			"dependency" => array('element' => "style", 'value' => 'border'),
			"value"			=>	"",
			"group" 		=> 'Navigation',
		),

		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Position [Pro Option]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"dotposition",
			"dependency" => array('element' => "dot", 'value' => 'true'),
			"description"	=>	"change the position of Dots on slider, with minus sign dots move away from slider",
			"value"			=>	"",
			"group" 		=> 'Navigation',
		),
		 

		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Carousel Height (For Mobile)', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"mbl_height",
			"description"	=>	__( 'set in pixel eg, 250 or leave blank', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 	'px',
			"dependency" => array('element' => "theme", 'value' => 'content-over-slider'),
			"group" 		=> 'Mobile Option',
		),
	)
) );
