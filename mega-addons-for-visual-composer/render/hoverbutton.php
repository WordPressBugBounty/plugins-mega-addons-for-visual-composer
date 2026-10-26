<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_button extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'btn_style' => 'animated',
			'anim_style' => 'transition',
			'anim_trans' => '',
			'bg_trans' => 'hvr-sweep-to-right',
			'shadow_trans' => 'hvr-shadow',
			'brdr_trans' => 'hvr-underline-from-left',
			'bubble_trans' => 'hvr-bubble-top',
			'align' => 'left',
			'padding_top' => '5',
			'padding_left' => '10',
			'btn_radius' => '',
			'btn_next' => '',
			'btn_url' => '',
			'btn_text' => '',
			'btn_size' => '18',
			'btn_icon' => '',
			'btn_border' => '',
			'border_width' => '1',
			'btn_clr' => '#000',
			'btn_bg' => '#fff',
			'btn_shadow' => '',
			'btn_hvrclr' => 'asda',
			'btn_hvrbg' => 'adsa',
		), $atts ) );
		$btn_url = vc_build_link($btn_url);
		// WPBakery's colorpicker can retain CSS color values beyond opaque hex.
		// Accept only complete color tokens here; esc_attr() alone is not a CSS
		// sanitizer, and this value is also used in the speech-bubble declaration.
		$css_color_names = array(
			'aliceblue', 'antiquewhite', 'aqua', 'aquamarine', 'azure', 'beige', 'bisque', 'black', 'blanchedalmond',
			'blue', 'blueviolet', 'brown', 'burlywood', 'cadetblue', 'chartreuse', 'chocolate', 'coral', 'cornflowerblue',
			'cornsilk', 'crimson', 'cyan', 'darkblue', 'darkcyan', 'darkgoldenrod', 'darkgray', 'darkgrey', 'darkgreen',
			'darkkhaki', 'darkmagenta', 'darkolivegreen', 'darkorange', 'darkorchid', 'darkred', 'darksalmon',
			'darkseagreen', 'darkslateblue', 'darkslategray', 'darkslategrey', 'darkturquoise', 'darkviolet',
			'deeppink', 'deepskyblue', 'dimgray', 'dimgrey', 'dodgerblue', 'firebrick', 'floralwhite', 'forestgreen',
			'fuchsia', 'gainsboro', 'ghostwhite', 'gold', 'goldenrod', 'gray', 'grey', 'green', 'greenyellow',
			'honeydew', 'hotpink', 'indianred', 'indigo', 'ivory', 'khaki', 'lavender', 'lavenderblush', 'lawngreen',
			'lemonchiffon', 'lightblue', 'lightcoral', 'lightcyan', 'lightgoldenrodyellow', 'lightgray', 'lightgrey',
			'lightgreen', 'lightpink', 'lightsalmon', 'lightseagreen', 'lightskyblue', 'lightslategray', 'lightslategrey',
			'lightsteelblue', 'lightyellow', 'lime', 'limegreen', 'linen', 'magenta', 'maroon', 'mediumaquamarine',
			'mediumblue', 'mediumorchid', 'mediumpurple', 'mediumseagreen', 'mediumslateblue', 'mediumspringgreen',
			'mediumturquoise', 'mediumvioletred', 'midnightblue', 'mintcream', 'mistyrose', 'moccasin', 'navajowhite',
			'navy', 'oldlace', 'olive', 'olivedrab', 'orange', 'orangered', 'orchid', 'palegoldenrod', 'palegreen',
			'paleturquoise', 'palevioletred', 'papayawhip', 'peachpuff', 'peru', 'pink', 'plum', 'powderblue',
			'purple', 'rebeccapurple', 'red', 'rosybrown', 'royalblue', 'saddlebrown', 'salmon', 'sandybrown',
			'seagreen', 'seashell', 'sienna', 'silver', 'skyblue', 'slateblue', 'slategray', 'slategrey', 'snow',
			'springgreen', 'steelblue', 'tan', 'teal', 'thistle', 'tomato', 'turquoise', 'violet', 'wheat', 'white',
			'whitesmoke', 'yellow', 'yellowgreen', 'transparent', 'currentcolor',
		);
		$valid_hex = is_string( $btn_bg ) && preg_match( '/^(?:#[0-9a-fA-F]{3}|#[0-9a-fA-F]{4}|#[0-9a-fA-F]{6}|#[0-9a-fA-F]{8})$/D', $btn_bg );
		$valid_rgb = is_string( $btn_bg ) && preg_match( '/^rgb\(\s*\d{1,3}%?\s*,\s*\d{1,3}%?\s*,\s*\d{1,3}%?\s*\)$/iD', $btn_bg );
		$valid_rgba = is_string( $btn_bg ) && preg_match( '/^rgba\(\s*\d{1,3}%?\s*,\s*\d{1,3}%?\s*,\s*\d{1,3}%?\s*,\s*(?:0(?:\.\d+)?|1(?:\.0+)?|\d+(?:\.\d+)?%)\s*\)$/iD', $btn_bg );
		$valid_hsl = is_string( $btn_bg ) && preg_match( '/^hsl\(\s*\d+(?:\.\d+)?(?:deg|rad|turn)?\s*,\s*\d+(?:\.\d+)?%\s*,\s*\d+(?:\.\d+)?%\s*\)$/iD', $btn_bg );
		$valid_hsla = is_string( $btn_bg ) && preg_match( '/^hsla\(\s*\d+(?:\.\d+)?(?:deg|rad|turn)?\s*,\s*\d+(?:\.\d+)?%\s*,\s*\d+(?:\.\d+)?%\s*,\s*(?:0(?:\.\d+)?|1(?:\.0+)?|\d+(?:\.\d+)?%)\s*\)$/iD', $btn_bg );
		$valid_named = is_string( $btn_bg ) && in_array( strtolower( $btn_bg ), $css_color_names, true );
		if ( ! ( $valid_hex || $valid_rgb || $valid_rgba || $valid_hsl || $valid_hsla || $valid_named ) ) {
			$btn_bg = '';
		}
		$bubble_border = '';
		if ( $bubble_trans == 'hvr-bubble-bottom' || $bubble_trans == 'hvr-bubble-float-top' || $bubble_trans == 'hvr-bubble-float-bottom' ) { $bubble_border = 'border-color: ' . $btn_bg . ' transparent transparent transparent;'; }
		elseif ( $bubble_trans == 'hvr-bubble-float-right' || $bubble_trans == 'hvr-bubble-right' ) { $bubble_border = 'border-color: transparent transparent transparent ' . $btn_bg . ';'; }
		elseif ( $bubble_trans == 'hvr-bubble-top' || $bubble_trans == 'hvr-bubble-float-top' ) { $bubble_border = 'border-color: transparent transparent ' . $btn_bg . ' transparent;'; }
		elseif ( $bubble_trans == 'hvr-bubble-left' || $bubble_trans == 'hvr-bubble-float-left' ) { $bubble_border = 'border-color: transparent ' . $btn_bg . ' transparent transparent;'; }
		wp_enqueue_style( 'hvr-btn-css', plugins_url( '../css/hoverbtn.css' , __FILE__ ), array(), '2.0.2');
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		
		<div style="text-align: <?php echo esc_attr($align); ?>;">
			<?php if ($btn_style == 'animated' && $anim_style == 'transition') { ?>
				<a data-onhovercolor="<?php echo esc_attr($btn_hvrclr); ?>" data-onhoverbg="<?php echo esc_attr($btn_hvrbg); ?>" data-onleavebg="<?php echo esc_attr($btn_bg); ?>" data-onleavecolor="<?php echo esc_attr($btn_clr); ?>" href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="mega_hvr_btn <?php echo esc_attr($anim_trans); ?>" style="padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; border:<?php echo esc_attr($border_width); ?>px solid <?php echo esc_attr($btn_border); ?>; font-size: <?php echo esc_attr($btn_size); ?>px; color: <?php echo esc_attr($btn_clr); ?>; background-color: <?php echo esc_attr($btn_bg); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px">
					<i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php echo esc_attr($btn_text); ?>
				</a>
			<?php } ?>

			<!-- Background Transition -->
			<?php if ($btn_style == 'animated' && $anim_style == 'bg_transition') { ?>
				<a data-onhovercolor="<?php echo esc_attr($btn_hvrclr); ?>" data-onleavecolor="<?php echo esc_attr($btn_clr); ?>" href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" style="padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; border:<?php echo esc_attr($border_width); ?>px solid <?php echo esc_attr($btn_border); ?>; font-size: <?php echo esc_attr($btn_size); ?>px; color: <?php echo esc_attr($btn_clr); ?>; background-color: <?php echo esc_attr($btn_bg); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px" class="mega_hvr_btn <?php echo esc_attr($bg_trans); ?>">
					<span style="background: <?php echo esc_attr($btn_hvrbg); ?>;"></span><i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php echo esc_attr($btn_text); ?>
				</a>
			<?php } ?>

			<!-- Border Transition -->
			<?php if ($btn_style == 'animated' && $anim_style == 'brdr_transition') { ?>
				<a data-onhovercolor="<?php echo esc_attr($btn_hvrclr); ?>" data-onleavecolor="<?php echo esc_attr($btn_clr); ?>" href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" style="padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; border:<?php echo esc_attr($border_width); ?>px solid <?php echo esc_attr($btn_border); ?>; font-size: <?php echo esc_attr($btn_size); ?>px; color: <?php echo esc_attr($btn_clr); ?>; background-color: <?php echo esc_attr($btn_bg); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px" class="mega_hvr_btn <?php echo esc_attr($brdr_trans); ?>">
					<span style="background: <?php echo esc_attr($btn_hvrbg); ?>;"></span><i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php echo esc_attr($btn_text); ?>
				</a>
			<?php } ?>

			<!-- Shadow Transition -->
			<?php if ($btn_style == 'animated' && $anim_style == 'shadow') { ?>
				<a data-onhovercolor="<?php echo esc_attr($btn_hvrclr); ?>" data-onhoverbg="<?php echo esc_attr($btn_hvrbg); ?>" data-onleavebg="<?php echo esc_attr($btn_bg); ?>" data-onleavecolor="<?php echo esc_attr($btn_clr); ?>" href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="mega_hvr_btn <?php echo esc_attr($shadow_trans); ?>" style="padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; border:<?php echo esc_attr($border_width); ?>px solid <?php echo esc_attr($btn_border); ?>; font-size: <?php echo esc_attr($btn_size); ?>px; color: <?php echo esc_attr($btn_clr); ?>; background-color: <?php echo esc_attr($btn_bg); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px">
					<i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php echo esc_attr($btn_text); ?>
				</a>
			<?php } ?>

			<!-- Speech Bubbles -->
			<?php if ($btn_style == 'animated' && $anim_style == 'speech_bubbles') { ?>
				<a data-onhovercolor="<?php echo esc_attr($btn_hvrclr); ?>" data-onleavecolor="<?php echo esc_attr($btn_clr); ?>" href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="mega_hvr_btn <?php echo esc_attr($bubble_trans); ?>" style="padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; border:<?php echo esc_attr($border_width); ?>px solid <?php echo esc_attr($btn_border); ?>; font-size: <?php echo esc_attr($btn_size); ?>px; color: <?php echo esc_attr($btn_clr); ?>; background-color: <?php echo esc_attr($btn_bg); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px">
					<span style="
						<?php echo esc_attr( $bubble_border ); ?>
					"></span><i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php echo esc_attr($btn_text); ?>
				</a>
			<?php } ?>


			<!-- 3D button -->
			<?php if ($btn_style == '3D') { ?>
				<a href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="push_button" style="font-size: <?php echo esc_attr($btn_size); ?>px; padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; background: <?php echo esc_attr($btn_bg); ?>; color: <?php echo esc_attr($btn_clr); ?>; box-shadow: 0 0 0 1px <?php echo esc_attr($btn_shadow); ?> inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 4px 0 0 <?php echo esc_attr($btn_shadow); ?>, 0 8px 8px 1px rgba(0,0,0,0.5);">
					<i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php echo esc_attr($btn_text); ?>
				</a>
			<?php } ?>
		</div>

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'CSS3 Button (OLD)', 'mega-addons-for-visual-composer' ),
	"base" 			=> "mvc_button",
	// "category" 		=> __('Mega Addons'),
	"description" 	=> __('Animated style buttons', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/hoverbutton.png',
	'params' => array(
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_style",
			"description" 	=> __( 'Choose button style', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"value" 		=> array(
				'Animated Button' =>  'animated',
				'3D button' =>  '3D',
			)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Animation Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "anim_style",
			"description" 	=> __( 'Choose animation style on hover', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "btn_style", 'value' => 'animated'),
			"value" 		=> array(
				'2D Transition' =>  'transition',
				'Background Transition' =>  'bg_transition',
				'Shadow and Glow' =>  'shadow',
				'Border Transition' =>  'brdr_transition',
				'Speech Bubbles' =>  'speech_bubbles',
			)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( '2D Transition', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "anim_trans",
			"description" 	=> __( 'Choose animation style on hover', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "anim_style", 'value' => 'transition'),
			"value" 		=> array(
				'Grow' 			=>  'hvr-grow',
				'Shrink' 			=>  'hvr-shrink',
				'Pulse'		=>	'hvr-pulse',
				'Pulse Grow'	=>	'hvr-pulse-grow',
				'Pulse Shrink'	=>	'hvr-pulse-shrink',
				'Push'			=>	'hvr-push',
				'Pop'			=>	'hvr-pop',
				'Bounce In'		=>	'hvr-bounce-in',
				'Bounce Out'	=>	'hvr-bounce-out',
				'Rotate'		=>	'hvr-rotate',
				'Grow Rotate'	=>	'hvr-grow-rotate',
				'Float'			=>	'hvr-float',
				'Sink'			=>	'hvr-sink',
				'Bob'			=>	'hvr-bob',
				'Hang'			=>	'hvr-hang',
				'Skew'			=>	'hvr-skew',
				'Skew Forward'	=>	'hvr-skew-forward',
				'Skew Backward'	=>	'hvr-skew-backward',
				'Wobble Horizontal'	=>	'hvr-wobble-horizontal',
				'Wobble Vertical'	=>	'hvr-wobble-vertical',
				'Wobble To Bottom Right'	=>	'hvr-wobble-to-bottom-right',
				'Wobble To Top Right'	=>	'hvr-wobble-to-top-right',
				'Wobble Top'	=>	'hvr-wobble-top',
				'Wobble Bottom'	=>	'hvr-wobble-bottom',
				'Wobble Skew'	=>	'hvr-wobble-skew',
				'Buzz'			=>	'hvr-buzz',
				'Buzz Out'		=>	'hvr-buzz-out',
			)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Background Transition', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "bg_trans",
			"description" 	=> __( 'Choose animation style on hover', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "anim_style", 'value' => 'bg_transition'),
			"value" 		=> array(
				'Fade' => 'hvr-fade',
				'Back Pulse' => 'hvr-back-pulse',
				'Sweep To Right' => 'hvr-sweep-to-right',
				'Sweep To Left' => 'hvr-sweep-to-left',
				'Sweep To Bottom' => 'hvr-sweep-to-bottom',
				'Sweep To Top' => 'hvr-sweep-to-top',
				'Bounce To Right' => 'hvr-bounce-to-right',
				'Bounce To Left' => 'hvr-bounce-to-left',
				'Bounce To Bottom' => 'hvr-bounce-to-bottom',
				'Bounce To Top' => 'hvr-bounce-to-top',
				'Radial Out' => 'hvr-radial-out',
				// 'Radial In' => 'hvr-radial-in',
				// 'Rectangle In' => 'hvr-rectangle-in',
				'Rectangle Out' => 'hvr-rectangle-out',
				// 'Shutter In Horizontal' => 'hvr-shutter-in-horizontal',
				'Shutter Out Horizontal' => 'hvr-shutter-out-horizontal',
				// 'Shutter In Vertical' => 'hvr-shutter-in-vertical',
				'Shutter Out Vertical' => 'hvr-shutter-out-vertical',
			)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Border Transition', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "brdr_trans",
			"description" 	=> __( 'Choose animation style on hover', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "anim_style", 'value' => 'brdr_transition'),
			"value" 		=> array(
				'Underline From Left' => 'hvr-underline-from-left',
				'Underline From Center' => 'hvr-underline-from-center',
				'Underline From Right' => 'hvr-underline-from-right',
				'Underline Reveal' => 'hvr-underline-reveal',
				'Overline Reveal' => 'hvr-overline-reveal',
				'Overline From Left' => 'hvr-overline-from-left',
				'Overline From Center' => 'hvr-overline-from-center',
				'Overline From Right' => 'hvr-overline-from-right',
				'Reveal' => 'hvr-reveal',
			)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Speech Bubbles', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "bubble_trans",
			"description" 	=> __( 'Choose animation style on hover', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "anim_style", 'value' => 'speech_bubbles'),
			"value" 		=> array(
				'Bubble Top' =>  'hvr-bubble-top',
				'Bubble Right' =>  'hvr-bubble-right',
				'Bubble Bottom' =>  'hvr-bubble-bottom',
				'Bubble Left' =>  'hvr-bubble-left',
				'Bubble Float Top' =>  'hvr-bubble-float-top',
				'Bubble Float Right' =>  'hvr-bubble-float-right',
				'Bubble Float Bottom' =>  'hvr-bubble-float-bottom',
				'Bubble Float Left' =>  'hvr-bubble-float-left',
			)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Shadow and Glow', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "shadow_trans",
			"description" 	=> __( 'Choose animation style on hover', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "anim_style", 'value' => 'shadow'),
			"value" 		=> array(
				'Shadow'		=>	'hvr-shadow',
				'Grow Shadow'	=>		'hvr-grow-shadow',
				'Float Shadow'	=>		'hvr-float-shadow',
				'Glow'			=>		'hvr-glow',
				'Shadow Radial'	=>		'hvr-shadow-radial',
				'Box Shadow Outset'	=>		'hvr-box-shadow-outset',
				'Box Shadow Inset'	=>		'hvr-box-shadow-inset',
				'Sweep to Left'	=>		'hvr-sweep-to-left',
			)
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Button Align', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"align",
			"description" 	=> 	__( 'select text align', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
				"value" 		=> array(
					"Left"		=> "left",
					"Center"		=> "center",
					"Right"		=> "right",
				)
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Padding [Top Bottom]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "padding_top",
			"description" 	=> __( 'It will increase height of button e.g 10', 'mega-addons-for-visual-composer' ),
			"value"			=>	"5",
			"suffix" 		=> 'px',
			"group" 		=> 'General',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Padding [Left Right]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "padding_left",
			"description" 	=> __( 'It will increase width of button e.g 20', 'mega-addons-for-visual-composer' ),
			"value"			=>	"10",
			"suffix" 		=> 'px',
			"group" 		=> 'General',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Radius', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_radius",
			"description" 	=> __( 'set button radius e.g 5', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "btn_style", 'value' => 'animated'),
			"suffix" 		=> 'px',
			"group" 		=> 'General',
		),
		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'General',
		),
		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Select icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_icon",
			"description" 	=> __( 'it will be show within text', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Text',
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Button text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_text",
			"description" 	=> __( 'Write button text', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Text',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Text font size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_size",
			"description" 	=> __( 'Set font size in pixel e.g 18', 'mega-addons-for-visual-composer' ),
			"value"			=>	"18",
			"suffix" 		=> 'px',
			"group" 		=> 'Text',
		),
		array(
			"type" 			=> "vc_link",
			"heading" 		=> __( 'Button URL', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_url",
			"description" 	=> __( 'Write button url as link', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Text',
		),

		/** border **/

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Border color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_border",
			"description" 	=> __( 'Set color of border e.g #269CE9', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "btn_style", 'value' => 'animated'),
			"group" 		=> 'Border',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Border width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "border_width",
			"description" 	=> __( 'Set width of border in pixel e.g 1', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "btn_style", 'value' => 'animated'),
			"value"			=>	"1",
			"suffix" 		=> 'px',
			"group" 		=> 'Border',
		),


		/** color **/

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Text color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_clr",
			"description" 	=> __( 'Set color of text e.g #ffff', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Background color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_bg",
			"description" 	=> __( 'Set color of background e.g #269CE9', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Background Shadow color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_shadow",
			"description" 	=> __( 'keep it same and much dark from background color', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "btn_style", 'value' => '3D'),
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Hover Text color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_hvrclr",
			"description" 	=> __( 'Set color of text on hover e.g #ffff', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "btn_style", 'value' => 'animated'),
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Background color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_hvrbg",
			"description" 	=> __( 'Set color of background on hover e.g #269CE9', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "btn_style", 'value' => 'animated'),
			"group" 		=> 'Color',
		),
	),
) );

