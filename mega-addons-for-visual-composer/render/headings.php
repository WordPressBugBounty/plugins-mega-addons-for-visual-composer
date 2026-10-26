<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_vc_headings extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style'			=>		'theme1',
			'style2'		=>		'icon',
			'linewidth'		=>		'230',
			'borderwidth'	=>		'2',
			'borderclr'		=>		'#000',
			'lineheight'	=>		'1',
			'icon'			=>		'',
			'iconalign'		=>		'center',
			'iconclr'		=>		'#000',
			'image_id'		=>		'',
			'align'			=>		'center',
			'title'			=>		'',
			'titlesize'		=>		'22',
			'titleclr'		=>		'#000',
			'desc_size'		=>		'',
			'use_theme_fonts' =>		'',
			'google_fonts' 	=>		'default',
			'transform' 	=>		'default',
			'classname' 	=>		'',
		), $atts ) );
		$some_id = VC_MEGA::next_instance_id();
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$content = wpb_js_remove_wpautop($content, true);
		wp_enqueue_style( 'vc-heading-css', plugins_url( '../css/heading.css' , __FILE__ ), array(), VC_MEGA::VERSION);
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
		<div class="mega-line-container ma_heading_wrap<?php echo esc_attr($some_id) ?> <?php echo esc_attr($classname); ?>">
			<?php if ($style == 'theme1') { ?>
				<div class="mega-line-top" style="text-align: <?php echo esc_attr($align); ?>;">  
			        <span style="width: <?php echo esc_attr($linewidth); ?>px; border-top: <?php echo esc_attr($borderwidth); ?>px solid <?php echo esc_attr($borderclr); ?>;"></span>
			        <h2 style="font-size: <?php echo esc_attr($titlesize); ?>px; color: <?php echo esc_attr($titleclr); ?>; line-height: <?php echo esc_attr($lineheight); ?>;
			        text-transform: <?php echo esc_attr($transform) ?>; <?php echo esc_attr($googleallfonts); ?>;">
			        	<?php echo esc_attr($title); ?>
			        </h2>
			        <div class="heading_desc">
			        	<?php echo wp_kses_post($content); ?>
			        </div>
		      	</div>
			<?php } ?>

			<?php if ($style == 'theme2') { ?>
			    <div class="mega-line-center" style="text-align: <?php echo esc_attr($align); ?>;">  
		        	<h2 style="font-size: <?php echo esc_attr($titlesize); ?>px; color: <?php echo esc_attr($titleclr); ?>; text-transform: <?php echo esc_attr($transform) ?>; <?php echo esc_attr($googleallfonts); ?>;">
			        	<?php echo esc_attr($title); ?>
			        </h2>
			        <div style="line-height: <?php echo esc_attr($lineheight); ?>;">
		        		<span style="width: <?php echo esc_attr($linewidth); ?>px; border-top: <?php echo esc_attr($borderwidth); ?>px solid <?php echo esc_attr($borderclr); ?>;"></span>
		        	</div>
		        	<div class="heading_desc">
			        	<?php echo wp_kses_post($content); ?>
			        </div>
		      	</div>
		    <?php } ?>

		    <?php if ($style == 'theme3') { ?>
			    <div class="mega-line-bottom" style="text-align: <?php echo esc_attr($align); ?>;">  
			        <h2 style="font-size: <?php echo esc_attr($titlesize); ?>px; color: <?php echo esc_attr($titleclr); ?>; text-transform: <?php echo esc_attr($transform) ?>; <?php echo esc_attr($googleallfonts); ?>;">
			        	<?php echo esc_attr($title); ?>
			        </h2>
			        <div class="heading_desc" style="line-height: <?php echo esc_attr($lineheight); ?>;">
			        	<?php echo wp_kses_post($content); ?>
			        </div>
			        <span style="width: <?php echo esc_attr($linewidth); ?>px; border-top: <?php echo esc_attr($borderwidth); ?>px solid <?php echo esc_attr($borderclr); ?>;"></span>
			    </div>
		    <?php } ?>

		    <?php if ($style == 'theme4') { ?>
		        
			    <div class="mega-line-icon" style="text-align: <?php echo esc_attr($align); ?>;">  
			        <div class="line-icon" style="text-align: <?php echo esc_attr($iconalign); ?>; width: <?php echo esc_attr($linewidth); ?>px; border-top: <?php echo esc_attr($borderwidth); ?>px solid <?php echo esc_attr($borderclr); ?>;">
		        		<?php if ($style2 == 'icon') { ?>
		        			<i class="<?php echo esc_attr($icon); ?>" aria-hidden="true" style="color: <?php echo esc_attr($iconclr); ?>"></i>
		        		<?php } ?>
		        		<?php if ($style2 == 'image') { ?>
		        		<img src="<?php echo esc_attr($image_url); ?>">
		        	<?php } ?>
		        	</div>
			        <h2 style="font-size: <?php echo esc_attr($titlesize); ?>px; color: <?php echo esc_attr($titleclr); ?>; line-height: <?php echo esc_attr($lineheight); ?>; margin-bottom: -15px; text-transform: <?php echo esc_attr($transform) ?>; <?php echo esc_attr($googleallfonts); ?>;">
			        	<?php echo esc_attr($title); ?>
			        </h2>
			        <div class="heading_desc">
			        	<?php echo wp_kses_post($content); ?>
			        </div>
			    </div>
		    <?php } ?>

		    <?php if ($style == 'theme5') { ?>
			    <div class="mega-line-icon" style="text-align: <?php echo esc_attr($align); ?>;">  
			        <h2 style="font-size: <?php echo esc_attr($titlesize); ?>px; color: <?php echo esc_attr($titleclr); ?>; text-transform: <?php echo esc_attr($transform) ?>; <?php echo esc_attr($googleallfonts); ?>;">
			        	<?php echo esc_attr($title); ?>
			        </h2>
			        <div style="line-height: <?php echo esc_attr($lineheight); ?>;">
				        <div class="line-icon" style="text-align: <?php echo esc_attr($iconalign); ?>; width: <?php echo esc_attr($linewidth); ?>px; border-top: <?php echo esc_attr($borderwidth); ?>px solid <?php echo esc_attr($borderclr); ?>;">
				        	<?php if ($style2 == 'icon') { ?>
				        		<i class="<?php echo esc_attr($icon); ?>" aria-hidden="true" style="color: <?php echo esc_attr($iconclr); ?>"></i>
				        	<?php } ?>
				        	<?php if ($style2 == 'image') { ?>
				        		<img src="<?php echo esc_attr($image_url); ?>">
				        	<?php } ?>
				        </div>
			        </div>
			        <div class="heading_desc">
			        	<?php echo wp_kses_post($content); ?>
			        </div>
			    </div>
		    <?php } ?>

		    <?php if ($style == 'theme6') { ?>
				<div class="mega-line-icon" style="text-align: <?php echo esc_attr($align); ?>;">  
			        <h2 style="font-size: <?php echo esc_attr($titlesize); ?>px; color: <?php echo esc_attr($titleclr); ?>; text-transform: <?php echo esc_attr($transform) ?>; <?php echo esc_attr($googleallfonts); ?>;">
			        	<?php echo esc_attr($title); ?>
			        </h2>
			        <div class="heading_desc" style="line-height: <?php echo esc_attr($lineheight); ?>;">
			        	<?php echo wp_kses_post($content); ?>
			        </div>
			        <div class="line-icon" style="text-align: <?php echo esc_attr($iconalign); ?>; width: <?php echo esc_attr($linewidth); ?>px; border-top: <?php echo esc_attr($borderwidth); ?>px solid <?php echo esc_attr($borderclr); ?>;">
			        	<?php if ($style2 == 'icon') { ?>
			        		<i class="<?php echo esc_attr($icon); ?>" aria-hidden="true" style="color: <?php echo esc_attr($iconclr); ?>"></i>
			        	<?php } ?>
			        	<?php if ($style2 == 'image') { ?>
			        		<img src="<?php echo esc_attr($image_url); ?>">
			        	<?php } ?>
			        </div>
			    </div>
		    <?php } ?>
      	</div>

      	<style>
			.ma_heading_wrap<?php echo esc_attr($some_id) ?> .heading_desc *{
				font-size: <?php echo esc_attr($desc_size); ?>px;
				<?php echo esc_attr($googleallfonts); ?>;
			}
      	</style>
		<?php
		return ob_get_clean();
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
	"name" 			=> __( 'Heading', 'mega-addons-for-visual-composer' ),
	"base" 			=> "vc_headings",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Display stylish headings', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/heading.png',
	'params' => array(
		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Select Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "style",
			"description" 	=> 'Click to choose a heading style',
			"group" 		=> "General",
			"value"			=>	array(
				"Simple Top Line"		=>	"theme1",
				"Simple Center Line"	=>	"theme2",
				"Simple Bottom Line"	=>	"theme3",
				"Top Icon/Image"		=>	"theme4",
				"Center Icon/Image"		=>	"theme5",
				"Bottom Icon/Image"		=>	"theme6",
			)
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Line length', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "linewidth",
			"edit_field_class" => "vc_col-sm-4",
			"suffix" 		=> 	'px',
			"value"			=>	"230",
			'max' 			=> 	"",
			"group" 		=> 	"General",
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Border Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "borderwidth",
			"edit_field_class" => "vc_col-sm-4",
			"value"			=>	"2",
			"suffix" 		=> 'px',
			"group" 		=> "General",
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Border Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "borderclr",
			"edit_field_class" => "vc_col-sm-4",
			"value"			=>	"#000",
			"group" 		=> "General",
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Seclect Icon/Image', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "style2",
			"dependency" => array('element' => "style", 'value' => array('theme4', 'theme5', 'theme6')),
			"group" 		=> "General",
			"value"			=>	array(
				"Icon"			=>	"icon",
				"Image"			=>	"image",
			)
		),

		// Image/Icon Section

		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Choose Icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "icon",
			"dependency" => array('element' => "style2", 'value' => 'icon'),
			"group" 		=> "General",
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Icon Alignment', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "iconalign",
			"dependency" => array('element' => "style2", 'value' => 'icon'),
			"group" 		=> "General",
			"value"			=>	array(
				"Center"	=>		"center",
				"Left"		=>		"left",
				"Right"		=>		"right",
			)
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Color for Icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "iconclr",
			"dependency" => array('element' => "style2", 'value' => 'icon'),
			"group" 		=> "General",
		),

		array(
			"type" 			=> "attach_image",
			"heading" 		=> __( 'Choose Image', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "image_id",
			"dependency" => array('element' => "style2", 'value' => 'image'),
			"group" 		=> "General",
		),

		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Extra class name', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"classname",
			"description" 	=> 	"Style particular content element differently - add a class name and refer to it in custom CSS.",
			"group" 		=> 	'General',
        ),

        array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 12px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'General',
		),

		// Heading Section

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Title', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "title",
			"value"			=>	"Title Here",
			"group" 		=> "Heading",
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Heading Alignment', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "align",
			"group" 		=> "Heading",
			"value"			=>	array(
				"Center"	=>		"center",
				"Left"		=>		"left",
				"Right"		=>		"right",
			)
		),

		array(
			"type" 			=> "textarea_html",
			"heading" 		=> __( 'Description', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "content",
			"value"			=>	"write your detail or leave blank",
			"group" 		=> "Heading",
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_urls",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Google Fonts Option', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Typography',
		),

		array(
			"type" 			=> 	"checkbox",
			"heading" 		=> 	__( 'Use theme default font family?', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"use_theme_fonts",
			"description" 	=> 	__( 'Use font family from the theme.', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Typography',
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
			"group" 		=> 	'Typography',
			'weight' => 0,
			'dependency' => array(
				'element' => 'use_theme_fonts',
				'value_not_equal_to' => 'yes',
			),
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_urlss",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Title Settings', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Typography',
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Transform', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "transform",
			"group" 		=> 'Typography',
			"value"			=>	array(
				"Default"		=>		"default",
				"Uppercase"		=>		"uppercase",
				"Lowercase"		=>		"lowercase",
				"Capitalize"	=>		"capitalize",
				"Normal"		=>		"normal",
			)
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Line Height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "lineheight",
			"edit_field_class" => "vc_col-sm-6",
			"description" 	=> __('margin between line and headings', 'mega-addons-for-visual-composer'),
			"value"			=>	"1",
			"group" 		=> "Typography",
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Title [Font Size]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "titlesize",
			"edit_field_class" => "vc_col-sm-6",
			"value"			=>	"22",
			"suffix" 		=> 'px',
			"group" 		=> "Typography",
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Title Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "titleclr",
			"value"			=>	"#000",
			"group" 		=> "Typography",
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_urldesc",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Description Settings', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Typography',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Description [Font Size]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "desc_size",
			"suffix" 		=> 'px',
			"group" 		=> 'Typography',
		),
	),
) );

