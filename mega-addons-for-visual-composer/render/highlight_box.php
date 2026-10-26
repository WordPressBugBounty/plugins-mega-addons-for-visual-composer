<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_highlight_box extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style'			=>		'btn-5a',
			'height'		=>		'140',
			'lineheight'	=>		'2',
			'url'			=>		'#0',
			'icon'			=>		'',
			'iconsize'		=>		'31',
			'textsize'		=>		'31',
			'text'			=>		'',
			'text2'			=>		'',
			'clr'			=>		'#000',
			'btn_radius'	=>		'',
			'bgclr'			=>		'#9e54bd',
			'hoverbg'		=>		'',
			'transform' 	=>		'default',
			'btn_shadow' 	=>	'none',
			'google_fonts'	=>		'default',
		), $atts ) );
		$some_id = VC_MEGA::next_instance_id();
		$url = vc_build_link($url);
		wp_enqueue_style( 'highlight-box', plugins_url( '../css/highlight-box.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
			<div class="highlight_box_<?php echo esc_attr($some_id); ?>" style="display: table; width: 100%;height: 100%;">
				<?php if ($style != 'fade2') { ?>
					<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" class="mega_highlight_box btn-5 <?php echo esc_attr($style); ?>" style="height: <?php echo esc_attr($height); ?>px; color: <?php echo esc_attr($clr); ?>; background: <?php echo esc_attr($bgclr); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px;">
						<i class="<?php echo esc_attr($icon); ?> span-before" aria-hidden="true" style="font-size: <?php echo esc_attr($iconsize); ?>px; line-height: <?php echo esc_attr($height); ?>px; color: <?php echo esc_attr($clr); ?>;"></i>
						<div>
							<span class="text" style="font-size: <?php echo esc_attr($textsize); ?>px;"><?php echo esc_attr($text); ?> <br> <?php echo esc_attr($text2); ?></span>
						</div>
						<span class="span-after"></span>
					</a>
				<?php } ?>

				<?php if ($style == 'fade2') { ?>
					<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" class="mega_highlight_box btn-5 <?php echo esc_attr($style); ?>" style="height: <?php echo esc_attr($height); ?>px; color: <?php echo esc_attr($clr); ?>; background: <?php echo esc_attr($bgclr); ?>; text-align: center; border-radius: <?php echo esc_attr($btn_radius); ?>px;">
						<div>
							<span class="text" style="font-size: <?php echo esc_attr($textsize); ?>px; line-height: <?php echo esc_attr($lineheight)-.5; ?>;">
								<?php echo esc_attr($text); ?>
							</span>
						</div>
						<i class="<?php echo esc_attr($icon); ?>" aria-hidden="true" style="line-height: <?php echo esc_attr($lineheight)-1; ?>; font-size: <?php echo esc_attr($iconsize); ?>px; color: <?php echo esc_attr($clr); ?>;"></i>
					</a>
				<?php } ?>
			</div>

			<style>
				.highlight_box_<?php echo esc_attr($some_id); ?> a{
					text-transform: <?php echo esc_attr($transform) ?> !important;
					text-decoration: <?php echo esc_attr($text_decoration) ?> !important;
					box-<?php echo esc_attr($btn_shadow) ?>: 0 10px 20px rgba(0, 0, 0, 0.2) !important;
				}
				.highlight_box_<?php echo esc_attr($some_id); ?> a:hover{
					background: <?php echo esc_attr($hoverbg); ?> !important;
				}
				.highlight_box_<?php echo esc_attr($some_id); ?> .fade i{
					display: none;
				}
			</style>
		<?php
		return ob_get_clean();
	}

}


vc_map( array(
	"name" 			=> __( 'Highlight Box', 'mega-addons-for-visual-composer' ),
	"base" 			=> "highlight_box",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Beautiful designed buttons for highlight', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/creatives.png',
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"style",
			"description" 	=> 	__( 'highlight style', 'mega-addons-for-visual-composer'),
			"group" 		=> 	'General',
			"value"			=>	array(
				"Slide Top"					=>		"btn-5a",
				"Slide Left"				=>		"btn-5b",
				"Slide Right"				=>		"btn-5c",
				"Slide Bottom"				=>		"btn-5d",
				"Fade without Icon"			=>		"fade",
				"Fade with Icon"			=>		"fade2",
				)
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Box Height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "height",
			"description" 	=> 	__( 'set in pixel eg, 140', 'mega-addons-for-visual-composer'),
			"value"			=>	"140",
			"suffix" 		=> 'px',
			"group" 		=> "General",
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'line height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "lineheight",
			"description" 	=> 	__( 'between text and Icon', 'mega-addons-for-visual-composer'),
			"dependency" => array('element' => "style", 'value' => 'fade2'),
			"value"			=>	"2",
			"group" 		=> "General",
		),

		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Choose Icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "icon",
			"group" 		=> "General",
		),

		array(
			"type" 			=> "textarea",
			"heading" 		=> __( 'Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "text",
			"description" 	=> 	__( 'display heighlight box text', 'mega-addons-for-visual-composer'),
			"group" 		=> "General",
		),

		array(
			"type" 			=> "textarea",
			"heading" 		=> __( 'Text 2', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "text2",
			"description" 	=> 	__( 'It will show in 2nd line or leave blank', 'mega-addons-for-visual-composer'),
			"group" 		=> "General",
		),

		array(
			"type" 			=> "vc_link",
			"heading" 		=> __( 'Box URL', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "url",
			"value"			=>	"#0",
			"group" 		=> "General",
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'General',
		),

		// Color Section

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Text Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "clr",
			"group" 		=> "Color",
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Background Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "bgclr",
			"group" 		=> "Color",
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Hover Background Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "hoverbg",
			"group" 		=> "Color",
		),

		// Text Section
		
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Text [Font Size]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "textsize",
			"value"			=>	"35",
			"suffix" 		=> 'px',
			"group" 		=> "Settings",
		),
		
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Icon [Font Size]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "iconsize",
			"value"			=>	"30",
			"suffix" 		=> 'px',
			"group" 		=> "Settings",
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Radius', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_radius",
			"description" 	=> __( 'set button radius e.g 5', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 'Settings',
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Transform', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "transform",
			"group" 		=> 'Settings',
			"value"			=>	array(
				"Default"		=>		"default",
				"Uppercase"		=>		"uppercase",
				"Lowercase"		=>		"lowercase",
				"Capitalize"	=>		"capitalize",
				"Normal"		=>		"normal",
			)
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Shadow', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_shadow",
			"group" 		=> 'Settings',
			"value"			=>	array(
				"None"			=>		"none",
				"Shadow"		=>		"shadow",
			)
		),

	),
) );

