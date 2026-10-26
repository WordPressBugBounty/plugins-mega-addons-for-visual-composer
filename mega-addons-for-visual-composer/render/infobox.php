<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_infobox extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'info_style' 			=> 		'mega_info_box',
			'info_opt' 				=> 		'show_image',
			'image_id' 				=> 		'',
			'alt'	 				=> 		'',
			'image_size' 			=> 		'',
			'image_radius' 			=> 		'0px',
			'font_icon' 			=> 		'',
			'icon_size' 			=> 		'25',
			'icon_color' 			=> 		'',
			'hoverclr' 			=> 		'',
			'icon_height'			=>		'',
			'icon_bg'				=>		'',
			'hoverbg'				=>		'',
			'icon_radius'			=>		'0px',
			'border_width'			=>		'0',
			'border_style'			=>		'solid',
			'border_clr'			=>		'',
			'shadow'				=>		'nonesss',
			'hovershadow'			=>		'nones',
			'css' 		 			=> 		'',
			'info_title' 			=> 		'',
			'title_color' 			=> 		'#000',
			'title_size' 			=> 		'',
			'info_desc' 			=> 		'',
			'line_height' 			=> 		'1',
			'info_size' 			=> 		'',
			'desc_size' 			=> 		'15',
			'btn_visibility' 		=> 		'none',
			'btn_text' 				=> 		'',
			'link' 				=> 		'none',
			'btn_url' 				=> 		'',
			'btn_clr' 				=> 		'',
			'css'	 				=> 		'',
		), $atts ) );
		$some_id = VC_MEGA::next_instance_id();
		$btn_url = vc_build_link($btn_url);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		wp_enqueue_style( 'info-box-css', plugins_url( '../css/infobox.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		
		<?php if ($link == 'link_box') { ?>
			<a href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" style="text-decoration: none;color: #000;">
		<?php } ?>
		<?php if ($link != 'link_box') { ?>
			<a style="text-decoration: none;color: #000;">
		<?php } ?>
			<div class="<?php echo esc_attr($info_style); ?> mega-info-box-<?php echo esc_attr($some_id); ?> <?php echo esc_attr($shadow); ?> <?php echo esc_attr($hovershadow); ?> <?php echo esc_attr($css_class); ?>">
				<div class="mega-info-header">
					<?php if ($info_opt == 'show_image') { ?>
						<img class="mega-info-img" src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($alt); ?>" style="width: <?php echo esc_attr($image_size); ?>px; border-radius: <?php echo esc_attr($image_radius); ?>;">
					<?php } ?>
					<?php if ($info_opt == 'show_icon') { ?>
						<i class="<?php echo esc_attr($font_icon); ?>" aria-hidden="true" style="border: <?php echo esc_attr($border_width); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($border_clr); ?>; border-radius: <?php echo esc_attr($icon_radius); ?>; background: <?php echo esc_attr($icon_bg); ?>; width: <?php echo esc_attr($icon_height); ?>px; height: <?php echo esc_attr($icon_height); ?>px; line-height: <?php echo esc_attr($icon_height-$border_width); ?>px; font-size: <?php echo esc_attr($icon_size); ?>px; color: <?php echo esc_attr($icon_color); ?>;"></i>
					<?php } ?>
				</div>
				<div class="mega-info-footer">
					<h3 class="mega-info-title" style="color: <?php echo esc_attr($title_color); ?>; font-size: <?php echo esc_attr($title_size); ?>px; line-height: <?php echo esc_attr($line_height); ?>;">
						<?php echo esc_attr($info_title); ?>
					</h3>
					<div class="mega-info-desc">
						<?php echo wp_kses_post($content); ?>
					</div>
					<?php if ($link == 'link_btn') { ?>
						<a class="mega-info-btn" href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_html($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" style="color: <?php echo esc_attr($btn_clr); ?>">
							<?php echo esc_attr($btn_text); ?>
						</a>
					<?php } ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</a>

		<style>
			.mega-info-box-<?php echo esc_attr($some_id); ?>:hover .mega-info-header i {
				color: <?php echo esc_attr($hoverclr); ?> !important;
				background: <?php echo esc_attr($hoverbg); ?> !important;
			}
		</style>

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Info Box', 'mega-addons-for-visual-composer' ),
	"base" 			=> "mvc_infobox",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Add icon box with custom font icon', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/infobox.png',
	'params' => array(
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Select Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "info_style",
			"description" 	=> esc_html__( 'Choose info style', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"value" 		=> array(
				'Vertical'	=>	'mega_info_box',
				'Horizontal'	=>	'mega_info_box_2',
			)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Select Image or Font icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "info_opt",
			"description" 	=> __( 'Select Image or Font icon', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"value" 		=> array(
				'Image'	=>	'show_image',
				'Font Icon'	=>	'show_icon',
			)
		),
		array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"image_id",
			"description" 	=> 	__( 'Select the image', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Alternate Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"alt",
			"description" 	=> 	__( 'It will be used as alt attribute of img tag', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
			"group" 		=> 	'General',
        ),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "image_size",
			"description" 	=> __( 'Set the width in pixel e.g 80', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"suffix" 		=> 'px',
			"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Image Radius', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "image_radius",
			"description" 	=> __( 'set the image border radius', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
			"value"			=>	array(
					"None"		=>		"0px",
					"5px"		=>		"5px",
					"10px"		=>		"10px",
					"15px"		=>		"15px",
					"20px"		=>		"20px",
					"25px"		=>		"25px",
					"50%"		=>		"50%",
				)
		),
		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Font icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "font_icon",
			"description" 	=> __( 'Select the font icon', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Font size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "icon_size",
			"description" 	=> __( 'Set icon font size in pixel e.g 30', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"value"			=>	"25",
			"suffix" 		=> 'px',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Height/Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "icon_height",
			"description" 	=> __( 'height & width for icon, set in pixel', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"value"			=>	"",
			"suffix" 		=> 'px',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Font Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "icon_color",
			"description" 	=> __( 'Set icon color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Hover Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "hoverclr",
			"description" 	=> __( 'icon color on hover', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Backgroud', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "icon_bg",
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Hover Backgroud', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "hoverbg",
			"group" 		=> 'General',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Box Shadow', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "shadow",
			"group" 		=> 'General',
			"value"			=>	array(
				"No"			=>		"nonesss",
				"Yes"	=>		"vc_info_box_shadow",				)
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Hover Shadow', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "hovershadow",
			"group" 		=> 'General',
			"value"			=>	array(
				"No"			=>		"nones",
				"Yes"	=>		"vc_info_box_hvr_shadow",				)
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Link To', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "link",
			"group" 		=> 'General',
			"value"			=>	array(
					"None"			=>		"none",
					"Complete Box"	=>		"link_box",
					"Read More"		=>		"link_btn",
				)
		),

		array(
            "type" 			=> 	"vc_link",
			"heading" 		=> 	__( 'Url Link', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btn_url",
			"dependency" => array('element' => "link", 'value' => array('link_box', 'link_btn')),
			"group" 		=> 	'General',
        ),

		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btn_text",
			"description" 	=> 	__( 'Button text name', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "link", 'value' => 'link_btn'),
			"group" 		=> 	'General',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Button Text color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btn_clr",
			"description" 	=> 	__( 'Set Button background color', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "link", 'value' => 'link_btn'),
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
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Border Radius', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "icon_radius",
			"description" 	=> __( 'set the border radius around icon', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Border',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
			"value"			=>	array(
					"None"		=>		"0px",
					"5px"		=>		"5px",
					"10px"		=>		"10px",
					"15px"		=>		"15px",
					"20px"		=>		"20px",
					"25px"		=>		"25px",
					"50%"		=>		"50%",
				)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Border Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "border_width",
			"description" 	=> __( 'select the border width', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Border',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
			"value"			=>	array(
					"0px"		=>		"0",
					"1px"		=>		"1",
					"2px"		=>		"2",
					"3px"		=>		"3",
					"5px"		=>		"5",
					"7px"		=>		"7",
					"10px"		=>		"10",
					"15px"		=>		"15",
				)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Border Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "border_style",
			"group" 		=> 'Border',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
			"value"			=>	array(
					"Solid"		=>		"solid",
					"Dotted"	=>		"dotted",
					"Rige"		=>		"rige",
					"Dashed"	=>		"dashed",
					"Double"	=>		"double",
					"Groove"	=>		"groove",
					"Inset"		=>		"inset",
				)
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Border Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "border_clr",
			"description" 	=> __( 'set the border color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Border',
			"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
		),

		/* Detail */

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Line Height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "line_height",
			"description" 	=> __( 'Set line height for text', 'mega-addons-for-visual-composer' ),
			"value"			=>	"1",
			"group" 		=> 'Detail',
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Title', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "info_title",
			"description" 	=> __( 'Write title for heading', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Detail',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Title font size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "title_size",
			"description" 	=> __( 'Set font size for title e.g 16', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 'Detail',
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Title Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "title_color",
			"value" 		=> "#000",
			"group" 		=> 'Detail',
		),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Description', 'mega-addons-for-visual-composer' ),
			'holder' 		=> 'div',
			"param_name" 	=> 	"content",
			"value"			=>	"<p>write description of Info box.</p>",
			"group" 		=> 	'Detail',
		),
		array(
			"type" 			=> 	"css_editor",
			"heading" 		=> 	__( 'Display Design', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"css",
			"group" 		=>  'Design Options',
		),
	),
) );

