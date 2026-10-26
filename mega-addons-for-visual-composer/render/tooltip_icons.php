<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_tooltip_icons extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'image_id'		=>		'',
			'img_width'		=>		'',
			'alt'			=>		'',
			'text'			=>		'Im Tooltip',
			'textsize'		=>		'',
			'topbottom'		=>		'',
			'rightleft'		=>		'',
			'speed'			=>		'350',
			'animation'		=>		'fade',
			'theme'			=>		'default',
			'position'		=>		'top',
			'interactive'	=>		'true',
		), $atts ) );
		wp_enqueue_style( 'na-tooltip-css', plugin_dir_url( dirname(__FILE__) ).'/css/tooltipster.bundle.min.css' , array(), '4.2.7');
		wp_enqueue_script( 'na-tooltip', plugin_dir_url( dirname(__FILE__) ).'/js/tooltipster.bundle.min.js', array('jquery') , '4.2.7', false);
		wp_enqueue_script( 'na-tooltipa', plugin_dir_url( dirname(__FILE__) ).'/js/tooltip.js', array('jquery') , VC_MEGA::VERSION, false);
		// wp_enqueue_style( 'animates-css', plugins_url( '../css/tooltip.css' , __FILE__ ));
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$content = wpb_js_remove_wpautop($content, true);
		$tooltip_id = VC_MEGA::next_instance_id();
		$tooltip_description_id = 'tooltip-description-' . $tooltip_id;
		ob_start(); ?>
			<button type="button" class="tooltip-trigger" aria-label="<?php echo esc_attr( $alt !== '' ? $alt : $text ); ?>" aria-describedby="<?php echo esc_attr($tooltip_description_id); ?>" style="display: inline-block; max-width: 100%; width: <?php echo esc_attr($img_width); ?>; margin: 0; padding: 0; border: 0; background: transparent; font: inherit; line-height: 0; vertical-align: middle; cursor: pointer;" data-uid="<?php echo esc_attr($tooltip_id); ?>" data-theme="tooltipster-<?php echo esc_attr($theme); ?>" data-speed="<?php echo esc_attr($speed); ?>" data-anim="<?php echo esc_attr($animation); ?>" data-position="<?php echo esc_attr($position); ?>" data-interactive="<?php echo esc_attr($interactive); ?>" title="<?php echo esc_attr($text); ?>"><img src="<?php echo esc_attr($image_url); ?>" alt="" style="display: block; max-width: 100%; width: 100%; height: auto;"></button>
			<span id="<?php echo esc_attr($tooltip_description_id); ?>" style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0;"><?php echo esc_html($text); ?></span>
			<style>
				/*.tooltipster-content {
					font-size: <?php echo esc_attr($textsize); ?>px !important;
					padding: <?php echo esc_attr($topbottom); ?>px <?php echo esc_attr($rightleft); ?>px !important;
				}*/
			</style>
		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Tooltip Icons', 'mega-addons-for-visual-composer' ),
	"base" 			=> "tooltip_icons",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('show icons with tooltip', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/icon.png',
	'params' => array(
		array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"image_id",
			"description" 	=> 	__( 'Select the image', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Alternate Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"alt",
			"description" 	=> 	__( 'It will be used as alt attribute of img tag', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Image Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"img_width",
			"suffix" 		=> 	"px",
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'ToolTip Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"text",
			"description" 	=> 	__( 'it will show on hover image', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Image',
        ),
        array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'Image',
		),
		// array(
  //           "type" 			=> 	"vc_number",
		// 	"heading" 		=> 	__( 'Text (Font Size)', 'info-banner-vc' ),
		// 	"param_name" 	=> 	"textsize",
		// 	"description" 	=> 	__( 'leave blank for default', 'info-banner-vc' ),
		// 	"suffix" 		=> 	"px",
		// 	"group" 		=> 	'Image',
  //       ),
  //       array(
  //           "type" 			=> 	"vc_number",
		// 	"heading" 		=> 	__( 'Padding [Top Bottom]', 'info-banner-vc' ),
		// 	"param_name" 	=> 	"topbottom",
		// 	"description" 	=> 	__( 'leave blank for default', 'info-banner-vc' ),
		// 	"suffix" 		=> 	"px",
		// 	"group" 		=> 	'Image',
  //       ),
  //       array(
  //           "type" 			=> 	"vc_number",
		// 	"heading" 		=> 	__( 'Padding [Right Left]', 'info-banner-vc' ),
		// 	"param_name" 	=> 	"rightleft",
		// 	"description" 	=> 	__( 'leave blank for default', 'info-banner-vc' ),
		// 	"suffix" 		=> 	"px",
		// 	"group" 		=> 	'Image',
  //       ),
   //      array(
   //          "type" 			=> 	"colorpicker",
			// "heading" 		=> 	__( 'Background', 'justicons' ),
			// "param_name" 	=> 	"bgclr",
			// "description" 	=> 	__( 'tooltip background color', 'justicons' ),
			// "value"			=>	"#000",
			// "group" 		=> 	'Image',
   //      ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Animation Speed', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"speed",
			"description" 	=> 	__( 'Sets the duration of the animation, in milliseconds', 'mega-addons-for-visual-composer' ),
			"value"			=>	"350",
			"group" 		=> 	'Settings',
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Animation Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"animation",
			"group" 		=> 	'Settings',
			"value"			=>	array(
				"Fade"		=>	"fade",
				"Grow"		=>	"grow",
				"Swing"		=>	"swing",
				"Slide"		=>	"slide",
				"fall"		=>	"Fall",
			)
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Choose Theme', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"theme",
			"group" 		=> 	'Settings',
			"value"			=>	array(
				"Default"		=>	"default",
				"Light"			=>	"light",
				"Borderless"	=>	"borderless",
				"Punk"			=>	"punk",
				"Noir"			=>	"noir",
				"Shadow"		=>	"shadow",
			)
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Posotion', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"position",
			"group" 		=> 	'Settings',
			"value"			=>	array(
				"Top"			=>	"top",
				"Right"			=>	"right",
				"Bottom"		=>	"bottom",
				"Left"			=>	"left",
			)
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Interactive', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"interactive",
			"description" 	=> 	"Give users the possibility to interact with the content of the tooltip.",
			"group" 		=> 	'Settings',
			"value"			=>	array(
				"True"			=>	"true",
				"False"			=>	"false",
			)
        ),
	),
) );

