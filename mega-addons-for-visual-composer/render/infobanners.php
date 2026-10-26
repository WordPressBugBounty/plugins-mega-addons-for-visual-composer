<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_info_banner_vc extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style_visibility'		=>		'top_to_bottom',
			'pic_width'				=>		'50',
			'content_width'			=>		'50',
			'box_shadow' 			=>		'none',
			'img_shadow' 			=>		'none',
			'btn_shadow' 			=>		'none',
			'img_radius' 			=>		'',
			'gradient_bg' 			=>		'none',
			'gr_primclr' 			=>		'#0DDABA',
			'gr_secndclr' 			=>		'#5419D5',
			'gr_angle' 				=>		'40',
			'image_id'				=>		'',
			'alt'					=>		'',
			'pic_size'				=>		'',
			'pic_height'			=>		'',
			'img_padding'			=>		'',
			'text_padding'			=>		'',
			'ribbon_text'			=>		'',
			'ribbon_clr'			=>		'',
			'ribbon_bg'				=>		'',
			'btn_icon'				=>		'',
			'btn_text'				=>		'',
			'btn_ptop'				=>		'20',
			'btn_pleft'				=>		'60',
			'btn_size'				=>		'18',
			'url'					=>		'',
			'border_style'			=>		'',
			'btn_radius'			=>		'5',
			'btn_clr'				=>		'',
			'btn_bg'				=>		'',
			'btn_hvrclr'			=>		'',
			'btn_hvrbg'				=>		'none',
			'css'					=>		'',
			'descsize'				=>		'',
			'use_theme_fonts'		=>		'',
			'google_fonts'			=>		'default',
			'styles'			=>		'',
			'classname' 			=>	'',
		), $atts ) );
		$url = vc_build_link($url);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$some_id = VC_MEGA::next_instance_id();
		wp_enqueue_style( 'infobanner-css', plugins_url( '../css/infobanner.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		$content = wpb_js_remove_wpautop($content, true);
		$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
		$googleallfonts = "";
		if ( 'yes' !== $use_theme_fonts && is_string( $google_fonts ) && 'default' !== $google_fonts && '' !== trim( $google_fonts ) ) {
			$fontsData = $this->getFontsData( $atts, 'google_fonts' );
			$googleFontsStyles = $this->googleFontsStyles( $fontsData );
			if (empty($googleFontsStyles) == false){
				$googleallfonts = implode( ';', $googleFontsStyles );
			} else {
				$googleallfonts = $googleFontsStyles;
			}
		}
		ob_start(); ?>
		<div class="maw_infobanner_wrap<?php echo esc_attr($some_id); ?>">
			<!-- Style1 & 2 info banner -->
			<?php if ($style_visibility == 'left' || $style_visibility == 'right') { ?>
				<div class="mega_info_bar info_bn_box <?php echo esc_attr($css_class); ?> <?php echo esc_attr($classname); ?>">		   
					<div class="ribbon">
						<span style="color: <?php echo esc_attr($ribbon_clr); ?>; background-color: <?php echo esc_attr($ribbon_bg); ?>">
							<?php echo esc_attr($ribbon_text); ?>
						</span>
					</div>
					<div class="mega_wrap" style="width: <?php echo esc_attr($pic_width)-2; ?>%; float: <?php echo esc_attr($style_visibility); ?>; padding: <?php echo esc_attr($img_padding); ?>;">
						<img src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($alt); ?>" style="display: block; max-width: 100%; width: <?php echo esc_attr($pic_size); ?>; height: <?php echo esc_attr($pic_height); ?>px; border-radius: <?php echo esc_attr($img_radius); ?>px;">
					</div>

					<div class="mega_content" style="width: <?php echo esc_attr($content_width)-3; ?>%;">
						<div style="padding: <?php echo esc_attr($text_padding); ?>;">
							<?php echo wp_kses_post($content); ?>
							<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" class="mega_hvr_btn maw_banner_btn" style="font-size: <?php echo esc_attr($btn_size); ?>px; color: <?php echo esc_attr($btn_clr); ?>; background: <?php echo esc_attr($btn_bg); ?>; border: <?php echo esc_attr($border_style); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px; padding: <?php echo esc_attr($btn_ptop)/2; ?>px <?php echo esc_attr($btn_pleft)/2; ?>px;">
								<i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php echo esc_attr($btn_text); ?>
							</a>
						</div>

					</div>
					<div class="clearfix"></div>
				</div>
			<?php } ?>


			<!-- Style3 info banner -->
			<?php if ($style_visibility == 'top_to_bottom') { ?>
				<div class="mega_info_bar_2 info_bn_box <?php echo esc_attr($css_class); ?> <?php echo esc_attr($classname); ?>">			   
					<div class="ribbon">
						<span style="color: <?php echo esc_attr($ribbon_clr); ?>; background-color: <?php echo esc_attr($ribbon_bg); ?>">
							<?php echo esc_attr($ribbon_text); ?>
						</span>
					</div>
					<div class="mega_wrap" style="padding: <?php echo esc_attr($img_padding); ?>;">
					<?php if (!empty($image_url)) { ?>
						<img src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($alt); ?>" style="display: block; max-width: 100%; width: <?php echo esc_attr($pic_size); ?>; height: <?php echo esc_attr($pic_height); ?>px; border-radius: <?php echo esc_attr($img_radius); ?>px;">					
					<?php } ?>
					</div>

					<div class="mega_content" style="padding: <?php echo esc_attr($text_padding); ?>;">
						<?php echo wp_kses_post($content); ?>
						<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" class="mega_hvr_btn maw_banner_btn" style="font-size: <?php echo esc_attr($btn_size); ?>px; color: <?php echo esc_attr($btn_clr); ?>; background: <?php echo esc_attr($btn_bg); ?>; border: <?php echo esc_attr($border_style); ?>; padding: <?php echo esc_attr($btn_ptop)/2; ?>px <?php echo esc_attr($btn_pleft)/2; ?>px; border-radius: <?php echo esc_attr($btn_radius); ?>px;">
							<i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php echo esc_attr($btn_text); ?>
						</a>
						<br>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php } ?>

			<!-- Style 4 info banner -->
			<?php if ($style_visibility == 'button') { ?>
				<div class="mega_info_bar_3 info_bn_box <?php echo esc_attr($css_class); ?> <?php echo esc_attr($classname); ?>" style="display: table; width: 100%;">		   
					<div class="ribbon">
						<span style="color: <?php echo esc_attr($ribbon_clr); ?>; background-color: <?php echo esc_attr($ribbon_bg); ?>">
							<?php echo esc_attr($ribbon_text); ?>
						</span>
					</div>
					<div class="mega_wrap" style="width: 100%; float: left; display: table-cell;">
						<div style="padding: <?php echo esc_attr($text_padding); ?>;">
							<?php echo wp_kses_post($content); ?>
						</div>
					</div>

					<div class="mega_content" style="width: <?php echo esc_attr($content_width)-3; ?>%; display: table-cell; vertical-align: middle;">
						<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" class="mega_hvr_btn maw_banner_btn" style="font-size: <?php echo esc_attr($btn_size); ?>px; color: <?php echo esc_attr($btn_clr); ?>; background: <?php echo esc_attr($btn_bg); ?>; border: <?php echo esc_attr($border_style); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px; padding: <?php echo esc_attr($btn_ptop)/2; ?>px <?php echo esc_attr($btn_pleft)/2; ?>px;">
							<i class="<?php echo esc_attr($btn_icon); ?>"></i> <?php echo esc_attr($btn_text); ?>
						</a>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php } ?>
		</div>

		<style>
			<?php if ($gradient_bg == 'show') { ?>
				.maw_infobanner_wrap<?php echo esc_attr($some_id); ?> .info_bn_box {
					background-image: linear-gradient(<?php echo esc_attr($gr_angle); ?>deg,<?php echo esc_attr($gr_primclr); ?> 0%,<?php echo esc_attr($gr_secndclr); ?> 100%);
				}
			<?php } 
			if ($box_shadow == 'shadow') { ?>
				.maw_infobanner_wrap<?php echo esc_attr($some_id); ?> .info_bn_box {
					box-<?php echo esc_attr($box_shadow) ?>: 0 25px 35px 0 rgba(0,9,78,.18) !important;
				}
			<?php }
			if ($btn_shadow == 'shadow') { ?>
				.maw_infobanner_wrap<?php echo esc_attr($some_id); ?> .info_bn_box .maw_banner_btn{
					box-<?php echo esc_attr($btn_shadow) ?>: 0 10px 20px 0 rgba(0,9,78,.12) !important;
				}
			<?php }
			if ($img_shadow == 'shadow') { ?>
				.maw_infobanner_wrap<?php echo esc_attr($some_id); ?> .info_bn_box img{
					box-<?php echo esc_attr($img_shadow) ?>: 0 10px 20px 0 rgba(0,9,78,.12) !important;
				}
			<?php } ?>
			.maw_infobanner_wrap<?php echo esc_attr($some_id); ?> .info_bn_box .maw_banner_btn:hover {
				color: <?php echo esc_attr($btn_hvrclr); ?> !important;
    			background: <?php echo esc_attr($btn_hvrbg) ?> !important;
			}
			.maw_infobanner_wrap<?php echo esc_attr($some_id); ?> .info_bn_box *{
				<?php echo wp_kses( safecss_filter_attr( $googleallfonts ), array() ); ?>;
			}
			@media only screen and (max-width: 480px) {
				.maw_infobanner_wrap<?php echo esc_attr($some_id); ?> .info_bn_box .mega_content *{
					font-size: <?php echo esc_attr($descsize); ?>px !important;
				}
			}
		</style>
		
		<?php return ob_get_clean();
	}

	protected function getFontsData( $atts, $paramName ) {
		if ( ! is_array( $atts ) || ! isset( $atts[ $paramName ] ) || ! is_string( $atts[ $paramName ] ) || '' === trim( $atts[ $paramName ] ) ) {
			return '';
		}

		$googleFontsParam = new Vc_Google_Fonts();
		$field = WPBMap::getParam( $this->shortcode, $paramName );
		$fieldSettings = isset( $field['settings'], $field['settings']['fields'] ) ? $field['settings']['fields'] : array();
		$fontsData = strlen( $atts[ $paramName ] ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $atts[ $paramName ] ) : '';

		return $fontsData;
	}

	protected function googleFontsStyles( $fontsData ) {
		$fallback = array( 'font-family: Arial, sans-serif' );
		if ( ! is_array( $fontsData ) || ! isset( $fontsData['values'] ) || ! is_array( $fontsData['values'] ) || ! isset( $fontsData['values']['font_family'] ) || ! is_string( $fontsData['values']['font_family'] ) ) {
			return $fallback;
		}

		$font_family = trim( explode( ':', $fontsData['values']['font_family'], 2 )[0] );
		if ( '' === $font_family || 1 !== preg_match( '/^[\p{L}\p{M}\p{N}_ -]+$/u', $font_family ) ) {
			return $fallback;
		}

		$styles = array( 'font-family: "' . $font_family . '", Arial, sans-serif' );
		if ( isset( $fontsData['values']['font_style'] ) && is_string( $fontsData['values']['font_style'] ) ) {
			$font_style = explode( ':', $fontsData['values']['font_style'], 3 );
			if ( isset( $font_style[1] ) && preg_match( '/^[1-9]00$/', $font_style[1] ) ) {
				$styles[] = 'font-weight: ' . $font_style[1];
			}
			if ( isset( $font_style[2] ) && in_array( strtolower( $font_style[2] ), array( 'normal', 'italic' ), true ) ) {
				$styles[] = 'font-style: ' . strtolower( $font_style[2] );
			}
		}

		return $styles;
	}
}


vc_map( array(
	"name" 			=> __( 'Info Banner', 'mega-addons-for-visual-composer' ),
	"base" 			=> "info_banner_vc",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Displays the banner information', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/infobanner.png',
	'params' => array(
		array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"style_visibility",
			"description" 	=> 	esc_html__( 'select styles for info banner', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
			"value" 		=>  array(
				'Top Image Bottom Content' =>  'top_to_bottom',
				'Left Image right Content' =>  'left',
				'Left Content right Image' =>  'right',
				'Left Content right Button' =>  'button',
			)
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Picture box width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"pic_width",
			"description" 	=> 	__( 'Set the width of picture box in percentage e.g 50', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "style_visibility", 'value' => array('left', 'right', 'button')),
			"value"			=>	"50",
			"suffix" 		=> '%',
			"group" 		=> 	'General',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Content box width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"content_width",
			"description" 	=> 	__( 'Set the width of content box in percentage e.g 50', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "style_visibility", 'value' => array('left', 'right', 'button')),
			"value"			=>	"50",
			"suffix" 		=> 	'%',
			"group" 		=> 	'General',
        ),

        array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Shadow', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "box_shadow",
			"group" 		=> 'General',
			"value"			=>	array(
				"None"			=>		"none",
				"Shadow"		=>		"shadow",
			)
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Gradient Background', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "gradient_bg",
			"description" 	=> 'if true then leave empty background color and image from Design Options.',
			"group" 		=> 'General',
			"value"			=>	array(
				"Hide"			=>		"hide",
				"Show"			=>		"show",
			)
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Primary Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "gr_primclr",
			"edit_field_class" => "vc_col-sm-4",
			"dependency" 	=> array('element' => "gradient_bg", 'value' => 'show'),
			"value" 		=> "#0DDABA",
			"group" 		=> 'General',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Secondary Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "gr_secndclr",
			"edit_field_class" => "vc_col-sm-4",
			"dependency" 	=> array('element' => "gradient_bg", 'value' => 'show'),
			"value" 		=> "#5419D5",
			"group" 		=> 'General',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Gradient Angle', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "gr_angle",
			"edit_field_class" => "vc_col-sm-4",
			"dependency" 	=> array('element' => "gradient_bg", 'value' => 'show'),
			"suffix" 		=> 'Deg',
			"value" 		=> "40",
			"group" 		=> 'General',
		),

		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Extra Class Name', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"classname",
			"description" 	=> 	"Style particular content element differently - add a class name and refer to it in custom CSS.",
			"group" 		=> 	'General',
        ),

        array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_urls",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . esc_html__( 'Background Options', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'General',
		),

		array(
			"type" 			=> "css_editor",
			"param_name" 	=> "css",
			"group" 		=> 'General',
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'General',
		),

        // Image Section 

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Padding ', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"img_padding",
			"description" 	=> 	__( 'top right bottom left', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 edit_field_padding_top",
			"value"			=>	"0px 0px 0px 0px",
			"group" 		=> 	'Image',
        ),

        array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Shadow', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "img_shadow",
			"edit_field_class" => "vc_col-sm-4 edit_field_padding_top",
			"group" 		=> 'Image',
			"value"			=>	array(
				"None"			=>		"none",
				"Shadow"		=>		"shadow",
			)
		),

		array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Border Radius', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"img_radius",
			"edit_field_class" => "vc_col-sm-4 edit_field_padding_top",
			"suffix" 		=> 	'px',
			"group" 		=> 	'Image',
        ),

        array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Banner image', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"image_id",
			"edit_field_class" => "vc_col-sm-4",
			"description" 	=> 	__( 'Select image for banner logo', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Image',
        ),

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Alternate Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"alt",
			"edit_field_class" => "vc_col-sm-8",
			"description" 	=> 	__( 'It will be used as alt attribute of img tag', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Image',
        ),

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Image width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"pic_size",
			"description" 	=> 	__( 'set image width e.g 100px or 100%', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Image height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"pic_height",
			"description" 	=> 	__( 'set image height in pixel e.g 100 or leave blank for default', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 	'px',
			"group" 		=> 	'Image',
        ),

        /*================== Content Section =================*/

        array(
            "type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Description', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"content",
			"description" 	=> 	__( 'write detail about info banner', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Content',
			"value"			=> '<h2>Caption Title</h2><p>caption detail here</p>'
        ),

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Padding ', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"text_padding",
			"edit_field_class" => "vc_col-sm-6",
			"description" 	=> 	__( 'top right bottom left', 'mega-addons-for-visual-composer' ),
			"value"			=>	"0px 0px 0px 0px",
			"group" 		=> 	'Content',
        ),

        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Content Size [For Mobile]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"descsize",
			"edit_field_class" => "vc_col-sm-6",
			"suffix" 		=> 'px',
			"group" 		=> 	'Content',
        ),

        array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_urlss",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Google Fonts Option', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Content',
		),

        array(
			"type" 			=> 	"checkbox",
			"heading" 		=> 	__( 'Use theme default font family?', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"use_theme_fonts",
			"description" 	=> 	__( 'Use font family from the theme.', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Content',
			"value" 		=> array(
					"Yes"		=> "yes",
			)
		),

		array(
			'type' => 'google_fonts',
			'param_name' => 'google_fonts',
			'value' => 'default',
			'settings' => array(
				'fields' => array(
					'font_family_description' => __( 'Select font family.', 'mega-addons-for-visual-composer' ),
					'font_style_description' => __( 'Select font styling.', 'mega-addons-for-visual-composer' ),
				),
			),
			"group" 		=> 	'Content',
			'weight' => 0,
			'dependency' => array(
				'element' => 'use_theme_fonts',
				'value_not_equal_to' => 'yes',
			),
		),


        /** Ribbon Setting **/

        array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Ribbon text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "ribbon_text",
			"description" 	=> __( 'write ribbon text for special offer or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Ribbon',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Text color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "ribbon_clr",
			"description" 	=> __( 'Ribbon text color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Ribbon',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Background color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "ribbon_bg",
			"description" 	=> __( 'Ribbon background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Ribbon',
		),


        /** Button Setting **/

		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Select Icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_icon",
			"description" 	=> __( 'it will be show within text', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Button',
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Button text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_text",
			"description" 	=> __( 'Write button text', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Button',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Button Height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_ptop",
			"description" 	=> __( 'button height. set in pixel e.g 20', 'mega-addons-for-visual-composer' ),
			"value"			=>	"20",
			"suffix" 		=> 'px',
			"group" 		=> 'Button',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Button Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_pleft",
			"description" 	=> __( 'button width. set in pixel e.g 60', 'mega-addons-for-visual-composer' ),
			"value"			=>	"60",
			"suffix" 		=> 'px',
			"group" 		=> 'Button',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Text font size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_size",
			"description" 	=> __( 'Set font size in pixel e.g 18', 'mega-addons-for-visual-composer' ),
			"value"			=>	"18",
			"suffix" 		=> 'px',
			"group" 		=> 'Button',
		),
		array(
			"type" 			=> "vc_link",
			"heading" 		=> __( 'Button URL', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "url",
			"description" 	=> __( 'Write button url as link', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Button',
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Border Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "border_style",
			"description" 	=> __( 'height style color', 'mega-addons-for-visual-composer' ),
			"value"			=>	"0px solid #fff",
			"group" 		=> 'Button',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Border Radius', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_radius",
			"value"			=>	"5",
			"suffix" 		=> 'px',
			"group" 		=> 'Button',
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Shadow', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_shadow",
			"group" 		=> 'Button',
			"value"			=>	array(
				"None"			=>		"none",
				"Shadow"		=>		"shadow",
			)
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Text color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_clr",
			"group" 		=> 'Button',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Background color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_bg",
			"group" 		=> 'Button',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Hover Text color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_hvrclr",
			"group" 		=> 'Button',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Hover Background', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_hvrbg",
			"group" 		=> 'Button',
		),
	),
) );

