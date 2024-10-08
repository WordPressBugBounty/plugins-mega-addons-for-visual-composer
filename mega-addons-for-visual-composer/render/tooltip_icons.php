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
		wp_enqueue_style( 'na-tooltip-css', plugin_dir_url( dirname(__FILE__) ).'/css/tooltipster.bundle.min.css' );
		wp_enqueue_script( 'na-tooltip', plugin_dir_url( dirname(__FILE__) ).'/js/tooltipster.bundle.min.js', array('jquery') );
		wp_enqueue_script( 'na-tooltipa', plugin_dir_url( dirname(__FILE__) ).'/js/tooltip.js', array('jquery') );
		// wp_enqueue_style( 'animates-css', plugins_url( '../css/tooltip.css' , __FILE__ ));
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$content = wpb_js_remove_wpautop($content, true);
		$tooltip_id = rand();
		ob_start(); ?>
			<img src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($alt); ?>" style="max-width: 100%; width: <?php echo esc_attr($img_width); ?>;" data-uid="<?php echo esc_attr($tooltip_id); ?>" class="tooltip" data-theme="tooltipster-<?php echo esc_attr($theme); ?>" data-speed="<?php echo esc_attr($speed); ?>" data-anim="<?php echo esc_attr($animation); ?>" data-position="<?php echo esc_attr($position); ?>" data-interactive="<?php echo esc_attr($interactive); ?>" title="<?php echo esc_attr($text); ?>">
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
	"name" 			=> __( 'Tooltip Icons', 'justicons' ),
	"base" 			=> "tooltip_icons",
	"category" 		=> __('Mega Addons'),
	"description" 	=> __('show icons with tooltip', ''),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/icon.png',
	'params' => array(
		array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'justicons' ),
			"param_name" 	=> 	"image_id",
			"description" 	=> 	__( 'Select the image', 'justicons' ),
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Alternate Text', 'info-banner-vc' ),
			"param_name" 	=> 	"alt",
			"description" 	=> 	__( 'It will be used as alt attribute of img tag', 'info-banner-vc' ),
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Image Width', 'info-banner-vc' ),
			"param_name" 	=> 	"img_width",
			"suffix" 		=> 	"px",
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'ToolTip Text', 'justicons' ),
			"param_name" 	=> 	"text",
			"description" 	=> 	__( 'it will show on hover image', 'justicons' ),
			"group" 		=> 	'Image',
        ),
        array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> __( '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;"><a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">Get the Pro version for more stunning elements and customization options.</a></span>', 'ihover' ),
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
			"heading" 		=> 	__( 'Animation Speed', 'justicons' ),
			"param_name" 	=> 	"speed",
			"description" 	=> 	__( 'Sets the duration of the animation, in milliseconds', 'justicons' ),
			"value"			=>	"350",
			"group" 		=> 	'Settings',
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Animation Style', 'justicons' ),
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
			"heading" 		=> 	__( 'Choose Theme', 'justicons' ),
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
			"heading" 		=> 	__( 'Posotion', 'justicons' ),
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
			"heading" 		=> 	__( 'Interactive', 'justicons' ),
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

